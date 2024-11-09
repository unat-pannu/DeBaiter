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
global $email,$psw,$psw_repeat;
$email=$_POST["email"];
$psw=$_POST["psw"];
$psw_repeat=$_POST["psw-repeat"];
   if ($psw !== $psw_repeat) {
      return false;
   }
   return true;
}
function WelcomeMessage(){
global $name;
echo "Password Updated Successfully <br> Login again to continue. <br> <br>";
}
if (isset($_POST["email"]) && isset($_POST["psw"]) && isset($_POST["psw-repeat"])){
	setValues();
	}
if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET["info"])) {
    echo "Information from the query string: " . ($_GET["info"]) . "<br><br>";
}
if (setValues()){
$conn = mysqli_connect("localhost", "root", "", "debaiter");
$query="UPDATE signup set Password='$psw' where Email='$email';";
$rs = mysqli_query($conn, $query);
    if(mysqli_affected_rows($conn)>0)
    {
       WelcomeMessage();
    }
    else{
    echo"No user found with this email. <br><br>
    <a href='update.html'><button>Try again</button></a>";
    die();
    }
mysqli_close($conn);
}
else{
      echo "Passwords do not match <br> <br>";}
?>
<a href="debaiter.html"><button> Return to Home Page </button></a>
</center>
</body>
</html>