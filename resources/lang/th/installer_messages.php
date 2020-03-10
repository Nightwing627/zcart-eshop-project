<?php 
return array (
  'title' => 'โปรแกรมติดตั้ง zCart',
  'next' => 'ขั้นตอนต่อไป',
  'back' => 'ก่อน',
  'finish' => 'ติดตั้ง',
  'forms' => 
  array (
    'errorTitle' => 'ข้อผิดพลาดต่อไปนี้เกิดขึ้น:',
  ),
  'wait' => 'โปรดรอสักครู่การติดตั้งอาจใช้เวลาสักครู่',
  'welcome' => 
  array (
    'templateTitle' => 'ยินดีต้อนรับ',
    'title' => 'โปรแกรมติดตั้ง zCart',
    'message' => 'วิซาร์ดการติดตั้งและติดตั้งง่าย',
    'next' => 'ตรวจสอบข้อกำหนด',
  ),
  'requirements' => 
  array (
    'templateTitle' => 'ขั้นตอนที่ 1 | ข้อกำหนดของเซิร์ฟเวอร์',
    'title' => 'ข้อกำหนดของเซิร์ฟเวอร์',
    'next' => 'ตรวจสอบการอนุญาต',
    'required' => 'จำเป็นต้องตั้งข้อกำหนดทั้งหมดของเซิร์ฟเวอร์เพื่อดำเนินการต่อ',
  ),
  'permissions' => 
  array (
    'templateTitle' => 'ขั้นตอนที่ 2 | สิทธิ์',
    'title' => 'สิทธิ์',
    'next' => 'กำหนดค่าสภาพแวดล้อม',
    'required' => 'ตั้งค่าการอนุญาตตามที่ต้องการเพื่อดำเนินการต่อ อ่านเอกสาร เพื่อขอความช่วยเหลือ',
  ),
  'environment' => 
  array (
    'menu' => 
    array (
      'templateTitle' => 'ขั้นตอนที่ 3 | การตั้งค่าสภาพแวดล้อม',
      'title' => 'การตั้งค่าสภาพแวดล้อม',
      'desc' => 'โปรดเลือกวิธีที่คุณต้องการกำหนดค่าไฟล์แอป <code> .env </code>',
      'wizard-button' => 'การตั้งค่าตัวช่วยสร้างฟอร์ม',
      'classic-button' => 'แก้ไขข้อความคลาสสิก',
    ),
    'wizard' => 
    array (
      'templateTitle' => 'ขั้นตอนที่ 3 | การตั้งค่าสภาพแวดล้อม | ตัวช่วยสร้างการแนะนำ',
      'title' => 'วิซาร์ด <code> .env </code> ที่แนะนำ',
      'tabs' => 
      array (
        'environment' => 'สิ่งแวดล้อม',
        'database' => 'ฐานข้อมูล',
        'application' => 'ใบสมัคร',
      ),
      'form' => 
      array (
        'name_required' => 'ต้องระบุชื่อสภาพแวดล้อม',
        'app_name_label' => 'ชื่อแอป',
        'app_name_placeholder' => 'ชื่อแอป',
        'app_environment_label' => 'สภาพแวดล้อมของแอป',
        'app_environment_label_local' => 'ในประเทศ',
        'app_environment_label_developement' => 'พัฒนาการ',
        'app_environment_label_qa' => 'ระบบประกันคุณภาพ',
        'app_environment_label_production' => 'การผลิต',
        'app_environment_label_other' => 'อื่น ๆ',
        'app_environment_placeholder_other' => 'เข้าสู่สภาพแวดล้อมของคุณ ...',
        'app_debug_label' => 'Debug แอป',
        'app_debug_label_true' => 'จริง',
        'app_debug_label_false' => 'เท็จ',
        'app_log_level_label' => 'ระดับการบันทึกแอป',
        'app_log_level_label_debug' => 'การแก้ปัญหา',
        'app_log_level_label_info' => 'ข้อมูล',
        'app_log_level_label_notice' => 'แจ้งให้ทราบ',
        'app_log_level_label_warning' => 'การเตือน',
        'app_log_level_label_error' => 'ความผิดพลาด',
        'app_log_level_label_critical' => 'วิกฤติ',
        'app_log_level_label_alert' => 'เตือนภัย',
        'app_log_level_label_emergency' => 'กรณีฉุกเฉิน',
        'app_url_label' => 'แอป URL',
        'app_url_placeholder' => 'แอป URL',
        'db_connection_failed' => 'ไม่สามารถเชื่อมต่อกับฐานข้อมูล ตรวจสอบการกำหนดค่า',
        'db_connection_label' => 'การเชื่อมต่อฐานข้อมูล',
        'db_connection_label_mysql' => 'MySQL',
        'db_connection_label_sqlite' => 'SQLite',
        'db_connection_label_pgsql' => 'pgsql',
        'db_connection_label_sqlsrv' => 'sqlsrv',
        'db_host_label' => 'โฮสต์ฐานข้อมูล',
        'db_host_placeholder' => 'โฮสต์ฐานข้อมูล',
        'db_port_label' => 'พอร์ตฐานข้อมูล',
        'db_port_placeholder' => 'พอร์ตฐานข้อมูล',
        'db_name_label' => 'ชื่อฐานข้อมูล',
        'db_name_placeholder' => 'ชื่อฐานข้อมูล',
        'db_username_label' => 'ชื่อผู้ใช้ฐานข้อมูล',
        'db_username_placeholder' => 'ชื่อผู้ใช้ฐานข้อมูล',
        'db_password_label' => 'รหัสผ่านฐานข้อมูล',
        'db_password_placeholder' => 'รหัสผ่านฐานข้อมูล',
        'app_tabs' => 
        array (
          'more_info' => 'ข้อมูลเพิ่มเติม',
          'broadcasting_title' => 'Broadcasting, Caching, Session และ Queue',
          'broadcasting_label' => 'Broadcast Driver',
          'broadcasting_placeholder' => 'Broadcast Driver',
          'cache_label' => 'Cache Driver',
          'cache_placeholder' => 'Cache Driver',
          'session_label' => 'ไดร์เวอร์เซสชั่น',
          'session_placeholder' => 'ไดร์เวอร์เซสชั่น',
          'queue_label' => 'โปรแกรมควบคุมคิว',
          'queue_placeholder' => 'โปรแกรมควบคุมคิว',
          'redis_label' => 'ไดร์เวอร์ Redis',
          'redis_host' => 'โฮสต์ Redis',
          'redis_password' => 'รหัสผ่าน Redis',
          'redis_port' => 'พอร์ต Redis',
          'mail_label' => 'จดหมาย',
          'mail_driver_label' => 'Mail Driver',
          'mail_driver_placeholder' => 'Mail Driver',
          'mail_host_label' => 'เมลโฮสต์',
          'mail_host_placeholder' => 'เมลโฮสต์',
          'mail_port_label' => 'Mail Port',
          'mail_port_placeholder' => 'Mail Port',
          'mail_username_label' => 'ส่งชื่อผู้ใช้',
          'mail_username_placeholder' => 'ส่งชื่อผู้ใช้',
          'mail_password_label' => 'รหัสผ่านจดหมาย',
          'mail_password_placeholder' => 'รหัสผ่านจดหมาย',
          'mail_encryption_label' => 'การเข้ารหัสเมล',
          'mail_encryption_placeholder' => 'การเข้ารหัสเมล',
          'pusher_label' => 'ผู้ยื่น',
          'pusher_app_id_label' => 'รหัสแอปดัน',
          'pusher_app_id_palceholder' => 'รหัสแอปดัน',
          'pusher_app_key_label' => 'รหัสแอป Pusher',
          'pusher_app_key_palceholder' => 'รหัสแอป Pusher',
          'pusher_app_secret_label' => 'แอปลับ Pusher',
          'pusher_app_secret_palceholder' => 'แอปลับ Pusher',
        ),
        'buttons' => 
        array (
          'setup_database' => 'ตั้งค่าฐานข้อมูล',
          'setup_application' => 'แอปพลิเคชันติดตั้ง',
          'install' => 'ติดตั้ง',
        ),
      ),
    ),
    'classic' => 
    array (
      'backup' => 'เพื่อหลีกเลี่ยงความยุ่งเหยิงโปรดคัดลอกและบันทึกการกำหนดค่าเริ่มต้นที่อื่นก่อนที่คุณจะทำการเปลี่ยนแปลงใด ๆ',
      'templateTitle' => 'ขั้นตอนที่ 3 | การตั้งค่าสภาพแวดล้อม | ตัวแก้ไขแบบคลาสสิก',
      'title' => 'โปรแกรมแก้ไขไฟล์สภาพแวดล้อม',
      'save' => 'บันทึกการกำหนดค่า',
      'back' => 'ใช้ตัวช่วยสร้างแบบฟอร์ม',
      'install' => 'ติดตั้ง',
      'required' => 'แก้ไขปัญหาเพื่อดำเนินการต่อ',
    ),
    'success' => 'บันทึกการตั้งค่าไฟล์. env ของคุณแล้ว',
    'errors' => 'ไม่สามารถบันทึกไฟล์. env โปรดสร้างด้วยตนเอง',
  ),
  'verify' => 
  array (
    'verify_purchase' => 'ยืนยันการสั่งซื้อ',
    'submit' => 'เสนอ',
    'form' => 
    array (
      'email_address_label' => 'ที่อยู่อีเมล',
      'email_address_placeholder' => 'ที่อยู่อีเมล',
      'purchase_code_label' => 'รหัสซื้อ',
      'purchase_code_placeholder' => 'รหัสซื้อหรือรหัสใบอนุญาต',
      'root_url_label' => 'URL รูท',
      'root_url_placeholder' => 'URL ROOT (โดยไม่ต้อง / ท้าย)',
    ),
  ),
  'install' => 'ติดตั้ง',
  'verified' => 'ตรวจสอบใบอนุญาตเรียบร้อยแล้ว',
  'verification_failed' => 'การตรวจสอบใบอนุญาตล้มเหลว!',
  'installed' => 
  array (
    'success_log_message' => 'zCart Installer ติดตั้งสำเร็จแล้วเมื่อเปิด',
  ),
  'final' => 
  array (
    'title' => 'ขั้นตอนสุดท้าย',
    'templateTitle' => 'ขั้นตอนสุดท้าย',
    'finished' => 'ติดตั้งแอปพลิเคชันสำเร็จแล้ว',
    'migration' => 'ผลลัพธ์การย้ายข้อมูลและ Seed Console:',
    'console' => 'แอพพลิเคชันคอนโซลเอาท์พุท:',
    'log' => 'บันทึกการติดตั้ง:',
    'env' => 'ไฟล์. env สุดท้าย:',
    'exit' => 'คลิกที่นี่เพื่อเข้าสู่ระบบ',
    'import_demo_data' => 'นำเข้าข้อมูลการสาธิต',
  ),
  'updater' => 
  array (
    'title' => 'zCart Updater',
    'welcome' => 
    array (
      'title' => 'ยินดีต้อนรับสู่ The Updater',
      'message' => 'ยินดีต้อนรับสู่ตัวช่วยการอัพเดต',
    ),
    'overview' => 
    array (
      'title' => 'ภาพรวม',
      'message' => 'มีการอัพเดท 1 ครั้ง | มีการอัพเดท :number',
      'install_updates' => 'ติดตั้งการปรับปรุง',
    ),
    'final' => 
    array (
      'title' => 'เสร็จ',
      'finished' => 'อัปเดตฐานข้อมูลของแอปพลิเคชันสำเร็จแล้ว',
      'exit' => 'คลิกที่นี่เพื่อออก',
    ),
    'log' => 
    array (
      'success_message' => 'zCart Installer อัปเดตสำเร็จแล้วเมื่อ',
    ),
  ),
);