<?php
return array (
  'password_updated' =>
  array (
    'subject' => '您的 :marketplace密码已成功更新！',
    'greeting' => '您好 :user！',
    'message' => '您的帐户登录密码已成功更改！如果您没有进行此更改，请尽快与我们联系！单击下面的按钮登录到您的个人资料页面。',
    'button_text' => '访问您的个人资料',
  ),
  'invoice_created' =>
  array (
    'subject' => ':marketplace每月订阅费发票',
    'greeting' => '您好 :merchant！',
    'message' => '感谢您一直以来的支持。我们已附上您的发票副本作为记录。如果您有任何疑问或疑虑，请告诉我们！',
    'button_text' => '前往资讯主页',
  ),
  'customer_registered' =>
  array (
    'subject' => '欢迎来到 :marketplace市场！',
    'greeting' => '恭喜 :customer！',
    'message' => '您的帐户已成功创建！点击下面的按钮以验证您的电子邮件地址。',
    'button_text' => '验证我',
  ),
  'customer_updated' =>
  array (
    'subject' => '帐户信息更新成功！',
    'greeting' => '您好 :customer！',
    'message' => '这是一条通知，通知您帐户已成功更新！',
    'button_text' => '访问您的个人资料',
  ),
  'customer_password_reset' =>
  array (
    'subject' => '重置密码通知',
    'greeting' => '你好！',
    'message' => '您收到此电子邮件是因为我们收到了您帐户的密码重置请求。如果您不要求重设密码，只需忽略此通知，就无需采取进一步的措施。',
    'button_text' => '重设密码',
  ),
  'dispute_acknowledgement' =>
  array (
    'subject' => '[订单ID： :order_id]争议已成功提交',
    'greeting' => '你好 :customer',
    'message' => '谨在此通知您，我们已经收到您关于订单ID： :order_id的争议，我们的支持团队将尽快与您联系。',
    'button_text' => '查看争议',
  ),
  'dispute_created' =>
  array (
    'subject' => '订单ID： :order_id的新争议',
    'greeting' => '您好 :merchant！',
    'message' => '您已收到有关订单ID :order_id的新争议。请与客户一起检查并解决问题。',
    'button_text' => '查看争议',
  ),
  'dispute_updated' =>
  array (
    'subject' => '[订单ID： :order_id]争议状态已更新！',
    'greeting' => '您好 :customer！',
    'message' => '来自供应商“：reply”的此消息已更新了订单ID :order_id的争议。请检查以下内容，如果需要任何帮助，请与我们联系。',
    'button_text' => '查看争议',
  ),
  'dispute_appealed' =>
  array (
    'subject' => '[订单ID： :order_id]争议已上诉！',
    'greeting' => '你好！',
    'message' => '订单ID :order_id的争议已通过以下消息“：reply”提出申诉。请检查以下详细信息。',
    'button_text' => '查看争议',
  ),
  'appealed_dispute_replied' =>
  array (
    'subject' => '[订单ID： :order_id]上诉争议的新回复！',
    'greeting' => '你好！',
    'message' => '订单ID :order_id的争议已通过以下消息得到答复：</br> </br>“：reply”',
    'button_text' => '查看争议',
  ),
  'low_inventory_notification' =>
  array (
    'subject' => '低库存警报！',
    'greeting' => '你好！',
    'message' => '您的一个或多个库存项目越来越少。是时候添加更多库存以使商品继续投放市场了。',
    'button_text' => '更新库存',
  ),
  'inventory_bulk_upload_procceed_notice' =>
  array (
    'subject' => '您的批量库存导入请求已完成。',
    'greeting' => '你好！',
    'message' => '很高兴通知您，您的批量库存导入请求已完成。成功导入到平台的行总数 :success，失败的行数 :failed',
    'failed' => '请为失败的行找到附件。',
    'button_text' => '查看库存',
  ),
  'new_message' =>
  array (
    'subject' => ':subject',
    'greeting' => '你好 :receiver',
    'message' => ':message',
    'button_text' => '查看现场消息',
  ),
  'message_replied' =>
  array (
    'subject' => ':user回复 :subject',
    'greeting' => '你好 :receiver',
    'message' => ':reply',
    'button_text' => '查看现场消息',
  ),
  'order_created' =>
  array (
    'subject' => '[订单ID： :order]，您的订单已成功下达！',
    'greeting' => '你好 :customer',
    'message' => '感谢您选择我们！您的订单[订单ID :order]已成功下达。我们将通知您订单状态。',
    'button_text' => '参观商店',
  ),
  'merchant_order_created_notification' =>
  array (
    'subject' => '新订单[订单ID： :order]已放置在您的商店中！',
    'greeting' => '你好 :merchant',
    'message' => '新订单[订单ID :order]已下达。请检查订单详细信息并尽快完成订单。',
    'button_text' => '完成订单',
  ),
  'order_updated' =>
  array (
    'subject' => '[订单ID： :order]您的订单状态已更新！',
    'greeting' => '你好 :customer',
    'message' => '这是一条通知，通知您您的订单[订单ID :order]已更新。请参阅下面的订单详细信息。您还可以从信息中心检查订单。',
    'button_text' => '参观商店',
  ),
  'order_fulfilled' =>
  array (
    'subject' => '[订单ID： :order]您的订单就这样了！',
    'greeting' => '你好 :customer',
    'message' => '这是一条通知，通知您您的订单[订单ID :order]已发货，并且正在运送中。请参阅下面的订单详细信息。您还可以从信息中心检查订单。',
    'button_text' => '参观商店',
  ),
  'order_paid' =>
  array (
    'subject' => '[订单ID： :order]您的订单已成功付款！',
    'greeting' => '你好 :customer',
    'message' => '这是一条通知，通知您您的订单[订单ID :order]已成功付款，并且正在付款。请参阅下面的订单详细信息。您还可以从信息中心检查订单。',
    'button_text' => '参观商店',
  ),
  'order_payment_failed' =>
  array (
    'subject' => '[订单ID： :order]付款失败！',
    'greeting' => '你好 :customer',
    'message' => '这是一条通知，通知您您的订单[订单ID :order]付款失败。请参阅下面的订单详细信息。您还可以从信息中心检查订单。',
    'button_text' => '参观商店',
  ),
  'refund_initiated' =>
  array (
    'subject' => '[订单ID： :order]已开始退款！',
    'greeting' => '你好 :customer',
    'message' => '这是一条通知，通知您我们已经为您的订单 :order发起了退款请求。我们的小组成员之一将尽快审核该请求。我们将让您知道请求的状态。',
  ),
  'refund_approved' =>
  array (
    'subject' => '[订单ID： :order]，退款申请已获批准！',
    'greeting' => '你好 :customer',
    'message' => '这是一条通知，通知您我们已经批准了您的订单 :order的退款请求。退款金额为 :amount。我们已将款项汇入您的付款方式，可能需要几天的时间才能生效您的帐户。如果几天之内看不到这笔款项，请与您的付款提供商联系。',
  ),
  'refund_declined' =>
  array (
    'subject' => '[订单ID： :order]，退款申请已被拒绝！',
    'greeting' => '你好 :customer',
    'message' => '这是一条通知，通知您 :order订单的退款请求已被拒绝。如果您对商家的解决方案不满意，可以直接从平台与商家联系，甚至可以在 :marketplace上提出争议。我们将介入以解决问题。',
  ),
  'shop_created' =>
  array (
    'subject' => '您的商店已准备就绪！',
    'greeting' => '恭喜 :merchant！',
    'message' => '您的商店 :shop_name已成功创建！单击下面的按钮以登录商店管理面板。',
    'button_text' => '前往资讯主页',
  ),
  'shop_updated' =>
  array (
    'subject' => '店铺信息已成功更新！',
    'greeting' => '您好 :merchant！',
    'message' => '这是一条通知，通知您您的商店 :shop_name已成功更新！',
    'button_text' => '前往资讯主页',
  ),
  'shop_config_updated' =>
  array (
    'subject' => '店铺配置已成功更新！',
    'greeting' => '您好 :merchant！',
    'message' => '您的商店配置已成功更新！单击下面的按钮以登录商店管理面板。',
    'button_text' => '前往资讯主页',
  ),
  'shop_down_for_maintainace' =>
  array (
    'subject' => '您的商店倒闭了！',
    'greeting' => '您好 :merchant！',
    'message' => '这是一条通知，通知您 :shop_name商店已关闭！在重新恢复营业之前，没有客户可以访问您的商店。',
    'button_text' => '进入配置页面',
  ),
  'shop_is_live' =>
  array (
    'subject' => '您的商店重新上线了！',
    'greeting' => '你好 :merchant',
    'message' => '这是一条通知，通知您 :shop_name号商店已成功恢复正常运转！',
    'button_text' => '前往资讯主页',
  ),
  'shop_deleted' =>
  array (
    'subject' => '您的商店已从 :marketplace中删除！',
    'greeting' => '你好商人！',
    'message' => '这是一条通知，通知您您的商店已从我们的标记处删除！我们会想你的。',
  ),
  'system_is_down' =>
  array (
    'subject' => '您的市场 :marketplace现在下跌了！',
    'greeting' => '您好 :user！',
    'message' => '这是一条通知，通知您您的市场 :marketplace已经关闭！在重新恢复运行之前，没有客户可以访问您的市场。',
    'button_text' => '进入配置页面',
  ),
  'system_is_live' =>
  array (
    'subject' => '您的 :marketplace交易平台重现活力！',
    'greeting' => '您好 :user！',
    'message' => '这是一条通知，通知您 :marketplace交易平台已成功恢复正常运行！',
    'button_text' => '前往资讯主页',
  ),
  'system_info_updated' =>
  array (
    'subject' => ':marketplace-市场信息已成功更新！',
    'greeting' => '您好 :user！',
    'message' => '这是一条通知，通知您您的市场 :marketplace已成功更新！',
    'button_text' => '前往资讯主页',
  ),
  'system_config_updated' =>
  array (
    'subject' => ':marketplace-市场配置成功更新！',
    'greeting' => '您好 :user！',
    'message' => '您的交易平台 :marketplace的配置已成功更新！单击下面的按钮登录到管理面板。',
    'button_text' => '查看设定',
  ),
  'new_contact_us_message' =>
  array (
    'subject' => '通过与我们联系的形式发送新消息： :subject',
    'greeting' => '你好！',
    'message_footer_with_phone' => '您可以回复此电子邮件或直接联系此手机 :phone',
    'message_footer' => '您可以直接回复此电子邮件。',
  ),
  'ticket_acknowledgement' =>
  array (
    'subject' => '[票证ID： :ticket_id] :subject',
    'greeting' => '你好 :user',
    'message' => '这是一条通知，通知您我们已成功收到您的机票 :ticket_id！我们的支持团队将尽快与您联系。',
    'button_text' => '查看门票',
  ),
  'ticket_created' =>
  array (
    'subject' => '新支持票[票证ID： :ticket_id] :subject',
    'greeting' => '你好！',
    'message' => '您已经从供应商 :vendor收到了新的支持凭单ID :ticket_id，发件人 :sender。审查并评估票证以支持团队。',
    'button_text' => '查看门票',
  ),
  'ticket_assigned' =>
  array (
    'subject' => '刚刚分配给您的票证[票证IF： :ticket_id] :subject',
    'greeting' => '你好 :user',
    'message' => '这是一条通知，通知您票证[票证ID： :ticket_id] :subject刚刚向您提供。尽快检查并答复票证。',
    'button_text' => '回复票',
  ),
  'ticket_replied' =>
  array (
    'subject' => ':user回复票证[票证ID： :ticket_id] :subject',
    'greeting' => '你好 :user',
    'message' => ':reply',
    'button_text' => '查看门票',
  ),
  'ticket_updated' =>
  array (
    'subject' => '工单[工单ID： :ticket_id] :subject已更新！',
    'greeting' => '您好 :user！',
    'message' => '您的一张支持凭单凭单ID＃：ticket_id :subject已更新。如果您需要任何帮助，请与我们联系。',
    'button_text' => '查看门票',
  ),
  'user_created' =>
  array (
    'subject' => ':admin将您添加到 :marketplace市场！',
    'greeting' => '恭喜 :user！',
    'message' => ' :admin已将您添加到 :marketplace！点击下面的按钮登录您的帐户。使用临时密码进行初始登录。',
    'alert' => '登录后不要忘记更改密码。',
    'button_text' => '访问您的个人资料',
  ),
  'user_updated' =>
  array (
    'subject' => '帐户信息更新成功！',
    'greeting' => '您好 :user！',
    'message' => '这是一条通知，通知您帐户已成功更新！',
    'button_text' => '访问您的个人资料',
  ),
  'verdor_registered' =>
  array (
    'subject' => '新供应商刚刚注册！',
    'greeting' => '恭喜你！',
    'message' => '您的市场 :marketplace刚得到一个新商户，其商店名称为<strong>：shop_name </ strong>，而商家的电子邮件地址为 :merchant_email',
    'button_text' => '前往资讯主页',
  ),
  'email_verification' =>
  array (
    'subject' => '验证您的 :marketplace帐户！',
    'greeting' => '恭喜 :user！',
    'message' => '您的帐户已成功创建！点击下面的按钮以验证您的电子邮件地址。',
    'button_text' => '验证我的电子邮件',
  ),
  'dispute_solved' =>
  array (
    'subject' => '争议[订单ID： :order_id]已被标记为已解决！',
    'greeting' => '您好 :customer！',
    'message' => '订单ID： :order_id的争议已标记为已解决。感谢您与我们在一起。',
    'button_text' => '查看争议',
  ),
);