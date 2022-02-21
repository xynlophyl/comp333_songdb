<!DOCTYPE HTML>
<html lang="en">
<head>
  <meta http-equiv="Content-Type" content="application/x-www-form-urlencoded"/>
<title>Sample Submission Form</title>
</head>
<body>
    <?php
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "music-db";

        $conn = new mysqli($servername, $username, $password, $dbname);
        if ($conn->connect_error){
            die("Connection failed: ". $conn->connect_error);
        }
        
        // creating new account and passwords

        // generating songs by username
        if(isset($_REQUEST["Retrieve"])){
            $out_value = "";
            $s_username = $_REQUEST[""];
            
            if(!empty($s_username)) {
                $sql_query = "SELECT * FROM ratings WHERE username = ('$s_username)";
                $res = mysql_query($conn, $sql_query);
                $row = mysqli_fetch_assoc($result);
                echo $row;
                $out_value = "$row[song] -> $row[rating]";
            }
            else { 
                $out_value = "No songs available!";
            }
        }
        $conn->close();
    ?>

    <form method="GET" action="">
        Username: <input type="text" name="username" placeholder="Enter Username" /><br>
        <input type="submit" name="register" value="Submit"/>
        <p><?php 
            if(!empty($out_value)){
            echo $out_value;
            }
        ?></p>
    </form>

    <form method="GET" action="">
        Username: <input type="text" name="username" placeholder="Enter Username" /><br>
        Password: <input type="password" name="password" placeholder="Enter Password" /><br>
        <input type="submit" name = register" value= "Submit"/>
        <p><?php
            if(!empty($out_value)){
                echo $out_value;
            }
        ?></p>
    </form>

</body>
</html>
