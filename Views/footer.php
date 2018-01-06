<ul class="share">
  <!-- 讓 fontawsone先預載 -->
  <i class="fa fa-arrow-up text-white" style="opacity: 0"></i>
  <li class="Gotop">
    <a class="rfa" title="到上面" style="width: 60px; height: 60px; line-height: 60px; font-size: 40px;">
      <i class="fa fa-arrow-up text-white"></i>
    </a>
  </li>
</ul>
<script>
  $(document).ready(function () {
    $(window).scroll(function () {
      if ($(window).scrollTop() >= 100) { //向下滾動數值大於該值時，即出現小火箭
        $('.Gotop').fadeIn(300); //淡入: 越小出現越快
      } else {
        $('.Gotop').fadeOut(300); //淡出: 越小消失越快
      }
    });
    $('.Gotop').click(function () {
      $('html,body').animate({
        scrollTop: '0px'
      }, 800);
    }); //火箭停留時間: 越小消失的越快
    $('.Gotop2').click(function () {
      $('html,body').animate({
        scrollTop: '0px'
      }, 800);
    }); //火箭停留時間: 越小消失的越快
  });
</script>
  </body>
</html>