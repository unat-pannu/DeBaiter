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
if (isset($_POST['signup_submit'])) {
function setValues(){
global $name,$email,$psw,$psw_repeat;
$name=$_POST["name"];
$email=$_POST["email"];
$psw=$_POST["psw"];
$psw_repeat=$_POST["psw-repeat"];
   if ($psw !== $psw_repeat) {;
      return false;
   }
   return true;
}
function WelcomeMessage(){
global $name;
echo "Signed up successfully, ".$name."<br> Welcome to DeBaiter. <br> <br>";
}
if (isset($_POST["name"]) && isset($_POST["email"]) && isset($_POST["psw"]) && isset($_POST["psw-repeat"])){
	setValues();
	if ($psw_repeat==$psw){
	WelcomeMessage();
	}
	}
	else{
	echo "Please fill in all the fields <br><br>";
	}
if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET["info"])) {
    echo "Information from the query string: " . ($_GET["info"]) . "<br><br>";
}
if (setValues()){
$conn = mysqli_connect("localhost", "root", "", "debaiter");
$query="INSERT INTO signup VALUES('$name','$email','$psw')";
$rs = mysqli_query($conn, $query);
    if($rs)
    {
        echo "Entries added! <br><br>";
    }
mysqli_close($conn);} 
else
echo "Passwords do not match <br> <br>";
}
?>
<a href="debaiter.html"><button> Return to Home Page </button></a>
</center>
</body>
</html>
