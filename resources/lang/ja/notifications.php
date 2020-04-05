<?php
return array (
  'password_updated' =>
  array (
    'subject' => ' :marketplaceパスワードが正常に更新されました！',
    'greeting' => 'こんにちは :user！',
    'message' => 'アカウントのログインパスワードが正常に変更されました！この変更を行わなかった場合は、できるだけ早くご連絡ください。下のボタンをクリックして、プロフィールページにログインします。',
    'button_text' => 'あなたのプロフィールをご覧ください',
  ),
  'invoice_created' =>
  array (
    'subject' => ':marketplace毎月の購読料請求書',
    'greeting' => 'こんにちは :merchant！',
    'message' => '引き続きご支援いただきありがとうございます。記録用に請求書のコピーを添付しました。質問や懸念がある場合はお知らせください！',
    'button_text' => 'ダッシュボードに移動します',
  ),
  'customer_registered' =>
  array (
    'subject' => ' :marketplaceマーケットプレイスへようこそ！',
    'greeting' => 'おめでとう :customer！',
    'message' => 'アカウントが正常に作成されました！下のボタンをクリックして、メールアドレスを確認してください。',
    'button_text' => '確認してください',
  ),
  'customer_updated' =>
  array (
    'subject' => 'アカウント情報が正常に更新されました！',
    'greeting' => 'こんにちは :customer！',
    'message' => 'これは、アカウントが正常に更新されたことを知らせる通知です！',
    'button_text' => 'プロフィールにアクセス',
  ),
  'customer_password_reset' =>
  array (
    'subject' => 'パスワード通知をリセット',
    'greeting' => 'こんにちは！',
    'message' => 'アカウントのパスワードリセットリクエストを受け取ったため、このメールを受信して​​います。パスワードのリセットを要求しなかった場合は、この通知を無視してください。これ以上のアクションは不要です。',
    'button_text' => 'パスワードを再設定する',
  ),
  'dispute_acknowledgement' =>
  array (
    'subject' => '[注文ID： :order_id]の異議申し立てが正常に送信されました',
    'greeting' => 'こんにちは :customer',
    'message' => 'これは、注文ID :order_idについての異議申し立てを受け取ったことをお知らせするための通知です。当社のサポートチームができるだけ早くご連絡いたします。',
    'button_text' => '紛争を見る',
  ),
  'dispute_created' =>
  array (
    'subject' => '注文IDの新しい紛争： :order_id',
    'greeting' => 'こんにちは :merchant！',
    'message' => '注文ID： :order_idに関する新しい異議がありました。お客様に問題を確認して解決してください。',
    'button_text' => '紛争を見る',
  ),
  'dispute_updated' =>
  array (
    'subject' => '[注文ID： :order_id]紛争ステータスが更新されました！',
    'greeting' => 'こんにちは :customer！',
    'message' => 'ベンダー「：reply」からのこのメッセージで、注文ID :order_idの紛争が更新されました。以下を確認し、サポートが必要な場合はお問い合わせください。',
    'button_text' => '紛争を見る',
  ),
  'dispute_appealed' =>
  array (
    'subject' => '[注文ID： :order_id]異議申し立て！',
    'greeting' => 'こんにちは！',
    'message' => 'このメッセージ「：reply」を使用して、注文ID :order_idに関する異議申し立てが行われました。詳細については以下を確認してください。',
    'button_text' => '紛争を見る',
  ),
  'appealed_dispute_replied' =>
  array (
    'subject' => '[注文ID： :order_id]異議申し立てに対する新たな対応！',
    'greeting' => 'こんにちは！',
    'message' => '注文ID :order_idの紛争は、次のメッセージで返信されました：</br> </br> "：reply"',
    'button_text' => '紛争を見る',
  ),
  'low_inventory_notification' =>
  array (
    'subject' => '低在庫アラート！',
    'greeting' => 'こんにちは！',
    'message' => '1つ以上の在庫アイテムが少なくなっています。在庫を追加して、アイテムをマーケットプレイスで公開します。',
    'button_text' => 'インベントリを更新',
  ),
  'inventory_bulk_upload_procceed_notice' =>
  array (
    'subject' => 'バルクインベントリのインポートリクエストが処理されました。',
    'greeting' => 'こんにちは！',
    'message' => '一括在庫のインポートリクエストが処理されたことをお知らせいたします。プラットフォームに正常にインポートされた行の合計数 :success、失敗した行数 :failed',
    'failed' => '失敗した行の添付ファイルを見つけてください。',
    'button_text' => 'インベントリを表示',
  ),
  'new_message' =>
  array (
    'subject' => ':subject',
    'greeting' => 'こんにちは :receiver',
    'message' => ':message',
    'button_text' => 'サイトでメッセージを見る',
  ),
  'message_replied' =>
  array (
    'subject' => ':userは :subjectと答えた',
    'greeting' => 'こんにちは :receiver',
    'message' => ':reply',
    'button_text' => 'サイトでメッセージを見る',
  ),
  'order_created' =>
  array (
    'subject' => '[注文ID： :order]ご注文は正常に行われました！',
    'greeting' => 'こんにちは :customer',
    'message' => '私達を選んで頂き有難うございます！ご注文[注文ID :order]が正常に配置されました。注文のステータスをお知らせします。',
    'button_text' => 'お店をご覧ください',
  ),
  'merchant_order_created_notification' =>
  array (
    'subject' => '新規注文[注文ID： :order]があなたのショップに配置されました！',
    'greeting' => 'こんにちは :merchant',
    'message' => '新しい注文[注文ID :order]が発行されました。注文の詳細を確認し、できるだけ早く注文を完了してください。',
    'button_text' => '注文を履行する',
  ),
  'order_updated' =>
  array (
    'subject' => '[注文ID： :order]注文ステータスが更新されました！',
    'greeting' => 'こんにちは :customer',
    'message' => 'これは、注文[注文ID :order]が更新されたことを知らせる通知です。注文の詳細については、以下をご覧ください。ダッシュボードから注文を確認することもできます。',
    'button_text' => 'お店をご覧ください',
  ),
  'order_fulfilled' =>
  array (
    'subject' => '[注文ID： :order]ご注文は完了です！',
    'greeting' => 'こんにちは :customer',
    'message' => 'これは、注文[注文ID :order]が発送されており、配送中であることを知らせる通知です。注文の詳細については、以下をご覧ください。ダッシュボードから注文を確認することもできます。',
    'button_text' => 'お店をご覧ください',
  ),
  'order_paid' =>
  array (
    'subject' => '[注文ID： :order]ご注文は正常に支払われました！',
    'greeting' => 'こんにちは :customer',
    'message' => 'これは、注文[注文ID :order]の支払いが正常に完了し、処理中であることを知らせる通知です。注文の詳細については、以下をご覧ください。ダッシュボードから注文を確認することもできます。',
    'button_text' => 'お店をご覧ください',
  ),
  'order_payment_failed' =>
  array (
    'subject' => '[注文ID： :order]の支払いに失敗しました！',
    'greeting' => 'こんにちは :customer',
    'message' => 'これは、注文[注文ID :order]の支払いが失敗したことを知らせる通知です。注文の詳細については、以下をご覧ください。ダッシュボードから注文を確認することもできます。',
    'button_text' => 'お店をご覧ください',
  ),
  'refund_initiated' =>
  array (
    'subject' => '[注文ID： :order]払い戻しが開始されました！',
    'greeting' => 'こんにちは :customer',
    'message' => 'これは、注文 :orderの払い戻しリクエストを開始したことをお知らせする通知です。チームメンバーの1人がすぐにリクエストを確認します。リクエストのステータスをお知らせします。',
  ),
  'refund_approved' =>
  array (
    'subject' => '[注文ID： :order]払い戻しリクエストが承認されました！',
    'greeting' => 'こんにちは :customer',
    'message' => 'これは、注文 :orderの払い戻しリクエストを承認したことをお知らせする通知です。払い戻し額は2倍です。お支払い方法に送金しました。アカ​​ウントに反映されるまでに数日かかる場合があります。数日経っても影響が出ない場合は、支払いプロバイダーにお問い合わせください。',
  ),
  'refund_declined' =>
  array (
    'subject' => '[注文ID： :order]払い戻しリクエストが拒否されました！',
    'greeting' => 'こんにちは :customer',
    'message' => 'これは、注文 :orderの払い戻しリクエストが拒否されたことを知らせる通知です。販売者のソリューションに満足できない場合は、プラットフォームから直接販売者に連絡するか、 :marketplaceでの異議申し立てを行うこともできます。問題を解決するために介入します。',
  ),
  'shop_created' =>
  array (
    'subject' => 'あなたの店は行く準備ができています！',
    'greeting' => 'おめでとう :merchant！',
    'message' => 'ショップ :shop_nameが正常に作成されました！下のボタンをクリックして、ショップ管理パネルにログインします。',
    'button_text' => 'ダッシュボードに移動します',
  ),
  'shop_updated' =>
  array (
    'subject' => 'ショップ情報が更新されました！',
    'greeting' => 'こんにちは :merchant！',
    'message' => 'これは、ショップ :shop_nameが正常に更新されたことを知らせる通知です！',
    'button_text' => 'ダッシュボードに移動します',
  ),
  'shop_config_updated' =>
  array (
    'subject' => 'ショップ構成が正常に更新されました！',
    'greeting' => 'こんにちは :merchant！',
    'message' => 'ショップの設定が正常に更新されました！下のボタンをクリックして、ショップ管理パネルにログインします。',
    'button_text' => 'ダッシュボードに移動します',
  ),
  'shop_down_for_maintainace' =>
  array (
    'subject' => 'あなたのお店はダウンしています！',
    'greeting' => 'こんにちは :merchant！',
    'message' => 'これは、ショップ :shop_nameがダウンしていることを知らせる通知です。顧客は、再び稼働するまでショップにアクセスできません。',
    'button_text' => '構成ページに移動します',
  ),
  'shop_is_live' =>
  array (
    'subject' => 'ショップがLIVEに戻りました！',
    'greeting' => 'こんにちは :merchant',
    'message' => 'これは、ショップ :shop_nameが正常に機能するようになったことを知らせる通知です。',
    'button_text' => 'ダッシュボードに移動します',
  ),
  'shop_deleted' =>
  array (
    'subject' => 'あなたのショップは :marketplaceから削除されました！',
    'greeting' => 'こんにちは商人！',
    'message' => 'これは、ショップがマーカープレイスから削除されたことをお知らせする通知です！あなたがいなくて寂しいです。',
  ),
  'system_is_down' =>
  array (
    'subject' => 'マーケットプレイス :marketplaceはダウンしています！',
    'greeting' => 'こんにちは :user！',
    'message' => 'これは、マーケットプレイス :marketplaceがダウンしていることを知らせる通知です。再び稼働するまで、顧客はマーケットプレイスにアクセスできません。',
    'button_text' => '構成ページに移動します',
  ),
  'system_is_live' =>
  array (
    'subject' => 'マーケットプレイス :marketplaceがLIVEに戻りました！',
    'greeting' => 'こんにちは :user！',
    'message' => 'これは、マーケットプレイス :marketplaceが正常に機能するようになったことを知らせる通知です。',
    'button_text' => 'ダッシュボードに移動します',
  ),
  'system_info_updated' =>
  array (
    'subject' => ':marketplace-マーケットプレイス情報が正常に更新されました！',
    'greeting' => 'こんにちは :user！',
    'message' => 'これは、マーケットプレイス :marketplaceが正常に更新されたことを知らせる通知です！',
    'button_text' => 'ダッシュボードに移動します',
  ),
  'system_config_updated' =>
  array (
    'subject' => ':marketplace-マーケットプレイス構成が正常に更新されました！',
    'greeting' => 'こんにちは :user！',
    'message' => 'marketplace :marketplaceの構成が正常に更新されました！下のボタンをクリックして、管理パネルにログインします。',
    'button_text' => '設定を表示',
  ),
  'new_contact_us_message' =>
  array (
    'subject' => 'お問い合わせフォームからの新しいメッセージ： :subject',
    'greeting' => 'こんにちは！',
    'message_footer_with_phone' => 'このメールに返信するか、この電話に直接連絡してください :phone',
    'message_footer' => 'このメールに直接返信できます。',
  ),
  'ticket_acknowledgement' =>
  array (
    'subject' => '[チケットID： :ticket_id] :subject',
    'greeting' => 'こんにちは :user',
    'message' => 'これは、チケット :ticket_idを正常に受け取ったことをお知らせする通知です。サポートチームができるだけ早くご連絡いたします。',
    'button_text' => 'チケットを見る',
  ),
  'ticket_created' =>
  array (
    'subject' => '新しいサポートチケット[チケットID： :ticket_id] :subject',
    'greeting' => 'こんにちは！',
    'message' => 'ベンダー :vendorから新しいサポートチケットID :ticket_id、送信者 :senderを受け取りました。サポートチームへのチケットを確認して割り当てます。',
    'button_text' => 'チケットを見る',
  ),
  'ticket_assigned' =>
  array (
    'subject' => '割り当てられたばかりのチケット[チケットIF： :ticket_id] :subject',
    'greeting' => 'こんにちは :user',
    'message' => 'これは、チケットを通知するための通知です[チケットID： :ticket_id] :subjectがちょうどあなたに割り当てられました。できるだけ早くチケットを確認して返信してください。',
    'button_text' => 'チケットに返信する',
  ),
  'ticket_replied' =>
  array (
    'subject' => ':userはチケットに返信しました[チケットID： :ticket_id] :subject',
    'greeting' => 'こんにちは :user',
    'message' => ':reply',
    'button_text' => 'チケットを見る',
  ),
  'ticket_updated' =>
  array (
    'subject' => 'チケット[チケットID： :ticket_id] :subjectが更新されました！',
    'greeting' => 'こんにちは :user！',
    'message' => 'サポートチケットチケットID＃：ticket_id :subjectの1つが更新されました。サポートが必要な場合はご連絡ください。',
    'button_text' => 'チケットを見る',
  ),
  'user_created' =>
  array (
    'subject' => ':adminが :marketplaceマーケットプレイスにあなたを追加しました！',
    'greeting' => 'おめでとう :user！',
    'message' => ' :adminによって :marketplaceに追加されました！以下のボタンをクリックして、アカウントにログインします。初期ログインに一時パスワードを使用します。',
    'alert' => 'ログイン後にパスワードを変更することを忘れないでください。',
    'button_text' => 'プロフィールにアクセス',
  ),
  'user_updated' =>
  array (
    'subject' => 'アカウント情報が正常に更新されました！',
    'greeting' => 'こんにちは :user！',
    'message' => 'これは、アカウントが正常に更新されたことを知らせる通知です！',
    'button_text' => 'プロフィールにアクセス',
  ),
  'verdor_registered' =>
  array (
    'subject' => '新規ベンダーが登録されました！',
    'greeting' => 'おめでとうございます！',
    'message' => 'マーケットプレイス :marketplaceにショップ名<strong>：shop_name </ strong>の新しいverdorが追加され、販売者のメールアドレスが :merchant_emailになりました',
    'button_text' => 'ダッシュボードに移動します',
  ),
  'email_verification' =>
  array (
    'subject' => ' :marketplaceアカウントを確認してください！',
    'greeting' => 'おめでとう :user！',
    'message' => 'アカウントが正常に作成されました！下のボタンをクリックして、メールアドレスを確認してください。',
    'button_text' => 'メールを確認',
  ),
  'dispute_solved' =>
  array (
    'subject' => '異議申し立て[注文ID： :order_id]は解決済みとしてマークされています。',
    'greeting' => 'こんにちは :customer！',
    'message' => '注文ID： :order_idの紛争は解決済みとしてマークされています。一緒にいてくれてありがとう。',
    'button_text' => '紛争を見る',
  ),
);