<?php
session_start();
$typeSelected = !isset($_GET['converterType']) ? 'csvToJson' : $_GET['converterType'];

$_SESSION['converterType'] = $typeSelected;

?>

<h1>Convert file in JSON - V2</h1>

<form method="get" action="">

    <label for="converterType">Choose your converter type</label>
    <select name="converterType" id="converterType">
        <option value="csvToJson" <?php if($typeSelected === 'csvToJson' || null){ ?> selected <?php } ?> >CSV to JSON</option>
        <option value="xmlToJson" <?php if($typeSelected === 'xmlToJson'){ ?> selected <?php } ?>>XML to JSON</option>
    </select>
    <button type="submit" name="submit" value="0">Valid</button>
</form>

<?php if($typeSelected === 'csvToJson' || null){ ?>

    <form action="upload.php" method="post" enctype="multipart/form-data">
        Select CSV to upload:
        <input type="file" name="fileToUpload" id="fileToUpload" required>
        <input type="submit" value="Upload CSV" name="submit">
    </form>

<?php } ?>


<?php if($typeSelected === 'xmlToJson' || null){ ?>
    <form action="upload.php" method="post" enctype="multipart/form-data">
        Select XML to upload:
        <input type="file" name="fileToUpload" id="fileToUpload" required>
        <input type="submit" value="Upload XML" name="submit">
    </form>

<?php } ?>
