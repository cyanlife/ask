<?php
session_start();

//  unset($_SESSION['cartt']); 

echo json_encode($_SESSION['cartt']) ;

var_dump($_SESSION['cartt']);


function clearAll($cartName){
    if(isset($_SESSION[$cartName])){
        unset($_SESSION[$cartName]);
    }else{
        return ;
    }
}

//clearAll('cartt');            