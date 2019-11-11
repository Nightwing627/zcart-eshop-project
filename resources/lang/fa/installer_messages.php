<?php 
return array (
  'title' => 'نصب کننده zCart',
  'next' => 'گام بعدی',
  'back' => 'قبلی',
  'finish' => 'نصب',
  'forms' => 
  array (
    'errorTitle' => 'خطاهای زیر رخ داده است:',
  ),
  'wait' => 'لطفاً صبر کنید ، نصب ممکن است چند دقیقه طول بکشد.',
  'welcome' => 
  array (
    'templateTitle' => 'خوش آمدی',
    'title' => 'نصب کننده zCart',
    'message' => 'جادوگر نصب و راه اندازی آسان.',
    'next' => 'الزامات را بررسی کنید',
  ),
  'requirements' => 
  array (
    'templateTitle' => 'مرحله 1 | نیازمندی های سرور',
    'title' => 'نیازمندی های سرور',
    'next' => 'مجوزها را بررسی کنید',
    'required' => 'برای ادامه باید کلیه نیازهای سرور را تنظیم کنید',
  ),
  'permissions' => 
  array (
    'templateTitle' => 'مرحله 2 | مجوزها',
    'title' => 'مجوزها',
    'next' => 'پیکربندی محیط',
    'required' => 'مجوزها را برای ادامه کار تنظیم کنید. متن را بخوانید. برای کمک.',
  ),
  'environment' => 
  array (
    'menu' => 
    array (
      'templateTitle' => 'مرحله 3 | تنظیمات محیط',
      'title' => 'تنظیمات محیط',
      'desc' => 'لطفا نحوه پیکربندی پرونده برنامه <code> .env </code> را انتخاب کنید.',
      'wizard-button' => 'Wizard Setup را تنظیم کنید',
      'classic-button' => 'ویرایشگر متن کلاسیک',
    ),
    'wizard' => 
    array (
      'templateTitle' => 'مرحله 3 | تنظیمات محیط | جادوگر راهنما',
      'title' => 'راهنمای <code> .env </code> جادوگر',
      'tabs' => 
      array (
        'environment' => 'محیط',
        'database' => 'بانک اطلاعات',
        'application' => 'کاربرد',
      ),
      'form' => 
      array (
        'name_required' => 'یک نام محیطی لازم است',
        'app_name_label' => 'نام نرم افزار',
        'app_name_placeholder' => 'نام نرم افزار',
        'app_environment_label' => 'محیط برنامه',
        'app_environment_label_local' => 'محلی',
        'app_environment_label_developement' => 'توسعه',
        'app_environment_label_qa' => 'قائم',
        'app_environment_label_production' => 'تولید',
        'app_environment_label_other' => 'دیگر',
        'app_environment_placeholder_other' => 'وارد محیط خود شوید ...',
        'app_debug_label' => 'اشکال زدایی برنامه',
        'app_debug_label_true' => 'درست است',
        'app_debug_label_false' => 'غلط',
        'app_log_level_label' => 'سطح ورود به برنامه',
        'app_log_level_label_debug' => 'اشکال زدایی',
        'app_log_level_label_info' => 'اطلاعات',
        'app_log_level_label_notice' => 'اطلاع',
        'app_log_level_label_warning' => 'هشدار',
        'app_log_level_label_error' => 'خطا',
        'app_log_level_label_critical' => 'بحرانی',
        'app_log_level_label_alert' => 'هشدار',
        'app_log_level_label_emergency' => 'اضطراری',
        'app_url_label' => 'آدرس اینترنتی',
        'app_url_placeholder' => 'آدرس اینترنتی',
        'db_connection_failed' => 'اتصال به پایگاه داده امکان پذیر نیست. تنظیمات را بررسی کنید.',
        'db_connection_label' => 'اتصال به بانک اطلاعاتی',
        'db_connection_label_mysql' => 'mysql',
        'db_connection_label_sqlite' => 'sqlite',
        'db_connection_label_pgsql' => 'pgsql',
        'db_connection_label_sqlsrv' => 'sqlsrv',
        'db_host_label' => 'میزبان پایگاه داده',
        'db_host_placeholder' => 'میزبان پایگاه داده',
        'db_port_label' => 'درگاه پایگاه داده',
        'db_port_placeholder' => 'درگاه پایگاه داده',
        'db_name_label' => 'نام پایگاه داده',
        'db_name_placeholder' => 'نام پایگاه داده',
        'db_username_label' => 'نام کاربر پایگاه داده',
        'db_username_placeholder' => 'نام کاربر پایگاه داده',
        'db_password_label' => 'رمز عبور پایگاه داده',
        'db_password_placeholder' => 'رمز عبور پایگاه داده',
        'app_tabs' => 
        array (
          'more_info' => 'اطلاعات بیشتر',
          'broadcasting_title' => 'پخش ، ذخیره سازی ، جلسه و صف',
          'broadcasting_label' => 'درایور پخش',
          'broadcasting_placeholder' => 'درایور پخش',
          'cache_label' => 'درایور کش',
          'cache_placeholder' => 'درایور کش',
          'session_label' => 'راننده جلسه',
          'session_placeholder' => 'راننده جلسه',
          'queue_label' => 'درایور صف',
          'queue_placeholder' => 'درایور صف',
          'redis_label' => 'راننده Redis',
          'redis_host' => 'میزبان Redis',
          'redis_password' => 'دوباره رمز عبور',
          'redis_port' => 'بندر ردیس',
          'mail_label' => 'نامه',
          'mail_driver_label' => 'درایور پست الکترونیکی',
          'mail_driver_placeholder' => 'درایور پست الکترونیکی',
          'mail_host_label' => 'میزبان ایمیل',
          'mail_host_placeholder' => 'میزبان ایمیل',
          'mail_port_label' => 'پورت پستی',
          'mail_port_placeholder' => 'پورت پستی',
          'mail_username_label' => 'نام کاربری ایمیل',
          'mail_username_placeholder' => 'نام کاربری ایمیل',
          'mail_password_label' => 'رمز عبور ایمیل',
          'mail_password_placeholder' => 'رمز عبور ایمیل',
          'mail_encryption_label' => 'رمزگذاری نامه',
          'mail_encryption_placeholder' => 'رمزگذاری نامه',
          'pusher_label' => 'هل دادن',
          'pusher_app_id_label' => 'شناسه برنامه Pusher',
          'pusher_app_id_palceholder' => 'شناسه برنامه Pusher',
          'pusher_app_key_label' => 'کلید برنامه Pusher',
          'pusher_app_key_palceholder' => 'کلید برنامه Pusher',
          'pusher_app_secret_label' => 'راز برنامه مخفی',
          'pusher_app_secret_palceholder' => 'راز برنامه مخفی',
        ),
        'buttons' => 
        array (
          'setup_database' => 'پایگاه داده راه اندازی',
          'setup_application' => 'برنامه راه اندازی',
          'install' => 'نصب',
        ),
      ),
    ),
    'classic' => 
    array (
      'backup' => 'برای جلوگیری از هرگونه خرابکاری ، لطفاً تنظیمات پیش فرض را در جایی دیگر قبل از ایجاد هرگونه تغییر و کپی و ذخیره کنید.',
      'templateTitle' => 'مرحله 3 | تنظیمات محیط | ویرایشگر کلاسیک',
      'title' => 'ویرایشگر پرونده محیط',
      'save' => 'ذخیره تنظیمات',
      'back' => 'از Wizard Form استفاده کنید',
      'install' => 'نصب',
      'required' => 'برای ادامه مشکل را حل کنید.',
    ),
    'success' => 'تنظیمات پرونده .env شما ذخیره شده است.',
    'errors' => 'فایل .env قابل ذخیره نیست ، لطفاً آن را به صورت دستی ایجاد کنید.',
  ),
  'verify' => 
  array (
    'verify_purchase' => 'خرید را تأیید کنید',
    'submit' => 'ارسال',
    'form' => 
    array (
      'email_address_label' => 'آدرس ایمیل',
      'email_address_placeholder' => 'آدرس ایمیل',
      'purchase_code_label' => 'کد خرید',
      'purchase_code_placeholder' => 'کد خرید یا کلید مجوز',
      'root_url_label' => 'ریشه Url',
      'root_url_placeholder' => 'نشانی اینترنتی ROOT (بدون / در پایان)',
    ),
  ),
  'install' => 'نصب',
  'verified' => 'مجوز با موفقیت تأیید شد.',
  'verification_failed' => 'تأیید مجوز انجام نشد!',
  'installed' => 
  array (
    'success_log_message' => 'نصب کننده zCart با موفقیت نصب شد',
  ),
  'final' => 
  array (
    'title' => 'مرحله نهایی',
    'templateTitle' => 'مرحله نهایی',
    'finished' => 'برنامه با موفقیت نصب شده است.',
    'migration' => 'خروجی کنسول مهاجرت و بذر:',
    'console' => 'خروجی کنسول برنامه:',
    'log' => 'ورود به سیستم ورود به سیستم:',
    'env' => 'فایل نهایی .env:',
    'exit' => 'برای ورود اینجا کلیک کنید',
    'import_demo_data' => 'وارد کردن اطلاعات نسخه ی نمایشی',
  ),
  'updater' => 
  array (
    'title' => 'به روزرسانی zCart',
    'welcome' => 
    array (
      'title' => 'به بروزرسانی خوش آمدید',
      'message' => 'به جادوگر به روزرسانی خوش آمدید.',
    ),
    'overview' => 
    array (
      'title' => 'بررسی اجمالی',
      'message' => '1 بروزرسانی وجود دارد. | به روزرسانی :number وجود دارد.',
      'install_updates' => 'به روز رسانی ها را نصب کن',
    ),
    'final' => 
    array (
      'title' => 'تمام شده',
      'finished' => 'بانک اطلاعاتی برنامه با موفقیت به روز شد.',
      'exit' => 'برای خروج اینجا را کلیک کنید',
    ),
    'log' => 
    array (
      'success_message' => 'نصب کننده zCart با موفقیت به روز شد',
    ),
  ),
);