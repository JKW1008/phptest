<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=\, initial-scale=1.0">
    <title>회원가입</title>
</head>

<body>
    <center><br>
        <font size=5><b> 회 원 가 입 </b></font>
    </center>
    <hr>
    <center>>> [ <a href="login_form.php"> 로 그 인 </a> ] << <p>
    </center>

    <form action="add_db.php" name="user_form" method="post" onsubmit="return chk_input()">
        <table border=1 width=700 align="center" cellspacing=0 cellpadding="3">
            <tr>
                <td width="696" height="30" colspan="2" bgcolor="blue">&nbsp;<font color="white"><b> 회원가입</b>[ * 표는
                        반드시 기입할 사항입니다. ]</font>
                </td>
            </tr>
            <tr>
                <!--아이디 입력 상자에 변수 fuserid 선언-->
                <td width="20%" height="30" colsapn="2" bgcolor="#ffff99">
                    <p align="right"> * 아이디 </p>
                </td>
                <td width="80%">
                    <input type="text" name="fuserid" id="fuserid" size="12" maxlength="12"
                        onblur="if(fuserid.value!='') chk_id();">
                    <input type="button" name="Button" value=" > 중복검사 < " onclick="chk_id();">
                    <font size="2"> (영문과 숫자 12자리까지) </font>

                    <script>
                    function chk_id() {
                        if (user_form.fuserid.value == '') {
                            alert(' [ 아이디 ]를 입력해야 검사할 수 있습니다..');
                            user_form.fuserid.focus();
                        } else {
                            window.open('id_chk.php?fuserid=' + user_form.fuserid.value, 'IDwin',
                                'width=400, height=200');
                        }
                    }
                    </script>
                </td>
            </tr>
            <tr>
                <td width="20%" height="30" colsapn="2" bgcolor="#ffff99">
                    <p align="right"> * 이름 </p>
                </td>
                <td width="80%">
                    <input type="text" name="fname" id="fname" size="12" maxlength="10">
                    <font size="2">(5글자까지 가능)</font>
                </td>
            </tr>
            <tr>
                <td width="20%" height="30" bgcolor="#ffff99">
                    <p align="right"> * 비밀번호 </p>
                </td>
                <td width="80%"><input type="password" name="fpasswd" id="fpasswd" size="13" maxlength="13">
                    <font size="2">(영문과 숫자 혼합 10자리까지)</font>
                </td>

            </tr>
            <tr>
                <td width="20%" height="30" bgcolor="#ffff99">
                    <p align="right"> * 비밀번호 확인 </p>
                </td>
                <td width="80%"><input type="password" name="fpasswd_re" id="fpasswd_re" size="13" maxlength="13"
                        onblur="chk_passwd()">
                    <font size="2">(비밀번호와 똑같이 입력하세요.)</font>
                </td>

                <script>
                function chk_passwd() {
                    if (user_form.fpasswd.value != user_form.fpasswd_re.value) {
                        alert("[ 비밀번호 입력 오류 ] \r\n -> [ 비밀번호 ]를 다시 입력하세요.");
                        user_form.fpasswd.value = "";
                        user_form.fpasswd_re.value = "";
                        user_form.fpasswd.focus();
                        return false;
                    }
                }

                function chk_input() {
                    if (user_form.fuserid.value == "") {
                        alert("[ 아이디 ]를 입력하세요.");
                        user_form.fuserid.focus();
                        return false;

                    } else if (user_form.fname.value == "") {
                        alert(" [ 이름 ]을 입력하세요.")
                        user_form.fname.focus();
                        return false;

                    } else if (user_form.fpasswd.value == "") {
                        alert(" [ 비밀번호 ]을 입력하세요.")
                        user_form.fpasswd.focus();
                        return false;

                    } else if (user_form.fpasswd_re.value == "") {
                        alert(" [ 비밀번호 확인 ]을 입력하세요.")
                        user_form.fpasswd_re.focus();
                        return false;

                    } else {
                        return true;
                    }
                }
                </script>
            </tr>
            <tr>
                <!-- 성별 남: M, 여: W 변수 fsex선언 -->
                <td width="20%" height="30" bgcolor="#ffff99">
                    <p align="right"> 성별 </p>
                </td>
                <td width="80%">
                    <input type="radio" name="fsex" value="M" checked>남
                    <input type="radio" name="fsex" value="W">여
                </td>
            </tr>
            <tr>
                <td width="20%" height="30" bgcolor="#ffff99">
                    <p align="right"> 이메일 </p>
                </td>
                <td width="80%">
                    <input type="text" name="femail" size="30" maxlength="30">
                    <font aria-setsize="2">(예: master@spacezone.kr)</font>
                </td>
            </tr>
            <tr>
                <td width="696" height="50" colspan="2">
                    <p align="center">
                        <input type="submit" name="smt" value=" << 가입하기 ">&nbsp;&nbsp;&nbsp;
                        <input type="reset" name="rst" value=" 다시 작성 >> ">
                    </p>
                </td>
            </tr>
        </table>
    </form>
</body>

</html>