<?php
$conn = mysqli_connect("localhost", "root", "", "tugasakhir");
function query ($query){
    global $conn;
    $result = mysqli_query($conn, $query);
    $rows = [];
    while ($row = mysqli_fetch_assoc($result)){
        $rows [] = $row;
    }
    return $rows;
}

function searchclub($keyword){
    $query = "SELECT *, win*3 + draw as 'poin' FROM club 
                WHERE 
                name LIKE '%$keyword%' OR
                win LIKE '%$keyword%' OR
                lose LIKE '%$keyword%' OR
                draw LIKE '%$keyword%' OR
                games_played LIKE '%$keyword%'";
    return query($query);
}

function searchmanager($keyword){
    $query = "SELECT * FROM manager 
                WHERE 
                name LIKE '%$keyword%' OR
                club LIKE '%$keyword%' OR
                country LIKE '%$keyword%' OR
                win_ratio LIKE '%$keyword%'";
    return query($query);
}

function searchplayer($keyword){
    $query = "SELECT * FROM player 
                WHERE 
                name LIKE '%$keyword%' OR
                club LIKE '%$keyword%' OR
                league_goals LIKE '%$keyword%' OR
                league_assist LIKE '%$keyword%' OR
                release_clause LIKE '%$keyword%'";
    return query($query);
}

function tambahpemain ($data){
    global $conn;
    $name = htmlspecialchars($data["name"]);
    $club = htmlspecialchars($data["club"]);
    $league_goals = htmlspecialchars($data["league_goals"]);
    $league_assist = htmlspecialchars($data["league_assist"]);
    $release_clause = htmlspecialchars($data["release_clause"]);

    $query = "INSERT INTO player VALUES
              ('', '$name', '$club', '$league_goals', '$league_assist', '$release_clause')";
    
    mysqli_query($conn, $query);
    return mysqli_affected_rows($conn);
}

function tambahclub ($data){
    global $conn;
    $name = htmlspecialchars($data["name"]);
    $win = htmlspecialchars($data["win"]);
    $lose = htmlspecialchars($data["lose"]);
    $draw = htmlspecialchars($data["draw"]);
    $games_played = htmlspecialchars($data["games_played"]);

    $query = "INSERT INTO club VALUES
              ('', '$name', '$win', '$lose', '$draw', '$games_played')";
    
    mysqli_query($conn, $query);
    return mysqli_affected_rows($conn);
}

function tambahmanager ($data){
    global $conn;
    $name = htmlspecialchars($data["name"]);
    $club = htmlspecialchars($data["club"]);
    $country = htmlspecialchars($data["country"]);
    $win_ratio = htmlspecialchars($data["win_ratio"]);

    $query = "INSERT INTO manager VALUES
              ('', '$name', '$club', '$country', '$win_ratio')";
    
    mysqli_query($conn, $query);
    return mysqli_affected_rows($conn);
}

function hapusclub ($id){
    global $conn;
    mysqli_query($conn, "DELETE FROM club WHERE id = $id");
    return mysqli_affected_rows($conn);

}

function hapusplayer ($id){
    global $conn;
    mysqli_query($conn, "DELETE FROM player WHERE id = $id");
    return mysqli_affected_rows($conn);

}

function hapusmanager ($id){
    global $conn;
    mysqli_query($conn, "DELETE FROM manager WHERE id = $id");
    return mysqli_affected_rows($conn);

}

function ubahmanager ($data){
    global $conn;
    $id = $data["id"];
    $name = htmlspecialchars($data["name"]);
    $club = htmlspecialchars($data["club"]);
    $country = htmlspecialchars($data["country"]);
    $win_ratio = htmlspecialchars($data["win_ratio"]);

    $query = "UPDATE manager SET
                name = '$name',
                club = '$club',
                country = '$country',
                win_ratio = '$win_ratio'
                WHERE id = $id";
    
    mysqli_query($conn, $query);
    return mysqli_affected_rows($conn);
}

function ubahclub ($data){
    global $conn;
    $id = $data["id"];
    $name = htmlspecialchars($data["name"]);
    $win = htmlspecialchars($data["win"]);
    $lose = htmlspecialchars($data["lose"]);
    $draw = htmlspecialchars($data["draw"]);
    $games_played = htmlspecialchars($data["games_played"]);

    $query = "UPDATE club SET
                name = '$name',
                win = '$win',
                lose = '$lose',
                draw = '$draw',
                games_played = '$games_played'
                WHERE id = $id";
    
    mysqli_query($conn, $query);
    return mysqli_affected_rows($conn);
}

function ubahplayer ($data){
    global $conn;
    $id = $data["id"];
    $name = htmlspecialchars($data["name"]);
    $club = htmlspecialchars($data["club"]);
    $league_goals = htmlspecialchars($data["league_goals"]);
    $league_assist = htmlspecialchars($data["league_assist"]);
    $release_clause = htmlspecialchars($data["release_clause"]);

    $query = "UPDATE player SET
                name = '$name',
                club = '$club',
                league_goals = '$league_goals',
                league_assist = '$league_assist',
                release_clause = '$release_clause'
                WHERE id = $id";
    
    mysqli_query($conn, $query);
    return mysqli_affected_rows($conn);
}

function registrasi($data){
    global $conn;

    $username = strtolower(stripslashes($data["username"]));
    $password = mysqli_real_escape_string($conn, $data["password"]);
    $password2 = mysqli_real_escape_string($conn, $data["password2"]);

    $result = mysqli_query($conn, "SELECT username FROM user WHERE username = '$username'");

    if(mysqli_fetch_assoc($result)){
        echo "<script>alert('gagal, username sudah terdaftar')</script>";
        return false;
    }

    if($password !== $password2){
        echo"<script>alert('konfirmasi password tidak sesuai')</script>";
        return false;
    }
    
    $password = password_hash($password, PASSWORD_DEFAULT);

    mysqli_query($conn, "INSERT INTO user VALUES('', '$username', '$password')");
    return mysqli_affected_rows($conn);
    
}
?>