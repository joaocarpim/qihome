

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

    <title>Qi Home</title>

    <script>
      function toggleWhatsBox() {
          var whatsBox = document.getElementById("whats-box");
          whatsBox.classList.toggle("whats__box-open");
      }
    </script>
    <script src="service-worker.js" defer></script>
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

        <!-- acessibilidade visual -->

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
                        <a aria-label="link de inicio" tabindex="0" href="./home.php" class="nav__link">
                            <i class='bx bx-home-alt-2'></i>
                            <span>Inicio</span>
                        </a>
                    </li>

                    <li class="nav__item">
                        <a aria-label="link segurança" tabindex="0" href="#popular" class="nav__link">
                            <i class='bx bx-check-shield'></i>
                            <span>Segurança</span>
                        </a>
                    </li>

                    <li class="nav__item">
                        <a aria-label="link de dúvidas frequentes" tabindex="0" href="#value" class="nav__link">
                            <i class='bx bx-help-circle'></i>
                            <span>Dúvidas</span>
                        </a>
                    </li>
                </ul>
            </div>
            <a aria-label="link para logar" tabindex="0" href="./logar.php" class="button nav__button">
                Acessar
            </a>
        </nav>
    </header>

    <main class="main">
        <section class="home section" id="home">
            <div class="home__container container grid">
                <div class="home__data">
                    <h1 tabindex="0" class="home__title">
                        Automação e
                        <br> Monitoramento Residencial 
                        <br> para proteger seu Lar 
                    </h1>
                    <p tabindex="0" class="home__description">
                        Somos uma cooperativa formada com o objetivo de fornecer 
                        melhorias na segurança de sua residência. 
                        <br><p tabindex="0" style="color:hsl(25, 83%, 53%); font-size: 20px; font-weight: bold;">
                        Conosco sua familia fica + segura!</p>
                    </p>
                </div>
            </div>
            <a aria-label="link para logar" tabindex="0" href="./logar.php" style="margin-left: 32.5%; margin-top: 1.5%;" class="button nav__button">
                Acessar
            </a>
            <div class="home__images">
                <div class="home__orbe"></div>
                <div class="home__img">
                    <img aria-label="imagem de um cômodo" tabindex="0" src="./assets/img/homelp.png" style="width: 700px; display: block; margin-left: auto; margin-right: auto;" alt="">
                </div>
            </div>
        </section>

        <section class="popular section" id="popular">
            <div class="popular__container container grid">
                <div class="popular__data">
                    <h1 tabindex="0" class="popular__title">
                        Garanta a 
                        <br>Segurança de sua 
                        <br> Residência
                    </h1>
                    <p tabindex="0" class="popular__description">
                        Você sabia que, de acordo com o folha UOL, apenas 15% das residências no Brasil
                        possuem sistemas de segurança em suas casas? 
                        <br>
                        <p tabindex="0" style="color:hsl(25, 83%, 53%); font-size: 20px; font-weight: bold;">
                        Como você protege a sua residência?</p>
                    </p>

                    <div class="popular__value">
                        <div>
                            <h1 aria-label="Mais de 1.7 milhões" tabindex="0" class="popular__value-number">
                                1.7M <span>+</span>
                            </h1>
                            <span aria-label="Para furtos domiciliares" tabindex="0" class="popular__descrition" style=" color:#ffffff5b;">
                                Furtos <br> domicíliares
                            </span>
                        </div>
                        
                        <div>
                            <h1 aria-label="Mais de 390 mil pessoas" tabindex="0" class="popular__value-number" style="margin-left: 0px;">
                                390K <span style="display:inline;">+</span>
                            </h1>
                            <span aria-label="Sofrem com furtos em São Paulo em 2020" tabindex="0" class="popular__descrition" style="margin-left: 0px; margin-right: 0px; color:#ffffff5b;">
                                Furtos SP <br> em 2020
                            </span>
                        </div>

                        <div>
                            <h1 aria-label="Mais de 15% das pessoas" tabindex="0" class="popular__value-number">
                                15% <span>+</span>
                            </h1>
                            <span aria-label="Tem moradia segura" tabindex="0" class="popular__description" style=" color:#ffffff5b;">
                                Moradias <br> Seguras
                            </span>
                        </div>
                    </div>
                </div>
            </div>
            <a aria-label="link para logar" tabindex="0" href="./logar.php" style="margin-left: 32.5%; margin-top: 1.5%;" class="button nav__button">
                Acessar
            </a>
            <div class="popular__images">
                <div class="popular__orbe"></div>
                <div class="popular__img">
                    <img aria-label="imagem de um cômodo" tabindex="0" src="./assets/img/homelp.png" style="width: 700px; display: block; margin-left: auto; margin-right: auto;" alt="">
                </div>
            </div>
        </section>

        <section class="value section" id="value">
            <div class="value__container container grid">
                <div class="value__content">
                    <div class="value__data">
                        <h2 tabindex="0" class="section__title">
                            Dúvidas Frequentes<span>.</span>
                        </h2>
                        <p tabindex="0" class="value__description" style="font-size: small;">
                            Descubra quais dúvidas chegam com mais frequência até nós 
                            e como QI Home pode te ajudar.  
                            <br>Confira nossas perguntas frequentes abaixo.<br>
                        </p>
                    </div>

                    <div class="value__accordion">
                        <div class="value__accordion-item">
                            <header class="value__accordion-header">
                                <i class='bx bxs-help-circle'></i>
                                <h3 tabindex="0" class="value__accordion-title">
                                    Como a automação residencial pode me ajudar 
                                    a melhorar a segurança da minha casa?
                                </h3>
                                <div class="value__accordion-arrow">
                                    <i class='bx bxs-down-arrow'></i>
                                </div>
                            </header>
                            <div class="value__accordion-content">
                                <p tabindex="0" class="value__accordion-description" style="font-size: small;">
                                    A automação residencial permite o controle e 
                                    monitoramento remotos de dispositivos de segurança, 
                                    como câmeras, sistemas de alarme e fechaduras 
                                    inteligentes, proporcionando uma maior proteção e 
                                    tranquilidade para sua residência.
                                </p>
                            </div>
                        </div>

                        <div class="value__accordion-item">
                            <header class="value__accordion-header">
                                <i class='bx bxs-help-circle'></i>
                                <h3 tabindex="0" class="value__accordion-title">
                                    Preciso de conhecimentos técnicos 
                                    para usar a automação residencial?
                                </h3>
                                <div class="value__accordion-arrow">
                                    <i class='bx bxs-down-arrow'></i>

                                </div>
                            </header>
                            <div class="value__accordion-content">
                                <p  tabindex="0" class="value__accordion-description" style="font-size: small;">
                                    Não é necessário ter conhecimentos técnicos avançados. 
                                    A maioria dos sistemas de automação residencial é 
                                    projetada para ser fácil de usar, com interfaces 
                                    intuitivas e aplicativos móveis amigáveis. 
                                    <br><br>Nossa equipe também oferece suporte e treinamento 
                                    para garantir que você possa aproveitar todos os
                                    benefícios da automação residencial sem complicações.                                
                                </p>
                            </div>
                        </div>

                        <div class="value__accordion-item">
                            <header class="value__accordion-header">
                                <i class='bx bxs-help-circle'></i>
                                <h3  tabindex="0" class="value__accordion-title">
                                    Como são protegidas as informações 
                                    coletadas pelos sistemas de segurança residencial?                                
                                </h3>
                                <div class="value__accordion-arrow">
                                    <i class='bx bxs-down-arrow'></i>

                                </div>
                            </header>
                            <div class="value__accordion-content">
                                <p tabindex="0" class="value__accordion-description" style="font-size: small;">
                                    A segurança de suas informações é uma prioridade.
                                    <br><br>Utilizamos tecnologias de criptografia avançadas 
                                    para proteger as informações coletadas pelos sistemas
                                    de segurança residencial. 
                                    <br><br>Além disso, garantimos que 
                                    as práticas de segurança e privacidade sejam seguidas 
                                    para manter suas informações confidenciais e 
                                    protegidas contra acesso não autorizado.                                
                                </p>
                            </div>
                        </div>

                        <div class="value__accordion-item">
                            <header class="value__accordion-header">
                                <i class='bx bxs-help-circle'></i>
                                <h3  tabindex="0" class="value__accordion-title">
                                    Quais são os benefícios de escolher 
                                    a QI Home para minha automação e segurança residencial?
                                </h3>
                                <div class="value__accordion-arrow">
                                    <i class='bx bxs-down-arrow'></i>

                                </div>
                            </header>
                            <div class="value__accordion-content">
                                <p  tabindex="0" class="value__accordion-description" style="font-size: small;">
                                    Ao escolher a QI Home, você se beneficia de nossa 
                                    abordagem centrada no cliente e nosso compromisso 
                                    com a segurança e a qualidade. 
                                    <br><br>Nossos serviços são altamente personalizados para 
                                    atender às suas necessidades específicas. 
                                    <br><br>Além disso, oferecemos suporte técnico 
                                    especializado, garantindo que você tenha 
                                    assistência sempre que precisar.
                                    <br><br>Nossa missão 
                                    é proporcionar a você tranquilidade e 
                                    proteção para sua residência e sua família.                                
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>

        <footer class="footer section">
            <div id="footer__content">
                <div id="footer__contacts">
                    <h3 aria-label="Contato pelas redes sociais" tabindex="0">Redes Sociais</h3>
                    <div id="footer__social-media">
                        <a aria-label="Link para acessar o instagram" tabindex="0" tabindex="0" href="https://www.instagram.com/qi_home_/" class="footer__link" id="instagram">
                            <i class="fa-brands fa-instagram"></i>
                        </a>
    
                        <a aria-label="Link para acessar o facebook" tabindex="0" href="#" class="footer__link" id="facebook">
                            <i class="fa-brands fa-facebook-f"></i>
                        </a>
                        
                        <a aria-label="Link para acessar o whatsapp" tabindex="0" href="https://api.whatsapp.com/send/?phone=551130042222&text&type=phone_number&app_absent=0" class="footer__link" id="whatsapp">
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
        /*=============== ACESSIBILIDADE PARA SURDOS ===============*/

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
                icone.src = 'https://img.icons8.com/ios-filled/50/hearing.png';
            } else {
                icone.src = 'https://img.icons8.com/ios-filled/50/not-hearing.png';
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