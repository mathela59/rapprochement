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
        $row = array_map("convert",$row);
        list($jour, $mois, $annee) = explode("/", $row[2]);
        if (checkdate($mois, $jour, $annee)) {
            $sql = "INSERT INTO compta(numero,Val,DateFacture,NumFacture,LibelleFacture,Patient,
Payeur,Mode,DatePaiement,Encaisse,impaye,MontantPaye,MontantFacture,Praticien,Etablissement,
Cotations,LibelleActe,SsPatient,TypePrestation,MontantRecette,MontantReglement,TropPaye,
BanqueCabinet,BanquePayeur,DetailPrestation,CategorieActe,NumHospitalisation,nom_fichier) VALUES (
";
            for ($i = 0; $i < count($row); $i++) {
                switch ($i) {
                    case 0:
                    case 3:
                        $sql.=intval($row[$i]);
                        break;
                    case 2:
                    case 8:
                        $sql.="'".convert_date($row[$i])."'";
                        break;
                    case 9:
                    case 10:
                    case 11:
                    case 12:
                    case 19:
                    case 20:
                    case 21:
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
            //echo $sql;
            $statement = $pdo->prepare($sql);
            if($statement->execute())
            {
                $nb_rows+=1;
            }
        }
    }
    echo "Nombre de lignes inserées : ".$nb_rows;
} else {
    throw new Exception("File not correctly uploaded");
}
?>
<a href="index.php">Retour à l'index</a>
