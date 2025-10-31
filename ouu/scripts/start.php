<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

$total_questions = intval($_POST['text_total_questions']) ?? 10;
prepare_game($total_questions);
header('Location: index.php?route=game');
exit;

}

function prepare_game($total_questions)
{
    global $capitals;
    $ids = [];
    
    while(count($ids) < $total_questions) {
        $id = rand(0, count($capitals) - 1);
        if(!in_array($id, $ids)) {
            $ids[] = $id;
        }
    }
    
    $questions = [];
    
    foreach($ids as $id) {
        $answers = [];
        $answers[] = $id;
        
        while(count($answers) < 3) {
            $tmp = rand(0, count($capitals) - 1);
            if(!in_array($tmp, $answers)) {
                $answers[] = $tmp;
            }
        }
        
        shuffle($answers);
        
        $questions[] = [
            'question' => $capitals[$id][0],
            'correct_answer' => $id,
            'answers' => $answers
        ];
    }
    
    $_SESSION['questions'] = $questions;
    $_SESSION['game'] = [
        'total_questions' => $total_questions,
        'current_question' => 0,
        'correct_answers' => 0,
        'incorrect_answers' => 0
    ];
}
?>

<!-- Início do código HTML para exibir o formulário na página de início -->
<div class="container">

<div class="row">
    <!-- Titulo principal -->
    <h1>Quiz dos Estadios </h1>
    <hr>

    <!-- Formulario para o usuario definir o numero de questoes e iniciar o jogo -->
     <form action="index.php?route=start" method="post">
    <!-- Pergunta sobre o numero de questoes, com um campo input de ripo number-->
     <h3><label for="text_total_questions" class="form-label">Número de Questões:</label>
     <input type="number" class="form-control" id="text_total_questions" name="text_total_questions" value="1"
     min="1" max="20">   </h3>

     <!-- Botão para submeter o formulario e iniciar o jogo -->
      <div>
            <button type="submit" class="btn">Iniciar</button>
      </div>

     </form>
</div>

</div>
