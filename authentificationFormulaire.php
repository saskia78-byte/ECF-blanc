<?php 
$login=$_GET["login"];
$password=$_GET["password"];
$bdd= new PDO('mysql:host=localhost;dbname=links;charset=utf8', 'root', '');
$recup=$bdd-> prepare("SELECT * FROM user_ WHERE login= :login");
$recup->execute(array('login'=>$login));
$user=$recup-> fetch(PDO::FETCH_ASSOC);
$error="";

if($user){
    if ($login === 'Emma' && $password === 'coucou') {
        $_SESSION['password'] = true;
        $_SESSION['login'] = $login;
        header('Location: backoffice.php');
        exit;
    }else{
        $error="Identifiants incorrects. <a href='formulaire.php'>Se connecter</a>";
    }
}
if ($error): 
    echo $error;
endif; 
?>