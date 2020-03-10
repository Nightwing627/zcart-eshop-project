<?php 
return array (
  'add_input_field' => 'Lägg till inmatningsfält',
  'remove_input_field' => 'Ta bort detta inmatningsfält',
  'marketplace_name' => 'Namnet på marknadsplatsens namn. Besökare kommer att se detta namn.',
  'system_legal_name' => 'Företagets lagliga namn',
  'min_pass_lenght' => 'Minst 6 tecken',
  'role_name' => 'Användarens roll',
  'role_type' => 'Plattform och köpman. Rolltypsplattformen är endast tillgänglig för huvudplattformanvändaren, en köpman kan inte använda den här rollen. Rolltypen Merchant kommer att finnas tillgänglig när en köpman lägger till en ny användare.',
  'role_level' => 'Rollnivå kommer att användas för att bestämma vem som kan kontrollera vem. Exempel: En användare med rollnivå 2 kan inte modifiera någon användare med rollnivå 1. Håll emty om rollen är för slutnivåanvändare.',
  'you_cant_set_role_level' => 'Endast toppnivåanvändare kan ställa in detta värde.',
  'cant_edit_special_role' => 'Denna rolltyp är inte redigerbar. Var noga med att ändra behörigheterna för denna roll.',
  'set_role_permissions' => 'Ställ in rollbehörigheter mycket noggrant. Välj "Rolltyp" för att få godkännandemoduler.',
  'permission_modules' => 'Aktivera modulen för att ställa in tillstånd för modulen',
  'shipping_rate_delivery_takes' => 'Var specifik, kunden kommer att se detta.',
  'type_dbreset' => 'Skriv det exakta ordet "RESET" i rutan för att bekräfta din önskan.',
  'type_environment' => 'Skriv det exakta ordet "MILJÖ" i rutan för att bekräfta din önskan.',
  'type_uninstall' => 'Skriv det exakta ordet "UNINSTALL" i rutan för att bekräfta din önskan.',
  'module' => 
  array (
    'name' => 'Alla användare under denna roll kan göra specifika åtgärder för att hantera :module.',
    'access' => 
    array (
      'common' => 'Detta är en :access-modul. Det betyder att både plattformsanvändare och handlare kan få åtkomst.',
      'platform' => 'Detta är en :access-modul. Det betyder att endast plattformsanvändare kan få åtkomst.',
      'merchant' => 'Detta är en :access-modul. Det betyder att bara handlare kan få åtkomst.',
    ),
  ),
  'currency_iso_code' => 'ISO 4217-kod. Till exempel har amerikanska dollar koden USD och Japans valutakod är JPY.',
  'currency_subunit' => 'Underenheten som är en bråkdel av basenheten. Till exempel: cent, centavo, paisa',
  'currency_symbol_first' => 'Exempel: $ 13,21',
  'currency_decimalpoint' => 'Exempel: 13.21, 13,21',
  'currency_thousands_separator' => 'Exempel: 1 000, 1 000, 1 000',
  'cover_img_size' => 'Storleken på omslagsbilden ska vara 1280x300px',
  'slug' => 'Slug är vanligtvis en sökmotorvänlig URL',
  'shop_slug' => 'Detta kommer att användas som din webbadress för butiken. Du kan inte ändra den senare. Var kreativ att välja snigel för din butik',
  'shop_url' => 'Den kompletta vägen till butikens målsida. Du kan inte ändra webbadressen.',
  'shop_timezone' => 'Tidszonen påverkar inte butiken eller marknaden. Det är bara för att veta mer om din butik',
  'url' => 'webbadress',
  'optional' => '(valfri)',
  'use_markdown_to_bold' => 'Lägg till ** båda sidorna av viktiga nyckelord för att markera',
  'announcement_action_text' => 'Valfri åtgärdsknapp för att länka tillkännagivandet till valfri url',
  'announcement_action_url' => 'Handlings url till blogginlägg eller vilken url som helst',
  'blog_feature_img_hint' => 'Bildstorleken ska vara 960x480px',
  'code' => 'Koda',
  'brand' => 'Produktens varumärke. Ej krävs men rekommenderas',
  'shop_name' => 'Butikets varumärke eller visningsnamn',
  'shop_status' => 'Om den är aktiv kommer butiken att finnas direkt.',
  'shop_maintenance_mode_handle' => 'Om underhållsläget är aktiverat kommer butiken att vara offline och alla listor kommer att vara nere från marknaden tills underhållet är avstängt.',
  'system_maintenance_mode_handle' => 'Om underhållsläget är aktiverat kommer marknadsplatsen att vara offline och flaggan för underhållsläge visas för besökarna. Köpmän kan fortfarande komma åt sin adminpanel.',
  'system_physical_address' => 'Den fysiska platsen för marknaden / kontoret',
  'system_email' => 'Alla meddelanden skickas till den här e-postadressen, acceptera supportmeddelanden (om inställd)',
  'system_timezone' => 'Det här systemet använder denna tidszon för att fungera.',
  'system_currency' => 'Marknadsplatsens valuta',
  'system_slogan' => 'Den tagline som beskriver din marknadsplats mest',
  'system_length_unit' => 'Enhetens längd kommer att användas över hela marknaden.',
  'system_weight_unit' => 'Viktenhet kommer att användas över hela marknaden.',
  'system_valume_unit' => 'Enhet av valym kommer att användas över hela marknaden.',
  'ask_customer_for_email_subscription' => 'När en ny kund registrerar ett konto, fråga din kund om han / hon vill få kampanjer och andra aviseringar via e-post. Att stänga av alternativet resulterar i automatisk prenumeration. I så fall ska du göra det klart i avsnittet om villkor och villkor.',
  'allow_guest_checkout' => 'Detta gör det möjligt för kunder att kassa utan att registrera sig på webbplatsen.',
  'vendor_can_view_customer_info' => 'Detta gör att leverantörer kan se kundens detaljerade information på beställningssidan. Annars kommer namn, e-postadress och fakturerings- / leveransadresser att vara synliga.',
  'system_pagination' => 'Ställ in paginationsvärdet för datatabellerna på adminpanelen.',
  'subscription_name' => 'Ge ett meningsfullt namn på prenumerationsplanen.',
  'subscription_plan_id' => 'Detta är den identifierare som måste vara exakt matchande med Stripes plan-ID',
  'featured_subscription' => 'Det bör bara finnas en prenumeration på det',
  'subscription_cost' => 'Kostnaden för prenumerationen per månad',
  'team_size' => 'Lagstorlek är antalet totala användare som kan registrera sig under detta team',
  'inventory_limit' => 'Antalet totala listan. En variant av samma produkt kommer att betraktas som en annan artikel.',
  'marketplace_commission' => 'Procentandel av beställningsvärdesavgiften från marknaden',
  'transaction_fee' => 'Om du vill ta ut en fast avgift för varje enskild transaktion',
  'subscription_best_for' => 'Mål kund för detta paket. Detta kommer att vara synligt för kunden.',
  'config_return_refund' => 'Retur- och återbetalningspolicy för din butik. Läs marknadsplatsens policy innan du anger din.',
  'config_trial_days' => 'Handlare debiteras efter provperioden. Om du inte tar kort i förväg, kommer frysskontot att frysas efter denna tid.',
  'charge_after_trial_days' => 'Debiteras efter provperioden på :days dagar.',
  'required_card_upfront' => 'Vill du ta kortinformation när köparen registrerar sig?',
  'leave_empty_to_save_as_draft' => 'Lämna tomt för att spara som utkast',
  'logo_img_size' => 'Logobildsstorleken ska vara minst 300x300px',
  'brand_logo_size' => 'Logobildstorleken ska vara 120x40px och .png',
  'brand_icon_size' => 'Ikonbildens storlek ska vara 32x32px och .png',
  'config_alert_quantity' => 'Ett e-postmeddelande kommer att skickas till att ditt lager ligger under varningskvantiteten',
  'config_max_img_size_limit_kb' => 'Det maximala gränssystemet för bildstorlek kan laddas upp för produkt / lager / logotyp / avatar. Storleken i kilobyte.',
  'config_max_number_of_inventory_imgs' => 'Välj hur många bilder som ska laddas upp för en enda inventeringsartikel.',
  'config_address_default_country' => 'Ställ in detta värde så att du fyller adressformuläret snabbare. Uppenbarligen kan en användare ändra värdet när man lägger till en ny adress.',
  'config_address_default_state' => 'Ställ in detta värde så att du fyller adressformuläret snabbare. Uppenbarligen kan en användare ändra värdet när man lägger till en ny adress.',
  'config_show_address_title' => 'Visa / dölj adresstitel medan du visar / skriver ut en adress.',
  'config_address_show_country' => 'Visa / dölj landets namn medan du visar / skriver ut en adress. Detta är användbart om din marknad i en liten region.',
  'config_address_show_map' => 'Vill du visa karta med adresser? Det här alternativet genererar karta med Google Map.',
  'config_show_currency_symbol' => 'Vill du visa valutasymbol när du representerar ett pris? Exempel: $ 123',
  'config_show_space_after_symbol' => 'Vill du formatera priset genom att sätta ett mellanslag efter symbolen. Exempel: $ 123',
  'config_decimals' => 'Hur många siffror du vill visa efter decimalpunkten? Exempel: 13.21, 13.123',
  'config_gift_card_pin_size' => 'Hur många siffror du vill generera presentkortnummer. Standardlängd 10',
  'config_gift_card_serial_number_size' => 'Hur många siffror du vill generera presentkort serienummer. Standardlängd 13',
  'config_coupon_code_size' => 'Hur många siffror du vill generera kuponkod. Standardlängd 8',
  'shop_email' => 'Alla aviseringar kommer att skickas till denna e-postadress (inventeringar, beställningar, biljetter, disputs etc.) accepterar kundsupport-e-postmeddelanden (om de är inställda)',
  'shop_legal_name' => 'Butikens lagliga namn',
  'shop_owner_id' => 'Ägarens och superadministratören för butiken. En användare som är registrerad som köpman kan äga en butik. Du kan inte ändra det senare.',
  'shop_description' => 'Varumärkesbeskrivningen av butiken, denna information kommer att visas på butikens hemsida.',
  'attribute_type' => 'Typ av attribut. Detta hjälper till att visa alternativen på produktsidan.',
  'attribute_name' => 'Detta namn kommer att visas på produktsidan.',
  'attribute_value' => 'Detta värde kommer att visas på produktsidan som valbart alternativ.',
  'parent_attribute' => 'Alternativet kommer att visas under detta attribut.',
  'list_order' => 'Visa ordning på listan.',
  'shop_external_url' => 'Om du äger en webbplats kan du lägga till den externa länken här, webbadressen kan ställas in som butikens målsida.',
  'product_name' => 'Kunderna kommer inte att se detta. Det här namnet hjälper bara köpmän att hitta objektet för listning.',
  'product_featured_image' => 'Kunderna kommer inte att se detta. Detta hjälper bara köpmän att hitta objektet för listning.',
  'product_images' => 'Kunderna kommer att se dessa bilder endast om säljarens lista inte har några bilder att visa.',
  'product_active' => 'Handlare hittar bara aktiva föremål.',
  'product_description' => 'Kunderna kommer att se detta. Detta är kärnan och den vanliga produktbeskrivningen.',
  'model_number' => 'En identifierare av en produkt som ges av tillverkaren. Ej krävs men rekommenderas',
  'gtin' => 'Global Trade Item Number (GTIN) är en unik identifierare av en produkt på den globala marknaden. Om du vill få en ISBN- eller UPC-kod för din produkt hittar du mer information på följande webbplatser: http://www.isbn.org/ och http://www.uc-council.org/',
  'mpn' => 'Tillverkarens varunummer (MPN) är en unik identifierare som utfärdas av tillverkaren. Du kan få MPN från tillverkaren. Ej krävs men rekommenderas',
  'sku' => 'SKU (Stock Keeping Unit) är den säljarspecifika identifieraren. Det hjälper till att hantera ditt lager',
  'isbn' => 'International Standard Book Number (ISBN) är en unik streckkod för kommersiell bokidentifiering. Varje ISBN-kod identifierar en bok unikt. ISBN har antingen 10 eller 13 siffror. Alla ISBN tilldelade efter 1 januari 2007 har 13 siffror. Vanligtvis skrivs ISBN ut på baksidan av boken',
  'ean' => 'European Article Number (EAN) är en streckkodstandard, en 12- eller 13-siffrig produktidentifieringskod. Du kan få EAN från tillverkaren. Om dina produkter inte har tillverkare EAN, och du behöver köpa EAN-koder, gå till GS1 UK http://www.gs1uk.org',
  'upc' => 'Universal Product Code (UPC), även kallad GTIN-12 och UPC-A. En unik numerisk identifierare för kommersiella produkter som vanligtvis är associerad med en streckkod tryckt på detaljhandeln',
  'meta_title' => 'Titeltaggar - tekniskt kallade titelelement - definierar titeln på ett dokument. Titeltaggar används ofta på sökmotors resultatsidor (SERP) för att visa förhandsgranskningsavsnitt för en given sida, och är viktiga både för SEO och social delning',
  'meta_description' => 'Metabeskrivningar är HTML-attribut som innehåller kortfattade förklaringar av innehållet på webbsidor. Metabeskrivningar används vanligtvis på sökmotors resultatsidor (SERP) för att visa förhandsvisningsavsnitt för en given sida',
  'catalog_min_price' => 'Ställ in ett minimipris för produkten. Leverantörer kan lägga till lager inom dessa prisgränser.',
  'catalog_max_price' => 'Ställ in ett högsta pris för produkten. Leverantörer kan lägga till lager inom dessa prisgränser.',
  'has_variant' => 'Denna artikel har varianter som olika färger, former, storlekar etc.',
  'requires_shipping' => 'Denna artikel kräver frakt.',
  'downloadable' => 'Den här artikeln är ett digitalt innehåll och köpare kan ladda ner föremålet.',
  'manufacturer_url' => 'Tillverkarens officiella webbplatslänk.',
  'manufacturer_email' => 'Systemet kommer att använda den här e-postadressen för att kommunicera med tillverkaren.',
  'manufacturer_phone' => 'Producentens supporttelefonnummer.',
  'supplier_email' => 'Systemet kommer att använda den här e-postadressen för att kommunicera med leverantören.',
  'supplier_contact_person' => 'Kontaktperson',
  'shop_address' => 'Butikens fysiska adress.',
  'search_product' => 'Du kan använda alla GTIN-identifierare som UPC, ISBN, EAN, JAN eller ITF. Du kan också använda namn och modellnummer ELLER del av namn eller modellnummer.',
  'seller_description' => 'Detta är en säljarspecifik beskrivning av produkten. Kunden ser detta',
  'seller_product_condition' => 'Vad är produktens nuvarande skick?',
  'condition_note' => 'Skickanmärkning är till hjälp när produkten används / renoveras',
  'select_supplier' => 'Rekommenderat fält. Detta hjälper till att generera rapporter',
  'select_warehouse' => 'Välj lagret där produkten kommer att levereras.',
  'select_packagings' => 'Lista över tillgängliga förpackningsalternativ för att skicka produkten. Lämna tomt för att inaktivera förpackningsalternativet',
  'available_from' => 'Datum då beståndet kommer att finnas tillgängligt. Standard = omedelbart',
  'sale_price' => 'Priset utan skatt. Skatt beräknas automatiskt baserat på fraktzon.',
  'purchase_price' => 'Rekommenderat fält. Detta hjälper dig att beräkna vinster och generera rapporter',
  'min_order_quantity' => 'Kvantiteten tillåten att ta order. Måste vara ett heltal. Standard = 1',
  'offer_price' => 'Erbjudandepriset kommer att ske mellan startdatum och slutdatum',
  'offer_start' => 'Ett erbjudande måste ha ett startdatum. Obligatoriskt om anbudsprisfältet anges',
  'offer_end' => 'Ett erbjudande måste ha ett slutdatum. Obligatoriskt om anbudsprisfältet anges',
  'seller_inventory_status' => 'Är varan öppen för försäljning? Inaktiv artikel kommer inte att visas på marknaden.',
  'stock_quantity' => 'Antal artiklar du har på ditt lager',
  'offer_starting_time' => 'Erbjuda starttid',
  'offer_ending_time' => 'Erbjudande sluttid',
  'set_attribute' => 'Om värdet inte finns i listan kan du lägga till lämpligt värde genom att bara skriva det nya värdet',
  'variants' => 'Produktvarianter',
  'delete_this_combination' => 'Ta bort denna kombination',
  'romove_this_cart_item' => 'Ta bort denna artikel från vagnen',
  'no_product_found' => 'Ingen produkt hittades! Vänligen prova annan sökning eller lägg till ny produkt',
  'not_available' => 'Inte tillgänglig!',
  'admin_note' => 'Administratörsanteckning visas inte för kunden',
  'message_to_customer' => 'Det här meddelandet skickas till kunden med fakturamailen',
  'empty_cart' => 'Vagnen är tom',
  'send_invoice_to_customer' => 'Skicka en faktura till kunden med detta meddelande',
  'delete_the_cart' => 'Ta bort vagnen och fortsätt beställningen',
  'order_status_send_email' => 'Ett e-postmeddelande kommer att skickas till kunden när orderstatusen uppdateras',
  'order_status_email_template' => 'Den här e-postmallen skickas till kunden när orderstatus uppdateras. Obligatoriskt om e-postmeddelandet är aktiverat för statusen',
  'update_order_status' => 'Uppdatera orderstatusen',
  'email_template_name' => 'Ge mallen ett namn. Detta är endast för systemanvändning.',
  'template_use_for' => 'Mallen kommer att användas av',
  'email_template_subject' => 'Detta kommer att användas som ämne för e-postmeddelandet.',
  'email_template_body' => 'Det finns några korta koder som du kan använda för dynamisk information. Kolla nederst på detta formulär för att se tillgängliga kortkoder.',
  'email_template_type' => 'Typ av e-post.',
  'template_sender_email' => 'Den här e-postadressen används för att skicka e-postmeddelanden och mottagaren kan svara på detta.',
  'template_sender_name' => 'Detta namn kommer att användas som avsändarnamn',
  'packaging_name' => 'Kunden ser detta om förpackningsalternativet är tillgängligt vid beställning',
  'width' => 'Förpackningens bredd',
  'height' => 'Förpackningens höjd',
  'depth' => 'Förpackningens djup',
  'packaging_cost' => 'Kostnaden för förpackning. Du kan välja om du vill ta ut kostnaderna för kunder eller inte',
  'set_as_default_packaging' => 'Om markerad: denna förpackning kommer att användas som standard leveranspaket',
  'shipping_carrier_name' => 'Fraktföretagets namn',
  'shipping_zone_name' => 'Ge ett namn på zonen. Kunden ser inte detta namn.',
  'shipping_rate_name' => 'Ge ett meningsfullt namn. Kunden kommer att se detta namn vid kassan. e. g. \'Standard Frakt\'',
  'shipping_zone_carrier' => 'Du kan länka leveransföretaget. Kunden kommer att se detta i kassan.',
  'free_shipping' => 'Om det är aktiverat visas etiketten för fri frakt på sidan med produktlistan.',
  'shipping_rate' => 'Markera alternativet "Fri frakt" eller ge 0 belopp för gratis frakt',
  'shipping_zone_tax' => 'Denna skatteprofil kommer att tillämpas när kunden gör ett köp från denna leveranszon',
  'shipping_zone_select_countries' => 'Välj länder till den här zonen du skickar till. Markera alternativet Rest of the world för global zon.',
  'rest_of_the_world' => 'Denna zon inkluderar alla länder och regioner som inte redan har definierats i dina andra leveranszoner.',
  'shipping_max_width' => 'Maximal paketbreddhandtag från bäraren. Lämna tomt för att inaktivera.',
  'shipping_tracking_url' => '\'@\' kommer att ersättas av det dynamiska spårningsnumret',
  'shipping_tracking_url_example' => 't ex: http://example.com/track.php?num=@',
  'order_tracking_id' => 'Beställningsspårnings-ID tillhandahållet av leverantören av leverans.',
  'order_fulfillment_carrier' => 'Välj fraktföretag för att uppfylla beställningen.',
  'notify_customer' => 'Ett e-postmeddelande skickas till kunden med nödvändig information.',
  'shipping_weight' => 'Den kommer att användas för att beräkna fraktkostnaden.',
  'order_number_prefix_suffix' => 'Prefixet och suffixet läggs till automatiskt för att formatera alla ordernummer. Lämna det tomt om du inte vill formulera ordernummer.',
  'customer_not_see_this' => 'Kunden ser inte detta',
  'customer_will_see_this' => 'Kunderna kommer att se detta',
  'refund_select_order' => 'Välj den beställning du vill återbetala',
  'refund_order_fulfilled' => 'Skickas beställningen till kunden?',
  'refund_return_goods' => 'Kommer artikeln tillbaka till dig?',
  'customer_paid' => 'Kunden betalade <strong> <em> :amount </em> </strong> inklusive alla skatter, fraktkostnader och andra.',
  'order_refunded' => 'Tidigare återbetalas <strong> <em> :amount </em> </strong> av det totala <strong> <em> :total </em> </strong>',
  'search_customer' => 'Hitta kunden via e-postadress, trevligt namn eller fullt namn.',
  'coupon_quantity' => 'Totalt antal tillgängliga kuponger',
  'coupon_name' => 'Namnet kommer att användas i faktura och orderöversikt',
  'coupon_code' => 'Den unika kupongkoden',
  'coupon_value' => 'Värdet på kupongen',
  'coupon_min_order_amount' => 'Välj minsta beställningsbelopp för vagnen (valfritt)',
  'coupon_quantity_per_customer' => 'Välj hur många gånger en kund kan använda den här kupongen. Om du lämnar den tom kan en kund använda den här kupongen tills den är tillgänglig.',
  'starting_time' => 'Kupongen kommer att finnas tillgänglig från denna tid',
  'ending_time' => 'Kupongen kommer att finnas tillgänglig tills dess',
  'exclude_tax_n_shipping' => 'Exkludera skatt och fraktkostnad',
  'exclude_offer_items' => 'Uteslut objekt som redan har ett löpande erbjudande eller rabatt',
  'coupon_limited_to_customers' => 'Välj om du bara vill göra kupongen för specifika kunder',
  'coupon_limited_to_shipping_zones' => 'Välj om du bara vill göra kupongen för specifika fraktzoner',
  'coupon_limited_to' => 'Använd e-postadress eller namn för att hitta kunder',
  'faq_placeholders' => 'Du kan använda denna platshållare i din fråga och svar, detta kommer att ersättas av det verkliga värdet',
  'gift_card_name' => 'Namnet på presentkortet.',
  'gift_card_pin_code' => 'Den unika hemliga koden. PIN-koden är kortets lösenord. Du kan inte ändra detta värde senare.',
  'gift_card_serial_number' => 'Kortets unika serienummer. Du kan inte ändra detta värde senare.',
  'gift_card_value' => 'Värdet på kortet. Kunden får samma rabatt.',
  'gift_card_activation_time' => 'Kortets aktiveringstid. Kortet kan användas efter denna tid.',
  'gift_card_expiry_time' => 'Kortets utgångstid. Kortet kan vara giltigt till dess.',
  'gift_card_partial_use' => 'Tillåt delvis användning av det totala kortvärdet',
  'number_between' => 'Mellan :min och :max',
  'default_tax_id' => 'Standardskattprofil kommer att tillämpas när leveranszonen inte täcks av något skatteområde.',
  'default_payment_method_id' => 'Om det är valt kommer betalningsmetoden att väljas vid skapandet av en ny order',
  'config_order_handling_cost' => 'Denna tillkostnadsplatta läggs till med fraktkostnaden för alla beställningar. Lämna det tomt för att inaktivera orderhanteringsavgiften',
  'default_warehouse' => 'Standardlagret väljs i förväg när du lägger till en ny inventering',
  'default_supplier' => 'Standardleverantör kommer att väljas vid tillägg av ny inventering',
  'default_packaging_ids_for_inventory' => 'Standardförpackningar kommer att förvalas när du lägger till en ny inventering. Detta hjälper dig att lägga till lager snabbare',
  'config_payment_environment' => 'Är referenser för live-läge eller testar mer?',
  'config_authorize_net_transaction_key' => 'Transaktionsnyckeln från Authorize.net. Om du inte är säker, kontakta Authorize.net för att få hjälp.',
  'config_authorize_net_api_login_id' => 'API-inloggnings-ID från Authorize.net. Om du inte är säker, kontakta Authorize.net för att få hjälp.',
  'config_enable_payment_method' => 'Systemet erbjuder olika typer av betalningsportar. Du kan aktivera / inaktivera valfri betalningsport för att kontrollera betalningsalternativ som säljaren kan använda för att acceptera betalning från kunder.',
  'config_additional_details' => 'Visas på sidan Betalningsmetod medan kunden väljer att betala.',
  'config_payment_instructions' => 'Visas på tacksidan efter att kunden har gjort sin beställning.',
  'config_stripe_publishable_key' => 'Publicerbara API-nycklar är endast avsedda att identifiera ditt konto med Stripe, de är inte hemliga. De kan säkert publiceras.',
  'config_paypal_express_account' => 'Vanligtvis e-postadressen för din PayPal-applikation. Skapa din PayPal-applikation härifrån: https://developer.paypal.com/webapps/developer/applications/myapps',
  'config_paypal_express_client_id' => 'Klient-ID är en lång unik identifierare av din PayPal-applikation. Du hittar detta värde i avsnittet Mina appar och referenser på din PayPal-instrumentbräda.',
  'config_paypal_express_secret' => 'PayPal-hemlighetsnyckeln. Du hittar detta värde i avsnittet Mina appar och referenser på din PayPal-instrumentbräda.',
  'config_paystack_merchant_email' => 'Handlarens e-postmeddelande på ditt Paystack-konto.',
  'config_paystack_public_key' => 'Public Key är en lång unik identifierare av din Paystack-applikation. Du hittar detta värde i avsnittet API-nycklar och webhooks i inställningarna på din Paystack-instrumentbräda.',
  'config_paystack_secret' => 'Paystack API Secret Key. Du hittar detta värde i avsnittet API-nycklar och webhooks i inställningarna på din Paystack-instrumentbräda.',
  'config_auto_archive_order' => 'Arkivera beställningen automatiskt. Välj den här funktionen om du inte vill arkivera alla beställningar manuellt efter att de har uppfyllts.',
  'config_pagination' => 'Hur många listobjekt du vill visa per sida i datatabellerna',
  'support_phone' => 'Kunden kommer att kontakta detta nummer för support och fråga',
  'support_email' => 'Du får all support-e-post till den här adressen',
  'support_phone_toll_free' => 'Om du har ett avgiftsfritt nummer för kundsupport',
  'default_sender_email_address' => 'Alla automatiserade e-postmeddelanden till kunder skickas från den här e-postadressen. Och även när en avsändares e-postadress inte kan ställas in när du skickar ett e-postmeddelande',
  'default_email_sender_name' => 'Detta namn kommer att användas som avsändare av e-post som skickas från standard avsändarens e-postadress',
  'google_analytic_report' => 'Du bör bara aktivera detta, om systemet är konfigurerat med Google Analytics. Annars kan det orsaka fel. Kontrollera dokumentationen för hjälp. Alternativt kan du använda programmets inbyggda rapportsystem.',
  'inventory_linked_items' => 'De länkade artiklarna kommer att visas på produktsidan som ofta köpta föremål. Detta är valfritt men viktigt.',
  'notify_new_message' => 'Skicka mig ett meddelande när ett nytt meddelande kom',
  'notify_alert_quantity' => 'Skicka mig ett meddelande när någon artikel på mitt lager når nivån för varningskvantitet',
  'notify_inventory_out' => 'Skicka ett meddelande när någon artikel på mitt lager är i lager',
  'notify_new_order' => 'Skicka mig ett meddelande när en ny beställning har lagts i min butik',
  'notify_abandoned_checkout' => 'Skicka ett meddelande när kunden övergav kassan till min artikel',
  'notify_when_vendor_registered' => 'Skicka ett meddelande när en ny leverantör har registrerats',
  'notify_new_ticket' => 'Skicka mig ett meddelande när en supportbiljett har skapats i systemet',
  'notify_new_disput' => 'Skicka mig ett meddelande när en kund skickar in en ny tvist',
  'notify_when_dispute_appealed' => 'Skicka mig ett meddelande när en tvist har överklagats till granskning av marknadsteamet',
  'download_template' => '<a href=":url"> Ladda ner ett exempel på en CSV-mall </a> för att se ett exempel på det format som krävs.',
  'download_category_slugs' => '<a href=":url"> Ladda ner kategorisneglar </a> för att få rätt kategori för dina produkter.',
  'first_row_as_header' => 'Den första raden är rubriken. <strong> Ändra inte </strong> den här raden.',
  'user_category_slug' => 'Använd kategori <strong> slug </ strong> i kategorifältet.',
  'cover_img' => 'Den här bilden visas längst upp på :page-sidan',
  'cat_grp_img' => 'Den här bilden visas på bakgrunden av listrutan för kategori',
  'cat_grp_desc' => 'Kunden ser inte detta. Men köpmän kommer att se detta.',
  'inactive_for_back_office' => 'Om de är inaktiva kan kunder fortfarande besöka :page-sidan. Men köpmän kan inte använda denna :page för framtida notering.',
  'invalid_rows_will_ignored' => 'Ogiltiga rader kommer att ignoreras </ strong>.',
  'upload_rows' => 'Du kan ladda upp högst <strong>: rader poster </strong> per batch för bättre prestanda.',
  'name_field_required' => 'Namnfält krävs.',
  'email_field_required' => 'E-post krävs.',
  'invalid_email' => 'Ogiltig e-postadress.',
  'invalid_category' => 'Ogiltig kategori.',
  'category_desc' => 'Ge en kort detalj. Kunderna kommer att se detta.',
  'email_already_exist' => 'E-postadressen som redan används.',
  'slug_already_exist' => 'Slugan som redan används.',
  'display_order' => 'Detta nummer kommer att användas för att ordna visningsorder. Det minsta antalet visas först.',
  'banner_title' => 'Den här raden kommer att markeras på bannern. Lämna det tomt om du inte vill visa titeln.',
  'banner_description' => '(Exempel: 50% rabatt!) Lämna det tomt om du inte vill visa det.',
  'banner_image' => 'Huvudbilden vad som kommer att visas i bakgrunden. Använd vanligtvis en produktbild.',
  'banner_background' => 'Välj en färg eller ladda upp en bild som bakgrund.',
  'banner_group' => 'Placeringen av bannern på butikssidan. Bannern visas inte om gruppen inte är specificerad.',
  'bs_columns' => 'Hur många kolumner kommer denna banner att använda? Systemet använder 12 kolumns rutnät för att visa banners.',
  'banner_order' => 'Detta nummer kommer att användas för att ordna visningsordning i gruppen av banners. Det minsta antalet visas först.',
  'banner_link' => 'Användare kommer att omdirigera till den här länken.',
  'link_label' => 'Etiketten för länkknappen',
  'slider_link' => 'Användare kommer att omdirigera till den här länken.',
  'slider_title' => 'Den här linjen kommer att markeras över reglaget. Lämna det tomt om du inte vill visa titeln.',
  'slider_sub_title' => 'Den andra raden i titeln. Lämna det tomt om du inte vill visa det.',
  'slider_image' => 'Huvudbilden vad som kommer att visas som skjutreglaget. Det krävs för att generera reglaget.',
  'slider_img_hint' => 'Skjutbilden ska vara 1280x300px',
  'slider_order' => 'Skjutreglaget ordnas efter denna ordning.',
  'slider_thumb_image' => 'Denna lilla bild kommer att användas som miniatyrbild. Systemet skapar en miniatyrbild om den inte tillhandahålls.',
  'slider_thumb_hint' => 'Det kan vara 150x59px',
  'variant_image' => 'Bilden av varianten',
  'empty_trash' => 'Tömma papperskorgen. Alla objekt i papperskorgen raderas permanent.',
  'hide_trial_notice_on_vendor_panel' => 'Dölj testmeddelande på leverantörspanelen',
  'language_order' => 'Den position du vill visa detta språk på språkalternativet. Det minsta antalet visas först.',
  'locale_active' => 'Vill du visa det här språket på språkalternativet?',
  'locale_code' => 'Landskoden, koden måste ha samma namn som språkmappen.',
  'locale_code_exmaple' => 'Exempel för engelska är koden <em> en </em>',
  'new_language_info' => 'Ett nytt språk påverkar inte systemet om du verkligen gör transaktionen för språkkatalogen. Kontrollera dokumentationen för detaljer.',
  'php_locale_code' => 'PHP-landskoden för systemanvändning som översättning av datum, tid osv. Vänligen hitta hela listan över PHP-landskoden i dokumentationen.',
  'rtl' => 'Är språket från höger till vänster (RTL)?',
  'select_all_verification_documents' => 'Välj alla dokument på en gång.',
  'system_default_language' => 'Systemets standardspråk',
  'update_trial_period' => 'Uppdatera testperioden',
  'vendor_needs_approval' => 'Om den är aktiverad kräver varje ny leverantör manuellt godkännande från plattformadministratörspanelen för att få live.',
  'verified_seller' => 'Verifierad säljare',
  'mark_address_verified' => 'Markera som adressverifierad',
  'mark_id_verified' => 'Markera som ID-verifierad',
  'mark_phone_verified' => 'Markera som telefonverifierad',
  'missing_required_data' => 'Ogiltig data, Vissa uppgifter som krävs saknas.',
  'invalid_catalog_data' => 'Ogiltiga katalogdata, Kontrollera GTIN och annan information.',
  'product_have_to_be_catalog' => 'Produkten måste finnas i systemet <strong> katalog </ strong>. annars laddas den inte upp.',
  'need_to_know_product_gtin' => 'Du måste känna till <strong> GTIN </strong> för objekten innan du laddar upp.',
  'multi_img_upload_instruction' => 'Du kan ladda upp högst :number bilder och varje filstorlek kan inte överstiga :size KB',
  'number_of_img_upload_required' => 'Du måste välja minst <b> {n} </b> {filer} för att ladda upp. Försök igen din uppladdning!',
  'msg_invalid_file_extension' => 'Ogiltigt tillägg för filen {name}. Endast <b> {extensions} </b> filer stöds.',
  'number_of_img_upload_exceeded' => 'Du kan ladda upp högst <b> {m} </b> filer (<b> {n} </b> filer upptäckta).',
  'msg_invalid_file_too_learge' => 'Filen {name} (<b> {size} KB </b>) överskrider den maximala tillåtna uppladdningsstorleken på <b> {maxSize} KB </b>. Försök igen din uppladdning!',
  'required_fields_csv' => 'Dessa fält är <strong> obligatoriska </ strong> <em>: fält </em>.',
  'seller_condition_note' => 'Ange mer information om artikelvillkoret. Detta hjälper kunder att förstå varan.',
);