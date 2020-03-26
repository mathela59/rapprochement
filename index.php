<?php
/**
 * Created by PhpStorm.
 * User: pictime
 * Date: 23/01/20
 * Time: 00:56
 */
require_once ("lib/config.php");
?>
<html>
<head>

</head>
<body>
<?php include_once('menu.php'); ?>
<div>
    <h2>Import de fichier comptable</h2>
    <form method="POST" action="import_csv_compta.php" enctype="multipart/form-data">
        <input type="file" name="fileToUpload"/>
        <input type="submit" value="Traiter"/>
    </form>
    </div>
<hr/>
<div>
    <h2>Import de fichier secu</h2>
    <form method="POST" action="import_csv_secu.php" enctype="multipart/form-data">
        <input type="file" name="fileToUpload"/>
        <input type="submit" value="Traiter"/>
    </form>
</div>
</body>
</html>
