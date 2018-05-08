<?php

include('header.php');
//session_start();

if(isset($_SESSION['name'])){
	
}

?>
   <div class="section" style="margin-top: 77px;">
      <div class="content clear">
          <div class="fl content_f">
				<ul>
					<li>
						<a href="adminAddItem.php">Add Item</a>
					</li>
					<li>
						<a href="adminUpdateItem.php">Update Item</a>
					</li>
					<li>
						<a href="logout.php?mode=true">Logout</a>
					</li>
				</ul>
          </div>
          <div class="fr content_r">
              <div>
                <input class="na mr40" type="text" name="itemTagName" id="itemTagName" placeholder="ItemTagName:" value="">
                <select  id="select" name="select">
					<option value="">ItemCategory：</option>
					<option value="Women" >Women</option>
					<option value="Women" >Men</option>
					<option value="Women" >Jewelry</option>
                </select>
              </div>
              <div class="mt35">
                  <input class="Address" type="text" name="itemDescription" id="itemDescription" placeholder="ItemDescription：" value="">
              </div>
              <div class="mt35">					
                  <input class="na mr40" type="text" name="itemSize" id="itemSize" placeholder="ItemSize：" value="">
                  <input class="na" type="text" name="telno" id="telno" placeholder="Tel：" value="">
                </div>
              <input type="submit" value="Submit" class="save_btn" id="submitbtn" name="submitbtn">
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
	$('#submitbtn').click(function () {
			
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