document.addEventListener("DOMContentLoaded", () => {
  // 중복확인 상태를 변수로 기억합니다.
  let idChecked = false;

  // 아이디 중복체크
  const btn_id_check = document.querySelector("#btn_id_check");
  btn_id_check.addEventListener("click", () => {
    const b_id = document.querySelector("#b_id");
    console.log("btn_id_check clicked");
    if (b_id.value === "") {
      alert("아이디를 입력해 주세요");
      return false;
    }
    // AJAX
    const f1 = new FormData();
    f1.append("id", b_id.value);
    f1.append("mode", "id_chk");

    const xhr = new XMLHttpRequest();
    xhr.open("POST", "./pg/member_process.php", true);
    xhr.send(f1);

    xhr.onload = () => {
      if (xhr.status === 200) {
        const responseText = xhr.responseText;
        try {
          const data = JSON.parse(responseText);
          // 이후 data 객체를 사용하여 처리합니다.
          if (data.result === "success") {
            alert("사용이 가능한 아이디입니다.");
            document.getElementById("id_chk").value = "1"; // 중복확인 상태를 1로 설정합니다.
            idChecked = true; // 중복확인 상태를 변수에 기억합니다.
          } else if (data.result === "fail") {
            alert("이미 사용중인 아이디입니다. 다른 아이디를 입력해 주세요.");
            document.getElementById("id_chk").value = "0"; // 중복확인 상태를 0으로 설정합니다.
            idChecked = false; // 중복확인 상태를 변수에 기억합니다.
            b_id.value = "";
            b_id.focus();
          } else if (data.result == "empty_id") {
            alert("아이디가 비어 있습니다.");
            b_id.focus();
          }
        } catch (error) {
          console.error("JSON parsing error:", error);
        }
      }
    };

    // xhr.onload = () => {
    //   if (xhr.status === 200) {
    //     const data = JSON.parse(xhr.responseText);

    //     if (data.result === "success") {
    //       alert("사용이 가능한 아이디입니다.");
    //       document.getElementById("id_chk").value = "1"; // 중복확인 상태를 1로 설정합니다.
    //       idChecked = true; // 중복확인 상태를 변수에 기억합니다.
    //     } else if (data.result === "fail") {
    //       alert("이미 사용중인 아이디입니다. 다른 아이디를 입력해 주세요.");
    //       document.getElementById("id_chk").value = "0"; // 중복확인 상태를 0으로 설정합니다.
    //       idChecked = false; // 중복확인 상태를 변수에 기억합니다.
    //       b_id.value = "";
    //       b_id.focus();
    //     } else if (data.result == "empty_id") {
    //       alert("아이디가 비어 있습니다.");
    //       b_id.focus();
    //     }
    //   }
    // };
  });

  // 이메일 중복체크
  const btn_email_check = document.querySelector("#btn_email_check");
  btn_email_check.addEventListener("click", () => {
    const b_email = document.querySelector("#b_email");

    if (b_email.value == "") {
      alert("이메일을 입력해 주세요");
      b_email.focus();
      return false;
    }

    // AJAX
    const f1 = new FormData();
    f1.append("email", b_email.value);
    f1.append("mode", "email_chk");

    const xhr = new XMLHttpRequest();
    xhr.open("POST", "./pg/member_process.php", true);
    xhr.send(f1);

    xhr.onload = () => {
      if (xhr.status == 200) {
        const data = JSON.parse(xhr.responseText);

        if (data.result == "success") {
          alert("사용이 가능한 이메일입니다.");
          document.getElementById("email_chk").value = "1"; // 중복확인 상태를 1로 설정합니다.
          emailChecked = true; // 중복확인 상태를 변수에 기억합니다.
        } else if (data.result == "fail") {
          alert("이미 사용중인 이메일입니다. 다른 이메일을 입력해 주세요.");
          document.getElementById("email_chk").value = "0"; // 중복확인 상태를 0으로 설정합니다.
          emailChecked = false; // 중복확인 상태를 변수에 기억합니다.
          b_email.value = "";
          b_email.focus();
        } else if (data.result == "empty_email") {
          alert("이메일이 비어 있습니다.");
          b_email.focus();
        } else if (data.result == "email_format_wrong") {
          alert("이메일이 형식에 맞지 않습니다.");
          b_email.value = "";
          b_email.focus();
        }
      }
    };
  });

  // 가입 버튼 클릭시
  const btn_submit = document.getElementById("btn_submit");
  btn_submit.addEventListener("click", () => {
    const f = document.input_form;
    if (f.id.value == "") {
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

    // 이름 입력 확인
    if (f.name.value == "") {
      alert("이름을 입력해주세요.");
      f.name.focus();
      return false;
    }

    // 비밀번호 확인
    if (f.password.value == "") {
      alert("비밀번호를 입력해주세요.");
      f.password.focus();
      return false;
    }

    if (f.password2.value == "") {
      alert("비밀번호확인을 입력해주세요.");
      f.password2.focus();
      return false;
    }

    // 비밀번호 일치여부 확인
    if (f.password.value != f.password2.value) {
      alert("비밀번호가 서로 일치하지 않습니다.");
      f.password.value = "";
      f.password2.value = "";
      f.password.focus();
      return false;
    }

    // 이메일 입력 부분 확인
    if (f.email.value == "") {
      alert("이메일을 입력해 주세요");
      f.email.focus();
      return false;
    }

    // 이메일 중복체크 여부 확인
    if (f.email_chk.value == 0) {
      alert("이메일 중복확인을 해주세요");
      return false;
    }

    // 우편번호 입력확인
    if (f.zipcode.value == "") {
      alert("우편번호를 입력해주세요.");
      return false;
    }

    // 주소입력 확인
    if (f.addr1.value == "") {
      alert("주소를 입력해 주세요.");
      f.addr1.focus();
      return false;
    }
    if (f.addr2.value == "") {
      alert("상세주소를 입력해 주세요.");
      f.addr2.focus();
      return false;
    }
    // 폼 제출
    f.submit();
  });

  // 우편번호 찾기
  const btn_zipcode = document.querySelector("#btn_zipcode");
  btn_zipcode.addEventListener("click", () => {
    new daum.Postcode({
      oncomplete: function (data) {
        console.log(data);
        let addr = "";
        let extra_addr = "";

        if (data.userSelectedType == "J") {
          addr = data.jibunAddress;
        } else if (data.userSelectedType == "R") {
          addr = data.roadAddress;
        }

        if (data.bname != "") {
          extra_addr = data.bname;
        }

        if (data.buildingName != "") {
          if (extra_addr == "") {
            extra_addr = data.buildingName;
          } else {
            extra_addr += ", " + data.buildingName;
          }
        }

        if (extra_addr != "") {
          extra_addr = " (" + extra_addr + ")";
        }

        const b_addr1 = document.querySelector("#b_addr1");
        b_addr1.value = addr + extra_addr;

        const b_zipcode = document.querySelector("#b_zipcode");
        b_zipcode.value = data.zonecode;

        const b_addr2 = document.querySelector("#b_addr2");
        b_addr2.focus();
      },
    }).open();
  });

  // 프로필 이미지 변경시 미리보기 기능
  const b_photo = document.querySelector("#b_photo");
  b_photo.addEventListener("change", (e) => {
    // console.log(e);
    const reader = new FileReader();

    reader.readAsDataURL(e.target.files[0]);

    reader.onload = function (event) {
      // //console.log(event);
      // const img = document.createElement("img");
      // img.setAttribute("src", event.target.result);
      // document.querySelector("#f_preview").

      const f_preview = document.querySelector("#b_preview");
      f_preview.setAttribute("src", event.target.result);
    };
  });
});
