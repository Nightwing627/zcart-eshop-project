<?php 
return array (
  'title' => 'zCart-installatieprogramma',
  'next' => 'Volgende stap',
  'back' => 'voorgaand',
  'finish' => 'Installeren',
  'forms' => 
  array (
    'errorTitle' => 'De volgende fouten zijn opgetreden:',
  ),
  'wait' => 'Even geduld, de installatie kan enkele minuten duren.',
  'welcome' => 
  array (
    'templateTitle' => 'Welkom',
    'title' => 'zCart-installatieprogramma',
    'message' => 'Eenvoudige installatie- en installatiewizard.',
    'next' => 'Vereisten controleren',
  ),
  'requirements' => 
  array (
    'templateTitle' => 'Stap 1 | Serververeisten',
    'title' => 'Serververeisten',
    'next' => 'Controleer machtigingen',
    'required' => 'Moet alle serververeisten instellen om door te gaan',
  ),
  'permissions' => 
  array (
    'templateTitle' => 'Stap 2 | machtigingen',
    'title' => 'machtigingen',
    'next' => 'Omgeving configureren',
    'required' => 'Stel de benodigde rechten in om door te gaan. Lees het doc. voor hulp.',
  ),
  'environment' => 
  array (
    'menu' => 
    array (
      'templateTitle' => 'Stap 3 | Omgeving instellingen',
      'title' => 'Omgeving instellingen',
      'desc' => 'Selecteer hoe u het apps <code> .env </code> -bestand wilt configureren.',
      'wizard-button' => 'Formulierwizard instellen',
      'classic-button' => 'Klassieke teksteditor',
    ),
    'wizard' => 
    array (
      'templateTitle' => 'Stap 3 | Omgeving Instellingen | Begeleide wizard',
      'title' => 'Begeleide <code> .env </code> wizard',
      'tabs' => 
      array (
        'environment' => 'Milieu',
        'database' => 'Database',
        'application' => 'Toepassing',
      ),
      'form' => 
      array (
        'name_required' => 'Een omgevingsnaam is verplicht.',
        'app_name_label' => 'Applicatie naam',
        'app_name_placeholder' => 'Applicatie naam',
        'app_environment_label' => 'App-omgeving',
        'app_environment_label_local' => 'lokaal',
        'app_environment_label_developement' => 'Ontwikkeling',
        'app_environment_label_qa' => 'Qa',
        'app_environment_label_production' => 'Productie',
        'app_environment_label_other' => 'anders',
        'app_environment_placeholder_other' => 'Ga je omgeving binnen ...',
        'app_debug_label' => 'App-foutopsporing',
        'app_debug_label_true' => 'waar',
        'app_debug_label_false' => 'vals',
        'app_log_level_label' => 'App-logniveau',
        'app_log_level_label_debug' => 'debug',
        'app_log_level_label_info' => 'info',
        'app_log_level_label_notice' => 'merk op',
        'app_log_level_label_warning' => 'waarschuwing',
        'app_log_level_label_error' => 'fout',
        'app_log_level_label_critical' => 'kritisch',
        'app_log_level_label_alert' => 'alarm',
        'app_log_level_label_emergency' => 'noodgeval',
        'app_url_label' => 'App-URL',
        'app_url_placeholder' => 'App-URL',
        'db_connection_failed' => 'Kon niet verbinden met de database. Controleer de configuraties.',
        'db_connection_label' => 'Databaseverbinding',
        'db_connection_label_mysql' => 'mysql',
        'db_connection_label_sqlite' => 'sqlite',
        'db_connection_label_pgsql' => 'pgsql',
        'db_connection_label_sqlsrv' => 'sqlsrv',
        'db_host_label' => 'Database Host',
        'db_host_placeholder' => 'Database Host',
        'db_port_label' => 'Databasepoort',
        'db_port_placeholder' => 'Databasepoort',
        'db_name_label' => 'Database naam',
        'db_name_placeholder' => 'Database naam',
        'db_username_label' => 'Gebruikersnaam database',
        'db_username_placeholder' => 'Gebruikersnaam database',
        'db_password_label' => 'Database wachtwoord',
        'db_password_placeholder' => 'Database wachtwoord',
        'app_tabs' => 
        array (
          'more_info' => 'Meer informatie',
          'broadcasting_title' => 'Uitzenden, caching, sessie en wachtrij',
          'broadcasting_label' => 'Uitzendstuurprogramma',
          'broadcasting_placeholder' => 'Uitzendstuurprogramma',
          'cache_label' => 'Cachestuurprogramma',
          'cache_placeholder' => 'Cachestuurprogramma',
          'session_label' => 'Sessiestuurprogramma',
          'session_placeholder' => 'Sessiestuurprogramma',
          'queue_label' => 'Wachtrijstuurprogramma',
          'queue_placeholder' => 'Wachtrijstuurprogramma',
          'redis_label' => 'Redis-stuurprogramma',
          'redis_host' => 'Redis Host',
          'redis_password' => 'Wachtwoord opnieuw instellen',
          'redis_port' => 'Redis Port',
          'mail_label' => 'Mail',
          'mail_driver_label' => 'Mail Driver',
          'mail_driver_placeholder' => 'Mail Driver',
          'mail_host_label' => 'E-mailhost',
          'mail_host_placeholder' => 'E-mailhost',
          'mail_port_label' => 'Mail Port',
          'mail_port_placeholder' => 'Mail Port',
          'mail_username_label' => 'Mail gebruikersnaam',
          'mail_username_placeholder' => 'Mail gebruikersnaam',
          'mail_password_label' => 'Mail wachtwoord',
          'mail_password_placeholder' => 'Mail wachtwoord',
          'mail_encryption_label' => 'Mail encryptie',
          'mail_encryption_placeholder' => 'Mail encryptie',
          'pusher_label' => 'Pusher',
          'pusher_app_id_label' => 'Pusher-app-ID',
          'pusher_app_id_palceholder' => 'Pusher-app-ID',
          'pusher_app_key_label' => 'Pusher App-sleutel',
          'pusher_app_key_palceholder' => 'Pusher App-sleutel',
          'pusher_app_secret_label' => 'Pusher App Secret',
          'pusher_app_secret_palceholder' => 'Pusher App Secret',
        ),
        'buttons' => 
        array (
          'setup_database' => 'Database instellen',
          'setup_application' => 'Toepassing instellen',
          'install' => 'Installeren',
        ),
      ),
    ),
    'classic' => 
    array (
      'backup' => 'Kopieer en bewaar de standaardconfiguraties ergens anders voordat u wijzigingen aanbrengt om rommel te voorkomen.',
      'templateTitle' => 'Stap 3 | Omgeving Instellingen | Klassieke editor',
      'title' => 'Omgevingsbestandseditor',
      'save' => 'Sla de configuraties op',
      'back' => 'Gebruik de formulierwizard',
      'install' => 'Installeren',
      'required' => 'Los het probleem op om door te gaan.',
    ),
    'success' => 'Uw .env-bestandinstellingen zijn opgeslagen.',
    'errors' => 'Kan het .env-bestand niet opslaan. Maak het handmatig aan.',
  ),
  'verify' => 
  array (
    'verify_purchase' => 'Aankoop verifiëren',
    'submit' => 'voorleggen',
    'form' => 
    array (
      'email_address_label' => 'E-mailadres',
      'email_address_placeholder' => 'E-mailadres',
      'purchase_code_label' => 'Aankoopcode',
      'purchase_code_placeholder' => 'Koopcode of licentiesleutel',
      'root_url_label' => 'Root-URL',
      'root_url_placeholder' => 'ROOT URL (zonder / aan het einde)',
    ),
  ),
  'install' => 'Installeren',
  'verified' => 'Licentie is succesvol geverifieerd.',
  'verification_failed' => 'Licentieverificatie mislukt!',
  'installed' => 
  array (
    'success_log_message' => 'zCart-installatieprogramma met succes GEÏNSTALLEERD op',
  ),
  'final' => 
  array (
    'title' => 'Laatste stap',
    'templateTitle' => 'Laatste stap',
    'finished' => 'Toepassing is succesvol geïnstalleerd.',
    'migration' => 'Migratie- en seed-console-uitvoer:',
    'console' => 'Uitvoer applicatieconsole:',
    'log' => 'Installatie logboekinvoer:',
    'env' => 'Laatste .env-bestand:',
    'exit' => 'Klik hier om in te loggen',
    'import_demo_data' => 'Demogegevens importeren',
  ),
  'updater' => 
  array (
    'title' => 'zCart Updater',
    'welcome' => 
    array (
      'title' => 'Welkom bij de Updater',
      'message' => 'Welkom bij de updatewizard.',
    ),
    'overview' => 
    array (
      'title' => 'Overzicht',
      'message' => 'Er is 1 update. | Er zijn :number updates.',
      'install_updates' => 'Installeer updates',
    ),
    'final' => 
    array (
      'title' => 'Afgewerkt',
      'finished' => 'De database van de applicatie is succesvol bijgewerkt.',
      'exit' => 'Klik hier om af te sluiten',
    ),
    'log' => 
    array (
      'success_message' => 'zCart Installer succesvol bijgewerkt',
    ),
  ),
);