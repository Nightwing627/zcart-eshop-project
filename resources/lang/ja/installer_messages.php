<?php 
return array (
  'title' => 'zCartインストーラー',
  'next' => '次のステップ',
  'back' => '前',
  'finish' => 'インストール',
  'forms' => 
  array (
    'errorTitle' => '次のエラーが発生しました。',
  ),
  'wait' => 'しばらくお待ちください。インストールには数分かかる場合があります。',
  'welcome' => 
  array (
    'templateTitle' => 'ようこそ',
    'title' => 'zCartインストーラー',
    'message' => '簡単なインストールとセットアップウィザード。',
    'next' => '要件を確認する',
  ),
  'requirements' => 
  array (
    'templateTitle' => 'ステップ1 |サーバー要件',
    'title' => 'サーバー要件',
    'next' => '権限を確認する',
    'required' => '続行するには、すべてのサーバー要件を設定する必要があります',
  ),
  'permissions' => 
  array (
    'templateTitle' => 'ステップ2 |許可',
    'title' => '許可',
    'next' => '環境を構成する',
    'required' => '必要に応じて許可を設定して続行します。ドキュメントを読む。助けを求めて。',
  ),
  'environment' => 
  array (
    'menu' => 
    array (
      'templateTitle' => 'ステップ3 |環境設定',
      'title' => '環境設定',
      'desc' => 'アプリの<code> .env </ code>ファイルの構成方法を選択してください。',
      'wizard-button' => 'フォームウィザードのセットアップ',
      'classic-button' => 'クラシックテキストエディター',
    ),
    'wizard' => 
    array (
      'templateTitle' => 'ステップ3 |環境設定|ガイド付きウィザード',
      'title' => 'ガイド付き<code> .env </ code>ウィザード',
      'tabs' => 
      array (
        'environment' => '環境',
        'database' => 'データベース',
        'application' => '応用',
      ),
      'form' => 
      array (
        'name_required' => '環境名が必要です。',
        'app_name_label' => 'アプリ名',
        'app_name_placeholder' => 'アプリ名',
        'app_environment_label' => 'アプリ環境',
        'app_environment_label_local' => '地元',
        'app_environment_label_developement' => '開発',
        'app_environment_label_qa' => 'Qa',
        'app_environment_label_production' => '製造',
        'app_environment_label_other' => 'その他',
        'app_environment_placeholder_other' => '環境を入力してください...',
        'app_debug_label' => 'アプリのデバッグ',
        'app_debug_label_true' => '本当',
        'app_debug_label_false' => '偽',
        'app_log_level_label' => 'アプリログレベル',
        'app_log_level_label_debug' => 'デバッグ',
        'app_log_level_label_info' => '情報',
        'app_log_level_label_notice' => '通知',
        'app_log_level_label_warning' => '警告',
        'app_log_level_label_error' => 'エラー',
        'app_log_level_label_critical' => '批判的',
        'app_log_level_label_alert' => '警戒',
        'app_log_level_label_emergency' => '緊急',
        'app_url_label' => 'アプリのURL',
        'app_url_placeholder' => 'アプリのURL',
        'db_connection_failed' => 'データベースに接続できませんでした。構成を確認してください。',
        'db_connection_label' => 'データベース接続',
        'db_connection_label_mysql' => 'mysql',
        'db_connection_label_sqlite' => 'sqlite',
        'db_connection_label_pgsql' => 'pgsql',
        'db_connection_label_sqlsrv' => 'sqlsrv',
        'db_host_label' => 'データベースホスト',
        'db_host_placeholder' => 'データベースホスト',
        'db_port_label' => 'データベースポート',
        'db_port_placeholder' => 'データベースポート',
        'db_name_label' => 'データベース名',
        'db_name_placeholder' => 'データベース名',
        'db_username_label' => 'データベースユーザー名',
        'db_username_placeholder' => 'データベースユーザー名',
        'db_password_label' => 'データベースのパスワード',
        'db_password_placeholder' => 'データベースのパスワード',
        'app_tabs' => 
        array (
          'more_info' => '詳細情報',
          'broadcasting_title' => 'ブロードキャスト、キャッシュ、セッション、およびキュー',
          'broadcasting_label' => '放送ドライバー',
          'broadcasting_placeholder' => '放送ドライバー',
          'cache_label' => 'キャッシュドライバー',
          'cache_placeholder' => 'キャッシュドライバー',
          'session_label' => 'セッションドライバー',
          'session_placeholder' => 'セッションドライバー',
          'queue_label' => 'キュードライバー',
          'queue_placeholder' => 'キュードライバー',
          'redis_label' => 'Redisドライバー',
          'redis_host' => 'Redisホスト',
          'redis_password' => 'Redisパスワード',
          'redis_port' => 'Redisポート',
          'mail_label' => '郵便物',
          'mail_driver_label' => 'メールドライバー',
          'mail_driver_placeholder' => 'メールドライバー',
          'mail_host_label' => 'メールホスト',
          'mail_host_placeholder' => 'メールホスト',
          'mail_port_label' => 'メールポート',
          'mail_port_placeholder' => 'メールポート',
          'mail_username_label' => 'メールユーザー名',
          'mail_username_placeholder' => 'メールユーザー名',
          'mail_password_label' => 'メールパスワード',
          'mail_password_placeholder' => 'メールパスワード',
          'mail_encryption_label' => 'メール暗号化',
          'mail_encryption_placeholder' => 'メール暗号化',
          'pusher_label' => 'プッシャー',
          'pusher_app_id_label' => 'プッシャーアプリID',
          'pusher_app_id_palceholder' => 'プッシャーアプリID',
          'pusher_app_key_label' => 'プッシャーアプリキー',
          'pusher_app_key_palceholder' => 'プッシャーアプリキー',
          'pusher_app_secret_label' => 'プッシャーアプリシークレット',
          'pusher_app_secret_palceholder' => 'プッシャーアプリシークレット',
        ),
        'buttons' => 
        array (
          'setup_database' => 'データベースのセットアップ',
          'setup_application' => 'セットアップアプリケーション',
          'install' => 'インストール',
        ),
      ),
    ),
    'classic' => 
    array (
      'backup' => '混乱を避けるために、変更を行う前にデフォルト設定をコピーして別の場所に保存してください。',
      'templateTitle' => 'ステップ3 |環境設定|クラシックエディター',
      'title' => '環境ファイルエディター',
      'save' => '設定を保存する',
      'back' => 'フォームウィザードを使用する',
      'install' => 'インストール',
      'required' => '問題を修正して続行します。',
    ),
    'success' => '.envファイルの設定が保存されました。',
    'errors' => '.envファイルを保存できません。手動で作成してください。',
  ),
  'verify' => 
  array (
    'verify_purchase' => '購入を確認',
    'submit' => '提出する',
    'form' => 
    array (
      'email_address_label' => '電子メールアドレス',
      'email_address_placeholder' => '電子メールアドレス',
      'purchase_code_label' => '購入コード',
      'purchase_code_placeholder' => '購入コードまたはライセンスキー',
      'root_url_label' => 'ルートURL',
      'root_url_placeholder' => 'ルートURL（末尾に/なし）',
    ),
  ),
  'install' => 'インストール',
  'verified' => 'ライセンスが正常に検証されました。',
  'verification_failed' => 'ライセンスの確認に失敗しました！',
  'installed' => 
  array (
    'success_log_message' => 'zCartインストーラーが正常にインストールされました',
  ),
  'final' => 
  array (
    'title' => '最終段階',
    'templateTitle' => '最終段階',
    'finished' => 'アプリケーションが正常にインストールされました。',
    'migration' => '移行およびシードコンソールの出力：',
    'console' => 'アプリケーションコンソールの出力：',
    'log' => 'インストールログエントリ：',
    'env' => '最終的な.envファイル：',
    'exit' => 'ここをクリックしてログイン',
    'import_demo_data' => 'デモデータのインポート',
  ),
  'updater' => 
  array (
    'title' => 'zCartアップデーター',
    'welcome' => 
    array (
      'title' => 'アップデーターへようこそ',
      'message' => '更新ウィザードへようこそ。',
    ),
    'overview' => 
    array (
      'title' => '概要',
      'message' => '1つの更新があります。| :numberの更新があります。',
      'install_updates' => 'アップデートをインストールする',
    ),
    'final' => 
    array (
      'title' => '完成した',
      'finished' => 'アプリケーションのデータベースが正常に更新されました。',
      'exit' => 'ここをクリックして終了します',
    ),
    'log' => 
    array (
      'success_message' => 'zCartインストーラーが正常に更新されました',
    ),
  ),
);