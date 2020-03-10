<?php 
return array (
  'title' => 'zCart इंस्टॉलर',
  'next' => 'अगला कदम',
  'back' => 'पिछला',
  'finish' => 'इंस्टॉल करें',
  'forms' => 
  array (
    'errorTitle' => 'निम्नलिखित त्रुटियां हुई:',
  ),
  'wait' => 'कृपया प्रतीक्षा करें, स्थापना में कुछ मिनट लग सकते हैं।',
  'welcome' => 
  array (
    'templateTitle' => 'स्वागत हे',
    'title' => 'zCart इंस्टॉलर',
    'message' => 'आसान स्थापना और सेटअप विज़ार्ड।',
    'next' => 'आवश्यकताओं की जाँच करें',
  ),
  'requirements' => 
  array (
    'templateTitle' => 'चरण 1 | सर्वर आवश्यकताएँ',
    'title' => 'सर्वर आवश्यकताएँ',
    'next' => 'अनुमतियाँ जांचें',
    'required' => 'जारी रखने के लिए सभी सर्वर आवश्यकताओं को सेट करने की आवश्यकता है',
  ),
  'permissions' => 
  array (
    'templateTitle' => 'चरण 2 | अनुमतियां',
    'title' => 'अनुमतियां',
    'next' => 'पर्यावरण को कॉन्फ़िगर करें',
    'required' => 'जारी रखने के लिए आवश्यकतानुसार अनुमतियाँ निर्धारित करें। डॉक्टर पढ़ें। मदद के लिए।',
  ),
  'environment' => 
  array (
    'menu' => 
    array (
      'templateTitle' => 'चरण 3 | पर्यावरण सेटिंग्स',
      'title' => 'पर्यावरण सेटिंग्स',
      'desc' => 'कृपया चुनें कि आप ऐप्स को कैसे कॉन्फ़िगर करना चाहते हैं <code> .env </ code> फ़ाइल।',
      'wizard-button' => 'प्रपत्र विज़ार्ड सेटअप',
      'classic-button' => 'क्लासिक पाठ संपादक',
    ),
    'wizard' => 
    array (
      'templateTitle' => 'चरण 3 | पर्यावरण सेटिंग्स | निर्देशित जादूगर',
      'title' => 'निर्देशित <code> .env </ code> विज़ार्ड',
      'tabs' => 
      array (
        'environment' => 'वातावरण',
        'database' => 'डेटाबेस',
        'application' => 'आवेदन',
      ),
      'form' => 
      array (
        'name_required' => 'एक पर्यावरण नाम की आवश्यकता है।',
        'app_name_label' => 'एप्लिकेशन का नाम',
        'app_name_placeholder' => 'एप्लिकेशन का नाम',
        'app_environment_label' => 'अनुप्रयोग पर्यावरण',
        'app_environment_label_local' => 'स्थानीय',
        'app_environment_label_developement' => 'विकास',
        'app_environment_label_qa' => 'क्यूए',
        'app_environment_label_production' => 'उत्पादन',
        'app_environment_label_other' => 'अन्य',
        'app_environment_placeholder_other' => 'अपना वातावरण दर्ज करें ...',
        'app_debug_label' => 'अनुप्रयोग डिबग',
        'app_debug_label_true' => 'सच',
        'app_debug_label_false' => 'असत्य',
        'app_log_level_label' => 'ऐप लॉग लेवल',
        'app_log_level_label_debug' => 'डिबग',
        'app_log_level_label_info' => 'जानकारी',
        'app_log_level_label_notice' => 'नोटिस',
        'app_log_level_label_warning' => 'चेतावनी',
        'app_log_level_label_error' => 'त्रुटि',
        'app_log_level_label_critical' => 'महत्वपूर्ण',
        'app_log_level_label_alert' => 'चेतावनी',
        'app_log_level_label_emergency' => 'आपातकालीन',
        'app_url_label' => 'App Url',
        'app_url_placeholder' => 'App Url',
        'db_connection_failed' => 'डेटाबेस के कनेक्ट नहीं कर सके। कॉन्फ़िगरेशन की जाँच करें।',
        'db_connection_label' => 'डेटाबेस कनेक्शन',
        'db_connection_label_mysql' => 'माई एसक्यूएल',
        'db_connection_label_sqlite' => 'SQLite',
        'db_connection_label_pgsql' => 'pgsql',
        'db_connection_label_sqlsrv' => 'sqlsrv',
        'db_host_label' => 'डेटाबेस होस्ट',
        'db_host_placeholder' => 'डेटाबेस होस्ट',
        'db_port_label' => 'डेटाबेस पोर्ट',
        'db_port_placeholder' => 'डेटाबेस पोर्ट',
        'db_name_label' => 'डेटाबेस नाम',
        'db_name_placeholder' => 'डेटाबेस नाम',
        'db_username_label' => 'डेटाबेस उपयोगकर्ता नाम',
        'db_username_placeholder' => 'डेटाबेस उपयोगकर्ता नाम',
        'db_password_label' => 'डेटाबेस पासवर्ड',
        'db_password_placeholder' => 'डेटाबेस पासवर्ड',
        'app_tabs' => 
        array (
          'more_info' => 'और जानकारी',
          'broadcasting_title' => 'प्रसारण, कैशिंग, सत्र, और कतार',
          'broadcasting_label' => 'प्रसारण चालक',
          'broadcasting_placeholder' => 'प्रसारण चालक',
          'cache_label' => 'कैश ड्राइवर',
          'cache_placeholder' => 'कैश ड्राइवर',
          'session_label' => 'सत्र चालक',
          'session_placeholder' => 'सत्र चालक',
          'queue_label' => 'कतार चालक',
          'queue_placeholder' => 'कतार चालक',
          'redis_label' => 'रेडिस चालक',
          'redis_host' => 'रेडिस होस्ट',
          'redis_password' => 'रेडिस पासवर्ड',
          'redis_port' => 'रेडिस पोर्ट',
          'mail_label' => 'मेल',
          'mail_driver_label' => 'मेल ड्राइवर',
          'mail_driver_placeholder' => 'मेल ड्राइवर',
          'mail_host_label' => 'मेल होस्ट',
          'mail_host_placeholder' => 'मेल होस्ट',
          'mail_port_label' => 'मेल पोर्ट',
          'mail_port_placeholder' => 'मेल पोर्ट',
          'mail_username_label' => 'मेल उपयोगकर्ता नाम',
          'mail_username_placeholder' => 'मेल उपयोगकर्ता नाम',
          'mail_password_label' => 'मेल पासवर्ड',
          'mail_password_placeholder' => 'मेल पासवर्ड',
          'mail_encryption_label' => 'मेल एन्क्रिप्शन',
          'mail_encryption_placeholder' => 'मेल एन्क्रिप्शन',
          'pusher_label' => 'ढकेलनेवाला',
          'pusher_app_id_label' => 'पुशर ऐप आईडी',
          'pusher_app_id_palceholder' => 'पुशर ऐप आईडी',
          'pusher_app_key_label' => 'पुशर ऐप की',
          'pusher_app_key_palceholder' => 'पुशर ऐप की',
          'pusher_app_secret_label' => 'पुशर ऐप सीक्रेट',
          'pusher_app_secret_palceholder' => 'पुशर ऐप सीक्रेट',
        ),
        'buttons' => 
        array (
          'setup_database' => 'सेटअप डेटाबेस',
          'setup_application' => 'सेटअप अनुप्रयोग',
          'install' => 'इंस्टॉल करें',
        ),
      ),
    ),
    'classic' => 
    array (
      'backup' => 'किसी भी गड़बड़ी से बचने के लिए कृपया कोई भी बदलाव करने से पहले डिफ़ॉल्ट कॉन्फ़िगरेशन को कहीं और कॉपी करें और सेव करें।',
      'templateTitle' => 'चरण 3 | पर्यावरण सेटिंग्स | क्लासिक संपादक',
      'title' => 'पर्यावरण फ़ाइल संपादक',
      'save' => 'कॉन्फ़िगरेशन को सहेजें',
      'back' => 'फ़ॉर्म विज़ार्ड का उपयोग करें',
      'install' => 'इंस्टॉल करें',
      'required' => 'जारी रखने के लिए समस्या को हल करें।',
    ),
    'success' => 'आपकी .env फ़ाइल सेटिंग्स सहेज ली गई हैं।',
    'errors' => '.Env फ़ाइल को सहेजने में असमर्थ, कृपया इसे मैन्युअल रूप से बनाएं।',
  ),
  'verify' => 
  array (
    'verify_purchase' => 'खरीद सत्यापित करें',
    'submit' => 'जमा करें',
    'form' => 
    array (
      'email_address_label' => 'ईमेल पता',
      'email_address_placeholder' => 'ईमेल पता',
      'purchase_code_label' => 'खरीद कोड',
      'purchase_code_placeholder' => 'खरीद कोड या लाइसेंस कुंजी',
      'root_url_label' => 'रूट उरल',
      'root_url_placeholder' => 'रूट URL (अंत में / बिना)',
    ),
  ),
  'install' => 'इंस्टॉल करें',
  'verified' => 'लाइसेंस सफलतापूर्वक सत्यापित किया गया है।',
  'verification_failed' => 'लाइसेंस सत्यापन विफल!',
  'installed' => 
  array (
    'success_log_message' => 'zCart इंस्टॉलर सफलतापूर्वक चालू है',
  ),
  'final' => 
  array (
    'title' => 'अंतिम चरण',
    'templateTitle' => 'अंतिम चरण',
    'finished' => 'आवेदन सफलतापूर्वक स्थापित किया गया है।',
    'migration' => 'माइग्रेशन और बीज कंसोल आउटपुट:',
    'console' => 'अनुप्रयोग कंसोल आउटपुट:',
    'log' => 'प्रवेश लॉग एंट्री:',
    'env' => 'अंतिम .env फ़ाइल:',
    'exit' => 'लॉग इन करने के लिए यहां क्लिक करें',
    'import_demo_data' => 'डेमो डेटा आयात करें',
  ),
  'updater' => 
  array (
    'title' => 'zCart अपडेटर',
    'welcome' => 
    array (
      'title' => 'अपडेटर में आपका स्वागत है',
      'message' => 'अद्यतन विज़ार्ड में आपका स्वागत है।',
    ),
    'overview' => 
    array (
      'title' => 'अवलोकन',
      'message' => '1 अद्यतन है। वहाँ :number अद्यतन कर रहे हैं।',
      'install_updates' => 'अद्यतनों को स्थापित करें',
    ),
    'final' => 
    array (
      'title' => 'ख़त्म होना',
      'finished' => 'एप्लिकेशन का डेटाबेस सफलतापूर्वक अपडेट कर दिया गया है।',
      'exit' => 'बाहर निकलने के लिए यहां क्लिक करें',
    ),
    'log' => 
    array (
      'success_message' => 'zCart इंस्टॉलर पर सफलतापूर्वक अद्यतन किया गया',
    ),
  ),
);