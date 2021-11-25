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
    $players = searchplayer($_POST["keyword"]);
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Document</title>
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
    <h1>Top Scorer</h1>
    <a href="add.player.php">add player</a>
    <br></br>
    <table border="1" cellpadding="10" cellspacing="0">
        <tr>
            <th>No.</th>
            <th>Action</th>
            <th>Name</th>
            <th>Club</th>
            <th>Goals</th>
            <th>Assists</th>
            <th>Release Clause</th>
        </tr>
        <?php $j=1; ?>
        <?php foreach ($players as $player): ?>
        <tr>
        <td><?php echo $j;?></td>
            <td>
                <a href="ubahplayer.php?id=<?php echo $player["id"]; ?>">ubah</a>
                <a href="hapusplayer.php?id=<?php echo $player["id"]; ?>"onclick= "return confirm('yakin?');">hapus</a>
            </td>
            <td><?php echo $player["name"]; ?></td>
            <td><?php echo $player["club"]; ?></td>
            <td><?php echo $player["league_goals"]; ?></td>
            <td><?php echo $player["league_assist"]; ?></td>
            <td><?php echo $player["release_clause"]; ?></td>
        </tr>
        <?php $j++; ?>
        <?php endforeach; ?>
    </table>
</body>
</html>