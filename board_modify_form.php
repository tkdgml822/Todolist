<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script>
    function check_input() {
        if (!document.board_form.subject.value) {
            alert("제목을 입력하세요!");
            document.board_form.subject.focus();
            return;
        }
        if (!document.board_form.content.value) {
            alert("내용을 입력하세요!");    
            document.board_form.content.focus();
            return;
        }
        document.board_form.submit();
    }
</script>
</head>
<body>
<h3>게시판 글쓰기</h3>
<?php
    $num = $_GET["num"];
    $page = $_GET["page"];

    $con = mysqli_connect("127.0.0.1", "user1", "12345", "toDoList");
    $sql = "select * from board WHERE num = $num";
    $result = mysqli_query($con, $sql);
    $row = mysqli_fetch_array($result);
    $name       = $row["name"];
	$subject    = $row["subject"];
	$content    = $row["content"];
?>
    <form name="board_form" method="POST" action="board_modify_insert.php?num=<?=$num?>&page=<?=$page?>">
        <ul>
            <li>이름 : <?=$name?></li>		
            <li>제목 : <input name="subject" type="text" value = "<?= $subject ?>"> </li>	    	
            <li>내용 : <textarea name="content"><?= $content ?></textarea></li>	
            <li><button type="button" onclick="check_input()">완료</button></li>
        </ul>
    </form>
<footer>
    <?php include "footer.php" ?>
</footer>        
</body>
</html>