<?php
if(isset($_POST['signin'])){
    $pdo = new PDO("mysql:host=localhost;dbname=securite", 'root', 'voiture');
    $login = $_POST['login'];
    $pwd = $_POST['pwd'];
    
    $stmt = $pdo->prepare("SELECT * FROM user WHERE login=:login AND pwd=:pwd");
    $stmt->bindParam(':login', $login);
    $stmt->bindParam(':pwd', $pwd);
    $stmt->execute();
    
    $result = $stmt->fetch();
    
    // Vérification si l'utilisateur existe
    if($result){
        echo 'connexion réussie';
    }
    else{
        echo 'utilisateur non reconnu';
    }
}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Livecoding</title>
</head>
<body>
    <h1>TEST</h1>
    <form method="post" action="#">
        Login : <input type="text" name="login">
        <br><br>
        Password : <input type="password" name="pwd">
        <br><br>
        <input type="submit" name="signin">
    </form>
    <p>Essayer avec le login <strong>' OR 1=1 OR 1='</strong> : la connexion fonctionne</p>
</body>
</html>
