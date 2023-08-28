<?php
    $username = $_POST['user'];
    $password = $_POST['pass'];
    $verifypassword = $_POST['v_pass'];

    if(strlen($username) == 0 ||
       strlen($password) == 0 ||
       strlen($verifypassword) == 0){
        echo '<script>alert("Campurile marcate cu * sunt obligatorii!");</script>';
        echo 'Campurile marcate cu * sunt obligatorii!';
        exit;
    }

    if($password != $verifypassword){
        echo '<script>alert("Parolele nu sunt la fel!");</script>';
        echo 'Parolele nu sunt la fel!';
        exit;
    }

    $conn=mysql_connect("localhost","root", "");
    if(!$conn){
        echo "Nu s-a realizat conectarea la MySQL";
        exit;
    }

    $sql = "CREATE DATABASE user_db";
    if (mysql_query($sql, $conn)) echo "<br>Baza de date a fost creata! <br />";
    else echo "<br>Baza de date nu a putut fi creata deoarece : ". mysql_errno(). " : ". mysql_error();

    $selectdb = mysql_select_db('user_db');
    if (!$selectdb){
        echo "<br>Baza de date nu a putut fi selectata deoarece : ". mysql_errno(). " : ". mysql_error();
    }

    $sql = "CREATE TABLE `users` (id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY, username varchar(30) NOT NULL, password varchar(30))";

    if (mysql_query($sql, $conn)) echo "<br>Tabelul users a fost creat! <br />";
    else echo "<br>Tabelul users nu a putut fi creat deoarece : ". mysql_errno(). " : ". mysql_error();

    $sql = "INSERT INTO users(username, password) VALUES ('$username', '$password')";

    if (mysql_query($sql, $conn)) echo "<br>Utilizatorul a fost adaugat <br />";
    else echo "<br>Utilizatroul nu a putut fi adaugat : ". mysql_errno(). " : ". mysql_error();
?>