<?php
require "functions.php";
if (isset ($_POST["submit"])){
    

    
    if ( tambahmanager($_POST) > 0){
        echo "
                <script>
                alert('data berhasil ditambahkan')
                document.location.href='manager.php';
                </script>
            ";
    }else{
        echo "
                <script>
                alert('data gagal ditambahkan')
                document.location.href='manager.php';
                </script>
            ";
    }
}

?>

<!DOCTYPE html>
<html>
<head>
    <title>Add Manager</title>
</head>
<body>
    <h1>Add Manager</h1>
    <form action="" method="post">
        <ul>
            <li>
                <label for="name">name:</label>
                <input type="text" name="name" id="name" required>
            </li>
            <li>
                <label for="club">club:</label>
                <input type="text" name="club" id="club" required>
            </li>
            <li>
                <label for="country">country:</label>
                <input type="text" name="country" id="country" required>
            </li>
            <li>
                <label for="win_ratio">win ratio:</label>
                <input type="text" name="win_ratio" id="win_ratio" required>
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