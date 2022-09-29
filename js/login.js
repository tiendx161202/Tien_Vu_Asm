const card = document.getElementById("card");

const btn = document.getElementById("register");

const cls = document.getElementById("close");

const con = document.getElementById("confirm");
btn.addEventListener("click", () => {
  card.classList.remove("from_register");
  card.classList.add("active_btn");
});

con.addEventListener("click", () => {
  card.classList.add("from_register");
  card.classList.remove("active_btn");
});

