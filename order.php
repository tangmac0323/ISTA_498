<?php

include('header.php');
//session_start();


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
				<div style="overflow-y:scroll;height:320px;">		
					<div id="accordion">
						<?php 
							if(isset($_SESSION['name'])){
								$orderArray = $theDBA->getOrderInfoByUser($_SESSION['name']);
								$index = 0;
								$offset = '';
							}
							if ($orderArray != null) {
								foreach ($orderArray as $order) {
									$index++;
									if ($index > 9) {
										break;
									}
									if ($index == 1) { $offset = 'One';}
									else if ($index == 2) { $offset = 'Two';}
									else if ($index == 3) { $offset = 'Three';}
									else if ($index == 4) { $offset = 'Four';}
									else if ($index == 5) { $offset = 'Five';}
									else if ($index == 6) { $offset = 'Six';}
									else if ($index == 7) { $offset = 'Seven';}
									else if ($index == 8) { $offset = 'Eight';}
									else if ($index == 9) { $offset = 'Nine';}
									?>
									<div class="card">
										<div class="card-header" id="heading<?php echo $offset;?>">
										<h5 class="mb-0">
											<button class="btn btn-link" data-toggle="collapse" data-target="#collapse<?php echo $offset;?>" aria-expanded="true" aria-controls="collapse<?php echo $offset;?>">
												<?php echo "Order ID: ".$order['orderID']." Order Date: ".$order['orderDate'];?>
											</button>
										</h5>
										</div>

										<div id="collapse<?php echo $offset;?>" class="collapse show" aria-labelledby="heading<?php echo $offset;?>" data-parent="#accordion">
											<div class="card-body" style="overflow-y:scroll;height:80px;">
												<?php 
													$orderInfoArray = $theDBA->getOrderInfoByOrder($order['orderID'], $_SESSION['name']);
													foreach ($orderInfoArray as $orderInfo) {	
												?>
												<div><font color="blue">  ItemName: </font><?php echo $orderInfo['itemTagName']; ?><font color="blue">  ItemSize: </font><?php echo $orderInfo['itemSize']; ?><font color="blue">  ItemColor: </font><?php echo $orderInfo['itemColor']; ?><font color="blue">	Quantity: </font><?php echo $orderInfo['quantity']; ?></div>
												<?php }?>
											</div>
										</div>
									</div>
							<?php }} ?>
					</div>				
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
		  })
    
	
</script>
<script>
$(function(){
	$('#savebtn').click(function () {
			
			//console.log('save');
			// extract the value from the input form
			var inputName = $('#fullname').val();
			if (inputName == "") {
				inputName = 'N/A';
			}
			
			var address = $('#address').val();
			if (address == "") {
				address = 'N/A';
			}
			
			var emailAddr = $('#email').val();
			if (emailAddr == "") {
				emailAddr = 'N/A';
			}		
			
			var telNo = $('#telno').val();
			if (telNo == "") {
				telNo = 'N/A';
			}
			
			var state = $('#select').val();
			if (state == "") {
				state = 'N/A';
			}
			
			var session_loginname = document.getElementById("session").value;
			
			
			console.log(session_loginname);
				
			$.ajax({
					url:'updateUserInfo.php',
					type:'POST', //GET
					async:true,    //或false,是否异步
					data:{
						username:session_loginname,
						fullname:inputName,
						address:address,
						email:emailAddr,
						telNo:telNo,
						stateName:state,
					},

					success:function(data){
						
						alert(data);
						
						if(data == 1){		
							alert('Update done');					
							window.location.href = 'member.php';
						}
						else {
							alert('Update failed');
						}
					},

			})

	})		
})
   
</script>
