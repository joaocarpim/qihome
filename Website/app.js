
const inputs = document.querySelectorAll(".input-field");
const toggle_btn = document.querySelectorAll(".toggle");
const main = document.querySelector("main");
const bullets = document.querySelectorAll(".bullets span");
const images = document.querySelectorAll(".image");

inputs.forEach((inp) => {
  inp.addEventListener("focus", () => {
    inp.classList.add("active");
  });
  inp.addEventListener("blur", () => {
    if (inp.value != "") return;
    inp.classList.remove("active");
  });
});

toggle_btn.forEach((btn) => {
  btn.addEventListener("click", () => {
    main.classList.toggle("sign-up-mode");
  });
});

function moveSlider() {
  let index = this.dataset.value;

  let currentImage = document.querySelector(`.img-${index}`);
  images.forEach((img) => img.classList.remove("show"));
  currentImage.classList.add("show");

  const textSlider = document.querySelector(".text-group");
  textSlider.style.transform = `translateY(${-(index - 1) * 2.2}rem)`;

  bullets.forEach((bull) => bull.classList.remove("active"));
  this.classList.add("active");
}

bullets.forEach((bullet) => {
  bullet.addEventListener("click", moveSlider);
});
//gera senha

let sliderElement = document.querySelector("#slider");
let buttonElement = document.querySelector("#button");

let sizePassword = document.querySelector("#valor");
let password = document.querySelector("#password");

let containerPassword = document.querySelector("#container-password");

let charset = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789!@#$%¨&*()-=_+/?.,;":|';
let novaSenha = '';

sizePassword.innerHTML = sliderElement.value;

slider.oninput = function() {
  sizePassword.innerHTML = this.value;
}


function generatePassword(){

  var popup = document.getElementById("popup-geraSenha");
    popup.classList.remove("open-popup");

  let pass = '';
  for(let i = 0, n = charset.length; i < sliderElement.value; ++i){
    pass += charset.charAt(Math.floor(Math.random() * n));
  }
  
  console.log(pass)
  containerPassword.classList.remove("hide");
  password.innerHTML = pass;
  novaSenha = pass;

}



/*=============== ACESSIBILIDADE PARA SURDOS ===============*/

const elementosParaLer = document.querySelectorAll('p, a, h1, h2, h6, input, button, button, div, img');
const toggleButton = document.getElementById('toggleButton');
const icone = document.getElementById('icone');
let acessibilidadeHabilitada = true;
let leituraHabilitada = true;

//botão que habilita e desabilita a voz
toggleButton.addEventListener('click', () => {
    leituraHabilitada = !leituraHabilitada;
});

toggleButton.addEventListener('click', () => {
    acessibilidadeHabilitada = !acessibilidadeHabilitada;

    // Alterna o ícone com base na acessibilidade
    if (acessibilidadeHabilitada) {
        icone.src = 'https://img.icons8.com/ios-filled/50/not-hearing.png';
    } else {
        icone.src = 'https://img.icons8.com/ios-filled/50/hearing.png';
    }
});

    // ação de ler o texto quando um elemento da página recebe foco
elementosParaLer.forEach(elemento => {
    elemento.addEventListener('focus', () => {
        if (leituraHabilitada) {
            const texto = elemento.getAttribute('aria-label') || elemento.textContent;

            lerTexto(texto);
        }
    });
});

function lerTexto(texto, voz) {
    const utterance = new SpeechSynthesisUtterance(texto);
    speechSynthesis.speak(utterance);
}
