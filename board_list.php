<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<!-- 머리부분 -->
<header>
<?php include "header.php";?>
</header>
<!-- 몸통 부분 -->
    <h3>게시판 > 목록보기</h3>
    <ul>
        <li>
            번호
            제목
            글쓴
            등록
            조회
        </li>
<?php
    // 처음 기본값은 1, 밑 부분에서 다음, 이전을 누르면 GET방식으로 page를 가져온다.
    if (isset($_GET["page"])) {
        $page = $_GET["page"];
    }
    else {
        $page = 1;
    }

    $con = mysqli_connect("127.0.0.1", "user1", "12345", "toDoList"); // 연결
    $sql = "SELECT * FROM board ORDER BY num DESC"; // 제일 큰 num을 가져온다. 
    $result = mysqli_query($con, $sql);
    $total_record = mysqli_num_rows($result); // 결과(제일 큰 값)

    // 페이지당 나타낼 글 목록 갯수
    $scale = 5;

    // 전체 페이지 글 수 계산
    if ($total_record % $scale == 0) {
        $total_page = floor($total_record / $scale); // 딱 맞아 떨어지면 그대로 페이지를 나타내는 값을 쓰면 된다.
    }
    else {
        $total_page = floor($total_record / $scale) + 1; // 1을 더해서 남은 글 목록을 보여준다.
    }
    
    // 나타낼 페이지에따라 시작 번지 계산
    // 1페이지라면 1이라서 처음 부터시작, 2페이지라면 5부터 시작(5부터 시작하면 페이지가 5개 씩 보여주면서 페이지가 수가 증가하기 떄문이다.)
    $start = ($page - 1) * $scale;

    $number = $total_record - $start;

    // 표시할 목록 가져옴 
    // 아까 구한 시작 번지, 조건(시작번지가 최종 레코드보다 작을 AND 시작번지 + 글 목록 개수)
    for ($i = $start; $i < $start+$scale && $i < $total_record; $i++) {
        mysqli_data_seek($result, $i); // 해당되는 코드의 값만 가져옴
        // 가져올 레코드로 위치(포인터) 이동
        $row = mysqli_fetch_array($result);
        // 하나의 레코드 가져오기
        $num         = $row["num"];
        $id          = $row["id"];
        $name        = $row["name"];
        $subject     = $row["subject"];
        $regist_day  = $row["regist_day"];
        $hit         = $row["hit"];        
?>
                  <li>
                      <?=$number?>
                      <a href="board_view.php?num=<?=$num?>&page=<?=$page?>"><?=$subject?></a>
                      <?=$name?>
                      <?=$regist_day?>
                      <?=$hit?>
                  </li>	
<?php
            $number--;
     }
     mysqli_close($con);  
?>
              </ul>
              <ul> 	
<?php
      // 페이지 수가 기본이 1이면 이전, 다음이 나올 필요가 없어서 2로 설정되어있다.
      if ($total_page >= 2 && $page >= 2) {
          // 이전을 누를 때 페이지수가 1씩 줄어든다.
          $new_page = $page - 1;
          echo "<li><a href='board_list.php?page=$new_page'>◀ 이전</a> </li>";
      }		
      else {
          echo "<li>&nbsp;</li>";
      }
  
         // 게시판 목록 하단에 페이지 링크 번호 출력
        for ($i=1; $i <= $total_page; $i++) {
          if ($page == $i) {  // 현재 페이지는 <a> 태그를 안 걸어준다.
              echo "<li><b> $i </b></li>";
          }
          else {
              echo "<li><a href='board_list.php?page=$i'> $i </a><li>"; // 다른 페이지일 경우 링크를 걸어준다.
          }
        }

      // 다음 페이지로 넘어가고 싶을 경우
         if ($total_page>=2 && $page != $total_page) {
          $new_page = $page+1;	
          echo "<li> <a href='board_list.php?page=$new_page'>다음 ▶</a> </li>";
      }
      else {
          echo "<li>&nbsp;</li>";
      }
?>
              </ul> <!-- page -->	    	
              <ul>
                  <li><button onclick="location.href='board_list.php'">목록</button></li>
                  <li>
<?php 
        // 로그인 중 경우 글쓰기가 된다.
      if($userid) {
?>
                      <button onclick="location.href='board_form.php'">글쓰기</button>
<?php
      } 
      else { // 로그인을 하지 않은 채로 버튼을 누르면 경고문을 뛰운다.
?>
                      <a href="javascript:alert('로그인 후 이용해 주세요!')"><button>글쓰기</button></a>
<?php
      }
?>
                  </li>
              </ul>
      </div> <!-- board_box -->
  </section> 
  <footer>
      <?php include "footer.php";?>
  </footer>
  </body>
  </html>