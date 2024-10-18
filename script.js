// Pega o botão que abre o modal
var btn = document.getElementById("openModalBtn");
var btn2 = document.getElementById("openModalBtn2");

// Pega o elemento <span> que fecha o modal
var span = document.getElementsByClassName("closeBtn")[0];
var span2 = document.getElementsByClassName("closeBtn2")[0];

// Pega os modais
var modal = document.getElementById("myModal");
var modal2 = document.getElementById("myModal2");

// Quando o botão é clicado, abre o modal
btn.onclick = function() {
  modal.style.display = "block";
  document.body.classList.add('modal-open');
}

btn2.onclick = function() {
  modal2.style.display = "block";
  document.body.classList.add('modal-open');
}

// Quando o usuário clicar no <span> (x), fecha o modal
span.onclick = function() {
  modal.style.display = "none";
  document.body.classList.remove('modal-open');
}

span2.onclick = function() {
  modal2.style.display = "none";
  document.body.classList.remove('modal-open');
}

// Quando o usuário clicar fora do modal, ele também fecha
window.onclick = function(event) {
  if (event.target == modal) {
    modal.style.display = "none";
    document.body.classList.remove('modal-open');
  }
  if (event.target == modal2) {
    modal2.style.display = "none";
    document.body.classList.remove('modal-open');
  }
}