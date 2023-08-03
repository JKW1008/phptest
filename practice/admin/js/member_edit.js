document.addEventListener("DOMContentLoaded", () => {
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
});
