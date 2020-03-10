<?php 
return array (
  'title' => 'Trình cài đặt zCart',
  'next' => 'Bước tiếp theo',
  'back' => 'Trước',
  'finish' => 'cài đặt, dựng lên',
  'forms' => 
  array (
    'errorTitle' => 'Đã xảy ra các lỗi sau:',
  ),
  'wait' => 'Xin vui lòng chờ, cài đặt có thể mất một vài phút.',
  'welcome' => 
  array (
    'templateTitle' => 'Chào mừng bạn',
    'title' => 'Trình cài đặt zCart',
    'message' => 'Thuật sĩ cài đặt và cài đặt dễ dàng.',
    'next' => 'Kiểm tra yêu cầu',
  ),
  'requirements' => 
  array (
    'templateTitle' => 'Bước 1 | Yêu cầu máy chủ',
    'title' => 'Yêu cầu máy chủ',
    'next' => 'Kiểm tra quyền',
    'required' => 'Cần đặt tất cả các yêu cầu máy chủ để tiếp tục',
  ),
  'permissions' => 
  array (
    'templateTitle' => 'Bước 2 | Quyền',
    'title' => 'Quyền',
    'next' => 'Cấu hình môi trường',
    'required' => 'Đặt quyền theo yêu cầu để tiếp tục. Đọc tài liệu. để được giúp đỡ.',
  ),
  'environment' => 
  array (
    'menu' => 
    array (
      'templateTitle' => 'Bước 3 | Cài đặt môi trường',
      'title' => 'Cài đặt môi trường',
      'desc' => 'Vui lòng chọn cách bạn muốn định cấu hình tệp ứng dụng <code> .env </ code>.',
      'wizard-button' => 'Thiết lập trình hướng dẫn biểu mẫu',
      'classic-button' => 'Trình soạn thảo văn bản cổ điển',
    ),
    'wizard' => 
    array (
      'templateTitle' => 'Bước 3 | Cài đặt môi trường | Hướng dẫn viên',
      'title' => 'Thuật sĩ <code> .env </ code> được hướng dẫn',
      'tabs' => 
      array (
        'environment' => 'Môi trường',
        'database' => 'Cơ sở dữ liệu',
        'application' => 'Ứng dụng',
      ),
      'form' => 
      array (
        'name_required' => 'Một tên môi trường là bắt buộc.',
        'app_name_label' => 'Tên ứng dụng',
        'app_name_placeholder' => 'Tên ứng dụng',
        'app_environment_label' => 'Môi trường ứng dụng',
        'app_environment_label_local' => 'Địa phương',
        'app_environment_label_developement' => 'Phát triển',
        'app_environment_label_qa' => 'Qa',
        'app_environment_label_production' => 'Sản xuất',
        'app_environment_label_other' => 'Khác',
        'app_environment_placeholder_other' => 'Vào môi trường của bạn ...',
        'app_debug_label' => 'Gỡ lỗi ứng dụng',
        'app_debug_label_true' => 'Thật',
        'app_debug_label_false' => 'Sai',
        'app_log_level_label' => 'Cấp độ nhật ký ứng dụng',
        'app_log_level_label_debug' => 'gỡ lỗi',
        'app_log_level_label_info' => 'thông tin',
        'app_log_level_label_notice' => 'để ý',
        'app_log_level_label_warning' => 'cảnh báo',
        'app_log_level_label_error' => 'lỗi',
        'app_log_level_label_critical' => 'chỉ trích',
        'app_log_level_label_alert' => 'cảnh báo',
        'app_log_level_label_emergency' => 'trường hợp khẩn cấp',
        'app_url_label' => 'Ứng dụng Url',
        'app_url_placeholder' => 'Ứng dụng Url',
        'db_connection_failed' => 'Không thể kết nối với cơ sở dữ liệu. Kiểm tra cấu hình.',
        'db_connection_label' => 'Kết nối cơ sở dữ liệu',
        'db_connection_label_mysql' => 'mys',
        'db_connection_label_sqlite' => 'sqlite',
        'db_connection_label_pgsql' => 'pssql',
        'db_connection_label_sqlsrv' => 'sqlsrv',
        'db_host_label' => 'Máy chủ cơ sở dữ liệu',
        'db_host_placeholder' => 'Máy chủ cơ sở dữ liệu',
        'db_port_label' => 'Cổng cơ sở dữ liệu',
        'db_port_placeholder' => 'Cổng cơ sở dữ liệu',
        'db_name_label' => 'Tên cơ sở dữ liệu',
        'db_name_placeholder' => 'Tên cơ sở dữ liệu',
        'db_username_label' => 'Tên người dùng cơ sở dữ liệu',
        'db_username_placeholder' => 'Tên người dùng cơ sở dữ liệu',
        'db_password_label' => 'Mật khẩu cơ sở dữ liệu',
        'db_password_placeholder' => 'Mật khẩu cơ sở dữ liệu',
        'app_tabs' => 
        array (
          'more_info' => 'Thêm thông tin',
          'broadcasting_title' => 'Phát sóng, bộ đệm, phiên và hàng đợi',
          'broadcasting_label' => 'Trình điều khiển phát sóng',
          'broadcasting_placeholder' => 'Trình điều khiển phát sóng',
          'cache_label' => 'Trình điều khiển bộ nhớ cache',
          'cache_placeholder' => 'Trình điều khiển bộ nhớ cache',
          'session_label' => 'Trình điều khiển phiên',
          'session_placeholder' => 'Trình điều khiển phiên',
          'queue_label' => 'Tài xế xếp hàng',
          'queue_placeholder' => 'Tài xế xếp hàng',
          'redis_label' => 'Lái xe Redis',
          'redis_host' => 'Máy chủ lưu trữ',
          'redis_password' => 'Mật khẩu Redis',
          'redis_port' => 'Cảng Redis',
          'mail_label' => 'Thư',
          'mail_driver_label' => 'Trình điều khiển thư',
          'mail_driver_placeholder' => 'Trình điều khiển thư',
          'mail_host_label' => 'Máy chủ thư',
          'mail_host_placeholder' => 'Máy chủ thư',
          'mail_port_label' => 'Cổng thư',
          'mail_port_placeholder' => 'Cổng thư',
          'mail_username_label' => 'Tên người dùng thư',
          'mail_username_placeholder' => 'Tên người dùng thư',
          'mail_password_label' => 'Mật khẩu thư',
          'mail_password_placeholder' => 'Mật khẩu thư',
          'mail_encryption_label' => 'Mã hóa thư',
          'mail_encryption_placeholder' => 'Mã hóa thư',
          'pusher_label' => 'Máy nghiền',
          'pusher_app_id_label' => 'Id ứng dụng Pizer',
          'pusher_app_id_palceholder' => 'Id ứng dụng Pizer',
          'pusher_app_key_label' => 'Khóa ứng dụng Pizer',
          'pusher_app_key_palceholder' => 'Khóa ứng dụng Pizer',
          'pusher_app_secret_label' => 'Bí mật ứng dụng',
          'pusher_app_secret_palceholder' => 'Bí mật ứng dụng',
        ),
        'buttons' => 
        array (
          'setup_database' => 'Thiết lập cơ sở dữ liệu',
          'setup_application' => 'Cài đặt ứng dụng',
          'install' => 'cài đặt, dựng lên',
        ),
      ),
    ),
    'classic' => 
    array (
      'backup' => 'Để tránh mọi sự lộn xộn, vui lòng sao chép và lưu các cấu hình mặc định ở một nơi khác trước khi bạn thực hiện bất kỳ thay đổi nào.',
      'templateTitle' => 'Bước 3 | Cài đặt môi trường | Biên tập cổ điển',
      'title' => 'Trình chỉnh sửa tệp môi trường',
      'save' => 'Lưu cấu hình',
      'back' => 'Sử dụng biểu mẫu thuật sĩ',
      'install' => 'cài đặt, dựng lên',
      'required' => 'Khắc phục sự cố để tiếp tục.',
    ),
    'success' => 'Cài đặt tệp .env của bạn đã được lưu.',
    'errors' => 'Không thể lưu tệp .env, Vui lòng tạo tệp theo cách thủ công.',
  ),
  'verify' => 
  array (
    'verify_purchase' => 'Xác nhận mua hàng',
    'submit' => 'Gửi đi',
    'form' => 
    array (
      'email_address_label' => 'Địa chỉ email',
      'email_address_placeholder' => 'Địa chỉ email',
      'purchase_code_label' => 'Mã mua hàng',
      'purchase_code_placeholder' => 'Mã mua hàng hoặc mã bản quyền',
      'root_url_label' => 'Root Url',
      'root_url_placeholder' => 'URL ROOT (không có / ở cuối)',
    ),
  ),
  'install' => 'cài đặt, dựng lên',
  'verified' => 'Giấy phép đã được xác minh thành công.',
  'verification_failed' => 'Xác minh giấy phép thất bại!',
  'installed' => 
  array (
    'success_log_message' => 'Trình cài đặt zCart CÀI ĐẶT thành công',
  ),
  'final' => 
  array (
    'title' => 'Bước cuối cùng',
    'templateTitle' => 'Bước cuối cùng',
    'finished' => 'Ứng dụng đã được cài đặt thành công.',
    'migration' => 'Kết quả di chuyển và bảng điều khiển hạt giống:',
    'console' => 'Bảng điều khiển ứng dụng đầu ra:',
    'log' => 'Nhật ký cài đặt:',
    'env' => 'Tập tin .env cuối cùng:',
    'exit' => 'Nhấn vào đây để đăng nhập',
    'import_demo_data' => 'Nhập dữ liệu demo',
  ),
  'updater' => 
  array (
    'title' => 'Trình cập nhật zCart',
    'welcome' => 
    array (
      'title' => 'Chào mừng đến với Trình cập nhật',
      'message' => 'Chào mừng bạn đến với trình hướng dẫn cập nhật.',
    ),
    'overview' => 
    array (
      'title' => 'Tổng quan',
      'message' => 'Có 1 bản cập nhật. Có bản cập nhật :number.',
      'install_updates' => 'Cài đặt Cập nhật',
    ),
    'final' => 
    array (
      'title' => 'Đã kết thúc',
      'finished' => 'Cơ sở dữ liệu của ứng dụng đã được cập nhật thành công.',
      'exit' => 'Nhấn vào đây để thoát',
    ),
    'log' => 
    array (
      'success_message' => 'Trình cài đặt zCart CẬP NHẬT thành công trên',
    ),
  ),
);