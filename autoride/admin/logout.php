<?PHP 
session_start();
include 'conn.php';
if($_SESSION['ADMIN_LOGIN']!="")
{
    unset($_SESSION['ADMIN_LOGIN']);
    unset($_SESSION['ADMIN_ID']);	
    unset($_SESSION['ADMIN_EMAIL']);
    unset($_SESSION['ADMIN_NAME']);
    header("location:login.php");
}
else {
    header("location:login.php");
}
?>