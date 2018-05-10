<?php
/*
* author - Shriniwas Waphare
* 
* Excpetion for Key not found in MAP
*/
class KeyNotFoundException extends Exception {
  public function errorMessage() {
    $errorMsg = 'Error :: Invalid Key/s Found';
    return $errorMsg;
  }
}
?>