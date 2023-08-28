<!DOCTYPE HTML>
<!-- Website Template by freewebsitetemplates.com -->
<html>
<head>
	<meta charset="UTF-8">
	<title>Contact - Laboratory Website Template</title>
	<link rel="stylesheet" href="../css/style.css" type="text/css">
</head>
<body>
	<div id="body">
		<div class="content">
        <?php
            $username = $_POST['user'];
            $password = $_POST['pass'];

            if(strlen($username) == 0 ||
            strlen($password) == 0){
                echo '<script>alert("Campurile marcate cu * sunt obligatorii!");</script>';
                echo 'Campurile marcate cu * sunt obligatorii!';
                exit;
            }

            $conn=mysql_connect("localhost","root", "");
            if(!$conn){
                echo "Nu s-a realizat conectarea la MySQL";
                exit;
            }

            $selectdb = mysql_select_db('user_db');
            if (!$selectdb){
                echo "<br>Baza de date nu a putut fi selectata deoarece : ". mysql_errno(). " : ". mysql_error();
            }

            $sql = "SELECT password FROM users WHERE username='$username'";
            $result = mysql_query($sql, $conn);
            if(!$result){
                echo '<script>alert("Nu am putut primi datele!");</script>';
                echo "<br>Nu am putut primi datele : ". mysql_errno(). " : ". mysql_error();
                exit;
            }

            if(mysql_num_rows($result) == 1){
                $row = mysql_fetch_assoc($result);
                $password_result = $row['password'];

                if($password == $password_result){
                    echo "Logare cu success la utilizatorul '$username'!";

                    $login_sql = "CREATE DATABASE logged_user";
                    mysql_query($login_sql, $conn);
                    mysql_select_db('logged_user');
                    $login_sql = "CREATE TABLE user(username varchar(30) NOT NULL)";
                    mysql_query($login_sql, $conn);
                    $login_sql = "DELETE FROM user";
                    mysql_query($login_sql, $conn);
                    $login_sql = "INSERT INTO user(username) VALUES ('$username')";
                    mysql_query($login_sql, $conn);
                } else {
                    echo "Date incorecte!";
                }
            }
        ?>
		</div>
	</div>
</body>
</html>

