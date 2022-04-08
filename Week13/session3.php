<?php

session_start();


?>
<!DOCTYPE html>
<html>
<body>
<?php

session_unset(); //remove the data of all session variables

session_destroy(); //destroy the session
?>
</body>
</html>