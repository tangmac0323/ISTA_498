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
			
			
			// for demo usage, cate = 14
			if ($curCate == 14) {
			?>
				<div class="tab_box">
					<span class="on" STYLE="font-family: 'CAI', '微软雅黑'; ">WOMEN'S</span>
					<span STYLE="font-family: 'CAI', '微软雅黑'; ">JEWELRY</span>
					<span STYLE="font-family: 'CAI', '微软雅黑'; ">MEN'S </span>
				</div>
		<?php	
			}
		?>
		
		<!-- connect ot db -->
		<?php
			$itemTagArray_women = $theDBA->getItemTagAsArrayByCategory('WOMEN');
			$itemTagArray_men = $theDBA->getItemTagAsArrayByCategory('MEN');
			$itemTagArray_jewelry = $theDBA->getItemTagAsArrayByCategory('JEWELRY');
		?>
		
			
		<?php
			function alert($msg) {
				echo "<script type='text/javascript'>alert('$msg');</script>";
			}
		?>

        <div class="tab_box_list">
			<!-- Women-->
            <ul class="product_list clear">
				<?php 
				$index = 0;
				foreach ($itemTagArray_women as $itemTag_women) {
					$index++;
				?>
                <li>
                    <div class="pic">
                        <a href="show.php?itemTag=<?php echo $itemTag_women['itemTagName'] ?>&cate=Women">
							<img src="images/Cate<?php echo $curCate; ?>/Women/<?php echo $itemTag_women['itemTagName']; ?>_preview.jpg" alt="">
                        </a>
                    </div>
                    <p class="produce_name"><?php echo $itemTag_women['itemTagName'] ?></p>
					<!--
                    <p class="infor"><?php echo $itemTag_women['itemDescription'] ?></p>
					-->
                    <p class="price">
                      USD <?php echo $itemTag_women['itemPrice'] ?>
                    </p>
                    <p class="size"></p>
                </li>
				<?php }
				?>
            </ul>
			<!-- Jewelry -->
            <ul class="product_list clear" style="display:none;">
				<?php 
				$index = 0;
				foreach ($itemTagArray_jewelry as $itemTag_jewelry) {
					$index++;
				?>
                <li>
                    <div class="pic">
                        <a href="show.php?itemTag=<?php echo $itemTag_jewelry['itemTagName'] ?>&cate=Jewelry">
							<img src="images/Cate<?php echo $curCate; ?>/Jewelry/<?php echo $itemTag_jewelry['itemTagName']; ?>_preview.jpg" alt="">
                        </a>
                    </div>
                    <p class="produce_name"><?php echo $itemTag_jewelry['itemTagName'] ?></p>
					<!--
                    <p class="infor"><?php echo $itemTag_jewelry['itemDescription'] ?></p>
					-->
                    <p class="price">
                      USD <?php echo $itemTag_jewelry['itemPrice'] ?>
                    </p>
                    <p class="size"></p>
                </li>
				<?php }
				?>			
            </ul>
			<!-- Men -->
            <ul class="product_list clear" style="display:none;">
  				<?php 
				$index = 0;
				foreach ($itemTagArray_men as $itemTag_men) {
					$index++;
				?>
                <li>
                    <div class="pic">
                        <a href="show.php?itemTag=<?php echo $itemTag_men['itemTagName'] ?>&cate=Men">
							<img src="images/Cate<?php echo $curCate; ?>/Men/<?php echo $itemTag_men['itemTagName']; ?>_preview.jpg" alt="">
                        </a>
                    </div>
                    <p class="produce_name"><?php echo $itemTag_men['itemTagName'] ?></p>
					<!--
                    <p class="infor"><?php echo $itemTag_men['itemDescription'] ?></p>
					-->
                    <p class="price">
                      USD <?php echo $itemTag_men['itemPrice'] ?>
                    </p>
                    <p class="size"></p>
                </li>
				<?php }
				?>	              
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
	var index = $(this).index();
	$(".product_list").eq(index).show().siblings().hide();
})

$(".close").click(function (){
    $(this).parent().fadeOut();
    $(".fixed").hide();
})


</script>
<script type="text/javascript" src="js/common.js"></script>
</html>