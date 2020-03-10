<?php 
return array (
  'title' => 'zCart 인스톨러',
  'next' => '다음 단계',
  'back' => '너무 이른',
  'finish' => '설치',
  'forms' => 
  array (
    'errorTitle' => '다음과 같은 오류가 발생했습니다.',
  ),
  'wait' => '설치는 몇 분 정도 걸릴 수 있습니다.',
  'welcome' => 
  array (
    'templateTitle' => '환영',
    'title' => 'zCart 인스톨러',
    'message' => '쉬운 설치 및 설정 마법사.',
    'next' => '요구 사항 확인',
  ),
  'requirements' => 
  array (
    'templateTitle' => '1 단계 | 서버 요구 사항',
    'title' => '서버 요구 사항',
    'next' => '권한 확인',
    'required' => '계속하려면 모든 서버 요구 사항을 설정해야합니다',
  ),
  'permissions' => 
  array (
    'templateTitle' => '2 단계 | 권한',
    'title' => '권한',
    'next' => '환경 구성',
    'required' => '계속하려면 필요한 권한을 설정하십시오. 문서를 읽으십시오. 도와주기 위해.',
  ),
  'environment' => 
  array (
    'menu' => 
    array (
      'templateTitle' => '3 단계 | 환경 설정',
      'title' => '환경 설정',
      'desc' => '앱 <code> .env </ code> 파일을 구성하는 방법을 선택하십시오.',
      'wizard-button' => '양식 마법사 설정',
      'classic-button' => '클래식 텍스트 편집기',
    ),
    'wizard' => 
    array (
      'templateTitle' => '3 단계 | 환경 설정 | 안내 마법사',
      'title' => '<code> .env </ code> 마법사 안내',
      'tabs' => 
      array (
        'environment' => '환경',
        'database' => '데이터 베이스',
        'application' => '신청',
      ),
      'form' => 
      array (
        'name_required' => '환경 이름이 필요합니다.',
        'app_name_label' => '앱 이름',
        'app_name_placeholder' => '앱 이름',
        'app_environment_label' => '앱 환경',
        'app_environment_label_local' => '노동 조합 지부',
        'app_environment_label_developement' => '개발',
        'app_environment_label_qa' => 'Qa',
        'app_environment_label_production' => '생산',
        'app_environment_label_other' => '다른',
        'app_environment_placeholder_other' => '환경을 입력하십시오 ...',
        'app_debug_label' => '앱 디버그',
        'app_debug_label_true' => '참된',
        'app_debug_label_false' => '그릇된',
        'app_log_level_label' => '앱 로그 수준',
        'app_log_level_label_debug' => '디버그',
        'app_log_level_label_info' => '정보',
        'app_log_level_label_notice' => '주의',
        'app_log_level_label_warning' => '경고',
        'app_log_level_label_error' => '오류',
        'app_log_level_label_critical' => '결정적인',
        'app_log_level_label_alert' => '경보',
        'app_log_level_label_emergency' => '비상 사태',
        'app_url_label' => '앱 URL',
        'app_url_placeholder' => '앱 URL',
        'db_connection_failed' => '데이터베이스에 연결할 수 없습니다. 구성을 확인하십시오.',
        'db_connection_label' => '데이터베이스 연결',
        'db_connection_label_mysql' => 'MySQL',
        'db_connection_label_sqlite' => 'sqlite',
        'db_connection_label_pgsql' => 'pgsql',
        'db_connection_label_sqlsrv' => 'sqlsrv',
        'db_host_label' => '데이터베이스 호스트',
        'db_host_placeholder' => '데이터베이스 호스트',
        'db_port_label' => '데이터베이스 포트',
        'db_port_placeholder' => '데이터베이스 포트',
        'db_name_label' => '데이터베이스 이름',
        'db_name_placeholder' => '데이터베이스 이름',
        'db_username_label' => '데이터베이스 사용자 이름',
        'db_username_placeholder' => '데이터베이스 사용자 이름',
        'db_password_label' => '데이터베이스 비밀번호',
        'db_password_placeholder' => '데이터베이스 비밀번호',
        'app_tabs' => 
        array (
          'more_info' => '더 많은 정보',
          'broadcasting_title' => '브로드 캐스트, 캐싱, 세션 및 큐',
          'broadcasting_label' => '방송 드라이버',
          'broadcasting_placeholder' => '방송 드라이버',
          'cache_label' => '캐시 드라이버',
          'cache_placeholder' => '캐시 드라이버',
          'session_label' => '세션 드라이버',
          'session_placeholder' => '세션 드라이버',
          'queue_label' => '큐 드라이버',
          'queue_placeholder' => '큐 드라이버',
          'redis_label' => '레디 스 드라이버',
          'redis_host' => '레디 스 호스트',
          'redis_password' => 'Redis 비밀번호',
          'redis_port' => '레디 스 포트',
          'mail_label' => '우편',
          'mail_driver_label' => '메일 드라이버',
          'mail_driver_placeholder' => '메일 드라이버',
          'mail_host_label' => '메일 호스트',
          'mail_host_placeholder' => '메일 호스트',
          'mail_port_label' => '메일 포트',
          'mail_port_placeholder' => '메일 포트',
          'mail_username_label' => '메일 사용자 이름',
          'mail_username_placeholder' => '메일 사용자 이름',
          'mail_password_label' => '메일 비밀번호',
          'mail_password_placeholder' => '메일 비밀번호',
          'mail_encryption_label' => '메일 암호화',
          'mail_encryption_placeholder' => '메일 암호화',
          'pusher_label' => '미는 사람',
          'pusher_app_id_label' => '푸셔 앱 ID',
          'pusher_app_id_palceholder' => '푸셔 앱 ID',
          'pusher_app_key_label' => '푸셔 앱 키',
          'pusher_app_key_palceholder' => '푸셔 앱 키',
          'pusher_app_secret_label' => '푸셔 앱 시크릿',
          'pusher_app_secret_palceholder' => '푸셔 앱 시크릿',
        ),
        'buttons' => 
        array (
          'setup_database' => '설치 데이터베이스',
          'setup_application' => '설치 응용',
          'install' => '설치',
        ),
      ),
    ),
    'classic' => 
    array (
      'backup' => '혼란을 피하기 위해 변경하기 전에 기본 구성을 다른 곳에 복사하여 저장하십시오.',
      'templateTitle' => '3 단계 | 환경 설정 | 클래식 에디터',
      'title' => '환경 파일 편집기',
      'save' => '구성 저장',
      'back' => '양식 마법사 사용',
      'install' => '설치',
      'required' => '계속하려면 문제를 해결하십시오.',
    ),
    'success' => '.env 파일 설정이 저장되었습니다.',
    'errors' => '.env 파일을 저장할 수 없습니다. 수동으로 작성하십시오.',
  ),
  'verify' => 
  array (
    'verify_purchase' => '구매 확인',
    'submit' => '제출',
    'form' => 
    array (
      'email_address_label' => '이메일 주소',
      'email_address_placeholder' => '이메일 주소',
      'purchase_code_label' => '구매 코드',
      'purchase_code_placeholder' => '구매 코드 또는 라이센스 키',
      'root_url_label' => '루트 URL',
      'root_url_placeholder' => '루트 URL (끝에 /없이)',
    ),
  ),
  'install' => '설치',
  'verified' => '라이센스가 성공적으로 확인되었습니다.',
  'verification_failed' => '라이센스 확인에 실패했습니다!',
  'installed' => 
  array (
    'success_log_message' => 'zCart Installer가 성공적으로 설치되었습니다.',
  ),
  'final' => 
  array (
    'title' => '마지막 단계',
    'templateTitle' => '마지막 단계',
    'finished' => '응용 프로그램이 성공적으로 설치되었습니다.',
    'migration' => '마이그레이션 및 시드 콘솔 출력 :',
    'console' => '응용 프로그램 콘솔 출력 :',
    'log' => '설치 로그 항목 :',
    'env' => '최종 .env 파일 :',
    'exit' => '로그인하려면 여기를 클릭하십시오',
    'import_demo_data' => '데모 데이터 가져 오기',
  ),
  'updater' => 
  array (
    'title' => 'zCart 업데이터',
    'welcome' => 
    array (
      'title' => '업데이터에 오신 것을 환영합니다',
      'message' => '업데이트 마법사에 오신 것을 환영합니다.',
    ),
    'overview' => 
    array (
      'title' => '개요',
      'message' => '1 개의 업데이트가 있습니다. | :number 업데이트가 있습니다.',
      'install_updates' => '업데이트 설치',
    ),
    'final' => 
    array (
      'title' => '끝마친',
      'finished' => '응용 프로그램 데이터베이스가 성공적으로 업데이트되었습니다.',
      'exit' => '종료하려면 여기를 클릭하십시오',
    ),
    'log' => 
    array (
      'success_message' => 'zCart Installer가 성공적으로 업데이트되었습니다',
    ),
  ),
);