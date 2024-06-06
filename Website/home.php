<?php
session_start();
include_once('conexao.php');

$conn = new mysqli('localhost', 'root', '', 'bd-projeto_iot');
$conn -> set_charset ("utf8");

$fogo = $conn->query("SELECT DISTINCT * from tbl_status_sensor where datahora = (SELECT max(datahora) from tbl_status_sensor) and sensor = 'Sensor de Fogo';");
$vibracao = $conn->query("SELECT DISTINCT * from tbl_status_sensor where datahora = (SELECT max(datahora) from tbl_status_sensor) and sensor = 'Sensor de Vibracao';");
$chuva = $conn->query("SELECT DISTINCT * from tbl_status_sensor where datahora = (SELECT max(datahora) from tbl_status_sensor) and sensor = 'Sensor de Chuva';");
$movimento = $conn->query("SELECT DISTINCT * from tbl_status_sensor where datahora = (SELECT max(datahora) from tbl_status_sensor) and sensor = 'Sensor de Movimento';");
$alarme = $conn->query("SELECT DISTINCT * from tbl_status_sensor where datahora = (SELECT max(datahora) from tbl_status_sensor) and sensor = 'Alarme';");	
// Fecha conexão 
mysqli_close($conn);
?>

<?php include('./protect.php');?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Monitoramento</title>
    
    <link rel="shortcut icon" href="./assets/img/logobg.png" type="image/x-icon">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Sharp:opsz,wght,FILL,GRAD@48,400,0,0" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons+Sharp" />

    <link rel="stylesheet" href="./style/style.css">

    <link rel="stylesheet" href="./index.php">
    <link href='https://use.fontawesome.com/releases/v5.8.2/css/all.css' rel='stylesheet' type='text/css'/>


    <script src='https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js'></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        function openPopupLogout() {
            var popup = document.getElementById("popup-logout");
            var form = document.getElementById("logout-form");
            form.action = "./logout.php";
            popup.classList.add("open-popup");
        }

        function closePopupLogout() {
            var popup = document.getElementById("popup-logout");
            popup.classList.remove("open-popup");
        }
		setTimeout(function(){
		   window.location.reload(1);
		}, 8000);
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
            margin-left: -5%;
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
                <a href="./index.php" class="dash">
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
                <a href="./home.php" class="active">
                    <span class="material-icons-sharp">dashboard</span>
                    <h3>Monitoramento</h3>
                </a>
                <a href="./dados.php" class="dash">
                    <span class="material-icons-sharp">sensors</span>
                    <h3>Dados Sensores</h3>
                </a>

                <?php if(isset($_SESSION['nome']) && $_SESSION['nome'] == "admin"): ?>

                    <a href="./usuarios.php" class="dash">
                        <span class="material-icons-sharp">group</span>
                        <h3>Dados usuarios</h3>
                    </a>
                    <a href="./admin/edit.php" class="dash">
                        <span class="material-icons-sharp">manage_accounts</span>
                        <h3>Editar Usuários</h3>
                    </a>
                    <a href="./admin/add.php" class="dash">
                        <span class="material-icons-sharp">person_add</span>
                        <h3>Adicionar Usuários</h3>
                    </a>

                <?php endif; ?>

                <a href="./sobreNos.php" class="dash">
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
            <div>
                <hr>
            </div>
            <h2 style="margin-left: 70%;">Bem vindo ao Painel,  <?php echo $_SESSION['nome']; ?>!</h2>
            <h1>Monitoramento</h1>
            <div class="date">
                <input type="date">
            </div>
        
            <!-- Modal logout-->
            <div class="container_modal">
                <div class="popup" id="popup-logout">
                    <img src="./images/att.png">
                    <h2>Sair da conta!</h2>
                    <p>Atenção! Tem certeza que deseja prosseguir!</p>
                    <form id="logout-form" method="post">
                    <button style="margin-left: 10px; background: #b92632; margin-top: 30px; width: 40%; text-align: center; padding-top: 10px; font-size: 1rem; float: left;" type="button" class="button danger" onclick="closePopupLogout()">Cancelar</button>                                
                    <button style="margin-left: 50px; margin-top: 30px; width: 40%; text-align: center; padding-top: 10px; font-size: 1rem; float: left;" type="submit" class="button success" onclick="openPopupLogout()">Sair</button>
                    </form>
                </div>
            </div>

        <!-- sensoresA -->
            <div class="insights">
                <div class="sensoresA">
                    <span class="material-icons-sharp">done_all</span>
                    <div class="middle">
                        <div class="left">
                            <h3>SENSOR DE CHUVA</h3>
                            <h1 style="font-size: 1.2rem;" class="success"><?php while ($dados = mysqli_fetch_assoc($chuva)) { echo $dados['estado']; } ?></h1>
                        </div>
                        <div class="progress">
                            <div class="number">
                                <h3 class="success">+</h3>
                            </div>
                        </div>
                    </div>
                    <small style="font-size: 0.25rem;" class="text-muted"><?php while ($dados = mysqli_fetch_assoc($chuva)) { echo date('H:i:s', strtotime($dados['datahora'])); } ?></small>
                </div>
                

        <!-- sensoresAa -->
                <div class="sensoresAa">
                    <span class="material-icons-sharp">done_all</span>
                    <div class="middle">
                        <div class="left">
                            <h3>SENSOR DE INCÊNDIO</h3>
                            <h1 style="font-size: 1.2rem;" class="success"><?php while ($dados = mysqli_fetch_assoc($fogo)) { echo $dados['estado']; } ?></h1>
                        </div>
                        <div class="progress">
                            <div class="number">
                                <h3 class="success">+</h3>
                            </div>
                        </div>
                    </div> 
                    <small class="text-muted"><?php while ($dados = mysqli_fetch_assoc($fogo)) { echo date('H:i:s', strtotime($dados['datahora'])); } ?></small>
                </div>

         <!-- sensoresAa -->
                <div class="sensoresAa">
                    <span class="material-icons-sharp">done_all</span>
                    <div class="middle">
                        <div class="left">
                            <h3>SENSOR DE VIBRAÇÃO</h3>
                            <h1 style="font-size: 1.2rem;" class="success"><?php while ($dados = mysqli_fetch_assoc($vibracao)) { echo mb_strimwidth($dados['estado'], 0, 26, ".."); } ?></h1>
                        </div>
                        <div class="progress">
                            <div class="number">
                                <h3 class="success">+</h3>
                            </div>
                        </div>
                    </div>
                    <small class="text-muted"><?php while ($dados = mysqli_fetch_assoc($vibracao)) { echo date('H:i:s', strtotime($dados['datahora'])); } ?></small>
                </div>
            </div>

                        
            <!-- sensoresB -->
            <div class="insights">
                <div class="sensoresB">
                    <span class="material-icons-sharp">done_all</span>
                    <div class="middle">
                        <div class="left">
                            <h3>SENSOR DE MOVIMENTO</h3>
                            <h1 style="font-size: 1.2rem;" class="success"><?php while ($dados = mysqli_fetch_assoc($movimento)) { echo $dados['estado']; } ?></h1>
                        </div>
                        <div class="progress">
                            <div class="number">
                                <h3 class="success">+</h3>
                            </div>
                        </div>
                    </div>
                    <small class="text-muted"><?php while ($dados = mysqli_fetch_assoc($movimento)) { echo date('H:i:s', strtotime($dados['datahora'])); } ?></small>
                </div>

            <!-- sensoresBb -->
                <div class="sensoresBb">
                    <span class="material-icons-sharp">close</span>
                    <div class="middle">
                        <div class="left">
                            <h3>SISTEMA DE ALARME</h3>
                            <h1 style="font-size: 1.2rem;" class="danger"><?php while ($dados = mysqli_fetch_assoc($alarme)) { echo $dados['estado']; } ?></h1>
                        </div>
                        <div class="progress">
                            <div class="number">
                                <h3 class="danger">-</h3>
                            </div>
                        </div>
                    </div> 
                    <div class="text-muted">
						<?php 
							while ($dados = mysqli_fetch_assoc($alarme)) { 
								echo "<td class='warning'>".date('d - m - Y', strtotime($dados['datahora']))."</td>"; 
							} 
						?>
					</small>
                </div>

            <!-- sensoresBb -->
                <!--<div class="sensoresBb">
                    <span class="material-icons-sharp">close</span>
                    <div class="middle">
                        <div class="left">
                            <h3>PORTA ENTRADA</h3>
                            <h1 class="danger">FECHADA</h1>
                        </div>
                        <div class="progress">
                            <div class="number">
                                <h3 class="danger">-</h3>
                            </div>
                        </div>
                    </div>
                    <small class="text-muted">Last 24 hours</small>
                </div>-->
            </div>
        </main>
         <!-- menu -->
        <div class="right">
            <div class="top">  
                <!-- comodos -->
                <div class="sensoresA-analytics">
                    <h2>Cômodos</h2>
                    <!-- TD -->
                    <div href="./dados.php" class="item td">
                        <div class="icon">
                            <span class="material-icons-sharp">select_all</span>
                        </div>
                        <div class="right">
                            <div class="info">
                                <h3>TODOS</h3>
                                <small class="text-muted">Todas funções</small>
                            </div>
                            <h3 class="success">+</h3>
                        </div>
                    </div>

                    <!-- SEGURANÇA -->
                    <div class="item seguranca">
                        <div class="icon">
                            <span class="material-symbols-sharp">security</span>
                        </div>
                        <div class="right">
                            <div class="info">
                                <h3>SEGURANÇA</h3>
                                <small class="text-muted">Prevenção e Proteção</small>
                            </div>
                            <h3 class="success">+</h3>
                        </div>
                    </div>

                    <!-- EXTERNO -->
                    <div class="item externo">
                        <div class="icon">
                            <span class="material-symbols-sharp">pip_exit</span>
                        </div>
                        <div class="right">
                            <div class="info">
                                <h3>ESPAÇO EXTERNO</h3>
                                <small class="text-muted">Funções externas</small>
                            </div>
                            <h3 class="success">+</h3>
                        </div>
                    </div>

                    <!-- INTERNO -->
                    <div class="item interno">
                        <div class="icon">
                            <span class="material-symbols-sharp">pip</span>
                        </div>
                        <div class="right">                            
                            <div class="info">
                            <h3>ESPAÇO INTERNO</h3>
                            <small class="text-muted">Funções internas</small>
                        </div>
                        <h3 class="success">+</h3>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <footer>
        <div id="footer_content">
            <div id="footer_contacts">
                <h3>Redes Sociais</h3>
                <div id="footer_social_media">

                    <a href="https://www.instagram.com/qi_home_/" class="footer-link" id="instagram">
                        <i class="fa-brands fa-instagram"></i>
                    </a>

                    <a href="#" class="footer-link" id="facebook">
                        <i class="fa-brands fa-facebook-f"></i>
                    </a>
                    
                    <a href="https://api.whatsapp.com/send/?phone=551130042222&text&type=phone_number&app_absent=0" class="footer-link" id="whatsapp">
                        <i class="fa-brands fa-whatsapp"></i>
                    </a>
                </div>
            </div>
            <ul class="footer-list">
                <li>
                    <h3>Institucional</h3>
                </li>
                <li>
                    <a href="./sobreNos.php" class="footer-link">Sobre nós</a>
                </li>
                <li>
                    <a href="./termo_Servico.php" class="footer-link">Termos de Serviços</a>
                </li>
                <li>
                    <a href="./politica_Privacidade.php" class="footer-link">Política de Privacidade</a>
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
</div>
</body>
</html>