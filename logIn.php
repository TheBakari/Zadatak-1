<?php
session_start();
require_once("function.php");
require_once("klase/classBaze.php");
require_once("klase/classLog.php");
if(isset($_GET['logoff']))
{
    Log::upisiLog("logs/logovanja.txt", "Uspešna odjava korisnika {$_SESSION['user_name']}");
    unistiSesiju();
    header("location: index.php");
    
}
$db=new Baza();
$db->connect();
if(isset($_POST["username"]) and isset($_POST["password"]))
{
    $username=$_POST["username"];
    $password=$_POST["password"];
    if(validanString($username) and validanString($password))
    {
        $sql="SELECT * FROM users WHERE user_email='{$username}'";
        $rez=$db->query($sql);
        if($db->num_rows($rez)>0)
        {
            $red=$db->fetch_object($rez);
            if($password==$red->user_password)
            {
                napraviSesiju($red);
                Log::upisiLog("logs/logovanja.txt", "{$_SESSION['user_name']} se uspešno ulogovao");
                header("location: index.php");
            }
            else
            {
                echo "Lozinka";
                Log::upisiLog("logs/logovanja.txt", "Pogrešna lozinka {$username} - otkucana lozinka je {$password}, poslato sa IP adrese - ".$_SERVER['REMOTE_ADDR']);
            }
        }
        else
        {
            echo "Email";
            Log::upisiLog("logs/logovanja.txt", "Pogrešno korisničko ime {$username} - poslato sa IP adrese - ".$_SERVER['REMOTE_ADDR']);
        }
    }
    else
    {
        echo "Karakter";
        Log::upisiLog("logs/logovanja.txt", "Nedozvoljeni karakteri od strane {$username} - poslato sa IP adrese - ".$_SERVER['REMOTE_ADDR']);
    }
    
}
else
{
    echo "Svi podaci su obavezni!!";
}
?>
