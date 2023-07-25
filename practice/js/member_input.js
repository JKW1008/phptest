document.addEventListener("DOMContentLoaded", () => {
  // 중복확인 상태를 변수로 기억합니다.
  let idChecked = false;

  // 아이디 중복체크
  const btn_id_check = document.querySelector("#btn_id_check");
  btn_id_check.addEventListener("click", () => {
    const f_id = document.querySelector("#f_id");

    if (f_id.value === "") {
      alert("아이디를 입력해 주세요");
      return false;
    }

    // AJAX
    const f1 = new FormData();
    f1.append("id", f_id.value);
    f1.append("mode", "id_chk");

    const xhr = new XMLHttpRequest();
    xhr.open("POST", "./pg/member_process.php", true);
    xhr.send(f1);

    xhr.onload = () => {
      if (xhr.status === 200) {
        const data = JSON.parse(xhr.responseText);

        if (data.result === "success") {
          alert("사용이 가능한 아이디입니다.");
          document.getElementById("id_chk").value = "1"; // 중복확인 상태를 1로 설정합니다.
          idChecked = true; // 중복확인 상태를 변수에 기억합니다.
        } else if (data.result === "fail") {
          alert("이미 사용중인 아이디입니다. 다른 아이디를 입력해 주세요.");
          document.getElementById("id_chk").value = "0"; // 중복확인 상태를 0으로 설정합니다.
          idChecked = false; // 중복확인 상태를 변수에 기억합니다.
          f_id.value = "";
          f_id.focus();
        } else if (data.result == "empty_id") {
          alert("아이디가 비어 있습니다.");
          f_id.focus();
        }
      }
    };
  });

  // 이메일 중복체크
  const btn_email_check = document.querySelector("#btn_email_check");
  btn_email_check.addEventListener("click", () => {
    const f_email = document.querySelector("#f_email");

    if (f_email.value === "") {
      alert("이메일을 입력해 주세요");
      f_email.focus();
      return false;
    }

    // AJAX
    const f1 = new FormData();
    f1.append("email", f_email.value);
    f1.append("mode", "email_chk");

    const xhr = new XMLHttpRequest();
    xhr.open("POST", "./pg/member_process.php", true);
    xhr.send(f1);

    xhr.onload = () => {
      if (xhr.status === 200) {
        const data = JSON.parse(xhr.responseText);

        if (data.result === "success") {
          alert("사용이 가능한 이메일입니다.");
          document.getElementById("email_chk").value = "1"; // 중복확인 상태를 1로 설정합니다.
          emailChecked = true; // 중복확인 상태를 변수에 기억합니다.
        } else if (data.result === "fail") {
          alert("이미 사용중인 이메일입니다. 다른 이메일을 입력해 주세요.");
          document.getElementById("email_chk").value = "0"; // 중복확인 상태를 0으로 설정합니다.
          emailChecked = false; // 중복확인 상태를 변수에 기억합니다.
          f_email.value = "";
          f_email.focus();
        } else if (data.result == "empty_email") {
          alert("이메일이 비어 있습니다.");
          f_email.focus();
        }
      }
    };
  });

  // 가입 버튼 클릭시
  const btn_submit = document.getElementById("btn_submit");
  btn_submit.addEventListener("click", () => {
    const f = document.input_form;
    if (f.id.value === "") {
      alert("아이디를 입력해주세요.");
      f.id.focus();
      return false;
    }

    // 아이디 중복확인 여부 체크
    if (!idChecked) {
      // 중복확인이 되지 않은 경우
      alert("아이디 중복확인을 해주시기 바랍니다.");
      return false;
    }

    // 비밀번호 확인
    if (f.password.value === "") {
      alert("비밀번호를 입력해주세요.");
      f.password.focus();
      return false;
    }

    if (f.password2.value === "") {
      alert("비밀번호확인을 입력해주세요.");
      f.password2.focus();
      return false;
    }

    // 비밀번호 일치여부 확인
    if (f.password.value !== f.password2.value) {
      alert("비밀번호가 서로 일치하지 않습니다.");
      f.password.value = "";
      f.password2.value = "";
      f.password.focus();
      return false;
    }

    // // 폼 제출
    // f.submit();
  });
});
