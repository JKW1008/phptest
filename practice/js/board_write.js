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
  // 게시판 목록으로 이동하기
  const btn_board_list = document.querySelector("#btn_board_list");
  btn_board_list.addEventListener("click", () => {
    const params = getUrlParams();

    self.location.href = "./board.php?bcode=" + params["bcode"];
  });

  // 게시물 작성 후 확인 버튼 클릭시
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

    const params = getUrlParams();

    const f = new FormData();
    f.append("subject", id_subject.value); // 게시물 제목
    f.append("content", markupStr); // 게시물 내용
    f.append("bcode", params["bcode"]); // 게시판 코드
    f.append("mode", "input"); // 모드 : 글 등록

    const xhr = new XMLHttpRequest();
    xhr.open("post", "./pg/board_process.php", true);
    xhr.send(f);

    xhr.onload = () => {
      if (xhr.status == 200) {
        const data = JSON.parse(xhr.responseText);
        if (data.result == "success") {
          alert("등록 되었습니다.");
          self.location.href = "./board.php?bcode=" + params["bcode"];
        }
      } else if (xhr.status == 404) {
        alert("통신 실패 파일이 존재하지 않습니다.");
      }
    };
  });
});
