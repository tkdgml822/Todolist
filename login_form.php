<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!-- login.js을 불러온다. -->
    <script type="text/javascript" src = "./js/login.js"></script> 
   
</head>
<body>
<header>
        <?php include "header.php"?>
</header>
    <h3>로그인</h3>
    <!-- sumit하면 login.php으로 가는 form(POST형식)-->
    <form name="login_form" action="login.php" method="post">
        <ul>
            <li><input type="text" name="id" placeholder = "아이디"></li>
            <!-- <li><input type="text" name="id" required></li> -->
            <li><input type="password" name="pass" placeholder = "비밀번호"></li>
        </ul>
        <!-- check_input() 함수 실행 -->
        <input type="button" value="로그인" onClick="check_input()">
        <input type="button" value="회원가입" onClick= "location.href = 'member_form.php'"><br>
    </form>
<footer>
    <?php include "footer.php" ?>
</footer>    
</body>
</html>