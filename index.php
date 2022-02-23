<?php

//Incluyo los archivos necesarios
require("./model/Coche.php");
require("./controller/CocheController.php");

//Instancio el controlador
$controller = new CocheController;

//Ruta de la home
$home = "/phpmvc/index.php/";
$expectedRoute = $home . "ver/2";

//Quito la home de la ruta de la barra de direcciones
// $ruta = str_replace($home, "", $expectedRoute);
$ruta = str_replace($home, "", $_SERVER['REQUEST_URI']);

echo $expectedRoute . '<br>';
echo $_SERVER['REQUEST_URI'] . '<br>';
echo $ruta . '<br>';

//Creo el array de ruta (filtrando los vacíos)
$array_ruta = array_filter(explode("/", $ruta));
// $array_ruta = parse_url($ruta);
var_dump($array_ruta);

//Decido la ruta en función de los elementos del array
if (isset($array_ruta[0]) && $array_ruta[0] == "ver" && is_numeric($array_ruta[1])){

    //Llamo al método ver pasándole la clave que me están pidiendo
    $controller->ver($array_ruta[1]);
}
else{

    //Llamo al método por defecto del controlador
    $controller->index();
}