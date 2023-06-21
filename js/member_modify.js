function check() {
  if (!document.member_form.pass.value) {
    alert("비밀번호를 입력하세요");
    return;
  }

  if (!document.member_form.pass_confirm.value) {
    alert("비밀번호를 입력하세요");
    return;
  }

  if (document.member_form.pass.value != document.member_form.pass_confirm.value) {
    alert("비밀번호가 서로 다릅니다.");
    return;
  }

  if (!document.member_form.name.value) {
    alert("이름을 입력하세요");
    return;
  }

  document.member_form.submit();
}
