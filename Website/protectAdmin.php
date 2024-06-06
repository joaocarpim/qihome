<?php
if(!isset($_SESSION)) {
    session_start();
}

// Verifica se o usuario é admin
if (!isset($_SESSION['nome']) || $_SESSION['nome'] !== "admin") {
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
        
        .error-message {
            width: 400px;
            background: #181a1e; 
            border-radius: 6px;
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
    echo "<h2>Erro ao acessar!</h2>";
    echo "<p>Você precisa ser administrador para acessar esse recurso!</p>";
    echo "<a href='../home.php'>Voltar</a>";
    echo "</div>";
    exit;
}
?>
