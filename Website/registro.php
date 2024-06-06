<?php
include('conexao.php');

//Registro 

if (isset($_POST['nome']) || isset($_POST['email']) || isset($_POST['senha'])) {

    $nome = $mysqli->real_escape_string($_POST['nome']);
    $email = $mysqli->real_escape_string($_POST['email']);
    $senhacript = base64_encode($_POST["senha"]);
    // Criptografa a senha

    $check_query  = "SELECT * FROM tbl_user WHERE email = '$email' AND senha = '$senhacript'";
    $check_result  = $mysqli->query($check_query) or die("Falha na execução do código SQL: " . $mysqli->error);

    if ($check_result->num_rows > 0) {

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
    echo "<img src='./images/att.png'>";
        echo "<h2>Falha ao logar!</h2>";
        echo "<p>Já existe um usuário utilizando estes dados.</p>";
        echo "<a href='./logar.php'>Entrar</a>";
        echo "</div>";
        die();
    }

    $quantidade = $check_result->num_rows;

    if ($quantidade == 0) {
        // Registro de tbl_user

        $nome = $_POST['nome'];
        $email = $_POST['email'];
        $senha = $_POST['senha'];

        // Insere o novo usuário no banco de dados
        $sql = "INSERT INTO tbl_user (nome, email, senha) VALUES ('$nome', '$email', '$senhacript')";

        if ($mysqli->query($sql) === TRUE) {

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
    echo "<img src='./images/att.png'>";
            echo "<h2>Registro concluído!</h2>";
            echo "<p>Você pode realizar login com o novo registro.</p>";
            echo "<a href='./logar.php'>Entrar</a>";
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
    echo "<img src='./images/att.png'>";
        echo "<h2>Falha ao logar!</h2>";
        echo "<p>Seu E-mail ou senha estão incorretos.</p>";
        echo "<a href='./logar.php'>Entrar</a>";
        echo "</div>";
        die();
    }
}
