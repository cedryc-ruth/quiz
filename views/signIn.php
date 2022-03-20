<form method="post" action="index.php?action=sign_in">
    <input type="text" name="username" placeholder="nom d'utilisateur">
    <input type="email" name="email" placeholder="e-mail">
    <select name="sexe">
        <option>Veuillez choisir une option...</option>
        <option value="H">Homme</option>
        <option value="F">Femme</option>
        <option value="O">Autre</option>
        <option value="0">Préfère ne pas préciser</option>
    </select>
    <input type="password" name="password" placeholder="Mot de passe">
    <input type="password" name="password_verif" placeholder="Répéter le mot de passe">
    <input type="submit" name="submit_sign" value="Créer le compte">
</form>
