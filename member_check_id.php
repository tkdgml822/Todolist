<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h3>아이디 중복체크</h3>
    <p>
<?php
// windows.open으로 새창을 열면서 ?(질의 문자열 구분자) 넘겨준 GET방식으로 넘겨준 id를 넘겨준다.
    $id = $_GET["id"];

    if(!$id) {
        echo ("<li>아이디를 입력해주세요</li>");
    }
    else {
        // 연결하기
        $con = mysqli_connect("127.0.0.1", "user1", "12345", "toDoList");
        // 퀴리 담기
        $sql = "select * from members where id = '$id';";
        // 퀴리 보낸후 결과 값 담기
        $result = mysqli_query($con, $sql);
        // 레코드 행 반환
        $num_record = mysqli_num_rows($result);

        // 결과값이 있으면 = 중복아이디가 있다는 의미
        if ($num_record) {
            echo "<li>".$id."아이디는 중복됩니다.</li>";
            echo "<li>다른 아이디를 사용 해주세요 </li>";
        }
        // 결과값이 없으면 쓸수 있다고 메세지 뛰우기
        else {
            echo "<li>".$id."아이디는 사용 가능합니다.</li>";
        }

        // 연결 끊기
        mysqli_close($con);
    }
?>
<!-- 닫기 버튼 -->
<input type="button" value="닫기" onClick="javascript:self.close()">
</body>
</html>