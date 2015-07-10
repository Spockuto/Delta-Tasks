<html>
<title>
	DELTA TASK 3
</title>
<body>

<style type="text/css">
th,td{
border-width:0px 1px 1px 0px;
}
body {background-color:black}
h1   {color:red;text-align:center;;}
td   {color:red;text-align:center;}
th  {color:red;text-align:center;}
p {color:green;text-align:center;}
</style>
<?php

function getRealUserIp(){
    switch(true){
      case (!empty($_SERVER['HTTP_X_REAL_IP'])) : return $_SERVER['HTTP_X_REAL_IP'];
      case (!empty($_SERVER['HTTP_CLIENT_IP'])) : return $_SERVER['HTTP_CLIENT_IP'];
      case (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) : return $_SERVER['HTTP_X_FORWARDED_FOR'];
      default : return $_SERVER['REMOTE_ADDR'];
    }
 }

$servername = "localhost";
$username = "root";
$password = "*****";
$dbname = "task";
$conn = mysqli_connect($servername, $username, $password, $dbname); 
$ip = getRealUserIp();
$ip= mysqli_real_escape_string($conn,$ip);
$time=date('Y-m-d H:i:s', $_SERVER['REQUEST_TIME']);
$time= mysqli_real_escape_string($conn,$time);
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
$sql = "INSERT INTO log(iptable,time) VALUES (' $ip' ,'$time')";

if (mysqli_query($conn, $sql)) {
    echo "<p>New record created successfully</p>";}
else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);}

$sql = "SELECT * from log ORDER BY Hit DESC" ;
$query = mysqli_query($conn, $sql);

echo "<table align='center' border='2' >";
echo "<th>ID</th><th>IP</th><th>Time</th>";

$temp=1;

if (mysqli_num_rows($query) > 0) {
	while($result=mysqli_fetch_array($query)){
		echo"<tr><td>".$result['Hit']."</td><td>".$result['iptable']."</td><td>".$result['time']."</td></tr>";
		if($temp<2){
			$hit=$result['Hit'];
			$temp=$temp+1;}

	}
}
echo'</table>';
echo'<h1>The number of hits is ' .$hit. '</h1>';

mysqli_close($conn);
?>



</body>
</html>