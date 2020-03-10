<?php 
return array (
  'password_updated' => 
  array (
    'subject' => 'Ditt lösenord :marketplace har uppdaterats!',
    'greeting' => 'Hej :user!',
    'message' => 'Ditt lösenord för ditt inloggningsnamn har ändrats! Om du inte gjorde denna ändring, vänligen kontakta oss så fort! Klicka på knappen nedan för att logga in på din profilsida.',
    'button_text' => 'Besök din profil',
  ),
  'invoice_created' => 
  array (
    'subject' => ':marketplace Månadsfaktura för prenumerationsavgift',
    'greeting' => 'Hej :merchant!',
    'message' => 'Tack för ditt fortsatta stöd. Vi har bifogat en kopia av din faktura för dina poster. Låt oss veta om du har några frågor eller problem!',
    'action' => 
    array (
      'text' => 'Gå till instrumentpanelen',
      'color' => 'grön',
    ),
  ),
  'customer_registered' => 
  array (
    'subject' => 'Välkommen till :marketplace-marknaden!',
    'greeting' => 'Grattis :customer!',
    'message' => 'Ditt konto har skapats framgångsrikt! Klicka på knappen nedan för att verifiera din e-postadress.',
    'action' => 
    array (
      'text' => 'Bekräfta mig',
      'color' => 'grön',
    ),
  ),
  'customer_updated' => 
  array (
    'subject' => 'Kontouppdateringen har uppdaterats!',
    'greeting' => 'Hej :customer!',
    'message' => 'Det här är ett meddelande för att informera dig om att ditt konto har uppdaterats!',
    'action' => 
    array (
      'text' => 'Besök din profil',
      'color' => 'blå',
    ),
  ),
  'customer_password_reset' => 
  array (
    'subject' => 'Återställ lösenordsmeddelande',
    'greeting' => 'Hallå!',
    'message' => 'Du får det här e-postmeddelandet eftersom vi har fått en begäran om återställning av lösenord för ditt konto. Om du inte begärde återställning av lösenord, ignorera bara detta meddelande och ingen ytterligare åtgärd krävs.',
    'button_text' => 'Återställ lösenord',
  ),
  'dispute_acknowledgement' => 
  array (
    'subject' => '[Order-ID: :order_id] Tvist har skickats framgångsrikt',
    'greeting' => 'Hej :customer',
    'message' => 'Detta är ett meddelande för att informera dig om att vi har fått din tvist om order-ID: :order_id. Vårt supportteam kommer tillbaka till dig så snart som möjligt.',
    'action' => 
    array (
      'text' => 'Visa tvisten',
      'color' => 'blå',
    ),
  ),
  'dispute_created' => 
  array (
    'subject' => 'Ny tvist för order-ID: :order_id',
    'greeting' => 'Hej :merchant!',
    'message' => 'Du har fått en ny tvist för order-ID: :order_id. Kontrollera och lösa problemet med kunden.',
    'action' => 
    array (
      'text' => 'Visa tvisten',
      'color' => 'grön',
    ),
  ),
  'dispute_updated' => 
  array (
    'subject' => '[Order-ID: :order_id] Tviststatus har uppdaterats!',
    'greeting' => 'Hej :customer!',
    'message' => 'En tvist om order-ID :order_id har uppdaterats med detta meddelande från leverantören ": svar". Vänligen kolla nedan och kontakta oss om du behöver hjälp.',
    'action' => 
    array (
      'text' => 'Visa tvisten',
      'color' => 'blå',
    ),
  ),
  'dispute_appealed' => 
  array (
    'subject' => '[Order-ID: :order_id] Tvist överklagat!',
    'greeting' => 'Hallå!',
    'message' => 'En tvist om order-ID :order_id har överklagats med detta meddelande ": svar". Kontrollera nedan för detaljer.',
    'action' => 
    array (
      'text' => 'Visa tvisten',
      'color' => 'blå',
    ),
  ),
  'appealed_dispute_replied' => 
  array (
    'subject' => '[Beställnings-ID: :order_id] Nytt svar för överklagandekonflikt!',
    'greeting' => 'Hallå!',
    'message' => 'En tvist om order-ID :order_id har besvarats med detta meddelande: </br> </br> ": svar"',
    'action' => 
    array (
      'text' => 'Visa tvisten',
      'color' => 'blå',
    ),
  ),
  'low_inventory_notification' => 
  array (
    'subject' => 'Låg varning för lager!',
    'greeting' => 'Hallå!',
    'message' => 'En eller flera av dina lagerartiklar blir låga. Det är dags att lägga till mer lager för att hålla objektet live på marknaden.',
    'action' => 
    array (
      'text' => 'Uppdatera inventeringen',
      'color' => 'blå',
    ),
  ),
  'inventory_bulk_upload_procceed_notice' => 
  array (
    'subject' => 'Din begäran om import av bulkvaror har överförts.',
    'greeting' => 'Hallå!',
    'message' => 'Vi är glada att informera dig om att din begäran om import av bulkvaror har godkänts. Totalt antal rader importerade framgångsrikt till plattformen :success, misslyckades med antal rader :failed',
    'failed' => 'Vänligen hitta den bifogade filen för rader som misslyckats.',
    'action' => 
    array (
      'text' => 'Visa inventering',
      'color' => 'grön',
    ),
  ),
  'new_message' => 
  array (
    'subject' => ':subject',
    'greeting' => 'Hej :receiver',
    'message' => ':message',
    'action' => 
    array (
      'text' => 'Visa meddelandet på webbplatsen',
      'color' => 'blå',
    ),
  ),
  'message_replied' => 
  array (
    'subject' => ':user svarade :subject',
    'greeting' => 'Hej :receiver',
    'message' => ':reply',
    'action' => 
    array (
      'text' => 'Visa meddelandet på webbplatsen',
      'color' => 'blå',
    ),
  ),
  'order_created' => 
  array (
    'subject' => '[Beställnings-ID: :order] din beställning har lagts fram!',
    'greeting' => 'Hej :customer',
    'message' => 'Tack för att du väljer oss! Din beställning [Order-ID :order] har lagts fram. Vi berättar om beställningens status.',
    'action' => 
    array (
      'text' => 'Besök butiken',
      'color' => 'blå',
    ),
  ),
  'merchant_order_created_notification' => 
  array (
    'subject' => 'Ny beställning [Beställnings-ID: :order] har placerats i din butik!',
    'greeting' => 'Hej :merchant',
    'message' => 'En ny order [Order ID :order] har lagts. Kontrollera beställningsdetaljerna och uppfylla beställningen så snart som möjligt.',
    'action' => 
    array (
      'text' => 'Fyll i beställningen',
      'color' => 'blå',
    ),
  ),
  'order_updated' => 
  array (
    'subject' => '[Beställnings-ID: :order] din orderstatus har uppdaterats!',
    'greeting' => 'Hej :customer',
    'message' => 'Detta är ett meddelande för att informera dig om att din beställning [Order ID :order] har uppdaterats. Se nedan för beställningsdetaljer. Du kan också kontrollera dina beställningar från din instrumentpanel.',
    'action' => 
    array (
      'text' => 'Besök butiken',
      'color' => 'blå',
    ),
  ),
  'order_fulfilled' => 
  array (
    'subject' => '[Beställnings-ID: :order] Din beställning på sin väg!',
    'greeting' => 'Hej :customer',
    'message' => 'Detta är ett meddelande för att informera dig om att din beställning [Order-ID :order] har skickats och att den är på väg. Se nedan för beställningsdetaljer. Du kan också kontrollera dina beställningar från din instrumentpanel.',
    'action' => 
    array (
      'text' => 'Besök butiken',
      'color' => 'grön',
    ),
  ),
  'order_paid' => 
  array (
    'subject' => '[Beställnings-ID: :order] Din beställning har betalats framgångsrikt!',
    'greeting' => 'Hej :customer',
    'message' => 'Detta är ett meddelande för att informera dig om att din beställning [Order-ID :order] har betalats framgångsrikt och att den är på väg. Se nedan för beställningsdetaljer. Du kan också kontrollera dina beställningar från din instrumentpanel.',
    'action' => 
    array (
      'text' => 'Besök butiken',
      'color' => 'grön',
    ),
  ),
  'order_payment_failed' => 
  array (
    'subject' => '[Order-ID: :order]-betalning misslyckades!',
    'greeting' => 'Hej :customer',
    'message' => 'Detta är ett meddelande för att informera dig om att din beställning [Order ID :order]-betalning har misslyckats. Se nedan för beställningsdetaljer. Du kan också kontrollera dina beställningar från din instrumentpanel.',
    'action' => 
    array (
      'text' => 'Besök butiken',
      'color' => 'röd',
    ),
  ),
  'refund_initiated' => 
  array (
    'subject' => '[Beställnings-ID: :order] en återbetalning har inletts!',
    'greeting' => 'Hej :customer',
    'message' => 'Detta är ett meddelande för att informera dig om att vi har initierat en återbetalningsbegäran för din beställning :order. En av våra teammedarbetare kommer att granska begäran snart. Vi meddelar statusen på begäran.',
  ),
  'refund_approved' => 
  array (
    'subject' => '[Order-ID: :order] har en begäran om återbetalning godkänts!',
    'greeting' => 'Hej :customer',
    'message' => 'Detta är ett meddelande för att informera dig om att vi har godkänt en återbetalningsbegäran för din beställning :order. Återbetalat belopp är :amount. Vi har skickat pengarna till din betalningsmetod, det kan ta några dagar att göra ditt konto. Kontakta din betalningsleverantör om du inte ser pengarna som görs på några dagar.',
  ),
  'refund_declined' => 
  array (
    'subject' => '[Beställnings-ID: :order] en återbetalningsbegäran har avslagits!',
    'greeting' => 'Hej :customer',
    'message' => 'Detta är ett meddelande för att informera dig om att en återbetalningsbegäran har avvisats för din beställning :order. Om du inte är nöjd med säljarens lösning kan du kontakta säljaren direkt från plattformen eller till och med kan du överklaga tvisten på :marketplace. Vi går in för att lösa problemet.',
  ),
  'shop_created' => 
  array (
    'subject' => 'Din butik är redo att gå!',
    'greeting' => 'Grattis :merchant!',
    'message' => 'Din butik :shop_name har skapats framgångsrikt! Klicka på knappen nedan för att logga in på butikens adminpanel.',
    'action' => 
    array (
      'text' => 'Gå till instrumentpanelen',
      'color' => 'grön',
    ),
  ),
  'shop_updated' => 
  array (
    'subject' => 'Handla information uppdaterad framgångsrikt!',
    'greeting' => 'Hej :merchant!',
    'message' => 'Det här är ett meddelande för att informera dig om att din butik :shop_name har uppdaterats!',
    'action' => 
    array (
      'text' => 'Gå till instrumentpanelen',
      'color' => 'blå',
    ),
  ),
  'shop_config_updated' => 
  array (
    'subject' => 'Butikskonfiguration uppdaterad framgångsrikt!',
    'greeting' => 'Hej :merchant!',
    'message' => 'Din butikskonfiguration har uppdaterats! Klicka på knappen nedan för att logga in på butikens adminpanel.',
    'action' => 
    array (
      'text' => 'Gå till instrumentpanelen',
      'color' => 'blå',
    ),
  ),
  'shop_down_for_maintainace' => 
  array (
    'subject' => 'Din butik är nere!',
    'greeting' => 'Hej :merchant!',
    'message' => 'Det här är ett meddelande för att informera dig om att din butik :shop_name är nere! Ingen kund kan besöka din butik förrän den åter kommer att leva igen.',
    'action' => 
    array (
      'text' => 'Gå till Config-sidan',
      'color' => 'blå',
    ),
  ),
  'shop_is_live' => 
  array (
    'subject' => 'Din butik är tillbaka till LIVE!',
    'greeting' => 'Hej :merchant',
    'message' => 'Detta är ett meddelande för att informera dig om att din butik :shop_name återgår till att lyckas!',
    'action' => 
    array (
      'text' => 'Gå till instrumentpanelen',
      'color' => 'grön',
    ),
  ),
  'shop_deleted' => 
  array (
    'subject' => 'Din butik har tagits bort från :marketplace!',
    'greeting' => 'Hej köpman!',
    'message' => 'Det här är ett meddelande om att din butik har tagits bort från vår markörplats! Vi kommer sakna dig.',
  ),
  'system_is_down' => 
  array (
    'subject' => 'Din marknadsplats :marketplace är nere nu!',
    'greeting' => 'Hej :user!',
    'message' => 'Det här är ett meddelande för att informera dig om att din marknadsplats :marketplace är nere! Ingen kund kan besöka din marknadsplats förrän den åter kommer att leva igen.',
    'action' => 
    array (
      'text' => 'Gå till konfigurationssidan',
      'color' => 'blå',
    ),
  ),
  'system_is_live' => 
  array (
    'subject' => 'Din marknadsplats :marketplace är tillbaka till LIVE!',
    'greeting' => 'Hej :user!',
    'message' => 'Det här är ett meddelande för att informera dig om att din marknadsplats :marketplace är tillbaka för att lyckas!',
    'action' => 
    array (
      'text' => 'Gå till instrumentpanelen',
      'color' => 'grön',
    ),
  ),
  'system_info_updated' => 
  array (
    'subject' => ':marketplace - marknadsinformation uppdaterad framgångsrikt!',
    'greeting' => 'Hej :user!',
    'message' => 'Detta är ett meddelande för att informera dig om att din marknad :marketplace har uppdaterats!',
    'action' => 
    array (
      'text' => 'Gå till instrumentpanelen',
      'color' => 'blå',
    ),
  ),
  'system_config_updated' => 
  array (
    'subject' => ':marketplace - marknadskonfiguration uppdaterad framgångsrikt!',
    'greeting' => 'Hej :user!',
    'message' => 'Konfigurationen av din marknad :marketplace har uppdaterats framgångsrikt! Klicka på knappen nedan för att logga in på adminpanelen.',
    'action' => 
    array (
      'text' => 'Visa inställningar',
      'color' => 'blå',
    ),
  ),
  'new_contact_us_message' => 
  array (
    'subject' => 'Nytt meddelande via kontaktformuläret: :subject',
    'greeting' => 'Hallå!',
    'message_footer_with_phone' => 'Du kan svara på det här e-postmeddelandet eller kontakta direkt till den här telefonen :phone',
    'message_footer' => 'Du kan svara på detta e-postmeddelande direkt.',
  ),
  'ticket_acknowledgement' => 
  array (
    'subject' => '[Biljett-ID: :ticket_id] :subject',
    'greeting' => 'Hej :user',
    'message' => 'Detta är ett meddelande för att meddela dig att vi har fått din biljett :ticket_id framgångsrikt! Vårt supportteam kommer tillbaka till dig så snart som möjligt.',
    'action' => 
    array (
      'text' => 'Visa biljetten',
      'color' => 'blå',
    ),
  ),
  'ticket_created' => 
  array (
    'subject' => 'Ny supportbiljett [Ticket ID: :ticket_id] :subject',
    'greeting' => 'Hallå!',
    'message' => 'Du har fått ett nytt supportbiljett-ID :ticket_id, avsändare :sender från leverantören :vendor. Granska och bedöma biljetten till supportteamet.',
    'action' => 
    array (
      'text' => 'Visa biljetten',
      'color' => 'grön',
    ),
  ),
  'ticket_assigned' => 
  array (
    'subject' => 'En biljett som just har tilldelats dig [Ticket IF: :ticket_id] :subject',
    'greeting' => 'Hej :user',
    'message' => 'Detta är ett meddelande för att informera dig om att biljetten [Ticket ID: :ticket_id] :subject just asseded to you. Granska och svara på biljetten så snart som möjligt.',
    'action' => 
    array (
      'text' => 'Svara på biljetten',
      'color' => 'blå',
    ),
  ),
  'ticket_replied' => 
  array (
    'subject' => ':user svarade biljetten [Ticket ID: :ticket_id] :subject',
    'greeting' => 'Hej :user',
    'message' => ':reply',
    'action' => 
    array (
      'text' => 'Visa biljetten',
      'color' => 'blå',
    ),
  ),
  'ticket_updated' => 
  array (
    'subject' => 'En biljett [Ticket ID: :ticket_id] :subject har uppdaterats!',
    'greeting' => 'Hej :user!',
    'message' => 'En av dina supportbiljetter biljett ID #: ticket_id :subject har uppdaterats. Kontakta oss om du behöver hjälp.',
    'action' => 
    array (
      'text' => 'Visa biljetten',
      'color' => 'blå',
    ),
  ),
  'user_created' => 
  array (
    'subject' => ':admin lade dig till :marketplace-marknaden!',
    'greeting' => 'Grattis :user!',
    'message' => 'Du har lagts till i :marketplace av :admin! Klicka på knappen nedan för att logga in på ditt konto. Använd det tillfälliga lösenordet för första inloggning.',
    'alert' => 'Glöm inte att ändra ditt lösenord efter inloggning.',
    'action' => 
    array (
      'text' => 'Besök din profil',
      'color' => 'grön',
    ),
  ),
  'user_updated' => 
  array (
    'subject' => 'Kontouppdateringen har uppdaterats!',
    'greeting' => 'Hej :user!',
    'message' => 'Det här är ett meddelande för att informera dig om att ditt konto har uppdaterats!',
    'action' => 
    array (
      'text' => 'Besök din profil',
      'color' => 'blå',
    ),
  ),
  'verdor_registered' => 
  array (
    'subject' => 'Ny leverantör just registrerad!',
    'greeting' => 'Grattis!',
    'message' => 'Din marknadsplats :marketplace har precis fått en ny dom med butiksnamn <strong>: butiksnamn </ strong> och säljarens e-postadress är :merchant_email',
    'action' => 
    array (
      'text' => 'Gå till instrumentpanelen',
      'color' => 'grön',
    ),
  ),
  'email_verification' => 
  array (
    'subject' => 'Verifiera ditt :marketplace-konto!',
    'greeting' => 'Grattis :user!',
    'message' => 'Ditt konto har skapats framgångsrikt! Klicka på knappen nedan för att verifiera din e-postadress.',
    'button_text' => 'Verifiera min e-post',
  ),
  'dispute_solved' => 
  array (
    'subject' => 'Tvist [Order-ID: :order_id] har markerats som löst!',
    'greeting' => 'Hej :customer!',
    'message' => 'Tvisten för order-ID: :order_id har markerats som löst. Tack för att du är med oss.',
    'action' => 
    array (
      'text' => 'Visa tvisten',
      'color' => 'grön',
    ),
  ),
);