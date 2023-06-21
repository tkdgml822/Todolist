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
                alert("제목을 입력하세요");
                document.board_form.subject.focus();
                return;
            }

            if (!document.board_form.content.value) {
                alert("내용을 입력하세요");
                document.board_form.content.focus();
                return;
            }

            document.board_form.submit();
        }
    </script>
</head>
<body>
<header>
    <?php include "header.php";?>
</header>
<section>
    <h3>
            게시판 > 글 쓰기
    </h3>
    <form action="board_insert.php" method="POST" name="board_form" enctype="multipart/form-data">

        <b>이름 :</b> <?= $username ?> <br>
        <b>제목 :</b><input type="text" name="subject" id="" placeholder = "제목"><br>

        <b>내용</b><br>
        <textarea name="content" id="" cols="30" rows="10" placeholder = "내용을 입력하세요"></textarea><br>
        <button type="button" onclick="check_input()">완료</button>
        <button type="button" onclick="location.href='board_list.php'">목록</button>
    </form>
</section>
<footer>
    <?php include "footer.php";?>
</footer>
</body>
</html>