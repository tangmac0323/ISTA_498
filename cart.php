<?php

include('header.php');
//session_start();

if(isset($_SESSION['name'])){
	
    $userInfoArray = $theDBA->getUserInfo($_SESSION['name']);
	foreach($userInfoArray as $info_db) {
		$fullname_db = 	$info_db['fullName'];
		$state_db = 	$info_db['stateName'];
		$email_db 	= 	$info_db['email'];
		$address_db = 	$info_db['address'];
		$telno_db 	= 	$info_db['telNo'];
	}
	

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
              <div>
				<input type="hidden" id="session" value="<?php echo $_SESSION['name']; ?>">
                <input class="na mr40" type="text" name="fullname" id="fullname" placeholder="Name：" value="<?php
					if ($fullname_db != 'N/A'){
						echo $fullname_db;
					}
				?>">
                <select  id="select" name="select">
					<option value="">State：</option>
					<option value="AL" <?php if($state_db == 'AL'){ ?>selected="selected"<?php }?>>Alabama</option>
					<option value="AK" <?php if($state_db == 'AK'){ ?>selected="selected"<?php }?>>Alaska</option>
					<option value="AZ" <?php if($state_db == 'AZ'){ ?>selected="selected"<?php }?>>Arizona</option>
					<option value="AR" <?php if($state_db == 'AR'){ ?>selected="selected"<?php }?>>Arkansas</option>
					<option value="CA" <?php if($state_db == 'CA'){ ?>selected="selected"<?php }?>>California</option>
					<option value="CO" <?php if($state_db == 'CO'){ ?>selected="selected"<?php }?>>Colorado</option>
					<option value="CT" <?php if($state_db == 'CT'){ ?>selected="selected"<?php }?>>Connecticut</option>
					<option value="DE" <?php if($state_db == 'DE'){ ?>selected="selected"<?php }?>>Delaware</option>
					<option value="DC" <?php if($state_db == 'DC'){ ?>selected="selected"<?php }?>>District Of Columbia</option>
					<option value="FL" <?php if($state_db == 'FL'){ ?>selected="selected"<?php }?>>Florida</option>
					<option value="GA" <?php if($state_db == 'GA'){ ?>selected="selected"<?php }?>>Georgia</option>
					<option value="HI" <?php if($state_db == 'HI'){ ?>selected="selected"<?php }?>>Hawaii</option>
					<option value="ID" <?php if($state_db == 'ID'){ ?>selected="selected"<?php }?>>Idaho</option>
					<option value="IL" <?php if($state_db == 'IL'){ ?>selected="selected"<?php }?>>Illinois</option>
					<option value="IN" <?php if($state_db == 'IN'){ ?>selected="selected"<?php }?>>Indiana</option>
					<option value="IA" <?php if($state_db == 'IA'){ ?>selected="selected"<?php }?>>Iowa</option>
					<option value="KS" <?php if($state_db == 'KS'){ ?>selected="selected"<?php }?>>Kansas</option>
					<option value="KY" <?php if($state_db == 'KY'){ ?>selected="selected"<?php }?>>Kentucky</option>
					<option value="LA" <?php if($state_db == 'LA'){ ?>selected="selected"<?php }?>>Louisiana</option>
					<option value="ME" <?php if($state_db == 'ME'){ ?>selected="selected"<?php }?>>Maine</option>
					<option value="MD" <?php if($state_db == 'MD'){ ?>selected="selected"<?php }?>>Maryland</option>
					<option value="MA" <?php if($state_db == 'MA'){ ?>selected="selected"<?php }?>>Massachusetts</option>
					<option value="MI" <?php if($state_db == 'MI'){ ?>selected="selected"<?php }?>>Michigan</option>
					<option value="MN" <?php if($state_db == 'MN'){ ?>selected="selected"<?php }?>>Minnesota</option>
					<option value="MS" <?php if($state_db == 'MS'){ ?>selected="selected"<?php }?>>Mississippi</option>
					<option value="MO" <?php if($state_db == 'MO'){ ?>selected="selected"<?php }?>>Missouri</option>
					<option value="MT" <?php if($state_db == 'MT'){ ?>selected="selected"<?php }?>>Montana</option>
					<option value="NE" <?php if($state_db == 'NE'){ ?>selected="selected"<?php }?>>Nebraska</option>
					<option value="NV" <?php if($state_db == 'NV'){ ?>selected="selected"<?php }?>>Nevada</option>
					<option value="NH" <?php if($state_db == 'NH'){ ?>selected="selected"<?php }?>>New Hampshire</option>
					<option value="NJ" <?php if($state_db == 'NJ'){ ?>selected="selected"<?php }?>>New Jersey</option>
					<option value="NM" <?php if($state_db == 'NM'){ ?>selected="selected"<?php }?>>New Mexico</option>
					<option value="NY" <?php if($state_db == 'NY'){ ?>selected="selected"<?php }?>>New York</option>
					<option value="NC" <?php if($state_db == 'NC'){ ?>selected="selected"<?php }?>>North Carolina</option>
					<option value="ND" <?php if($state_db == 'ND'){ ?>selected="selected"<?php }?>>North Dakota</option>
					<option value="OH" <?php if($state_db == 'OH'){ ?>selected="selected"<?php }?>>Ohio</option>
					<option value="OK" <?php if($state_db == 'OK'){ ?>selected="selected"<?php }?>>Oklahoma</option>
					<option value="OR" <?php if($state_db == 'OR'){ ?>selected="selected"<?php }?>>Oregon</option>
					<option value="PA" <?php if($state_db == 'PA'){ ?>selected="selected"<?php }?>>Pennsylvania</option>
					<option value="RI" <?php if($state_db == 'RI'){ ?>selected="selected"<?php }?>>Rhode Island</option>
					<option value="SC" <?php if($state_db == 'SC'){ ?>selected="selected"<?php }?>>South Carolina</option>
					<option value="SD" <?php if($state_db == 'SD'){ ?>selected="selected"<?php }?>>South Dakota</option>
					<option value="TN" <?php if($state_db == 'TN'){ ?>selected="selected"<?php }?>>Tennessee</option>
					<option value="TX" <?php if($state_db == 'TX'){ ?>selected="selected"<?php }?>>Texas</option>
					<option value="UT" <?php if($state_db == 'UT'){ ?>selected="selected"<?php }?>>Utah</option>
					<option value="VT" <?php if($state_db == 'VT'){ ?>selected="selected"<?php }?>>Vermont</option>
					<option value="VA" <?php if($state_db == 'VA'){ ?>selected="selected"<?php }?>>Virginia</option>
					<option value="WA" <?php if($state_db == 'WA'){ ?>selected="selected"<?php }?>>Washington</option>
					<option value="WV" <?php if($state_db == 'WV'){ ?>selected="selected"<?php }?>>West Virginia</option>
					<option value="WI" <?php if($state_db == 'WI'){ ?>selected="selected"<?php }?>>Wisconsin</option>
					<option value="WY" <?php if($state_db == 'WY'){ ?>selected="selected"<?php }?>>Wyoming</option>					
                </select>
              </div>
              <div class="mt35">
                  <input class="Address" type="text" name="address" id="address" placeholder="Address：" value="<?php
					if ($address_db != 'N/A'){
						echo $address_db;
					}
				  ?>">
              </div>
              <div class="mt35">
			  
					
                  <input class="na mr40" type="text" name="email" id="email" value="<?php 
						if ($email_db != 'N/A'){
							echo $email_db;
						}
						else {
							echo $_SESSION['name'];
						}
					?>">
                  <input class="na" type="text" name="telno" id="telno" placeholder="Tel：" value="<?php
						if ($telno_db != 'N/A'){
							echo $telno_db;
						}
				  ?>">
                </div>
              <input type="submit" value="Save" class="save_btn" id="savebtn" name="savebtn">
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
