
let toggleBtn = document.getElementById('toggleBtn');

 function checkAndNext(answerId, nextQuestionId) {
     var answerInput = document.getElementById(answerId);
     var answerValue = answerInput.value.trim();

     // Verificação correta
     var isValid = answerValue.length >= 4 && answerValue.length <= 15 && /^[a-zA-Z]+$/.test(answerValue);

     if (isValid) {
         // Verificação correta, avance para a próxima pergunta
         var currentQuestion = document.getElementById(answerId).closest('.question');
         var nextQuestion = document.getElementById(nextQuestionId);
         currentQuestion.classList.remove('active');
         nextQuestion.classList.add('active');
     } else {
         // Verificação correta, msg de erro
         alert("Resposta inválida! Digite uma palavra correta de 4 a 15 caracteres sem espaços, números ou caracteres especiais.");
     }
 }

 // atalho para comentar bloco. selecione bloco, pressione ctrl + ;
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

