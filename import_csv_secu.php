<?php
/**
 * Created by PhpStorm.
 * User: pictime
 * Date: 23/01/20
 * Time: 00:59
 */
require_once('lib/config.php');
require_once('lib/functions.php');
?>
<html>
<head>

</head>
<body>
<?php include_once('menu.php'); ?>
<?php
//step sauvegarde du fichier
$filename=$_FILES['fileToUpload']['name'];
if (move_uploaded_file($_FILES['fileToUpload']['tmp_name'], $WORKING_DIR . "/" . $_FILES['fileToUpload']['name'])) {
    $file = fopen($WORKING_DIR . "/" . $_FILES['fileToUpload']['name'], "r");

    $nb_rows=0;
    while ($row = fgetcsv($file, 1024, ";")) {
//        print_r($row);
//        error_log(print_r($row[0],true));
        $row = array_map("convert",$row);
        list($jour, $mois, $annee) = explode("/", $row[0]);
//        echo($jour."---".$mois."---".$annee);
        if (checkdate($mois, $jour, $annee)) {

            $sql = "INSERT INTO $DB_NAME.secu (date_paiement,num_lot,num_facture,Organisme,Patient,ss_num,nature_acte,date_acte,montant,nom_fichier) VALUES (";
            for ($i = 0; $i < count($row); $i++) {
                switch ($i) {
                    case 0:
                    case 7:
                        $sql.="'".convert_date($row[$i])."'";
                        break;
                    case 1:
                    case 2:
                        $sql.=intval($row[$i]);
                        break;
                    case 8:
                        $sql.=convert_money($row[$i]);
                        break;
                    default:
                        $sql.="'".$row[$i]."'";
                        break;
                }
                if($i<count($row)-1)
                    $sql.=",";
            }
            $sql.=",'".$filename."');";
//            echo $sql;
            $statement = $pdo->prepare($sql);
            if($statement->execute())
            {
                $nb_rows+=1;
            }
        }
        else {
            echo "ligne sans date";
        }
    }
    echo "Nombre de lignes inserées : ".$nb_rows;
} else {
    throw new Exception("File not correctly uploaded");
}
 ?>
<a href="index.php">Retour à l'index</a>


