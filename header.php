


<?php
session_start();
require_once('./DatabaseAdaptor.php');

if(!isset($_SESSION['islogin'])){
	$_SESSION['islogin'] = 0;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>


<!-- bootstrap plugin -->
<link rel="stylesheet" href="css/bootstrap.min.css">





<script src="http://code.jquery.com/jquery-3.3.1.min.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
<script src="js/bootstrap.min.js"></script>


    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title></title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/swiper.min.css">
    <script src="js/jquery.1.4.2-min.js"></script>
	 <script src="js/swiper.min.js"></script>
    
   
    <script src="https://cdn.bootcss.com/jquery-cookie/1.4.1/jquery.cookie.min.js"></script>
</head>
<body>
<?php
	if(strpos('member.php',$_SERVER['PHP_SELF'])===false){
?>
	<body class="header">
<?php
	}else{
?>
    <body class="huiyua_bd">
    <div class="header">
<?php

}

?>

    <div class="wrap clear" style="position:fixed;left: 0px;right: 0px;top: 0px; background: #ffffff; margin: auto;z-index: 9999; height: 77px;">
        <a href="index.php" class="fl logo">
            <img src="images/logo.png" alt="">
        </a>
        <div class="fr btn_list">
            <ul class="clear">

			    <li class="bt0">
                    <input type="text" name="bt0_orderID" id="bt0_orderID" value="" placeholder="Search for product.." title="Type in an order ID">
				</li>
                <li class="bt1">
                    <i class="search" id="searchBtn" name="searchBtn"></i>
                </li>
				
                <li class="bt2">
                    <i class="menu"></i>
                    <div class="menu_list">
                        <h3>Departments</h3>
                        <ul class="menu_list_lsit">
                            <li>
                                <a href="list.php">Prime Video</a>
                                <b>></b>
                            </li>
                            <li>
                                <a href="list.php">Amazon Music</a>
                                <b>></b>
                            </li>
                            <li>
                                <a href="list.php">Appstore for Android</a>
                                <b>></b>
                            </li>
                            <li>
                                <a href="list.php">Echo & Alexa</a>
                                <b>></b>
                            </li>
                            <li>
                                <a href="list.php">Fire Tablets</a>
                                <b>></b>
                            </li>
                            <li>
                                <a href="list.php">Fire TV</a>
                                <b>></b>
                            </li>
                            <li>
                                <a href="list.php">Kindle E-readers & Books</a>
                                <b>></b>
                            </li>
                            <li>
                                <a href="list.php">Books & Audible</a>
                                <b>></b>
                            </li>
                            <li>
                                <a href="list.php">Movies, Music & Games</a>
                                <b>></b>
                            </li>
                            <li>
                                <a href="list.php">Electronics, Computers & Office</a>
                                <b>></b>
                            </li>
                            <li>
                                <a href="list.php">Food & Grocery</a>
                                <b>></b>
                            </li>
                            <li>
                                <a href="list.php">Beauty & Health/a>
                                    <b>></b>
                            </li>
                            <li>
                                <a href="list.php">Toys, Kids & Baby</a>
                                <b>></b>
                            </li>
                            <li>
                                <a href="list.php?cate=14">Clothing, Shoes & Jewelry</a>
                                <b>></b>
                            </li>
                            <li>
                                <a href="list.php">Handmade</a>
                                <b>></b>
                            </li>
                            <li>
                                <a href="list.php">Sports & Outdoors</a>
                                <b>></b>
                            </li>
                            <li>
                                <a href="list.php">Automotive & Industria</a>
                                <b>></b>
                            </li>
                        </ul>
                    </div>
                </li>
                <li class="bt3">
                    <i class="shuliang" style="display: block;">
                        <span class="number" id="number"><?php
							if (isset($_SESSION['CartNum'])) {
								echo $_SESSION['CartNum'];
							}
							else{
								echo 0;
							}

						?></span>
                    </i>
					<!--
                    <div style="position: absolute; width:283px;height: 343px;border: 1px solid #7d7c7c;background: #ffffff;z-index:3;right: 20px;  display: none;" class="menu_list2" id="menu_list2">
                        <ul id="cartlist">
                            <li  style="padding-left: 10px; padding-right: 10px; padding-top: 10px;">
                                <div style="float: left; width: 53px; height: 78px;"><img src="small/01.jpg" width="53" height="78"></div>
                                <div style="float: right;color: #000000;line-height: 20px;">
                                    <p>SPIKY JACK</p>
                                    <p>size</p>
                                    <p>black</p>
                                    <p>158*<span><script>document.write($.cookie("num"));</script></span></p>
                                </div>
                            </li>

                        </ul>
                        <div style="width: 260px; margin: 0 auto; background: #000000; height: 40px; text-align: center;color: #fffffF; line-height: 40px; cursor: pointer; bottom: 4px;position: relative; top: 284px;" id="checkout"> CHECKOUT</div>
                    </div>
					-->
                </li>
                <li class="bt4">
                    <i class="my">
                    </i>
                </li>
            </ul>
        </div>
    </div>
</div>
    <script type="text/javascript">
		
		/*
        $(function () {
             $('#number').show();
		});
		*/



        $(".bt3").hover(function (){
            $(this).find(".menu_list2").slideDown();

        },function(){
            $(this).find(".menu_list2").slideUp();

        });
		
		$(".search").click( function() {
			
			var searchText = document.getElementById("bt0_orderID").value;
			
			if (searchText == "") {
				return;
			}
			
			console.log("Searching: " + searchText);
			
			$.ajax({
				url:'searchFunc.php',
				type:'POST',
				async:true,
				data:{
					searchTarget:searchText,
				},
					
				success:function(data) {
					//alert(data);			
					
					if (data != 0) {
						console.log("Teleport to the target page");
						window.location.href = "show.php?itemTag=" + searchText + "&cate=" + jQuery.parseJSON(data);
					}
					else{
						console.log("Target not found");
					}
					
					
				}	
			});
		});
		
		
		
 // document.write($.cookie("num"))</script>