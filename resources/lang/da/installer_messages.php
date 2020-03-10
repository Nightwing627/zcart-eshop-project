<?php 
return array (
  'title' => 'zCart Installer',
  'next' => 'Næste skridt',
  'back' => 'Tidligere',
  'finish' => 'Installere',
  'forms' => 
  array (
    'errorTitle' => 'Følgende fejl opstod:',
  ),
  'wait' => 'Vent venligst, installationen kan tage et par minutter.',
  'welcome' => 
  array (
    'templateTitle' => 'Velkommen',
    'title' => 'zCart Installer',
    'message' => 'Nem installations- og installationsguide.',
    'next' => 'Kontroller krav',
  ),
  'requirements' => 
  array (
    'templateTitle' => 'Trin 1 | Serverkrav',
    'title' => 'Serverkrav',
    'next' => 'Kontroller tilladelser',
    'required' => 'Brug for at indstille alle serverkrav til at fortsætte',
  ),
  'permissions' => 
  array (
    'templateTitle' => 'Trin 2 | Tilladelser',
    'title' => 'Tilladelser',
    'next' => 'Konfigurer miljø',
    'required' => 'Indstil tilladelser som krævet for at fortsætte. Læs dokumentet. for hjælp.',
  ),
  'environment' => 
  array (
    'menu' => 
    array (
      'templateTitle' => 'Trin 3 | Miljøindstillinger',
      'title' => 'Miljøindstillinger',
      'desc' => 'Vælg, hvordan du vil konfigurere apps <code> .env </code> -filen.',
      'wizard-button' => 'Opsætning af formularguide',
      'classic-button' => 'Klassisk teksteditor',
    ),
    'wizard' => 
    array (
      'templateTitle' => 'Trin 3 | Miljøindstillinger | Guidet guide',
      'title' => 'Guidet <kode> .env </code> guiden',
      'tabs' => 
      array (
        'environment' => 'Miljø',
        'database' => 'Database',
        'application' => 'Ansøgning',
      ),
      'form' => 
      array (
        'name_required' => 'Et miljønavn kræves.',
        'app_name_label' => 'App-navn',
        'app_name_placeholder' => 'App-navn',
        'app_environment_label' => 'App-miljø',
        'app_environment_label_local' => 'Lokal',
        'app_environment_label_developement' => 'Udvikling',
        'app_environment_label_qa' => 'Qa',
        'app_environment_label_production' => 'Produktion',
        'app_environment_label_other' => 'Andet',
        'app_environment_placeholder_other' => 'Indtast dit miljø ...',
        'app_debug_label' => 'App-fejlfinding',
        'app_debug_label_true' => 'Rigtigt',
        'app_debug_label_false' => 'Falsk',
        'app_log_level_label' => 'App-logniveau',
        'app_log_level_label_debug' => 'fejlfinde',
        'app_log_level_label_info' => 'info',
        'app_log_level_label_notice' => 'varsel',
        'app_log_level_label_warning' => 'advarsel',
        'app_log_level_label_error' => 'fejl',
        'app_log_level_label_critical' => 'kritisk',
        'app_log_level_label_alert' => 'alert',
        'app_log_level_label_emergency' => 'nødsituation',
        'app_url_label' => 'App-adresse',
        'app_url_placeholder' => 'App-adresse',
        'db_connection_failed' => 'Kunne ikke oprette forbindelse til databasen. Kontroller konfigurationer.',
        'db_connection_label' => 'Databaseforbindelse',
        'db_connection_label_mysql' => 'mysql',
        'db_connection_label_sqlite' => 'sqlite',
        'db_connection_label_pgsql' => 'pgsql',
        'db_connection_label_sqlsrv' => 'sqlsrv',
        'db_host_label' => 'Database vært',
        'db_host_placeholder' => 'Database vært',
        'db_port_label' => 'Database Port',
        'db_port_placeholder' => 'Database Port',
        'db_name_label' => 'Databasens navn',
        'db_name_placeholder' => 'Databasens navn',
        'db_username_label' => 'Databasebrugernavn',
        'db_username_placeholder' => 'Databasebrugernavn',
        'db_password_label' => 'Database adgangskode',
        'db_password_placeholder' => 'Database adgangskode',
        'app_tabs' => 
        array (
          'more_info' => 'Mere info',
          'broadcasting_title' => 'Broadcasting, cache, session og kø',
          'broadcasting_label' => 'Broadcast Driver',
          'broadcasting_placeholder' => 'Broadcast Driver',
          'cache_label' => 'Cache-driver',
          'cache_placeholder' => 'Cache-driver',
          'session_label' => 'Session driver',
          'session_placeholder' => 'Session driver',
          'queue_label' => 'Kø driver',
          'queue_placeholder' => 'Kø driver',
          'redis_label' => 'Redis Driver',
          'redis_host' => 'Redis vært',
          'redis_password' => 'Redis adgangskode',
          'redis_port' => 'Redis Port',
          'mail_label' => 'Post',
          'mail_driver_label' => 'Mail Driver',
          'mail_driver_placeholder' => 'Mail Driver',
          'mail_host_label' => 'Mailhost',
          'mail_host_placeholder' => 'Mailhost',
          'mail_port_label' => 'Mail Port',
          'mail_port_placeholder' => 'Mail Port',
          'mail_username_label' => 'Mail brugernavn',
          'mail_username_placeholder' => 'Mail brugernavn',
          'mail_password_label' => 'Mail adgangskode',
          'mail_password_placeholder' => 'Mail adgangskode',
          'mail_encryption_label' => 'Mailkryptering',
          'mail_encryption_placeholder' => 'Mailkryptering',
          'pusher_label' => 'Pusher',
          'pusher_app_id_label' => 'Pusher-app-id',
          'pusher_app_id_palceholder' => 'Pusher-app-id',
          'pusher_app_key_label' => 'Pusher-appnøgle',
          'pusher_app_key_palceholder' => 'Pusher-appnøgle',
          'pusher_app_secret_label' => 'Pusher-apphemmelighed',
          'pusher_app_secret_palceholder' => 'Pusher-apphemmelighed',
        ),
        'buttons' => 
        array (
          'setup_database' => 'Opsætningsdatabase',
          'setup_application' => 'Opsætning af applikation',
          'install' => 'Installere',
        ),
      ),
    ),
    'classic' => 
    array (
      'backup' => 'For at undgå rod, skal du kopiere og gemme standardkonfigurationer et andet sted, før du foretager ændringer.',
      'templateTitle' => 'Trin 3 | Miljøindstillinger | Klassisk redaktør',
      'title' => 'Miljøfileditor',
      'save' => 'Gem konfigurationer',
      'back' => 'Brug formularguiden',
      'install' => 'Installere',
      'required' => 'Løs problemet for at fortsætte.',
    ),
    'success' => 'Dine .env-filindstillinger er gemt.',
    'errors' => 'Kan ikke gemme .env-filen. Opret den manuelt.',
  ),
  'verify' => 
  array (
    'verify_purchase' => 'Bekræft køb',
    'submit' => 'Indsend',
    'form' => 
    array (
      'email_address_label' => 'Email adresse',
      'email_address_placeholder' => 'Email adresse',
      'purchase_code_label' => 'Købskode',
      'purchase_code_placeholder' => 'Købskode eller licensnøgle',
      'root_url_label' => 'Root Url',
      'root_url_placeholder' => 'ROOT URL (uden / i slutningen)',
    ),
  ),
  'install' => 'Installere',
  'verified' => 'Licensen er verificeret.',
  'verification_failed' => 'Licensverifikation mislykkedes!',
  'installed' => 
  array (
    'success_log_message' => 'zCart-installationsprogrammet INSTALLERET med succes',
  ),
  'final' => 
  array (
    'title' => 'Sidste trin',
    'templateTitle' => 'Sidste trin',
    'finished' => 'Programmet er installeret.',
    'migration' => 'Migration og frø konsol output:',
    'console' => 'Applikationskonsolens output:',
    'log' => 'Indførelse af installationslog:',
    'env' => 'Endelig .env-fil:',
    'exit' => 'Klik her for at logge ind',
    'import_demo_data' => 'Importer demonstrationsdata',
  ),
  'updater' => 
  array (
    'title' => 'zCart Updater',
    'welcome' => 
    array (
      'title' => 'Velkommen til Updater',
      'message' => 'Velkommen til opdateringsguiden.',
    ),
    'overview' => 
    array (
      'title' => 'Oversigt',
      'message' => 'Der er 1 opdatering. | Der er :number-opdateringer.',
      'install_updates' => 'Installer opdateringer',
    ),
    'final' => 
    array (
      'title' => 'Færdig',
      'finished' => 'Applikationens database er blevet opdateret.',
      'exit' => 'Klik her for at afslutte',
    ),
    'log' => 
    array (
      'success_message' => 'zCart-installationsprogrammet OPDATERET med succes',
    ),
  ),
);