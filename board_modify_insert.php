<?php
    $num = $_GET["num"];
    $page = $_GET["page"];

    $subject = $_POST["subject"];
    $content = $_POST["content"];
    
    $con = mysqli_connect("127.0.0.1", "user1", "12345", "toDoList");
    $sql = "UPDATE board SET subject = '$subject', content = '$content' WHERE num = $num";  

    mysqli_query($con, $sql);

    echo "
    <script>
        alert('수정 완료!');
        location.href = 'board_view.php?num=$num&page=$page'
    </script>";
?>