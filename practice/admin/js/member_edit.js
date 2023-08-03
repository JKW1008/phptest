document.addEventListener("DOMContentLoaded", () => {
  // 이메일 중복확인
  const btn_email_check = document.querySelector("#btn_email_check");
  btn_email_check.addEventListener("click", () => {
    const f = document.input_form;
    if (f.old_email.value == f.email.value) {
      alert(
        "이메일 중복확인이 필요없습니다. 새로운 이메일로 변경시 이메일 중복확인을 눌러주세요."
      );

      return false;
    }

    if (f.email.value == "") {
      alert("이메일을 입력해 주세요");
      f.email.focus();
      return false;
    }

    // AJAX
    const f1 = new FormData();
    f1.append("email", f.email.value);
    f1.append("mode", "email_chk");

    const xhr = new XMLHttpRequest();
    xhr.open("POST", "../pg/member_process.php", true);
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
        } else if (data.result == "email_format_wrong") {
          alert("이메일이 형식에 맞지 않습니다.");
          f_email.value = "";
          f_email.focus();
        }
      }
    };
  });

  // 프로필 이미지 변경시 미리보기 기능
  const f_photo = document.querySelector("#f_photo");
  f_photo.addEventListener("change", (e) => {
    const reader = new FileReader();

    reader.readAsDataURL(e.target.files[0]);

    reader.onload = function (event) {
      const f_preview = document.querySelector("#f_preview");
      f_preview.setAttribute("src", event.target.result);
    };
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

        const f_addr1 = document.querySelector("#f_addr1");
        f_addr1.value = addr + extra_addr;

        const f_zipcode = document.querySelector("#f_zipcode");
        f_zipcode.value = data.zonecode;

        const f_addr2 = document.querySelector("#f_addr2");
        f_addr2.focus();
      },
    }).open();
  });

  const btn_submit = document.querySelector("#btn_submit");

  btn_submit.addEventListener("click", () => {});
});
