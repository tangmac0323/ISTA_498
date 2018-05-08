<?php

include('header.php');
//session_start();

if(isset($_SESSION['name'])){
	
    $cartInfoArray = $theDBA->getCartInfo($_SESSION['name']);
	/*
	foreach($userInfoArray as $info_db) {
		$fullname_db = 	$info_db['fullName'];
		$state_db = 	$info_db['stateName'];
		$email_db 	= 	$info_db['email'];
		$address_db = 	$info_db['address'];
		$telno_db 	= 	$info_db['telNo'];
	}
	*/

}

?>
   <div class="section" style="margin-top: 77px;">
      <div class="content clear">
          <div class="fl content_f">
				<ul>
					<li>
						<a href="member.php">My account</a>
					</li>
					<li>
						<a href="order.php">My order</a>
					</li>
					<li>
						<a href="cart.php">My shopping cart</a>
					</li>
					<li>
						<a href="index.php">exit</a>
					</li>
				</ul>
          </div>
          <div class="fr content_r">
				<div style="overflow-y:scroll;height:300px;">
				<ul class="list-group">
				<?php
					// check if the cart is empty
					if ($cartInfoArray != NULL)  {
						foreach ($cartInfoArray as $cartItemInfo) {?>
					<li class="list-group-item"><font color="red">ItemName: </font><?php echo $cartItemInfo['itemTagName'] ?>
						<font color="red">ItemSize: </font><?php echo $cartItemInfo['itemSize'] ?>
						<font color="red">ItemColor: </font><?php echo $cartItemInfo['itemColor'] ?>
						<!-- add quantity adjustment button -->
						<span style="position: relative;float: right;">
							<form action="updateCart.php" method="post">
								<input type="hidden" name="itemID" value="<?php echo $cartItemInfo['itemID']; ?>">
								<button name="action" value="increase">+</button>
									<span id="sub_quantity">  <?php echo $cartItemInfo['quantity'] ?>  </span>
								<button name="action" value="decrease">-</button>
							</form>	
						</span>
					</li>
					
				<?php }} ?>
				</ul>
				</div>
				<br>
				<div align="center">Total Cost:	<?php 
									$total_cost = $theDBA->summaryCartCost($_SESSION['name']);
									echo $total_cost['totalCost']
					?>	</div>
				<br>	
				<div align="center">
					<form action="checkout.php" method="post">
						<button id="checkout" name="checkout">
							CHECKOUT
						</button>
					</form>
				</div>

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
		  $('#number').value = '0';
	})
    
	$(document).ready(function() {
		$('#number').show();
	});
	/*
		$(function () {
            $('#checkout').click(function () {
                $.ajax({
                    url:'checkout.php',
                    type:'POST', 	//GET
                    async:true,     //或false,是否异步
                    data:{
                        name:
                    },

                    success:function(data){
                        if(data == 1){
                            //$.cookie("num",null);
                            //alert('The end of the demo');
                            window.location.reload();
                            //window.location.href = 'index.php';
                        }else{
                            alert('Please login');
                        }
                    },
                })
            })
        })	
		*/
</script>

