<?php
try {
    $con = new PDO('mysql:host=localhost;dbname=ma_base','root','12345678');
    $con->setAttribute(PDO::ATTR_ERRMODE , PDO::ERRMODE_WARNING);
    echo "Connection Reussie ";
} catch (PDOException $exc) {
    echo 'Echec De Connexion '.$exc->getMessage();
}
?>