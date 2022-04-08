<?php
//start the session
session_start();


?>
<!DOCTYPE html>
<html>
<body>
<?php
//set session variables

$_SESSION["sub_code"]="DCS5288";

$_SESSION["sub_name"]="Internet and Web Publishing";

echo "Session variables are set";

?>
</body>
</html>