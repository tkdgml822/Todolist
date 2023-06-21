<?php
    session_start();
    $id = $_SESSION["userid"];

    $pass = $_POST["pass"];
    $name = $_POST["name"];
    $email1 = $_POST["email1"];
    $email2 = $_POST["email2"];

    $email = $email1."@".$email2;

    // 연결하기
    $con = mysqli_connect("127.0.0.1", "user1", "12345", "toDoList");
    // 퀴리 담기
    $sql = "update members set pass = '$pass', name = '$name', email ='$email'"."where id = '$id';";
    // 퀴리 보내기
    mysqli_query($con, $sql);

    // 이름은 다른 테이블에도 사용해서 이름은 다른 테이블에도 적용하기
    $sql = "UPDATE board SET name = '$name' WHERE id = '$id';";
    mysqli_query($con, $sql);
    
    // 값 수정후 연결 끊기
    mysqli_close($con);
?>

<script>
    // index.php로 이동
    alert("수정되었습니다.");
    location.href = "index.php";
</script>