<?php
$num = $_GET["num"];
$page = $_GET["page"];

// 연결
$con = mysqli_connect("127.0.0.1", "user1", "12345", "toDoList");
$sql = "DELETE FROM board WHERE num = $num";
mysqli_query($con, $sql);

echo "
<script>
    location.href = 'board_list.php';
</script>
"
?>
