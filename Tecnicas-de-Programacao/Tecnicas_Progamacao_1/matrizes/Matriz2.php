<?php
    // Matriz com indices de coluna nomeado
    $matriz2 = array(
        array("nome"=>"João", "p1"=>7.5, "p2"=>10.0, "p3"=>9.0),
        array("nome"=>"Maria", "p1"=>6.5, "p2"=>5.5, "p3"=>2.5),
        array("nome"=>"Paulo", "p1"=>10.0, "p2"=>5.0, "p3"=>10.0),
        array("nome"=>"Pedro", "p1"=>9.0, "p2"=>9.0, "p3"=>9.0),
        array("nome"=>"Carla", "p1"=>7.5, "p2"=>8.0, "p3"=>8.5),
    );

    foreach($matriz2 as $vetor)
    {
        foreach($vetor as $dado)
        {
            echo "$dado<br>";
        }
        echo "<br>";
    }
?>