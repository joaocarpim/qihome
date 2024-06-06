<?php
ob_start();
var_dump($_REQUEST);

function open_database() {
	try {
		$conn = new mysqli('localhost', 'id21420608_qihome', '012458913Jaaj!', 'id21420608_bd');
		$conn -> set_charset ("utf8");
		return $conn;
		echo ("\nConexão criada.\n");
	} catch (Exception $e) {
		echo "<h3>Conexão mal-sucedida:\n<br>" . $e->getMessage() . "</h3>";
		return null;
	}
}

function close_database($conn) {
	try {
		mysqli_close($conn);
		echo ("\nConexão encerrada.\n");
	} catch (Exception $e) {
		echo "<h3>Erro ao fechar conexão:\n<br>" . $e->getMessage() . "</h3>";
	}
}

$senha_ext = "a4XXFt";
$senha_exe = "";
$sensor = "";
$estado = "";
$continue = true;

//while ($continue == true)
//{
    sleep(3);
    if ($_SERVER["REQUEST_METHOD"] == "POST")
    {
        echo("\nCondição de requisição POST.\n");
        $senha_exe = $_POST["senha_exe"];
        if($senha_exe == $senha_ext)
        {
            echo("\nSenha bem verificada.\n");
            // set parameters
            $sensor = $_POST["sensor"];
            $estado = $_POST["estado"];
    
    		$database = open_database();
    		$sql = "INSERT INTO tbl_status_sensor(sensor, estado) VALUES ('$sensor', '$estado');";
    		try {
    			$database->query($sql);
    			$_SESSION['message'] = 'Registro cadastrado com sucesso.';
    			$_SESSION['type'] = 'success';
    			echo($_SESSION['message']);
    		} catch (Exception $e) { 
    			$_SESSION['message'] = "\n<h3>Não foi possivel realizar a operação:\n<br>" . $e->getMessage() . "<h3>\n";
    			$_SESSION['type'] = 'danger';
    			echo($_SESSION['message']);
    		}
    		sleep(3);
    		close_database($database);
        }
        else {
            echo "ERRO DE SEGURANÇA.";
        }
    }
    else {
        echo "No data posted with HTTP POST.";
    }
    ob_flush();
    ob_end_clean();
    sleep(1);
//}