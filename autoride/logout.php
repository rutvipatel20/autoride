<?PHP 
session_start();
include 'conn.php';
if($_SESSION['USER_LOGIN']!="")
{
    unset($_SESSION['USER_LOGIN']);
    unset($_SESSION['USER_ID']);	
    unset($_SESSION['USER_EMAIL']);
    unset($_SESSION['USER_NAME']);
    header("location:login.php");
}
else {
    header("location:login.php");
}
?>