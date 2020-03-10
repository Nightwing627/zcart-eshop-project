<?php 
return array (
  'password_updated' => 
  array (
    'subject' => ' :marketplace şifreniz başarıyla güncellendi!',
    'greeting' => 'Merhaba :user!',
    'message' => 'Hesap giriş şifreniz başarıyla değiştirildi! Bu değişikliği yapmadıysanız, lütfen en kısa sürede bizimle iletişime geçin! Profil sayfanıza giriş yapmak için aşağıdaki butona tıklayın.',
    'button_text' => 'Profilinizi Ziyaret Edin',
  ),
  'invoice_created' => 
  array (
    'subject' => ':marketplace Aylık abonelik ücreti faturası',
    'greeting' => 'Merhaba :merchant!',
    'message' => 'Devam eden desteğiniz için teşekkürler. Kayıtlarınız için faturanızın bir kopyasını ekledik. Herhangi bir sorunuz veya endişeniz varsa lütfen bize bildirin!',
    'action' => 
    array (
      'text' => 'Gösterge Tablosuna Git',
      'color' => 'yeşil',
    ),
  ),
  'customer_registered' => 
  array (
    'subject' => ' :marketplace pazarına hoş geldiniz!',
    'greeting' => 'Kutlama :customer!',
    'message' => 'Hesabınız Başarıyla Oluşturuldu! E-posta adresinizi doğrulamak için aşağıdaki düğmeyi tıklayın.',
    'action' => 
    array (
      'text' => 'Beni doğrula',
      'color' => 'yeşil',
    ),
  ),
  'customer_updated' => 
  array (
    'subject' => 'Hesap bilgileri başarıyla güncellendi!',
    'greeting' => 'Merhaba :customer!',
    'message' => 'Bu, hesabınızın başarıyla güncellendiğini bildiren bir bildirimdir!',
    'action' => 
    array (
      'text' => 'Profilini ziyaret et',
      'color' => 'mavi',
    ),
  ),
  'customer_password_reset' => 
  array (
    'subject' => 'Parola Bildirimini Sıfırla',
    'greeting' => 'Merhaba!',
    'message' => 'Bu e-postayı, hesabınız için bir şifre sıfırlama isteği aldığımız için alıyorsunuz. Parola sıfırlama isteğinde bulunmadıysanız, Bu bildirimi dikkate almayın ve başka bir işlem yapmanız gerekmez.',
    'button_text' => 'Şifreyi yenile',
  ),
  'dispute_acknowledgement' => 
  array (
    'subject' => '[Sipariş Kimliği: :order_id] Anlaşmazlık başarıyla gönderildi',
    'greeting' => 'Merhaba :customer',
    'message' => 'Bu, Sipariş Kimliği konusundaki anlaşmazlığınızı aldığımızı bildiren bir bildirimdir: :order_id, Destek ekibimiz en kısa sürede size geri dönecektir.',
    'action' => 
    array (
      'text' => 'Anlaşmazlık görmek',
      'color' => 'mavi',
    ),
  ),
  'dispute_created' => 
  array (
    'subject' => 'Sipariş Kimliği için yeni anlaşmazlık: :order_id',
    'greeting' => 'Merhaba :merchant!',
    'message' => 'Sipariş Kimliği için yeni bir anlaşmazlık aldınız: :order_id. Lütfen müşteriyle olan sorunu inceleyin ve çözün.',
    'action' => 
    array (
      'text' => 'Anlaşmazlık görmek',
      'color' => 'yeşil',
    ),
  ),
  'dispute_updated' => 
  array (
    'subject' => '[Sipariş Kodu: :order_id] Anlaşmazlık durumu güncellendi!',
    'greeting' => 'Merhaba :customer!',
    'message' => ' :order_id numaralı sipariş kimliğine ilişkin bir anlaşmazlık bu iletiyle birlikte satıcıdan ": reply" güncellendi. Herhangi bir yardıma ihtiyacınız olursa lütfen aşağıdan kontrol edin ve bize ulaşın.',
    'action' => 
    array (
      'text' => 'Anlaşmazlık görmek',
      'color' => 'mavi',
    ),
  ),
  'dispute_appealed' => 
  array (
    'subject' => '[Sipariş Kodu: :order_id] Anlaşmazlık temyiz edildi!',
    'greeting' => 'Merhaba!',
    'message' => ' :order_id numaralı sipariş koduna ilişkin bir anlaşmazlık ": cevap" mesajı ile temyiz edildi. Lütfen detay için aşağıyı kontrol edin.',
    'action' => 
    array (
      'text' => 'Anlaşmazlık görmek',
      'color' => 'mavi',
    ),
  ),
  'appealed_dispute_replied' => 
  array (
    'subject' => '[Sipariş Kodu: :order_id] İtiraz anlaşmazlığına yeni cevap!',
    'greeting' => 'Merhaba!',
    'message' => ' :order_id numaralı sipariş numarasına ilişkin bir anlaşmazlık bu mesajla yanıtlandı: </br> </br> ": reply"',
    'action' => 
    array (
      'text' => 'Anlaşmazlık görmek',
      'color' => 'mavi',
    ),
  ),
  'low_inventory_notification' => 
  array (
    'subject' => 'Düşük stok alarmı!',
    'greeting' => 'Merhaba!',
    'message' => 'Envanter öğelerinizden biri veya daha fazlası düşüyor. Maddeyi piyasada canlı tutmak için daha fazla envanter ekleme zamanı geldi.',
    'action' => 
    array (
      'text' => 'Envanteri Güncelle',
      'color' => 'mavi',
    ),
  ),
  'inventory_bulk_upload_procceed_notice' => 
  array (
    'subject' => 'Toplu envanter içe aktarma isteğiniz tamamlandı.',
    'greeting' => 'Merhaba!',
    'message' => 'Toplu stok içe aktarma isteğinizin tamamlandığını bildirmekten memnuniyet duyarız. :success platformuna başarıyla içe aktarılan toplam satır sayısı, :failed satır sayısı başarısız oldu',
    'failed' => 'Lütfen ekli dosyayı başarısız satırlar için bulun.',
    'action' => 
    array (
      'text' => 'Envanteri Görüntüle',
      'color' => 'yeşil',
    ),
  ),
  'new_message' => 
  array (
    'subject' => ':subject',
    'greeting' => 'Merhaba :receiver',
    'message' => ':message',
    'action' => 
    array (
      'text' => 'Mesajı sitede görüntüle',
      'color' => 'mavi',
    ),
  ),
  'message_replied' => 
  array (
    'subject' => ':user yanıtladı :subject',
    'greeting' => 'Merhaba :receiver',
    'message' => ':reply',
    'action' => 
    array (
      'text' => 'Mesajı sitede görüntüle',
      'color' => 'mavi',
    ),
  ),
  'order_created' => 
  array (
    'subject' => '[Sipariş No: :order] siparişiniz başarıyla verildi!',
    'greeting' => 'Merhaba :customer',
    'message' => 'Bizi tercih ettiğiniz için teşekkürler! Siparişiniz [Sipariş No :order] başarıyla verildi. Siparişin durumunu size bildiririz.',
    'action' => 
    array (
      'text' => 'Mağazayı ziyaret et',
      'color' => 'mavi',
    ),
  ),
  'merchant_order_created_notification' => 
  array (
    'subject' => 'Yeni sipariş [Sipariş No: :order] dükkanınıza verildi!',
    'greeting' => 'Merhaba :merchant',
    'message' => 'Yeni bir sipariş [Sipariş Kimliği :order] verildi. Lütfen sipariş detaylarını kontrol ediniz ve en kısa sürede sipariş veriniz.',
    'action' => 
    array (
      'text' => 'Siparişi yerine getir',
      'color' => 'mavi',
    ),
  ),
  'order_updated' => 
  array (
    'subject' => '[Sipariş No: :order] sipariş durumunuz güncellendi!',
    'greeting' => 'Merhaba :customer',
    'message' => 'Bu, siparişinizin [Sipariş Kimliği :order]\'in güncellendiğini bildirmenizi sağlayan bir bildirimdir. Sipariş detayı için lütfen aşağıya bakınız. Siparişlerinizi, kontrol panelinizden de kontrol edebilirsiniz.',
    'action' => 
    array (
      'text' => 'Mağazayı ziyaret et',
      'color' => 'mavi',
    ),
  ),
  'order_fulfilled' => 
  array (
    'subject' => '[Sipariş Kodu: :order] Yoldaki siparişiniz!',
    'greeting' => 'Merhaba :customer',
    'message' => 'Bu, siparişinizin [Sipariş No :order]\'in sevk edildiğini ve yolda olduğunu bildirmek için bir bildirimdir. Sipariş detayı için lütfen aşağıya bakınız. Siparişlerinizi, kontrol panelinizden de kontrol edebilirsiniz.',
    'action' => 
    array (
      'text' => 'Mağazayı ziyaret et',
      'color' => 'yeşil',
    ),
  ),
  'order_paid' => 
  array (
    'subject' => '[Sipariş No: :order] Siparişiniz başarıyla ödendi!',
    'greeting' => 'Merhaba :customer',
    'message' => 'Bu, siparişinizin [Sipariş No :order]\'in başarıyla ödendiğini ve yolda olduğunu bildirmenizi bildiren bir bildirimdir. Sipariş detayı için lütfen aşağıya bakınız. Siparişlerinizi, kontrol panelinizden de kontrol edebilirsiniz.',
    'action' => 
    array (
      'text' => 'Mağazayı ziyaret et',
      'color' => 'yeşil',
    ),
  ),
  'order_payment_failed' => 
  array (
    'subject' => '[Sipariş No: :order] ödeme başarısız!',
    'greeting' => 'Merhaba :customer',
    'message' => 'Bu, siparişinizin [Sipariş No :order] ödemesinin başarısız olduğunu bildirmenizi bildiren bir bildirimdir. Sipariş detayı için lütfen aşağıya bakınız. Siparişlerinizi, kontrol panelinizden de kontrol edebilirsiniz.',
    'action' => 
    array (
      'text' => 'Mağazayı ziyaret et',
      'color' => 'kırmızı',
    ),
  ),
  'refund_initiated' => 
  array (
    'subject' => '[Sipariş No: :order] geri ödeme başlatıldı!',
    'greeting' => 'Merhaba :customer',
    'message' => 'Bu, :order siparişiniz için geri ödeme isteğinde bulunduğumuzu bildiren bir bildirimdir. Ekip üyelerimizden biri isteği yakında inceleyecek. İsteğin durumunu size bildiririz.',
  ),
  'refund_approved' => 
  array (
    'subject' => '[Sipariş No: :order] bir geri ödeme isteği onaylandı!',
    'greeting' => 'Merhaba :customer',
    'message' => 'Bu, :order siparişiniz için geri ödeme isteğini onayladığımızı bildiren bir bildirimdir. İade edilen miktar :amount\'dir. Parayı ödeme yönteminize gönderdik, hesabınızı etkilemek birkaç gün sürebilir. Birkaç gün içinde gerçekleşen parayı göremiyorsanız ödeme sağlayıcınıza başvurun.',
  ),
  'refund_declined' => 
  array (
    'subject' => '[Sipariş No: :order] geri ödeme isteği reddedildi!',
    'greeting' => 'Merhaba :customer',
    'message' => 'Bu, :order siparişiniz için geri ödeme isteğinin reddedildiğini bildiren bir bildirimdir. Tüccarın çözümünden memnun kalmazsanız, satıcıyla doğrudan platformdan iletişim kurabilir veya hatta anlaşmazlığı :marketplace ile temasa geçebilirsiniz. Sorunu çözmek için adım atacağız.',
  ),
  'shop_created' => 
  array (
    'subject' => 'Mağazanız gitmeye hazır!',
    'greeting' => 'Kutlama :merchant!',
    'message' => 'Mağazanız :shop_name başarıyla oluşturuldu! Mağaza yönetici panelinde oturum açmak için aşağıdaki düğmeye tıklayın.',
    'action' => 
    array (
      'text' => 'Gösterge Tablosuna Git',
      'color' => 'yeşil',
    ),
  ),
  'shop_updated' => 
  array (
    'subject' => 'Mağaza bilgileri başarıyla güncellendi!',
    'greeting' => 'Merhaba :merchant!',
    'message' => 'Bu, :shop_name mağazanızın başarıyla güncellendiğini bildiren bir bildirimdir!',
    'action' => 
    array (
      'text' => 'Gösterge Tablosuna Git',
      'color' => 'mavi',
    ),
  ),
  'shop_config_updated' => 
  array (
    'subject' => 'Mağaza yapılandırması başarıyla güncellendi!',
    'greeting' => 'Merhaba :merchant!',
    'message' => 'Mağaza yapılandırmanız başarıyla güncellendi! Mağaza yönetici panelinde oturum açmak için aşağıdaki düğmeye tıklayın.',
    'action' => 
    array (
      'text' => 'Gösterge Tablosuna Git',
      'color' => 'mavi',
    ),
  ),
  'shop_down_for_maintainace' => 
  array (
    'subject' => 'Dükkanın kapalı!',
    'greeting' => 'Merhaba :merchant!',
    'message' => 'Bu, :shop_name mağazanızın kapalı olduğunu bildiren bir bildirimdir! Hiçbir müşteri tekrar yaşayana kadar mağazanızı ziyaret edemez.',
    'action' => 
    array (
      'text' => 'Config sayfasına git',
      'color' => 'mavi',
    ),
  ),
  'shop_is_live' => 
  array (
    'subject' => 'Mağazanız tekrar CANLI!',
    'greeting' => 'Merhaba :merchant',
    'message' => 'Bu, :shop_name mağazanızın başarıyla çalışmaya başladığını bildiren bir bildirimdir!',
    'action' => 
    array (
      'text' => 'Gösterge Tablosuna Git',
      'color' => 'yeşil',
    ),
  ),
  'shop_deleted' => 
  array (
    'subject' => 'Mağazanız :marketplace\'den kaldırıldı!',
    'greeting' => 'Tüccar Merhaba!',
    'message' => 'Bu, mağazanızın marketimizden silindiğini bildiren bir bildirimdir! Seni özleyeceğiz.',
  ),
  'system_is_down' => 
  array (
    'subject' => 'Pazar :marketplace şimdi çöktü!',
    'greeting' => 'Merhaba :user!',
    'message' => 'Bu, :marketplace pazarınızın kapalı olduğunu bildiren bir bildirimdir! Hiçbir müşteri tekrar yaşamayana kadar pazarınızı ziyaret edemez.',
    'action' => 
    array (
      'text' => 'Config sayfasına git',
      'color' => 'mavi',
    ),
  ),
  'system_is_live' => 
  array (
    'subject' => 'Pazar :marketplace\'iniz LIVE\'a geri döndü!',
    'greeting' => 'Merhaba :user!',
    'message' => 'Bu, :marketplace pazarınızın başarılı bir şekilde yaşamaya başladığını bildiren bir bildirimdir!',
    'action' => 
    array (
      'text' => 'Gösterge Tablosuna Git',
      'color' => 'yeşil',
    ),
  ),
  'system_info_updated' => 
  array (
    'subject' => ':marketplace - pazar bilgileri başarıyla güncellendi!',
    'greeting' => 'Merhaba :user!',
    'message' => 'Bu, :marketplace pazarınızın başarıyla güncellendiğini bildiren bir bildirimdir!',
    'action' => 
    array (
      'text' => 'Gösterge Tablosuna Git',
      'color' => 'mavi',
    ),
  ),
  'system_config_updated' => 
  array (
    'subject' => ':marketplace - pazar yapılandırması başarıyla güncellendi!',
    'greeting' => 'Merhaba :user!',
    'message' => 'Pazar :marketplace\'inizin yapılandırması başarıyla güncellendi! Yönetici paneline giriş yapmak için aşağıdaki düğmeye tıklayın.',
    'action' => 
    array (
      'text' => 'Ayarları görüntüle',
      'color' => 'mavi',
    ),
  ),
  'new_contact_us_message' => 
  array (
    'subject' => 'Yeni mesaj yoluyla bize ulaşın formu: :subject',
    'greeting' => 'Merhaba!',
    'message_footer_with_phone' => 'Bu e-postayı yanıtlayabilir veya doğrudan bu telefona ulaşabilirsiniz :phone',
    'message_footer' => 'Bu e-postayı doğrudan cevaplayabilirsiniz.',
  ),
  'ticket_acknowledgement' => 
  array (
    'subject' => '[Bilet kimliği: :ticket_id] :subject',
    'greeting' => 'Merhaba :user',
    'message' => 'Bu, :ticket_id biletinizi başarıyla aldığımızı bildiren bir bildirimdir! Destek ekibimiz en kısa sürede size geri dönüş yapacaktır.',
    'action' => 
    array (
      'text' => 'Bileti gör',
      'color' => 'mavi',
    ),
  ),
  'ticket_created' => 
  array (
    'subject' => 'Yeni Destek Bileti [Ticket ID: :ticket_id] :subject',
    'greeting' => 'Merhaba!',
    'message' => 'Satıcı :vendor\'ten yeni bir destek bileti numarası :ticket_id, Gönderen :sender aldınız. Ekibi desteklemek için bileti inceleyin ve eşleştirin.',
    'action' => 
    array (
      'text' => 'Bileti gör',
      'color' => 'yeşil',
    ),
  ),
  'ticket_assigned' => 
  array (
    'subject' => 'Az önce size verilen bir bilet [Ticket IF: :ticket_id] :subject',
    'greeting' => 'Merhaba :user',
    'message' => 'Bu, size bildirmiş olduğunuz bileti [Bilet Kimliği: :ticket_id] :subject az önce size bildirmiştir. Bileti en kısa sürede gözden geçirin ve cevaplayın.',
    'action' => 
    array (
      'text' => 'Biletini cevapla',
      'color' => 'mavi',
    ),
  ),
  'ticket_replied' => 
  array (
    'subject' => ':user bileti yanıtladı [Bilet kimliği: :ticket_id] :subject',
    'greeting' => 'Merhaba :user',
    'message' => ':reply',
    'action' => 
    array (
      'text' => 'Bileti gör',
      'color' => 'mavi',
    ),
  ),
  'ticket_updated' => 
  array (
    'subject' => 'Bir Bilet [Bilet Kimliği: :ticket_id] :subject güncellendi!',
    'greeting' => 'Merhaba :user!',
    'message' => 'Destek biletinizden biri ID: # ticket_id :subject güncellendi. Yardıma ihtiyacınız olursa lütfen bizimle iletişime geçin.',
    'action' => 
    array (
      'text' => 'Bileti gör',
      'color' => 'mavi',
    ),
  ),
  'user_created' => 
  array (
    'subject' => ':admin sizi :marketplace pazarına ekledi!',
    'greeting' => 'Kutlama :user!',
    'message' => ' :marketplace\'e :admin tarafından eklediniz! Hesabınıza giriş yapmak için aşağıdaki düğmeye tıklayın. İlk giriş için geçici şifreyi kullanın.',
    'alert' => 'Giriş yaptıktan sonra şifrenizi değiştirmeyi unutmayın.',
    'action' => 
    array (
      'text' => 'Profilini ziyaret et',
      'color' => 'yeşil',
    ),
  ),
  'user_updated' => 
  array (
    'subject' => 'Hesap bilgileri başarıyla güncellendi!',
    'greeting' => 'Merhaba :user!',
    'message' => 'Bu, hesabınızın başarıyla güncellendiğini bildiren bir bildirimdir!',
    'action' => 
    array (
      'text' => 'Profilini ziyaret et',
      'color' => 'mavi',
    ),
  ),
  'verdor_registered' => 
  array (
    'subject' => 'Yeni satıcı yeni kayıt oldu!',
    'greeting' => 'Tebrik!',
    'message' => 'Pazar :marketplace’iniz, <strong>: dükkan_adı </strong> dükkan adında yeni bir verdor aldı ve satıcının e-posta adresi :merchant_email',
    'action' => 
    array (
      'text' => 'Gösterge Tablosuna Git',
      'color' => 'yeşil',
    ),
  ),
  'email_verification' => 
  array (
    'subject' => ' :marketplace hesabınızı doğrulayın!',
    'greeting' => 'Kutlama :user!',
    'message' => 'Hesabınız Başarıyla Oluşturuldu! E-posta adresinizi doğrulamak için aşağıdaki düğmeyi tıklayın.',
    'button_text' => 'E-postamı Doğrula',
  ),
  'dispute_solved' => 
  array (
    'subject' => 'Anlaşmazlık [Sipariş Kimliği: :order_id] çözüldü olarak işaretlendi!',
    'greeting' => 'Merhaba :customer!',
    'message' => 'Sipariş No: :order_id için anlaşmazlık çözüldü olarak işaretlendi. Bizimle birlikte olduğun için teşekkür ederiz.',
    'action' => 
    array (
      'text' => 'Anlaşmazlık görmek',
      'color' => 'yeşil',
    ),
  ),
);