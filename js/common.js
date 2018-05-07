/**
 * Created by pc on 2018/3/26.
 */

$(".my").click(function (){

    $.ajax({
        url:'ajaxlogin.php',
        type:'POST', //GET
        async:true,    //或false,是否异步
		
        success:function(data){

            if(data == 1){
                window.location.href = 'member.php';
            }
			else if (data == 2) {
				window.location.href = 'admin.php';
			}
			else {
                $(".fixed").show();
                $("#login").fadeIn();
            }
        }

    })

})


$('.product_list li').hover(function(){
    $(this).find('img').animate({width:'+=50px',height:'+=50px'})
},function () {
    $(this).find('img').animate({width:'-=50px',height:'-=50px'})
})