<?php
// 연결하기
$con = mysqli_connect("127.0.0.1", "user1", "12345", "toDoList");

// 세션시작
session_start();
$userid = $_SESSION["userid"]; // 현재 로그인 중인 사용자 아이디

if (isset($_POST['subject'])) {
    $subject = $_POST['subject'];

    // 퀴리문
    $sql = "INSERT INTO todolist (subject, id) VALUES ('$subject', '$userid')";

    // 보내기
    $result = mysqli_query($con, $sql);

    if ($result) {
        echo "
        <script>
        location.href = 'todo_form.php';
        </script>
        ";
    } else {
        echo "
        <script>
        alert('등록 과정에서 오류가 발생했습니다.');
        history.go(-1);
        </script>
        ";
    }
}

// 삭제 요청이 있는지 확인
if (isset($_POST["delete"])) {
    // 삭제할 행의 ID 또는 기타 유일한 식별자를 가져옵니다.
    $deleteId = $_POST['delete'];

    // 삭제 쿼리 실행
    $deleteQuery = "DELETE FROM todolist WHERE subject = '$deleteId' AND id ='$userid' LIMIT 1";
    mysqli_query($con, $deleteQuery);

    echo "
    <script>
        alert('삭제 되었습니다.');
        location.href = 'todo_form.php';
    </script>";
}

// 수정 요청이 있는지 확인
if (isset($_POST["edit"])) {
    $editId = $_POST['edit']; // 왠래 값
    $editSubject = $_POST['edited_subject']; // 수정된 내용

    // 수정 쿼리 실행
    $editQuery = "UPDATE todolist SET subject = '$editSubject' WHERE subject = '$editId' AND id = '$userid' LIMIT 1";
    mysqli_query($con, $editQuery);

    echo "
    <script>
        alert('수정 되었습니다.');
        location.href = 'todo_form.php';
    </script>";
}

// 연결 끊기
mysqli_close($con);
?>
