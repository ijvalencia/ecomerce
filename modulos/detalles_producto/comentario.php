<html>
    <body>
        
        <?php
        include "../../bin/head.php";
        
        if (isset($_GET['producto']))
            echo '<span class="hidden" id="producto" value="' . $_GET['producto'] . '"></span>';
        
        if (isset($_POST['comentario']))
            echo '<span class="hidden" id="comentario" value="' . $_POST['comentario'] . '"></span>';
        
        
        if (isset($_POST['calificacion']))
            echo '<span class="hidden" id="calificacion" value="' . $_POST['calificacion'] . '"></span>';
        
        /*
        echo $_POST['comentario'] . "<br>";
        echo $_POST['calificacion'] . "<br>";*/
        ?>
        <script type="text/javascript" src="comentario.js"></script>
    </body>
</html>