<?php

session_start();

$action = $_GET['action'];

switch($action) {
   case "generate":             
      //GENERAMOS NUMEROS ALEATORIOS DEL 1 AL 75    
      $numero_aleatorio = rand(1, 75);      

      //VALIDACION DE EXISTENCIA PARA NO REPETIR NUMEROS
      for ($i=0; $i <9999; $i++) { 
         foreach ($_SESSION['numeros_aleatorios'] as $key => $value) {
            if($value == $numero_aleatorio){
               $numero_aleatorio = rand(1, 75);               
            }else{               
               break;
            }
         }
      }

      //ASIGNAMOS NUMEROS ALEATORIOS A VARIABLES DE SESSION
      $_SESSION['numeros_aleatorios'][] = $numero_aleatorio;
      $_SESSION["numeros_aleatorio_actual"] = $numero_aleatorio;     
   break;

   case "delete":                      
      //ELIMINAMOS NUMEROS
      unset($_SESSION['numeros_aleatorios']);
   break;
}