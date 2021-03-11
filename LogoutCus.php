<?php
include('dbconnection.php');
session_start();
session_destroy();
echo "<script>
alert('Logout Successfully');
window.location.href='CustomerLogin.php';
</script>";
?>