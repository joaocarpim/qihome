<?php
include('conexao.php');
include('recaptcha.php');
include('login.php');
include('registro.php');

?>
<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Perguntas de Segurança do Usuário</title>
    <link rel="stylesheet" href="./style.css"/>
</head>

<body>
    <main>
        <div class="back_box">
            <form action="registro.php" autocomplete="off" method="POST" id="form2" class="sign-up-form form-container">
                <div tabindex="0" class="logo">
                    <img src="./assets/img/logobg.png" style="display: inline-block; width: 40px; height: 30px; margin-right: -5px; margin-left: 5px; margin-top: 3px;" alt="QI HOME">
                    <h2><span class="nav__logo">QI</span></h2>
                    <span class="nav__logo1">HOME</span>
                </div>


                <div class="quiz-container">
                    <div class="question active" id="question1">
                        <br>
                        <h4>Você está quase lá. Responda algumas <br>
                            perguntas de segurança para garantirmos maior<br>
                            proteção de dados</h4>
                        <br>
                        <h1>Pergunta 1</h1>
                        <p>Qual é o nome do seu melhor amigo de infância?</p>
                        <input type="text" id="answer1" minlength="4" maxlength="15" class="input-field" autocomplete="off" title="Digite uma palavra correta! Sem espaço, números e caracteres especiais. Deve ter entre 4 e 15 caracteres." pattern="[A-Za-z]{4,15}" required />
                        <button onclick="checkAndNext('answer1', 'question2')">Próximo</button>

                    </div>
                    <div class="question" id="question2">
                        <h1>Pergunta 2</h1>
                        <br>Se você pudesse escolher uma única palavra para <br>
                        resumir o que mais valoriza na vida, qual seria?</p>
                        <input type="text" id="answer2" minlength="4" maxlength="15" class="input-field" autocomplete="off" title=" Digite uma palavra correta!" required />
                        <button onclick="checkAndNext('answer2', 'question3')">Próximo</button>

                    </div>
                    <div class="question" id="question3">
                        <h1>Pergunta 3</h1>
                        <p>Qual é a palavra que representa o que você<br>
                            busca alcançar em sua carreira ou profissão?</p>
                        <input type="text" id="answer3" minlength="4" maxlength="15" class="input-field" autocomplete="off" title=" Digite uma palavra correta!" required />
                        <button onclick="checkAndNext('answer3', 'question4')">Próximo</button>

                    </div>
                    <div class="question" id="question4">
                        <h1>Pergunta 4</h1>
                        <p>Qual é a palavra que melhor descreve como você<br>
                            se sente quando está em seu melhor momento?</p>
                        <input type="text" id="answer4" minlength="4" maxlength="15" class="input-field" autocomplete="off" title=" Digite uma palavra correta!" required />
                        <button onclick="checkAndNext('answer4', 'question5')">Próximo</button>

                    </div>

                    <div class="question" id="question5">
                        <h1>Pergunta 5</h1>
                        <p>Uma palavra pra você que representa a felicidade?</p>
                        <input type="text" id="answer5" minlength="4" maxlength="15" class="input-field" autocomplete="off" title=" Digite uma palavra correta!" required />
                        <button onclick="checkAndNext('answer5', 'question1')" aria-label="botão para se registrar" tabindex="0" href="login.php" type="submit" value="Registrar" class="sign-btn">Registrar</button>
                    
                    </div>
                </div>
            </form>
            <script>
                function proximoForm() {
                    // Esconde o segundo formulário
                    document.getElementById("form1").style.display = "none";

                    // Exibe o segundo formulário
                    document.getElementById("form2").style.display = "block";
                }
            
                //Copia os valores de um formulário para outro conjunto de campos com os mesmos nomes
                function copiarCampos() {
                    var nome = document.getElementsByName("nome")[0].value;
                    var email = document.getElementsByName("email")[0].value;
                    var senha = document.getElementsByName("senha")[0].value;

                    document.getElementsByName("nome")[1].value = nome;
                    document.getElementsByName("email")[1].value = email;
                    document.getElementsByName("senha")[1].value = senha;
                }
            </script>
        </div>
    </main>
    <script src="./script.js"></script>
</body>

</html>