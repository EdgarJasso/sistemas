<?php
ob_start();
session_start();
session_destroy();
echo '<script type="text/javascript">
window.location = "http://remittent-crowd.000webhostapp.com/BITACORA";
</script>';
exit();
//header("Location:http://remittent-crowd.000webhostapp.com/BITACORA");
die();
?>