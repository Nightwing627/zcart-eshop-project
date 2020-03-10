<?php 
return array (
  'title' => 'zCart Installer',
  'next' => 'Nästa steg',
  'back' => 'Tidigare',
  'finish' => 'Installera',
  'forms' => 
  array (
    'errorTitle' => 'Följande fel inträffade:',
  ),
  'wait' => 'Vänta, installationen kan ta några minuter.',
  'welcome' => 
  array (
    'templateTitle' => 'Välkommen',
    'title' => 'zCart Installer',
    'message' => 'Enkel installations- och installationsguide.',
    'next' => 'Kontrollera krav',
  ),
  'requirements' => 
  array (
    'templateTitle' => 'Steg 1 | Serverkrav',
    'title' => 'Serverkrav',
    'next' => 'Kontrollera behörigheter',
    'required' => 'Behöver ställa in alla serverkrav för att fortsätta',
  ),
  'permissions' => 
  array (
    'templateTitle' => 'Steg 2 | Behörigheter',
    'title' => 'Behörigheter',
    'next' => 'Konfigurera miljö',
    'required' => 'Ställ in behörigheterna för att fortsätta. Läs dokumentet. för hjälp.',
  ),
  'environment' => 
  array (
    'menu' => 
    array (
      'templateTitle' => 'Steg 3 | Miljöinställningar',
      'title' => 'Miljöinställningar',
      'desc' => 'Välj hur du vill konfigurera apps <code> .env </code> -filen.',
      'wizard-button' => 'Form Wizard Setup',
      'classic-button' => 'Klassisk textredigerare',
    ),
    'wizard' => 
    array (
      'templateTitle' => 'Steg 3 | Miljöinställningar | Guidad trollkarl',
      'title' => 'Guidad <kod> .env </code> guiden',
      'tabs' => 
      array (
        'environment' => 'Miljö',
        'database' => 'Databas',
        'application' => 'Ansökan',
      ),
      'form' => 
      array (
        'name_required' => 'Ett miljönamn krävs.',
        'app_name_label' => 'App-namn',
        'app_name_placeholder' => 'App-namn',
        'app_environment_label' => 'App-miljö',
        'app_environment_label_local' => 'Lokal',
        'app_environment_label_developement' => 'Utveckling',
        'app_environment_label_qa' => 'Qa',
        'app_environment_label_production' => 'Produktion',
        'app_environment_label_other' => 'Andra',
        'app_environment_placeholder_other' => 'Ange din miljö ...',
        'app_debug_label' => 'Appfelsökning',
        'app_debug_label_true' => 'Sann',
        'app_debug_label_false' => 'Falsk',
        'app_log_level_label' => 'App-loggnivå',
        'app_log_level_label_debug' => 'debug',
        'app_log_level_label_info' => 'info',
        'app_log_level_label_notice' => 'lägga märke till',
        'app_log_level_label_warning' => 'varning',
        'app_log_level_label_error' => 'fel',
        'app_log_level_label_critical' => 'kritisk',
        'app_log_level_label_alert' => 'varna',
        'app_log_level_label_emergency' => 'nödsituation',
        'app_url_label' => 'App-URL',
        'app_url_placeholder' => 'App-URL',
        'db_connection_failed' => 'Det gick inte att ansluta till databasen. Kontrollera konfigurationerna.',
        'db_connection_label' => 'Databasanslutning',
        'db_connection_label_mysql' => 'mysql',
        'db_connection_label_sqlite' => 'sqlite',
        'db_connection_label_pgsql' => 'pgsql',
        'db_connection_label_sqlsrv' => 'sqlsrv',
        'db_host_label' => 'Databasvärd',
        'db_host_placeholder' => 'Databasvärd',
        'db_port_label' => 'Databasport',
        'db_port_placeholder' => 'Databasport',
        'db_name_label' => 'Databas namn',
        'db_name_placeholder' => 'Databas namn',
        'db_username_label' => 'Databasanvändarnamn',
        'db_username_placeholder' => 'Databasanvändarnamn',
        'db_password_label' => 'Databaslösenord',
        'db_password_placeholder' => 'Databaslösenord',
        'app_tabs' => 
        array (
          'more_info' => 'Mer information',
          'broadcasting_title' => 'Sändning, caching, session och kö',
          'broadcasting_label' => 'Broadcast Driver',
          'broadcasting_placeholder' => 'Broadcast Driver',
          'cache_label' => 'Cache-drivrutin',
          'cache_placeholder' => 'Cache-drivrutin',
          'session_label' => 'Session Driver',
          'session_placeholder' => 'Session Driver',
          'queue_label' => 'Köförare',
          'queue_placeholder' => 'Köförare',
          'redis_label' => 'Redis Driver',
          'redis_host' => 'Redis värd',
          'redis_password' => 'Redis lösenord',
          'redis_port' => 'Redis Port',
          'mail_label' => 'Post',
          'mail_driver_label' => 'Mail Driver',
          'mail_driver_placeholder' => 'Mail Driver',
          'mail_host_label' => 'Mailvärd',
          'mail_host_placeholder' => 'Mailvärd',
          'mail_port_label' => 'Mailport',
          'mail_port_placeholder' => 'Mailport',
          'mail_username_label' => 'Mail Användarnamn',
          'mail_username_placeholder' => 'Mail Användarnamn',
          'mail_password_label' => 'E-postlösenord',
          'mail_password_placeholder' => 'E-postlösenord',
          'mail_encryption_label' => 'Mailkryptering',
          'mail_encryption_placeholder' => 'Mailkryptering',
          'pusher_label' => 'Langare',
          'pusher_app_id_label' => 'Pusher-app-id',
          'pusher_app_id_palceholder' => 'Pusher-app-id',
          'pusher_app_key_label' => 'Pusher-appnyckel',
          'pusher_app_key_palceholder' => 'Pusher-appnyckel',
          'pusher_app_secret_label' => 'Pusher App Secret',
          'pusher_app_secret_palceholder' => 'Pusher App Secret',
        ),
        'buttons' => 
        array (
          'setup_database' => 'Inställningsdatabas',
          'setup_application' => 'Installationsapplikation',
          'install' => 'Installera',
        ),
      ),
    ),
    'classic' => 
    array (
      'backup' => 'För att undvika röra, kopiera och spara standardkonfigurationerna någon annanstans innan du gör några ändringar.',
      'templateTitle' => 'Steg 3 | Miljöinställningar | Klassisk redaktör',
      'title' => 'Miljö File Editor',
      'save' => 'Spara konfigurationerna',
      'back' => 'Använd formulärguiden',
      'install' => 'Installera',
      'required' => 'Lös problemet för att fortsätta.',
    ),
    'success' => 'Dina .env-filinställningar har sparats.',
    'errors' => 'Det går inte att spara .env-filen. Skapa den manuellt.',
  ),
  'verify' => 
  array (
    'verify_purchase' => 'Verifiera köp',
    'submit' => 'Lämna',
    'form' => 
    array (
      'email_address_label' => 'E-postadress',
      'email_address_placeholder' => 'E-postadress',
      'purchase_code_label' => 'Köpskod',
      'purchase_code_placeholder' => 'Köpskod eller licensnyckel',
      'root_url_label' => 'Root Url',
      'root_url_placeholder' => 'ROOT URL (utan / i slutet)',
    ),
  ),
  'install' => 'Installera',
  'verified' => 'Licensen har verifierats.',
  'verification_failed' => 'Licensverifiering misslyckades!',
  'installed' => 
  array (
    'success_log_message' => 'zCart-installationsprogrammet INSTALLERAD',
  ),
  'final' => 
  array (
    'title' => 'Sista steget',
    'templateTitle' => 'Sista steget',
    'finished' => 'Applikationen har installerats.',
    'migration' => 'Migration och utsädeskonsolutgång:',
    'console' => 'Applikationskonsolens utgång:',
    'log' => 'Inloggning för installationslogg:',
    'env' => 'Slutlig .env-fil:',
    'exit' => 'Klicka här för att logga in',
    'import_demo_data' => 'Importera demonstrationsdata',
  ),
  'updater' => 
  array (
    'title' => 'zCart Updater',
    'welcome' => 
    array (
      'title' => 'Välkommen till Updater',
      'message' => 'Välkommen till uppdateringsguiden.',
    ),
    'overview' => 
    array (
      'title' => 'Översikt',
      'message' => 'Det finns en uppdatering. | Det finns :number-uppdateringar.',
      'install_updates' => 'Installera uppdateringar',
    ),
    'final' => 
    array (
      'title' => 'Färdiga',
      'finished' => 'Applikationens databas har uppdaterats.',
      'exit' => 'Klicka här för att avsluta',
    ),
    'log' => 
    array (
      'success_message' => 'zCart Installer UPPDATERAD',
    ),
  ),
);