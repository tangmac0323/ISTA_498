<div class="fixed"></div>
<div class="tanchuang" id="register" style="padding:50px 50px;">
    <img class="close" src="images/close.png" alt="">
    <img class="tan_logo" src="images/logo.png" alt="">
    <p class="zhuce">Register</p>
    <ul class="input_box">
        <li>
            <label class="fl" style="width:122px;text-align:right;margin-right:10px;">email</label>
            <input class="txt fl" type="text" id="email">
        </li>
        <li>
            <label class="fl" style="width:122px;text-align:right;margin-right:10px;">password</label>
            <input class="txt fl" type="password" id="pass">
        </li>
        <li>
            <label class="fl" style="width:122px;text-align:right;margin-right:10px;">confirm password</label>
            <input class="txt fl" type="password" id="curpass">
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

            <input class="txt fl" type="text" id="email2">
        </li>
        <li>
            <label class="fl">password</label>
            <input class="txt fl" type="password" id="pass2">
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

        $(".fixed").show();
        $("#login").hide();
        $("#register").fadeIn();

    }

    function logintext(){
        $(".fixed").show();
        $("#register").hide();
        $("#login").fadeIn();
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
            var pass = $('#pass').val();
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
                return false;
            }

            $.ajax({
                url:'register.php',
                type:'POST', //GET
                async:true,    //或false,是否异步
                data:{
                    name:email
                },

                success:function(data){
                    if(data==1){
                        window.location.href = 'member.php';
                    }
                },

            })


        });
        
        $('#loginbtn').click(function () {
            var email2 = $('#email2').val();
            var pass2 = $('#pass2').val();
            if(email2==''){
                alert('email is empty');
                return false;
            }
            var regex = /^([0-9A-Za-z\-_\.]+)@([0-9a-z]+\.[a-z]{2,3}(\.[a-z]{2})?)$/g;
            if(regex.test(email2)==false){
                alert('邮件地址不合法');
                return false;
            }

            if(pass2==''){
                alert('password is empty');
                return false;
            }

            $.ajax({
                url:'login.php',
                type:'POST', //GET
                async:true,    //或false,是否异步
                data:{
                    name:email2,pass:pass2
                },

                success:function(data){
                    if(data==1){
                        alert('success login');
                        window.location.href = 'member.php';
                    }else{
                        alert('account or password is wrong');
                    }
                },
            })
        })
    })
</script>