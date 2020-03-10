<?php 
return array (
  'title' => 'zCart المثبت',
  'next' => 'الخطوة التالية',
  'back' => 'سابق',
  'finish' => 'التثبت',
  'forms' => 
  array (
    'errorTitle' => 'وقعت الأخطاء التالية:',
  ),
  'wait' => 'يرجى الانتظار ، قد يستغرق التثبيت بضع دقائق.',
  'welcome' => 
  array (
    'templateTitle' => 'أهلا بك',
    'title' => 'zCart المثبت',
    'message' => 'سهل التثبيت والإعداد معالج.',
    'next' => 'تحقق المتطلبات',
  ),
  'requirements' => 
  array (
    'templateTitle' => 'الخطوة 1 | متطلبات الخادم',
    'title' => 'متطلبات الخادم',
    'next' => 'تحقق أذونات',
    'required' => 'تحتاج إلى تعيين جميع متطلبات الخادم للمتابعة',
  ),
  'permissions' => 
  array (
    'templateTitle' => 'الخطوة 2 | أذونات',
    'title' => 'أذونات',
    'next' => 'تكوين البيئة',
    'required' => 'اضبط الأذونات كما هو مطلوب للمتابعة. قراءة الوثيقة. للمساعدة.',
  ),
  'environment' => 
  array (
    'menu' => 
    array (
      'templateTitle' => 'الخطوة 3 | إعدادات البيئة',
      'title' => 'إعدادات البيئة',
      'desc' => 'يرجى تحديد الطريقة التي تريد تكوين ملف التطبيقات <code> .env </code> بها.',
      'wizard-button' => 'إعداد معالج النماذج',
      'classic-button' => 'محرر النص الكلاسيكي',
    ),
    'wizard' => 
    array (
      'templateTitle' => 'الخطوة 3 | إعدادات البيئة | معالج إرشادي',
      'title' => 'دليل <code> .env </code>',
      'tabs' => 
      array (
        'environment' => 'بيئة',
        'database' => 'قاعدة البيانات',
        'application' => 'الوضعية',
      ),
      'form' => 
      array (
        'name_required' => 'اسم بيئة مطلوب.',
        'app_name_label' => 'اسم التطبيق',
        'app_name_placeholder' => 'اسم التطبيق',
        'app_environment_label' => 'بيئة التطبيق',
        'app_environment_label_local' => 'محلي',
        'app_environment_label_developement' => 'تطوير',
        'app_environment_label_qa' => 'سؤال وجواب',
        'app_environment_label_production' => 'إنتاج',
        'app_environment_label_other' => 'آخر',
        'app_environment_placeholder_other' => 'أدخل بيئتك ...',
        'app_debug_label' => 'تصحيح التطبيق',
        'app_debug_label_true' => 'صحيح',
        'app_debug_label_false' => 'خاطئة',
        'app_log_level_label' => 'مستوى سجل التطبيق',
        'app_log_level_label_debug' => 'التصحيح',
        'app_log_level_label_info' => 'معلومات',
        'app_log_level_label_notice' => 'تنويه',
        'app_log_level_label_warning' => 'تحذير',
        'app_log_level_label_error' => 'خطأ',
        'app_log_level_label_critical' => 'حرج',
        'app_log_level_label_alert' => 'محزر',
        'app_log_level_label_emergency' => 'حالة طوارئ',
        'app_url_label' => 'التطبيق Url',
        'app_url_placeholder' => 'التطبيق Url',
        'db_connection_failed' => 'لا يمكن الاتصال بقاعدة البيانات. تحقق من التكوينات.',
        'db_connection_label' => 'اتصال قاعدة البيانات',
        'db_connection_label_mysql' => 'ك',
        'db_connection_label_sqlite' => 'سكليتي',
        'db_connection_label_pgsql' => 'pgsql',
        'db_connection_label_sqlsrv' => 'sqlsrv',
        'db_host_label' => 'قاعدة بيانات المضيف',
        'db_host_placeholder' => 'قاعدة بيانات المضيف',
        'db_port_label' => 'ميناء قاعدة البيانات',
        'db_port_placeholder' => 'ميناء قاعدة البيانات',
        'db_name_label' => 'اسم قاعدة البيانات',
        'db_name_placeholder' => 'اسم قاعدة البيانات',
        'db_username_label' => 'اسم مستخدم قاعدة البيانات',
        'db_username_placeholder' => 'اسم مستخدم قاعدة البيانات',
        'db_password_label' => 'كلمة مرور قاعدة البيانات',
        'db_password_placeholder' => 'كلمة مرور قاعدة البيانات',
        'app_tabs' => 
        array (
          'more_info' => 'مزيد من المعلومات',
          'broadcasting_title' => 'البث و التخزين المؤقت و الجلسة و قائمة الانتظار',
          'broadcasting_label' => 'سائق البث',
          'broadcasting_placeholder' => 'سائق البث',
          'cache_label' => 'سائق الكاش',
          'cache_placeholder' => 'سائق الكاش',
          'session_label' => 'سائق الدورة',
          'session_placeholder' => 'سائق الدورة',
          'queue_label' => 'سائق قائمة الانتظار',
          'queue_placeholder' => 'سائق قائمة الانتظار',
          'redis_label' => 'سائق Redis',
          'redis_host' => 'Redis Host',
          'redis_password' => 'كلمة المرور Redis',
          'redis_port' => 'ميناء Redis',
          'mail_label' => 'بريد',
          'mail_driver_label' => 'سائق البريد',
          'mail_driver_placeholder' => 'سائق البريد',
          'mail_host_label' => 'مضيف البريد',
          'mail_host_placeholder' => 'مضيف البريد',
          'mail_port_label' => 'ميناء البريد',
          'mail_port_placeholder' => 'ميناء البريد',
          'mail_username_label' => 'البريد اسم المستخدم',
          'mail_username_placeholder' => 'البريد اسم المستخدم',
          'mail_password_label' => 'بريد كلمة المرور',
          'mail_password_placeholder' => 'بريد كلمة المرور',
          'mail_encryption_label' => 'تشفير البريد',
          'mail_encryption_placeholder' => 'تشفير البريد',
          'pusher_label' => 'انتهازي',
          'pusher_app_id_label' => 'معرف التطبيق انتهازي',
          'pusher_app_id_palceholder' => 'معرف التطبيق انتهازي',
          'pusher_app_key_label' => 'تاجر مخدرات مفتاح التطبيق',
          'pusher_app_key_palceholder' => 'تاجر مخدرات مفتاح التطبيق',
          'pusher_app_secret_label' => 'انتهازي سر التطبيق',
          'pusher_app_secret_palceholder' => 'انتهازي سر التطبيق',
        ),
        'buttons' => 
        array (
          'setup_database' => 'إعداد قاعدة البيانات',
          'setup_application' => 'تطبيق الإعداد',
          'install' => 'التثبت',
        ),
      ),
    ),
    'classic' => 
    array (
      'backup' => 'لتجنب أي فوضى ، يرجى نسخ وحفظ التكوينات الافتراضية في مكان آخر قبل إجراء أي تغييرات.',
      'templateTitle' => 'الخطوة 3 | إعدادات البيئة | محرر كلاسيكي',
      'title' => 'محرر ملف البيئة',
      'save' => 'حفظ التكوينات',
      'back' => 'استخدم معالج النماذج',
      'install' => 'التثبت',
      'required' => 'إصلاح المشكلة للمتابعة.',
    ),
    'success' => 'تم حفظ إعدادات ملف .env الخاص بك.',
    'errors' => 'غير قادر على حفظ ملف .env ، يرجى إنشائه يدويًا.',
  ),
  'verify' => 
  array (
    'verify_purchase' => 'تحقق من الشراء',
    'submit' => 'خضع',
    'form' => 
    array (
      'email_address_label' => 'عنوان البريد الإلكتروني',
      'email_address_placeholder' => 'عنوان البريد الإلكتروني',
      'purchase_code_label' => 'كود شراء',
      'purchase_code_placeholder' => 'رمز الشراء أو مفتاح الترخيص',
      'root_url_label' => 'عنوان الجذر',
      'root_url_placeholder' => 'عنوان URL للجذر (بدون / في النهاية)',
    ),
  ),
  'install' => 'التثبت',
  'verified' => 'تم التحقق من الرخصة بنجاح.',
  'verification_failed' => 'فشل التحقق من الترخيص!',
  'installed' => 
  array (
    'success_log_message' => 'تم تثبيت zCart Installer بنجاح على',
  ),
  'final' => 
  array (
    'title' => 'الخطوة النهائية',
    'templateTitle' => 'الخطوة النهائية',
    'finished' => 'تم تثبيت التطبيق بنجاح.',
    'migration' => 'إخراج وحدة التحكم في الترحيل والبذور:',
    'console' => 'إخراج وحدة التحكم في التطبيق:',
    'log' => 'إدخال سجل التثبيت:',
    'env' => 'ملف .env النهائي:',
    'exit' => 'انقر هنا لتسجيل الدخول',
    'import_demo_data' => 'استيراد البيانات التجريبية',
  ),
  'updater' => 
  array (
    'title' => 'zCart محدث',
    'welcome' => 
    array (
      'title' => 'مرحبا بكم في المحدث',
      'message' => 'مرحبًا بك في معالج التحديث.',
    ),
    'overview' => 
    array (
      'title' => 'نظرة عامة',
      'message' => 'يوجد تحديث واحد. | توجد تحديثات :number.',
      'install_updates' => 'تثبيت التحديثات',
    ),
    'final' => 
    array (
      'title' => 'تم الانتهاء من',
      'finished' => 'تم تحديث قاعدة بيانات التطبيق بنجاح.',
      'exit' => 'انقر هنا للخروج',
    ),
    'log' => 
    array (
      'success_message' => 'تم تحديث zCart Installer بنجاح على',
    ),
  ),
);