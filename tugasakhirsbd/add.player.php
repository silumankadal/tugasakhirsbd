<?php
require "functions.php";
if (isset ($_POST["submit"])){
    

    
    if ( tambahpemain($_POST) > 0){
        echo "
                <script>
                alert('data berhasil ditambahkan')
                document.location.href='topscorer.php';
                </script>
            ";
    }else{
        echo "
                <script>
                alert('data gagal ditambahkan')
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
                <label for="league_goals">league goals:</label>
                <input type="text" name="league_goals" id="league_goals" required>
            </li>
            <li>
                <label for="league_assist">league assist:</label>
                <input type="text" name="league_assist" id="league_assist" required>
            </li>
            <li>
                <label for="release_clause">release clause:</label>
                <input type="text" name="release_clause" id="release_clause" required>
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