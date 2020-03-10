<?php 
return array (
  'title' => 'zCart安装程序',
  'next' => '下一步',
  'back' => '以前',
  'finish' => '安装',
  'forms' => 
  array (
    'errorTitle' => '发生以下错误：',
  ),
  'wait' => '请等待，安装可能需要几分钟。',
  'welcome' => 
  array (
    'templateTitle' => '欢迎',
    'title' => 'zCart安装程序',
    'message' => '简易安装和设置向导。',
    'next' => '检查要求',
  ),
  'requirements' => 
  array (
    'templateTitle' => '步骤1 |服务器要求',
    'title' => '服务器要求',
    'next' => '检查权限',
    'required' => '需要设置所有服务器要求才能继续',
  ),
  'permissions' => 
  array (
    'templateTitle' => '步骤2 |权限',
    'title' => '权限',
    'next' => '配置环境',
    'required' => '根据需要设置权限以继续。阅读文档。求助。',
  ),
  'environment' => 
  array (
    'menu' => 
    array (
      'templateTitle' => '步骤3 |环境设定',
      'title' => '环境设定',
      'desc' => '请选择您要如何配置应用程序<code> .env </ code>文件。',
      'wizard-button' => '表单向导设置',
      'classic-button' => '经典文字编辑器',
    ),
    'wizard' => 
    array (
      'templateTitle' => '步骤3 |环境设置|向导向导',
      'title' => '引导的<code> .env </ code>向导',
      'tabs' => 
      array (
        'environment' => '环境',
        'database' => '数据库',
        'application' => '应用',
      ),
      'form' => 
      array (
        'name_required' => '必须输入环境名称。',
        'app_name_label' => '应用名称',
        'app_name_placeholder' => '应用名称',
        'app_environment_label' => '应用环境',
        'app_environment_label_local' => '本地',
        'app_environment_label_developement' => '发展历程',
        'app_environment_label_qa' => 'a',
        'app_environment_label_production' => '生产',
        'app_environment_label_other' => '其他',
        'app_environment_placeholder_other' => '输入您的环境...',
        'app_debug_label' => '应用调试',
        'app_debug_label_true' => '真正',
        'app_debug_label_false' => '假',
        'app_log_level_label' => '应用日志级别',
        'app_log_level_label_debug' => '调试',
        'app_log_level_label_info' => '信息',
        'app_log_level_label_notice' => '注意',
        'app_log_level_label_warning' => '警告',
        'app_log_level_label_error' => '错误',
        'app_log_level_label_critical' => '危急',
        'app_log_level_label_alert' => '警报',
        'app_log_level_label_emergency' => '紧急情况',
        'app_url_label' => '应用程式网址',
        'app_url_placeholder' => '应用程式网址',
        'db_connection_failed' => '无法连接到数据库。检查配置。',
        'db_connection_label' => '数据库连接',
        'db_connection_label_mysql' => 'MySQL的',
        'db_connection_label_sqlite' => 'sqlite',
        'db_connection_label_pgsql' => 'pgsql',
        'db_connection_label_sqlsrv' => 'sqlsrv',
        'db_host_label' => '数据库主机',
        'db_host_placeholder' => '数据库主机',
        'db_port_label' => '数据库端口',
        'db_port_placeholder' => '数据库端口',
        'db_name_label' => '数据库名称',
        'db_name_placeholder' => '数据库名称',
        'db_username_label' => '数据库用户名',
        'db_username_placeholder' => '数据库用户名',
        'db_password_label' => '数据库密码',
        'db_password_placeholder' => '数据库密码',
        'app_tabs' => 
        array (
          'more_info' => '更多信息',
          'broadcasting_title' => '广播，缓存，会话和队列',
          'broadcasting_label' => '广播驱动程序',
          'broadcasting_placeholder' => '广播驱动程序',
          'cache_label' => '缓存驱动程序',
          'cache_placeholder' => '缓存驱动程序',
          'session_label' => '会话驱动程序',
          'session_placeholder' => '会话驱动程序',
          'queue_label' => '队列驱动程序',
          'queue_placeholder' => '队列驱动程序',
          'redis_label' => 'Redis驱动',
          'redis_host' => 'Redis主机',
          'redis_password' => 'Redis密码',
          'redis_port' => '雷迪斯港口',
          'mail_label' => '邮件',
          'mail_driver_label' => '邮件驱动',
          'mail_driver_placeholder' => '邮件驱动',
          'mail_host_label' => '邮件主机',
          'mail_host_placeholder' => '邮件主机',
          'mail_port_label' => '邮件端口',
          'mail_port_placeholder' => '邮件端口',
          'mail_username_label' => '邮件用户名',
          'mail_username_placeholder' => '邮件用户名',
          'mail_password_label' => '邮件密码',
          'mail_password_placeholder' => '邮件密码',
          'mail_encryption_label' => '邮件加密',
          'mail_encryption_placeholder' => '邮件加密',
          'pusher_label' => '推杆',
          'pusher_app_id_label' => '推送器应用ID',
          'pusher_app_id_palceholder' => '推送器应用ID',
          'pusher_app_key_label' => '推送器应用程序密钥',
          'pusher_app_key_palceholder' => '推送器应用程序密钥',
          'pusher_app_secret_label' => 'Pusher App Secret',
          'pusher_app_secret_palceholder' => 'Pusher App Secret',
        ),
        'buttons' => 
        array (
          'setup_database' => '设置数据库',
          'setup_application' => '设置应用',
          'install' => '安装',
        ),
      ),
    ),
    'classic' => 
    array (
      'backup' => '为避免混乱，请在进行任何更改之前将默认配置复制并保存在其他位置。',
      'templateTitle' => '步骤3 |环境设置|经典编辑器',
      'title' => '环境文件编辑器',
      'save' => '保存配置',
      'back' => '使用表单向导',
      'install' => '安装',
      'required' => '解决该问题以继续。',
    ),
    'success' => '您的.env文件设置已保存。',
    'errors' => '.env文件无法保存，请手动创建。',
  ),
  'verify' => 
  array (
    'verify_purchase' => '验证购买',
    'submit' => '提交',
    'form' => 
    array (
      'email_address_label' => '电子邮件地址',
      'email_address_placeholder' => '电子邮件地址',
      'purchase_code_label' => '购买代码',
      'purchase_code_placeholder' => '购买代码或许可证密钥',
      'root_url_label' => '根网址',
      'root_url_placeholder' => '根URL（末尾没有/）',
    ),
  ),
  'install' => '安装',
  'verified' => '许可证已成功验证。',
  'verification_failed' => '许可证验证失败！',
  'installed' => 
  array (
    'success_log_message' => 'zCart安装程序已成功安装',
  ),
  'final' => 
  array (
    'title' => '最后一步',
    'templateTitle' => '最后一步',
    'finished' => '应用程序已成功安装。',
    'migration' => '迁移和种子控制台输出：',
    'console' => '应用程序控制台输出：',
    'log' => '安装日志条目：',
    'env' => '最终的.env文件：',
    'exit' => '点击此处登录',
    'import_demo_data' => '导入演示数据',
  ),
  'updater' => 
  array (
    'title' => 'zCart更新器',
    'welcome' => 
    array (
      'title' => '欢迎使用更新程序',
      'message' => '欢迎使用更新向导。',
    ),
    'overview' => 
    array (
      'title' => '总览',
      'message' => '有1个更新。|有 :number个更新。',
      'install_updates' => '安装更新',
    ),
    'final' => 
    array (
      'title' => '已完成',
      'finished' => '应用程序的数据库已成功更新。',
      'exit' => '点击此处退出',
    ),
    'log' => 
    array (
      'success_message' => 'zCart安装程序已成功更新',
    ),
  ),
);