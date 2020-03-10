<?php 
return array (
  'title' => 'zCart Installer',
  'next' => 'Langkah berikutnya',
  'back' => 'Sebelumnya',
  'finish' => 'Memasang',
  'forms' => 
  array (
    'errorTitle' => 'Kesalahan berikut terjadi:',
  ),
  'wait' => 'Harap tunggu, pemasangan mungkin memakan waktu beberapa menit.',
  'welcome' => 
  array (
    'templateTitle' => 'Selamat datang',
    'title' => 'zCart Installer',
    'message' => 'Instalasi dan Setup Wizard yang mudah.',
    'next' => 'Periksa Persyaratan',
  ),
  'requirements' => 
  array (
    'templateTitle' => 'Langkah 1 | Persyaratan Server',
    'title' => 'Persyaratan Server',
    'next' => 'Periksa Izin',
    'required' => 'Perlu mengatur semua persyaratan server untuk melanjutkan',
  ),
  'permissions' => 
  array (
    'templateTitle' => 'Langkah 2 | Izin',
    'title' => 'Izin',
    'next' => 'Konfigurasikan Lingkungan',
    'required' => 'Tetapkan izin seperti yang diminta untuk melanjutkan. Baca dok. untuk bantuan.',
  ),
  'environment' => 
  array (
    'menu' => 
    array (
      'templateTitle' => 'Langkah 3 | Pengaturan Lingkungan',
      'title' => 'Pengaturan Lingkungan',
      'desc' => 'Silakan pilih bagaimana Anda ingin mengonfigurasi file <code> .env </code> aplikasi.',
      'wizard-button' => 'Form Wizard Setup',
      'classic-button' => 'Editor Teks Klasik',
    ),
    'wizard' => 
    array (
      'templateTitle' => 'Langkah 3 | Pengaturan Lingkungan | Wisaya Terpandu',
      'title' => 'Wisaya <code> .env </code> yang dipandu',
      'tabs' => 
      array (
        'environment' => 'Lingkungan Hidup',
        'database' => 'Basis data',
        'application' => 'Aplikasi',
      ),
      'form' => 
      array (
        'name_required' => 'Nama lingkungan diperlukan.',
        'app_name_label' => 'Nama aplikasi',
        'app_name_placeholder' => 'Nama aplikasi',
        'app_environment_label' => 'Lingkungan Aplikasi',
        'app_environment_label_local' => 'Lokal',
        'app_environment_label_developement' => 'Pengembangan',
        'app_environment_label_qa' => 'Qa',
        'app_environment_label_production' => 'Produksi',
        'app_environment_label_other' => 'Lain',
        'app_environment_placeholder_other' => 'Masukkan lingkungan Anda ...',
        'app_debug_label' => 'Aplikasi Debug',
        'app_debug_label_true' => 'Benar',
        'app_debug_label_false' => 'Salah',
        'app_log_level_label' => 'Tingkat Log Aplikasi',
        'app_log_level_label_debug' => 'debug',
        'app_log_level_label_info' => 'info',
        'app_log_level_label_notice' => 'melihat',
        'app_log_level_label_warning' => 'peringatan',
        'app_log_level_label_error' => 'kesalahan',
        'app_log_level_label_critical' => 'kritis',
        'app_log_level_label_alert' => 'waspada',
        'app_log_level_label_emergency' => 'keadaan darurat',
        'app_url_label' => 'Url Aplikasi',
        'app_url_placeholder' => 'Url Aplikasi',
        'db_connection_failed' => 'Tidak dapat terhubung ke database. Periksa konfigurasi.',
        'db_connection_label' => 'Koneksi Basis Data',
        'db_connection_label_mysql' => 'mysql',
        'db_connection_label_sqlite' => 'sqlite',
        'db_connection_label_pgsql' => 'pgsql',
        'db_connection_label_sqlsrv' => 'sqlsrv',
        'db_host_label' => 'Host Database',
        'db_host_placeholder' => 'Host Database',
        'db_port_label' => 'Port Database',
        'db_port_placeholder' => 'Port Database',
        'db_name_label' => 'Nama Basis Data',
        'db_name_placeholder' => 'Nama Basis Data',
        'db_username_label' => 'Nama Pengguna Basis Data',
        'db_username_placeholder' => 'Nama Pengguna Basis Data',
        'db_password_label' => 'Kata sandi basis data',
        'db_password_placeholder' => 'Kata sandi basis data',
        'app_tabs' => 
        array (
          'more_info' => 'Info lebih lanjut',
          'broadcasting_title' => 'Siaran, Caching, Sesi, dan Antrian',
          'broadcasting_label' => 'Driver Siaran',
          'broadcasting_placeholder' => 'Driver Siaran',
          'cache_label' => 'Driver Cache',
          'cache_placeholder' => 'Driver Cache',
          'session_label' => 'Pengemudi Sesi',
          'session_placeholder' => 'Pengemudi Sesi',
          'queue_label' => 'Pengemudi antrian',
          'queue_placeholder' => 'Pengemudi antrian',
          'redis_label' => 'Pengemudi Redis',
          'redis_host' => 'Tuan Rumah Redis',
          'redis_password' => 'Kata sandi redis',
          'redis_port' => 'Port Redis',
          'mail_label' => 'Surat',
          'mail_driver_label' => 'Pengemudi Surat',
          'mail_driver_placeholder' => 'Pengemudi Surat',
          'mail_host_label' => 'Host Email',
          'mail_host_placeholder' => 'Host Email',
          'mail_port_label' => 'Port Surat',
          'mail_port_placeholder' => 'Port Surat',
          'mail_username_label' => 'Kirim Nama Pengguna Email',
          'mail_username_placeholder' => 'Kirim Nama Pengguna Email',
          'mail_password_label' => 'Kata sandi surat',
          'mail_password_placeholder' => 'Kata sandi surat',
          'mail_encryption_label' => 'Enkripsi Surat',
          'mail_encryption_placeholder' => 'Enkripsi Surat',
          'pusher_label' => 'Pendorong',
          'pusher_app_id_label' => 'Id Aplikasi Pusher',
          'pusher_app_id_palceholder' => 'Id Aplikasi Pusher',
          'pusher_app_key_label' => 'Tombol Aplikasi Pusher',
          'pusher_app_key_palceholder' => 'Tombol Aplikasi Pusher',
          'pusher_app_secret_label' => 'Rahasia Aplikasi Pusher',
          'pusher_app_secret_palceholder' => 'Rahasia Aplikasi Pusher',
        ),
        'buttons' => 
        array (
          'setup_database' => 'Setup Database',
          'setup_application' => 'Pengaturan Aplikasi',
          'install' => 'Memasang',
        ),
      ),
    ),
    'classic' => 
    array (
      'backup' => 'Untuk menghindari kekacauan, harap salin dan simpan konfigurasi default di tempat lain sebelum Anda melakukan perubahan.',
      'templateTitle' => 'Langkah 3 | Pengaturan Lingkungan | Editor Klasik',
      'title' => 'Editor File Lingkungan',
      'save' => 'Simpan Konfigurasi',
      'back' => 'Gunakan Form Wizard',
      'install' => 'Memasang',
      'required' => 'Perbaiki masalah untuk melanjutkan.',
    ),
    'success' => 'Pengaturan file .env Anda telah disimpan.',
    'errors' => 'Tidak dapat menyimpan file .env, Harap buat secara manual.',
  ),
  'verify' => 
  array (
    'verify_purchase' => 'Verifikasi Pembelian',
    'submit' => 'Menyerahkan',
    'form' => 
    array (
      'email_address_label' => 'Alamat email',
      'email_address_placeholder' => 'Alamat email',
      'purchase_code_label' => 'Kode Pembelian',
      'purchase_code_placeholder' => 'Kode Pembelian atau Kunci Lisensi',
      'root_url_label' => 'Url Rooting',
      'root_url_placeholder' => 'URL ROOT (tanpa / di akhir)',
    ),
  ),
  'install' => 'Memasang',
  'verified' => 'Lisensi telah berhasil diverifikasi.',
  'verification_failed' => 'Verifikasi lisensi gagal!',
  'installed' => 
  array (
    'success_log_message' => 'z Pemasang Kartu berhasil DIINSTAL pada',
  ),
  'final' => 
  array (
    'title' => 'Langkah terakhir',
    'templateTitle' => 'Langkah terakhir',
    'finished' => 'Aplikasi telah berhasil diinstal.',
    'migration' => 'Output Migrasi dan Konsol Benih:',
    'console' => 'Output Konsol Aplikasi:',
    'log' => 'Entri Log Instalasi:',
    'env' => 'File .env terakhir:',
    'exit' => 'Klik di sini untuk Masuk',
    'import_demo_data' => 'Impor Data Demo',
  ),
  'updater' => 
  array (
    'title' => 'zCart Updater',
    'welcome' => 
    array (
      'title' => 'Selamat Datang Di Pembaru',
      'message' => 'Selamat datang di panduan pembaruan.',
    ),
    'overview' => 
    array (
      'title' => 'Ikhtisar',
      'message' => 'Ada 1 pembaruan. | Ada pembaruan :number.',
      'install_updates' => 'Instal Pembaruan',
    ),
    'final' => 
    array (
      'title' => 'Jadi',
      'finished' => 'Basis data aplikasi telah berhasil diperbarui.',
      'exit' => 'Klik di sini untuk keluar',
    ),
    'log' => 
    array (
      'success_message' => 'zCart Installer berhasil DIPERBARUI pada',
    ),
  ),
);