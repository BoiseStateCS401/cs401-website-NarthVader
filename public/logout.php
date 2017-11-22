<?php
session_start();
session_unset();
setcookie(session_name(), '', time()-3600);
session_regenerate_id(true);
session_destroy();
header("Location: index.php");
?>