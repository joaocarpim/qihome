
<?php

if (isset($_POST['submit'])) {
  $secret = "6LfWFDgmAAAAAJ8bgjDvoMBpABAqMT4Cr-40B4Aa";
  $response = $_POST['g-recaptcha-response'];
  $remoteip = $_SERVER['REMOTE_ADDR'];
  $url = "https://www.google.com/recaptcha/api/siteverify?secret=$secret&response=$response&remoteip=$remoteip";
  $data = file_get_contents($url);
  $row = json_decode($data, true);

  if ($row['success'] == "true") {
    echo "<script>alert('Uau você não é um robô 😲');</script>";
  } else {
    echo "<script>alert('Ops você é um robô 😡');</script>";
  }

}

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
  <link rel="stylesheet" href="style.css">
  <script src="https://www.google.com/recaptcha/api.js" async defer></script>
    <title>Google Recaptcha v2 - Brave Coder</title>
</head>
<body>

  <form method="post" onsubmit="return validarFormulario()"class="container">
    <h5>Google Recaptcha</h5>
    <br>
    <div class="row">
      <div class="g-recaptcha" data-sitekey="6LfWFDgmAAAAAOqkbljC5rNOYsUC11A3rteXk2Wu"></div>
    </div>
    <button class="btn wave-effect wave-light" type="submit" name="submit">Confirmar</button>
    <div id="erro-recaptcha" style="color: red;"></div>
  </form>
  <script>
    function validarFormulario() {
    var captcha = grecaptcha.getResponse();
    var erroRecaptcha = document.getElementById('erro-Recaptcha');

    if (captcha.length == 0) {
      erroRecaptcha.innerHTML = 
      alert("Por favor, preencha o reCAPTCHA antes de prosseguir com o formulário.");
      return false;
    }
    erroRecaptcha.innerHTML = "";
    return true;
  }
  </script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
</body>
</html>
