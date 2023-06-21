<?php
$num = $_GET["num"];
$page = $_GET["page"];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>    
</head>
<script>
    function realCheckDelete() {
        if(confirm("정말로 삭제하겠습니까?")) {
            location.href = 'board_delete.php?num=<?=$num?>&page=<?= $page ?>';
        }
        else {
            history.go(-1);
        }
    }
</script>
<body>
    <header>
        <?php include "header.php" ?>
    </header>
<?php
    // DB 연결
    $con = mysqli_connect("127.0.0.1", "user1", "12345", "toDoList");
    $sql = "SELECT * FROM board WHERE num = $num";
    $result = mysqli_query($con, $sql); // 퀴리 보내기

    // 테이블 열 가져오기
    $row = mysqli_fetch_array($result);
    $id = $row["id"];
    $name = $row["name"];
    $regist_day = $row["regist_day"];
    $subject = $row["subject"];
    $content = $row["content"];
    $hit = $row["hit"];

    // 유저가 적은 게시판 글을 가져와서 빈칸 (" ") 및 \n을 <br>로 바꾼다. php코드에서 쓰기위해서
	$content = str_replace(" ", "&nbsp;", $content); // $conten에 있는 " "을 &nbsp으로 바꾼다.
	$content = str_replace("\n", "<br>", $content);  // 다시 받아서 content에 있는 \n을 <br> 바꾼다.

    // 게시판 조회수 1증가
    $new_hit = $hit + 1;

    // 게시판 조회수 데이터베이스에 업로드
    $sql = "UPDATE board SET hit = $new_hit WHERE num = $num";

    // 퀴리 전송
    mysqli_query($con, $sql);
?>
<ul>
    <h3>제목 : <?= $subject?></h3>
    <li><?= $name ?> | <?= $regist_day ?></li>
    <li><?= $content ?> </li>
<?php
    
    if ($id != $userid) {
        echo "권한이 없습니다.";
    }
    else {
?>          
        <input type="button" value="수정" onClick = "location.href = 'board_modify_form.php?num=<?=$num?>&page=<?=$page?>'">
        <input type="button" value="삭제" onClick = "realCheckDelete()"><br>
        <input type="button" value="게시글 쓰기" onClick = "location.href = 'board_form.php'"></li>
<?php
    }
?>    
</ul>
<footer>
    <?php include "footer.php"?>
</footer>
</body>
</html>