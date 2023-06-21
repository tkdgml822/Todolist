<?php
    // 값 다 비우기
    session_start();
    unset($_SESSION["userid"]);
    unset($_SESSION["username"]);
    unset($_SESSION["userlevel"]);
    unset($_SESSION["userpoint"]);

    // index.php로 이동
     echo ("
     <script>
         location.href = 'index.php';
     </script>
     ");
?>