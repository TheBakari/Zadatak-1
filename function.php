<?php
function validanString($str)
{
    if(strpos($str, "=")!==false) return false;
    if(strpos($str, " ")!==false) return false;
    if(strpos($str, "(")!==false) return false;
    if(strpos($str, ")")!==false) return false;
    if(strpos($str, "'")!==false) return false;
    if(strpos($str, "/")!==false) return false;
    return true;
}

function login()
{
    if(isset($_SESSION['id']) and isset($_SESSION['user_name']) and isset($_SESSION['user_status']))
        return true;
    elseif(isset($_COOKIE['id']) and isset($_COOKIE['user_name']) and isset($_COOKIE['user_status']))
    {
        $_SESSION['id']=$_COOKIE['id'];
        $_SESSION['user_name']=$_COOKIE['user_name'];
        $_SESSION['user_status']=$_COOKIE['user_status'];
        return true;
    }
    else
        return false;
    
}
function unistiSesiju()
{
    session_unset();
    session_destroy();
    setcookie("id", "", time()-1,"/");
    setcookie("user_name", "", time()-1,"/");
    setcookie("user_status", "", time()-1,"/");
}
function napraviSesiju($red)
{
    $_SESSION['id']=$red->id;
    $_SESSION['user_name']="$red->user_name $red->user_lastname";
	$_SESSION['user_status']=$red->user_status;
	if(isset($_POST['remember']))
	{
		setcookie("id", $red->id, time()+86400,"/");
		setcookie("user_name", "$red->user_name $red->user_lastname", time()+86400,"/");
	    setcookie("user_status", $red->user_status, time()+86400,"/");
	}
}
?>