<?php 
return array (
  'title' => 'zCart ইনস্টলার',
  'next' => 'পরবর্তী পর্ব',
  'back' => 'আগে',
  'finish' => 'ইনস্টল করুন',
  'forms' => 
  array (
    'errorTitle' => 'নিম্নলিখিত ত্রুটিগুলি ঘটেছে:',
  ),
  'wait' => 'দয়া করে অপেক্ষা করুন, ইনস্টলেশনটি কয়েক মিনিট সময় নিতে পারে।',
  'welcome' => 
  array (
    'templateTitle' => 'স্বাগত',
    'title' => 'zCart ইনস্টলার',
    'message' => 'সহজ ইনস্টলেশন এবং সেটআপ উইজার্ড।',
    'next' => 'প্রয়োজনীয়তা পরীক্ষা করুন',
  ),
  'requirements' => 
  array (
    'templateTitle' => 'পদক্ষেপ 1 | সার্ভার প্রয়োজনীয়তা',
    'title' => 'সার্ভার প্রয়োজনীয়তা',
    'next' => 'অনুমতি পরীক্ষা করুন',
    'required' => 'চালিয়ে যাওয়ার জন্য সমস্ত সার্ভারের প্রয়োজনীয়তা সেট করা দরকার',
  ),
  'permissions' => 
  array (
    'templateTitle' => 'পদক্ষেপ 2 | অনুমতিসমূহ',
    'title' => 'অনুমতিসমূহ',
    'next' => 'পরিবেশ কনফিগার করুন',
    'required' => 'চালিয়ে যাওয়ার জন্য প্রয়োজনীয় অনুমতিগুলি সেট করুন। ডক পড়ুন। সাহায্যের জন্য.',
  ),
  'environment' => 
  array (
    'menu' => 
    array (
      'templateTitle' => 'পদক্ষেপ 3 | পরিবেশের সেটিংস',
      'title' => 'পরিবেশের সেটিংস',
      'desc' => 'আপনি কীভাবে <code> .env </code> ফাইল অ্যাপ্লিকেশন কনফিগার করতে চান তা নির্বাচন করুন।',
      'wizard-button' => 'ফর্ম উইজার্ড সেটআপ',
      'classic-button' => 'ক্লাসিক পাঠ্য সম্পাদক',
    ),
    'wizard' => 
    array (
      'templateTitle' => 'পদক্ষেপ 3 | পরিবেশের সেটিংস | গাইডেড উইজার্ড',
      'title' => 'গাইডড <কোড> .এনভি </ কোড> উইজার্ড',
      'tabs' => 
      array (
        'environment' => 'পরিবেশ',
        'database' => 'ডেটাবেস',
        'application' => 'আবেদন',
      ),
      'form' => 
      array (
        'name_required' => 'একটি পরিবেশের নাম প্রয়োজন।',
        'app_name_label' => 'অ্যাপ্লিকেশন নাম',
        'app_name_placeholder' => 'অ্যাপ্লিকেশন নাম',
        'app_environment_label' => 'অ্যাপ্লিকেশন পরিবেশ',
        'app_environment_label_local' => 'স্থানীয়',
        'app_environment_label_developement' => 'উন্নয়ন',
        'app_environment_label_qa' => 'QA',
        'app_environment_label_production' => 'উত্পাদনের',
        'app_environment_label_other' => 'অন্যান্য',
        'app_environment_placeholder_other' => 'আপনার পরিবেশ প্রবেশ করান ...',
        'app_debug_label' => 'অ্যাপ ডিবাগ',
        'app_debug_label_true' => 'সত্য',
        'app_debug_label_false' => 'মিথ্যা',
        'app_log_level_label' => 'অ্যাপ লগ স্তর',
        'app_log_level_label_debug' => 'ডেবাগ্ করা',
        'app_log_level_label_info' => 'তথ্য',
        'app_log_level_label_notice' => 'বিজ্ঞপ্তি',
        'app_log_level_label_warning' => 'সাবধানবাণী',
        'app_log_level_label_error' => 'এরর',
        'app_log_level_label_critical' => 'সংকটপূর্ণ',
        'app_log_level_label_alert' => 'সতর্ক',
        'app_log_level_label_emergency' => 'জরুরি অবস্থা',
        'app_url_label' => 'অ্যাপ্লিকেশন url',
        'app_url_placeholder' => 'অ্যাপ্লিকেশন url',
        'db_connection_failed' => 'ডাটাবেসের সাথে সংযোগ করা যায়নি। কনফিগারেশন পরীক্ষা করুন।',
        'db_connection_label' => 'ডাটাবেস সংযোগ',
        'db_connection_label_mysql' => 'মাইএসকিউএল',
        'db_connection_label_sqlite' => 'SQLite',
        'db_connection_label_pgsql' => 'pgsql',
        'db_connection_label_sqlsrv' => 'sqlsrv',
        'db_host_label' => 'ডাটাবেস হোস্ট',
        'db_host_placeholder' => 'ডাটাবেস হোস্ট',
        'db_port_label' => 'ডাটাবেস পোর্ট',
        'db_port_placeholder' => 'ডাটাবেস পোর্ট',
        'db_name_label' => 'ডাটাবেস নাম',
        'db_name_placeholder' => 'ডাটাবেস নাম',
        'db_username_label' => 'ডাটাবেস ব্যবহারকারীর নাম',
        'db_username_placeholder' => 'ডাটাবেস ব্যবহারকারীর নাম',
        'db_password_label' => 'ডাটাবেস পাসওয়ার্ড',
        'db_password_placeholder' => 'ডাটাবেস পাসওয়ার্ড',
        'app_tabs' => 
        array (
          'more_info' => 'অধিক তথ্য',
          'broadcasting_title' => 'সম্প্রচার, ক্যাশিং, অধিবেশন এবং সারি',
          'broadcasting_label' => 'ব্রডকাস্ট ড্রাইভার',
          'broadcasting_placeholder' => 'ব্রডকাস্ট ড্রাইভার',
          'cache_label' => 'ক্যাশে ড্রাইভার',
          'cache_placeholder' => 'ক্যাশে ড্রাইভার',
          'session_label' => 'সেশন ড্রাইভার',
          'session_placeholder' => 'সেশন ড্রাইভার',
          'queue_label' => 'ক্যু ড্রাইভার',
          'queue_placeholder' => 'ক্যু ড্রাইভার',
          'redis_label' => 'রেডিস ড্রাইভার',
          'redis_host' => 'রেডিস হোস্ট',
          'redis_password' => 'পুনরায় পাসওয়ার্ড',
          'redis_port' => 'রেডিস পোর্ট',
          'mail_label' => 'মেল',
          'mail_driver_label' => 'মেল ড্রাইভার',
          'mail_driver_placeholder' => 'মেল ড্রাইভার',
          'mail_host_label' => 'মেইল হোস্ট',
          'mail_host_placeholder' => 'মেইল হোস্ট',
          'mail_port_label' => 'মেল পোর্ট',
          'mail_port_placeholder' => 'মেল পোর্ট',
          'mail_username_label' => 'মেল ব্যবহারকারীর নাম',
          'mail_username_placeholder' => 'মেল ব্যবহারকারীর নাম',
          'mail_password_label' => 'মেল পাসওয়ার্ড',
          'mail_password_placeholder' => 'মেল পাসওয়ার্ড',
          'mail_encryption_label' => 'মেল এনক্রিপশন',
          'mail_encryption_placeholder' => 'মেল এনক্রিপশন',
          'pusher_label' => 'বিমানপোত',
          'pusher_app_id_label' => 'পুশার অ্যাপ আইডি',
          'pusher_app_id_palceholder' => 'পুশার অ্যাপ আইডি',
          'pusher_app_key_label' => 'পুশার অ্যাপ কী',
          'pusher_app_key_palceholder' => 'পুশার অ্যাপ কী',
          'pusher_app_secret_label' => 'পুশার অ্যাপ সিক্রেট',
          'pusher_app_secret_palceholder' => 'পুশার অ্যাপ সিক্রেট',
        ),
        'buttons' => 
        array (
          'setup_database' => 'সেটআপ ডাটাবেস',
          'setup_application' => 'সেটআপ অ্যাপ্লিকেশন',
          'install' => 'ইনস্টল করুন',
        ),
      ),
    ),
    'classic' => 
    array (
      'backup' => 'কোনও ঝামেলা এড়াতে দয়া করে আপনার কোনও পরিবর্তন করার আগে অন্য কোনও জায়গায় ডিফল্ট কনফিগারেশনগুলি অনুলিপি করুন এবং সংরক্ষণ করুন।',
      'templateTitle' => 'পদক্ষেপ 3 | পরিবেশের সেটিংস | ক্লাসিক সম্পাদক',
      'title' => 'পরিবেশ ফাইল সম্পাদক',
      'save' => 'কনফিগারেশন সংরক্ষণ করুন',
      'back' => 'ফর্ম উইজার্ড ব্যবহার করুন',
      'install' => 'ইনস্টল করুন',
      'required' => 'চালিয়ে যাওয়ার জন্য সমস্যাটি ঠিক করুন।',
    ),
    'success' => 'আপনার .env ফাইল সেটিংস সংরক্ষণ করা হয়েছে।',
    'errors' => '.Env ফাইলটি সংরক্ষণ করতে অক্ষম, দয়া করে এটি ম্যানুয়ালি তৈরি করুন।',
  ),
  'verify' => 
  array (
    'verify_purchase' => 'ক্রয় যাচাই করুন',
    'submit' => 'জমা দিন',
    'form' => 
    array (
      'email_address_label' => 'ইমেল ঠিকানা',
      'email_address_placeholder' => 'ইমেল ঠিকানা',
      'purchase_code_label' => 'ক্রয় কোড',
      'purchase_code_placeholder' => 'ক্রয় কোড বা লাইসেন্স কী',
      'root_url_label' => 'রুট url',
      'root_url_placeholder' => 'মূল ইউআরএল (শেষে / শেষে)',
    ),
  ),
  'install' => 'ইনস্টল করুন',
  'verified' => 'লাইসেন্স সফলভাবে যাচাই করা হয়েছে।',
  'verification_failed' => 'লাইসেন্স যাচাইকরণ ব্যর্থ!',
  'installed' => 
  array (
    'success_log_message' => 'zCart ইনস্টলার সফলভাবে ইনস্টল করা আছে',
  ),
  'final' => 
  array (
    'title' => 'শেষ ধাপ',
    'templateTitle' => 'শেষ ধাপ',
    'finished' => 'অ্যাপ্লিকেশন সফলভাবে ইনস্টল করা হয়েছে।',
    'migration' => 'মাইগ্রেশন এবং বীজ কনসোল আউটপুট:',
    'console' => 'অ্যাপ্লিকেশন কনসোল আউটপুট:',
    'log' => 'ইনস্টলেশন লগ এন্ট্রি:',
    'env' => 'ফাইনাল .env ফাইল:',
    'exit' => 'লগ - ইন করতে এখানে ক্লিক করুন',
    'import_demo_data' => 'ডেমো ডেটা আমদানি করুন',
  ),
  'updater' => 
  array (
    'title' => 'zCart আপডেটেটার',
    'welcome' => 
    array (
      'title' => 'দ্য আপডেটটারে স্বাগতম',
      'message' => 'আপডেট উইজার্ডে আপনাকে স্বাগতম।',
    ),
    'overview' => 
    array (
      'title' => 'সংক্ষিপ্ত বিবরণ',
      'message' => '1 টি আপডেট আছে | | এক্স 1 আপডেট রয়েছে।',
      'install_updates' => 'হালনাগাদ সংস্থাপন করুন',
    ),
    'final' => 
    array (
      'title' => 'সমাপ্ত',
      'finished' => 'অ্যাপ্লিকেশন এর ডাটাবেস সফলভাবে আপডেট করা হয়েছে।',
      'exit' => 'প্রস্থান করতে এখানে ক্লিক করুন',
    ),
    'log' => 
    array (
      'success_message' => 'zCart ইনস্টলার সফলভাবে UPDATED চালু',
    ),
  ),
);