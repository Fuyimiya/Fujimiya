<?php
// Vetor com indices nomeados(nomes)
$estados = array("SP"=>"São Paulo", "MG"=>"Minas Gerais", "PR"=>"Paraná");
foreach($estados as $ind=>$valor)
{
    echo "$valor($ind)<br>";
}
?>