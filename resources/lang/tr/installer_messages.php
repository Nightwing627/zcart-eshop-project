<?php 
return array (
  'title' => 'zCart Yükleyici',
  'next' => 'Sonraki adım',
  'back' => 'Önceki',
  'finish' => 'kurmak',
  'forms' => 
  array (
    'errorTitle' => 'Şu hatalar oluştu:',
  ),
  'wait' => 'Lütfen bekleyin, kurulum birkaç dakika sürebilir.',
  'welcome' => 
  array (
    'templateTitle' => 'Hoşgeldiniz',
    'title' => 'zCart Yükleyici',
    'message' => 'Kolay Kurulum ve Kurulum Sihirbazı.',
    'next' => 'Gereksinimleri Kontrol Et',
  ),
  'requirements' => 
  array (
    'templateTitle' => '1. Adım | Sunucu Gereksinimleri',
    'title' => 'Sunucu Gereksinimleri',
    'next' => 'İzinleri Kontrol Et',
    'required' => 'Devam etmek için tüm sunucu gereksinimlerini ayarlamanız gerekir.',
  ),
  'permissions' => 
  array (
    'templateTitle' => '2. Adım | İzinler',
    'title' => 'İzinler',
    'next' => 'Ortamı Yapılandır',
    'required' => 'Devam etmek için gerekli izinleri ayarlayın. Doktoru oku. yardım için.',
  ),
  'environment' => 
  array (
    'menu' => 
    array (
      'templateTitle' => '3. Adım | Çevre ayarları',
      'title' => 'Çevre ayarları',
      'desc' => 'Lütfen <code> .env </code> dosyasını nasıl yapılandırmak istediğinizi seçin.',
      'wizard-button' => 'Form Sihirbazı Kurulumu',
      'classic-button' => 'Klasik Metin Düzenleyicisi',
    ),
    'wizard' => 
    array (
      'templateTitle' => '3. Adım | Çevre Ayarları | Kılavuzlu Sihirbaz',
      'title' => 'Kılavuzlu <code> .env </code> Sihirbazı',
      'tabs' => 
      array (
        'environment' => 'çevre',
        'database' => 'Veritabanı',
        'application' => 'Uygulama',
      ),
      'form' => 
      array (
        'name_required' => 'Bir ortam adı gereklidir.',
        'app_name_label' => 'Uygulama ismi',
        'app_name_placeholder' => 'Uygulama ismi',
        'app_environment_label' => 'Uygulama Ortamı',
        'app_environment_label_local' => 'Yerel',
        'app_environment_label_developement' => 'gelişme',
        'app_environment_label_qa' => 'qa',
        'app_environment_label_production' => 'Üretim',
        'app_environment_label_other' => 'Diğer',
        'app_environment_placeholder_other' => 'Çevrenizi girin ...',
        'app_debug_label' => 'Uygulama Hata Ayıklama',
        'app_debug_label_true' => 'Doğru',
        'app_debug_label_false' => 'Yanlış',
        'app_log_level_label' => 'Uygulama Günlüğü Seviyesi',
        'app_log_level_label_debug' => 'ayıklama',
        'app_log_level_label_info' => 'bilgi',
        'app_log_level_label_notice' => 'ihbar',
        'app_log_level_label_warning' => 'uyarı',
        'app_log_level_label_error' => 'hata',
        'app_log_level_label_critical' => 'kritik',
        'app_log_level_label_alert' => 'Alarm',
        'app_log_level_label_emergency' => 'acil Durum',
        'app_url_label' => 'Uygulama URL\'si',
        'app_url_placeholder' => 'Uygulama URL\'si',
        'db_connection_failed' => 'Veritabanına bağlanılamadı. Konfigürasyonları kontrol et.',
        'db_connection_label' => 'Veri Tabanı Bağlantısı',
        'db_connection_label_mysql' => 'mySQL',
        'db_connection_label_sqlite' => 'sqlite',
        'db_connection_label_pgsql' => 'pgsql',
        'db_connection_label_sqlsrv' => 'sqlsrv',
        'db_host_label' => 'Veritabanı Sunucusu',
        'db_host_placeholder' => 'Veritabanı Sunucusu',
        'db_port_label' => 'Veritabanı Limanı',
        'db_port_placeholder' => 'Veritabanı Limanı',
        'db_name_label' => 'Veri tabanı ismi',
        'db_name_placeholder' => 'Veri tabanı ismi',
        'db_username_label' => 'Veritabanı Kullanıcı Adı',
        'db_username_placeholder' => 'Veritabanı Kullanıcı Adı',
        'db_password_label' => 'Veritabanı şifresi',
        'db_password_placeholder' => 'Veritabanı şifresi',
        'app_tabs' => 
        array (
          'more_info' => 'Daha fazla bilgi',
          'broadcasting_title' => 'Yayın, Önbellekleme, Oturum ve Sıra',
          'broadcasting_label' => 'Yayın Sürücüsü',
          'broadcasting_placeholder' => 'Yayın Sürücüsü',
          'cache_label' => 'Önbellek Sürücüsü',
          'cache_placeholder' => 'Önbellek Sürücüsü',
          'session_label' => 'Oturum Sürücüsü',
          'session_placeholder' => 'Oturum Sürücüsü',
          'queue_label' => 'Kuyruk Sürücüsü',
          'queue_placeholder' => 'Kuyruk Sürücüsü',
          'redis_label' => 'Redis Sürücüsü',
          'redis_host' => 'Redis Host',
          'redis_password' => 'Redis Şifresi',
          'redis_port' => 'Redis Limanı',
          'mail_label' => 'Posta',
          'mail_driver_label' => 'Mail Sürücüsü',
          'mail_driver_placeholder' => 'Mail Sürücüsü',
          'mail_host_label' => 'Posta Sunucusu',
          'mail_host_placeholder' => 'Posta Sunucusu',
          'mail_port_label' => 'Posta Limanı',
          'mail_port_placeholder' => 'Posta Limanı',
          'mail_username_label' => 'Mail Kullanıcı Adı',
          'mail_username_placeholder' => 'Mail Kullanıcı Adı',
          'mail_password_label' => 'Posta şifresi',
          'mail_password_placeholder' => 'Posta şifresi',
          'mail_encryption_label' => 'Posta Şifreleme',
          'mail_encryption_placeholder' => 'Posta Şifreleme',
          'pusher_label' => 'itici',
          'pusher_app_id_label' => 'İtici Uygulama Kimliği',
          'pusher_app_id_palceholder' => 'İtici Uygulama Kimliği',
          'pusher_app_key_label' => 'İtici Uygulama Anahtarı',
          'pusher_app_key_palceholder' => 'İtici Uygulama Anahtarı',
          'pusher_app_secret_label' => 'İtici Uygulama Sırrı',
          'pusher_app_secret_palceholder' => 'İtici Uygulama Sırrı',
        ),
        'buttons' => 
        array (
          'setup_database' => 'Kurulum veritabanı',
          'setup_application' => 'Kurulum uygulaması',
          'install' => 'kurmak',
        ),
      ),
    ),
    'classic' => 
    array (
      'backup' => 'Herhangi bir karmaşayı önlemek için, herhangi bir değişiklik yapmadan önce varsayılan yapılandırmaları kopyalayıp başka bir yere kaydedin.',
      'templateTitle' => '3. Adım | Çevre Ayarları | Klasik Editör',
      'title' => 'Çevre Dosya Düzenleyicisi',
      'save' => 'Konfigürasyonları Kaydet',
      'back' => 'Form Sihirbazı Kullan',
      'install' => 'kurmak',
      'required' => 'Devam etmek için sorunu düzeltin.',
    ),
    'success' => '.Env dosya ayarlarınız kaydedildi.',
    'errors' => '.Env dosyası kaydedilemiyor, Lütfen el ile oluşturun.',
  ),
  'verify' => 
  array (
    'verify_purchase' => 'Satın Alma İşlemini Doğrulayın',
    'submit' => 'Gönder',
    'form' => 
    array (
      'email_address_label' => 'E',
      'email_address_placeholder' => 'E',
      'purchase_code_label' => 'Satın alma kodu',
      'purchase_code_placeholder' => 'Satın Alma Kodu veya Lisans Anahtarı',
      'root_url_label' => 'Kök URL',
      'root_url_placeholder' => 'ROOT URL (sonunda / olmadan)',
    ),
  ),
  'install' => 'kurmak',
  'verified' => 'Lisans başarıyla doğrulandı.',
  'verification_failed' => 'Lisans doğrulaması başarısız oldu!',
  'installed' => 
  array (
    'success_log_message' => 'zCart Installer başarıyla kuruldu',
  ),
  'final' => 
  array (
    'title' => 'Son adım',
    'templateTitle' => 'Son adım',
    'finished' => 'Uygulama başarıyla kuruldu.',
    'migration' => 'Göç ve Tohum Konsolu Çıkışı:',
    'console' => 'Uygulama Konsolu Çıkışı:',
    'log' => 'Kurulum Günlüğü Girişi:',
    'env' => 'Son .env Dosyası:',
    'exit' => 'Giriş yapmak için buraya tıklayın',
    'import_demo_data' => 'Demo Verilerini İçe Aktar',
  ),
  'updater' => 
  array (
    'title' => 'zCart Güncelleyici',
    'welcome' => 
    array (
      'title' => 'Güncelleyiciye Hoşgeldiniz',
      'message' => 'Güncelleme sihirbazına hoş geldiniz.',
    ),
    'overview' => 
    array (
      'title' => 'genel bakış',
      'message' => '1 güncelleme var. | :number güncelleme var.',
      'install_updates' => 'Güncellemeleri yükle',
    ),
    'final' => 
    array (
      'title' => 'bitmiş',
      'finished' => 'Uygulamanın veritabanı başarıyla güncellendi.',
      'exit' => 'Çıkmak için buraya tıklayın',
    ),
    'log' => 
    array (
      'success_message' => 'zCart Yükleyici başarıyla GÜNCELLEME',
    ),
  ),
);