<?php
session_start();
if (!isset($_SESSION["login"])){
    header("Location: login.php");
    exit;
}
require 'functions.php';

$players = query("SELECT * FROM player ORDER BY league_goals DESC");
$clubs = query("SELECT *, win*3 + draw as 'poin' FROM club ORDER BY poin DESC");
$managers = query("SELECT * FROM manager ORDER BY win_ratio DESC");

if( isset($_POST["search"])){
    $clubs = searchclub($_POST["keyword"]);
}

?>

<!DOCTYPE html>
<html>
<head>
    <title>Halaman Utama</title>
</head>
<body>
    <br></br>
    <a href="index.php">back</a>
    <br></br>
    <form action="" method="post">
        <input type="text" name="keyword" size="40" autofocus 
        placeholder="input keyword" autocomplete="off">
        <button type="submit" name="search">search!</button>
    </form>
    <br></br>
    <h1>Klasemen EPL</h1>
    <a href="add.club.php">add club</a>
    <br></br>
    <table border="1" cellpadding="10" cellspacing="0">
        <tr>
            <th>No.</th>
            <th>Action</th>
            <th>Name</th>
            <th>Poin</th>
            <th>Games Played</th>
            <th>Win</th>
            <th>Lose</th>
            <th>Draw</th>
        </tr>
        <?php $i=1; ?>
        <?php foreach ($clubs as $club): ?>
        <tr>
        <td><?php echo $i;?></td>
            <td>
                <a href="ubahclub.php?id=<?php echo $club["id"]; ?>">ubah</a>
                <a href="hapusclub.php?id=<?php echo $club["id"]; ?>"onclick= "return confirm('yakin?');">hapus</a>
            </td>
            <td><?php echo $club["name"]; ?></td>
            <td><?php echo $club["poin"]; ?></td>
            <td><?php echo $club["games_played"]; ?></td>
            <td><?php echo $club["win"]; ?></td>
            <td><?php echo $club["lose"]; ?></td>
            <td><?php echo $club["draw"]; ?></td>
        </tr>
        <?php $i++; ?>
        <?php endforeach; ?>
    </table>
    
</body>
</html>