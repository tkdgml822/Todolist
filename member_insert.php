<?php
// member_form에서 받은 데이터 처리
    $id = $_POST["id"];
    $pass = $_POST["pass"];
    $name = $_POST["name"];
    $email1 = $_POST["email1"];
    $email2 = $_POST["email2"];

    // 첫번째 email주소와 두번째 주소를 합친다.
    $email = $email1."@".$email2;
    $regist_day = date("Y-m-d (H:i)"); // 연-월-일-시-분 저장

    // DB연결
    $con = mysqli_connect("127.0.0.1", "user1", "12345", "toDoList");
    
    // 퀴리문 담기
    $sql = "insert into members(id, pass, name, email, regist_day, level, point) values ('$id', '$pass', '$name', '$email', '$regist_day', 9, 0)";

    // 퀴리문 보내기
    mysqli_query($con, $sql);

    // 연결 끊기
    mysqli_close($con);

    // 연결후 index.php로 이동
    echo "
    <script>
        location.href = 'index.php';
    </script>
    ";
?>