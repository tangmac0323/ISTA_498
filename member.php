<?php
include('header.php');
if(!isset($_SESSION['name'])){
    echo '<script>window.location.href="index.php"</script>';
}
?>
   <div class="section" style="margin-top: 77px;">
      <div class="content clear">
          <div class="fl content_f">
              <ul>
                  <li>
                      <a href="">My account</a>
                  </li>
                  <li><a href="">My order</a></li>
                  <li><a href="">My collection</a></li>
                  <li class="on">address</li>
                  <li><a href="">exit</a></li>
              </ul>
          </div>
          <div class="fr content_r">
              <div>
                <input class="na mr40" type="text" placeholder="Name：">
                <select  id="select">
                  <option value="Country：">Country：</option>
				  <!-- db mark -->
                </select>
              </div>
              <div class="mt35">
                  <input class="Address" type="text" placeholder="Address：">
              </div>
              <div class="mt35">
                  <input class="na mr40" type="text" placeholder="Email：">
                  <input class="na" type="text" placeholder="Tel：">
                </div>
              <input type="submit" value="Save" class="save_btn" id="save">
          </div>
      </div>
   </div>
   <div class="footer">
      <div class="wrapper clear">
          <h3 class="tit">USA&Worldwide</h3>        
          <div class="fl he_title">
              <h3>Customer Service </h3>
              <ul>
                <li>
                  <a href="">Help / FAQs</a>
                </li>
                <li>
                  <a href="">Order status / Reorder</a>
                </li>
                <li>
                  <a href="">Rewards Program</a>
                </li>
                <li>
                  <a href="">Shipping and Delivery</a>
                </li>
                  <li>
                    <a href="">Guarantee & Returns</a>
                  </li>
              </ul>
          </div>
          <div class="fl he_title">
              <h3>Our Company</h3>
              <ul>
                <li>
                  <a href="">About us</a>
                </li>
                <li>
                  <a href="">Contact us</a>
                </li>
                <li>
                  <a href="">Products</a>
                </li>
                <li>
                  <a href="">Responsibility</a>
                </li>
                 
              </ul>
          </div>
          <div class="fl he_title">
              <h3>Contact us </h3>
              <ul>
                <li>
                  <a href="">Instagram </a>
                </li>
                <li>
                  <a href="">Facebook</a>
                </li>
                <li>
                  <a href="">Twitter </a>
                </li>
                <li>
                  <a href="">Pinterest</a>
                </li>
                 
              </ul>
          </div>
          <div class="fl he_title">
              <h3>We accept</h3>
              <img src="images/pay.png" alt="">
          </div>
      </div>
      <div class="wrapper pic_icon">
          <a href="">
            <img src="images/face.png" alt="">
          </a>
          <a href="">
            <img src="images/face1.png" alt="">
          </a>
          <a href="">
            <img src="images/wx.png" alt="">
          </a>
      </div>
      <div class="wrapper copyright">
          © 2018  Joshua  INC. ALL RIGHTS RESERVED
      </div>
   </div>
   <!-- 弹窗 -->
  
</body>
<script>
  $(".bt2").hover(function (){
    $(this).find(".menu_list").slideDown();
  },function(){
    $(this).find(".menu_list").slideUp();
  })

  var swiper = new Swiper('.container',{
    autoplay:'2500',
    pagination:'.span'
  })

  $(".close").click(function (){
    $(this).parent().fadeOut();
    $(".fixed").hide();
  })
    
    $('#save').click(function () {
        alert('提交成功');
        alert('体验完成');
		<!-- db mark -->
    })


</script>
</html>