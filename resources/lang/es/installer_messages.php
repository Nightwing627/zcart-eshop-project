<?php 
return array (
  'title' => 'Instalador de zCart',
  'next' => 'Próximo paso',
  'back' => 'Anterior',
  'finish' => 'Instalar',
  'forms' => 
  array (
    'errorTitle' => 'Los siguientes errores ocurrieron:',
  ),
  'wait' => 'Espere, la instalación puede demorar unos minutos.',
  'welcome' => 
  array (
    'templateTitle' => 'Bienvenido',
    'title' => 'Instalador de zCart',
    'message' => 'Asistente de instalación y configuración fácil.',
    'next' => 'Consultar requisitos',
  ),
  'requirements' => 
  array (
    'templateTitle' => 'Paso 1 | Requerimientos del servidor',
    'title' => 'Requerimientos del servidor',
    'next' => 'Verificar permisos',
    'required' => 'Necesita establecer todos los requisitos del servidor para continuar',
  ),
  'permissions' => 
  array (
    'templateTitle' => 'Paso 2 | Permisos',
    'title' => 'Permisos',
    'next' => 'Configurar entorno',
    'required' => 'Establezca los permisos necesarios para continuar. Lee el documento. por ayuda',
  ),
  'environment' => 
  array (
    'menu' => 
    array (
      'templateTitle' => 'Paso 3 | Configuraciones de entorno',
      'title' => 'Configuraciones de entorno',
      'desc' => 'Seleccione cómo desea configurar el archivo de aplicaciones <code> .env </code>.',
      'wizard-button' => 'Configuración del asistente de formularios',
      'classic-button' => 'Editor de texto clásico',
    ),
    'wizard' => 
    array (
      'templateTitle' => 'Paso 3 | Configuración del entorno | Asistente Guiado',
      'title' => 'Asistente <code> .env </code> guiado',
      'tabs' => 
      array (
        'environment' => 'Medio ambiente',
        'database' => 'Base de datos',
        'application' => 'Solicitud',
      ),
      'form' => 
      array (
        'name_required' => 'Se requiere un nombre de entorno.',
        'app_name_label' => 'Nombre de la aplicación',
        'app_name_placeholder' => 'Nombre de la aplicación',
        'app_environment_label' => 'Entorno de aplicación',
        'app_environment_label_local' => 'Local',
        'app_environment_label_developement' => 'Desarrollo',
        'app_environment_label_qa' => 'Qa',
        'app_environment_label_production' => 'Producción',
        'app_environment_label_other' => 'Otro',
        'app_environment_placeholder_other' => 'Entra en tu entorno ...',
        'app_debug_label' => 'Depuración de aplicaciones',
        'app_debug_label_true' => 'Cierto',
        'app_debug_label_false' => 'Falso',
        'app_log_level_label' => 'Nivel de registro de la aplicación',
        'app_log_level_label_debug' => 'depurar',
        'app_log_level_label_info' => 'informacion',
        'app_log_level_label_notice' => 'aviso',
        'app_log_level_label_warning' => 'advertencia',
        'app_log_level_label_error' => 'error',
        'app_log_level_label_critical' => 'crítico',
        'app_log_level_label_alert' => 'alerta',
        'app_log_level_label_emergency' => 'emergencia',
        'app_url_label' => 'URL de la aplicación',
        'app_url_placeholder' => 'URL de la aplicación',
        'db_connection_failed' => 'No se pudo conectar a la base de datos. Verifique las configuraciones.',
        'db_connection_label' => 'Conexión de base de datos',
        'db_connection_label_mysql' => 'mysql',
        'db_connection_label_sqlite' => 'sqlite',
        'db_connection_label_pgsql' => 'pgsql',
        'db_connection_label_sqlsrv' => 'sqlsrv',
        'db_host_label' => 'Host de base de datos',
        'db_host_placeholder' => 'Host de base de datos',
        'db_port_label' => 'Puerto de base de datos',
        'db_port_placeholder' => 'Puerto de base de datos',
        'db_name_label' => 'Nombre de la base de datos',
        'db_name_placeholder' => 'Nombre de la base de datos',
        'db_username_label' => 'Nombre de usuario de la base de datos',
        'db_username_placeholder' => 'Nombre de usuario de la base de datos',
        'db_password_label' => 'Contraseña de base de datos',
        'db_password_placeholder' => 'Contraseña de base de datos',
        'app_tabs' => 
        array (
          'more_info' => 'Más información',
          'broadcasting_title' => 'Difusión, almacenamiento en caché, sesión y cola',
          'broadcasting_label' => 'Controlador de transmisión',
          'broadcasting_placeholder' => 'Controlador de transmisión',
          'cache_label' => 'Controlador de caché',
          'cache_placeholder' => 'Controlador de caché',
          'session_label' => 'Conductor de sesión',
          'session_placeholder' => 'Conductor de sesión',
          'queue_label' => 'Conductor de cola',
          'queue_placeholder' => 'Conductor de cola',
          'redis_label' => 'Redis Driver',
          'redis_host' => 'Redis Host',
          'redis_password' => 'Redis Password',
          'redis_port' => 'Puerto Redis',
          'mail_label' => 'Correo',
          'mail_driver_label' => 'Conductor de correo',
          'mail_driver_placeholder' => 'Conductor de correo',
          'mail_host_label' => 'Host de correo',
          'mail_host_placeholder' => 'Host de correo',
          'mail_port_label' => 'Puerto de correo',
          'mail_port_placeholder' => 'Puerto de correo',
          'mail_username_label' => 'Nombre de usuario de correo',
          'mail_username_placeholder' => 'Nombre de usuario de correo',
          'mail_password_label' => 'Contraseña de correo',
          'mail_password_placeholder' => 'Contraseña de correo',
          'mail_encryption_label' => 'Cifrado de correo',
          'mail_encryption_placeholder' => 'Cifrado de correo',
          'pusher_label' => 'Arribista',
          'pusher_app_id_label' => 'ID de la aplicación Pusher',
          'pusher_app_id_palceholder' => 'ID de la aplicación Pusher',
          'pusher_app_key_label' => 'Pusher App Key',
          'pusher_app_key_palceholder' => 'Pusher App Key',
          'pusher_app_secret_label' => 'Pusher App Secret',
          'pusher_app_secret_palceholder' => 'Pusher App Secret',
        ),
        'buttons' => 
        array (
          'setup_database' => 'Configurar base de datos',
          'setup_application' => 'Aplicación de configuración',
          'install' => 'Instalar',
        ),
      ),
    ),
    'classic' => 
    array (
      'backup' => 'Para evitar cualquier desorden, copie y guarde las configuraciones predeterminadas en otro lugar antes de realizar cualquier cambio.',
      'templateTitle' => 'Paso 3 | Configuración del entorno | Editor clásico',
      'title' => 'Editor de archivos de entorno',
      'save' => 'Guardar las configuraciones',
      'back' => 'Usar el asistente de formularios',
      'install' => 'Instalar',
      'required' => 'Solucione el problema para continuar.',
    ),
    'success' => 'Su configuración de archivo .env se ha guardado.',
    'errors' => 'No se puede guardar el archivo .env. Créelo manualmente.',
  ),
  'verify' => 
  array (
    'verify_purchase' => 'Verificar compra',
    'submit' => 'Enviar',
    'form' => 
    array (
      'email_address_label' => 'Dirección de correo electrónico',
      'email_address_placeholder' => 'Dirección de correo electrónico',
      'purchase_code_label' => 'Código de compra',
      'purchase_code_placeholder' => 'Código de compra o clave de licencia',
      'root_url_label' => 'URL de raíz',
      'root_url_placeholder' => 'URL ROOT (sin / al final)',
    ),
  ),
  'install' => 'Instalar',
  'verified' => 'La licencia ha sido verificada con éxito.',
  'verification_failed' => '¡Verificación de licencia fallida!',
  'installed' => 
  array (
    'success_log_message' => 'El instalador de zCart se instaló correctamente en',
  ),
  'final' => 
  array (
    'title' => 'Último paso',
    'templateTitle' => 'Último paso',
    'finished' => 'La aplicación se ha instalado correctamente.',
    'migration' => 'Salida de la consola de migración y semilla:',
    'console' => 'Salida de la consola de aplicaciones:',
    'log' => 'Entrada del registro de instalación:',
    'env' => 'Archivo final .env:',
    'exit' => 'Haga clic aquí para ingresar',
    'import_demo_data' => 'Importar datos de demostración',
  ),
  'updater' => 
  array (
    'title' => 'Actualizador de zCart',
    'welcome' => 
    array (
      'title' => 'Bienvenido al actualizador',
      'message' => 'Bienvenido al asistente de actualización.',
    ),
    'overview' => 
    array (
      'title' => 'Visión general',
      'message' => 'Hay 1 actualización. | Hay actualizaciones :number.',
      'install_updates' => 'Instalar actualizaciones',
    ),
    'final' => 
    array (
      'title' => 'Terminado',
      'finished' => 'La base de datos de la aplicación se ha actualizado correctamente.',
      'exit' => 'Haga clic aquí para salir.',
    ),
    'log' => 
    array (
      'success_message' => 'El instalador de zCart se actualizó correctamente en',
    ),
  ),
);