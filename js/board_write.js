function getUrlParams() {
  const params = {};

  window.location.search.replace(
    /[?&]+([^=&]+)=([^&]*)/gi,
    function (str, key, value) {
      params[key] = value;
    }
  );

  return params;
}

document.addEventListener("DOMContentLoaded", () => {
  const targetAddress = "board_write.php";

  if (window.location.href.includes(targetAddress)) {
    const params = getUrlParams();

    if (params["bcode"]) {
      const btn_board_list = document.querySelector("#btn_board_list");
      btn_board_list.addEventListener("click", () => {
        self.location.href = "./board.php?bcode=" + params["bcode"];
      });

      const btn_write_submit = document.querySelector("#btn_write_submit");
      btn_write_submit.addEventListener("click", () => {
        const id_subject = document.querySelector("#id_subject");
        if (id_subject.value == "") {
          alert("제목을 입력해 주세요.");
          id_subject.focus();
          return false;
        }

        const markupStr = $("#summernote").summernote("code");
        if (markupStr == "<p><br></p>") {
          alert("내용을 입력해 주세요.");
          return false;
        }

        const id_attach = document.querySelector("#id_attach");

        if (id_attach.files.length > 3) {
          alert("첨부할 수 있는 파일 수는 최대 3개까지 입니다.");
          id_attach.value = "";
          return false;
        }

        const f = new FormData();
        f.append("subject", id_subject.value);
        f.append("content", markupStr);
        f.append("bcode", params["bcode"]);
        f.append("mode", "input");

        let ext = "";

        for (const file of id_attach.files) {
          if (file.size > 40 * 1024 * 1024) {
            alert("파일 용량이 40MB를 초과했습니다.");
            id_attach.value = "";
            return false;
          }
          ext = getExtensionOfFilename(file.name);

          if (
            ext == "txt" ||
            ext == "exe" ||
            ext == "xls" ||
            ext == "dmg" ||
            ext == "php" ||
            ext == "js"
          ) {
            alert("첨부할 수 없는 포맷의 파일이 첨부되었습니다.(exe, txt 등)");
            id_attach.value = "";
            return false;
          }

          f.append("files[]", file);
        }

        const xhr = new XMLHttpRequest();

        xhr.open("post", "./pg/board_process.php", true);
        xhr.send(f);
        xhr.onload = () => {
          if (xhr.status == 200) {
            console.log(xhr.responseText);

            const data = JSON.parse(xhr.responseText);
            if (data.result == "success") {
              alert("등록 되었습니다.");
              self.location.href = "./board.php?bcode=" + params["bcode"];
            } else if (data.result == "file_upload_count_exceed") {
              alert("파일 업로드 갯수를 초과했습니다.");
              id_attach.value = "";
              return false;
            } else if (data.result == "post_size_exceed") {
              alert("첨부파일의 용량이 초과되었습니다.");
              id_attach.value = "";
              return false;
            } else if (data.result == "not_allowed_file") {
              alert(
                "첨부할 수 없는 포맷의 파일이 첨부되었습니다.(exe, txt 등)"
              );
              id_attach.value = "";
              return false;
            }
          } else if (xhr.status == 404) {
            alert("통신 실패 파일이 존재하지 않습니다.");
            id_attach.value = "";
            return false;
          }
        };
      });

      const id_attach = document.querySelector("#id_attach");
      id_attach.addEventListener("change", () => {
        if (id_attach.files.length > 3) {
          alert("파일은 최대 3개까지 첨부 가능합니다.");
          id_attach.value = "";
          return false;
        }
      });
    }
  }
});
