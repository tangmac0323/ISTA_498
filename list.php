<?php
include('header.php');
?>
   <div class="product_list_list" style="margin-top: 77px;">
     <div class="wrap" style="width: 1170px;">
        <h3 class="list_title" STYLE="font-family: 'CAI', '微软雅黑'; ">Clothing, Shoes & Jewelry</h3>
		<?php
			if (isset ( $_GET ['cate'] )) {
				//alert($_GET ['cate']);
				$curCate =  $_GET ['cate'];
			}
			
			
			function alert($msg) {
				echo "<script type='text/javascript'>alert('$msg');</script>";
			}
		?>
        <div class="tab_box">
          <span class="on" STYLE="font-family: 'CAI', '微软雅黑'; ">WOMEN'S</span>
          <span STYLE="font-family: 'CAI', '微软雅黑'; ">JEWELRY</span>
          <span STYLE="font-family: 'CAI', '微软雅黑'; ">MEN'S </span>
        </div>
        <div class="tab_box_list">
            <ul class="product_list clear">
                <li>
                    <div class="pic">
                        <a href="show.php">
                          <img src="https://static.oysho.cn/6/photos2/2018/V/3/1/p/0055/351/699/0055351699_1_1_4.jpg?t=1519233229425" alt="">
                        </a>
                    </div>
                    <p class="produce_name">aglifdgf</p>
                    <p class="infor">haohaoa</p>
                    <p class="price">
                      us$250
                    </p>
                    <p class="size"></p>
                </li>
                <li>
                    <div class="pic">
                        <a href="show.php">
                          <img src="https://static.oysho.cn/6/photos2/2018/V/3/1/p/1217/017/800/1217017800_1_1_4.jpg?t=1522254338262" alt="">
                        </a>
                    </div>
                    <p class="produce_name">aglifdgf</p>
                    <p class="infor">haohaoa</p>
                    <p class="price">
                      us$250
                    </p>
                    <p class="size"></p>
                </li>
                <li>
                    <div class="pic">
                        <a href="show.php">
                          <img src="https://static.oysho.cn/6/photos2/2018/V/3/1/p/0242/365/699/0242365699_2_2_4.jpg?t=1522775091535" alt="">
                        </a>
                    </div>
                    <p class="produce_name">aglifdgf</p>
                    <p class="infor">haohaoa</p>
                    <p class="price">
                      us$250
                    </p>
                    <p class="size"></p>
                </li>
                <li>
                    <div class="pic">
                        <a href="show.php">
                          <img src="https://static.oysho.cn/6/photos2/2018/V/3/1/p/0282/368/701/0282368701_1_1_4.jpg?t=1519829456044" alt="">
                        </a>
                    </div>
                    <p class="produce_name">aglifdgf</p>
                    <p class="infor">haohaoa</p>
                    <p class="price">
                      us$250
                    </p>
                    <p class="size"></p>
                </li>
                <li>
                    <div class="pic">
                        <a href="show.php">
                          <img src="https://static.oysho.cn/6/photos2/2018/V/3/1/p/0242/365/699/0242365699_2_3_4.jpg?t=1522775091535" alt="">
                        </a>
                    </div>
                    <p class="produce_name">aglifdgf</p>
                    <p class="infor">haohaoa</p>
                    <p class="price">
                      us$250
                    </p>
                    <p class="size"></p>
                </li>
                <li>
                    <div class="pic">
                        <a href="show.php">
                          <img src="https://static.oysho.cn/6/photos2/2018/V/3/1/p/0282/368/701/0282368701_2_2_4.jpg?t=1519829456044" alt="">
                        </a>
                    </div>
                    <p class="produce_name">aglifdgf</p>
                    <p class="infor">haohaoa</p>
                    <p class="price">
                      us$250
                    </p>
                    <p class="size"></p>
                </li>
            </ul>
            <ul class="product_list clear" style="display:none;">
                <li>
                    <div class="pic">
                        <a href="show.php">
                            <img src="images/2.jpg" alt="">
                        </a>
                    </div>
                    <p class="produce_name">alice+abc</p>
                    <p class="infor">Sherily Cupcakes大号小包</p>
                    <p class="price">
                        us$270
                    </p>
                    <p class="size"></p>
                </li>
                <li>
                    <div class="pic">
                        <a href="show.php">
                          <img src="images/pic02.jpg" alt="">
                        </a>
                    </div>
                    <p class="produce_name">aglifdgf</p>
                    <p class="infor">haohaoa</p>
                    <p class="price">
                      us$250
                    </p>
                    <p class="size"></p>
                </li>
                <li>
                    <div class="pic">
                        <a href="show.php">
                          <img src="images/pic02.jpg" alt="">
                        </a>
                    </div>
                    <p class="produce_name">aglifdgf</p>
                    <p class="infor">haohaoa</p>
                    <p class="price">
                      us$250
                    </p>
                    <p class="size"></p>
                </li>
                <li>
                    <div class="pic">
                        <a href="show.php">
                          <img src="images/pic02.jpg" alt="">
                        </a>
                    </div>
                    <p class="produce_name">aglifdgf</p>
                    <p class="infor">haohaoa</p>
                    <p class="price">
                      us$250
                    </p>
                    <p class="size"></p>
                </li>
                <li>
                    <div class="pic">
                        <a href="show.php">
                          <img src="images/pic02.jpg" alt="">
                        </a>
                    </div>
                    <p class="produce_name">aglifdgf</p>
                    <p class="infor">haohaoa</p>
                    <p class="price">
                      us$250
                    </p>
                    <p class="size"></p>
                </li>


            </ul>
            <ul class="product_list clear" style="display:none;">
                <li>
                    <div class="pic">
                        <a href="show.php">
                          <img src="images/3.jpg" alt="">
                        </a>
                    </div>
                    <p class="produce_name">aglifdgf</p>
                    <p class="infor">haohaoa</p>
                    <p class="price">
                      us$250
                    </p>
                    <p class="size"></p>
                </li>
                <li>
                    <div class="pic">
                        <a href="show.php">
                          <img src="images/pic02.jpg" alt="">
                        </a>
                    </div>
                    <p class="produce_name">aglifdgf</p>
                    <p class="infor">haohaoa</p>
                    <p class="price">
                      us$250
                    </p>
                    <p class="size"></p>
                </li>
                <li>
                    <div class="pic">
                        <a href="show.php">
                          <img src="images/pic02.jpg" alt="">
                        </a>
                    </div>
                    <p class="produce_name">aglifdgf</p>
                    <p class="infor">haohaoa</p>
                    <p class="price">
                      us$250
                    </p>
                    <p class="size"></p>
                </li>
                <li>
                    <div class="pic">
                        <a href="show.php">
                          <img src="images/pic02.jpg" alt="">
                        </a>
                    </div>
                    <p class="produce_name">aglifdgf</p>
                    <p class="infor">haohaoa</p>
                    <p class="price">
                      us$250
                    </p>
                    <p class="size"></p>
                </li>
                <li>
                    <div class="pic">
                        <a href="show.php">
                          <img src="images/pic02.jpg" alt="">
                        </a>
                    </div>
                    <p class="produce_name">aglifdgf</p>
                    <p class="infor">haohaoa</p>
                    <p class="price">
                      us$250
                    </p>
                    <p class="size"></p>
                </li>
            </ul>
            <ul class="product_list clear" style="display:none;">
                <li>
                    <div class="pic">
                        <a href="show.php">
                          <img src="images/4.jpg" alt="">
                        </a>
                    </div>
                    <p class="produce_name">aglifdgf</p>
                    <p class="infor">haohaoa</p>
                    <p class="price">
                      us$250
                    </p>
                    <p class="size"></p>
                </li>
                <li>
                    <div class="pic">
                        <a href="show.php">
                          <img src="images/pic02.jpg" alt="">
                        </a>
                    </div>
                    <p class="produce_name">aglifdgf</p>
                    <p class="infor">haohaoa</p>
                    <p class="price">
                      us$250
                    </p>
                    <p class="size"></p>
                </li>
                <li>
                    <div class="pic">
                        <a href="show.php">
                          <img src="images/pic02.jpg" alt="">
                        </a>
                    </div>
                    <p class="produce_name">aglifdgf</p>
                    <p class="infor">haohaoa</p>
                    <p class="price">
                      us$250
                    </p>
                    <p class="size"></p>
                </li>
                <li>
                    <div class="pic">
                        <a href="show.php">
                          <img src="images/pic02.jpg" alt="">
                        </a>
                    </div>
                    <p class="produce_name">aglifdgf</p>
                    <p class="infor">haohaoa</p>
                    <p class="price">
                      us$250
                    </p>
                    <p class="size"></p>
                </li>
                <li>
                    <div class="pic">
                        <a href="show.php">
                          <img src="images/pic02.jpg" alt="">
                        </a>
                    </div>
                    <p class="produce_name">aglifdgf</p>
                    <p class="infor">haohaoa</p>
                    <p class="price">
                      us$250
                    </p>
                    <p class="size"></p>
                </li>
            </ul>
            <ul class="product_list clear" style="display:none;">
                <li>
                    <div class="pic">
                        <a href="show.php">
                          <img src="images/5.jpg" alt="">
                        </a>
                    </div>
                    <p class="produce_name">aglifdgf</p>
                    <p class="infor">haohaoa</p>
                    <p class="price">
                      us$250
                    </p>
                    <p class="size"></p>
                </li>
                <li>
                    <div class="pic">
                        <a href="show.php">
                          <img src="images/pic02.jpg" alt="">
                        </a>
                    </div>
                    <p class="produce_name">aglifdgf</p>
                    <p class="infor">haohaoa</p>
                    <p class="price">
                      us$250
                    </p>
                    <p class="size"></p>
                </li>
                <li>
                    <div class="pic">
                        <a href="show.php">
                          <img src="images/pic02.jpg" alt="">
                        </a>
                    </div>
                    <p class="produce_name">aglifdgf</p>
                    <p class="infor">haohaoa</p>
                    <p class="price">
                      us$250
                    </p>
                    <p class="size"></p>
                </li>
                <li>
                    <div class="pic">
                        <a href="show.php">
                          <img src="images/pic02.jpg" alt="">
                        </a>
                    </div>
                    <p class="produce_name">aglifdgf</p>
                    <p class="infor">haohaoa</p>
                    <p class="price">
                      us$250
                    </p>
                    <p class="size"></p>
                </li>
                <li>
                    <div class="pic">
                        <a href="show.php">
                          <img src="images/pic02.jpg" alt="">
                        </a>
                    </div>
                    <p class="produce_name">aglifdgf</p>
                    <p class="infor">haohaoa</p>
                    <p class="price">
                      us$250
                    </p>
                    <p class="size"></p>
                </li>
            </ul>
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
<?php

include('tan.php');
?>
</body>
<script>
  $(".bt2").hover(function (){
    $(this).find(".menu_list").slideDown();
  },function(){
    $(this).find(".menu_list").slideUp();
  })

$(".tab_box span").click(function (){
  $(this).addClass('on').siblings().removeClass();
  var index=$(this).index();
   $(".product_list").eq(index).show().siblings().hide();
})

  $(".close").click(function (){
    $(this).parent().fadeOut();
    $(".fixed").hide();
  })


</script>
<script type="text/javascript" src="js/common.js"></script>
</html>