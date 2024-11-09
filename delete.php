<html>
<head>
<style>
button {
  background-color:black;
  height:30px;
  color: white;
}
</style>
</head>
<body>
<center>
<?php
function setValues(){
global $email,$psw;
$email=$_POST["email"];
$psw=$_POST["psw"];
}
if (isset($_POST["email"]) && isset($_POST["psw"])){
	setValues();
	}
if ($_SERVER["REQUEST_METHOD"]=="GET" && isset($_GET["info"])) {
    echo "Information from the query string: ".($_GET["info"])."<br><br>";
}
$conn=mysqli_connect("localhost", "root", "", "debaiter");
$check="SELECT Email from signup where Email='$email'";
$checkresult=mysqli_query($conn,$check);
if (mysqli_num_rows($checkresult)>0){
$query="DELETE from signup where Email='$email' AND Password='$psw'";
$queryresult=mysqli_query($conn,$query);
if (mysqli_affected_rows($conn)>0){
echo"Account Deleted successfully.<br><br>";
}
else{
echo "Email and Password do not match. <br><br>
<a href='delete.html'> <button>Try again </button></a>";
die();
}
}
else{
echo("No account exists with this email. <br><br>");
}
mysqli_close($conn);
?>
<a href="debaiter.html"><button> Return to Home Page </button></a>
</center>
</body>
</html>