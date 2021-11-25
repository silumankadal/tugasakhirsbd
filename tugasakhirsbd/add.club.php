<?php
require "functions.php";
if (isset ($_POST["submit"])){
    

    
    if ( tambahclub($_POST) > 0){
        echo "
                <script>
                alert('data berhasil ditambahkan')
                document.location.href='klasemen.php';
                </script>
            ";
    }else{
        echo "
                <script>
                alert('data gagal ditambahkan')
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
        <ul>
            <li>
                <label for="name">name:</label>
                <input type="text" name="name" id="name" required>
            </li>
            <li>
                <label for="win">win:</label>
                <input type="text" name="win" id="win" required>
            </li>
            <li>
                <label for="lose">lose:</label>
                <input type="text" name="lose" id="lose" required>
            </li>
            <li>
                <label for="draw">draw:</label>
                <input type="text" name="draw" id="draw" required>
            </li>
            <li>
                <label for="games_played">games played:</label>
                <input type="text" name="games_played" id="games_played" required>
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