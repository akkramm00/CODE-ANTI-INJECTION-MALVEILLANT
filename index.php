<html>
  <head>
    <title>Formulaire</title>
  </head>
  <body>
    <h1>Formulaire</h1>
    <form action="traitement.php" method="POST">
      <label for="user_input">Entrer une valeur :</label>
      <input type="text" name="user_input" id="user_input" required>
      <br><br>
      <input type="submit" value="Envoyer">
    </form>
  </body>
</html>

<?php 
// Onrecupere la valeur du champs "user_input" envoyé en POST depuis le formulaire HTML
$user_input = $_POST['user_input'];
// On filtre la valeur du champ "user_input" avec la fonction "filter_input pour supprimer les caractères indésirables":
$sanitized_input = filter_input(INPUT_POST, 'user_input', FILTER_SANITIZE_STRING);

// Dans cet exemple , la variable $user_input contient la valeur saisie par l'utilisateur vai un formulaire POST. la fonction filter_input() prend trois arguments:
// => Le type d'entrée (INPUT_POST pour un formulaire POST).
// => Le filtre de l'entée (user_input dans notre exemple).
// => Le filtre à appliquer(FILTER_SANITIZED_STRING pour supprimer les caractères spéciaux et les balises HTML). 



// REMARQUE : le resultat de la fonction filter_input() est de ctocker dans la variable $sanitized_input. Cette variable contient la meme valeur que $user_input, mais avec les caractères indésirables supprimés. En utilisant la fonction filter_input(), nous pouvons donc filtrer les entrées utilisateurs pour éviter les injections de code malvéillant  dans notre application. il est recommandé d'appliquer ce filtre à toute les entées utilisateurs avant de les utiliser dans notre code.
?> 

