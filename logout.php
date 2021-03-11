<?php
session_start();
$Log=session_destroy();
if($Log)
{
    echo "<script>
    alert('Logout Successfully!!');
    window.location.href='login.php';
    </script>";
}
?>