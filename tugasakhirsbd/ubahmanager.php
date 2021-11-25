<?php
session_start();
if (!isset($_SESSION["login"])){
    header("Location: login.php");
    exit;
}
require "functions.php";

$id = $_GET["id"];
$manager = query("SELECT * FROM manager WHERE id = $id")[0];

if (isset ($_POST["submit"])){
    

    
    if ( ubahmanager($_POST) > 0){
        echo "
                <script>
                alert('data berhasil diubahkan')
                document.location.href='manager.php';
                </script>
            ";
    }else{
        echo "
                <script>
                alert('data gagal diubahkan')
                document.location.href='manager.php';
                </script>
            ";
    }
}

?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit Manager</title>
</head>
<body>
    <h1>Edit Manager</h1>
    <form action="" method="post">
        <input type="hidden" name="id" value="<?= $manager["id"];?>">
        <ul>
            <li>
                <label for="name">name:</label>
                <input type="text" name="name" id="name" required value="<?= $manager["name"]?>">
            </li>
            <li>
                <label for="club">club:</label>
                <input type="text" name="club" id="club" required value="<?= $manager["club"]?>">
            </li>
            <li>
                <label for="country">country:</label>
                <input type="text" name="country" id="country" required value="<?= $manager["country"]?>">
            </li>
            <li>
                <label for="win_ratio">win ratio:</label>
                <input type="text" name="win_ratio" id="win_ratio" required value="<?= $manager["win_ratio"]?>">
            </li>
            <li>
                <button type="submit" name="submit">submit</button>
            </li>
            <li>
                <a href="manager.php">kembali</a>
            </li>
        </ul>
    </form>
</body>
</html>