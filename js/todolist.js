document.addEventListener("DOMContentLoaded", () => {
  const todobtn = document.querySelector("#todobtn");

  todobtn.addEventListener("click", () => {
    const subject = document.querySelector("#subject");
    if (!subject.value) {
      alert("할일을 입력해주세요");
      history.go(-1);
      subject.focus();
      return;
    }

    document.todoform.submit();
  });
});

// toItemd 퀴리를 가져와서 확인 버튼을 한번더 눌렀을 때 취소선을 해준다.
function toggleCompletion(index) {
  var todoItem = document.getElementById("todoItem" + index);
  if (todoItem.style.textDecoration === "line-through") {
    todoItem.style.textDecoration = "none";
  } else {
    todoItem.style.textDecoration = "line-through";
  }
}
