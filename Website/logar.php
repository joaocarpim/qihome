<?php
include('conexao.php');
include('recaptcha.php');
include('login.php');
include('registro.php');

?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Entrar</title>
    <link rel="shortcut icon" href="./assets/img/logobg.png" type="image/x-icon">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="./bootstrap-5/">

    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
    <link rel="stylesheet" href="./style/style_signin.css" />
    <script>
        function openPopupGerar() {
          var popup = document.getElementById("popup-geraSenha");
          popup.classList.add("open-popup");
        }

        function toggleWhatsBox() {
          var whatsBox = document.getElementById("whats-box");
          whatsBox.classList.toggle("whats__box-open");
        }
    </script>
    <style>
      @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500&display=swap');
        .button {
          padding: 10px 60px;
          border: 0;
          outline: none;
          cursor: pointer;
          font-size: 22px;
          font-weight: 500;
          border-radius: 30px;
          font-family: poppins, sans-serif;
        }

        .popup {
            width: 400px;
            background: #d3cbcb; 
            border-radius: 6px;
            position: absolute;
            top: 0;
            left: 50%;
            transform: translate(-50%, -50%) scale(1);
            text-align: center;
            padding: 0 30px 30px;
            color: #333;
            visibility: hidden;
            transition: transform 0.4s, top 0.4s;
        }

        .open-popup {
            visibility: visible;
            top: 30%;
            transform: translate(-50%, -50%);
        }

        .popup img {
            width: 100px;
            margin-top: -15%;
            border-radius: 50%;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.2);
        }

        .popup h2 {
            font-size: 38px;
            font-weight: 500;
            margin: 30px 0 10px;
            color: #fff;
            font-family: poppins, sans-serif;

        }

        .popup button {
            width: 100%;
            margin-top: 50px;
            padding: 10px 0;
            background: #8f5fe0;
            color: #fff;
            border: 0;
            outline: none;
            font-size: 18px;
            border-radius: 4px;
            cursor: pointer;
            box-shadow: 0 5px 5px rgba(0, 0, 0, 0.2);
        }

        #erro-recaptcha {
          display: none;
          color: red;
          background-color: #ffdddd;
          padding: 10px;
          border: 2px solid #ff9999;
          border-radius: 5px;
          margin-top: 10px;
          margin-bottom: 10px;
        }
        .title{
          text-align: center;
          color: #3a3838;
          font-size: 14px;
          margin-top: 24px;
          margin-bottom: 8px;
        } 
        .slider {
          margin-top: 8px;
          width: 100%;
          height: 18px;
          border-radius: 5px;  
          background: #DFDFDF;
          outline: none;
          opacity: 0.7;
        }
        .password{
          height: 40px;
          background-color: #8f5fe0;
          border: 1px solid #8f5fe0;
          display: flex;
          justify-content: center;
          align-items: center;
          color: #FFF;
          border-radius: 4px;
          transition: transform 0.5s;
        }
        .password:hover{
          transform: scale(1.05);
          border-color: #FFF;
          cursor: pointer;
        }
        
        .hide{
          display: none;
        }
        
        .tooltip{
          color: #FFF;
          position: relative;
          top: 20px;
          padding: 6px 8px;
          font-size: 16px;
          border-radius: 6px;
          background: rgb(15, 15, 15);
          opacity: 0;
          visibility: hidden;
          transition: all .5s ease-in-out;
          text-align: center;
        }
        
        .container-password:hover .tooltip{
          bottom: 50px;
          visibility: visible;
          opacity: 1;
          cursor: pointer;
        }

        @keyframes pulse-deaf {
            0% {
                transform: scale(1);
                box-shadow: 0 0 0 0 rgba(255, 255, 255, 0.3);
            }
            50% {
                transform: scale(1.05);
                box-shadow: 0 0 0 1px rgba(255, 255, 255, 0.2);
            }
            100% {
                transform: scale(1);
                box-shadow: 0 0 0 0 rgba(255, 255, 255, 0.3);
            }
        }
        .whats__btn {
            cursor: pointer;
        }
       
        .deaf__btn {
            margin-bottom: 290px;
            position: fixed;
            width: 65px;
            height: 65px;
            bottom: 220px;
            right: 20px;
            border-radius: 50%;
            margin-right: -10px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.2);
            border: 5px solid #ffffff1f;
            animation: pulse-deaf 2s infinite;
            cursor: pointer;
        }
        .deaf__icon {
            display: flex;
            align-items: center;
            justify-content: center;
            text-decoration: none;
            background-color: #d9e6de; 
            color: #ffffff; 
            font-weight: bold;
            width: 55px;
            height: 55px;
            border-radius: 50%;
            transition: transform 0.4s, top 0.4s;
        }
        .deaf__icon:after {
            transition: transform 0.4s, top 0.4s;
            background-color: #d9e6de; 
        }
        .deaf__btn:hover {
            transition: transform 0.4s, top 0.4s;
        }
    </style>
  </head>
  <body>  
    <main>
      <!-- acessibilidade libras -->
      <div aria-label="Botão de acessibilidade libras" tabindex="0" vw class="enabled">
          <div vw-access-button class="active"></div>
          <div vw-plugin-wrapper>
              <div class="vw-plugin-top-wrapper"></div>
          </div>
      </div>
      <script src="https://vlibras.gov.br/app/vlibras-plugin.js"></script>
      <script>new window.VLibras.Widget('https://vlibras.gov.br/app');</script>

    <!-- Acessibilidade visual -->

    <div aria-label="Botão desabilitar acessibilidade a deficientes visuais" tabindex="0" class="deaf__btn" id="toggleButton">
        <div class="deaf__icon">
            <img id="icone" src="https://img.icons8.com/ios-filled/50/not-hearing.png" alt="not-hearing"/>
        </div>
    </div>

    
    <div class="box">
        <div class="inner-box">
          <div class="forms-wrap">
            <form action="login.php" method="POST" autocomplete="off" onsubmit="return validarFormulario()" class="sign-in-form">
              <div tabindex="0" class="logo">
                <img src="./assets/img/logobg.png" style="display: inline-block; width: 40px; height: 30px; margin-right: -5px; margin-left: 5px; margin-top: 3px;" alt="QI HOME">
                  <h2><span class="nav__logo" >QI</span</h2> 
                  <span class="nav__logo1" >HOME</span> 
              </div>

              <div tabindex="0" class="heading">
                <h2>Bem vindo</h2>
                <h6>Ainda não é registrado?</h6>
                <a href="#" class="toggle">Registre-se</a>
              </div>
              <div class="actual-form">
              <div aria-label="Aqui vc pode preencher seu email. 
                    Digite um email válido do Gmail, 
                    com o domínio @gmail.com e 
                    não pode conter caracteres repetidos consecutivos!" 
                    tabindex="0" 
                    class="input-wrap">
                  
                    <input                     
                    type="text"
                    minlength="20"
                    maxlength="50"
                    name="email"
                    class="input-field"
                    autocomplete="off"
                    pattern="^(?!.*(\w)\1)[a-zA-Z0-9._%+-]+@gmail\.com$"
                    title=" Digite um email válido do Gmail, com o domínio @gmail.com e não pode conter caracteres repetidos consecutivos!"
                    required/>                    
                  <label>Email</label>
                </div>

                <div aria-label="Aqui vc pode preencher sua senha, ela obrigatóramente deve conter: 
                  A senha deve ter pelo menos 8 caracteres, 
                  um caractere minúsculo um caractere maiúsculo, 
                  um número, um caractere especial, 
                  não pode conter caracteres repetidos consecutivos e 
                  não pode conter espaços!"
                  tabindex="0"
                  class="inputBox">
                  <input                    
                    id="pswrd-login"
                    minlength="8"
                    maxlength="14"
                    name="senha"
                    type="password" 
                    pattern="^(?!.*\s)(?!.*(.)(?=\1)).{8,}$"
                    title="A senha deve ter pelo menos 8 caracteres, não pode conter caracteres repetidos consecutivos e não pode conter espaços!"             
                    class="input-field"
                    autocomplete="off"
                    required
                  />
                  <label>Senha</label>
                  <span id="toggleBtn"></span>
                </div>

                <!-- Recaptcha google-->
                <div aria-label="recaptcha do google" tabindex="0" class="recaptcha">
                  <div class="g-recaptcha" 
                    data-sitekey="6LfWFDgmAAAAAOqkbljC5rNOYsUC11A3rteXk2Wu" 
                    style="transform: scale(0.8); margin: 10px auto; margin-right: 200px;">
                  </div>
                    <div id="erro-recaptcha"></div>
                </div>

                <div aria-label="link para entrar" tabindex="0">
                  <input  
                    href="home.php" 
                    type="submit" 
                    value="Entrar" 
                    class="sign-btn" 
                  />
                </div>
                <p tabindex="0" class="text">
                Esqueceu sua senha ou seus dados de login?
                  <a tabindex="0" id="recover-password-button"  
                    onclick="recoverPassword()" desabled="true">
                    Obter ajuda
                  </a> para entrar
                </p>
              </div>
            </form>

            <form action="registro.php" autocomplete="off" method="POST" class="sign-up-form">
              <div tabindex="0" class="logo">
                <img src="./assets/img/logobg.png" style="display: inline-block; width: 40px; height: 30px; margin-right: -5px; margin-left: 5px; margin-top: 3px;" alt="QI HOME">
                  <h2><span class="nav__logo" >QI</span</h2> 
                  <span class="nav__logo1" >HOME</span> 
              </div>

              <div class="heading">
                <h2 aria-label="Página onde voce poderá se registrar" tabindex="0">Registre- se</h2>
                <h6 tabindex="0">Já tem uma conta?</h6>
                <a aria-label="Aperte aqui para voltar para entrar no site com seu registro" tabindex="0" href="#" class="toggle">Entrar</a>
              </div>

              <div class="actual-form">
              <div aria-label="Aqui vc pode preencher seu nome. 
                      Digite um nome válido, 
                      sem caracteres especiais, 
                      números ou repetir caracteres consecutivos!"                         
                      tabindex="0"
                      class="input-wrap">
                    <input                      
                      type="text"
                      name="nome"
                      minLength="4"
                      maxLength="30"
                      autocomplete="off"
                      class="input-field"
                      pattern="^(?!.*(\w)\1)[a-zA-ZÀ-ÿ\s]+$"
                      title="Digite um nome válido, sem caracteres especiais, números ou repetir caracteres consecutivos!"
                      required
                    />
                    <label >Nome</label>
                </div>
                <div 
                  aria-label="Aqui vc pode preencher seu email. 
                  Digite um email válido do Gmail, 
                  com o domínio @gmail.com e 
                  não pode conter caracteres repetidos consecutivos!" 
                  tabindex="0"
                  class="input-wrap">
                  <input                    
                    name="email"
                    type="text"
                    minLength="20"
                    maxLength="50"
                    class="input-field"
                    autocomplete="off"
                    pattern="^(?!.*(\w)\1)[a-zA-Z0-9._%+-]+@gmail\.com$"
                    title="Digite um email válido do Gmail, com o domínio @gmail.com e não pode conter caracteres repetidos consecutivos!"
                    required/>
                  <label >Email</label>
                </div>
                <div class="inputBox">
                  <input
                    aria-label="Aqui vc pode preencher sua senha, ela obrigatóramente deve conter: 
                    A senha deve ter pelo menos 8 caracteres, 
                    um caractere minúsculo um caractere maiúsculo, 
                    um número, um caractere especial, 
                    não pode conter caracteres repetidos consecutivos e 
                    não pode conter espaços!" 
                    tabindex="0"
                    id="pswrd-signup"
                    minlength="8"
                    maxlength="14"
                    name="senha"
                    type="password"           
                    autocomplete="off"
                    pattern="^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[!@#$%^&*()_\-+=?<>])(?!.*(.)\1)\S{8,}$"
                    class="input-field"
                    title="A senha deve ter pelo menos 8 caracteres, um caractere minúsculo um caractere maiúsculo, um número, um caractere especial, não pode conter caracteres repetidos consecutivos e não pode conter espaços!"
                    onkeyup="checkPassword(this.value)"
                    required
                  />
                  <label>Senha</label>
                  <span id="toggleBtn"></span>
                </div>
                

                <div class="container_modal">
                  <div class="popup" id="popup-geraSenha">
                    <h3 tabindex="0">Gerador de senha</h3>
                    <span tabindex="0">Tamanho <span id="valor"></span> caracteres</span>
                    <input 
                      tabindex="0"
                      id="slider"
                      class="slider" 
                      type="range" 
                      min="8" 
                      max="14" 
                      value="15"
                    />
                    <button tabindex="0" id="button" class="button-cta" onclick="generatePassword()">Gerar senha</button>
                  </div>

                  <div id="container-password" onclick="copyPassword()" class="container-password hide">
                    <span tabindex="0" class="title">Senha gerada:</span>
                    <span id="password"  class="password"></span>
                  </div>
                </div>

                <div tabindex="0" class="text">
                  Quer ajuda para criar sua senha?
                  <a tabindex="0"  href="#" id="popup-geraSenha"  
                    onclick="openPopupGerar()" desabled="true">
                    Obter ajuda
                  </a> 
                </div>

                <div class="validation">
                  <ul>
                      <li tabindex="0" id="lower">Pelo menos um letra minúscula</li>
                      <li tabindex="0" id="upper">Pelo menos um letra maiúscula</li>
                      <li tabindex="0" id="number">Pelo menos um numero</li>
                      <li tabindex="0" id="special">Pelo menos um caractere especial</li>
                      <li tabindex="0" id="length">Pelo menos 8 caracteres</li>
                  </ul>
                </div>
                <input 
                  aria-label="botão para se registrar"
                  tabindex="0"
                  href="login.php" 
                  type="submit" 
                  value="Registrar" 
                  class="sign-btn" 
                />

                <p tabindex="0" class="text">
                  <input 
                    class="check"
                    type="checkbox" 
                    required
                  />
                  Ao me registrar, li e concordo com os
                  <a tabindex="0" href="./termo_Servico.php">Termos de serviços</a> e
                  <a tabindex="0" href="./politica_Privacidade.php">política de Privacidade</a>
                </p>
              </div>
            </form>
          </div>

          <div class="carousel">
            <div class="images-wrapper">
              <img aria-label="imagem com seu dono feliz por ter uma casa segura" tabindex="0" src="./images/slide.gif" class="image img-1 show" alt="" />
              <img aria-label="imagem com pessoas se divertinto sem preocupações" tabindex="0"src="./images/slides1.gif" class="image img-2" alt="" />
              <img aria-label="imagem da dona de casa monitorando sua casa pelo nosso site tranquila" tabindex="0"src="./images/slide2.gif" class="image img-3" alt="" />
            </div>

            <div class="bullets">
              <span class="active" data-value="1"></span>
              <span data-value="2"></span>
              <span data-value="3"></span>
            </div>
          </div>
        </div>
      </div>
    </main>
    <script>
      
document.addEventListener('DOMContentLoaded', function () {
  const images = document.querySelectorAll('.image');
  const bullets = document.querySelectorAll('.bullets span');
  const textGroup = document.querySelector('.text-group');

  let currentImageIndex = 0;

  function showImage(index) {
    images.forEach((image, i) => {
      image.classList.remove('show');
      bullets[i].classList.remove('active');
    });

    images[index].classList.add('show');
    bullets[index].classList.add('active');
  }

  function showText(index) {
    const textElements = textGroup.querySelectorAll('h2');

    textElements.forEach((textElement, i) => {
      textElement.classList.remove('show');
    });

    textElements[index].classList.add('show');
  }

  function nextImage() {
    currentImageIndex = (currentImageIndex + 1) % images.length;
    showImage(currentImageIndex);
    showText(currentImageIndex);
  }

  function prevImage() {
    currentImageIndex = (currentImageIndex - 1 + images.length) % images.length;
    showImage(currentImageIndex);
    showText(currentImageIndex);
  }

  bullets.forEach((bullet, index) => {
    bullet.addEventListener('click', () => {
      currentImageIndex = index;
      showImage(currentImageIndex);
      showText(currentImageIndex);
    });
  });

  setInterval(nextImage, 3000); // Trocar a imagem a cada 3 segundos (ajuste conforme necessário)
});



     function validarFormulario() {
      var captcha = grecaptcha.getResponse();
      var erroRecaptcha = document.getElementById('erro-recaptcha');

      if (captcha.length == 0) {
        tabindex="0"
        erroRecaptcha.innerHTML = "Por favor, preencha o reCAPTCHA antes de prosseguir com o formulário.";
        erroRecaptcha.style.display = "block"; // Exibe a mensagem de erro
        return false;
      }

      erroRecaptcha.innerHTML = "";
      erroRecaptcha.style.display = "none"; // Oculta a mensagem de erro
      return true;
    }

      function openPopup(userId) {
            var popup = document.getElementById("popup");
            var form = document.getElementById("delete-form");
            form.action = "./admin/delete.php?id=" + userId;
            popup.classList.add("open-popup");
        }

        function closePopup() {
            var popup = document.getElementById("popup");
            popup.classList.remove("open-popup");
        }
    
    <!-- let pswrd = document.getElementById('pswrd'); -->
    let toggleBtn = document.getElementById('toggleBtn');

      toggleBtn.onclick = function() {
        if (document.getElementById('pswrd-login').type === 'password'){
          document.getElementById('pswrd-login').setAttribute('type', 'text');
          toggleBtn.classList.add('hide');
        } else {
          document.getElementById('pswrd-login').setAttribute('type', 'password');
          toggleBtn.classList.remove('hide');
        }
		if (document.getElementById('pswrd-signup').type === 'password'){
			document.getElementById('pswrd-signup').setAttribute('type', 'text');
			toggleBtn.classList.add('hide');
		} else {
          document.getElementById('pswrd-signup').setAttribute('type', 'password');
          toggleBtn.classList.remove('hide');
        }
      }

      let lowerCase = document.getElementById('lower');
      let upperCase = document.getElementById('upper');
      let digit = document.getElementById('number');
      let specialChar = document.getElementById('special');
      let minLength = document.getElementById('length');

    function checkPassword(data){
        const lower = new RegExp('(?=.*[a-z])');
        const upper = new RegExp('(?=.*[A-Z])');
        const number = new RegExp('(?=.*[0-9])');
        const special = new RegExp('(?=.*[!@#\$%\^&\*])');
        const length = new RegExp('(?=.{8,})');

        if(lower.test(data)) {
          lowerCase.classList.add('valid');
        } else {
          lowerCase.classList.remove('valid');
        }
        if(upper.test(data)) {
          upperCase.classList.add('valid');
        } else {
          upperCase.classList.remove('valid');
        }
        if(number.test(data)) {
          digit.classList.add('valid');
        } else {
          digit.classList.remove('valid');
        }
        if(special.test(data)) {
          specialChar.classList.add('valid');
        } else {
          specialChar.classList.remove('valid');
        }
        if(length.test(data)) {
          minLength.classList.add('valid');
        } else {
          minLength.classList.remove('valid');
        }
      }
  </script>
    <script src="app.js"></script>
  </body>
</html>