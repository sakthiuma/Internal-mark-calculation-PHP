<!-- This is the main page which obtains the information if student login or teacher login is required -->

<html>
<head>
    <title>Internal Mark Main Page</title>
    <link rel="stylesheet" type="text/css" href="indexcss.css" />
    </head>
    <?php
    session_start();
    $name="localhost";
    $user="root";
    $pass="";
    $db="studentinfo";
    $conn=mysqli_connect($name,$user,$pass,$db);
    if($conn->connect_error)
	   die("Connection failure").$conn->connect_error;
    else{
    if(isset($_POST['tid']) and isset($_POST['tpassword'])){
        $id = $_POST['tid'];
        $pass = $_POST['tpassword'];
        $query = "SELECT * FROM `teacher` WHERE tid='$id' and pass='$pass'"; 
         $result = $conn->query($query);
        $count = $result->num_rows;
        if ($count == 1){
            $_SESSION['tid'] = $id;
            $_SESSION['tpassword']=$pass;
            $_SESSION['tsub']=$_POST['tsub'];
            header('Location: tlogin.php');
        }
        else
        {
            $msg = "Wrong credentials";
        }
    }

    if(isset($msg) & !empty($msg)){
        echo $msg;
    }
        if(isset($_POST['sid'])){
        $id = $_POST['sid'];
       
        $query = "SELECT * FROM `student` WHERE sid='$id'"; 
         $result = $conn->query($query);
        $count = $result->num_rows;
        if ($count == 1){
            $_SESSION['sid'] = $id;
            
            header('Location: slogin.php');
        }
        else
        {
            $msg = "Wrong credentials";
        }
    }

    if(isset($msg) & !empty($msg)){
        echo $msg;
    }
    }

    ?>
    <body>
        <center><h1> STUDENT'S PORTAL</h1></center>
    <div id="d1">
         <h3>STUDENT LOGIN</h3>
        <form  method="post">
        <input type="text" name="sid" placeholder="Enter the Student id" required/><br><br>
            <center> <input type="submit" name="Login" /></center>
        </form>
        </div>
        <div id="d2">
             <h3>TEACHER LOGIN</h3>
        <form  method="post" name="tlogin">
            <input type="text" name="tid" placeholder="Enter the Teacher Id" required/><br><br><br>
            <input type="password" name="tpassword"  placeholder="Enter the password" required/><br><br>
            <input type="text" name="tsub" placeholder="Enter the subject code" required /><br><br>
            <center> <input type="submit" name="Login" /></center>
            </form>
        </div>
    </body>
</html>