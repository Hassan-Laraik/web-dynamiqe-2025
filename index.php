<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Projet PHP Ajouter Modifier Supprimer Rechercher </title>
</head>
<body>
   
  <div class="container">
  <h3>Formulaire Produit</h3>
  <form action="" method="post">
        <label for="nom">Nom Du Produit</label>
        <input type="text" name="nom" autocomplete="off"><br>
        <label for="prix">Prix Du Produit</label>
        <input type="text" name="prix" autocomplete="off"><br>
        <label for="quantite">Quantite du Produit</label>
        <input type="text"  name="quantite" autocomplete="off"><br>
        <input type="submit" value="Enregistrer" name="enregistrer">
    </form>
  </div>
</body>
</html>

<?php 
   require_once('./connect.php');
  if (isset($_POST['enregistrer'])){
    $nom = $_POST['nom'];
    $prix = $_POST['prix'];
    $quantite = $_POST['quantite'];

    if (!empty($nom) & !empty($prix) & !empty($quantite)){
       if(strlen($nom)< 6){
          echo "Le Nom Du Produit doit Contenir au mois 5 Caractere";
       }else{
        $req = $con->prepare('INSERT INTO produits values(null,?,?,?)');
        $req->execute(array($nom,$prix,$quantite));
       }

    }else{
        echo "<h4>Veillez Remplir Les Champs Du Formulaire</h4>";
    }
    header('Location: list_produit.php');
    exit();
      
    
}

   
?>