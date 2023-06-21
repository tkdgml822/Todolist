<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Document</title>
  <script src="./js/todolist.js"></script>
  <script>
    function home() {
      location.href = 'index.php';
    }   
  </script>
</head>
<body>
<header>
    <?php include "header.php";?>
</header>
<?php
// 로그인을 하지 않았을 때
if (!$userid) {
  echo "
  <script>
    alert('로그인 후 이용해 주세요');
    history.go(-1);
  </script>
  ";
}

  // 연결
  $con = mysqli_connect("127.0.0.1", "user1", "12345", "toDoList");

  // 유저가 가지고 있는 할일 목록 전체를 가져온다.
  $sql = "SELECT COUNT(1) FROM todolist WHERE id = '$userid';";
  $result = mysqli_query($con, $sql);
  $row = mysqli_fetch_array($result);
  $num = $row[0];

  mysqli_free_result($result); // 결과 셋 해제

  // 할일 목록 가져오기
  $sql2 = "SELECT subject FROM todolist WHERE id = '$userid';";
  $result2 = mysqli_query($con, $sql2);
  $subjects = array(); // 배열선언
  while ($row2 = mysqli_fetch_assoc($result2)) {
    $subjects[] = $row2['subject'];
  }

  mysqli_free_result($result2); // 결과 셋 해제
  mysqli_close($con); // 연결 해제
?>
<h2>할일(TodoList)</h2>

<form id="todo-form" method="POST" autocomplete="off" name="todoform" action="todo.php">
  할일 : <input type="text" name="subject" id="subject">
  <input type="button" value="등록" id="todobtn" onClick = "check_input()">
</form>

<table border="1" width="600" name="todoTable">
  <?php
  // 불러온 컬럼수 만큼 for문 반복
  for ($i = 0; $i < $num; $i++) {
    echo "
    <tr>
      <td id='todoItem$i' name='subject'>".$subjects[$i]."</td>
      <td><button onClick='toggleCompletion($i)'>확인</button></td>
      <td>
        <form method='POST' action='todo.php'>
          <input type='hidden' name='delete' value='".$subjects[$i]."'>
          <input type='submit' value='삭제'>
        </form>
      </td>
      <td>
        <button onClick='showEditForm($i)'>수정</button>
      </td>
    </tr>
    <tr id='editForm$i' style='display: none;'>
      <td colspan='3'>
        <form method='POST' action='todo.php'>
          <input type='hidden' name='edit' value='".$subjects[$i]."'>
          수정할 내용: <input type='text' name='edited_subject' value='".$subjects[$i]."'>
          <input type='submit' value='수정 완료'>
        </form>
      </td>
    </tr>";
  }
  ?>
</table>

<!-- 수정을 누르면 발생되는 이벤트 수정 element -->
<script>
function showEditForm(index) {
  var editForm = document.getElementById("editForm" + index);
   // CSS 속성으로 테이블 형식의 레이아웃에서 행을 나타내는 속성입니다. editForm.style.display = "table-row";는 editForm 요소의 display 속성을 "table-row"로 설정하여 수정 폼을 표시하도록 하는 역할을 합니다.
  editForm.style.display = "table-row";
}
</script>
