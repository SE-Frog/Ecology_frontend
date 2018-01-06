<?php
include 'header.php';
require_once '../Modules/Function.php';
if (!isset($_SESSION['uID']) or $_SESSION['uID'] <= 0) {
    header("Location: ../Views/loginForm.php");
    exit(0);
}
?>

<?php
// 引入Seach.php裡面的函式
// 將return回來的sql資料存入result中
$result = getFullList();

// 資料太多需要分頁的話請用下方函式, 每頁顯示10筆, 並讀取第一頁
//$result = getPaginationList(10, 1);

// 判斷是否有資料回傳
if ($result->num_rows === 0) {
    // query 資料為空
    echo "Empty";
} else {
    $allData = '';
    class Emp
    {
        public $id = "";
        public $name = "";
        public $label = "";
        public $family = "";
        public $genus = "";
        public $food = "";
        public $season = "";
        public $status = "";
        public $habitat = "";
        public $note = "";
    }
    // 逐列進行動作(顯示)
    while ($row = mysqli_fetch_array($result)) {
        // 內容將用 js 動態產生, 故先把所有資料包成json, 等等要丟給 js
        $e = new Emp();
        $e->id = $row['id'];
        $e->name = $row['organismname'];
        $e->label = $row['label'];
        $e->family = $row['family'];
        $e->genus = $row['genus'];
        $e->food = $row['food'];
        $e->season = $row['season'];
        $e->status = $row['status'];
        $e->habitat = $row['habitat'];
        $e->note = $row['note'];
        $tmp[] = $e;
    }
    $allData = json_encode($tmp);
}
?>
<div id="loading" style="
  background-color: white;
  width: 100%;
  height: 100%;
  position: fixed;
  top: 0;
  left: 0;
  z-index: 999;
"></div>
<div id="content" class="container mt-3">
  <h1>物種生態資料</h1>
  <div class="row">
    <div class="col-12">
      <!-- <nav aria-label="breadcrumb" role="navigation">
          <ol class="breadcrumb">
              <li class="breadcrumb-item">
                  <a href="#" @click.prevent="showAll">全部</a>
              </li>
              <li v-if="chosenClass!=0" class="breadcrumb-item active" aria-current="page">{{ classNumToText(chosenClass) }}</li>
          </ol>
      </nav> -->
    </div>
  </div>

  <div class="row">
    <div class="col-md-4">
      <div class="form-group">
        <label for="organismname" class="col-12 col-form-label">物種</label>
        <div class="col-12">
          <select @change="chosenFamily='all';chosenGenus='all';dataIndex=1" class="form-control" id="organismname" v-model="chosenClass">
            <option value="all" selected>所有</option>
            <option v-for="item in allLabel" :value="item">{{ item }}</option>
          </select>
        </div>
      </div>
    </div>
    <div class="col-md-4">
      <div class="form-group">
        <label for="family" class="col-12 col-form-label">科</label>
        <div class="col-12">
          <select @change="dataIndex=1" class="form-control" id="family" v-model="chosenFamily">
            <option value="all" selected>所有</option>
            <option v-for="item in allFamily" :value="item">{{ item }}</option>
          </select>
        </div>
      </div>
    </div>
    <div class="col-md-4">
      <div class="form-group">
        <label for="genus" class="col-12 col-form-label">屬</label>
        <div class="col-12">
          <select @change="dataIndex=1" class="form-control" id="genus" v-model="chosenGenus">
            <option value="all" selected>所有</option>
            <option v-for="item in allGenus" :value="item">{{ item }}</option>
          </select>
        </div>
      </div>
    </div>
  </div>

  <div class="row">
    <div class="col-12" v-for="list in myData" v-if="myData.length != 0">
      <div class="row border rounded mb-2 p-2">
        <!-- 如果有對應圖片可以加上 -->
        <!-- <div class="col-md-3 mb-2 mb-md-0">
            <img width="150px" class="border rounded img-fluid" src="https://sdl-stickershop.line.naver.jp/products/0/0/1//1035020/LINEStorePC/main.png" alt="photo in data">
        </div> -->
        <div class="col-md-12">
            <h4>{{ list.name }}</h4>
            <span class="badge badge-secondary" v-if="list.family != null"><small>{{ list.family }}</small></span>
            <span class="badge badge-secondary" v-if="list.genus != null"><small>{{ list.genus }}</small></span>
            <p class="mt-2">{{ list.status }}</p>
            <div class="text-right">
                <a :href="'../Views/SearchView_edit.php?id=' + list.id" class="btn btn-secondary">修改</a>
                <a @click="checkDel(list.id)" href="#" class="btn btn-danger">刪除</a>
                <a :href="'../Views/viewDetail.php?id=' + list.id" class="btn btn-primary">看更多...</a>
            </div>
        </div>
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


<script src="https://cdn.jsdelivr.net/npm/vue"></script>
<script>
  var app = new Vue({
    el: '#content',
    data: {
      allData: '',
      allClass: '',
      chosenClass: 'all',
      chosenFamily: 'all',
      chosenGenus: 'all',
      // 分頁索引
      dataIndex: 1
    },
    created: function(){
      var allData = <?php echo $allData; ?>;
      // console.log(allData);
      var allClass = [];
      // 查找並存下所有的物種(ex:蝴蝶,青蛙)
      for(let value of allData){
          if(value.label != null && allClass.indexOf(value.label) == -1){
            allClass[value.label] = {
              family: [],
              genus: []
            };
          }
      }
      // 把所有的科存入對應的物種(ex: 蛺蝶科存入蝴蝶)
      for(let value of allData){
          if(value.family != null && allClass[value.label].family.indexOf(value.family) == -1){
            // 初始化，之後要將科和屬放入其label中
            allClass[value.label].family.push(value.family);
          }
      }
      // 把所有的種存入對應的物種
      for(let value of allData){
          if(value.genus != null && allClass[value.label].genus.indexOf(value.genus) == -1){
            // 初始化，之後要將科和屬放入其label中
            allClass[value.label].genus.push(value.genus);
          }
      }
      // for(let key in allClass){
      //   console.log(allClass[key].family);
      //   console.log(allClass[key].genus);
      // }
      this.allData = allData;
      this.allClass = allClass;
      document.getElementById("loading").style.display = "none";
    },
    methods: {
      checkDel(id) {
        var str = '../Control/Control.php?act=deleteEcology&id=' + id;
        if(confirm('確定要刪除嗎?')){
          window.location.href = str;
        }
      },
      checkEnd() {
        // 查看下一頁是否已經到最後一頁
        let tmp = this.dataIndex + 1;
        let tmpp = this.filterData.slice((tmp * 10) - 10, tmp * 10);
        console.log(tmpp.length);
        if(tmpp.length == 0){
          return true;
        }else{
          return false;
        }
      }
    },
    computed: {
      allLabel () {
        let tmp = [];
        for(let key in this.allClass){
          tmp.push(key);
        }
        return tmp;
      },
      allFamily () {
        let tmp = [];
        if(this.chosenClass != "all"){
          for(let value of this.allClass[this.chosenClass].family){
            tmp.push(value);
          }
        }
        return tmp;
      },
      allGenus () {
        let tmp = [];
        if(this.chosenClass != "all"){
          for(let value of this.allClass[this.chosenClass].genus){
            tmp.push(value);
          }
        }
        return tmp;
      },
      filterData () {
        let tmp = [];
        // 先過濾物種
        if(this.chosenClass == "all"){
          return this.allData;
        }else{
          tmp = this.allData.filter((val) => {
            return val.label == this.chosenClass;
          });
        }
        // 再過濾所有情況
        if(this.chosenClass != "all" && this.chosenFamily == "all" && this.chosenGenus == "all"){
          return tmp;
        }
        else if(this.chosenClass != "all" && this.chosenFamily != "all" && this.chosenGenus == "all"){
          return tmp.filter((val) => {
            return val.family == this.chosenFamily;
          });
        }
        else if(this.chosenClass != "all" && this.chosenFamily == "all" && this.chosenGenus != "all"){
          return tmp.filter((val) => {
            return val.genus == this.chosenGenus;
          });
        }
        else if(this.chosenClass != "all" && this.chosenFamily != "all" && this.chosenGenus != "all"){
          return tmp.filter((val) => {
            return val.family == this.chosenFamily && val.genus == this.chosenGenus;
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