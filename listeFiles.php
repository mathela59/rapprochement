<?php
/**
 * Created by PhpStorm.
 * User: pictime
 * Date: 23/01/20
 * Time: 23:20
 */
require_once("lib/config.php");

$compta = $pdo->query('SELECT DISTINCT(nom_fichier) FROM compta')->execute();
$secu = $pdo->query('SELECT DISTINCT(nom_fichier) FROM secu')->execute();


?>

<html>
<head>

</head>
<body>
<?php include_once('menu.php'); ?>
<table>
    <thead>
    <tr>
        <th>Fichier compta</th>
        <th>Fichiers Secu</th>
    </tr>
    </thead>
    <tbody>
    <tr>
        <td>
            <ul>            <?php
                while ($row = $compta->fetch(PDO::FETCH_ASSOC)) {
                    ?>
                    <li><?php echo $row[0]; ?></li>
                    <?php
                }

                ?>
            </ul>
        </td>
        <td><
            <ul>            <?php
                while ($row = $secu->fetch(PDO::FETCH_ASSOC)) {
                    ?>
                    <li><?php echo $row[0]; ?></li>
                    <?php
                }

                ?>
            </ul>/td>
    </tr>
    </tbody>
</table>
</body>
</html>

