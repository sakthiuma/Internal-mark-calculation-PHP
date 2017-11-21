<!-- This php file is for student login -->


<html>
<head>
    <title> STUDENTS SPACE</title>
    <link rel="stylesheet" type="text/css" href="slogincss.css" />
    </head>
    <body>
        <div id="header1">
    <h1> STUDENT'S SPACE</h1></div>
    <?php
        session_start();
        $id=$_SESSION['sid'];
        $username="root";
        $servername="localhost";
        $dbname="studentinfo";
        $con=mysqli_connect($servername,$username,"",$dbname);
        if($con->connect_error){
            die("Connection failed:"+$con->connect_error);
        }    
        else{
             $t2="t2";
            $sql="select * from student where sid=$id";
            $result=$con->query($sql);
            if($result->num_rows>0){
               $d1="d1";
                while($row=$result->fetch_assoc()){
                    echo "<div id=$d1><span>ID</span>::".$row['sid']."<br><span>NAME</span>::".$row['name']."<br><span>DEPARTMENT</span>::".$row['dept']."<br><span>COLLEGE</span>::".$row['college_name']."</div>";
                }
            }
            echo "<table id=$t2 ><tr><th>SUBJECT</th><th>UT1</th><th>UT2</th><th>UT3</th><th>INTERNAL MARK</th></tr>";
            $sql="select * from cs6501 where reg_id=$id";
            $result=$con->query($sql);
               
                    if ($result->num_rows > 0) {
                        
                        // output data of each row
                        while($row = $result->fetch_assoc()) {
                            echo "<tr><td>cs6501</td><td>".$row["ut1"]."&nbsp;</td>&nbsp;<td> ".$row["ut2"]."&nbsp;</td>&nbsp;<td> ".$row["ut3"]."&nbsp;</td>&nbsp;<td> ".$row["im"]."&nbsp;</td></tr>";
                        
                    }
                        
                    }
            $sql1="select * from cs6502 where reg_id=$id";
            $result1=$con->query($sql1);
               
                    if ($result1->num_rows > 0) {
                        // output data of each row
                        while($row = $result1->fetch_assoc()) {
                            echo "<tr><td>cs6502</td>&nbsp;<td>".$row["ut1"]."&nbsp;</td>&nbsp;<td> ".$row["ut2"]."&nbsp;</td>&nbsp;<td> ".$row["ut3"]." &nbsp;</td>&nbsp;<td>".$row["im"]."&nbsp;</td></tr>";
                        
                    }
                        
                    }
                
        }
            
        ?>
        <button id="b1"><a href="index.php" style="text-decoration:none">BACK TO HOME</a></button>
    </body>
</html>