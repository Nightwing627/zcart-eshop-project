<?php 
return array (
  'title' => 'zCart Installer',
  'next' => 'Passo successivo',
  'back' => 'Precedente',
  'finish' => 'Installare',
  'forms' => 
  array (
    'errorTitle' => 'Si sono verificati i seguenti errori:',
  ),
  'wait' => 'Attendere, l\'installazione potrebbe richiedere alcuni minuti.',
  'welcome' => 
  array (
    'templateTitle' => 'benvenuto',
    'title' => 'zCart Installer',
    'message' => 'Facile installazione e configurazione guidata.',
    'next' => 'Verifica i requisiti',
  ),
  'requirements' => 
  array (
    'templateTitle' => 'Passaggio 1 | Requisiti del server',
    'title' => 'Requisiti del server',
    'next' => 'Controlla le autorizzazioni',
    'required' => 'È necessario impostare tutti i requisiti del server per continuare',
  ),
  'permissions' => 
  array (
    'templateTitle' => 'Passaggio 2 | permessi',
    'title' => 'permessi',
    'next' => 'Configura ambiente',
    'required' => 'Impostare le autorizzazioni come richiesto per continuare. Leggi il documento per un aiuto.',
  ),
  'environment' => 
  array (
    'menu' => 
    array (
      'templateTitle' => 'Passaggio 3 | Impostazioni ambiente',
      'title' => 'Impostazioni ambiente',
      'desc' => 'Seleziona come vuoi configurare il file <code> .env </code> delle app.',
      'wizard-button' => 'Impostazione guidata modulo',
      'classic-button' => 'Editor di testo classico',
    ),
    'wizard' => 
    array (
      'templateTitle' => 'Passaggio 3 | Impostazioni ambiente | Mago guidato',
      'title' => 'Procedura guidata guidata <code> .env </code>',
      'tabs' => 
      array (
        'environment' => 'Ambiente',
        'database' => 'Banca dati',
        'application' => 'Applicazione',
      ),
      'form' => 
      array (
        'name_required' => 'È richiesto un nome di ambiente.',
        'app_name_label' => 'Nome dell\'applicazione',
        'app_name_placeholder' => 'Nome dell\'applicazione',
        'app_environment_label' => 'Ambiente app',
        'app_environment_label_local' => 'Locale',
        'app_environment_label_developement' => 'Sviluppo',
        'app_environment_label_qa' => 'Qa',
        'app_environment_label_production' => 'Produzione',
        'app_environment_label_other' => 'Altro',
        'app_environment_placeholder_other' => 'Entra nel tuo ambiente ...',
        'app_debug_label' => 'App Debug',
        'app_debug_label_true' => 'Vero',
        'app_debug_label_false' => 'falso',
        'app_log_level_label' => 'Livello registro app',
        'app_log_level_label_debug' => 'mettere a punto',
        'app_log_level_label_info' => 'Informazioni',
        'app_log_level_label_notice' => 'Avviso',
        'app_log_level_label_warning' => 'avvertimento',
        'app_log_level_label_error' => 'errore',
        'app_log_level_label_critical' => 'critico',
        'app_log_level_label_alert' => 'mettere in guardia',
        'app_log_level_label_emergency' => 'emergenza',
        'app_url_label' => 'URL app',
        'app_url_placeholder' => 'URL app',
        'db_connection_failed' => 'Impossibile connettersi al database. Controlla le configurazioni.',
        'db_connection_label' => 'Connessione al database',
        'db_connection_label_mysql' => 'mysql',
        'db_connection_label_sqlite' => 'sqlite',
        'db_connection_label_pgsql' => 'pgsql',
        'db_connection_label_sqlsrv' => 'SQLSRV',
        'db_host_label' => 'Host del database',
        'db_host_placeholder' => 'Host del database',
        'db_port_label' => 'Porta database',
        'db_port_placeholder' => 'Porta database',
        'db_name_label' => 'Nome del database',
        'db_name_placeholder' => 'Nome del database',
        'db_username_label' => 'Nome utente del database',
        'db_username_placeholder' => 'Nome utente del database',
        'db_password_label' => 'Password del database',
        'db_password_placeholder' => 'Password del database',
        'app_tabs' => 
        array (
          'more_info' => 'Ulteriori informazioni',
          'broadcasting_title' => 'Trasmissione, memorizzazione nella cache, sessione e coda',
          'broadcasting_label' => 'Driver di trasmissione',
          'broadcasting_placeholder' => 'Driver di trasmissione',
          'cache_label' => 'Driver della cache',
          'cache_placeholder' => 'Driver della cache',
          'session_label' => 'Driver di sessione',
          'session_placeholder' => 'Driver di sessione',
          'queue_label' => 'Driver di coda',
          'queue_placeholder' => 'Driver di coda',
          'redis_label' => 'Driver Redis',
          'redis_host' => 'Redis Host',
          'redis_password' => 'Redis Password',
          'redis_port' => 'Redis Port',
          'mail_label' => 'posta',
          'mail_driver_label' => 'Driver di posta',
          'mail_driver_placeholder' => 'Driver di posta',
          'mail_host_label' => 'Host di posta',
          'mail_host_placeholder' => 'Host di posta',
          'mail_port_label' => 'Porta posta',
          'mail_port_placeholder' => 'Porta posta',
          'mail_username_label' => 'Nome utente e-mail',
          'mail_username_placeholder' => 'Nome utente e-mail',
          'mail_password_label' => 'Mail Mail',
          'mail_password_placeholder' => 'Mail Mail',
          'mail_encryption_label' => 'Crittografia della posta',
          'mail_encryption_placeholder' => 'Crittografia della posta',
          'pusher_label' => 'Pusher',
          'pusher_app_id_label' => 'ID app Pusher',
          'pusher_app_id_palceholder' => 'ID app Pusher',
          'pusher_app_key_label' => 'Chiave dell\'app Pusher',
          'pusher_app_key_palceholder' => 'Chiave dell\'app Pusher',
          'pusher_app_secret_label' => 'Pusher App Secret',
          'pusher_app_secret_palceholder' => 'Pusher App Secret',
        ),
        'buttons' => 
        array (
          'setup_database' => 'Database di installazione',
          'setup_application' => 'Applicazione di installazione',
          'install' => 'Installare',
        ),
      ),
    ),
    'classic' => 
    array (
      'backup' => 'Per evitare confusione, copia e salva le configurazioni predefinite altrove prima di apportare modifiche.',
      'templateTitle' => 'Passaggio 3 | Impostazioni ambiente | Editor classico',
      'title' => 'Editor di file di ambiente',
      'save' => 'Salva le configurazioni',
      'back' => 'Usa la procedura guidata per i moduli',
      'install' => 'Installare',
      'required' => 'Risolvi il problema per continuare.',
    ),
    'success' => 'Le impostazioni del tuo file .env sono state salvate.',
    'errors' => 'Impossibile salvare il file .env, crearlo manualmente.',
  ),
  'verify' => 
  array (
    'verify_purchase' => 'Verifica l\'acquisto',
    'submit' => 'Sottoscrivi',
    'form' => 
    array (
      'email_address_label' => 'Indirizzo email',
      'email_address_placeholder' => 'Indirizzo email',
      'purchase_code_label' => 'Codice d\'acquisto',
      'purchase_code_placeholder' => 'Codice d\'acquisto o chiave di licenza',
      'root_url_label' => 'URL radice',
      'root_url_placeholder' => 'URL ROOT (senza / alla fine)',
    ),
  ),
  'install' => 'Installare',
  'verified' => 'La licenza è stata verificata correttamente.',
  'verification_failed' => 'Verifica della licenza non riuscita!',
  'installed' => 
  array (
    'success_log_message' => 'Programma di installazione zCart INSTALLATO correttamente su',
  ),
  'final' => 
  array (
    'title' => 'Passo finale',
    'templateTitle' => 'Passo finale',
    'finished' => 'L\'applicazione è stata installata correttamente.',
    'migration' => 'Output della Console di migrazione e seed:',
    'console' => 'Uscita console applicazione:',
    'log' => 'Voce del registro di installazione:',
    'env' => 'File .env finale:',
    'exit' => 'Clicca qui per accedere',
    'import_demo_data' => 'Importa dati dimostrativi',
  ),
  'updater' => 
  array (
    'title' => 'zCart Updater',
    'welcome' => 
    array (
      'title' => 'Benvenuti nel programma di aggiornamento',
      'message' => 'Benvenuto nella procedura guidata di aggiornamento.',
    ),
    'overview' => 
    array (
      'title' => 'Panoramica',
      'message' => 'C\'è un aggiornamento 1. Ci sono aggiornamenti :number.',
      'install_updates' => 'Installare aggiornamenti',
    ),
    'final' => 
    array (
      'title' => 'Finito',
      'finished' => 'Il database dell\'applicazione è stato aggiornato correttamente.',
      'exit' => 'Clicca qui per uscire',
    ),
    'log' => 
    array (
      'success_message' => 'zCart Installer correttamente AGGIORNATO su',
    ),
  ),
);