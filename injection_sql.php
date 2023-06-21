<?php
// Voici un exemple de code utilisant une requete préparée pour prévenir l'injection SQL:

// On définit la source de données (DSN) qui permettra de se connecter à la base d données

$dsn = "mysql:host=localhost;dbname=charset=utf8mb4";

// On definit les options pour la connexion PDO, notamment le mode d'erreur à utiliser en cas de problème

$options = [
  PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
];

// On crée une nouvelle instance de PDO en utilisant les informations de connexion précédement définies

$pdo = new PDO($dsn, "username", "password" , $options);
?>

<h2> Ce code permet de filter une entrée utilisateur pour éviter las attaques par injection SQL</h2>

  <form action="votrelienduscript.php" method="post">
   <label for="username">Nom d'utilisateur</label>
   <input type ="text" name="username" id="username" required>
   <input type="submit" value="Rechercher">
  </form>


<?php
 // On récupère la valeur du champ 'username' envoyé  en POST depuis le formulaire HTML

$user_input = $_POST['username'];

 // On récupère une requéte SQL pour séléctionner tous les utilisateurs ayant pour nom d'utilisateur ce lui envoyé depuis le formulaire

$stmt = $pdo->prepare("SELECT *FROM users WHERE usename = :username");

// On exécute la requéte  en passant le nom d'utilisateur comme paramétre 

$stmt->execute(['username' => $user_input]);

// On récuppère le resultat de la requete sous forme d'un tableau   associatif

$result = $stmt->fetchAll(PDO::FETCH_ASSOC);


// => $user_input récupère une entrée utilisateur pour éviter les attaques par injection SQL.
// => $stmt = $pdo->prepare("SELECT *FROM users WHERE username = :username"); cette requéte utilise une variable de liaison "username" poiur représenter la valeur de l'entrée utilisateur dans la clause WHERE de ntre requéte SELECT.
// => execute permet d'exécuter la requéte en remplacant les parametres  liés (dans ce cas -ci, username) par les valeurs spécifiées dan,s le tableau associatif passé en argument.

// => fetch() est appelée sur l'objet de requéte préparée $stmt pour récupérer tous les résultats de la requéte sous la forme d'un tableau associatif.
