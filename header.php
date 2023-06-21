<?php
session_start();
if (isset($_SESSION["userid"])) $userid = $_SESSION["userid"];
else $userid = "";
if (isset($_SESSION["username"])) $username = $_SESSION["username"];
else $username = "";
if (isset($_SESSION["userlevel"])) $userlevel = $_SESSION["userlevel"];
else $userlevel = "";
if (isset($_SESSION["userpoint"])) $userpoint = $_SESSION["userpoint"];
else $userpoint = "";
?>
 <!DOCTYPE html>
<html>
<head> 
<meta charset="utf-8">
<title>PHP 프로그래밍 입문</title>
<link rel="stylesheet" type="text/css" href="./css/common.css">
<link rel="stylesheet" type="text/css" href="./css/board.css">
<style>

    nav {
    float: right;
    }

    body {
        margin: 0;
        padding: 0;
        font-family: Arial, sans-serif;
    }

    header {
        background-color: #333;
        color: #fff;
        padding: 20px;
        display: flex;
        justify-content: space-between;
        align-items: center;
    }

    header h3 {
        margin: 0;
    }

    header a {
        color: #fff;
        text-decoration: none;
        margin-left: 10px;
    }

    .nav-menu {
        display: flex;
        align-items: center;
    }

    .nav-menu ul {
        list-style: none;
        padding: 0;
        margin: 0;
        display: flex;
    }

    .nav-menu ul li {
        margin-right: 10px;
    }

    .nav-menu ul li a {
        color: #fff;
        text-decoration: none;
    }
</style>
</head>
<body> 
<header>
    <h3><a href="index.php">HOME</a></h3>
    <div class="nav-menu">
    <ul>
            <?php       
                if (!$userid) {
            ?>
                    <li> 비로그인</li>             
            <?php
                }
                else {
            ?>
                    <li><회원 : <?= $username?>> </li>
            <?php
                }
            ?>
            </li>
        </ul>
        <?php
        if (!$userid) {
        ?>
            <a href="member_form.php">회원가입</a>
            <a href="login_form.php">로그인</a>
        <?php
        }
        else {
            $logged = "(".$username."님) [Level:".$userlevel.", Point:".$userpoint;
        ?>
            <a href="logout.php">로그아웃</a>
            <a href="member_modify_form.php">회원수정</a>
        <?php        
        }
        ?>
        <ul>
            <li><a href="board_list.php">게시판 목록</a></li>
            <li><a href="board_form.php">게시판 만들기</a></li>
            <li><a href="todo_form.php">할 일</a></li>
        </ul>
    </div>
</header>
</body>
</html>
