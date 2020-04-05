<?php 
return array (
  'add_input_field' => '入力フィールドを追加',
  'remove_input_field' => 'この入力フィールドを削除',
  'marketplace_name' => 'マーケットプレイス名の名前。訪問者にはこの名前が表示されます。',
  'system_legal_name' => 'ビジネスの正式名称',
  'min_pass_lenght' => '最小6文字',
  'role_name' => 'ユーザー役割のタイトル',
  'role_type' => 'プラットフォームと商人。役割タイプのプラットフォームはメインプラットフォームユーザーのみが利用でき、マーチャントはこの役割を使用できません。マーチャントロールタイプは、マーチャントが新しいユーザーを追加するときに使用できます。',
  'role_level' => '役割レベルは、誰が誰を制御できるかを決定するために使用されます。例：役割レベル2のユーザーは、役割レベル1のユーザーを変更できません。役割がエンドレベルユーザー用である場合は、emtyを保持します。',
  'you_cant_set_role_level' => 'この値を設定できるのはトップレベルユーザーのみです。',
  'cant_edit_special_role' => 'この役割タイプは編集できません。この役割の許可を変更するように注意してください。',
  'set_role_permissions' => '役割の許可を非常に慎重に設定します。適切なモジュールを取得するには、「ロールタイプ」を選択します。',
  'permission_modules' => 'モジュールを有効にして、モジュールの権限を設定します',
  'shipping_rate_delivery_takes' => '具体的には、お客様にこれが表示されます。',
  'type_dbreset' => 'ボックスに「RESET」と正確に入力して、希望を確認します。',
  'type_environment' => 'ボックスに正確な単語「環境」を入力して、希望を確認します。',
  'type_uninstall' => 'ボックスに正確な単語「アンインストール」を入力して、希望を確認します。',
  'module' => 
  array (
    'name' => 'このロールの下のすべてのユーザーは、 :moduleを管理するために指定されたアクションを実行できます。',
    'access' => 
    array (
      'common' => 'これは :Accessモジュールです。つまり、プラットフォームユーザーとマーチャントユーザーの両方がアクセスできます。',
      'platform' => 'これは :Accessモジュールです。つまり、プラットフォームユーザーのみがアクセスできます。',
      'merchant' => 'これは :Accessモジュールです。これは、マーチャントユーザーのみがアクセスできることを意味します。',
    ),
  ),
  'currency_iso_code' => 'ISO 4217コード。たとえば、米ドルのコードはUSDで、日本の通貨コードはJPYです。',
  'country_iso_code' => 'ISO 3166_2コード。たとえば、例：アメリカ合衆国の場合、コードはUSです。',
  'currency_subunit' => '基本単位の一部であるサブユニット。たとえば、cent、centavo、paisa',
  'currency_symbol_first' => '例：$ 13.21',
  'currency_decimalpoint' => '例：13.21、13、21',
  'currency_thousands_separator' => '例：1,000、1.000、1000',
  'cover_img_size' => 'カバー画像のサイズは1280x300pxである必要があります',
  'slug' => '通常、スラッグは検索エンジンに優しいURLです',
  'shop_slug' => 'これはショップのURLとして使用されます。後で変更することはできません。あなたのショップにナメクジを選ぶために創造的である',
  'shop_url' => 'ショップのランディングページへの完全なパス。 URLを変更することはできません。',
  'shop_timezone' => 'タイムゾーンはショップやマーケットプレイスには影響しません。あなたの店についてもっと知るために',
  'url' => 'ウェブアドレス',
  'optional' => '（オプション）',
  'use_markdown_to_bold' => '強調する重要なキーワードの両側に**を追加',
  'announcement_action_text' => 'お知らせを任意のURLにリンクするオプションのアクションボタン',
  'announcement_action_url' => 'ブログ投稿へのアクションURLまたは任意のURL',
  'blog_feature_img_hint' => '画像サイズは960x480pxである必要があります',
  'code' => 'コード',
  'brand' => '製品のブランド。必須ではありませんが推奨',
  'shop_name' => 'ショップのブランド名または表示名',
  'shop_status' => 'アクティブな場合、ショップはすぐにライブになります。',
  'shop_maintenance_mode_handle' => 'メンテナンスモードがオンの場合、ショップはオフラインになり、メンテナンスがオフになるまですべてのリストがマーケットプレイスからダウンします。',
  'system_maintenance_mode_handle' => 'メンテナンスモードがオンの場合、マーケットプレイスはオフラインになり、メンテナンスモードフラグが訪問者に表示されます。商人は引き続き管理パネルにアクセスできます。',
  'system_physical_address' => 'マーケットプレイス/オフィスの物理的な場所',
  'system_email' => 'すべての通知はこのメールアドレスに送信され、サポートメールを受け入れます（設定されている場合）',
  'system_timezone' => 'このシステムは、このタイムゾーンを使用して動作します。',
  'system_currency' => '市場通貨',
  'system_slogan' => '市場を最もよく説明するキャッチフレーズ',
  'system_length_unit' => '長さの単位は、市場全体で使用されます。',
  'system_weight_unit' => '重量単位は、市場全体で使用されます。',
  'system_valume_unit' => '単位は市場全体で使用されます。',
  'ask_customer_for_email_subscription' => '新しい顧客がアカウントを登録するとき、顧客がプロモーションやその他の通知を電子メールで受け取りたいかどうか尋ねます。オプションをオフにすると、自動サブスクリプションになります。その場合は、契約条件セクションで明確にしてください。',
  'allow_guest_checkout' => 'これにより、顧客はサイトに登録せずにチェックアウトできます。',
  'vendor_can_view_customer_info' => 'これにより、ベンダーは注文ページで顧客の詳細情報を見ることができます。それ以外の場合は、名前、メールアドレス、請求先/配送先住所が表示されます。',
  'system_pagination' => '管理パネルでデータテーブルのページネーション値を設定します。',
  'subscription_name' => 'サブスクリプションプランにわかりやすい名前を付けます。',
  'subscription_plan_id' => 'これは、StripeのプランIDと完全に一致する必要がある識別子です',
  'featured_subscription' => '注目のサブスクリプションは1つだけにしてください',
  'subscription_cost' => '月あたりのサブスクリプションのコスト',
  'team_size' => 'チームサイズは、このチームに登録できるユーザーの総数です。',
  'inventory_limit' => '合計リストの数。同じ製品のバリアントは、異なるアイテムと見なされます。',
  'marketplace_commission' => 'マーケットプレイスによる注文アイテムの値付け料金の割合',
  'transaction_fee' => '取引ごとに定額料金を請求する場合',
  'subscription_best_for' => 'このパッケージの対象顧客。これは顧客に表示されます。',
  'config_return_refund' => 'ショップの返品および返金ポリシー。指定する前に、マーケットプレイスのポリシーをお読みください。',
  'config_trial_days' => '試用期間後、販売者に請求されます。カードを前払いしない場合、この時間を過ぎると販売アカウントはフリーズします。',
  'charge_after_trial_days' => ' :days日間の試用期間後に請求されます。',
  'required_card_upfront' => '販売者が登録するときにカード情報を取得しますか？',
  'leave_empty_to_save_as_draft' => '空のままにして下書きとして保存します',
  'logo_img_size' => 'ロゴの画像サイズは300x300px以上である必要があります',
  'brand_logo_size' => 'ロゴ画像のサイズは120x40pxおよび.pngである必要があります',
  'brand_icon_size' => 'アイコン画像のサイズは32x32pxおよび.pngである必要があります',
  'config_alert_quantity' => '在庫がアラート数量を下回った場合、通知メールが送信されます',
  'config_max_img_size_limit_kb' => '最大画像サイズ制限システムは、製品/在庫/ロゴ/アバターをアップロードできます。キロバイト単位のサイズ。',
  'config_max_number_of_inventory_imgs' => '1つの在庫アイテムにアップロードできる画像の数を選択します。',
  'config_address_default_country' => 'この値を設定すると、住所フォームにすばやく記入できます。明らかに、ユーザーは新しいアドレスを追加するときに値を変更できます。',
  'config_address_default_state' => 'この値を設定すると、住所フォームにすばやく記入できます。明らかに、ユーザーは新しいアドレスを追加するときに値を変更できます。',
  'config_show_address_title' => '住所の表示/印刷中に住所タイトルを表示/非表示します。',
  'config_address_show_country' => '住所の表示/印刷中に国名を表示/非表示します。これは、小さな地域内の市場の場合に役立ちます。',
  'config_address_show_map' => 'アドレス付きの地図を表示したいですか？このオプションは、Googleマップを使用してマップを生成します。',
  'config_show_currency_symbol' => '価格を表すときに通貨記号を表示しますか？例：$ 123',
  'config_show_space_after_symbol' => '記号の後にスペースを入れて価格をフォーマットします。例：123ドル',
  'config_decimals' => '小数点の後に何桁表示したいですか？例：13.21、13.123',
  'config_gift_card_pin_size' => 'ギフトカードのPIN番号を生成する桁数。デフォルトの長さ10',
  'config_gift_card_serial_number_size' => 'ギフトカードのシリアル番号を生成する桁数。デフォルトの長さ13',
  'config_coupon_code_size' => 'クーポンコードを生成する桁数。デフォルトの長さ8',
  'shop_email' => 'すべての通知はこの電子メールアドレス（在庫、注文、チケット、紛争など）に送信されます。カスタマーサポートの電子メールを受け入れます（設定されている場合）',
  'shop_legal_name' => 'ショップの正式名称',
  'shop_owner_id' => 'ショップの所有者およびスーパー管理者。商人として登録されたユーザーは、ショップを所有できます。これは後で変更できません。',
  'shop_description' => 'ショップのブランド説明。この情報はショップのホームページに表示されます。',
  'attribute_type' => '属性のタイプ。これは、製品ページにオプションを表示するのに役立ちます。',
  'attribute_name' => 'この名前は製品ページに表示されます。',
  'attribute_value' => 'この値は、選択可能なオプションとして製品ページに表示されます。',
  'parent_attribute' => 'この属性の下にオプションが表示されます。',
  'list_order' => 'リストの順序を表示します。',
  'shop_external_url' => 'あなたがここに外部リンクを置くことができるウェブサイトを所有している場合、URLはショップのランディングページとして設定できます。',
  'product_name' => '顧客にはこれは表示されません。この名前は、商人がリストするアイテムを見つけるのに役立ちます。',
  'product_featured_image' => '顧客にはこれは表示されません。これは、商人がリスト用のアイテムを見つけるのに役立ちます。',
  'product_images' => 'この画像は、販売者のリストに表示する画像がない場合にのみ顧客に表示されます。',
  'product_active' => '商人はアクティブなアイテムのみを見つけます。',
  'product_description' => '顧客にはこれが表示されます。これは、コアおよび一般的な製品の説明です。',
  'model_number' => '製造元によって指定された製品の識別子。必須ではありませんが推奨',
  'gtin' => 'グローバルトレードアイテム番号（GTIN）は、グローバル市場での製品の一意の識別子です。製品のISBNコードまたはUPCコードを取得する場合は、次のWebサイトで詳細を確認できます。http：//www.isbn.org/およびhttp://www.uc-council.org/',
  'mpn' => '製造業者部品番号（MPN）は、製造業者によって発行された一意の識別子です。メーカーからMPNを入手できます。必須ではありませんが推奨',
  'sku' => 'SKU（Stock Keeping Unit）は販売者固有の識別子です。在庫管理に役立ちます',
  'isbn' => '国際標準図書番号（ISBN）は、一意の商用図書識別子バーコードです。各ISBNコードは本を一意に識別します。 ISBNには10桁または13桁があります。 2007年1月1日以降に割り当てられたすべてのISBNは13桁です。通常、ISBNは本の裏表紙に印刷されています',
  'ean' => '欧州記事番号（EAN）はバーコード標準で、12桁または13桁の製品識別コードです。 EANはメーカーから入手できます。製品にメーカーEANがなく、EANコードを購入する必要がある場合は、GS1 UK http://www.gs1uk.orgにアクセスしてください。',
  'upc' => 'GTIN-12およびUPC-Aとも呼ばれるユニバーサル製品コード（UPC）。通常、小売商品に印刷されたバーコードに関連付けられている商用製品の一意の数値識別子',
  'meta_title' => 'タイトルタグ（技術的にはtitle要素と呼ばれる）は、ドキュメントのタイトルを定義します。タイトルタグは、特定のページのプレビュースニペットを表示するために検索エンジン結果ページ（SERP）でよく使用され、SEOとソーシャル共有の両方で重要です',
  'meta_description' => 'メタ記述は、Webページのコンテンツの簡潔な説明を提供するHTML属性です。メタ記述は、特定のページのプレビュースニペットを表示するために、検索エンジンの結果ページ（SERP）で一般的に使用されます',
  'catalog_min_price' => '製品の最低価格を設定します。ベンダーは、この価格制限内で在庫を追加できます。',
  'catalog_max_price' => '製品の最高価格を設定します。ベンダーは、この価格制限内で在庫を追加できます。',
  'has_variant' => 'このアイテムには、さまざまな色、形、サイズなどのバリエーションがあります。',
  'requires_shipping' => 'この商品は送料が必要です。',
  'downloadable' => 'このアイテムはデジタルコンテンツであり、購入者はアイテムをダウンロードできます。',
  'manufacturer_url' => 'メーカーの公式Webサイトリンク。',
  'manufacturer_email' => 'システムはこの電子メールアドレスを使用して製造元と通信します。',
  'manufacturer_phone' => 'メーカーのサポート電話番号。',
  'supplier_email' => 'システムはこの電子メールアドレスを使用してサプライヤーと通信します。',
  'supplier_contact_person' => '連絡窓口',
  'shop_address' => 'ショップの物理的な住所。',
  'search_product' => 'UPC、ISBN、EAN、JAN、ITFなどのGTIN識別子を使用できます。名前とモデル番号、または名前またはモデル番号の一部を使用することもできます。',
  'seller_description' => 'これは、製品の販売者固有の説明です。顧客はこれを見ます',
  'seller_product_condition' => '製品の現在の状態は何ですか？',
  'condition_note' => '条件ノートは、製品を使用/再生するときに役立ちます',
  'select_supplier' => '推奨フィールド。これは、レポートの生成に役立ちます',
  'select_warehouse' => '製品が出荷される倉庫を選択します。',
  'select_packagings' => '製品を出荷するために利用可能なパッケージオプションのリスト。パッケージオプションを無効にするには空白のままにします',
  'available_from' => '在庫が利用可能になる日付。デフォルト=即時',
  'sale_price' => '税抜きの価格。税は配送区域に基づいて自動的に計算されます。',
  'purchase_price' => '推奨フィールド。これは、利益の計算とレポートの生成に役立ちます',
  'min_order_quantity' => '注文を受けることができる数量。整数値でなければなりません。デフォルト= 1',
  'offer_price' => 'オファーの価格は、オファーの開始日と終了日の間に影響を受けます',
  'offer_start' => 'オファーには開始日が必要です。オファー価格フィールドが指定されている場合は必須',
  'offer_end' => 'オファーには終了日が必要です。オファー価格フィールドが指定されている場合は必須',
  'seller_inventory_status' => 'アイテムは販売されていますか？非アクティブなアイテムはマーケットプレイスに表示されません。',
  'stock_quantity' => '倉庫にあるアイテムの数',
  'offer_starting_time' => '提供開始時間',
  'offer_ending_time' => '提供終了時間',
  'set_attribute' => '値がリストにない場合は、新しい値を入力するだけで適切な値を追加できます',
  'variants' => '製品のバリエーション',
  'delete_this_combination' => 'この組み合わせを削除',
  'romove_this_cart_item' => 'このアイテムをカートから削除します',
  'no_product_found' => '製品が見つかりません！別の検索を試すか、新しい製品を追加してください',
  'not_available' => '利用不可！',
  'admin_note' => '管理者メモは顧客には表示されません',
  'message_to_customer' => 'このメッセージは、請求書メールとともにお客様に送信されます',
  'empty_cart' => 'カートは空です',
  'send_invoice_to_customer' => 'このメッセージを記載した請求書を顧客に送信します',
  'delete_the_cart' => 'カートを削除して注文を進めます',
  'order_status_send_email' => '注文ステータスが更新されると、顧客にメールが送信されます',
  'order_status_email_template' => 'このメールテンプレートは、注文ステータスが更新されるとお客様に送信されます。ステータスに対してメールが有効になっている場合は必須',
  'update_order_status' => '注文ステータスを更新する',
  'email_template_name' => 'テンプレートに名前を付けます。これはシステム専用です。',
  'template_use_for' => 'テンプレートは',
  'email_template_subject' => 'これは、電子メールの件名として使用されます。',
  'email_template_body' => '動的な情報に使用できる短いコードがいくつかあります。このフォームの下部をチェックして、利用可能な短いコードを確認してください。',
  'email_template_type' => '電子メールのタイプ。',
  'template_sender_email' => 'このメールアドレスはメールの送信に使用され、受信者はこれに返信できます。',
  'template_sender_name' => 'この名前は送信者名として使用されます',
  'packaging_name' => '注文チェックアウトでパッケージオプションが利用可能な場合、お客様にこれが表示されます。',
  'width' => '包装の幅',
  'height' => '包装の高さ',
  'depth' => '包装の深さ',
  'packaging_cost' => 'パッケージングのコスト。顧客に費用を請求するかどうかを選択できます',
  'set_as_default_packaging' => 'チェックした場合：このパッケージはデフォルトの出荷パッケージとして使用されます',
  'shipping_carrier_name' => '配送業者の名前',
  'shipping_zone_name' => 'ゾーンの名前を付けます。顧客にはこの名前は表示されません。',
  'shipping_rate_name' => '意味のある名前を付けてください。この名前は、チェックアウト時にお客様に表示されます。 e。 g。 \'通常輸送\'',
  'shipping_zone_carrier' => '配送業者をリンクできます。顧客はチェックアウト時にこれを見るでしょう。',
  'free_shipping' => '有効にすると、送料無料ラベルが商品リストページに表示されます。',
  'shipping_rate' => '「送料無料」オプションをチェックするか、送料無料の金額を0にしてください',
  'shipping_zone_tax' => 'この税プロファイルは、顧客がこの配送ゾーンから購入するときに適用されます',
  'shipping_zone_select_countries' => 'このゾーンに発送する国を選択してください。ワールドワイドゾーンのその他のオプションを確認してください。',
  'rest_of_the_world' => 'このゾーンには、他の配送ゾーンでまだ定義されていない国と地域が含まれます。',
  'shipping_max_width' => 'キャリアによる最大パッケージ幅ハンドル。無効にするには空のままにします。',
  'shipping_tracking_url' => '「@」は動的追跡番号に置き換えられます',
  'shipping_tracking_url_example' => '例：http://example.com/track.php?num=@',
  'order_tracking_id' => '配送サービスプロバイダーが提供する注文追跡ID。',
  'order_fulfillment_carrier' => '注文を履行する配送業者を選択します。',
  'notify_customer' => '必要な情報を記載した通知メールがお客様に送信されます。',
  'shipping_weight' => 'は送料の計算に使用されます。',
  'order_number_prefix_suffix' => 'プレフィックスとサフィックスが自動的に追加され、すべての注文番号がフォーマットされます。注文番号をフォーマットしたくない場合は空白のままにします。',
  'customer_not_see_this' => '顧客はこれを見ません',
  'customer_will_see_this' => '顧客はこれを見ます',
  'refund_select_order' => '払い戻しする注文を選択します',
  'refund_order_fulfilled' => '注文は顧客に出荷されますか？',
  'refund_return_goods' => 'アイテムは返されますか？',
  'customer_paid' => 'お客様は、すべての税金、送料などを含めて、<strong> <em> :amount </ em> </ strong>を支払いました。',
  'order_refunded' => '以前に払い戻された合計<strong> <em> :total </ em> </ strong>の<strong> <em> :amount </ em> </ strong>',
  'search_customer' => 'メールアドレス、ナイスネーム、またはフルネームで顧客を見つけます。',
  'coupon_quantity' => '利用可能なクーポンの総数',
  'coupon_name' => '名前は、請求書と注文の概要で使用されます',
  'coupon_code' => 'ユニークなクーポンコード',
  'coupon_value' => 'クーポンの価値',
  'coupon_min_order_amount' => 'カートの最小注文量を選択してください（オプション）',
  'coupon_quantity_per_customer' => '顧客がこのクーポンを使用できる回数を選択します。空のままにすると、顧客はこのクーポンを使用可能になるまで使用できます。',
  'starting_time' => 'クーポンはこの時期から利用可能になります',
  'ending_time' => 'クーポンはこの時間まで利用できます',
  'exclude_tax_n_shipping' => '税金と送料を除外する',
  'exclude_offer_items' => '既に実行中のオファーまたは割引があるアイテムを除外する',
  'coupon_limited_to_customers' => '特定の顧客のみにクーポンを作成するかどうかを選択します',
  'coupon_limited_to_shipping_zones' => '特定の配送地域のクーポンのみを作成するかどうかを選択します',
  'coupon_limited_to' => 'メールアドレスまたは名前を使用して顧客を見つける',
  'faq_placeholders' => '質問と回答でこのプレースホルダーを使用できます。これは実際の値に置き換えられます',
  'gift_card_name' => 'ギフトカードの名前。',
  'gift_card_pin_code' => '固有の秘密コード。 PINコードはカードのパスコードです。後でこの値を変更することはできません。',
  'gift_card_serial_number' => 'カードの一意のシリアル番号。後でこの値を変更することはできません。',
  'gift_card_value' => 'カードの価値。顧客は同額の割引を受けます。',
  'gift_card_activation_time' => 'カードのアクティベーション時間。この時間以降はカードを使用できます。',
  'gift_card_expiry_time' => 'カードの有効期限。カードはこの時間まで有効です。',
  'gift_card_partial_use' => '合計カード価値の部分的な使用を許可する',
  'number_between' => ' :minと :maxの間',
  'default_tax_id' => 'デフォルトの税プロファイルは、配送区域が税区域の対象外の場合に適用されます。',
  'default_payment_method_id' => '選択した場合、新しい注文の作成時に支払い方法が事前に選択されます',
  'config_order_handling_cost' => 'この追加費用は、すべての注文の送料に追加されます。空白のままにして、注文処理料金を無効にします',
  'default_warehouse' => '新しい在庫を追加するときにデフォルトの倉庫が事前に選択されます',
  'default_supplier' => '新しい在庫を追加すると、デフォルトのサプライヤが事前に選択されます',
  'default_packaging_ids_for_inventory' => '新しいインベントリを追加すると、デフォルトのパッケージが事前に選択されます。これにより、インベントリをより迅速に追加できます',
  'config_payment_environment' => '資格情報はライブモード用ですか、それともテスト用ですか？',
  'config_authorize_net_transaction_key' => 'Authorize.netからのトランザクションキー。よくわからない場合は、Authorize.netに連絡して支援を受けてください。',
  'config_authorize_net_api_login_id' => 'Authorize.netからのAPIログインID。よくわからない場合は、Authorize.netに連絡して支援を受けてください。',
  'config_enable_payment_method' => 'システムは、さまざまなタイプの支払いゲートウェイを提供します。支払いゲートウェイを有効または無効にして、ベンダーが顧客からの支払いを受け入れるために使用できる支払いオプションを制御できます。',
  'config_additional_details' => '顧客が支払い方法を選択している間、「支払方法」ページに表示されます。',
  'config_payment_instructions' => '顧客が注文した後、ありがとうページに表示されます。',
  'config_stripe_publishable_key' => '公開可能なAPIキーは、Stripeでアカウントを識別するためだけのものであり、秘密ではありません。安全に公開できます。',
  'config_paypal_express_account' => '通常、PayPalアプリケーションのメールアドレス。ここからPayPalアプリケーションを作成します：https://developer.paypal.com/webapps/developer/applications/myapps',
  'config_paypal_express_client_id' => 'クライアントIDは、PayPalアプリケーションの一意の長い識別子です。この値は、PayPalダッシュボードの[マイアプリと認証情報]セクションにあります。',
  'config_paypal_express_secret' => 'PayPal APIシークレットキー。この値は、PayPalダッシュボードの[マイアプリと認証情報]セクションにあります。',
  'config_paystack_merchant_email' => 'Paystackアカウントの販売者のメール。',
  'config_paystack_public_key' => '公開鍵は、Paystackアプリケーションの一意の長い識別子です。この値は、Paystackダッシュボードの設定のAPIキーとWebhooksセクションにあります。',
  'config_paystack_secret' => 'Paystack APIシークレットキー。この値は、Paystackダッシュボードの設定のAPIキーとWebhooksセクションにあります。',
  'config_auto_archive_order' => '注文を自動的にアーカイブします。すべての注文が履行された後に手動でアーカイブしない場合は、この機能を選択します。',
  'config_pagination' => 'データテーブルのページごとに表示するリストアイテムの数',
  'support_phone' => 'お客様は、サポートと問い合わせのためにこの番号に連絡します',
  'support_email' => 'このアドレスへのすべてのサポートメールが届きます',
  'support_phone_toll_free' => 'カスタマーサポート用のフリーダイヤル番号がある場合',
  'default_sender_email_address' => '顧客への自動メールはすべて、このメールアドレスから送信されます。また、メールの送信中に送信者のメールアドレスを設定できない場合',
  'default_email_sender_name' => 'この名前は、デフォルトの送信者のメールアドレスから送信されるメールの送信者として使用されます',
  'google_analytic_report' => 'システムがGoogleアナリティクスで設定されている場合にのみ、これを有効にする必要があります。そうしないと、エラーが発生する可能性があります。ヘルプをドキュメントで確認してください。または、アプリケーションの組み込みレポートシステムを使用できます。',
  'inventory_linked_items' => 'リンクされたアイテムは、頻繁に一緒に購入したアイテムとして製品ページに表示されます。これはオプションですが、重要です。',
  'notify_new_message' => '新しいメッセージが到着したときに通知を送信する',
  'notify_alert_quantity' => '在庫のアイテムがアラート数量レベルに達したときに通知を受け取る',
  'notify_inventory_out' => '在庫のアイテムが在庫切れになったときに通知を送信する',
  'notify_new_order' => 'ストアで新しい注文が行われたときに通知を受け取る',
  'notify_abandoned_checkout' => '顧客が私のアイテムのチェックアウトを放棄したときに通知を送信する',
  'notify_when_vendor_registered' => '新しいベンダーが登録されたときに通知を受け取る',
  'notify_new_ticket' => 'システムでサポートチケットが作成されたときに通知を送信する',
  'notify_new_disput' => '顧客が新しい紛争を提出したときに通知を受け取る',
  'notify_when_dispute_appealed' => 'マーケットプレイスチームによるレビューへの異議申し立てが行われたときに通知を送信する',
  'download_template' => '<a href=":url">サンプルCSVテンプレートをダウンロード</a>して、必要な形式の例を確認します。',
  'download_category_slugs' => '<a href=":url">カテゴリのスラッグをダウンロード</a>して、製品の正しいカテゴリを取得します。',
  'first_row_as_header' => '最初の行はヘッダーです。この行を<strong>変更しないでください</ strong>。',
  'user_category_slug' => 'カテゴリフィールドでカテゴリ<strong> slug </ strong>を使用します。',
  'cover_img' => 'この画像は :pageページの上部に表示されます',
  'cat_grp_img' => 'この画像は、カテゴリのドロップダウンボックスの背景に表示されます',
  'cat_grp_desc' => '顧客にはこれは表示されません。しかし、商人はこれを見るでしょう。',
  'inactive_for_back_office' => '非アクティブの場合、顧客は引き続き :pageページにアクセスできます。ただし、商人はこのリストを将来のリストに使用することはできません。',
  'invalid_rows_will_ignored' => '無効な行は<strong>無視されます</ strong>。',
  'upload_rows' => 'パフォーマンスを向上させるため、バッチごとに最大<strong>：rowsレコード</ strong>をアップロードできます。',
  'name_field_required' => '名前フィールドは必須です。',
  'email_field_required' => 'メールが必要です。',
  'invalid_email' => '無効な電子メールアドレス。',
  'invalid_category' => '無効なカテゴリ。',
  'category_desc' => '簡単に説明してください。顧客にはこれが表示されます。',
  'email_already_exist' => 'すでに使用されているメールアドレス。',
  'slug_already_exist' => 'すでに使用されているナメクジ。',
  'display_order' => 'この番号は、表示順序を調整するために使用されます。最も小さい番号が最初に表示されます。',
  'banner_title' => 'この行はバナー上で強調表示されます。タイトルを表示したくない場合は空白のままにします。',
  'banner_description' => '（例：50％オフ！）これを表示したくない場合は空白のままにします。',
  'banner_image' => '背景の上に表示されるメイン画像。一般的に製品イメージを使用します。',
  'banner_background' => '背景として色を選択するか、画像をアップロードします。',
  'banner_group' => '店頭でのバナーの配置。グループが指定されていない場合、バナーは表示されません。',
  'bs_columns' => 'このバナーが使用する列数は？システムはバナーを表示するために12列のグリッドシステムを使用します。',
  'banner_order' => 'この番号は、バナーのグループで表示順序を調整するために使用されます。最も小さい番号が最初に表示されます。',
  'banner_link' => 'ユーザーはこのリンクにリダイレクトします。',
  'link_label' => 'リンクボタンのラベル',
  'slider_link' => 'ユーザーはこのリンクにリダイレクトします。',
  'slider_title' => 'この行はスライダー上で強調表示されます。タイトルを表示したくない場合は空白のままにします。',
  'slider_sub_title' => 'タイトルの2行目。これを表示したくない場合は空白のままにします。',
  'slider_image' => 'スライダーとして表示されるメイン画像。スライダーを生成するために必要です。',
  'slider_img_hint' => 'スライダーの画像は1280x300pxである必要があります',
  'slider_order' => 'スライダーはこの順序で配置されます。',
  'slider_thumb_image' => 'この小さな画像はサムネイルとして使用されます。提供されない場合、システムはサムネイルを作成します。',
  'slider_thumb_hint' => '150x59pxにすることができます',
  'variant_image' => 'バリアントの画像',
  'empty_trash' => 'ゴミ箱を空にします。ゴミ箱にあるすべてのアイテムは完全に削除されます。',
  'hide_trial_notice_on_vendor_panel' => 'ベンダーパネルで試用版を非表示にする',
  'language_order' => '言語オプションでこの言語を表示する位置。最も小さい番号が最初に表示されます。',
  'locale_active' => '言語オプションにこの言語を表示しますか？',
  'locale_code' => 'ロケールコード。コードは言語フォルダーと同じ名前でなければなりません。',
  'locale_code_exmaple' => '英語の例のコードは<em> en </ em>です',
  'new_language_info' => '言語ディレクトリのトランザクションを実際に実行しない限り、新しい言語はシステムに影響しません。詳細についてはドキュメントを確認してください。',
  'php_locale_code' => '日付、時刻などの翻訳のようなシステム用のPHPロケールコード。ドキュメントでPHPロケールコードの完全なリストを見つけてください。',
  'rtl' => '言語は右から左（RTL）ですか？',
  'select_all_verification_documents' => 'すべてのドキュメントを一度に選択します。',
  'system_default_language' => 'システムのデフォルト言語',
  'update_trial_period' => '試用期間の更新',
  'vendor_needs_approval' => '有効にした場合、新しいベンダーはすべて、プラットフォーム管理パネルからの手動承認が必要になります。',
  'verified_seller' => '確認済みの売り手',
  'mark_address_verified' => '住所を確認済みとしてマークする',
  'mark_id_verified' => 'ID確認済みとしてマーク',
  'mark_phone_verified' => '電話確認済みとしてマーク',
  'missing_required_data' => '無効なデータ、いくつかの必須データがありません。',
  'invalid_catalog_data' => 'カタログデータが無効です。GTINとその他の情報を再確認してください。',
  'product_have_to_be_catalog' => '製品は<strong>カタログ</ strong>システムに存在する必要があります。そうでない場合はアップロードされません。',
  'need_to_know_product_gtin' => 'アップロードする前に、アイテムの<strong> GTIN </ strong>を知る必要があります。',
  'multi_img_upload_instruction' => '最大 :number個の画像をアップロードでき、各ファイルサイズは :size KBを超えることはできません',
  'number_of_img_upload_required' => 'アップロードするには、少なくとも<b> {n} </ b> {files}を選択する必要があります。アップロードを再試行してください！',
  'msg_invalid_file_extension' => 'ファイル{名前}の拡張子が無効です。 <b> {extensions} </ b>ファイルのみがサポートされています。',
  'number_of_img_upload_exceeded' => '最大で<b> {m} </ b>ファイルをアップロードできます（<b> {n} </ b>ファイルが検出されました）。',
  'msg_invalid_file_too_learge' => 'ファイル{名前}（<b> {サイズ} KB </ b>）がアップロードの最大許容サイズ<b> {maxSize} KB </ b>を超えています。アップロードを再試行してください！',
  'required_fields_csv' => 'これらのフィールドは<strong>必須</ strong> <em>：フィールド</ em>です。',
  'seller_condition_note' => 'アイテムの状態に関する詳細を入力します。これは、顧客がアイテムを理解するのに役立ちます。',
  'active_business_zone' => 'あなたの事業運営エリア。ベンダーは、アクティブエリア内にのみ配送ゾーンを作成できます。',
  'config_show_seo_info_to_frontend' => 'メタタイトル、メタ説明、タグなどのSEO情報をフロントエンドに表示します。',
  'config_can_use_own_catalog_only' => '有効にすると、ベンダーは自分のカタログ製品のみを使用してリストを作成できます。',
  'currency_iso_numeric' => 'ISO 4217数値コード。例：USD = 840およびJPY = 392',
  'country_iso_numeric' => 'ISO 3166-1数値コード。例：USA = 840およびJAPAN = 392',
  'currency_active' => '有効な通貨は市場に表示されます。',
  'country_active' => '有効通貨はビジネスエリアに含まれます。',
  'currency_symbol' => '通貨記号',
  'currency_disambiguate_symbol' => '例：USD = US $およびBDT = BD $',
  'currency_html_entity' => '例：JPY =¥およびINR =₹',
  'currency_smallest_denomination' => '通貨の最小額面。デフォルト値は1です。',
  'currency_subunit_to_unit' => '1つのユニットに必要なサブユニットの数。デフォルト値は100です。',
  'eea' => '欧州経済地域',
  'support_agent' => 'サポートエージェントはすべてのサポート通知を受け取ります。設定されていない場合、販売者はすべての通知を受け取ります。',
  'show_refund_policy_with_listing' => 'フロントエンドの製品説明ページに返品と返金のポリシーを表示します。',
  'show_shop_desc_with_listing' => 'フロントエンドの製品説明ページにショップの説明を表示します。',
  'shipping_zone_select_states' => '探しているオプションが表示されない場合は、おそらくその市場では市場は機能していません。マーケットプレイスのサポート管理者に連絡して、エリアの追加をリクエストできます。',
  'marketplace_business_area' => 'マーケットプレイスビジネスエリア',
  'notify_new_chat' => '新しいチャットメッセージが届いたときにメール通知を受け取る',
  'not_in_business_area' => 'このエリアは、マーケットプレイスのアクティブなビジネスエリアではありません。たぶん最近、マーケットプレイス管理者によって削除されました。',
);