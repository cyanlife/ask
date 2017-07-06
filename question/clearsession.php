<?php
class clear{
public function clearAll($cartName){
    if(isset($_SESSION[$cartName])){
        unset($_SESSION[$cartName]);
    }else{
        return ;
    }
}
}
clearAll('cartt');