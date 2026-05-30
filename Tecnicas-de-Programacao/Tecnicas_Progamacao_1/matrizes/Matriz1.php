<?php
    // Matriz de duas dimensoês com indices ordenados
    $matriz1 = array(
        array("João", 7.5, 10.0, 9.0),
        array("Maria", 6.5, 5.5, 2.5),
        array("Paulo", 10.0, 5.0, 10.0),
        array("Pedro", 9.0, 9.0, 9.0),
        array("Carla", 7.5, 8.0, 8.5),
    );
    // Mostrar com o for
    for ($linha=0; $linha < 5; $linha++)
    {
        for($coluna=0; $coluna < 4; $coluna++)
        {
            echo "{$matriz1[$linha][$coluna]}<br>";
        }
        echo"<br>";
    }

    foreach($matriz1 as $vetor)
    {
        foreach($vetor as $dado)
        {
            echo "$dado<br>";
        }
        echo "<br>";
    }
?>