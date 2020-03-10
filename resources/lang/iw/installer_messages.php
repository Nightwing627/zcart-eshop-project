<?php 
return array (
  'title' => 'מתקין zCart',
  'next' => 'השלב הבא',
  'back' => 'קודם',
  'finish' => 'להתקין',
  'forms' => 
  array (
    'errorTitle' => 'השגיאות הבאות התרחשו:',
  ),
  'wait' => 'אנא המתן, ההתקנה עשויה לארוך מספר דקות.',
  'welcome' => 
  array (
    'templateTitle' => 'ברוך הבא',
    'title' => 'מתקין zCart',
    'message' => 'אשף התקנה והתקנה קל.',
    'next' => 'בדוק דרישות',
  ),
  'requirements' => 
  array (
    'templateTitle' => 'שלב 1 | דרישות שרת',
    'title' => 'דרישות שרת',
    'next' => 'בדוק הרשאות',
    'required' => 'צריך להגדיר את כל דרישות השרת כדי להמשיך',
  ),
  'permissions' => 
  array (
    'templateTitle' => 'שלב 2 | הרשאות',
    'title' => 'הרשאות',
    'next' => 'קבע את התצורה של הסביבה',
    'required' => 'הגדר את ההרשאות כנדרש כדי להמשיך. קרא את המסמך. לעזרה.',
  ),
  'environment' => 
  array (
    'menu' => 
    array (
      'templateTitle' => 'שלב 3 | הגדרות סביבה',
      'title' => 'הגדרות סביבה',
      'desc' => 'אנא בחר כיצד ברצונך להגדיר את קובץ ה- <code> .env </code> של היישומים.',
      'wizard-button' => 'הגדרת אשף הטפסים',
      'classic-button' => 'עורך טקסטים קלאסי',
    ),
    'wizard' => 
    array (
      'templateTitle' => 'שלב 3 | הגדרות סביבה | הקוסם המודרך',
      'title' => 'אשף <code> .env </code> מודרך',
      'tabs' => 
      array (
        'environment' => 'סביבה',
        'database' => 'מאגר מידע',
        'application' => 'יישום',
      ),
      'form' => 
      array (
        'name_required' => 'דרוש שם סביבה.',
        'app_name_label' => 'שם האפליקציה',
        'app_name_placeholder' => 'שם האפליקציה',
        'app_environment_label' => 'סביבת אפליקציות',
        'app_environment_label_local' => 'מקומי',
        'app_environment_label_developement' => 'התפתחות',
        'app_environment_label_qa' => 'Qa',
        'app_environment_label_production' => 'הפקה',
        'app_environment_label_other' => 'אחר',
        'app_environment_placeholder_other' => 'הכנס לסביבה שלך ...',
        'app_debug_label' => 'ניפוי באפליקציות',
        'app_debug_label_true' => 'נכון',
        'app_debug_label_false' => 'שקר',
        'app_log_level_label' => 'רמת יומן אפליקציות',
        'app_log_level_label_debug' => 'ניפוי באגים',
        'app_log_level_label_info' => 'מידע',
        'app_log_level_label_notice' => 'הודעה',
        'app_log_level_label_warning' => 'אזהרה',
        'app_log_level_label_error' => 'שגיאה',
        'app_log_level_label_critical' => 'קריטי',
        'app_log_level_label_alert' => 'ערני',
        'app_log_level_label_emergency' => 'חרום',
        'app_url_label' => 'כתובת אתר לאפליקציה',
        'app_url_placeholder' => 'כתובת אתר לאפליקציה',
        'db_connection_failed' => 'לא מצליח להתחבר למסד נתונים. בדוק את התצורות.',
        'db_connection_label' => 'חיבור מסד נתונים',
        'db_connection_label_mysql' => 'mysql',
        'db_connection_label_sqlite' => 'סקליט',
        'db_connection_label_pgsql' => 'pgsql',
        'db_connection_label_sqlsrv' => 'sqlsrv',
        'db_host_label' => 'מארח מסד נתונים',
        'db_host_placeholder' => 'מארח מסד נתונים',
        'db_port_label' => 'נמל מסד נתונים',
        'db_port_placeholder' => 'נמל מסד נתונים',
        'db_name_label' => 'שם בסיס הנתונים',
        'db_name_placeholder' => 'שם בסיס הנתונים',
        'db_username_label' => 'שם משתמש באתר',
        'db_username_placeholder' => 'שם משתמש באתר',
        'db_password_label' => 'סיסמת בסיס נתונים',
        'db_password_placeholder' => 'סיסמת בסיס נתונים',
        'app_tabs' => 
        array (
          'more_info' => 'עוד מידע',
          'broadcasting_title' => 'שידור, מטמון, מושב ותור',
          'broadcasting_label' => 'נהג שידור',
          'broadcasting_placeholder' => 'נהג שידור',
          'cache_label' => 'מנהל התקן מטמון',
          'cache_placeholder' => 'מנהל התקן מטמון',
          'session_label' => 'מנהל מושב',
          'session_placeholder' => 'מנהל מושב',
          'queue_label' => 'מנהל תור',
          'queue_placeholder' => 'מנהל תור',
          'redis_label' => 'Redis Driver',
          'redis_host' => 'מארח Redis',
          'redis_password' => 'סיסמה מחדש',
          'redis_port' => 'נמל רדיס',
          'mail_label' => 'דואר',
          'mail_driver_label' => 'מנהל דואר',
          'mail_driver_placeholder' => 'מנהל דואר',
          'mail_host_label' => 'מארח דואר',
          'mail_host_placeholder' => 'מארח דואר',
          'mail_port_label' => 'נמל דואר',
          'mail_port_placeholder' => 'נמל דואר',
          'mail_username_label' => 'שם משתמש בדואר',
          'mail_username_placeholder' => 'שם משתמש בדואר',
          'mail_password_label' => 'סיסמת דואר',
          'mail_password_placeholder' => 'סיסמת דואר',
          'mail_encryption_label' => 'הצפנת דואר',
          'mail_encryption_placeholder' => 'הצפנת דואר',
          'pusher_label' => 'דחף',
          'pusher_app_id_label' => 'מזהה אפליקציה של Pusher',
          'pusher_app_id_palceholder' => 'מזהה אפליקציה של Pusher',
          'pusher_app_key_label' => 'מפתח אפליקציית Pusher',
          'pusher_app_key_palceholder' => 'מפתח אפליקציית Pusher',
          'pusher_app_secret_label' => 'Pusher App Secret',
          'pusher_app_secret_palceholder' => 'Pusher App Secret',
        ),
        'buttons' => 
        array (
          'setup_database' => 'הגדרת מסד נתונים',
          'setup_application' => 'הגדרת יישום',
          'install' => 'להתקין',
        ),
      ),
    ),
    'classic' => 
    array (
      'backup' => 'כדי להימנע מכל בלגן אנא העתק ושמור את תצורות ברירת המחדל במקום אחר לפני שתבצע שינויים.',
      'templateTitle' => 'שלב 3 | הגדרות סביבה | עורך קלאסי',
      'title' => 'עורך קבצים לסביבה',
      'save' => 'שמור את התצורות',
      'back' => 'השתמש באשף הטפסים',
      'install' => 'להתקין',
      'required' => 'תקן את הבעיה כדי להמשיך.',
    ),
    'success' => 'הגדרות קובץ ה- .env שלך נשמרו.',
    'errors' => 'אין אפשרות לשמור את קובץ ה- .env, אנא צור אותו ידנית.',
  ),
  'verify' => 
  array (
    'verify_purchase' => 'אמת את הרכישה',
    'submit' => 'שלח',
    'form' => 
    array (
      'email_address_label' => 'כתובת דוא"ל',
      'email_address_placeholder' => 'כתובת דוא"ל',
      'purchase_code_label' => 'קוד רכישה',
      'purchase_code_placeholder' => 'קוד רכישה או מפתח רישיון',
      'root_url_label' => 'כתובת שורש',
      'root_url_placeholder' => 'ROOT URL (ללא / בסוף)',
    ),
  ),
  'install' => 'להתקין',
  'verified' => 'הרישיון אומת בהצלחה.',
  'verification_failed' => 'אימות הרישיון נכשל!',
  'installed' => 
  array (
    'success_log_message' => 'מתקין zCart הותקן בהצלחה',
  ),
  'final' => 
  array (
    'title' => 'צעד אחרון',
    'templateTitle' => 'צעד אחרון',
    'finished' => 'היישום הותקן בהצלחה.',
    'migration' => 'תפוקה והעברת קונסולת זרעים:',
    'console' => 'פלט מסוף היישום:',
    'log' => 'כניסת יומן התקנה:',
    'env' => 'קובץ .env סופי:',
    'exit' => 'לחץ כאן כדי להתחבר',
    'import_demo_data' => 'ייבא נתוני הדגמה',
  ),
  'updater' => 
  array (
    'title' => 'zCart Updater',
    'welcome' => 
    array (
      'title' => 'ברוך הבא לעדכן',
      'message' => 'ברוך הבא לאשף העדכונים.',
    ),
    'overview' => 
    array (
      'title' => 'סקירה כללית',
      'message' => 'יש עדכון אחד. | ישנם עדכוני :number.',
      'install_updates' => 'התקן עדכונים',
    ),
    'final' => 
    array (
      'title' => 'סיים',
      'finished' => 'בסיס הנתונים של היישום עודכן בהצלחה.',
      'exit' => 'לחץ כאן ליציאה',
    ),
    'log' => 
    array (
      'success_message' => 'מתקין zCart מעודכן בהצלחה',
    ),
  ),
);