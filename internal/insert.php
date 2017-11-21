<?php
session_start();
$username="root";
$servername="localhost";
$dbname="studentinfo";
$con=mysqli_connect($servername,$username,"",$dbname);
if($con->connect_error){
    die("Connection failed:"+$con->connect_error);
}
$table=$_SESSION['tsub'];
$stmt=$con->prepare("insert into $table (reg_id,ut1,ut2,ut3) values(?,?,?,?)");
$stmt->bind_param("iiii",$id,$ut1,$ut2,$ut3);

    $id=$_SESSION['rid'];
$ut1=$_SESSION['unit1'];
$ut2=$_SESSION['unit2'];
$ut3=$_SESSION['unit3'];
$stmt->execute();
$sql="select * from $table";
$result=$con->query($sql);
if ($result->num_rows > 0) {
    echo "<table><tr><th>ID</th><th>UT1</th><th>UT2</th><th>UT3></th></tr>";
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "<tr><td>".$row["reg_id"]."</td><td>".$row["ut1"]." ".$row["ut2"]." ".$row["ut3"]."</td></tr>";
    }
    echo "</table>";
} 
else {
    echo "0 results";
}
?>