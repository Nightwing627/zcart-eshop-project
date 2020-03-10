<?php 
return array (
  'title' => 'zCart Installer',
  'next' => 'Neste steg',
  'back' => 'Tidligere',
  'finish' => 'Installere',
  'forms' => 
  array (
    'errorTitle' => 'Følgende feil oppstod:',
  ),
  'wait' => 'Vent, installasjonen kan ta noen minutter.',
  'welcome' => 
  array (
    'templateTitle' => 'Velkommen',
    'title' => 'zCart Installer',
    'message' => 'Enkel installasjons- og installasjonsveiviser.',
    'next' => 'Sjekk krav',
  ),
  'requirements' => 
  array (
    'templateTitle' => 'Trinn 1 | Serverkrav',
    'title' => 'Serverkrav',
    'next' => 'Sjekk tillatelser',
    'required' => 'Trenger å stille alle serverkravene for å fortsette',
  ),
  'permissions' => 
  array (
    'templateTitle' => 'Trinn 2 | tillatelser',
    'title' => 'tillatelser',
    'next' => 'Konfigurer miljø',
    'required' => 'Angi tillatelsene som nødvendig for å fortsette. Les dokumentet. for hjelp.',
  ),
  'environment' => 
  array (
    'menu' => 
    array (
      'templateTitle' => 'Trinn 3 | Miljøinnstillinger',
      'title' => 'Miljøinnstillinger',
      'desc' => 'Velg hvordan du vil konfigurere apps <code> .env </code> -filen.',
      'wizard-button' => 'Oppsett av skjemaveiviser',
      'classic-button' => 'Klassisk tekstredigerer',
    ),
    'wizard' => 
    array (
      'templateTitle' => 'Trinn 3 | Miljøinnstillinger | Guidet veiviser',
      'title' => 'Guidet <kode> .env </code> veiviser',
      'tabs' => 
      array (
        'environment' => 'Miljø',
        'database' => 'database',
        'application' => 'applikasjon',
      ),
      'form' => 
      array (
        'name_required' => 'Et miljønavn kreves.',
        'app_name_label' => 'Appnavn',
        'app_name_placeholder' => 'Appnavn',
        'app_environment_label' => 'App-miljø',
        'app_environment_label_local' => 'lokal',
        'app_environment_label_developement' => 'Utvikling',
        'app_environment_label_qa' => 'Qa',
        'app_environment_label_production' => 'Produksjon',
        'app_environment_label_other' => 'Annen',
        'app_environment_placeholder_other' => 'Gå inn i miljøet ...',
        'app_debug_label' => 'Appfeil',
        'app_debug_label_true' => 'ekte',
        'app_debug_label_false' => 'Falsk',
        'app_log_level_label' => 'Applogg-nivå',
        'app_log_level_label_debug' => 'debug',
        'app_log_level_label_info' => 'info',
        'app_log_level_label_notice' => 'legge merke til',
        'app_log_level_label_warning' => 'advarsel',
        'app_log_level_label_error' => 'feil',
        'app_log_level_label_critical' => 'kritisk',
        'app_log_level_label_alert' => 'varsling',
        'app_log_level_label_emergency' => 'nødsituasjon',
        'app_url_label' => 'App-URL',
        'app_url_placeholder' => 'App-URL',
        'db_connection_failed' => 'Kunne ikke koble til databasen. Sjekk konfigurasjonene.',
        'db_connection_label' => 'Databasetilkobling',
        'db_connection_label_mysql' => 'mysql',
        'db_connection_label_sqlite' => 'SQLite',
        'db_connection_label_pgsql' => 'pgsql',
        'db_connection_label_sqlsrv' => 'sqlsrv',
        'db_host_label' => 'Databasevært',
        'db_host_placeholder' => 'Databasevært',
        'db_port_label' => 'Database Port',
        'db_port_placeholder' => 'Database Port',
        'db_name_label' => 'Databasens navn',
        'db_name_placeholder' => 'Databasens navn',
        'db_username_label' => 'Databasens brukernavn',
        'db_username_placeholder' => 'Databasens brukernavn',
        'db_password_label' => 'Databasepassord',
        'db_password_placeholder' => 'Databasepassord',
        'app_tabs' => 
        array (
          'more_info' => 'Mer informasjon',
          'broadcasting_title' => 'Kringkasting, hurtigbufring, økt og kø',
          'broadcasting_label' => 'Broadcast Driver',
          'broadcasting_placeholder' => 'Broadcast Driver',
          'cache_label' => 'Cache Driver',
          'cache_placeholder' => 'Cache Driver',
          'session_label' => 'Økt driver',
          'session_placeholder' => 'Økt driver',
          'queue_label' => 'Køsjåfør',
          'queue_placeholder' => 'Køsjåfør',
          'redis_label' => 'Redis Driver',
          'redis_host' => 'Redis vert',
          'redis_password' => 'Redis passord',
          'redis_port' => 'Redis Port',
          'mail_label' => 'Post',
          'mail_driver_label' => 'Mail Driver',
          'mail_driver_placeholder' => 'Mail Driver',
          'mail_host_label' => 'Mail vert',
          'mail_host_placeholder' => 'Mail vert',
          'mail_port_label' => 'Mail Port',
          'mail_port_placeholder' => 'Mail Port',
          'mail_username_label' => 'Mail brukernavn',
          'mail_username_placeholder' => 'Mail brukernavn',
          'mail_password_label' => 'E-post passord',
          'mail_password_placeholder' => 'E-post passord',
          'mail_encryption_label' => 'E-postkryptering',
          'mail_encryption_placeholder' => 'E-postkryptering',
          'pusher_label' => 'Pusher',
          'pusher_app_id_label' => 'Pusher-app-ID',
          'pusher_app_id_palceholder' => 'Pusher-app-ID',
          'pusher_app_key_label' => 'Pusher-appnøkkel',
          'pusher_app_key_palceholder' => 'Pusher-appnøkkel',
          'pusher_app_secret_label' => 'Pusher App Secret',
          'pusher_app_secret_palceholder' => 'Pusher App Secret',
        ),
        'buttons' => 
        array (
          'setup_database' => 'Oppsettdatabase',
          'setup_application' => 'Oppsett applikasjon',
          'install' => 'Installere',
        ),
      ),
    ),
    'classic' => 
    array (
      'backup' => 'For å unngå rot, kopier og lagre standardkonfigurasjonene et annet sted før du gjør endringer.',
      'templateTitle' => 'Trinn 3 | Miljøinnstillinger | Klassisk redaktør',
      'title' => 'Editor for miljøfil',
      'save' => 'Lagre konfigurasjonene',
      'back' => 'Bruk skjemaveiviseren',
      'install' => 'Installere',
      'required' => 'Løs problemet for å fortsette.',
    ),
    'success' => '.Env-filinnstillingene dine er lagret.',
    'errors' => 'Kan ikke lagre .env-filen. Opprett den manuelt.',
  ),
  'verify' => 
  array (
    'verify_purchase' => 'Bekreft kjøp',
    'submit' => 'Sende inn',
    'form' => 
    array (
      'email_address_label' => 'Epostadresse',
      'email_address_placeholder' => 'Epostadresse',
      'purchase_code_label' => 'Kjøpskode',
      'purchase_code_placeholder' => 'Kjøpskode eller lisensnøkkel',
      'root_url_label' => 'Root Url',
      'root_url_placeholder' => 'ROOT URL (uten / på slutten)',
    ),
  ),
  'install' => 'Installere',
  'verified' => 'Lisensen er bekreftet.',
  'verification_failed' => 'Lisensbekreftelse mislyktes!',
  'installed' => 
  array (
    'success_log_message' => 'zCart Installer vellykket INSTALLERT på',
  ),
  'final' => 
  array (
    'title' => 'Siste trinn',
    'templateTitle' => 'Siste trinn',
    'finished' => 'Programmet er installert.',
    'migration' => 'Migrasjon og frøkonsollutgang:',
    'console' => 'Applikasjonskonsollutgang:',
    'log' => 'Oppføring av installasjonslogg:',
    'env' => 'Endelig .env-fil:',
    'exit' => 'Klikk her for å logge inn',
    'import_demo_data' => 'Importer demonstrasjonsdata',
  ),
  'updater' => 
  array (
    'title' => 'zCart Updater',
    'welcome' => 
    array (
      'title' => 'Velkommen til Updater',
      'message' => 'Velkommen til oppdateringsveiviseren.',
    ),
    'overview' => 
    array (
      'title' => 'Oversikt',
      'message' => 'Det er en oppdatering. | Det er :number-oppdateringer.',
      'install_updates' => 'Installer oppdateringer',
    ),
    'final' => 
    array (
      'title' => 'ferdig',
      'finished' => 'Applikasjonens database er oppdatert.',
      'exit' => 'Klikk her for å avslutte',
    ),
    'log' => 
    array (
      'success_message' => 'zCart Installer OPPDATERT',
    ),
  ),
);