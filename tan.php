<?php
session_start();
?>
<div class="fixed"></div>
<div class="tanchuang" id="register" style="padding:50px 50px;">
    <img class="close" src="images/close.png" alt="">
    <img class="tan_logo" src="images/logo.png" alt="">
    <p class="zhuce">Register</p>
    <ul class="input_box">
        <li>
            <label class="fl" style="width:122px;text-align:right;margin-right:10px;">email</label>
            <input class="txt fl" type="text" id="email" name="email">
        </li>
        <li>
            <label class="fl" style="width:122px;text-align:right;margin-right:10px;">password</label>
            <input class="txt fl" type="password" id="registerPW" name="registerPW">
        </li>
        <li>
            <label class="fl" style="width:122px;text-align:right;margin-right:10px;">confirm password</label>
            <input class="txt fl" type="password" id="curpass" name="curpass">
        </li>
        <li class="clear" style="margin-top:30px;">
            <label class="fl" style="width:122px;text-align:right;margin-right:10px;">verification code </label>
            <input class="yaz fl" type="text" id="yaz">
            <a href="" class="fl" style="margin-top:10px;">
                <img src='./captcha.php?r=<?php echo rand(); ?>' style="width:90px; height:30px" >

            </a>
        </li>
    </ul>
    <input type="submit" class="zhuce_btn" value="register" id="registerbtn">
    <p style="text-align: center; margin-top: 10px;" id="logintext"><a href="javascript:logintext();">login</a> </p>
</div>
<div class="tanchuang" id="login" style="display: none; ">
    <img class="close" src="images/close.png" alt="">
    <img class="tan_logo" src="images/logo.png" alt="">
    <p class="zhuce">Login</p>
		<ul class="input_box">
		
			<li>
				<label class="fl">email</label>

				<input class="txt fl" type="text" id="userName" name="userName">
			</li>
			
			<li>
				<label class="fl">password</label>
				<input class="txt fl" type="password" id="loginPW" name="loginPW">
			</li>
			<!--  admin check -->
			<li>
				<input type="radio" id="loginType" name="loginType" value="customer">Login in as Customer
				<br>
				<input type="radio" id="loginType" name="loginType" value="admin">Login in as Administrator
				<br>
				<?php
					//print_r($_SESSION['islogin']);
				?>
			</li>

		</ul>
		<input type="submit" class="zhuce_btn" value="Login" id="loginbtn">
    <p style="text-align: center; margin-top: 10px; color: #6b6b6b;" id="registertext" ><a href="javascript:registertext();" style="color: red;">now register</a> </p>

</div>
<style>
    #logintext a{ color: #007aff;}
    #logintext a:hover,#registertext a:hover { text-decoration: underline;}

</style>
<script>
    function registertext(){
		
		//if ($_SESSION['islogin'] != 1 && $_SESSION['islogin'] != 2 ) {
			$(".fixed").show();
			$("#login").hide();
			$("#register").fadeIn();
		//}

    }

    function logintext(){
		
		//if ($_SESSION['islogin'] != 1 && $_SESSION['islogin'] != 2 ) {
			$(".fixed").show();
			$("#register").hide();
			$("#login").fadeIn();
		//}
    }

</script>
<script>
    $(function(){
        $('#registerbtn').click(function(){
            var regex = /^([0-9A-Za-z\-_\.]+)@([0-9a-z]+\.[a-z]{2,3}(\.[a-z]{2})?)$/g;
            var email = $('#email').val();
            if(email==''){
                alert('email is empty');
                return false;
            }
            if(regex.test(email)==false){
                alert(' email format is wrong');
                return false;
            }
            var pass = $('#registerPW').val();
            if(pass==''){
                alert('password is empty');
                return false;
            }
            var curpass = $('#curpass').val();
            if(curpass!=pass){
                alert('Two cipher inconsistencies');
                return false;
            }

            var yaz = $('#yaz').val();
            if(yaz==''){
                alert('verification code is empty');
                //return false;
            }

            $.ajax({
                url:'register.php',
                type:'POST', //GET
                async:true,    //或false,是否异步
                data:{
                    username:email,
					password:pass,					
                },

                success:function(data){
					
					//alert(data);
					
                    if(data == 1){						
                        window.location.href = 'member.php';
                    }
					else {
						alert('User already exists');
					}
                },

            })


        });
        
        $('#loginbtn').click(function () {
			// get the value from the web
            var usern = $('#userName').val();
            var loginpw = $('#loginPW').val();
			var selectedVal = "";
			
			// check each parameter
			
            if(usern==''){
                alert('email is empty');
                return false;
            }
			
            var regex = /^([0-9A-Za-z\-_\.]+)@([0-9a-z]+\.[a-z]{2,3}(\.[a-z]{2})?)$/g;
            if(regex.test(usern)==false){
                alert('The email address is wrong');
                return false;
            }

            if(loginpw==''){
                alert('password is empty');
                return false;
            }
			
			var selected = $("input[type='radio'][name='loginType']:checked");
			if (selected.length > 0) {
				selectedVal = selected.val();
			}
			else {
				alert('Please select your login type');
				return false;
			}


            $.ajax({
                url:'login.php',
                type:'POST',	 //GET
                async:true,    	//或false,是否异步
                data:{
                    username:usern,
					password:loginpw,
					logintype:selectedVal
                },

                success:function(data){									
                    if(data == 1){
                        alert('Login as Customer Now ');
                        window.location.href = 'member.php';
                    }
					else if (data == 2) {
						alert('Login as Administrator Now ');
                        window.location.href = 'admin.php';
					}else{
                        alert('Account or password is wrong');
                    }
                },
            })
        })
    })
</script>