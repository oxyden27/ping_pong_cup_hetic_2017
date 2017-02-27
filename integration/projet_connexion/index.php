<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Connexion</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
    
    
    <div class="bloc_connexion">
       
        <h3 class="title_connexion">Connexion</h3>
        
        <form class="form_connexion" method="post" action="traitement.php">
         
       <input type="text" name="login" id="login" placeholder="Login" /><br>
        <input class="margin_input"type="password" name="mdp" id="mdp" placeholder="Mot de passe"/><br>
        
         <input type="submit" value="Connexion">
        </form>
        <div class="forget_password">Mot de passe oublié ?</div>
        
    </div>
    
</body>
</html>