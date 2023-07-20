function checkId() {
  window.open(
    "checkId.php?userid=" + document.register.userid.value,
    "IDcheck",
    "left=50, top=50, width=50, height=10, scrollbars=no, resizeable=no"
  );
}
