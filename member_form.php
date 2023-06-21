<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script>
        //빈칸 확인후 경고창 뛰우고 해당사항 없으면 member_form sumit보내기
        function check_input() {
            if (!document.member_form.id.value) {
                alert("아이디를 입력해주세요!");
                document.member_form.id.focus();
            }

            if (!document.member_form.pass.value) {
                alert("비밀번호를 입력해주세요!");
                document.member_form.pass.focus();
            }

            if(!document.member_form.pass_confirm.value) {
                alert("비밀번호 확인을 입력해주세요!");
                document.member_form.pass_confirm.focus();
            }

            if((document.member_form.pass.value) != (document.member_form.pass_confirm.value)) {
                alert("비밀번호가 일치하지 않습니다.");
                document.member_form.pass_confirm.focus();
            }

            if(!document.member_form.name.value) {
                alert("이름을 입력해주세요!");
                document.member_form.name.focus();
            }

            if(!document.member_form.email1.value) {
                alert("이메일 주소를 입력해주세요!");
                document.member_form.email1.focus();
            }
            
            if(!document.member_form.email2.value) {
                alert("이메일 주소를 입력해주세요!");
                document.member_form.email2.focus();
            }
            
            document.member_form.submit(); // 값이 전부 있을시 submit을 해준다.
        }

        // 새창을 member_check_id.php을 여는데 ?(질의 문자열 구분자)를 써서 id값을 GET방식으로 넘긴다.
        function check_id() {
            window.open("member_check_id.php?id=" + document.member_form.id.value, "IDcheck", "left=700,top=300,width=350,height=200,scrollbars=no,resizabla=yes");
        }
        // 뒤로
        function back() {
            history.go(-1);
        }
    </script>
</head>
<body>
<header>
    <?php include "header.php"?>
</header>
<h2>회원 가입</h2> 
    <form name="member_form" action="member_insert.php" method="post">
        <ul>
            <li>아이디<input  type="text" name="id"><input type="button" value="중복확인" onClick="check_id()"></li>
            <li>비밀번호<input type="password" name="pass"></li>
            <li>비밀번호 확인<input type="password" name="pass_confirm"></li>
            <li>이름<input type="text" name="name"></li>
            <li>이메일<input type="text" name="email1">@<input type="text" name="email2" id=""></li>
            <input type="button" value="저장하기" onClick="check_input()">
            <input type="reset" value="초기화"><br>
            <input type="button" value="뒤로" onClick="back()">
        </ul>
    </form>
<footer>
    <?php  ?>
</footer>    
</body>
</html>