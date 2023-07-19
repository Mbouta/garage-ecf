<?php
 spl_autoload_register(function($className) {
    $className = str_replace('\\', '/', $className);

    // Vérifier si le fichier de classe existe dans le dossier 'controllers'
    $controllersFile = 'controllers/' . $className . '.php';
    if (file_exists($controllersFile)) {
        include $controllersFile;
        return;
    }

    // Vérifier si le fichier de classe existe dans le dossier 'Models'
    $modelsFile = 'Models/' . $className . '.php';
    if (file_exists($modelsFile)) {
         include $modelsFile;
        return;
    }
});



