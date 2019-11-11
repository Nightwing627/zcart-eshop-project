<?php 
return array (
  'title' => 'zCart Installer',
  'next' => 'L\'étape suivante',
  'back' => 'précédent',
  'finish' => 'Installer',
  'forms' => 
  array (
    'errorTitle' => 'Les erreurs suivantes sont survenues:',
  ),
  'wait' => 'Veuillez patienter, l\'installation peut prendre quelques minutes.',
  'welcome' => 
  array (
    'templateTitle' => 'Bienvenue',
    'title' => 'zCart Installer',
    'message' => 'Assistant d\'installation et de configuration facile.',
    'next' => 'Vérifier les exigences',
  ),
  'requirements' => 
  array (
    'templateTitle' => 'Étape 1 | Configuration requise pour le serveur',
    'title' => 'Configuration requise pour le serveur',
    'next' => 'Vérifier les autorisations',
    'required' => 'Besoin de définir toutes les exigences du serveur pour continuer',
  ),
  'permissions' => 
  array (
    'templateTitle' => 'Étape 2 | Les permissions',
    'title' => 'Les permissions',
    'next' => 'Configurer l\'environnement',
    'required' => 'Définissez les autorisations nécessaires pour continuer. Lire le doc. pour aider.',
  ),
  'environment' => 
  array (
    'menu' => 
    array (
      'templateTitle' => 'Étape 3 | Paramètres de l\'environnement',
      'title' => 'Paramètres de l\'environnement',
      'desc' => 'Veuillez sélectionner le mode de configuration du fichier <code> .env </ code> des applications.',
      'wizard-button' => 'Configuration de l\'assistant de formulaire',
      'classic-button' => 'Éditeur de texte classique',
    ),
    'wizard' => 
    array (
      'templateTitle' => 'Étape 3 | Paramètres de l\'environnement | Assistant guidé',
      'title' => 'Assistant <code> .env </ code> guidé',
      'tabs' => 
      array (
        'environment' => 'Environnement',
        'database' => 'Base de données',
        'application' => 'Application',
      ),
      'form' => 
      array (
        'name_required' => 'Un nom d\'environnement est requis.',
        'app_name_label' => 'Nom de l\'application',
        'app_name_placeholder' => 'Nom de l\'application',
        'app_environment_label' => 'Environnement d\'application',
        'app_environment_label_local' => 'Local',
        'app_environment_label_developement' => 'Développement',
        'app_environment_label_qa' => 'Question Réponse',
        'app_environment_label_production' => 'Production',
        'app_environment_label_other' => 'Autre',
        'app_environment_placeholder_other' => 'Entrez votre environnement ...',
        'app_debug_label' => 'Debug App',
        'app_debug_label_true' => 'Vrai',
        'app_debug_label_false' => 'Faux',
        'app_log_level_label' => 'Niveau du journal de l\'application',
        'app_log_level_label_debug' => 'déboguer',
        'app_log_level_label_info' => 'Info',
        'app_log_level_label_notice' => 'remarquer',
        'app_log_level_label_warning' => 'Attention',
        'app_log_level_label_error' => 'Erreur',
        'app_log_level_label_critical' => 'critique',
        'app_log_level_label_alert' => 'alerte',
        'app_log_level_label_emergency' => 'urgence',
        'app_url_label' => 'URL de l\'application',
        'app_url_placeholder' => 'URL de l\'application',
        'db_connection_failed' => 'Impossible de se connecter à la base de données. Vérifiez les configurations.',
        'db_connection_label' => 'Connexion à la base de données',
        'db_connection_label_mysql' => 'mysql',
        'db_connection_label_sqlite' => 'sqlite',
        'db_connection_label_pgsql' => 'pgsql',
        'db_connection_label_sqlsrv' => 'sqlsrv',
        'db_host_label' => 'Hôte de base de données',
        'db_host_placeholder' => 'Hôte de base de données',
        'db_port_label' => 'Port de base de données',
        'db_port_placeholder' => 'Port de base de données',
        'db_name_label' => 'Nom de la base de données',
        'db_name_placeholder' => 'Nom de la base de données',
        'db_username_label' => 'Nom d\'utilisateur de la base de données',
        'db_username_placeholder' => 'Nom d\'utilisateur de la base de données',
        'db_password_label' => 'Mot de passe de base de données',
        'db_password_placeholder' => 'Mot de passe de base de données',
        'app_tabs' => 
        array (
          'more_info' => 'Plus d\'informations',
          'broadcasting_title' => 'Diffusion, mise en cache, session et file d\'attente',
          'broadcasting_label' => 'Pilote de diffusion',
          'broadcasting_placeholder' => 'Pilote de diffusion',
          'cache_label' => 'Pilote de cache',
          'cache_placeholder' => 'Pilote de cache',
          'session_label' => 'Pilote de session',
          'session_placeholder' => 'Pilote de session',
          'queue_label' => 'Pilote de file d\'attente',
          'queue_placeholder' => 'Pilote de file d\'attente',
          'redis_label' => 'Redis Driver',
          'redis_host' => 'Redis Host',
          'redis_password' => 'Redis mot de passe',
          'redis_port' => 'Port de redis',
          'mail_label' => 'Courrier',
          'mail_driver_label' => 'Pilote de courrier',
          'mail_driver_placeholder' => 'Pilote de courrier',
          'mail_host_label' => 'Mail Host',
          'mail_host_placeholder' => 'Mail Host',
          'mail_port_label' => 'Port de messagerie',
          'mail_port_placeholder' => 'Port de messagerie',
          'mail_username_label' => 'Mail Nom d\'utilisateur',
          'mail_username_placeholder' => 'Mail Nom d\'utilisateur',
          'mail_password_label' => 'Mot de passe mail',
          'mail_password_placeholder' => 'Mot de passe mail',
          'mail_encryption_label' => 'Chiffrement du courrier',
          'mail_encryption_placeholder' => 'Chiffrement du courrier',
          'pusher_label' => 'Poussoir',
          'pusher_app_id_label' => 'Pusher App Id',
          'pusher_app_id_palceholder' => 'Pusher App Id',
          'pusher_app_key_label' => 'Poussoir App Key',
          'pusher_app_key_palceholder' => 'Poussoir App Key',
          'pusher_app_secret_label' => 'Pusher App Secret',
          'pusher_app_secret_palceholder' => 'Pusher App Secret',
        ),
        'buttons' => 
        array (
          'setup_database' => 'Base de données d\'installation',
          'setup_application' => 'Application d\'installation',
          'install' => 'Installer',
        ),
      ),
    ),
    'classic' => 
    array (
      'backup' => 'Pour éviter tout désordre, veuillez copier et sauvegarder les configurations par défaut ailleurs avant d\'apporter des modifications.',
      'templateTitle' => 'Étape 3 | Paramètres de l\'environnement | Éditeur classique',
      'title' => 'Editeur de fichier d\'environnement',
      'save' => 'Sauvegarder les configurations',
      'back' => 'Utiliser l\'assistant de formulaire',
      'install' => 'Installer',
      'required' => 'Corrigez le problème pour continuer.',
    ),
    'success' => 'Les paramètres de votre fichier .env ont été enregistrés.',
    'errors' => 'Impossible de sauvegarder le fichier .env, veuillez le créer manuellement.',
  ),
  'verify' => 
  array (
    'verify_purchase' => 'Vérifier l\'achat',
    'submit' => 'Soumettre',
    'form' => 
    array (
      'email_address_label' => 'Adresse e-mail',
      'email_address_placeholder' => 'Adresse e-mail',
      'purchase_code_label' => 'Code d\'achat',
      'purchase_code_placeholder' => 'Code d\'achat ou clé de licence',
      'root_url_label' => 'URL racine',
      'root_url_placeholder' => 'URL ROOT (sans / à la fin)',
    ),
  ),
  'install' => 'Installer',
  'verified' => 'La licence a été vérifiée avec succès.',
  'verification_failed' => 'La vérification de la licence a échoué!',
  'installed' => 
  array (
    'success_log_message' => 'zCart Installer installé avec succès sur',
  ),
  'final' => 
  array (
    'title' => 'Dernière étape',
    'templateTitle' => 'Dernière étape',
    'finished' => 'L\'application a été installée avec succès.',
    'migration' => 'Migration et sortie de la console d\'origine:',
    'console' => 'Sortie de la console d\'application:',
    'log' => 'Entrée du journal d\'installation:',
    'env' => 'Fichier final .env:',
    'exit' => 'Cliquez ici pour vous identifier',
    'import_demo_data' => 'Importer des données de démonstration',
  ),
  'updater' => 
  array (
    'title' => 'zCart Updater',
    'welcome' => 
    array (
      'title' => 'Bienvenue à la mise à jour',
      'message' => 'Bienvenue dans l\'assistant de mise à jour.',
    ),
    'overview' => 
    array (
      'title' => 'Vue d\'ensemble',
      'message' => 'Il y a 1 mise à jour. | Il y a :number mises à jour.',
      'install_updates' => 'Installer les mises à jour',
    ),
    'final' => 
    array (
      'title' => 'Fini',
      'finished' => 'La base de données de l\'application a été mise à jour avec succès.',
      'exit' => 'Cliquez ici pour sortir',
    ),
    'log' => 
    array (
      'success_message' => 'zCart Installer a été mis à jour avec succès',
    ),
  ),
);