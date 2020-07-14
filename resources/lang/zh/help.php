<?php 
return array (
  'add_input_field' => '添加输入字段',
  'remove_input_field' => '删除此输入字段',
  'marketplace_name' => '市场名称的名称。访客会看到这个名字。',
  'system_legal_name' => '商家的法定名称',
  'min_pass_lenght' => '至少6个字符',
  'role_name' => '用户角色的标题',
  'role_type' => '平台和商家。角色类型平台仅适用于主要平台用户，商人无法使用此角色。当商家添加新用户时，商家角色类型将可用。',
  'role_level' => '角色级别将由使用人员决定谁可以控制谁。示例：角色级别2的用户不能修改任何角色级别1的用户。如果该角色是针对最终级别用户的，请保持空白。',
  'you_cant_set_role_level' => '仅顶级用户可以设置此值。',
  'cant_edit_special_role' => '此角色类型不可编辑。请小心修改该角色的权限。',
  'set_role_permissions' => '仔细设置角色权限。选择“角色类型”以获取适当的模块。',
  'permission_modules' => '启用模块以设置该模块的权限',
  'shipping_rate_delivery_takes' => '具体来说，客户会看到这一点。',
  'type_dbreset' => '在框中输入确切的单词“ RESET”以确认您的愿望。',
  'type_environment' => '在框中输入确切的词“环境”以确认您的愿望。',
  'type_uninstall' => '在框中输入确切的单词“ UNINSTALL”以确认您的愿望。',
  'module' => 
  array (
    'name' => '该角色下的所有用户将能够执行指定的操作来管理 :module。',
    'access' => 
    array (
      'common' => '这是一个 :Access模块。这意味着平台用户和商人用户都可以访问。',
      'platform' => '这是一个 :Access模块。这意味着只有平台用户可以访问。',
      'merchant' => '这是一个 :Access模块。这意味着只有商家用户可以访问。',
    ),
  ),
  'currency_iso_code' => 'ISO 4217代码。例如，美元的代码为USD，日本的货币代码为JPY。',
  'country_iso_code' => 'ISO 3166_2代码。例如，示例：对于美利坚合众国，代码为US',
  'currency_subunit' => '该子单元是基本单元的一部分。例如：cent，centavo，paisa',
  'currency_symbol_first' => '例如：$ 13.21',
  'currency_decimalpoint' => '示例：13.21、13.21',
  'currency_thousands_separator' => '示例：1,000、1.000、1000',
  'cover_img_size' => '封面图片大小应为1280x300px',
  'slug' => 'Slug通常是搜索引擎友好的网址',
  'shop_slug' => '这将用作您的商店URL，以后将无法更改。有创意地为您的商店选择choose',
  'shop_url' => '商店登录页面的完整路径。您无法更改网址。',
  'shop_timezone' => '时区不会影响商店或市场。只是为了更多地了解您的商店',
  'url' => '网址',
  'optional' => '（可选的）',
  'use_markdown_to_bold' => '在重要关键字的两侧添加**以突出显示',
  'announcement_action_text' => '可选操作按钮，用于将公告链接到任何网址',
  'announcement_action_url' => '博客文章的操作网址或任何网址',
  'blog_feature_img_hint' => '图片尺寸应为960x480px',
  'code' => '码',
  'brand' => '产品的品牌。不需要，但推荐',
  'shop_name' => '店铺的品牌或陈列名称',
  'shop_status' => '如果活跃，该商店将立即上线。',
  'shop_maintenance_mode_handle' => '如果启用维护模式，则商店将处于离线状态，并且所有商品都将从市场上关闭，直到关闭维护为止。',
  'system_maintenance_mode_handle' => '如果启用了维护模式，则市场将处于脱机状态，并且将向访问者显示维护模式标志。商家仍然可以访问其管理面板。',
  'system_physical_address' => '市场/办公室的实际位置',
  'system_email' => '所有通知将发送到该电子邮件地址，接受支持电子邮件（如果已设置）',
  'system_timezone' => '该系统将使用该时区进行操作。',
  'system_currency' => '市场货币',
  'system_slogan' => '最能描述您的市场的标语',
  'system_length_unit' => '长度单位将在整个市场中使用。',
  'system_weight_unit' => '重量单位将在整个市场中使用。',
  'system_valume_unit' => '价值单位将在整个市场中使用。',
  'ask_customer_for_email_subscription' => '当新客户注册帐户时，询问您的客户是否想通过电子邮件获得促销和其他通知。关闭该选项将导致自动订阅。在这种情况下，请在“条款和条件”部分中明确说明。',
  'allow_guest_checkout' => '这样一来，客户无需在网站上进行注册即可结帐。',
  'vendor_can_view_customer_info' => '这将使供应商可以在订单页面上查看客户的详细信息。否则，名称，电子邮件地址和账单/送货地址将可见。',
  'system_pagination' => '在管理面板上为数据表设置分页值。',
  'subscription_name' => '给订阅计划起一个有意义的名字。',
  'subscription_plan_id' => '这是需要与Stripe的计划ID完全匹配的标识符',
  'featured_subscription' => '应该只有一个特色订阅',
  'subscription_cost' => '每月的订阅费用',
  'team_size' => '团队规模是指可以在此团队下注册的总用户数',
  'inventory_limit' => '总上市数量。同一产品的变体将被视为不同的产品。',
  'marketplace_commission' => '市场上订单商品价值收费的百分比',
  'transaction_fee' => '如果您想为每笔交易收取固定费用',
  'subscription_best_for' => '此包装的目标客户。这将对客户可见。',
  'config_return_refund' => '您商店的退货和退款政策。在指定您的政策之前，请先阅读该市场的政策。',
  'config_trial_days' => '试用期过后，商家会被收费。如果您不提前使用卡，则此时间过后商家帐户将被冻结。',
  'charge_after_trial_days' => '试用期 :days天后将收费。',
  'required_card_upfront' => '您要在商家注册时获取卡信息吗？',
  'leave_empty_to_save_as_draft' => '留空以另存为草稿',
  'logo_img_size' => '徽标图片大小应至少为300x300px',
  'brand_logo_size' => '徽标图片大小应为120x40px和.png',
  'brand_icon_size' => '图标图片大小应为32x32px和.png',
  'config_alert_quantity' => '将发送通知电子邮件，您的库存低于警报数量',
  'config_max_img_size_limit_kb' => '系统可以上传产品/库存/徽标/头像的最大图像尺寸限制。大小（以千字节为单位）。',
  'config_max_number_of_inventory_imgs' => '选择一个库存物品可以上传多少图像。',
  'config_address_default_country' => '设置此值可以更快地填写地址表格。显然，用户可以在添加新地址时更改该值。',
  'config_address_default_state' => '设置此值可以更快地填写地址表格。显然，用户可以在添加新地址时更改该值。',
  'config_show_address_title' => '在查看/打印地址时显示/隐藏地址标题。',
  'config_address_show_country' => '在查看/打印地址时显示/隐藏国家/地区名称。如果您的市场在小区域内，这将很有帮助。',
  'config_address_show_map' => '想要显示带有地址的地图？此选项将使用Google Map生成地图。',
  'config_show_currency_symbol' => '您要代表价格时显示货币符号吗？例如：$ 123',
  'config_show_space_after_symbol' => '想要通过在符号后加一个空格来格式化价格。示例：$ 123',
  'config_decimals' => '您想在小数点后显示几位数？示例：13.21、13.123',
  'config_gift_card_pin_size' => '您要生成礼品卡密码的位数。预设长度10',
  'config_gift_card_serial_number_size' => '您要生成礼品卡序列号的位数。默认长度13',
  'config_coupon_code_size' => '您要生成优惠券代码的位数。默认长度8',
  'shop_email' => '所有通知都将发送到该电子邮件地址（库存，订单，票证，争议等）。接受客户支持电子邮件（如果已设置）',
  'shop_legal_name' => '店铺的法定名称',
  'shop_owner_id' => '商店的所有者和超级管理员。注册为商家的用户可以拥有商店。您以后无法更改。',
  'shop_description' => '商店的品牌描述，此信息将在商店的主页上可见。',
  'attribute_type' => '属性的类型。这将有助于在产品页面上显示选项。',
  'attribute_name' => '该名称将显示在产品页面上。',
  'attribute_value' => '此值将作为可选选项显示在产品页面上。',
  'parent_attribute' => '该选项将显示在此属性下。',
  'list_order' => '查看列表中的顺序。',
  'shop_external_url' => '如果您拥有网站，则可以在此处放置外部链接，网址可以设置为商店的登录页面。',
  'product_name' => '客户将看不到这一点。此名称仅帮助商家找到要列出的商品。',
  'product_featured_image' => '客户将看不到这一点。这仅有助于商家找到要列出的商品。',
  'product_images' => '只有在商家列表中没有要显示的图像时，客户才能看到此图像。',
  'product_active' => '商家只会找到活动物品。',
  'product_description' => '客户会看到这一点。这是核心和常见的产品描述。',
  'model_number' => '制造商提供的产品的标识符。不需要，但推荐',
  'gtin' => '全球贸易商品编号（GTIN）是产品在全球市场上的唯一标识。如果您想获取产品的ISBN或UPC代码，则可以在以下网站上找到更多信息：http://www.isbn.org/和http://www.uc-council.org/',
  'mpn' => '制造商零件号（MPN）是制造商发布的唯一标识符。您可以从制造商处获得MPN。不需要，但推荐',
  'sku' => 'SKU（库存单位）是卖方特定的标识符。这将有助于管理您的库存',
  'isbn' => '国际标准书号（ISBN）是唯一的商业书标识符条形码。每个ISBN代码都唯一标识一本书。 ISBN有10或13位数字。 2007年1月1日之后分配的所有ISBN都有13位数字。通常，ISBN印在书的封底上',
  'ean' => '欧洲商品编号（EAN）是条形码标准，是12位或13位产品标识码。您可以从制造商那里获得EAN。如果您的产品没有制造商EAN，而您需要购买EAN代码，请访问GS1 UK http://www.gs1uk.org',
  'upc' => '通用产品代码（UPC），也称为GTIN-12和UPC-A。商业产品的唯一数字标识符，通常与印刷在零售商品上的条形码相关联',
  'meta_title' => '标题标签（技术上称为标题元素）定义文档的标题。标题标签通常用于搜索引擎结果页面（SERP）上，以显示给定页面的预览摘要，并且对于SEO和社交共享都非常重要',
  'meta_description' => '元描述是HTML属性，可提供网页内容的简要说明。元描述通常在搜索引擎结果页面（SERP）上使用，以显示给定页面的预览摘要',
  'catalog_min_price' => '设置产品的最低价格。供应商可以在此价格限制内添加库存。',
  'catalog_max_price' => '设置产品的最高价格。供应商可以在此价格限制内添加库存。',
  'has_variant' => '此商品有不同的颜色，形状，大小等变化。',
  'requires_shipping' => '此项目需要运输。',
  'downloadable' => '此项目是数字内容，购买者可以下载该项目。',
  'manufacturer_url' => '制造商的官方网站链接。',
  'manufacturer_email' => '系统将使用该电子邮件地址与制造商进行通信。',
  'manufacturer_phone' => '制造商的支持电话号码。',
  'supplier_email' => '系统将使用该电子邮件地址与供应商进行通信。',
  'supplier_contact_person' => '联系人',
  'shop_address' => '商店的实际地址。',
  'search_product' => '您可以使用任何GTIN标识符，例如UPC，ISBN，EAN，JAN或ITF。您也可以使用名称和型号，也可以使用名称或型号的一部分。',
  'seller_description' => '这是产品的卖方特定描述。客户会看到这个',
  'seller_product_condition' => '产品的当前状况如何？',
  'condition_note' => '使用/翻新产品时，条件注释会很有帮助',
  'select_supplier' => '推荐字段。这将有助于生成报告',
  'select_warehouse' => '选择要从中运送产品的仓库。',
  'select_packagings' => '运送产品的可用包装选项列表。留空以禁用包装选项',
  'available_from' => '库存可用的日期。默认=立即',
  'sale_price' => '价格不含税。税金将根据运输区域自动计算。',
  'purchase_price' => '推荐字段。这将有助于计算利润并生成报告',
  'min_order_quantity' => '接受订单的数量。必须为整数值。默认值= 1',
  'offer_price' => '报价将在报价开始日期和结束日期之间生效',
  'offer_start' => '要约必须有开始日期。如果提供了报价价格字段，则为必填',
  'offer_end' => '要约必须有结束日期。如果提供了报价价格字段，则为必填',
  'seller_inventory_status' => '该商品可以出售吗？无效商品将不会在市场上显示。',
  'stock_quantity' => '仓库中物品的数量',
  'offer_starting_time' => '优惠开始时间',
  'offer_ending_time' => '优惠结束时间',
  'set_attribute' => '如果该值不在列表中，则可以通过键入新值来添加适当的值',
  'variants' => '产品变体',
  'delete_this_combination' => '删除此组合',
  'romove_this_cart_item' => '从购物车中删除该物品',
  'no_product_found' => '找不到产品！请尝试其他搜索或添加新产品',
  'not_available' => '无法使用！',
  'admin_note' => '管理员注释对客户不可见',
  'message_to_customer' => '该消息将与发票电子邮件一起发送给客户',
  'empty_cart' => '购物车是空的',
  'send_invoice_to_customer' => '通过此消息向客户发送发票',
  'delete_the_cart' => '删除购物车并继续下订单',
  'order_status_send_email' => '订单状态更新时，将向客户发送电子邮件',
  'order_status_email_template' => '订单状态更新时，此电子邮件模板将发送给客户。如果已为状态启用电子邮件，则必选',
  'update_order_status' => '更新订单状态',
  'email_template_name' => '为模板命名。这仅用于系统。',
  'template_use_for' => '该模板将由',
  'email_template_subject' => '这将用作电子邮件的主题。',
  'email_template_body' => '有一些短代码可用于动态信息。检查此表单的底部以查看可用的短代码。',
  'email_template_type' => '电子邮件的类型。',
  'template_sender_email' => '该电子邮件地址将用于发送电子邮件，收件人可以对此进行回复。',
  'template_sender_name' => '该名称将用作发件人名称',
  'packaging_name' => '如果在结帐时有包装选项，客户将看到此信息',
  'width' => '包装宽度',
  'height' => '包装高度',
  'depth' => '包装深度',
  'packaging_cost' => '包装费用。您可以选择是否向客户收取费用',
  'set_as_default_packaging' => '如果选中：此包装将用作默认运输包装',
  'shipping_carrier_name' => '货运公司名称',
  'shipping_zone_name' => '给出区域的名称。客户将看不到此名称。',
  'shipping_rate_name' => '给一个有意义的名字。客户将在结帐时看到此名称。 e。 G。 \'标准运输\'',
  'shipping_zone_carrier' => '您可以链接运输公司。客户将在结帐时看到此信息。',
  'free_shipping' => '如果启用，则免费送货标签将显示在产品列表页面上。',
  'shipping_rate' => '选中“免费送货”选项，或提供0金额的免费送货',
  'shipping_zone_tax' => '当客户从该运输区域购物时，此税收配置文件将适用',
  'shipping_zone_select_countries' => '选择您要运送到的该区域的国家。选中“世界其他地区”选项以了解全球区域。',
  'rest_of_the_world' => '该区域包括您的其他运输区域中未定义的任何国家和地区。',
  'shipping_max_width' => '最大包装宽度由提手搬运。留空以禁用。',
  'shipping_tracking_url' => '“ @”将替换为动态跟踪号',
  'shipping_tracking_url_example' => '例如：http://example.com/track.php?num=@',
  'order_tracking_id' => '运输服务提供商提供的订单跟踪ID。',
  'order_fulfillment_carrier' => '选择运输承运人完成订单。',
  'notify_customer' => '包含必要信息的通知电子邮件将发送给客户。',
  'shipping_weight' => '将用于计算运费。',
  'order_number_prefix_suffix' => '前缀和后缀将自动添加，以格式化所有订单号。如果您不想添加订单号，请将其留空。',
  'customer_not_see_this' => '客户不会看到这个',
  'customer_will_see_this' => '客户会看到这个',
  'refund_select_order' => '选择您要退款的订单',
  'refund_order_fulfilled' => '订单是否发货给客户？',
  'refund_return_goods' => '物品退还给您了吗？',
  'customer_paid' => '客户已支付<strong> <em> :amount </ em> </ strong>，其中包括所有税金，运费和其他费用。',
  'order_refunded' => '先前已退还的<strong> <em> :total </ em> </ strong>中的<strong> <em> :amount </ em> </ strong>',
  'search_customer' => '通过电子邮件地址，好名字或全名找到客户。',
  'coupon_quantity' => '可用优惠券总数',
  'coupon_name' => '名称将用于发票和订单摘要',
  'coupon_code' => '唯一的优惠券代码',
  'coupon_value' => '优惠券的价值',
  'coupon_min_order_amount' => '选择购物车的最低订购量（可选）',
  'coupon_quantity_per_customer' => '选择客户可以使用此优惠券的次数。如果您将其保留为空，那么客户可以使用此优惠券，直到有效为止。',
  'starting_time' => '此优惠券将在此时开始提供',
  'ending_time' => '优惠券将在此之前有效',
  'exclude_tax_n_shipping' => '不含税和运费',
  'exclude_offer_items' => '排除已经有连续报价或折扣的商品',
  'coupon_limited_to_customers' => '选择是否只为特定客户制作优惠券',
  'coupon_limited_to_shipping_zones' => '选择是否只为特定运输区域制作优惠券',
  'coupon_limited_to' => '使用电子邮件地址或姓名查找客户',
  'faq_placeholders' => '您可以在问答中使用此占位符，它将被实际值代替',
  'gift_card_name' => '礼品卡的名称。',
  'gift_card_pin_code' => '唯一的密码。 PIN码是卡的密码。您以后不能更改此值。',
  'gift_card_serial_number' => '卡的唯一序列号。您以后不能更改此值。',
  'gift_card_value' => '卡的价值。客户将获得相同数量的折扣。',
  'gift_card_activation_time' => '卡的激活时间。此时间后可以使用该卡。',
  'gift_card_expiry_time' => '卡的到期时间。该卡在此之前一直有效。',
  'gift_card_partial_use' => '允许部分使用总卡值',
  'number_between' => '在 :min和 :max之间',
  'default_tax_id' => '当运输区域未被任何税区覆盖时，将应用默认税收配置文件。',
  'default_payment_method_id' => '如果选择，则在创建新订单时将预先选择付款方式',
  'config_order_handling_cost' => '这笔额外费用将与每个订单的运输费用一起添加。保留为空白可禁用订单处理费用',
  'default_warehouse' => '添加新库存时将默认选择默认仓库',
  'default_supplier' => '添加新库存时将默认选择默认供应商',
  'default_packaging_ids_for_inventory' => '添加新库存时，将默认选择默认包装。这将帮助您更快地添加库存',
  'config_payment_environment' => '凭据是用于实时模式还是要进行更多测试？',
  'config_authorize_net_transaction_key' => '来自Authorize.net的交易密钥。如果不确定，请联系Authorize.net以获取帮助。',
  'config_authorize_net_api_login_id' => '来自Authorize.net的API登录ID。如果不确定，请联系Authorize.net以获取帮助。',
  'config_enable_payment_method' => '该系统提供各种类型的支付网关。您可以启用/禁用任何付款网关来控制供应商可以用来接受客户付款的付款选项。',
  'config_additional_details' => '当客户选择付款方式时，显示在“付款方式”页面上。',
  'config_payment_instructions' => '客户下订单后显示在“谢谢”页面上。',
  'config_stripe_publishable_key' => '可发布的API密钥仅用于标识您的Stripe帐户，这不是秘密。它们可以安全地发布。',
  'config_paypal_express_account' => '通常是您的PayPal应用程序的电子邮件地址。从此处创建您的PayPal应用程序：https://developer.paypal.com/webapps/developer/applications/myapps',
  'config_paypal_express_client_id' => '客户ID是您的PayPal应用程序的唯一标识符。您可以在PayPal信息中心的“我的应用和凭据”部分中找到此值。',
  'config_paypal_express_secret' => 'PayPal API密钥。您可以在PayPal信息中心的“我的应用和凭据”部分中找到此值。',
  'config_paystack_merchant_email' => '您的Paystack帐户的商家电子邮件。',
  'config_paystack_public_key' => '公钥是您的Paystack应用程序的长唯一标识符。您可以在Paystack信息中心设置中的API密钥和Webhooks部分中找到该值。',
  'config_paystack_secret' => 'Paystack API密钥。您可以在Paystack信息中心设置中的API密钥和Webhooks部分中找到该值。',
  'config_auto_archive_order' => '自动存档订单。如果您不想在完成所有订单后手动对其进行存档，请选择此功能。',
  'config_pagination' => '您要在数据表上每页查看多少个列表项',
  'support_phone' => '客户将联系该电话寻求支持和查询',
  'support_email' => '您会收到所有支持电子邮件到此地址',
  'support_phone_toll_free' => '如果您有免费的客户支持电话号码',
  'default_sender_email_address' => '所有自动发送给客户的电子邮件都将从该电子邮件地址发送。还有在发送电子邮件时无法设置发件人电子邮件地址的情况',
  'default_email_sender_name' => '此名称将用作默认发件人电子邮件地址发送的电子邮件的发件人',
  'google_analytic_report' => '如果系统配置了Google Analytics（分析），则仅应启用此功能。否则，可能会导致错误。查看文档以获取帮助。或者，您可以使用应用程序的内置报告系统。',
  'inventory_linked_items' => '链接的物品将与经常一起购买的物品一起显示在产品页面上。这是可选的，但很重要。',
  'notify_new_message' => '收到新消息时给我发送通知',
  'notify_alert_quantity' => '当我的库存中的任何物品达到警报数量级别时，向我发送通知',
  'notify_inventory_out' => '当我的库存中任何物品缺货时，发送通知给我',
  'notify_new_order' => '在我的商店下了新订单时给我发送通知',
  'notify_abandoned_checkout' => '当客户放弃我的商品结帐时向我发送通知',
  'notify_when_vendor_registered' => '注册新供应商后给我通知',
  'notify_new_ticket' => '在系统上创建支持凭单后向我发送通知',
  'notify_new_disput' => '客户提出新的争议时向我发送通知',
  'notify_when_dispute_appealed' => '当有争议要由市场小组审查时，给我发送通知',
  'download_template' => '<a href=":url">下载示例CSV模板</a>以查看所需格式的示例。',
  'download_category_slugs' => '<a href=":url">下载类别标签</a>，以获取适用于您产品的正确类别。',
  'first_row_as_header' => '第一行是标题。 <strong>请勿更改</ strong>此行。',
  'user_category_slug' => '在类别字段中使用类别<strong>子弹</ strong>。',
  'cover_img' => '此图像将显示在 :page页面的顶部',
  'cat_grp_img' => '此图像将显示在类别下拉框的背景上',
  'cat_grp_desc' => '客户将看不到这一点。但是商人会看到这一点。',
  'inactive_for_back_office' => '如果处于非活动状态，则客户仍然可以访问 :page页面。但是商家将无法使用此 :page将来上市。',
  'invalid_rows_will_ignored' => '无效的行将被<strong>忽略</ strong>。',
  'upload_rows' => '每个批次最多可以上传<strong>：行记录</ strong>，以提高性能。',
  'name_field_required' => '名称字段为必填项。',
  'email_field_required' => '电子邮件为必填项。',
  'invalid_email' => '无效的邮件地址。',
  'invalid_category' => '无效的类别。',
  'category_desc' => '简短说明。客户会看到这一点。',
  'email_already_exist' => '该电子邮件地址已被使用。',
  'slug_already_exist' => '该弹头已在使用中。',
  'display_order' => '该号码将用于安排观看顺序。最小的数字将首先显示。',
  'banner_title' => '此行将在横幅上突出显示。如果不想显示标题，请将其留空。',
  'banner_description' => '（例如：50％Off！）如果您不想显示此内容，请将其保留为空白。',
  'banner_image' => '主图像将显示在背景上。常用产品图片。',
  'banner_background' => '选择一种颜色或上传图像作为背景。',
  'banner_group' => '横幅在店面中的放置。如果未指定组，则横幅不会显示。',
  'bs_columns' => '此横幅将使用多少列？该系统使用12列网格系统来显示横幅。',
  'banner_order' => '此编号将用于在横幅组中安排查看顺序。最小的数字将首先显示。',
  'banner_link' => '用户将重定向到此链接。',
  'link_label' => '链接按钮的标签',
  'slider_link' => '用户将重定向到此链接。',
  'slider_title' => '这条线将在滑块上突出显示。如果不想显示标题，请将其留空。',
  'slider_sub_title' => '标题的第二行。如果您不想显示此内容，请将其留空。',
  'slider_image' => '主图像将显示为滑块。生成滑块需要它。',
  'slider_img_hint' => '滑块图像应为1280x300px',
  'slider_order' => '滑块将按此顺序排列。',
  'slider_thumb_image' => '此小图像将用作缩略图。如果未提供，系统将创建缩略图。',
  'slider_thumb_hint' => '可以是150x59px',
  'variant_image' => '变体的图像',
  'empty_trash' => '清空垃圾。垃圾桶中的所有物品将被永久删除。',
  'hide_trial_notice_on_vendor_panel' => '在供应商面板上隐藏试用通知',
  'language_order' => '您要在语言选项上显示此语言的位置。最小的数字将首先显示。',
  'locale_active' => '您要在语言选项上显示此语言吗？',
  'locale_code' => '语言环境代码，该代码必须与语言文件夹具有相同的名称。',
  'locale_code_exmaple' => '英文示例代码为<em> en </ em>',
  'new_language_info' => '除非您确实进行语言目录的事务处理，否则新语言不会影响系统。检查文档以了解详细信息。',
  'php_locale_code' => '供系统使用的PHP语言环境代码，例如翻译日期，时间等。请在文档中找到PHP语言环境代码的完整列表。',
  'rtl' => '语言是从右到左（RTL）吗？',
  'select_all_verification_documents' => '一次选择所有文档。',
  'system_default_language' => '系统默认语言',
  'update_trial_period' => '更新试用期',
  'vendor_needs_approval' => '如果启用，则每个新供应商都需要获得平台管理面板的手动批准才能生效。',
  'verified_seller' => '验证卖家',
  'mark_address_verified' => '标记为地址已验证',
  'mark_id_verified' => '标记为ID已验证',
  'mark_phone_verified' => '标记为手机已验证',
  'missing_required_data' => '无效的数据，缺少一些必需的数据。',
  'invalid_catalog_data' => '无效的目录数据，重新检查GTIN和其他信息。',
  'product_have_to_be_catalog' => '该产品必须存在于<strong>目录</ strong>系统中。否则它将不会上传。',
  'need_to_know_product_gtin' => '上传之前，您需要知道这些项目的<strong> GTIN </ strong>。',
  'multi_img_upload_instruction' => '您最多可以上传 :number张图片，每个文件大小不能超过 :size KB',
  'number_of_img_upload_required' => '您必须至少选择<b> {n} </ b> {files}个文件才能上传。请重试您的上传！',
  'msg_invalid_file_extension' => '文件{name}的扩展名无效。仅支持<b> {extensions} </ b>文件。',
  'number_of_img_upload_exceeded' => '您最多可以上传<b> {m} </ b>个文件（检测到<b> {n} </ b>个文件）。',
  'msg_invalid_file_too_learge' => '文件{name}（<b> {size} KB </ b>）超出了允许的最大上传大小<b> {maxSize} KB </ b>。请重试您的上传！',
  'required_fields_csv' => '这些字段是<strong>必填</ strong> <em>：fields </ em>。',
  'seller_condition_note' => '输入有关项目条件的更多详细信息。这将帮助客户了解该物品。',
  'active_business_zone' => '您的业​​务运营区域。供应商将只能在活动区域​​内创建运输区域。',
  'config_show_seo_info_to_frontend' => '显示SEO信息，例如元标题，元描述，前端标签。',
  'config_can_use_own_catalog_only' => '如果启用，则供应商只能使用他/她自己的目录产品来创建列表。',
  'currency_iso_numeric' => 'ISO 4217数字代码。例如：USD = 840，JPY = 392',
  'country_iso_numeric' => 'ISO 3166-1数字代码。例如：美国= 840，日本= 392',
  'currency_active' => '有效货币将在市场上显示。',
  'country_active' => '有效货币将包含在业务区域中。',
  'currency_symbol' => '货币符号',
  'currency_disambiguate_symbol' => '示例：USD = US $，BDT = BD $',
  'currency_html_entity' => '例如：JPY =¥和INR =₹',
  'currency_smallest_denomination' => '货币的最小面额。预设值为1',
  'currency_subunit_to_unit' => '一个单元需要多个子单元。默认值为100',
  'eea' => '欧洲经济区',
  'support_agent' => '支持代理将获得所有支持通知。如果未设置，则商家将获得所有通知。',
  'show_refund_policy_with_listing' => '在前端的产品描述页面上显示退货和退款政策。',
  'show_shop_desc_with_listing' => '在前端的产品描述页面上显示商店描述。',
  'shipping_zone_select_states' => '如果您没有找到所需的选项，则可能是该地区的市场无法运作。您可以联系市场支持管理员以请求添加区域。',
  'marketplace_business_area' => '市场业务区',
  'notify_new_chat' => '当新的聊天消息到来时给我发送电子邮件通知',
  'not_in_business_area' => '该区域不在市场的活跃业务区域中。也许最近被市场管理员删除了。',
  'region_iso_code' => '地区ISO代码必须正确。阅读文档中的“业务领域”部分以获取帮助。',
  'subscribers_count' => '活跃用户数',
  'this_plan_has_active_subscribers' => '该计划有有效的订阅者，因此无法删除。',
  'max_chat_allowed' => '最多 :size个字符。',
  'mobile_slider_image' => '移动应用程序的滑块图像。如果未提供，系统将在移动设备上隐藏此滑块。',
);