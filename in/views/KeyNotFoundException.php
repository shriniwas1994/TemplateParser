<?php
/*
* author - Shriniwas Waphare
* 
* Excpetion for Key not found in MAP
*/
class KeyNotFoundException extends Exception {
  public function errorMessage() {
    $errorMsg = 'Error :: Invalid Keys Found';
    return $errorMsg;
  }
}
?>