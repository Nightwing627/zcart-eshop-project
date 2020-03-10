<?php 
return array (
  'title' => 'zCart Installer',
  'next' => 'Nächster Schritt',
  'back' => 'Bisherige',
  'finish' => 'Installieren',
  'forms' => 
  array (
    'errorTitle' => 'Folgende Fehler sind aufgetreten:',
  ),
  'wait' => 'Bitte warten Sie, die Installation kann einige Minuten dauern.',
  'welcome' => 
  array (
    'templateTitle' => 'Herzlich willkommen',
    'title' => 'zCart Installer',
    'message' => 'Einfacher Installations- und Einrichtungsassistent.',
    'next' => 'Überprüfen Sie die Anforderungen',
  ),
  'requirements' => 
  array (
    'templateTitle' => 'Schritt 1 | Serveranforderungen',
    'title' => 'Serveranforderungen',
    'next' => 'Überprüfen Sie die Berechtigungen',
    'required' => 'Sie müssen alle Serveranforderungen festlegen, um fortfahren zu können',
  ),
  'permissions' => 
  array (
    'templateTitle' => 'Schritt 2 | Berechtigungen',
    'title' => 'Berechtigungen',
    'next' => 'Umgebung konfigurieren',
    'required' => 'Stellen Sie die erforderlichen Berechtigungen ein, um fortzufahren. Lesen Sie das Dokument. für Hilfe.',
  ),
  'environment' => 
  array (
    'menu' => 
    array (
      'templateTitle' => 'Schritt 3 | Umgebungseinstellungen',
      'title' => 'Umgebungseinstellungen',
      'desc' => 'Wählen Sie aus, wie Sie die Datei apps <code> .env </ code> konfigurieren möchten.',
      'wizard-button' => 'Formularassistent einrichten',
      'classic-button' => 'Klassischer Texteditor',
    ),
    'wizard' => 
    array (
      'templateTitle' => 'Schritt 3 | Umgebungseinstellungen | Geführter Assistent',
      'title' => 'Geführter <code> .env </ code> Assistent',
      'tabs' => 
      array (
        'environment' => 'Umgebung',
        'database' => 'Datenbank',
        'application' => 'Anwendung',
      ),
      'form' => 
      array (
        'name_required' => 'Ein Umgebungsname ist erforderlich.',
        'app_name_label' => 'App Name',
        'app_name_placeholder' => 'App Name',
        'app_environment_label' => 'App-Umgebung',
        'app_environment_label_local' => 'Lokal',
        'app_environment_label_developement' => 'Entwicklung',
        'app_environment_label_qa' => 'Qa',
        'app_environment_label_production' => 'Produktion',
        'app_environment_label_other' => 'Andere',
        'app_environment_placeholder_other' => 'Betreten Sie Ihre Umgebung ...',
        'app_debug_label' => 'App-Debug',
        'app_debug_label_true' => 'Wahr',
        'app_debug_label_false' => 'Falsch',
        'app_log_level_label' => 'App Log Level',
        'app_log_level_label_debug' => 'debuggen',
        'app_log_level_label_info' => 'Info',
        'app_log_level_label_notice' => 'beachten',
        'app_log_level_label_warning' => 'Warnung',
        'app_log_level_label_error' => 'Error',
        'app_log_level_label_critical' => 'kritisch',
        'app_log_level_label_alert' => 'warnen',
        'app_log_level_label_emergency' => 'Notfall',
        'app_url_label' => 'App-URL',
        'app_url_placeholder' => 'App-URL',
        'db_connection_failed' => 'Verbindung mit der Datenbank fehlgeschlagen. Überprüfen Sie die Konfigurationen.',
        'db_connection_label' => 'Datenbankverbindung',
        'db_connection_label_mysql' => 'MySQL',
        'db_connection_label_sqlite' => 'SQLite',
        'db_connection_label_pgsql' => 'pgsql',
        'db_connection_label_sqlsrv' => 'sqlsrv',
        'db_host_label' => 'Datenbank-Host',
        'db_host_placeholder' => 'Datenbank-Host',
        'db_port_label' => 'Datenbank-Port',
        'db_port_placeholder' => 'Datenbank-Port',
        'db_name_label' => 'Name der Datenbank',
        'db_name_placeholder' => 'Name der Datenbank',
        'db_username_label' => 'Datenbank-Benutzername',
        'db_username_placeholder' => 'Datenbank-Benutzername',
        'db_password_label' => 'Datenbank-Passwort',
        'db_password_placeholder' => 'Datenbank-Passwort',
        'app_tabs' => 
        array (
          'more_info' => 'Mehr Info',
          'broadcasting_title' => 'Broadcasting, Caching, Sitzung und Warteschlange',
          'broadcasting_label' => 'Broadcast-Treiber',
          'broadcasting_placeholder' => 'Broadcast-Treiber',
          'cache_label' => 'Cache-Treiber',
          'cache_placeholder' => 'Cache-Treiber',
          'session_label' => 'Sitzungstreiber',
          'session_placeholder' => 'Sitzungstreiber',
          'queue_label' => 'Warteschlangentreiber',
          'queue_placeholder' => 'Warteschlangentreiber',
          'redis_label' => 'Redis Treiber',
          'redis_host' => 'Redis Host',
          'redis_password' => 'Passwort erneut eingeben',
          'redis_port' => 'Redis Port',
          'mail_label' => 'Mail',
          'mail_driver_label' => 'Mail-Treiber',
          'mail_driver_placeholder' => 'Mail-Treiber',
          'mail_host_label' => 'Mail-Host',
          'mail_host_placeholder' => 'Mail-Host',
          'mail_port_label' => 'Mail-Port',
          'mail_port_placeholder' => 'Mail-Port',
          'mail_username_label' => 'E-Mail-Benutzername',
          'mail_username_placeholder' => 'E-Mail-Benutzername',
          'mail_password_label' => 'E-Mail-Passwort',
          'mail_password_placeholder' => 'E-Mail-Passwort',
          'mail_encryption_label' => 'Mail-Verschlüsselung',
          'mail_encryption_placeholder' => 'Mail-Verschlüsselung',
          'pusher_label' => 'Pusher',
          'pusher_app_id_label' => 'Pusher App-ID',
          'pusher_app_id_palceholder' => 'Pusher App-ID',
          'pusher_app_key_label' => 'Pusher App Key',
          'pusher_app_key_palceholder' => 'Pusher App Key',
          'pusher_app_secret_label' => 'Drücker App Geheimnis',
          'pusher_app_secret_palceholder' => 'Drücker App Geheimnis',
        ),
        'buttons' => 
        array (
          'setup_database' => 'Datenbank einrichten',
          'setup_application' => 'Setup-Anwendung',
          'install' => 'Installieren',
        ),
      ),
    ),
    'classic' => 
    array (
      'backup' => 'Kopieren Sie die Standardkonfigurationen an eine andere Stelle, bevor Sie Änderungen vornehmen, um Unordnung zu vermeiden.',
      'templateTitle' => 'Schritt 3 | Umgebungseinstellungen | Klassischer Editor',
      'title' => 'Umgebungsdatei-Editor',
      'save' => 'Speichern Sie die Konfigurationen',
      'back' => 'Verwenden Sie den Formularassistenten',
      'install' => 'Installieren',
      'required' => 'Beheben Sie das Problem, um fortzufahren.',
    ),
    'success' => 'Ihre ENV-Dateieinstellungen wurden gespeichert.',
    'errors' => 'ENV-Datei kann nicht gespeichert werden. Erstellen Sie sie manuell.',
  ),
  'verify' => 
  array (
    'verify_purchase' => 'Kauf bestätigen',
    'submit' => 'einreichen',
    'form' => 
    array (
      'email_address_label' => 'E-Mail-Addresse',
      'email_address_placeholder' => 'E-Mail-Addresse',
      'purchase_code_label' => 'Bestellcode',
      'purchase_code_placeholder' => 'Kaufcode oder Lizenzschlüssel',
      'root_url_label' => 'Root-URL',
      'root_url_placeholder' => 'ROOT URL (ohne / am Ende)',
    ),
  ),
  'install' => 'Installieren',
  'verified' => 'Lizenz wurde erfolgreich verifiziert.',
  'verification_failed' => 'Lizenzbestätigung fehlgeschlagen!',
  'installed' => 
  array (
    'success_log_message' => 'zCart Installer wurde am erfolgreich installiert',
  ),
  'final' => 
  array (
    'title' => 'Letzter Schritt',
    'templateTitle' => 'Letzter Schritt',
    'finished' => 'Die Anwendung wurde erfolgreich installiert.',
    'migration' => 'Ausgabe von Migration und Seed Console:',
    'console' => 'Anwendungskonsolenausgabe:',
    'log' => 'Installationsprotokolleintrag:',
    'env' => 'Endgültige .env-Datei:',
    'exit' => 'Klicken Sie hier, um sich einzuloggen',
    'import_demo_data' => 'Demo-Daten importieren',
  ),
  'updater' => 
  array (
    'title' => 'zCart Updater',
    'welcome' => 
    array (
      'title' => 'Willkommen im Updater',
      'message' => 'Willkommen beim Update-Assistenten.',
    ),
    'overview' => 
    array (
      'title' => 'Überblick',
      'message' => 'Es gibt 1 Update. | Es gibt :number Updates.',
      'install_updates' => 'Installiere Updates',
    ),
    'final' => 
    array (
      'title' => 'Fertig',
      'finished' => 'Die Datenbank der Anwendung wurde erfolgreich aktualisiert.',
      'exit' => 'Klicken Sie hier, um den Vorgang zu beenden',
    ),
    'log' => 
    array (
      'success_message' => 'zCart Installer erfolgreich aktualisiert am',
    ),
  ),
);