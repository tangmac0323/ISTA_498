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
							<a href="adminAddItem.php">Add/Update Item</a>
						</li>
						<li>
							<a href="adminAddImage.php">Add/Update Images</a>
						</li>
						<li>
							<a href="logout.php?mode=true">Logout</a>
						</li>
					</ul>
			</div>
			<div class="fr content_r">
				<!--
				<form method='POST' action='uploadFile.php' enctype='multipart/form-data'>
				-->
					<div>
						<input class="na mr40" type="text" name="itemTagName" id="itemTagName" placeholder="ItemTagName:" value="">
						<select  id="select" name="select">
							<option value="">ItemCategory：</option>
							<option value="Women" >Women</option>
							<option value="Men" >Men</option>
							<option value="Jewelry" >Jewelry</option>
						</select>
					</div>
					<div class="mt35">
						<input class="na mr40" type="text" name="itemDescription" id="itemDescription" placeholder="ItemDescription：" value="">
						<select id="selectColor" name="selectColor">
							<option value="">ItemColor：</option>
							<option value="WHITE" >WHITE</option>
							<option value="BLACK" >BLACK</option>
							<option value="BROWN" >BROWN</option>
						</select>
					</div>
					<div class="mt35">					
						<input class="na mr40" type="text" name="itemSize" id="itemSize" placeholder="ItemSize：" value="">
						<input class="na" type="text" name="itemPrice：" id="itemPrice" placeholder="ItemPrice：" value="">
					</div>
					<!--  upload bar 
					<div class="input-group mb-3">
							<div class="custom-file">
								<input type="file" multiple="" class="custom-file-input" name="inputGroupFile01[]" id="inputGroupFile01">
								<label class="custom-file-label" for="inputGroupFile01">File should be jpg, named in form "preview.jpg/itemTagName_small/mid/big_01/02/03.jpg"</label>
							</div>
					</div>	
					-->
					<input type="submit" value="Submit" class="save_btn" id="submitbtn" name="submitbtn">
				<!--
				</form>
				-->
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
			var itemTagName = $('#itemTagName').val();
			if (itemTagName == "") {
				itemTagName = 'N/A';
			}
			
			var itemDescription = $('#itemDescription').val();
			if (itemDescription == "") {
				itemDescription = 'N/A';
			}
			
			var itemPrice = $('#itemPrice').val();
			if (itemPrice == "") {
				itemPrice = 0;
			}		
			
			var itemSize = $('#itemSize').val();
			if (itemSize == "") {
				itemSize = 'N/A';
			}
			
			var itemCategory = $('#select').val();
			if (itemCategory == "") {
				itemCategory = 'N/A';
			}
			
			var itemColor = $('#selectColor').val();
			if (itemColor == "") {
				itemColor = 'N/A';
			}
			
				
			$.ajax({
					url:'uploadFile.php',
					type:'POST', //GET
					async:true,    //或false,是否异步
					data:{
						itemTagName:itemTagName,
						itemDescription:itemDescription,
						itemPrice:itemPrice,
						itemSize:itemSize,
						itemCategory:itemCategory,
						itemColor:itemColor
					},

					success:function(data){
						
						console.log(itemTagName);
						console.log(itemDescription);
						console.log(itemPrice);
						console.log(itemSize);
						console.log(itemCategory);
						console.log(itemColor);
						
						
						alert(data);
						//window.location.href = 'adminAddItem.php';
						/*
						if(data == 1){		
							alert('Upload done');					
							window.location.href = 'adminAddItem.php';
						}
						else {
							alert('Upload failed');
							window.location.href = 'adminAddItem.php';
						}
						*/
					},

			})

	})		
})

   
</script>