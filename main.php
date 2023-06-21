<h4>최근 게시글</h4>            
<!-- 최근 게시 글 DB에서 불러오기 -->
<?php
    $con = mysqli_connect("127.0.0.1", "user1", "12345", "toDoList");
    $sql = "SELECT * FROM board ORDER BY num DESC limit 5";
    $result = mysqli_query($con, $sql);
    
    // 값이 없을때
    if (!$result) {
        echo "게시판 DB 테이블(board)이 생성 전이거나 아직 게시글이 없습니다!";
    }
    // 값이 있을때
    else {
        while( $row = mysqli_fetch_array($result) ) {
            $regist_day = substr($row["regist_day"], 0, 10);
?>
                <li>
                    <span><?=$row["subject"]?></span>
                    <span><?=$row["name"]?></span>
                    <span><?=$regist_day?></span>
                </li>
<?php
        }
    }
?>
                <h4>포인트 랭킹</h4>
<!-- 포인트 랭킹 표시하기 -->
<?php
    $rank = 1;
    $sql = "SELECT * FROM members ORDER BY point DESC limit 5"; // 제일 큰 순 5개
    $result = mysqli_query($con, $sql);

    if (!$result) {
        echo "회원 DB 테이블(members)이 생성 전이거나 아직 가입된 회원이 없습니다!";
    }
    else {
        while( $row = mysqli_fetch_array($result) ) {
            $name  = $row["name"];        
            $id    = $row["id"];
            $point = $row["point"];
            $name = mb_substr($name, 0, 1)." * ".mb_substr($name, 2, 1);
?>
                <li>
                    <span><?=$rank?></span>
                    <span><?=$name?></span>
                    <span><?=$id?></span>
                    <span><?=$point?></span>
                </li>
<?php
            $rank++;
        }
    }

    mysqli_close($con);
?>