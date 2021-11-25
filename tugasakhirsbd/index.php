<?php
require 'functions.php';

$players = query("SELECT * FROM player ORDER BY league_goals DESC");
$clubs = query("SELECT *, win*3 + draw as 'poin' FROM club ORDER BY poin DESC");
$managers = query("SELECT * FROM manager ORDER BY win_ratio DESC");
$daftarpemains = query("SELECT a.id, a.name as 'name', c.name as 'manager', b.name as 'club' FROM player a 
                        LEFT JOIN club b ON a.club = b.name
                        LEFT JOIN manager c ON a.club = c.club");


?>
<!DOCTYPE html>
<html>
<head>
    <title>Halaman Utama</title>
</head>
<body>
    <br></br>
    <a href="topscorer.php">top scorer</a>
    <br></br>
    <a href="manager.php">top manager</a>
    <br></br>
    <a href="klasemen.php">epl tables</a>
    <br></br>
    <br></br>
    <h1>daftar pemain</h1>
    <br></br>
    <table border="1" cellpadding="10" cellspacing="0">
        <tr>
            <th>No.</th>
            <th>Players</th>
            <th>Managers</th>
            <th>Club</th>
        </tr>
        <?php $i=1; ?>
        <?php foreach ($daftarpemains as $daftarpemain): ?>
        <tr>
        <td><?php echo $i;?></td>
            <td><?php echo $daftarpemain["name"]; ?></td>
            <td><?php echo $daftarpemain["manager"]; ?></td>
            <td><?php echo $daftarpemain["club"]; ?></td>
        </tr>
        <?php $i++; ?>
        <?php endforeach; ?>
    </table>
    
</body>
</html>