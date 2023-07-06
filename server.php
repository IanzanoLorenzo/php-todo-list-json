<?php
    $arrayString = file_get_contents(__DIR__.'/data/data.json', true);
    $arrayTodo = json_decode($arrayString, true);
    
    

    header('Content-Type : application/json');
    $returnArrayString = json_encode($arrayTodo);
    echo $returnArrayString;
?>