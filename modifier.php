<?php
  require_once("./connect.php");
  if(isset($_GET["id"])){
     $id = $_GET["id"];
     $res = $con->prepare("SELECT * FROM produits where id = ?");
     $res->execute(array($id));
     $produit = $res->fetch();
  }
?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<form action="" method="post">

        <label for="nom">Nom Du Produit</label>
        <input type="text" name="nom" autocomplete="off" value="<?php echo $produit[1]  ?>"><br>
        <label for="prix">Prix Du Produit</label>
        <input type="text" name="prix" autocomplete="off" value="<?php echo $produit[2]  ?>"><br>
        <label for="quantite">Quantite du Produit</label>
        <input type="text"  name="quantite" autocomplete="off"value="<?php echo $produit[3]  ?>"><br>
        <input type="submit" value="Enregistrer" name="enregistrer">

    </form>
</body>
</html>

<?php 

  if (isset($_POST['enregistrer'])){
    $nom = $_POST['nom'];
    $prix = $_POST['prix'];
    $quantite = $_POST['quantite'];

    if (!empty($nom) & !empty($prix) & !empty($quantite)){
       if(strlen($nom)< 6){
          echo "Le Nom Du Produit doit Contenir au mois 5 Caractere";
       }else{
        $req = $con->prepare('UPDATE  produits SET nom = ? , prix = ? ,quantite = ?  where id = ?');
        $req->execute(array($nom,$prix,$quantite,$id ));
       }

    }else{
        echo "<h4>Veillez Remplir Les Champs Du Formulaire</h4>";
    }
    header('Location: list_produit.php');
    exit();
      
    
}