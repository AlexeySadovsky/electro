<?php

function checkType(): bool{

    $extension = explode(".", $_FILES['userfile']['name']);
    $format = end($extension);
    if($format === "jpeg" || $format === "jpg" || $format === "png"){
        return true;
    }
    else{
        return false;
    }
}

function getFile()
{
    $uploaddir = 'C:\OpenServer\domains\electro-local\public\images';
    $uploadfile = $uploaddir . basename($_FILES['userfile']['name']);

    echo '<pre>';
    if (checkType())
    {
        if (move_uploaded_file($_FILES['userfile']['tmp_name'], $uploadfile)) {
            echo "Файл корректен и был успешно загружен.\n";
        } else {
            echo "Возможная атака с помощью файловой загрузки!\n";
        }
    }
    else
    {
        return "Type error!";
    }

    echo 'Некоторая отладочная информация:';
    print_r($_FILES);

    print "</pre>";
}

function methodPOST(){
    if('POST' === $_SERVER['REQUEST_METHOD']){
        getFile();
        header('Location: http://electro/index.php');
    }
    else
    {
        echo "<br>Error!<br>";
    }
}


?>