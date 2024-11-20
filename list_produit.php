<?php 
require_once('./connect.php');
$req = $con->prepare('SELECT * FROM produits');
$req->execute();
//$PRODUITS = $req->fetchAll();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h3>Liste des Produits</h3>
    <p>
    <a href="./index.php">Ajouter Produit</a>
    </p>
    <table width="80%" border='1' align="center">
        <tr>
            <th>Code</th>
            <th>Produit</th>
            <th>Prix</th>
            <th>Quantite</th>
            <th>Modifier</th>
            <th>Supprimer</th>
        </tr>
        <?php
        while($produit = $req->fetch() ){ ;
        ?>
         <tr>
            <td>
                <?php echo$produit[0];  ?>
            </td>
            <td>
               <?php echo$produit[1];  ?>
            </td>
            <td>
              <?php echo$produit[2]  ?>
            </td>
            <td>
              <?php echo$produit[3]  ?>
            </td>
            
            <td align="center"><a href="./modifier.php?id=<?php echo $produit[0] ?>">~</a></td>
            <td align="center"><a href="./supprimer.php?id= <?php echo $produit[0] ?>">-</a></td>
    
         </tr>
        <?php
          }
        ?>
    </table>
</body>
</html>

