<!DOCTYPE HTML>
<!-- Website Template by freewebsitetemplates.com -->
<html>
<head>
	<meta charset="UTF-8">
	<title>Contact - Laboratory Website Template</title>
	<link rel="stylesheet" href="../css/view.css" type="text/css">
    <?php
        $conn=mysql_connect("localhost","root", "");
        if(!$conn){
            echo "Nu s-a realizat conectarea la MySQL";
            exit;
        }

        $selectdb = mysql_select_db('contact_db');
        if (!$selectdb){
            echo "<br>Baza de date nu a putut fi selectata deoarece : ". mysql_errno(). " : ". mysql_error();
        }

        $sql = "SELECT * FROM contact";
        $result = mysql_query($sql, $conn);
        if(!$result){
            echo '<script>alert("Nu am putut primi datele!");</script>';
            exit;
        }
    ?>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Montserrat&display=swap');
    </style>
</head>
<body>

    <br><br><br><br>
	<div id="body">
		<div class="content">
        <h1>Contact database:</h1>
        <table>
            <tr>
                <th>ID</th>
                <th>Nume</th>
                <th>Prenume</th>
                <th>Email</th>
                <th>Nr. Telefon</th>
                <th>Subiect</th>
                <th>Mesaj</th>
            </tr>
            <?php
                if(mysql_num_rows($result) > 0){
                    while($row = mysql_fetch_assoc($result)){
                        echo "<tr>";
                            echo "<td>". $row['id']. "</td>";
                            echo "<td>". $row['firstname']. "</td>";
                            echo "<td>". $row['lastname']. "</td>";
                            echo "<td>". $row['email']. "</td>";
                            echo "<td>". $row['phone']. "</td>";
                            echo "<td>". $row['subject']. "</td>";
                            echo "<td>". $row['message']. "</td>";
                        echo "</tr>";
                    }
                }
            ?>
            </tr>
        </table>
</div>
	</div>

</body>
</html>

