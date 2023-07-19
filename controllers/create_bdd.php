<?php
// Informations de connexion à MySQL
$hostname = $_POST['host'];
$rootUsername = 'root';
$rootPassword = '';
$username = $_POST['username'];
$password = $_POST['password']; 
$nomBaseDeDonnees = $_POST['dbname'];

// Créer une connexion à MySQL
$connexion = new mysqli($hostname, $rootUsername, $rootPassword);

// Vérifier la connexion
if ($connexion->connect_error) {
    die('Erreur de connexion à MySQL : ' . $connexion->connect_error);
}



// Créer la requête SQL pour créer la base de données
//$requete = "CREATE DATABASE IF NOT EXISTS $nomBaseDeDonnees";

// Interclassement
$interclassement = 'utf8_swedish_ci';

// Créer la requête SQL pour créer la base de données avec l'interclassement
$requete = "CREATE DATABASE IF NOT EXISTS $nomBaseDeDonnees CHARACTER SET utf8 COLLATE $interclassement";


// Exécuter la requête
if ($connexion->query($requete) === TRUE) {
    echo '<span class="text-success">La base de données \'' . $nomBaseDeDonnees . '\' a été créée avec succès.</span><br>';

    // Créer le fichier de configuration
    $configFile = 'DataBase.php';
    $configContent = <<<EOD
<?php
class Database {
    private \$host =  '$hostname';
    private \$username = '$username';
    private \$password = '$password';
    private \$database = '$nomBaseDeDonnees';

    protected \$connection;

    public function __construct() {
        \$this->connection = new PDO("mysql:host=\$this->host;dbname=\$this->database", \$this->username, \$this->password);
        \$this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }

    public function getConnection() {
        return \$this->connection;
    }
}
?>
EOD;

    // Écrire le contenu dans le fichier de configuration
    file_put_contents($configFile, $configContent); 
    echo '<span class="text-success"> Le fichier de configuration a été créé avec succès.</span><br>';

} else {
    echo '<span class="text-danger">Erreur lors de la création de la base de données  \'' . $connexion->error . '\' </span><br>';

}

// Fermer la connexion
$connexion->close();


// Créez une connexion à la base de données
$connexion2 = new mysqli($hostname, $rootUsername, $rootPassword, $nomBaseDeDonnees);

// Vérifiez la connexion
if ($connexion2->connect_error) {
    die('Erreur de connexion à la base de données : ' . $connexion2->connect_error);
}

// Requête SQL pour créer les tables
$sql = <<<SQL
--
-- Base de données : `mygarage`
--

-- --------------------------------------------------------

--
-- Structure de la table `contact`
--

DROP TABLE IF EXISTS `contact`;
CREATE TABLE IF NOT EXISTS `contact` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `nom` varchar(255) CHARACTER SET utf8 COLLATE utf8_swedish_ci NOT NULL,
  `prenom` varchar(255) CHARACTER SET utf8 COLLATE utf8_swedish_ci NOT NULL,
  `email` varchar(255) CHARACTER SET utf8 COLLATE utf8_swedish_ci NOT NULL,
  `telephone` varchar(255) CHARACTER SET utf8 COLLATE utf8_swedish_ci NOT NULL,
  `sujet` varchar(255) CHARACTER SET utf8 COLLATE utf8_swedish_ci NOT NULL,
  `message` varchar(255) CHARACTER SET utf8 COLLATE utf8_swedish_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb3 COLLATE=utf8_swedish_ci;

-- --------------------------------------------------------

--
-- Structure de la table `galerie_image_voiture`
--

DROP TABLE IF EXISTS `galerie_image_voiture`;
CREATE TABLE IF NOT EXISTS `galerie_image_voiture` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `image` varchar(255) CHARACTER SET utf8 COLLATE utf8_swedish_ci NOT NULL,
  `id_voiture` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `galerie_image_voiture_id_voiture_foreign` (`id_voiture`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb3 COLLATE=utf8_swedish_ci;

-- --------------------------------------------------------

--
-- Structure de la table `horaires`
--

DROP TABLE IF EXISTS `horaires`;
CREATE TABLE IF NOT EXISTS `horaires` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `jour` varchar(255) CHARACTER SET utf8 COLLATE utf8_swedish_ci NOT NULL,
  `am` varchar(255) CHARACTER SET utf8 COLLATE utf8_swedish_ci NOT NULL,
  `pm` varchar(255) CHARACTER SET utf8 COLLATE utf8_swedish_ci NOT NULL,
  `status` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=19 DEFAULT CHARSET=utf8mb3 COLLATE=utf8_swedish_ci;

-- --------------------------------------------------------

--
-- Structure de la table `services`
--

DROP TABLE IF EXISTS `services`;
CREATE TABLE IF NOT EXISTS `services` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `titre` varchar(255) CHARACTER SET utf8 COLLATE utf8_swedish_ci NOT NULL,
  `contenu` text CHARACTER SET utf8 COLLATE utf8_swedish_ci NOT NULL,
  `image` varchar(255) CHARACTER SET utf8 COLLATE utf8_swedish_ci NOT NULL,
  `date_creation` varchar(255) CHARACTER SET utf8 COLLATE utf8_swedish_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb3 COLLATE=utf8_swedish_ci;

-- --------------------------------------------------------

--
-- Structure de la table `temoignage`
--

DROP TABLE IF EXISTS `temoignage`;
CREATE TABLE IF NOT EXISTS `temoignage` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `nom` varchar(255) CHARACTER SET utf8 COLLATE utf8_swedish_ci NOT NULL,
  `commentaire` varchar(255) CHARACTER SET utf8 COLLATE utf8_swedish_ci NOT NULL,
  `note` varchar(255) CHARACTER SET utf8 COLLATE utf8_swedish_ci NOT NULL,
  `type_commentaire` varchar(255) CHARACTER SET utf8 COLLATE utf8_swedish_ci NOT NULL,
  `date_creation` varchar(255) CHARACTER SET utf8 COLLATE utf8_swedish_ci NOT NULL,
  `status` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb3 COLLATE=utf8_swedish_ci;

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `nom` varchar(255) CHARACTER SET utf8 COLLATE utf8_swedish_ci NOT NULL,
  `prenom` varchar(255) CHARACTER SET utf8 COLLATE utf8_swedish_ci NOT NULL,
  `email` varchar(255) CHARACTER SET utf8 COLLATE utf8_swedish_ci NOT NULL,
  `mot_de_passe` varchar(255) CHARACTER SET utf8 COLLATE utf8_swedish_ci NOT NULL,
  `type_compte` varchar(255) CHARACTER SET utf8 COLLATE utf8_swedish_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb3 COLLATE=utf8_swedish_ci;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `nom`, `prenom`, `email`, `mot_de_passe`, `type_compte`) VALUES
(1, 'Pierot', 'De la Porte', 'admin@garage.com', 'MTIzNA==', 'admin'),
(9, 'lebeau', 'EXPRESS', 'employe@garage.com', 'MTIzNA==', 'employe');

-- --------------------------------------------------------

--
-- Structure de la table `voitures`
--

DROP TABLE IF EXISTS `voitures`;
CREATE TABLE IF NOT EXISTS `voitures` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `nom` varchar(255) CHARACTER SET utf8 COLLATE utf8_swedish_ci NOT NULL,
  `caracteristiques` text CHARACTER SET utf8 COLLATE utf8_swedish_ci NOT NULL,
  `annee_circulation` int NOT NULL,
  `kilometrage` int NOT NULL,
  `prix` int NOT NULL,
  `image` varchar(255) CHARACTER SET utf8 COLLATE utf8_swedish_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb3 COLLATE=utf8_swedish_ci;
COMMIT;

SQL;

// Exécutez les requêtes SQL
if ($connexion2->multi_query($sql) === TRUE) { 
    echo '<span class="text-success"> Les tables ont été créées avec succès.</span><br>';
    echo '<a class="btn btn-primary" href="../admin/index.php">Connectez-vous</a><br>';

} else { 

    echo "Erreur de connexion à la base de données : " . $connexion2->error;
}

// Fermez la connexion
$connexion2->close();

?>

