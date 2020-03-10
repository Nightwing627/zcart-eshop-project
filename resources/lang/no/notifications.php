<?php 
return array (
  'password_updated' => 
  array (
    'subject' => ' :marketplace-passordet ditt har blitt oppdatert!',
    'greeting' => 'Hei :user!',
    'message' => 'Innloggingspassordet til kontoen din er endret! Hvis du ikke har gjort denne endringen, kan du kontakte oss så raskt som mulig! Klikk på knappen nedenfor for å logge inn på profilsiden din.',
    'button_text' => 'Besøk profilen din',
  ),
  'invoice_created' => 
  array (
    'subject' => ':marketplace Månedlig faktura for abonnementsavgift',
    'greeting' => 'Hei :merchant!',
    'message' => 'Takk for fortsatt støtte. Vi har lagt ved en kopi av fakturaen for postene dine. Gi oss beskjed hvis du har spørsmål eller bekymringer!',
    'action' => 
    array (
      'text' => 'Gå til dashbordet',
      'color' => 'grønn',
    ),
  ),
  'customer_registered' => 
  array (
    'subject' => 'Velkommen til :marketplace markedet!',
    'greeting' => 'Gratulerer :customer!',
    'message' => 'Kontoen din er opprettet. Klikk på knappen nedenfor for å bekrefte e-postadressen din.',
    'action' => 
    array (
      'text' => 'Bekreft meg',
      'color' => 'grønn',
    ),
  ),
  'customer_updated' => 
  array (
    'subject' => 'Kontoinformasjon oppdatert!',
    'greeting' => 'Hei :customer!',
    'message' => 'Dette er et varsel for å gi deg beskjed om at kontoen din er oppdatert!',
    'action' => 
    array (
      'text' => 'Besøk profilen din',
      'color' => 'blå',
    ),
  ),
  'customer_password_reset' => 
  array (
    'subject' => 'Tilbakestill passordvarsling',
    'greeting' => 'Hallo!',
    'message' => 'Du mottar denne e-posten fordi vi har mottatt en forespørsel om tilbakestilling av passord for kontoen din. Hvis du ikke ba om tilbakestilling av passord, bare ignorere dette varselet, og ingen ytterligere handlinger er nødvendig.',
    'button_text' => 'Tilbakestille passord',
  ),
  'dispute_acknowledgement' => 
  array (
    'subject' => '[Bestillings-ID: :order_id] Tvist er sendt inn',
    'greeting' => 'Hei :customer',
    'message' => 'Dette er et varsel for å gi deg beskjed om at vi har mottatt din tvist om ordre-ID: :order_id. Vårt supportteam vil komme tilbake til deg så snart som mulig.',
    'action' => 
    array (
      'text' => 'Se på tvisten',
      'color' => 'blå',
    ),
  ),
  'dispute_created' => 
  array (
    'subject' => 'Ny tvist for ordre-ID: :order_id',
    'greeting' => 'Hei :merchant!',
    'message' => 'Du har mottatt en ny tvist for ordre-ID: :order_id. Vennligst gjennomgå og løse problemet med kunden.',
    'action' => 
    array (
      'text' => 'Se på tvisten',
      'color' => 'grønn',
    ),
  ),
  'dispute_updated' => 
  array (
    'subject' => '[Ordre-ID: :order_id] Tvistestatus er oppdatert!',
    'greeting' => 'Hei :customer!',
    'message' => 'En tvist om ordre-ID :order_id er oppdatert med denne meldingen fra leverandøren ": svar". Vennligst sjekk nedenfor og kontakt oss hvis du trenger hjelp.',
    'action' => 
    array (
      'text' => 'Se på tvisten',
      'color' => 'blå',
    ),
  ),
  'dispute_appealed' => 
  array (
    'subject' => '[Order ID: :order_id] Tvist anket!',
    'greeting' => 'Hallo!',
    'message' => 'En tvist om ordre-ID :order_id har blitt anket med denne meldingen ": svar". Vennligst sjekk nedenfor for detaljer.',
    'action' => 
    array (
      'text' => 'Se på tvisten',
      'color' => 'blå',
    ),
  ),
  'appealed_dispute_replied' => 
  array (
    'subject' => '[Ordre-ID: :order_id] Nytt svar for anke tvist!',
    'greeting' => 'Hallo!',
    'message' => 'En tvist om ordre-ID :order_id er svart med denne meldingen: </br> </br> ": svar"',
    'action' => 
    array (
      'text' => 'Se på tvisten',
      'color' => 'blå',
    ),
  ),
  'low_inventory_notification' => 
  array (
    'subject' => 'Varsel om lavt lager!',
    'greeting' => 'Hallo!',
    'message' => 'En eller flere av varebeholdningene dine blir lave. Det er på tide å legge til mer lager for å holde varen live på markedet.',
    'action' => 
    array (
      'text' => 'Oppdater inventar',
      'color' => 'blå',
    ),
  ),
  'inventory_bulk_upload_procceed_notice' => 
  array (
    'subject' => 'Forespørselen om import av bulkbeholdning er mottatt.',
    'greeting' => 'Hallo!',
    'message' => 'Vi er glade for å gi deg beskjed om at forespørselen om import av bulkbeholdning er mottatt. Totalt antall rader importert vellykket til plattformen :success, Mislykket antall rader :failed',
    'failed' => 'Vennligst finn den vedlagte filen for mislykkede rader.',
    'action' => 
    array (
      'text' => 'Vis inventar',
      'color' => 'grønn',
    ),
  ),
  'new_message' => 
  array (
    'subject' => ':subject',
    'greeting' => 'Hei :receiver',
    'message' => ':message',
    'action' => 
    array (
      'text' => 'Se meldingen på stedet',
      'color' => 'blå',
    ),
  ),
  'message_replied' => 
  array (
    'subject' => ':user svarte :subject',
    'greeting' => 'Hei :receiver',
    'message' => ':reply',
    'action' => 
    array (
      'text' => 'Se meldingen på stedet',
      'color' => 'blå',
    ),
  ),
  'order_created' => 
  array (
    'subject' => '[Bestill-ID: :order] bestillingen din er vellykket!',
    'greeting' => 'Hei :customer',
    'message' => 'Takk for at du valgte oss! Bestillingen din [Bestillings-ID :order] har blitt plassert. Vi vil gi deg beskjed om statusen for ordren.',
    'action' => 
    array (
      'text' => 'Besøk butikken',
      'color' => 'blå',
    ),
  ),
  'merchant_order_created_notification' => 
  array (
    'subject' => 'Ny ordre [Bestill-ID: :order] har blitt plassert i butikken din!',
    'greeting' => 'Hei :merchant',
    'message' => 'En ny ordre [Order ID :order] er lagt inn. Vennligst sjekk ordredetaljene og fyll ut ordren så raskt som mulig.',
    'action' => 
    array (
      'text' => 'Oppfylle bestillingen',
      'color' => 'blå',
    ),
  ),
  'order_updated' => 
  array (
    'subject' => '[Bestill-ID: :order] din bestillingsstatus er oppdatert!',
    'greeting' => 'Hei :customer',
    'message' => 'Dette er et varsel for å gi deg beskjed om at bestillingen din [Order ID :order] er oppdatert. Vennligst se nedenfor for ordredetaljer. Du kan også sjekke ordrene dine fra dashbordet.',
    'action' => 
    array (
      'text' => 'Besøk butikken',
      'color' => 'blå',
    ),
  ),
  'order_fulfilled' => 
  array (
    'subject' => '[Bestill-ID: :order] Bestillingen din er på vei!',
    'greeting' => 'Hei :customer',
    'message' => 'Dette er et varsel for å gi deg beskjed om at bestillingen din [Order ID :order] er sendt og at den er på vei. Vennligst se nedenfor for ordredetaljer. Du kan også sjekke ordrene dine fra dashbordet.',
    'action' => 
    array (
      'text' => 'Besøk butikken',
      'color' => 'grønn',
    ),
  ),
  'order_paid' => 
  array (
    'subject' => '[Ordre-ID: :order] Bestillingen din er utbetalt!',
    'greeting' => 'Hei :customer',
    'message' => 'Dette er et varsel for å gi deg beskjed om at bestillingen din [Order ID :order] har blitt betalt og at den er på vei. Vennligst se nedenfor for ordredetaljer. Du kan også sjekke ordrene dine fra dashbordet.',
    'action' => 
    array (
      'text' => 'Besøk butikken',
      'color' => 'grønn',
    ),
  ),
  'order_payment_failed' => 
  array (
    'subject' => '[Ordre-ID: :order]-betaling mislyktes!',
    'greeting' => 'Hei :customer',
    'message' => 'Dette er et varsel for å gi deg beskjed om at bestillingen din [Order ID :order] betaling har blitt mislykket. Vennligst se nedenfor for ordredetaljer. Du kan også sjekke ordrene dine fra dashbordet.',
    'action' => 
    array (
      'text' => 'Besøk butikken',
      'color' => 'rød',
    ),
  ),
  'refund_initiated' => 
  array (
    'subject' => '[Ordre-ID: :order] en refusjon er igangsatt!',
    'greeting' => 'Hei :customer',
    'message' => 'Dette er et varsel for å gi deg beskjed om at vi har startet en refusjonsforespørsel for bestillingen din :order. En av teammedlemmene våre vil gjennomgå forespørselen snart. Vi vil gi deg beskjed om statusen til forespørselen.',
  ),
  'refund_approved' => 
  array (
    'subject' => '[Ordre-ID: :order] er en refusjonsforespørsel godkjent!',
    'greeting' => 'Hei :customer',
    'message' => 'Dette er et varsel for å gi deg beskjed om at vi har godkjent en refusjonsforespørsel for bestillingen din :order. Refunderte beløp er :amount. Vi har sendt pengene til betalingsmåten din, det kan ta noen dager å utføre kontoen din. Kontakt betalingsleverandøren din hvis du ikke ser pengene som er utført på få dager.',
  ),
  'refund_declined' => 
  array (
    'subject' => '[Ordre-ID: :order] er en refusjonsforespørsel avslått!',
    'greeting' => 'Hei :customer',
    'message' => 'Dette er et varsel for å gi deg beskjed om at en refusjonsforespørsel er avslått for bestillingen din :order. Hvis du ikke er fornøyd med selgers løsning, kan du kontakte selgeren direkte fra plattformen, eller til og med kan du anke tvisten på :marketplace. Vi går inn for å løse problemet.',
  ),
  'shop_created' => 
  array (
    'subject' => 'Butikken din er klar til å gå!',
    'greeting' => 'Gratulerer :merchant!',
    'message' => 'Butikken din :shop_name er opprettet med hell! Klikk på knappen nedenfor for å logge inn på butikkadministrasjonspanelet.',
    'action' => 
    array (
      'text' => 'Gå til dashbordet',
      'color' => 'grønn',
    ),
  ),
  'shop_updated' => 
  array (
    'subject' => 'Butikkinformasjon oppdatert!',
    'greeting' => 'Hei :merchant!',
    'message' => 'Dette er et varsel for å gi deg beskjed om at butikken din :shop_name har blitt oppdatert!',
    'action' => 
    array (
      'text' => 'Gå til dashbordet',
      'color' => 'blå',
    ),
  ),
  'shop_config_updated' => 
  array (
    'subject' => 'Butikkonfigurasjonen ble oppdatert!',
    'greeting' => 'Hei :merchant!',
    'message' => 'Konfigurasjonen av butikken din er oppdatert! Klikk på knappen nedenfor for å logge inn på butikkadministrasjonspanelet.',
    'action' => 
    array (
      'text' => 'Gå til dashbordet',
      'color' => 'blå',
    ),
  ),
  'shop_down_for_maintainace' => 
  array (
    'subject' => 'Butikken din er nede!',
    'greeting' => 'Hei :merchant!',
    'message' => 'Dette er et varsel for å gi deg beskjed om at butikken din :shop_name er nede! Ingen kunder kan besøke butikken din før den er i live igjen.',
    'action' => 
    array (
      'text' => 'Gå til Config-siden',
      'color' => 'blå',
    ),
  ),
  'shop_is_live' => 
  array (
    'subject' => 'Butikken din er tilbake til LIVE!',
    'greeting' => 'Hei :merchant',
    'message' => 'Dette er en varsling for å gi deg beskjed om at butikken din :shop_name er tilbake i live!',
    'action' => 
    array (
      'text' => 'Gå til dashbordet',
      'color' => 'grønn',
    ),
  ),
  'shop_deleted' => 
  array (
    'subject' => 'Butikken din er fjernet fra :marketplace!',
    'greeting' => 'Hallo selger!',
    'message' => 'Dette er et varsel for å gi deg beskjed om at butikken din er blitt slettet fra vårt sted! Vi vil savne deg.',
  ),
  'system_is_down' => 
  array (
    'subject' => 'Markedsplassen din :marketplace er nede nå!',
    'greeting' => 'Hei :user!',
    'message' => 'Dette er et varsel for å gi deg beskjed om at markedsplassen din :marketplace er nede! Ingen kunder kan besøke markedsplassen din før den er i live igjen.',
    'action' => 
    array (
      'text' => 'Gå til konfigurasjonssiden',
      'color' => 'blå',
    ),
  ),
  'system_is_live' => 
  array (
    'subject' => 'Markedsplassen din :marketplace er tilbake til LIVE!',
    'greeting' => 'Hei :user!',
    'message' => 'Dette er et varsel for å gi deg beskjed om at markedsplassen din :marketplace er i live igjen!',
    'action' => 
    array (
      'text' => 'Gå til dashbordet',
      'color' => 'grønn',
    ),
  ),
  'system_info_updated' => 
  array (
    'subject' => ':marketplace - markedsinformasjon oppdatert!',
    'greeting' => 'Hei :user!',
    'message' => 'Dette er et varsel for å gi deg beskjed om at markedsplassen din :marketplace har blitt oppdatert!',
    'action' => 
    array (
      'text' => 'Gå til dashbordet',
      'color' => 'blå',
    ),
  ),
  'system_config_updated' => 
  array (
    'subject' => ':marketplace - markedskonfigurasjon ble oppdatert!',
    'greeting' => 'Hei :user!',
    'message' => 'Konfigurasjonen av markedsplassen din :marketplace har blitt oppdatert! Klikk på knappen nedenfor for å logge inn på adminpanelet.',
    'action' => 
    array (
      'text' => 'Vis innstillinger',
      'color' => 'blå',
    ),
  ),
  'new_contact_us_message' => 
  array (
    'subject' => 'Ny melding via kontaktskjema: :subject',
    'greeting' => 'Hallo!',
    'message_footer_with_phone' => 'Du kan svare på denne e-posten eller kontakte direkte på denne telefonen :phone',
    'message_footer' => 'Du kan svare på denne e-posten direkte.',
  ),
  'ticket_acknowledgement' => 
  array (
    'subject' => '[Billett-ID: :ticket_id] :subject',
    'greeting' => 'Hei :user',
    'message' => 'Dette er et varsel for å gi deg beskjed om at vi har mottatt billetten din :ticket_id vellykket! Supportsteamet vårt vil komme tilbake til deg så snart som mulig.',
    'action' => 
    array (
      'text' => 'Vis billetten',
      'color' => 'blå',
    ),
  ),
  'ticket_created' => 
  array (
    'subject' => 'Ny supportbillett [Billett-ID: :ticket_id] :subject',
    'greeting' => 'Hallo!',
    'message' => 'Du har mottatt en ny supportbillett-ID :ticket_id, avsender :sender fra leverandøren :vendor. Gjennomgå og vurdere billetten til supportteamet.',
    'action' => 
    array (
      'text' => 'Vis billetten',
      'color' => 'grønn',
    ),
  ),
  'ticket_assigned' => 
  array (
    'subject' => 'En billett som nettopp er tildelt deg [Ticket IF: :ticket_id] :subject',
    'greeting' => 'Hei :user',
    'message' => 'Dette er en varsling for å gi deg beskjed om at billett [Ticket ID: :ticket_id] :subject just asseded to you. Gå gjennom og svar billetten til så snart som mulig.',
    'action' => 
    array (
      'text' => 'Svar på billetten',
      'color' => 'blå',
    ),
  ),
  'ticket_replied' => 
  array (
    'subject' => ':user svarte billetten [Ticket ID: :ticket_id] :subject',
    'greeting' => 'Hei :user',
    'message' => ':reply',
    'action' => 
    array (
      'text' => 'Vis billetten',
      'color' => 'blå',
    ),
  ),
  'ticket_updated' => 
  array (
    'subject' => 'En billett [Billett-ID: :ticket_id] :subject er oppdatert!',
    'greeting' => 'Hei :user!',
    'message' => 'En av supportbillettene-ID-ID: ticket_id :subject er oppdatert. Kontakt oss hvis du trenger hjelp.',
    'action' => 
    array (
      'text' => 'Vis billetten',
      'color' => 'blå',
    ),
  ),
  'user_created' => 
  array (
    'subject' => ':admin la deg til markedet :marketplace!',
    'greeting' => 'Gratulerer :user!',
    'message' => 'Du er lagt til :marketplace av :admin! Klikk på knappen nedenfor for å logge inn på kontoen din. Bruk det midlertidige passordet for første innlogging.',
    'alert' => 'Ikke glem å endre passord etter innlogging.',
    'action' => 
    array (
      'text' => 'Besøk profilen din',
      'color' => 'grønn',
    ),
  ),
  'user_updated' => 
  array (
    'subject' => 'Kontoinformasjon oppdatert!',
    'greeting' => 'Hei :user!',
    'message' => 'Dette er et varsel for å gi deg beskjed om at kontoen din er oppdatert!',
    'action' => 
    array (
      'text' => 'Besøk profilen din',
      'color' => 'blå',
    ),
  ),
  'verdor_registered' => 
  array (
    'subject' => 'Ny leverandør nettopp registrert!',
    'greeting' => 'Vi gratulerer!',
    'message' => 'Markedsplassen din :marketplace har nettopp fått en ny verdor med butikknavn <strong>: butikknavn </strong> og selgers e-postadresse er :merchant_email',
    'action' => 
    array (
      'text' => 'Gå til dashbordet',
      'color' => 'grønn',
    ),
  ),
  'email_verification' => 
  array (
    'subject' => 'Bekreft :marketplace-kontoen din!',
    'greeting' => 'Gratulerer :user!',
    'message' => 'Kontoen din er opprettet. Klikk på knappen nedenfor for å bekrefte e-postadressen din.',
    'button_text' => 'Bekreft e-posten min',
  ),
  'dispute_solved' => 
  array (
    'subject' => 'Tvist [Bestillings-ID: :order_id] er merket som løst!',
    'greeting' => 'Hei :customer!',
    'message' => 'Tvisten for ordre-ID: :order_id er merket som løst. Takk for at du er sammen med oss.',
    'action' => 
    array (
      'text' => 'Se på tvisten',
      'color' => 'grønn',
    ),
  ),
);