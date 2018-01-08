<?php
  include 'header.php';
  if ( ! isset($_SESSION['uID']) or $_SESSION['uID'] <= 0) {
    header("Location: ../Views/loginForm.php");
    exit(0);
  }
?>
	<title>EXIF 信息</title>
  <div class="container">
<?php
  require('../Modules/photoFunction.php');
	$result = getFullPhoto();
	$allData = '';
	class Emp
	{
			public $id = "";
			public $directory = "";
			public $path = "";
			public $name = "";
			public $longitude = "";
			public $latitude = "";
			public $shootdatetime = "";
			public $createtime = "";
	}
  while ($row = mysqli_fetch_array($result)) {
		$e = new Emp();
		$e->id = $row['id'];
		$e->directory = $row['directory'];
		$e->path = $row['path'];
		$e->name = $row['name'];
		$e->longitude = $row['longitude'];
		$e->latitude = $row['latitude'];
		$e->shootdatetime = $row['shootdatetime'];
		$e->createtime = $row['createtime'];
		$tmp[] = $e;
	}
	$allData = json_encode($tmp);
?>

<!-- loading -->
<div id="loading" style="
  background-image: url(../img/loading.svg);
  background-repeat: no-repeat;
  background-color: white;
  background-position: center;
  width: 100%;
  height: 100%;
  position: fixed;
  top: 0;
  left: 0;
  z-index: 999;
"></div>

<div id="content" class="container mt-3">
  <h1>圖片庫</h1>
  <div class="row">
    <div class="col-md-4">
      <div class="form-group">
        <label for="organismname" class="col-12 col-form-label">物種</label>
        <div class="col-12">
          <select @change="dataIndex=1" class="form-control" id="organismname" v-model="chosenName">
            <option value="all" selected>所有</option>
            <option v-for="item in allName" :value="item">{{ item }}</option>
          </select>
        </div>
      </div>
    </div>
  </div>

  <div class="row">
    <div class="col-lg-4 col-sm-6 mb-3" v-for="list in myData" v-if="myData.length != 0">
      <div class="card">
        <img class="card-img-top img-fluid" :src="list.path" alt="載入錯誤">
				<h5 class="card-title text-center">{{ list.directory }}</h5>
				<div class="collapse" :id="list.id">
					<div class="card-body">
							<div class="card-text">經度: {{ list.longitude }}</div>
							<div class="card-text">緯度: {{ list.latitude }}</div>
							<div class="card-text">拍攝日期: {{ list.shootdatetime }}</div>
							<div class="text-left text-md-right mt-1">
									<a :href="'photoedit.php?id=' + list.id" class="btn btn-primary">修改</a>
							</div>
					</div>
				</div>
				<button @click="changeStatus(list.id)" class="btn btn-dark btn-sm" type="button" data-toggle="collapse" :data-target="'#' + list.id" aria-expanded="false">
					{{ status[list.id]? "打開":"收合" }}
				</button>
      </div>
    </div>

    <div class="col-12" v-if="myData.length == 0">
        <div class="alert alert-info">
            沒有找到您指定的物種喔
        </div>
    </div>

    <div class="col-12 text-center mb-3" v-if="myData.length != 0">
      <a href="#" class="btn btn-light" @click="dataIndex=dataIndex+1" v-if="dataIndex==1 && (!checkEnd())">下一頁</a>
      <tmplate v-else-if="dataIndex>1">
        <a href="#" class="btn btn-light" @click="dataIndex=dataIndex-1">上一頁</a href="#">
        <span class="text-white bg-info" style="
        display: inline-block;
        font-weight: 400;
        text-align: center;
        white-space: nowrap;
        vertical-align: middle;
        user-select: none;
        border: 1px solid transparent;
        padding: .375rem .75rem;
        font-size: 1rem;
        line-height: 1.5;
        ">第 {{ dataIndex }} 頁</span>
        <a href="#" class="btn btn-light" @click="dataIndex=dataIndex+1" v-if="(!checkEnd())">下一頁</a>
      </tmplate>
    </div>
  </div>
</div>


<script src="../js/vue.js"></script>
<script>
  var app = new Vue({
    el: '#content',
    data: {
      allData: '',
      allName: '',
			chosenName: 'all',
      // 分頁索引
      dataIndex: 1,
			status: []
    },
    created: function(){
      var allData = <?php echo $allData; ?>;
      // console.log(allData);
      var allName = [];
      // 查找並存下所有的物種名稱
      for(let value of allData){
          if(value.directory != null && allName.indexOf(value.directory) == -1){
            allName.push(value.directory);
          }
					// 紀錄卡片收合狀態初始化
					this.status[value.id] = true;
      }
      this.allData = allData;
      this.allName = allName;
      document.getElementById("loading").style.display = "none";
    },
    methods: {
      checkEnd() {
        // 查看下一頁是否已經到最後一頁
        let tmp = this.dataIndex + 1;
        let tmpp = this.filterData.slice((tmp * 10) - 10, tmp * 10);
        // console.log(tmpp.length);
        if(tmpp.length == 0){
          return true;
        }else{
          return false;
        }
      },
			changeStatus (id) {
				// console.log(this.status[id]);
				// 要讓array重新渲染要用$set
				this.$set(this.status, id, !this.status[id]);
			}
    },
    computed: {
      allName () {
        let tmp = [];
        for(let key in this.allName){
          tmp.push(key);
        }
        return tmp;
      },
      filterData () {
        // 過濾物種
        if(this.chosenName == "all"){
          return this.allData;
        }else{
          return this.allData.filter((val) => {
            return val.directory == this.chosenName;
          });
        }
      },
      myData () {
        return this.filterData.slice((this.dataIndex * 10) - 10, this.dataIndex * 10);
      }
    }
  })
</script>

<?php
  include 'footer.php';
?>