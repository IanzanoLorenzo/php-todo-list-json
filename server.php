<?php
    $arrayString = file_get_contents(__DIR__.'/data/data.json');
    $arrayTodo = json_decode($arrayString, true);
    if($arrayTodo === ''){
        $arrayTodo = [];
    }
    if(isset($_POST['array'])){
        $arrayTodo = $_POST['array'];
        header('Content-Type : application/json');
        $returnArrayString = json_encode($arrayTodo);   
        file_put_contents('./data/data.json', $returnArrayString);
    };

    header('Content-Type : application/json');
    $returnArrayString = json_encode($arrayTodo);
    echo $returnArrayString;
?>