<?php


function conex(){
  $con = new mysqli('localhost','root','','persona');
  return $con;
}
//

?>
