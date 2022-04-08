<?php

session_start();


?>
<!DOCTYPE html>
<html>
<body>
<?php

echo "Subject Code:". $_SESSION["sub_code"];

echo "<br>Subject Name:". $_SESSION["sub_name"];

$_SESSION["sub_code"]="DWP5431";


echo "<br>The latest subject code : ". $_SESSION["sub_code"];
?>
</body>
</html>