<?php
//ob_start();
var_dump($_REQUEST);

function open_database() {
	try {
		$conn = new mysqli('localhost', 'root', '', 'bd-projeto_iot');
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

$senha_exe = "";
$sensorF = "";
$estadoF = "";
$sensorV = "";
$estadoV = "";
$sensorM = "";
$estadoM = "";
$sensorC = "";
$estadoC = "";
$sensorL = "";
$estadoL = "";
//$continue = true;

//while ($continue == true)
//{
    //sleep(3);
    if ($_SERVER["REQUEST_METHOD"] == "POST")
    {
        echo("\nCondição de requisição POST.\n");
        $senha_exe = $_POST["senha_exe"];
        if($senha_exe == "a4XXFt")
        {
            echo("\nSenha bem verificada.\n");
            // set parameters
			$sensorF = $_POST["sensorF"];
			$estadoF = $_POST["estadoF"];
			$sensorV = $_POST["sensorV"];
			$estadoV = $_POST["estadoV"];
			$sensorM = $_POST["sensorM"];
			$estadoM = $_POST["estadoM"];
			$sensorC = $_POST["sensorC"];
			$estadoC = $_POST["estadoC"];
			$sensorL = $_POST["sensorL"];
			$estadoL = $_POST["estadoL"];
    
    		$database = open_database();
			$prepared_str = $database->prepare("INSERT INTO tbl_status_sensor(sensor, estado) VALUES (?, ?), (?, ?), (?, ?), (?, ?), (?, ?);");
    		try {
				$prepared_str->bind_param(
					'ssssssssss',
					$sensorF,
					$estadoF,
					$sensorV,
					$estadoV,
					$sensorC,
					$estadoC,
					$sensorM,
					$estadoM,
					$sensorL,
					$estadoL
				);
				$prepared_str->execute();
    			$_SESSION['message'] = 'Registro cadastrado com sucesso.';
    			$_SESSION['type'] = 'success';
    			echo($_SESSION['message']);
    		} catch (Exception $e) { 
    			$_SESSION['message'] = "\n<h3>Não foi possivel realizar a operação:\n<br>" . $e->getMessage() . "<h3>\n";
    			$_SESSION['type'] = 'danger';
    			echo($_SESSION['message']);
    		}
    		//sleep(3);
    		close_database($database);
        }
        else {
            echo "ERRO DE SEGURANÇA.";
        }
    }
    else {
        echo "No data posted with HTTP POST.";
    }
    //ob_flush();
    //ob_end_clean();
    //sleep(1);
//}