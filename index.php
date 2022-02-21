<!DOCTYPE HTML>
<html lang="en">
<head>
  <meta http-equiv="Content-Type" content="application/x-www-form-urlencoded"/>
<title>Sample Submission Form</title>
</head>
<body>
    <form method="GET" action="">
    Student ID: <input type="text" name="student_id" placeholder="Enter Student ID" /><br>
    Test: <input type="text" name="test" placeholder="Enter Test" /><br>
    <input type="submit" name="submit" value="Submit"/>

    <?php 
        // $servername = "localhost";
        // $username = "root";
        // $password = "";
        // $dbname = "music-db";

        // $conn = new mysli($servername, $username, $password, $dbname);
        // if ($conn->connect_error){
        //     die("Connection failed: ". $conn->connect_error);
        // }
        if(!empty($out_value)){
            echo $out_value;
          }

    ?>

    <?php
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "music-db";

        $conn = new mysli($servername, $username, $password, $dbname);
        if ($conn->connect_error){
            die("Connection failed: ". $conn->connect_error);
        }
        
        // creating new account and passwords

        // generating songs by username
        if(isset($_REQUEST["Retrieve"])){
            $out_value = "";
            $s_username = $_REQUEST[""];
            
            if(!empty($s_username)) {
                $sql_query = "SELECT * FROM student_grades WHERE username = ('$s_username)";
                $res = mysql_query($conn, $sql_query);
                $row = mysqli_fetch_assoc($result);
                $out_value = "$row[song] -> $row[rating]"
            }
            else { 
                $out_value = "No songs available!";
            }
        }
        $conn->close();
    ?>
</body>
</html>
