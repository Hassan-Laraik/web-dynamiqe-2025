<?php 
  require_once("./connect.php");

  if (isset($_GET["id"])){
    $sup = $_GET["id"];
    echo $sup;
    $req = $con->prepare("DELETE FROM produits where id = ?");
    $req->execute(array($sup));
    
  }
 header('Location: list_produit.php');
  exit();
?>