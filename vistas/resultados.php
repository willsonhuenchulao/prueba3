<div class="opcion">
    <?php
        $widthBar = $porcentaje * 5;
        $estilo = "barra";

        if($survey->getOptionSelected() == $temas['opcion']){
            $estilo = "seleccionado";
        }

        echo $temas['opcion'];
    ?>
    <div class="<?php echo $estilo; ?>" style="width: <?php echo $widthBar . 'px;' ?>"><?php echo $porcentaje . '%';  ?></div>

</div>