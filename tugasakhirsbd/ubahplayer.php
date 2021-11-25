<?php
require "functions.php";

$id = $_GET["id"];
$player = query("SELECT * FROM player WHERE id = $id")[0];

if (isset ($_POST["submit"])){
    

    
    if ( ubahplayer($_POST) > 0){
        echo "
                <script>
                alert('data berhasil diubahkan')
                document.location.href='topscorer.php';
                </script>
            ";
    }else{
        echo "
                <script>
                alert('data gagal diubahkan')
                document.location.href='topscorer.php';
                </script>
            ";
    }
}

?>

<!DOCTYPE html>
<html>
<head>
    <title>Add Player</title>
</head>
<body>
    <h1>Add Player</h1>
    <form action="" method="post">
        <input type="hidden" name="id" value="<?= $player["id"];?>">
        <ul>
            <li>
                <label for="name">name:</label>
                <input type="text" name="name" id="name" required value="<?= $player["name"]?>">
            </li>
            <li>
                <label for="club">club:</label>
                <input type="text" name="club" id="club" required value="<?= $player["club"]?>">
            </li>
            <li>
                <label for="league_goals">league goals:</label>
                <input type="text" name="league_goals" id="league_goals" required value="<?= $player["league_goals"]?>">
            </li>
            <li>
                <label for="league_assist">league assist:</label>
                <input type="text" name="league_assist" id="league_assist" required value="<?= $player["league_assist"]?>">
            </li>
            <li>
                <label for="release_clause">release clause:</label>
                <input type="text" name="release_clause" id="release_clause" required value="<?= $player["release_clause"]?>">
            </li>
            <li>
                <button type="submit" name="submit">submit</button>
            </li>
            <li>
                <a href="topscorer.php">kembali</a>
            </li>
        </ul>
    </form>
</body>
</html>