const links = document.querySelectorAll(".navegacao a");
links.forEach((link) => {
  link.addEventListener("click", () => {
    document.querySelector(".navegacao a.active")?.classList.remove("active");
    link.classList.add("active");
  });
});
