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
  params = getUrlParams();

  // 글 목록
  const btn_list = document.querySelector("#btn_list");
  btn_list.addEventListener("click", () => {
    self.location.href = "./board.php?bcode=" + params["bcode"];
  });
});
