<?php
include_once 'include/survey.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/votacion.css">
</head>
<body>
    <form action="#" method="POST">
        
        <?php
            $survey = new Survey();
            $showResults = false;

            if(isset($_POST['temas'])){
                $showResults = true;
                $survey->setOptionSelected($_POST['temas']);
                $survey->vote();
            }

            ?>
            <h2>Vota por tu tema favorito</h2>
            <button><a href="index.php">inicio</a></button><br>

            <?php
            if($showResults){
                $temas = $survey->showResults();

                echo '<h2>' . $survey->getTotalVotes() . ' votos totales</h2>';

                foreach($temas as $temas){
                    $porcentaje = $survey->getPercentageVotes($temas['votos']);

                    include 'vistas/resultados.php';
                }

            }else{
                include 'vistas/votacion.php';
            }
        ?>
        
    </form>
</body>
</html>