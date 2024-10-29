<?PHP 
session_start();
include 'conn.php';
if($_SESSION['DRIVER_LOGIN']!="")
{
    unset($_SESSION['DRIVER_LOGIN']);
    unset($_SESSION['DRIVER_ID']);	
    unset($_SESSION['DRIVER_EMAIL']);
    unset($_SESSION['DRIVER_NAME']);
    header("location:login.php");
}
else {
    header("location:login.php");
}
?>