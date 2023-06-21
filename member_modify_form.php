    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>
        <script type="text/javascript" src = "./js/member_modify.js"></script>  
    </head>
    <body>
    <header>
        <?php include "header.php"?>
    </header>
    <?php
        // 세션 가져오기
        $userid = $_SESSION["userid"];

        // 연결하기
        $con = mysqli_connect("127.0.0.1", "user1", "12345", "toDoList");
        // 퀴리 담기
        $sql = "select * from members where id = '$userid';";
        // 퀴리 보낸후 결과 값 담기
        $result = mysqli_query($con, $sql);
        // 레코드 행 반환
        $row = mysqli_fetch_array($result);

        // 연결한 레코드 행에서 pass, name 가져오기
        $pass = $row["pass"];
        $name = $row["name"];

        // @을 기준으로 나눠서 배열로 나눈다.
        $email = explode("@", $row["email"]); 
        $email1 = $email[0];
        $email2 = $email[1];
        
        // 연결 끊기
        mysqli_close($con);
    ?>
    <form name = "member_form" action="member_modify.php" method="POST">
        <h2>회원정보 수정</h2> 
        아이디 <input type="text" name="id" value ="<?=$userid?>" disabled><br> 
        비밀번호<input type="password" name="pass" value ="<?=$pass?>"><br>
        비밀번호확인<input type="password" name="pass_confirm" value="<?=$pass?>"><br>
        이름<input type="text" name="name" value="<?=$name?>"><br>
        이메일<input type="text" name="email1" value="<?=$email1?>">@<input type="text" name="email2" value="<?=$email2?>"><br>
        <input type="button" value="저장하기" onClick="check()">
        <input type="reset" value="초기화">
    </form>
    <footer>
        <?php include "footer.php"?>
    <footer>
    </body>
    </html>