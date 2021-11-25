<?php
require "functions.php";

$id = $_GET["id"];
$club = query("SELECT * FROM club WHERE id = $id")[0];

if (isset ($_POST["submit"])){
    

    
    if ( ubahclub($_POST) > 0){
        echo "
                <script>
                alert('data berhasil diubahkan')
                document.location.href='klasemen.php';
                </script>
            ";
    }else{
        echo "
                <script>
                alert('data gagal diubahkan')
                document.location.href='klasemen.php';
                </script>
        ";
    }
}

?>

<!DOCTYPE html>
<html>
<head>
    <title>Add Club</title>
</head>
<body>
    <h1>Add Club</h1>
    <form action="" method="post">
        <input type="hidden" name="id" value="<?= $club["id"];?>">
        <ul>
            <li>
                <label for="name">name:</label>
                <input type="text" name="name" id="name" required value="<?= $club["name"]?>">
            </li>
            <li>
                <label for="win">win:</label>
                <input type="text" name="win" id="win" required value="<?= $club["win"]?>">
            </li>
            <li>
                <label for="lose">lose:</label>
                <input type="text" name="lose" id="lose" required value="<?= $club["lose"]?>">
            </li>
            <li>
                <label for="draw">draw:</label>
                <input type="text" name="draw" id="draw" required value="<?= $club["draw"]?>">
            </li>
            <li>
                <label for="games_played">games played:</label>
                <input type="text" name="games_played" id="games_played" required value="<?= $club["games_played"]?>">
            </li>
            <li>
                <button type="submit" name="submit">submit</button>
            </li>
            <li>
                <a href="klasemen.php">kembali</a>
            </li>
        </ul>
    </form>
</body>
</html>