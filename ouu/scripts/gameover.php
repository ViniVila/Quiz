<?php

// obtém o total de questões, respostas corretas e respostas erradas armazenadas na sessão do jogo
$total_questions = $_SESSION['game']['total_questions']; // Número total de questões definidas no jogo
$correct_answers = $_SESSION['game']['correct_answers']; // Número de respostas corretas fornecidas pelo jogador
$incorrect_answers = $_SESSION['game']['incorrect_answers']; // Número de respostas erradas fornecidas pelo jogador

?>

<!-- Início do código HTML para exibir os resultados finais do jogo -->
<div class="result-container">   
   
  <h1>Quiz dos Estadios</h1>
<hr>

<h3>Total de questões: <strong class="result-value"><?= $total_questions ?></strong></h3>
<h3>Respostas corretas: <strong class="result-value"><?= $correct_answers ?></strong></h3>
<h3>Respostas erradas: <strong class="result-value"><?= $incorrect_answers ?></strong></h3>

<div>
    <a href="index.php?route=start" class="btn btn-secondary p-3 w-50">Jogar novamente</a>
</div>

</div>


