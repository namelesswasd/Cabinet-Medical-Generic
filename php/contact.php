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
            $filename = "reports.txt";
            error_reporting (E_ALL ^ E_NOTICE);
            
            $firstName = $_POST['first'];
            $lastName = $_POST['last'];
            $email = $_POST['email'];
            $phoneNumber = $_POST['phone'];
            $subject = $_POST['subject'];
            $message = $_POST['message'];
            echo $message;

            if(strlen($firstName) == 0 ||
            strlen($lastName) == 0 ||
            strlen($email) == 0 ||
            strlen($subject) == 0){
                echo '<script>alert("Campurile marcate cu * sunt obligatorii!");</script>';
                echo 'Campurile marcate cu * sunt obligatorii!';
                exit;
            }

            $conn=mysql_connect("localhost","root", "");
            if(!$conn){
                echo "Nu s-a realizat conectarea la MySQL";
                exit;
            }

            $sql = "CREATE DATABASE contact_db";
            mysql_query($sql, $conn);

            mysql_select_db('contact_db');

            $sql = "CREATE TABLE `contact` (id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY, firstname varchar(30) NOT NULL, lastname varchar(30) NOT NULL, email varchar(40) NOT NULL, phone varchar(15), subject varchar(50) NOT NULL, message varchar(300))";

            mysql_query($sql, $conn);

            $sql = "INSERT INTO contact(firstname, lastname, email, phone, subject, message) VALUES ('$firstName', '$lastName', '$email', '$phoneNumber', '$subject', '$message')";

            if (mysql_query($sql, $conn)) echo "<br>Mesajul dumneavoasta a fost trimis. <br />";
            else echo "Mesajul nu a putut fi trimis!". mysql_errno(). " : ". mysql_error();
        ?>

</div>
	</div>

</body>
</html>

