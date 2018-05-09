<?php
include('header.php');


// for demo usage 
if (isset ( $_GET ['cate'] )) {
				//alert($_GET ['cate']);
	$curCate =  $_GET ['cate'];
}

if (isset ( $_GET ['itemTag'] )) {
				//alert($_GET ['cate']);
	$curTag =  $_GET ['itemTag'];
}

?>
<style>
    #u1 li{overflow: hidden;}
	#u1 li img{ height:326px; overflow:hidden;}
	#u1 li a{ height:326px; overflow:hidden;display:block;}
</style>
   <div class="wrap" style="margin-top: 77px;;">
   
     <!-- 面包屑导航 -->
     <div class="mianbao_nav">
        <a href="index.php">Home </a>
        <a href="">/</a>
        <a href="list.php?cate=14"><?php echo $curCate?></a>
        <a href="">/</a> 
        <a href=""><?php echo $curTag?></a>
     </div>
	 
	<input type="hidden" id="hiddencurTag" name="hiddencurTag" value="<?php echo $curTag;?>">
	<input type="hidden" id="hiddencurCate" name="hiddencurCate" value="<?php echo $curCate;?>">
	<input type="hidden" id="hiddencurName" name="hiddencurName" value="<?php echo $_SESSION['name'];?>"> 
	
     <div class="clear">
       <div class="img_l fl">
          <div class="preview clear">
              <i class="search_btn"></i>              
              <div class="scrollbutton smallImgUp disabled"></div>
              <div class="smallImg">
                  <div id="imageMenu">
                    <ul>
              
                      <li id="onlickImg"><img src="images/Storage/<?php echo $curCate ?>/<?php echo $curTag ?>/<?php echo $curTag ?>_small_01.jpg" width="68" height="68" alt="img_small_01"/></li>
              
                      <li><img src="images/Storage/<?php echo $curCate ?>/<?php echo $curTag ?>/<?php echo $curTag ?>_small_02.jpg" width="68" height="68" alt="img_small_02"/></li>
              
                      <li><img src="images/Storage/<?php echo $curCate ?>/<?php echo $curTag ?>/<?php echo $curTag ?>_small_03.jpg" width="68" height="68" alt="img_small_03"/></li>
					  
                    </ul>
              
                  </div>
                </div><!--smallImg end-->	
                <div class="scrollbutton smallImgDown"></div>                

              <div id="vertical" class="bigImg">
            
                <img src="images/Storage/Women/<?php echo $curTag; ?>/<?php echo $curTag; ?>_small_01.jpg" width="445" height="666" alt="img_medium" id="midimg" />
            
                <div style="display:none;" id="winSelector"></div>
            
              </div><!--bigImg end-->	
            
            
              <div id="bigView" style="display:none;">
                <img width="800" height="800" alt="" src="" />
              </div>
            
            </div>
            
            <!--preview end-->
       </div>
       <div class="fr img_r">
          <div class="paroduct_top clear">
			
              <h3 class="fl"><?php  echo $curTag;?></h3>
              <div class="share fr">
                  <!-- JiaThis Button BEGIN -->
                  <div class="jiathis_style" style="width: 115px;float:left;margin:2px 0 0 0;overflow: visible;">
                      <span class="jiathis_txt"></span>
                      <a class="jiathis_button_tsina"><img src="http://www.kivie.com.au/Home/Tpl/Public/images/icon_weibo.png"></a>
                      <a class="jiathis_button_weixin"><img src="http://www.kivie.com.au/Home/Tpl/Public/images/icon_wechat.png"></a>

                  </div>
                  <!-- JiaThis Button END -->
              </div>
          </div>
          <p class="price_detail">USD <?php 
				$itemTagInfo = $theDBA->getItemTagInfoByTag($curTag);
				echo $itemTagInfo[0]['itemPrice'];
		  ?></p>
          <p class="information"><?php
				$itemTagInfo = $theDBA->getItemTagInfoByTag($curTag);
				echo $itemTagInfo[0]['itemDescription'];
		  ?></p>
          <div>
            <p class="mingc">Colours</p>
			<!-- hidden element to store color 
			<input type="hidden" id="hiddencolor" name="hiddencolor" value="">
			-->
            <div class="color">
                <span class="on" id="BROWN"></span>
                <span id="BLACK"></span>
                <span id="WHITE"></span>
            </div>
			<script>
				colorMark = $(".color span:first-child").attr('id');
				//document.getElementById("hiddencolor").textContent = colorMark;
				
				/*
				function getItemSizeArray() {
					var curItemTag = document.getElementById("hiddencurTag").value;
					
					$.ajax({
						type: 'GET',
						url: 'getSizeList.php',
						data:{
							itemColor:colorMark,
							itemTagName:curItemTag
						},
						
						success:function(data) {
							var obj = jQuery.parseJSON(data);
							
							//function showObjectQuery(obj)
							
							//console.log(curItemTag);
							//console.log(colorMark);
							//console.log(obj);
							
							// write into array
							var content = "";
							$.each(obj, function (index, val) {
								if (index == 0) {
									content += "<span class='on' >" + val['itemSize'] + "</span>";
								}
								else {
									content += "<span>" + val['itemSize'] + "</span>";
								}
								//console.log(index);
							});
							var ele = document.getElementById("size_area");
							ele.innerHTML = content;
							
							
							var codes = ele.getElementsByTagName("script");   
							for(var i=0;i<codes.length;i++){  
								eval(codes[i].text);  
							} 
						
						}
						
					});
				}
				*/
			</script>
          </div>
		  <br>
		  <br>
          <div>
            <p class="mingc">Size</p>
			
            <div class="size_detail" id="size_area">
				<?php
					$sizeArray = $theDBA->getSizeArrayByItemTag($curTag);
					
					//print_r($sizeArray);
					
					$index = 0;
					
					foreach ($sizeArray as $sizeNum) {
						if ($index == 0) {
					?><span class="on" ><?php echo $sizeNum['itemSize']; ?></span><?php 
					}else{ ?><span><?php echo $sizeNum['itemSize']; ?></span><?php
						} $index++;}
					
					
					/*
					foreach ($sizeArray as $sizeNum) {
					?><span><?php echo $sizeNum['itemSize'];?></span><?php }
					*/
				?>			
            </div>
			<script>
				size = $(".size_detail span:first-child").text();
			</script>
          </div>
          <div>
            <p class="mingc">Quantity</p>
            <div class="clear">
                <div class="fl clear">
                   <span class="fl bbt jian">-</span>
						<input type="text" class="fl" id="select_num" value="1">
                    <span class="fl bbt zj">+</span>
                </div>
                <button class="adding fl">ADDING TO CART</button>
            </div>
            
          </div>
       </div>
     </div>
     <div class = "PRODUCTS_DETAIL">
        <h3>PRODUCTS_DETAIL</h3>
        <ul class="ll">
          <li>
              a ck black push up bra with allover lace detail, adjustable straps with v-neckline
          </li>
          <li>
              - asian fit

          </li>
              - v-neckline
          <li>
          - allover lace detail
            
          </li>
          <li>
              - allover lace detail
            
          </li>
          <li>
              - adjustable straps
            
          </li>
          <li>
              - cushion closure            
          </li>
        </ul>
     </div>
	 <
     <div class="PRODUCTS_DETAIL">
        <h3>PRODUCTS_DETAIL</h3>
        <ul class="u1" id="u1">
         <li>
           <a href="" style="">
             <img src="https://gd3.alicdn.com/imgextra/i3/1582342076/TB2q_LfaL5TBuNjSspcXXbnGFXa_!!1582342076.jpg" alt="" width="275" height="326">
           </a>
           <p style="line-height:50px;">风景印花及踝紧身裤</p>
           <div class="color">
              <span class="on"></span>
              <span></span>
              <span></span>
          </div>
          <p class="price">1213131</p>
         </li>
         <li>
            <a href="">
              <img src="https://img.alicdn.com/imgextra/i3/3511059755/TB26GnVe3mTBuNjy1XbXXaMrVXa_!!3511059755.jpg_430x430q90.jpg" alt="" width="275" height="326">
            </a>
            <p  style="line-height:50px;">砖瓦色钩编蕾絲经典三角裤</p>
            <div class="color">
               <span class="on"></span>
               <span></span>
               <span></span>
           </div>
          </li>
          <li>
              <a href="">
                <img src="https://img.alicdn.com/imgextra/i3/3511059755/TB2UUqXgx1YBuNjy1zcXXbNcXXa_!!3511059755.jpg_430x430q90.jpg" alt="" width="275" height="326">
              </a>
              <p  style="line-height:50px;">结饰缎面上衣</p>
              <div class="color">
                 <span class="on"></span>
                 <span></span>
                 <span></span>
             </div>
            </li>
            <li>
                <a href="">
                  <img src="https://img.alicdn.com/imgextra/i2/3511059755/TB2zI36d1uSBuNjy1XcXXcYjFXa_!!3511059755.jpg_430x430q90.jpg" alt="" width="275" height="326">
                </a>
                <p  style="line-height:50px;">缎面短版睡裙</p>
                <div class="color">
                   <span class="on"></span>
                   <span></span>
                   <span></span>
               </div>
              </li>
        </ul>
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

  $(document).ready(function(){

// 图片上下滚动

var count = $("#imageMenu li").length - 5; /* 显示 6 个 li标签内容 */

var interval = $("#imageMenu li:first").height();

var curIndex = 0;

console.log(interval);


$('.scrollbutton').click(function(){

  if( $(this).hasClass('disabled') ) return false;

  

  if ($(this).hasClass('smallImgUp')) --curIndex;

  else ++curIndex;

  

  $('.scrollbutton').removeClass('disabled');

  if (curIndex == 0) $('.smallImgUp').addClass('disabled');

  if (curIndex == count-1) $('.smallImgDown').addClass('disabled');

  

  $("#imageMenu ul").stop(false, true).animate({"marginTop" : -curIndex*interval + "px"}, 600);

});	

// 解决 ie6 select框 问题

$.fn.decorateIframe = function(options) {

      if ($.browser.msie && $.browser.version < 7) {

          var opts = $.extend({}, $.fn.decorateIframe.defaults, options);

          $(this).each(function() {

              var $myThis = $(this);

              //创建一个IFRAME

              var divIframe = $("<iframe />");

              divIframe.attr("id", opts.iframeId);

              divIframe.css("position", "absolute");

              divIframe.css("display", "none");

              divIframe.css("display", "block");

              divIframe.css("z-index", opts.iframeZIndex);

              divIframe.css("border");

              divIframe.css("top", "0");

              divIframe.css("left", "0");

              if (opts.width == 0) {

                  divIframe.css("width", $myThis.width() + parseInt($myThis.css("padding")) * 2 + "px");

              }

              if (opts.height == 0) {

                  divIframe.css("height", $myThis.height() + parseInt($myThis.css("padding")) * 2 + "px");

              }

              divIframe.css("filter", "mask(color=#fff)");

              $myThis.append(divIframe);

          });

      }

  }

  $.fn.decorateIframe.defaults = {

      iframeId: "decorateIframe1",

      iframeZIndex: -1,

      width: 0,

      height: 0

  }

  //放大镜视窗

  $("#bigView").decorateIframe();

  //点击到中图

  var midChangeHandler = null;



  $("#imageMenu li img").bind("click", function(){

  if ($(this).attr("id") != "onlickImg") {

    midChange($(this).attr("src").replace("small", "mid"));

    $("#imageMenu li").removeAttr("id");

    $(this).parent().attr("id", "onlickImg");

  }

}).bind("mouseover", function(){

  if ($(this).attr("id") != "onlickImg") {

    window.clearTimeout(midChangeHandler);

    midChange($(this).attr("src").replace("small", "mid"));

    $(this).css({ "border": "3px solid #959595" });

  }

}).bind("mouseout", function(){

  if($(this).attr("id") != "onlickImg"){

    $(this).removeAttr("style");

    midChangeHandler = window.setTimeout(function(){

      midChange($("#onlickImg img").attr("src").replace("small", "mid"));

    }, 1000);

  }

});

  function midChange(src) {

      $("#midimg").attr("src", src).load(function() {

          changeViewImg();

      });

  }

  //大视窗看图

  function mouseover(e) {

      if ($("#winSelector").css("display") == "none") {

          $("#winSelector,#bigView").show();

      }

      $("#winSelector").css(fixedPosition(e));

      e.stopPropagation();

  }

  function mouseOut(e) {

      if ($("#winSelector").css("display") != "none") {

          $("#winSelector,#bigView").hide();

      }

      e.stopPropagation();

  }

  $("#midimg").mouseover(mouseover); //中图事件

  $("#midimg,#winSelector").mousemove(mouseover).mouseout(mouseOut); //选择器事件



  var $divWidth = $("#winSelector").width(); //选择器宽度

  var $divHeight = $("#winSelector").height(); //选择器高度

  var $imgWidth = $("#midimg").width(); //中图宽度

  var $imgHeight = $("#midimg").height(); //中图高度

  var $viewImgWidth = $viewImgHeight = $height = null; //IE加载后才能得到 大图宽度 大图高度 大图视窗高度

  console.log( $imgHeight)

  function changeViewImg() {

      $("#bigView img").attr("src", $("#midimg").attr("src").replace("mid", "big"));

  }

  changeViewImg();

  $("#bigView").scrollLeft(0).scrollTop(0);

  function fixedPosition(e) {

      if (e == null) {

          return;

      }

      var $imgLeft = $("#midimg").offset().left; //中图左边距

      var $imgTop = $("#midimg").offset().top; //中图上边距

      X = e.pageX - $imgLeft - $divWidth / 2; //selector顶点坐标 X

      Y = e.pageY - $imgTop - $divHeight / 2; //selector顶点坐标 Y

      X = X < 0 ? 0 : X;

      Y = Y < 0 ? 0 : Y;

      X = X + $divWidth > $imgWidth ? $imgWidth - $divWidth : X;

      Y = Y + $divHeight > $imgHeight ? $imgHeight - $divHeight : Y;



      if ($viewImgWidth == null) {

          $viewImgWidth = $("#bigView img").outerWidth();

          $viewImgHeight = $("#bigView img").height();

          if ($viewImgWidth < 200 || $viewImgHeight < 200) {

              $viewImgWidth = $viewImgHeight = 800;

          }

          $height = $divHeight * $viewImgHeight / $imgHeight;

          $("#bigView").width($divWidth * $viewImgWidth / $imgWidth);

          $("#bigView").height($height*1.2);

      }

      var scrollX = X * $viewImgWidth / $imgWidth;

      var scrollY = Y * $viewImgHeight / $imgHeight;

      $("#bigView img").css({ "left": scrollX * -1, "top": scrollY * -1 });

      $("#bigView").css({ "top": 75, "left": $(".preview").offset().left + $(".preview").width() + 15 });



      return { left: X, top: Y };

  }

});

  $(".close").click(function (){
    $(this).parent().fadeOut();
    $(".fixed").hide();
  })



$(".color span").click(function (){
    $(this).addClass('on').siblings().removeClass();
	colorMark = $(this).attr('id');
	//var curItemTag = document.getElementById("hiddencurTag").value;
	//var curItemCate = document.getElementById("hiddencurCate").value;
	
	//window.location.href = 'show.php?color=' + colorMark + "&itemTag=" + curItemTag + "&cate=" + curItemCate;
	//getItemSizeArray();
	//document.getElementById("hiddencolor").textContent = colorMark;
})

$(".size_detail span").click(function (){
    $(this).addClass('on').siblings().removeClass();
	size = $(this).text();
})

  
$(".zj").click(function (){
  var total= parseInt($("#select_num").val())+1;
  $("#select_num").val(total)
})


$(".jian").click(function (){
  var total= parseInt($("#select_num").val())-1;
  if(total<=0){
    $("#select_num").val(1)
    return false;
  }
  $("#select_num").val(total)
})


$(".adding").click(function (){
    var quantity = parseInt($("#select_num").val()); 
	var curItemTag = document.getElementById("hiddencurTag").value;
	var curItemCate = document.getElementById("hiddencurCate").value;	
	
	var curName = document.getElementById("hiddencurName").value;
	
	if (curName == null){
		alert('Please Login First');
		return;
	}
	
	console.log(size);
	console.log(quantity);
	console.log(colorMark);
	console.log(curItemTag);
	console.log(curItemCate.toUpperCase());
	console.log(curName);
	
	
	$.ajax({
		url:'addToCart.php',
		type:'POST',
		async:true,
		data:{
			username:curName,
			itemTagName:curItemTag,
			itemCate:curItemCate,
			itemColor:colorMark,
			quantity:quantity,
			itemSize:size			
		},
		
		success:function(data) {
			
			//console.log(data.trim());
			
			if (data == 1) {
				alert("Add to cart done, continue");
				window.location.reload();

			}
			else if (data == 2){
				alert( "Dude you are the manager. Go work, no shopping XD" );
			}
			else {
				alert("Please login first");
			}
			
		}
	
	});
	
	
    $('#menu_list2').show();
    $('#cartlist').show();
})


$(document).ready(function() {
    $('#number').show();
});


  $('#u1 li').hover(function(){
      $(this).find('img').animate({width:'+=50px',height:'+=50px'})
  },function () {
      $(this).find('img').animate({width:'-=50px',height:'-=50px'})
  })
</script>
<script type="text/javascript" src="js/common.js"></script>
<script type="text/javascript" src="http://v3.jiathis.com/code/jia.js" charset="utf-8"></script>
<style type="text/css">
    .jiathis_button_tsina{width:32px;height:32px;float:left;display:block;margin: 0 5px 0 0;background:url(http://www.kivie.com.au/Home/Tpl/Public/images/icon_weibo.png) no-repeat 0 0;}
    .jiathis_button_tsina:hover{background:url(http://www.kivie.com.au/Home/Tpl/Public/images/icon_weibo_on.png) no-repeat 0 0;}
    .jiathis_button_weixin{width:32px;height:32px;float:left;display:block;margin: 0 5px 0 0;background:url(http://www.kivie.com.au/Home/Tpl/Public/images/icon_wechat.png) no-repeat 0 0;}
    .jiathis_button_weixin:hover{background:url(http://www.kivie.com.au/Home/Tpl/Public/images/icon_wechat_on.png) no-repeat 0 0;}
    .jiathis_button_fb{width:32px;height:32px;float:left;display:block;margin: -2px 5px 0 0;background:url(http://www.kivie.com.au/Home/Tpl/Public/images/icon_facebook.png) no-repeat 0 0;}
    .jiathis_button_fb:hover{background:url(http://www.kivie.com.au/Home/Tpl/Public/images/icon_facebook_on.png) no-repeat 0 0;}
    .jiathis_button_in{width:32px;height:32px;float:left;display:block;margin: 0 5px 0 0;background:url(http://www.kivie.com.au/Home/Tpl/Public/images/icon_in.png) no-repeat 0 0;}
    .jiathis_button_in:hover{background:url(http://www.kivie.com.au/Home/Tpl/Public/images/icon_in_on.png) no-repeat 0 0;}

    .jiathis_style  .separator, .jiathis_style .jiathis_separator{opacity:0}
    .jiathis_style  .jtico:hover{opacity:0;}
    #jiathis_webchat img{ margin: 0 auto;}
</style>
</html>