document.addEventListener("DOMContentLoaded", () => {
  const signup = document.querySelector("#signup");
  signup.addEventListener("click", () => {
    window.location.href = "./stipulation.php";
  });

  const goadmin = document.querySelector(".goadmin");
  goadmin.addEventListener("click", () => {
    window.location.href = "./admin";
  });
});
