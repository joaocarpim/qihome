<?php
session_start();
include_once('../conexao.php');

//Add 

if(isset($_POST['nome']) || isset($_POST['email']) || isset($_POST['senha'])) {

    if(strlen($_POST['nome']) == 0) {
        echo "Preencha seu nome";
    } else if(strlen($_POST['email']) == 0) {
        echo "Preencha sua e-mail";
    }else if(strlen($_POST['senha']) == 0) {
        echo "Preencha sua senha";
    } else {

        $nome = $mysqli->real_escape_string($_POST['nome']);
        $email = $mysqli->real_escape_string($_POST['email']);
        $senha = $mysqli->real_escape_string($_POST['senha']);

        $sql_code = "SELECT * FROM tbl_user WHERE nome = '$nome' AND email = '$email' AND senha = '$senha'";
        $sql_query = $mysqli->query($sql_code) or die("Falha na execução do código SQL: " . $mysqli->error);

        $quantidade = $sql_query->num_rows;

        if ($quantidade == 0) {
            // Registro de tbl_user
        
            $nome = $_POST['nome'];
            $email = $_POST['email'];
            $senha = $_POST['senha'];
                
            // Criptografa a senha
            $senhaCriptografada = base64_encode($_POST["senha"]); 
        
            // Insere o novo usuário no banco de dados
            $sql = "INSERT INTO tbl_user (nome, email, senha) VALUES ('$nome', '$email', '$senhaCriptografada')";
        
            if ($mysqli->query($sql) === TRUE) {
                echo "<style>
                @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500&display=swap');
            
                    body {
                        background-color: #0fc78a;
                        display: flex;
                        justify-content: center;
                        align-items: center;
                        height: 100vh;
                        margin: 0;
                    }                          

                    .error-message {
                        width: 400px;
                        background: #181a1e; 
                        border-radius: 6px;
                        text-align: center;
                        padding: 30px;
                        color: #fff;
                    }
            
                    .error-message img {
                        max-width: 30%;
                        height: auto;
                    }
            
                    .error-message h2 {
                        font-size: 38px;
                        font-weight: 700;
                        margin: 30px 0 10px;
                        font-family: poppins, sans-serif;
                    }
            
                    .error-message p {
                        color: #dce1eb;
                        font-weight: 500;
                        font-family: poppins, sans-serif;
                    }
            
                    .error-message a {
                        display: block;
                        margin-top: 50px;
                        padding: 10px 15px;
                        background: #11cc6b;
                        color: #fff;
                        font-weight: 500;
                        font-family: poppins, sans-serif;
                        text-decoration: none;
                        font-size: 18px;
                        border-radius: 4px;
                        cursor: pointer;
                        box-shadow: 0 5px 5px rgba(0, 0, 0, 0.2);
                    }
                </style>";
            
                echo "<div class='error-message'>";
                echo "<img src='../images/tick.png'>";
                echo "<h2>Registro concluído!</h2>";
                echo "<p>O novo usuário pode realizar login com o novo registro.</p>";
                echo "<a href='../usuarios.php'>Voltar</a>";
                echo "</div>";
                die();
            } else {
                echo "Erro ao registrar usuário: " . $mysqli->error;
            }
        
            // Fecha a conexão com o banco de dados
            $mysqli->close();
        } else {
            echo "<style>
            @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500&display=swap');
        
                body {
                    background-color: #d12525c2;
                    display: flex;
                    justify-content: center;
                    align-items: center;
                    height: 100vh;
                    margin: 0;
                }
                .img {
                    width: 10px;
                    height: 10px;
                }
                
                .error-message {
                    width: 400px;
                    background: #181a1e; 
                    border-radius   : 6px;
                    text-align: center;
                    padding: 30px;
                    color: #fff;
                }
        
                .error-message img {
                    max-width: 100%;
                    height: auto;
                }
        
                .error-message h2 {
                    font-size: 38px;
                    font-weight: 700;
                    margin: 30px 0 10px;
                    font-family: poppins, sans-serif;
                }
        
                .error-message p {
                    color: #dce1eb;
                    font-weight: 500;
                    font-family: poppins, sans-serif;
                }
        
                .error-message a {
                    display: block;
                    margin-top: 50px;
                    padding: 10px 15px;
                    background: #0fc78a;
                    color: #fff;
                    font-weight: 500;
                    font-family: poppins, sans-serif;
                    text-decoration: none;
                    font-size: 18px;
                    border-radius: 4px;
                    cursor: pointer;
                    box-shadow: 0 5px 5px rgba(0, 0, 0, 0.2);
                }
            </style>";
        
            echo "<div class='error-message'>";
            echo "<img src='../images/att.png'>";
            echo "<h2>Falha ao logar!</h2>";
            echo "<p>Seu E-mail ou senha estão incorretos.</p>";
            echo "<a href='./add.php'>Voltar</a>";
            echo "</div>";
            die();
        }   
    }
}
  ?>

  <?php include('../protectAdmin.php');?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dados Usuarios</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Sharp:opsz,wght,FILL,GRAD@48,400,0,0" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons+Sharp" />
    <link rel="shortcut icon" href="../assets/img/logobg.png" type="image/x-icon">
    <link rel="stylesheet" href="../style/style_dados.css">
    <link rel="stylesheet" href="../style/style_edit.css">
    <link rel="stylesheet" href="../bootstrap-5/">
    <link rel="stylesheet" href="../home.php">

    <script>
        function openPopup(userId) {
            var popup = document.getElementById("popup");
            var form = document.getElementById("delete-form");
            form.action = "./admin/delete.php?id=" + userId;
            popup.classList.add("open-popup");
        }

        function openPopupLogout() {
            var popup = document.getElementById("popup-logout");
            var form = document.getElementById("logout-form");
            form.action = "./logout.php";
            popup.classList.add("open-popup");
        }

        function closePopup() {
            var popup = document.getElementById("popup");
            popup.classList.remove("open-popup");
        }

        function closePopupLogout() {
            var popup = document.getElementById("popup-logout");
            popup.classList.remove("open-popup");
        }

    </script>
    <!-- Style modal-->
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
            background: #151313; 
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
            top: 50%;
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
        .popup h2 {
            font-weight: 500;
            color: #fff;
            font-family: poppins, sans-serif;
        }

        .popup button {
            width: 100%;
            margin-top: 50px;
            padding: 10px 0;
            background: #0fc78a;
            color: #fff;
            border: 0;
            outline: none;
            font-size: 18px;
            border-radius: 4px;
            cursor: pointer;
            box-shadow: 0 5px 5px rgba(0, 0, 0, 0.2);
        }

    </style>

</head>
<body>
    <div class="container">
        <aside>
            <div class="top">
                <div class="logo">                    
                </div>
                <a href="../index.php" class="dash">
                <div class="fontLogo"> 
                    <h2><span class="logo">QI</span</h2> 
                    <span class="logo1">HOME</span>                
                </div>
                </a>
                <div class="close" id="close-btn">
                    <span class="material-icons-sharp">close_outline</span>
                </div>
            </div>
            <div class="sidebar">
                <a href="../home.php" class="dash">
                    <span class="material-icons-sharp">dashboard</span>
                    <h3>Monitoramento</h3>
                </a>
                <a href="../dados.php" class="dash">
                    <span class="material-icons-sharp">sensors</span>
                    <h3>Dados Sensores</h3>
                </a>
                <?php if(isset($_SESSION['nome']) && $_SESSION['nome'] == "admin"): ?>

                    <a href="../usuarios.php" class="dash">
                        <span class="material-icons-sharp">group</span>
                        <h3>Dados usuarios</h3>
                    </a>
                    <a href="./edit.php" class="dash">
                        <span class="material-icons-sharp">manage_accounts</span>
                        <h3>Editar Usuários</h3>
                    </a>
                    <a href="./add.php" class="active">
                        <span class="material-icons-sharp">person_add</span>
                        <h3>Adicionar Usuários</h3>
                    </a>

                <?php endif; ?>
                <a href="../sobreNos.php" class="dash">
                    <span class="material-icons-sharp">diversity_3</span>
                <h3>Sobre nós</h3>
                </a>
                
                <a href="#" onclick="openPopupLogout()">
                    <span class="material-icons-sharp">logout</span>
                    <h3>Sair</h3>
                </a>
            </div>
        </aside>
        <main>
        <div class="box">
            <!-- Modal logout-->
            <div class="container_modal">
                <div class="popup" id="popup-logout">
                    <img src="../images/att.png">
                    <h2>Sair da conta!</h2>
                    <p>Atenção! Tem certeza que deseja prosseguir!</p>
                    <form id="logout-form" method="post">
                    <button style="margin-left: 10px; background: #b92632; margin-top: 30px; width: 40%; text-align: center; padding-top: 10px; font-size: 1rem; float: left;" type="button" class="button danger" onclick="closePopupLogout()">Cancelar</button>                                
                    <button style="margin-left: 50px; margin-top: 30px; width: 40%; text-align: center; padding-top: 10px; font-size: 1rem; float: left;" type="submit" class="button success" onclick="openPopupLogout()">Sair</button>
                    </form>
                </div>
            </div>
            <div class="inner-box">
            <div class="forms-wrap">
                <form action="./add.php" method="POST" autocomplete="off" onsubmit="return validarFormulario()" class="sign-in-form">
                    
                    <div class="heading">
                        <h2>Adicionar Usuários</h2>
                        <h6>Olá ADMIN! Adicione um Usuario abaixo.</h6>
                    </div>

                <div class="actual-form">
                    <div class="input-wrap">
                        <label>Nome</label>
                        <input
                            type="text"
                            name="nome"
                            min="4"
                            max="50"
                            autocomplete="off"
                            class="input-field"
                            pattern="^(?!.*(\w)\1)[a-zA-ZÀ-ÿ\s]+$"
                            title="Digite um nome válido, sem caracteres especiais, números ou repetir caracteres consecutivos!"
                            required
                        />
                    </div>


                    <div class="input-wrap">
                        <label>Email</label>
                        <input
                            type="text"
                            name="email"
                            autocomplete="off"
                            min="14"
                            max="50"                    
                            class="input-field"
                            pattern="[a-zA-Z0-9._%+-]+@gmail\.com"
                            title="Digite um email válido do Gmail, com o domínio @gmail.com"        
                            required
                        />
                    </div>


                    <div class="inputBox">
                        <label>Senha</label>
                        <input
                            id="pswrd"
                            name="senha" 
                            min="4"
                            max="12"
                            type="password"           
                            autocomplete="off"
                            pattern="^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[!@#$%^&*()_\-+=?<>])(?!.*(.)\1)\S{8,}$"
                            class="input-field"
                            title="A senha deve ter pelo menos 8 caracteres, um caractere minúsculo um caractere maiúsculo, um número, um caractere especial, não pode conter caracteres repetidos consecutivos e não pode conter espaços!"
                            onkeyup="checkPassword(this.value)"
                            required
                        />
                        <span id="toggleBtn" class="pswrd"></span>
                    </div>

                    <div class="validation">
                        <ul>
                            <li id="lower">Pelo menos um caractere minúsculo</li>
                            <li id="upper">Pelo menos um caractere maiúsculo</li>
                            <li id="number">Pelo menos um numero</li>
                            <li id="special">Pelo menos um caractere especial</li>
                            <li id="length">Pelo menos 8 caracteres</li>
                        </ul>
                    </div>

                    
                    <div class="button-container">
                        <a href="../usuarios.php" style="margin-left: -5px; margin-top: 30px; width: 40%; text-align: center; padding-top: 10px; font-size: 1rem; float: left;" class="sign-btn">Voltar</a>
                        <input href="../usuarios.php" type="submit" style="margin-left: 60px; margin-top: 30px; width: 40%; text-align: center; font-size: 1rem; float: left;" value="Adicionar" class="sign-btn" />
                    </div>                  
                </div>
            </form>
            </div>
            </div>
        </div>
        </main>
    </div>
    <footer>
        <div id="footer_content">
            <div id="footer_contacts">
                <h3>Redes Sociais</h3>
                <div id="footer_social_media">

                    <a href="#" class="footer-link" id="instagram">
                        <i class="fa-brands fa-instagram"></i>
                    </a>

                    <a href="#" class="footer-link" id="facebook">
                        <i class="fa-brands fa-facebook-f"></i>
                    </a>
                    
                    <a href="#" class="footer-link" id="whatsapp">
                        <i class="fa-brands fa-whatsapp"></i>
                    </a>
                </div>
            </div>
            <ul class="footer-list">
                <li>
                    <h3>Institucional</h3>
                </li>
                <li>
                    <a href="../sobreNos.php" class="footer-link">Sobre nós</a>
                </li>
                <li>
                    <a href="../termo_Servico.php" class="footer-link">Termos de Serviços</a>
                </li>
                <li>
                    <a href="../politica_Privacidade.php" class="footer-link">Política de Privacidade</a>
                </li>
            </ul>
            <ul class="footer-list">
                <li>
                    <h3>Conformidades</h3>
                    <p><br>Respeitamos a privacidade dos nossos usuários e 
                        nos esforçamos para garantir a conformidade com 
                        as leis de proteção de dados aplicáveis. 
                    </p>
                </li>               
            </ul>

            <div class="footer_subscribe">
                <h3>Contato</h3>
                <p>
                    Entre em contato conosco acessando nosso e-mail   
                    para que possamos dar a atenção devida.
                </p> 
                <div id="footer_contacts">
                    <div id="footer_social_media">
                        <a href="#" class="footer-link" id="envelope">
                            <img width="24" height="24" src="https://img.icons8.com/color/48/gmail-new.png" alt="gmail-new"/>
                        </a>
                    </div>
                </div>  
            </div>   
        </div>
        <div class="footer_copyright">
            &#169
            2023 Todos os direitos reservados. 
        </div>
    </footer>
        <script>
            
            let pswrd = document.getElementById('pswrd');
            let toggleBtn = document.getElementById('toggleBtn');


            toggleBtn.onclick = function() {
                if(pswrd.type === 'password'){
                pswrd.setAttribute('type', 'text');
                toggleBtn.classList.add('hide');
                } else {
                pswrd.setAttribute('type', 'password');
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