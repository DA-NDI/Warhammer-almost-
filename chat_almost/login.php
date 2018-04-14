<?php
session_start();
include "auth.php";
// if (!isset($_POST["login"] || !isset($_POST["passwd"])))
// {
// 	echo '<script language="javascript">';
// 	echo 'alert("All fields must be filled")';
// 	echo '</script>';
// 	return (FALSE);
// }
if (!auth($_POST["login"], $_POST["passwd"]))
{
	echo '<script language="javascript">';
	echo 'alert("You wrote wrong login or password")';
	echo '</script>';
	header("Location: index.html");

}
$_SESSION["loggued_on_user"] = $_POST["login"];
?>
<!DOCTYPE html>
<html>
<head>
	<title>42chat</title>
	<style>
		body
{
    margin: 0;
    padding: 0;
    background-image: url("resources/background.jpg") ;
    background-position-x: center;
    background-position-y: center;
    background-size: cover;
    background-repeat-x: no-repeat;
    background-repeat-y: no-repeat;
    background-attachment: fixed;
    background-origin: initial;
    background-clip: initial;
    background-color: rgb(0, 0, 0);
}
iframe {
  background-color: transparent;
  border: 0;
  color: black;
}
	</style>
</head>
<body>

<iframe name="chat" width="98%" height="550px" src="chat.php"></iframe>
<iframe id="input_field" name="speak" width="98%" height="50px" src="speak.php"></iframe>

</body>
</html>