<?php
    $arrayString = file_get_contents(__DIR__.'/data/data.json');
    $arrayTodo = json_decode($arrayString, true);

    //FUNZIONE CHE INSERISCE UNA NUOVA TASK
    if(isset($_POST['Item'])){
        $item = $_POST['Item'];
        $obj = [
            'text' => $item,
            'done' => false
        ];
        $arrayTodo[] = $obj;
        header('Content-Type : application/json');
        $returnArrayString = json_encode($arrayTodo);   
        file_put_contents('./data/data.json', $returnArrayString);
    };

    //FUNZIONE CHE CAMBIA LO STATO DELLA TASK
    if(isset($_POST['IndexChange'])){
        $index = $_POST['IndexChange'];
        $arrayTodo[$index]['done'] = !$arrayTodo[$index]['done'];
        header('Content-Type : application/json');
        $returnArrayString = json_encode($arrayTodo);   
        file_put_contents('./data/data.json', $returnArrayString);
    };

    //FUNZIONE CHE CANCELLA UNA TASK
    if(isset($_POST['IndexDelete'])){
        $index = $_POST['IndexDelete'];
        array_splice($arrayTodo, $index, 1);
        header('Content-Type : application/json');
        $returnArrayString = json_encode($arrayTodo);   
        file_put_contents('./data/data.json', $returnArrayString);
    }

    header('Content-Type : application/json');
    $returnArrayString = json_encode($arrayTodo);
    echo $returnArrayString;
?>