
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="./assets/img/logobg.png" type="image/x-icon">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="./assets/css/style.css">
    <link rel="stylesheet" href="./bootstrap-5/">
    <link rel="stylesheet" href="home.php">

    <title>Sobre Nós</title>

    <script>
      function toggleWhatsBox() {
          var whatsBox = document.getElementById("whats-box");
          whatsBox.classList.toggle("whats__box-open");
      }
    </script>
    <style>
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
        .whats__content {
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
<body style="background: #131212;">
    <!-- acessibilidade libras -->
    <div aria-label="Botão de acessibilidade libras" tabindex="0" vw class="enabled">
        <div vw-access-button class="active"></div>
        <div vw-plugin-wrapper>
            <div class="vw-plugin-top-wrapper"></div>
        </div>
    </div>
    
    <script src="https://vlibras.gov.br/app/vlibras-plugin.js"></script>
    <script>new window.VLibras.Widget('https://vlibras.gov.br/app');</script>

    <!-- contato whatsApp -->
        
    <div aria-label="Botão para contato via, whats app" tabindex="0" class="whats__btn">
      <a onclick="toggleWhatsBox()">
        <i class="fa-brands fa-whatsapp" style="font-size: 35px; align-items: center;"></i>
      </a>
    </div>

        <!-- Acessibilidade visual -->

    <div aria-label="Botão desabilitar acessibilidade a deficientes visuais" tabindex="0" class="deaf__btn" id="toggleButton">
        <div class="deaf__icon">
            <img id="icone" src="https://img.icons8.com/ios-filled/50/not-hearing.png" alt="not-hearing"/>
        </div>
    </div>
    <div class="whats__box" id="whats-box" style="display: block;"> 
        <div class="whats__header">
            <img class="whats__brand" src="./assets/img/suport.png">
            <div class="whats__brand-text">
              <div tabindex="0" class="whats__brand-name">Suporte</div>
              <div tabindex="0" class="whats__brand-subtitle">Respondemos dentro de um dia</div>
            </div>
            <div class="whats__close-btn">
              <img style="display: table-row" onclick="toggleWhatsBox()" src="https://cdn.shopify.com/s/files/1/0070/3666/5911/files/Vector.png?574">
            </div>
        </div> 
                
        <div class="whats__content">
          <div class="whats__content-chat">                            
            <div tabindex="0" class="whats__whats__content-chat-brand">Suporte</div>
              <div tabindex="0" class="whats__whats__content-chat-welcome">Olá!<br>
                Seja muito bem-vindo(a) ao nosso suporte!<br><br> 
                Estamos aqui para te ajudar ou solucionar algum problema. 😉<br> <br> 
                Conte- nos sobre o que precisa. 😌<br><br> 
                Faremos o possível para solucionar seu problema. 🧐</div>
          </div>
        </div>
                
        <a tabindex="0" href="https://wa.me/551130042222" target="_blank" class="whats__send">
            <img class="whats__brand" src="./assets/img/whatsapp_icon.png">
            Iniciar conversa
        </a>
    </div>
      <script src="./assets/js/main.js"></script>

    <header class="header" id="header">
        <nav class="nav container__nav">
            <a aria-label="Link para logar" tabindex="0" href="./home.php" class="nav__logo">  
                <img src="./assets/img/logobg.png" style="display: inline-block; width: 40px; height: 30px; margin-right: -5px; margin-left: 5px; margin-top: 3px;" alt="QI HOME">
                <div class="nav__fontLogo"> 
                    <h2><span class="nav__logo">QI</span</h2> 
                    <span class="nav__logo1">HOME</span>                
                </div>
            </a>
            <div class="nav__menu">
                <ul class="nav__list" style=" margin-right: 0%; display: flex; flex-direction: row; align-items: center; text-align: center; ">
                    <li class="nav__item">
                        <a aria-label="Link de Inicio" tabindex="0" href="./home.php" class="nav__link">
                            <i class='bx bx-home-alt-2'></i>
                            <span>Inicio</span>
                        </a>
                    </li>

                    <li class="nav__item">
                        <a aria-label="Link Sobre nós" tabindex="0" href="./sobreNos.php" class="nav__link">
                            <i class='bx bx-group'></i>
                            <span>Sobre nós</span>
                        </a>
                    </li>

                    <li class="nav__item">
                        <a aria-label="Link de Política de privacidade" tabindex="0" href="./Politica_privacidade.php" class="nav__link">
                            <i class='bx bx-receipt'></i>
                            <span>Política de privacidade</span>
                        </a>
                    </li>

                    <li class="nav__item">
                        <a aria-label="Link Termo de Serviços" tabindex="0" href="./termo_servico.php" class="nav__link">
                            <i class='bx bx-news'></i>
                            <span>Termo de Serviços</span>
                        </a>
                    </li>
                </ul>
            </div>
            <a aria-label="link de dúvidas frequentes" tabindex="0" href="./logar.php" class="button nav__button">
                Acessar
            </a>
        </nav>
    </header>

    <!-- acessibilidade libras -->
    <div vw class="enabled">
        <div vw-access-button class="active"></div>
        <div vw-plugin-wrapper>
            <div class="vw-plugin-top-wrapper"></div>
        </div>
    </div>
    <script src="https://vlibras.gov.br/app/vlibras-plugin.js"></script>
    <script>
    new window.VLibras.Widget('https://vlibras.gov.br/app');
    </script>

    <!-- contato whatsApp -->
        
    <div class="whats__btn">
      <a onclick="toggleWhatsBox()">
        <i class="fa-brands fa-whatsapp" style="font-size: 35px; align-items: center;"></i>
      </a>
    </div>
    <div class="whats__box" id="whats-box" style="display: block;"> 
        <div class="whats__header">
            <img class="whats__brand" src="./assets/img/suport.png">
            <div class="whats__brand-text">
              <div class="whats__brand-name">Suporte</div>
              <div class="whats__brand-subtitle">Respondemos dentro de um dia</div>
            </div>
            <div class="whats__close-btn">
              <img style="display: table-row" onclick="toggleWhatsBox()" src="https://cdn.shopify.com/s/files/1/0070/3666/5911/files/Vector.png?574">
            </div>
        </div> 
                
        <div class="whats__content">
          <div class="whats__content-chat">                            
            <div class="whats__whats__content-chat-brand">Suporte</div>
              <div class="whats__whats__content-chat-welcome">Olá!<br>
                Seja muito bem-vindo(a) ao nosso suporte!<br><br> 
                Estamos aqui para te ajudar ou solucionar algum problema. 😉<br> <br> 
                Conte- nos sobre o que precisa. 😌<br><br> 
                Faremos o possível para solucionar seu problema. 🧐</div>
          </div>
        </div>
                
        <a href="https://wa.me/551130042222" target="_blank" class="whats__send">
            <img class="whats__brand" src="./assets/img/whatsapp_icon.png">
            Iniciar conversa
        </a>
    </div>

    <main class="main">
        <section class="home section" id="home">
            <div class="home__container container grid">
                <div class="home__data">
                
                <h2 aria-label="Sobre nós segue abaixo">Sobre Nós</h2>
                    <p tabindex="0">A proposta da empresa QiHome é desenvolver uma solução de proteção residencial, oferecendo aos usuários uma casa autônoma integrada a um site web. </p>
                    <br>
                    <p tabindex="0">Essa proposta tem como objetivo principal proporcionar praticidade, conforto e economia aos seus clientes. Com a tecnologia desenvolvida pela 
                        QiHome, os usuários terão controle total sobre sua residência por meio do site web. </p>
                        <br>

                    <p tabindex="0">Isso significa que eles poderão monitorar diferentes aspectos da casa, como chuva, incêndio, terremoto, entre outros, de forma remota e conveniente. 
                        Além disso, a casa autônoma da QiHome está equipada com sistemas inteligentes que aprendem e se adaptam aos padrões de uso dos moradores, 
                        proporcionando uma experiência personalizada e otimizada. Isso resulta em maior eficiência energética, redução de desperdícios e, consequentemente, 
                        economia financeira.</p>
                        <br>

                    <p tabindex="0">Com a proposta de proteção residencial da QiHome, os clientes podem desfrutar de um ambiente seguro e monitorado, com recursos como, sensores 
                        de movimento e alarmes integrados ao sistema. Tudo isso é facilmente acessível por meio do site web, permitindo que os usuários tenham 
                        tranquilidade e controle total sobre a segurança de sua casa. </p>
                        <br>

                    <p tabindex="0">Em resumo, a empresa QiHome oferece uma solução completa de proteção residencial, combinando automação, tecnologia móvel e segurança para 
                        proporcionar aos clientes praticidade, conforto e economia em suas residências.</p>
                        <br>
                </div>
            </div>
        </section>
    </main>
    <footer class="footer section">
            <div id="footer__content">
                <div id="footer__contacts">
                    <h3 aria-label="Contato pelas redes sociais" tabindex="0">Redes Sociais</h3>
                    <div id="footer__social-media">
                        <a aria-label="Link para acessar o instagram" tabindex="0" tabindex="0" href="#" class="footer__link" id="instagram">
                            <i class="fa-brands fa-instagram"></i>
                        </a>
    
                        <a aria-label="Link para acessar o facebook" tabindex="0" href="#" class="footer__link" id="facebook">
                            <i class="fa-brands fa-facebook-f"></i>
                        </a>
                        
                        <a aria-label="Link para acessar o whatsapp" tabindex="0" href="#" class="footer__link" id="whatsapp">
                        <i class="fa-regular fa-envelope" style="color: #db4a39; font-size: 32px; border-width: 4px;"></i>
                        </a>
                    </div>
                </div>
                <ul class="footer__list">
                    <li>
                        <h3 aria-label="Área institucional" tabindex="0">Institucional</h3>
                    </li>
                    <li>
                        <a aria-label="Link para acessar sobre nós" tabindex="0" href="./sobreNos.php" class="footer__link">Sobre nós</a>
                    </li>
                    <li>
                        <a aria-label="Link para acessar os terms de Serviço" tabindex="0" href="./termo_Servico.php" class="footer__link">Termos de Serviços</a>
                    </li>
                    <li>
                        <a aria-label="Link para acessar a política de privacidade" tabindex="0" href="./politica_privacidade.php" class="footer__link">Política de Privacidade</a>
                    </li>
                </ul>
                <ul class="footer__list">
                    <li>
                        <h3 tabindex="0">Conformidades</h3>
                        <p tabindex="0"><br>Respeitamos a privacidade dos nossos usuários e 
                            nos esforçamos para garantir a conformidade com 
                            as leis de proteção de dados aplicáveis. 
                        </p>
                    </li>               
                </ul>
                <div class="footer__subscribe">
                    <h3 aria-label="Contate- nos" tabindex="0" >Contato</h3>
                    <p tabindex="0">
                        Entre em contato conosco acessando nosso e-mail   
                        para que possamos dar a atenção devida.
                    </p> 
                </div>   
            </div>
            <div aria-label="QiHome tem todos os direitod reservados" tabindex="0" id="footer__copyright">
                &#169
                2023 Todos os direitos reservados. 
            </div>
        </footer>
        <script>
            /*=============== ACESSIBILIDADE DEFICIENTES VISUAIS ===============*/

            const elementosParaLer = document.querySelectorAll('p, a, h1, h2, h6, input, button, div, img');
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
            
            // Aguarde o evento de carregamento das vozes antes de usar
            window.speechSynthesis.onvoiceschanged = function() {
                const vozesDisponiveis = speechSynthesis.getVoices();
                
                // Atualize as opções do select com as vozes disponíveis
                vozesDisponiveis.forEach(voz => {
                    const option = document.createElement('option');
                    option.value = voz.name;
                    option.textContent = voz.name;
                    vozSelect.appendChild(option);
                });
            };
        </script>
        <script src="./assets/js/main.js"></script>
    </body>
</html>