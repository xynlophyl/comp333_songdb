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
        if(isset($_REQUEST["register"])){
            $reg_value = "";
            $s_username = $_REQUEST["username"];
            $s_password = $_REQUEST["password"];

            if(!empty($s_username) && !empty($s_password)){
                $sql_query = "INSERT INTO users(username, password) VALUES ('$s_username', '$s_password')";
                $res = mysqli_query($conn, $sql_query);
                $reg_value = "registered $s_username";
            } else {
                $reg_value = "values not inputted correctly";
            }

        }

        // generating songs by username
        if(isset($_REQUEST["retrieve"])){
            $ret_value = "";
            $s_username = $_REQUEST["username"];
            
            if(!empty($s_username)) {
                $sql_query = "SELECT * FROM ratings WHERE username = ('$s_username')";
                $res = mysqli_query($conn, $sql_query);
                while ($row = mysqli_fetch_assoc($res)){
                    $ret_value = $ret_value . "$row[song] -> $row[rating] ";
                }
                // $ret_value = "$row[song] -> $row[rating]";
            }
            else { 
                $ret_value = "Username Invalid";
            }
        }
        $conn->close();
    ?>

    <!-- form for creating new account -->
    <form method="GET" action="">
    Username: <input type="text" name="username" placeholder="Enter" /><br>
    Password: <input type="password" name="password" placeholder="Enter Password" /><br>
    <input type="submit" name = "register" value= "Submit"/>
    <p><?php
        echo $reg_value;
    ?></p>
    </form>

    <!-- form for getting user's songs -->
    <form method="GET" action="">   
        Username: <input type="text" name="username" placeholder="Enter Username" /><br>
        <input type="submit" name="retrieve" value="Submit"/>
        <p><?php 
            if(!empty($ret_value)){
                echo $ret_value;
            } else {
                echo "No songs available";
            }
        ?></p>
    </form>

</body>
</html>
