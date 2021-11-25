<?php
require 'functions.php';

$players = query("SELECT * FROM player ORDER BY league_goals DESC");
$clubs = query("SELECT *, win*3 + draw as 'poin' FROM club ORDER BY poin DESC");
$managers = query("SELECT * FROM manager ORDER BY win_ratio DESC");

if( isset($_POST["search"])){
    $managers = searchmanager($_POST["keyword"]);
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
    <h1>Top Managers</h1>
    <a href="add.manager.php">add manager</a>
    <br></br>
    <table border="1" cellpadding="10" cellspacing="0">
        <tr>
            <th>No.</th>
            <th>Action</th>
            <th>Name</th>
            <th>Club</th>
            <th>Country</th>
            <th>Win Ratio</th>
        </tr>
        <?php $k=1; ?>
        <?php foreach ($managers as $manager): ?>
        <tr>
        <td><?php echo $k;?></td>
            <td>
                <a href="ubahmanager.php?id=<?php echo $manager["id"]; ?>">ubah</a>
                <a href="hapusmanager.php?id=<?php echo $manager["id"]; ?>"onclick= "return confirm('yakin?');">hapus</a>
            </td>
            <td><?php echo $manager["name"]; ?></td>
            <td><?php echo $manager["club"]; ?></td>
            <td><?php echo $manager["country"]; ?></td>
            <td><?php echo $manager["win_ratio"]; ?></td>
        </tr>
        <?php $k++; ?>
        <?php endforeach; ?>
    </table>
</body>
</html>