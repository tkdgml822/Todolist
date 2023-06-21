<?php
    // 로그인 값 처리
    $id = $_POST["id"];
    $pass = $_POST["pass"];

    // 연결하기
    $con = mysqli_connect("127.0.0.1", "user1", "12345", "toDoList");
    // 퀴리 담기($id 값을 써서 비밀번호 가져오기)
    $sql = "select * from members where id = '$id';";
    // 퀴리 보낸후 결과 값 담기
    $result = mysqli_query($con, $sql);
    // 레코드 행 반환
    $num_match = mysqli_num_rows($result);

    // 값이 없을떄
    if (!$num_match) {
        // 값이 없을 때 메세지를 뛰워주고 전으로 가기
        echo '
        <script>
            window.alert("등록되지 않은 아이디 입니다.");
            history.go(-1);
        </script>';
    }
    // 값이 있을 때
    else {
        $row = mysqli_fetch_array($result); // 해당 레코드 가져옴
        $db_pass = $row["pass"];  // db에서 password 값 가져오기

        // 연결 끊기
        mysqli_close($con);

        // 내가 입력한 값과 DB에 있는 값이 같은지 확인하기
        if($pass != $db_pass) { // 값이 다를시
            echo ("
            <script>
                window.alert('비밀번호가 틀립니다!');
                history.go(-1);
            </script> 
            ");
            exit; // 나간다.
        }
        // 같을 시
        else {
            // db에 있는 id, name, level, point를 세션에 넣어준다.
            session_start();
            $_SESSION["userid"] = $row["id"];
            $_SESSION["username"] = $row["name"];
            $_SESSION["userlevel"] = $row["level"];
            $_SESSION["userpoint"] = $row["point"];

            // index.php로 이동
            echo ("
            <script>
                location.href = 'index.php';
            </script>
            ");
           
        }
    }

  
?>
