<meta charset="utf-8">
<?php
    session_start();
    if (isset($_SESSION["userid"])) {
        $userid = $_SESSION["userid"];  
    } 
    else {
        $userid = "";
    }
    if (isset($_SESSION["username"])) {
        $username = $_SESSION["username"];
    }
    else {
        $username = "";
    }

    // 아이디가 없을 때
    if (!$userid) {
        echo("
            <script>
            alert('게시판 글쓰기는 로그인 후 이용해 주세요!');
            history.go(-1)
            </script>
        ");
            exit;
    }

    // board_form에서 보낸 subject, content
    $subject = $_POST["subject"];
    $content = $_POST["content"];

	$subject = htmlspecialchars($subject, ENT_QUOTES);
	$content = htmlspecialchars($content, ENT_QUOTES);

	$regist_day = date("Y-m-d (H:i)");  // 현재의 '년-월-일-시-분'을 저장
	
    // DB연결
	$con = mysqli_connect("127.0.0.1", "user1", "12345", "toDoList");

    // 퀴리문
	$sql = "insert into board (id, name, subject, content, regist_day, hit) ";
	$sql .= "values('$userid', '$username', '$subject', '$content', '$regist_day', 0);";

	mysqli_query($con, $sql);  // $sql 에 저장된 명령 실행

	// 포인트 부여하기
  	$point_up = 100;

    // 퀴리문
	$sql = "select point from members where id='$userid'";
	$result = mysqli_query($con, $sql);
	$row = mysqli_fetch_array($result);
	$new_point = $row["point"] + $point_up; // 게시글을 업로드한 유조 point 증가
	
	$sql = "UPDATE members SET point=$new_point WHERE id='$userid'"; // 증가한 점수 업로드
	mysqli_query($con, $sql); // 전송

	// DB 연결 끊기
	mysqli_close($con);                

    // 업로드 후 업로드 목록으로 이동
	echo "
	   <script>
	    location.href = 'board_list.php';
	   </script>
	";
?>