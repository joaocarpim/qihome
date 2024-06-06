<?php
session_start();
include_once('../conexao.php');

// Verifica se o ID esta na URL para exibir o dado do usuario específico
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Consulta com banco para pegar por id 
    $sql = "SELECT * FROM tbl_user WHERE id = $id";
    $result = $mysqli->query($sql);
    
}

// Fecha conexão 
$mysqli->close();
?>

<?php include('../protect.php');?>
<?php include('../protectAdmin.php');?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dados Usuarios</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Sharp:opsz,wght,FILL,GRAD@48,400,0,0" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons+Sharp" />
    <link rel="shortcut icon" href="../assets/img/logobg.png" type="image/x-icon">
    <link rel="stylesheet" href="../style/style_dados.css">
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
                    <a href="./add.php" class="dash">
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
            <h1>Usuario </h1>
               
            <?php
                if ($result->num_rows > 0) {

                    // Exibe os dados do usuário
                    $row = $result->fetch_assoc();
                    echo "<h2>Id: ".$row['id']."</h2>";
                    echo "<h2>Nome: ".$row['nome']."</h2>";
                    echo "<h2>Email: ".$row['email']."</h2>";
                    echo "<h2>Senha: ".$row['senha']."</h2>";
                   
                } 
            ?>
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
</body>
</html>