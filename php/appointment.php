<?php
    $firstName = $_POST['first'];
    $lastName = $_POST['first'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $doctor = $_POST['doctor'];
    $date = $_POST['date'];
    
    if(strlen($firstName) == 0 ||
       strlen($lastName) == 0 ||
       strlen($email) == 0 ||
       strlen($doctor) == 0 ||
       strlen($date) == 0 ){
        echo '<script>alert("Campurile marcate cu * sunt obligatorii!");</script>';
        echo 'Campurile marcate cu * sunt obligatorii!';
        exit;
    }

    $conn=mysql_connect("localhost","root", "");
    if(!$conn){
        echo "Nu s-a realizat conectarea la MySQL";
        exit;
    }

    $selectdb = mysql_select_db('logged_user');
    if (!$selectdb){
        echo "<br>Nu te-ai conectat la cont!";
    }

    $query = "SELECT * FROM `user`";
    $result = mysql_query($query, $conn);

    if(mysql_num_rows($result) == 1){
        $row = mysql_fetch_assoc($result);
        $logged_user = $row['username'];
    }

    $query = "CREATE DATABASE app_db";
    mysql_query($query, $conn);

    $selectdb = mysql_select_db('app_db');
    if (!$selectdb){
        echo "<br>Baza de date nu a putut fi selectata deoarece : ". mysql_errno(). " : ". mysql_error();
    }

    
?>