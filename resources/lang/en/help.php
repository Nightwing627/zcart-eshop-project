<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Help Language Lines
    |--------------------------------------------------------------------------
    |
    | The following language lines are used to display application language.
    | You are free to change them to anything
    | you want to customize your views to better match your application.
    |
    */

    'role_name' => 'The title of the user role',

    'role_type' => 'Restricted: The role only available for the main platform, a marchant can\'t use this role. Public: The role will available when a marchant will add a new user.',

    'role_level' => 'Role level will be use determine who can control who. Example: An user with role level 2 can\'t modify any the user with role level 1. Keep emty if the role is for end level users.',

    'cant_edit_special_role' => 'This role type is not editable. Be careful to modify the permissions of this role.',

    'set_role_permissions' => 'Set role permissions very carefully. Choose the \'Role Type\' to get approperit modules.',

    'permission_modules' => 'Enable the module to set permission for the module',

    'module' => [
        'name' => 'All users under this role will be able to do specified actions to manage :module.',

        'access' => [
            'common' => 'This is a :Access module. That means both platform users and merchant users can get access.',

            'platform' => 'This is a :Access module. That means only platform users can get access.',

            'merchant' => 'This is a :Access module. That means only merchant users can get access.',
        ]
    ],

    'slug' => 'Slugs are usually a URL friendly version of the title',

    'website' => 'Homepage link',

    'url' => 'Web address',

    'help_doc_link' => 'Help document link',

    'code' => 'Code',

    'brand' => 'The brand of the product. Not required but recommended',

    'shop_name' => 'The brand name of the shop',

    'shop_status' => 'If active, the shop will be live immediately.',

    'shop_email' => 'The official email address of the shop.',

    'shop_legal_name' => 'The legal name of the shop',

    'shop_owner_id' => 'The owner and super admin of the shop. A user registered as a Merchant can own a shop. You can\'t change this later.',

    'shop_owner_cant_change' => 'The owner of the shop can\'t be changed. Instead you can delete the shop and creat a new one.',

    'shop_description' => 'The brand description of the shop, this information will be visible on the shop\'s homepage.',

    'attribute_type' => 'The type of attribute. This will help to show the options on the product page.',

    'attribute_name' => 'This name will show on the product page.',

    'attribute_value' => 'This value will show on the product page as selectable option.',

    'parent_attribute' => 'The option will be shown under this arrtibute.',

    'list_order' => 'Viewing order on the list.',

    'external_url' => 'If you own a website you can put the external link here',

    'model_number' => 'An identifier of a product given by its manufacturer. Not required but recommended',

    'gtin' => 'Global Trade Item Number (GTIN) is a unique identifier of a product in the global marketplace. If you like to obtain an ISBN or UPC code for your product, you will find more information at the following websites: http://www.isbn.org/ and http://www.uc-council.org/',

    'mpn' => 'Manufacturer Part Number (MPN) is an unique identifier issued by the manufacturer. You can obtain MPNs from the manufacturer. Not required but recommended',

    'sku' => 'SKU is the seller specific identifier. It will help to manage your inventory',

    'isbn' => 'The International Standard Book Number (ISBN) is a unique commercial book identifier barcode. Each ISBN code identifies uniquely a book. ISBN have either 10 or 13 digits. All ISBN assigned after 1 Jan 2007 have 13 digits. Typically, the ISBN is printed on the back cover of the book',

    'ean' => 'The European Article Number (EAN) is a barcode standard, a 12- or 13-digit product identification  code. You can obtain EANs from the manufacturer. If your products do not have manufacturer EANs, and you need to buy EAN codes, go to GS1 UK http://www.gs1uk.org',

    'upc' => 'Universal Product Code (UPC), also called GTIN-12 and UPC-A. A unique numerical identifier for commercial products that\'s usually associated with a barcode printed on retail merchandise',

    'meta_title' => 'Title tags—technically called title elements—define the title of a document. Title tags are often used on search engine results pages (SERPs) to display preview snippets for a given page, and are important both for SEO and social sharing',

    'meta_description' => 'Meta descriptions are HTML attributes that provide concise explanations of the contents of web pages. Meta descriptions are commonly used on search engine result pages (SERPs) to display preview snippets for a given page',

    'catalog_min_price' => 'Set a minimun price for the product. Vendors can add inventory within this price limits.',

    'catalog_max_price' => 'Set a maximun price for the product. Vendors can add inventory within this price limits.',

    'has_variant' => 'This item has variants like different colors, shapes, sizes etc.',

    'requires_shipping' => 'This item requires shipping.',

    'downloadable' => 'This item is a digital content and buyers can download the item.',

    'manufacturer_url' => 'The official website link of the manufacturer.',

    'manufacturer_email' => 'The system will use this email address to communicate with the manufacturer.',

    'manufacturer_phone' => 'The support phone number of the manufacturer.',

    'supplier_email' => 'The system will use this email address to communicate with the supplier.',

    'supplier_contact_person' => 'Contact person',

    // 'supplier_phone' => 'The support phone number of the supplier.',

    // 'supplier_address' => 'The system will use this address to create invoice.',

    'search_product' => 'You can use any GTIN identifier like UPC, ISBN, EAN, JAN or ITF. You can also use name and model number OR part of name or model number.',

    'seller_description' => 'This is seller specific description of the product',

    'seller_product_condition' => 'What is the current condition of the product?',

    'condition_note' => 'Condition note is helpful when the product is used/refurbished',

    'select_supplier' => 'Recommended field. This will helps to generate reports',

    'select_warehouse' => 'Choose the warehouse from where the product will be shipped. Keep blank if the inventory will manage centrally',

    'select_tax' => 'The TAX will be added with the sale/offer price',

    'select_carriers' => 'List of available carriers to ship the product',

    'available_from' => 'The date when the stock will be available. Default = immediately',

    'sale_price' => 'The price',

    'purchase_price' => 'Recommended field. This will helps to calculate profits and generate reports',

    'min_order_quantity' => 'The quantity allowed to take orders. Must be an integer value. Default = 1',

    'offer_price' => 'The offer price will be effected between the offer start and end dates',

    'offer_start' => 'An offer must have a start date. Required if offer price field is given',

    'offer_end' => 'An offer must have an end date. Required if offer price field is given',

    'seller_inventory_status' => 'Is the item is open to sale? Choose active for yes',

    'stock_quantity' => 'Stock you have',

    'alert_quantity' => 'A notification email will be send when item goes below the alert quantity',

    'offer_starting_time' => 'Offer starting time',

    'offer_ending_time' => 'Offer ending time',

    'set_attribute' => 'If the value is not on the list, you can add appropriate value by just typing the new value',

    'variants' => 'Product variants',

    'delete_this_combination' => 'Delete this combination',

    'romove_this_cart_item' => 'Romove this item from the cart',

    'no_product_found' => 'No product found! Please try different search or add new product',

    'not_available' => 'Not available!',

    'admin_note' => 'Admin note will not visible to customer',

    'message_to_customer' => 'This message will send to customer with the invoice email',

    'empty_cart' => 'The cart is empty',

    'send_invoice_to_customer' => 'Send an invoice to customer with this message',

    'delete_the_cart' => 'Delete the cart and proceed the order',

    'order_status_name' => 'The title of the status that will be visible everywhere.',

    'order_status_color' => 'The label color of the order status',

    'order_status_send_email' => 'An email will be sent to the customer when the order status updates',

    'order_status_email_template' => 'This email template will be sent to the customer when the order status updates. Mandatory if the email is enabled for the status',

    'payment_status_name' => 'The title of the status that will be visible everywhere.',

    'payment_status_color' => 'The label color of the payment status',

    'payment_status_send_email' => 'An email will be sent to the customer when the payment status updates',

    'payment_status_email_template' => 'This email template will be sent to the customer when the payment status updates. Mandatory if the email is enabled for the status',

    'email_template_name' => 'Give the template a name. This is for system use only.',

    'template_use_for' => 'The template will be used by',

    'email_template_subject' => 'This will use as the subject of the email.',

    'email_template_body' => 'There are some short codes you can use for dynamic information. Check the bottom of this form to see the available short codes.',

    'email_template_type' => 'The type of the email.',

    'template_sender_email' => 'This email address will use to send emails and receiver can reply to this.',

    'template_sender_name' => 'This name will use as sender name',

    'payment_method_name' => 'Name of the payment method',

    'payment_method_company_name' => 'The main company name',

    'packaging_name' => 'Packaging title',

    'packaging_cost' => 'Packaging cost',

    'packaging_charge_customer' => 'If checked: the cost will be added with shipping when a customer place an order.',

    'shipping_carrier_name' => 'Name of the shipping carrier',

    'shipping_tax' => 'Shipping tax will be added to shipping cost while checkout. Leave empty if no tax applied.',

    'shipping_max_width' => 'Maximun package width handle by the carrier. Leave empty to disable.',

    'shipping_tracking_url' => 'Example: \'http://example.com/track.php?num=@\' where \'@\' will be replaced by the tracking number',

    'standard_delivery_time' => 'Standard delivery time',

    'shipping_max_width' => 'Maximun package width handle by the carrier. Leave empty to disable.',

    'shipping_max_height' => 'Maximun package height handle by the carrier. Leave empty to disable.',

    'shipping_max_depth' => 'Maximun package depth handle by the carrier. Leave empty to disable.',

    'shipping_max_weight' => 'Maximun package weight handle by the carrier. Leave empty to disable.',

    'shipping_standard_delivery_time' => 'Standard delivery time promised by the carrier',

    'shipping_is_free' => 'Do you want to enable this shipping carrier to free shipping?',

    'shipping_handling_cost' => 'If checked shipping handling cost will be included with the shipping cost as per you set on the setting page.',

    'flat_shipping_cost' => 'Enter a flat shipping cost for each order',

    'shipping_width' => 'The width of the item after packaging',

    'shipping_height' => 'The height of the item after packaging',

    'shipping_depth' => 'The depth of the item after packaging',

    'shipping_weight' => 'The weight of the item after packaging',

    'search_customer' => 'Find the customer to make an order. Customer\'s email address, nice name or full name anything will do the job.',

    'coupon_quantity' => 'Total number of avaliable coupons',

    'coupon_name' => 'The name will be use in invoice and order summary',

    'coupon_code' => 'The unique coupon code',

    'coupon_value' => 'The value of the coupon',

    'coupon_min_order_amount' => 'Choose minimum order amount for the cart (optional)',

    'coupon_quantity_per_customer' => 'Choose how many times a customer can use this coupon. If you leave it empty then a customer can use this coupon till it\'s availablity.',

    'starting_time' => 'The coupon will be available from this time',

    'ending_time' => 'The coupon will be available till this time',

    'exclude_tax_n_shipping' => 'Exclude tax and shipping cost',

    'exclude_offer_items' => 'Exclude items that already have a running offer or discount',

    'coupon_partial_use' => 'Allow partial use of the total coupon value',

    'coupon_limited' => 'Choose if you want to make the coupon for specific customers only',

    'coupon_limited_to' => 'Use email address or name to find customers',

    'gift_card_name' => 'The name of the gift card.',

    'gift_card_pin_code' => 'The unique secret code. The pin code is the passcode for the card.',

    'gift_card_serial_number' => 'The unique serial number for the card.',

    'gift_card_value' => 'The value of the card. The customer will receive same amount of discount.',

    'gift_card_activation_time' => 'Activation time of the card. The card can be used after this time.',

    'gift_card_expiry_time' => 'Expiry time of the card. The card can be valid till this time.',

    'gift_card_partial_use' => 'Allow partial use of total card value',


];