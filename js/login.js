// 로그인 아이디, 비밀번호 값 체크
function check_input() {
  if (!document.login_form.id.value) {
    alert("아이디를 입력해주세요.");
    document.login_form.id.focus();
    return;
  }

  if (!document.login_form.pass.value) {
    alert("비밀번호를 입력해주세요.");
    document.login_form.pass.focus();
    return;
  }

  // 아이디, 비밀번호 값 확인 후 sumbit()을 해준다.
  document.login_form.submit();
}
