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

    'add_input_field' => 'Añadir campo de entrada',

    'remove_input_field' => 'Eliminar este campo de entrada',

    'marketplace_name' => 'El nombre del mercado. Los visitantes veran este nombre.',

    'system_legal_name' => 'El nombre legal de la empresa',

    'min_pass_lenght' => 'Minimo 6 caracteristicas',

    'role_name' => 'El titulo del rol de usuario',

    'role_type' => 'Plataforma y Comerciante. La plataforma de tipo de rol solo esta disponible para el usuario de la plataforma principal, un comerciante no puede usar este rol. El tipo de rol del comerciante estara disponible cuando un comerciante agregue un nuevo usuario.',

    'role_level' => 'Se usara el nivel de rol, determinar quien puede controlar quien. Ejemplo: un usuario con nivel de rol 2 no puede modificar a ningun usuario con nivel de rol 1. Mantenganse vacio si el rol es para usuarios finales.',

    'you_cant_set_role_level' => 'Solo los usuarios de nivel superior pueden establecer este valor.',

    'cant_edit_special_role' => 'Este tipo de rol no es editable. Ten cuidado de modificar los permisos de este rol.',

    'set_role_permissions' => 'Establezca los permisos de rol con mucho cuidado. Elija el tipo de rol para obtener los modulos apropiados.',

    'permission_modules' => 'Habilitar el modulo para establecer el permiso para el modulo',

    'shipping_rate_delivery_takes' => 'Sea especifico, el cliente vera esto.',

    'type_dbreset' => 'Escriba la palabra exacta "RESET" en el cuadro para confirmar su deseo.',

    'type_environment' => 'Escriba la palabra exacta "ENVIRONMENT" en el cuadro para confirmar su deseo.',

    'module' => [
        'name' => 'Todos los usuarios bajo este rol podran realizar acciones especificas para administrar :module.',

       'access' => [
            'common' => 'This is a :Access module. That means both platform users and merchant users can get access.',

            'platform' => 'This is a :Access module. That means only platform users can get access.',

            'merchant' => 'This is a :Access module. That means only merchant users can get access.',
        ]
    ],

    'currency_iso_code' => 'Codigo ISO 4217. Por ejemplo, El dolar de los Estados Unidos tiene el codigo USD y el codigo de moneda de Japon es JPY.',

    'currency_subunit' => 'La subunidad que es una fraccion de la unidad base. Por ejemplo: centavo, centavo, paisa',

    'currency_symbol_first' => 'Ejemplo: $13.21',

    'currency_decimalpoint' => 'Ejemplo: 13.21, 13,21',

    'currency_thousands_separator' => 'Ejemplo: 1,000, 1.000, 1 000',

    'cover_img_size' => 'El tamaño de la imagen debe ser 1280x300px',

    'slug' => 'Slug son usualmente un URL amigable para los motores de busqueda',

    'shop_slug' => 'Esto se utilizara como la URL de su  tienda, no podra cambiarlo mas tarde. Se creativo para elegir el slug para su tienda',

    'shop_url' => 'La ruta completa a la pagina de inicio de la tienda. No puedes cambiar la url.',

    'shop_timezone' => 'La zona horaria no afectara la tienda o el mercado. Es solo para saber mas sobre tu tienda',

    // 'website' => 'Enlace de la pagina de inicio',

    'url' => 'Direccion web',

    'optional' => '(Opcional)',

    'use_markdown_to_bold' => 'agregue ** ambos lados de la palabra clave importante para resaltar',

    'announcement_action_text' => 'Boton de accion opcional para vilcular el anuncio a cualquier URL',

    'announcement_action_url' => 'La URL de accion para publicar en el blog o cualquier URL',

    // 'help_doc_link' => 'Ayuda del documento de enlace',

    'code' => 'Codigo',

    'brand' => 'La marca del producto. No requerido pero recomendado',

    'shop_name' => 'La marca o nombre para mostrar de la tienda',

    'shop_status' => 'Si esta activo, la tienda estara en vivo inmediatamente.',

    'shop_maintenance_mode_handle' => 'Si el modo de mantenimiento está activado, la tienda estará fuera de línea y todas las listas se eliminarán del mercado hasta que se desactive el mantenimiento.',

    'system_maintenance_mode_handle' => 'Si el modo de mantenimiento está activado, el mercado estará fuera de línea y se mostrará el indicador de modo de mantenimiento a los visitantes. Todavía los comerciantes pueden acceder a su panel de administración.',

    'system_physical_address' => 'La ubicacion fisica del mercado / oficina',

    'system_email' => 'Todas las notificaciones seran enviado a esta direccion de correo electronico, aceptar correos electronicos de soporte (si esta configurado)',

    'system_timezone' => 'Este sistema utilizara esta zona horaria para operar.',

    'system_currency' => 'La moneda del mercado',

    'system_slogan' => 'El eslogan que mas describe tu mercado',

    'system_length_unit' => 'La unidad de logintud se utilizara en todo el mercado.',

    'system_weight_unit' => 'La unidad de peso se utilizara en todo el mercado.',

    'system_valume_unit' => 'La unidad de volumen se utilizara en todo el mercado.',

    'ask_customer_for_email_subscription' => 'Cuando un cliente nuevo registre una cuenta, pregúntele a su cliente si desea obtener promociones y otras notificaciones por correo electrónico. Desactivar la opción dará como resultado la suscripción automática. En ese caso, deje en claro la sección de términos y condiciones.',

    'allow_guest_checkout' => 'Esto permitira a los clientes realizar el pago sin registrarse en el sitio.',

    'vendor_can_view_customer_info' => 'Esto permitira a los proveedores ver la informacion detallada del cliente en la pagina de pedido. De lo contraio el nombre, la direccion de correo electronico and las direcciones de facturacion / envio  seran visibles.',

    'system_pagination' => 'Establezca el valor de paginacion para las tablas de datos en el panel de administración.',

    'subscription_name' => 'Dar un nombre significativo al plan de suscripción.',

    'subscription_plan_id' => 'Este es el identificador que debe coincidir exactamente con el ID del plan de Stripe',

    'featured_subscription' => 'Solo debe haber una suscripción destacada',

    'subscription_cost' => 'El costo de la suscripción al mes',

    'team_size' => 'El tamaño del equipo es el numero total de usuarios que pueden registrarse en este equipo',

    'inventory_limit' => 'El numero de listado total. Una variante del mismo producto sera considerada como un articulo diferente.',

    'marketplace_commission' => 'Porcentaje del valor del articulo del pedido cobrado por el mercado',

    'transaction_fee' => 'Si desea cobrar una tarifa plana por cada transaccion',

    'subscription_best_for' => 'Cliente objetivo para este paquete. Esto sera visible para el cliente.',

    'config_return_refund' => 'Polica de devolucion y reembolso para su compra. Por favor lea la politica del mercado antes de especificar la suya.',

    'config_trial_days' => 'El comerciante se cobrara despues del periodo de prueba. Si no toma la tarjeta por adelantado, la cuenta del comerciante se congelara despues de este tiempo.',

    'charge_after_trial_days' => 'Se cobrara despues de :dias dias periodo de prueba.',

    'required_card_upfront' => '¿Desea tomar informacion de la tarjeta cuando el comerciante se registra?',

    'leave_empty_to_save_as_draft' => 'Dejar vacio para guardar como borrador',

    'logo_img_size' => 'El tamaño de la imagen del logotipo debe ser minimo de 300x300px',

    'brand_logo_size' => 'El tamaño de la imagen del logotipo debe ser 120x40px y .png',

    'brand_icon_size' => 'El tamaño de la imagen del icono debe ser 32x32px y .png',

    'config_alert_quantity' => 'Se le enviara un correo electronico de notificacion, su inventario va por debajo de la cantidad de alerta',

    'config_max_img_size_limit_kb' => 'El sistema de limite de tamano de imagen maximo puede cargarse para producto/ invertario/ logotipo/ avatar. El tamaño en kilobytes.',

    'config_max_number_of_inventory_imgs' => 'Elija cuantas imagenes se pueden cargar para un solo articulo de invertario.',

    'config_address_default_country' => 'Establezca este valor para llenar el formulario de direccion mas rapido. Obviamente, un usuario puede cambiar el valor al agregar una nueva direccion.',

    'config_address_default_state' => 'Establezca este valor para llenar el formulario de direccion mas rapido. Obviamente, un usuario puede cambiar el valor al agregar una nueva direccion.',

    'config_show_address_title' => 'Mostrar/Ocultar el titutlo de la direccion mientras visualiza/imprime una direccion.',

    'config_address_show_country' => 'Mostrar/Ocultar el nombre del pais mientras ve/imprime una direccion. Esto es util si su mercado dentro de una pequeña region.',

    'config_address_show_map' => '¿Quieres mostrar el mapa con las direcciones? Esta opcion generara un mapa utilizando Google Map.',

    // 'system_date_format' => 'Establecer el formato de fecha para el mercado. Ejemplo: 2018-05-13, 05-13-2018, 13-05-2018',

    // 'config_date_separator' => 'Ejemplo: 2018-05-13, 2018.05.13, 2018/05/13',

    // 'system_time_format' => 'Establecer el formato de hora para el mercado. Ejemplo: 01:00pm or 13:00',

    // 'config_time_separator' => ' Ejemplo: 07:00am or 07.00am',

    'config_show_currency_symbol' => '¿Quieres mostrar el simbolo de moneda al represetar un precio?  Ejemplo: $123',

    'config_show_space_after_symbol' => 'Quiere dar formato al precio poniendo un espacio despues del simbolo. Ejemplo: $ 123',

    'config_decimals' => 'Cuantos digitos quieres mostrar despues del punto decimal? Ejemplo: 13.21, 13.123',

    // 'config_decimalpoint' => 'Ejemplo: 13.21, 13,21',

    // 'config_thousands_separator' => 'Ejemplo: 1,000, 1.000, 1 000',

    'config_gift_card_pin_size' => 'Cuantos digitos desea generar el numero de pin de la tarjeta de regalo. Longitud predeterminda 10',

    'config_gift_card_serial_number_size' => 'Cuantos digitos desea generar el numero de serie de la tarjeta de regalo. Longitud por defecto 13',

    'config_coupon_code_size' => 'Cuantos digitos desea generar codigo de cupon. Longitud predeterminda 8',

    'shop_email' => 'Todas la notificaciones se enviaran a esta direccion de correo electronico (inventarios, pedidos, tickets, disputas etc.) acepte correos electronicos de atencion al cliente (si estan configurados)',

    'shop_legal_name' => 'El nombre legal de la tienda',

    'shop_owner_id' => 'El propietario y super admistrador de la tienda. Un usuario registrado como comerciante puede tener una tienda. No puedes cambiar esto mas tarde.',

    // 'shop_owner_cant_change' => 'El propietario de la tienda no puedeser cambiado. En su lugar puedes eliminar la tienda y crear una nueva.',

    'shop_description' => 'La descripcion de la marca de la tienda, esta informacion estara visible en la pagina principal de la tienda .',

    'attribute_type' => 'El tipo de atributo. Esto ayudara a mostrar las opciones en la pagina del producto.',

    'attribute_name' => 'Este nombre se mostrara en la pagina del producto.',

    'attribute_value' => 'Este valor se mostrara en la pagina del producto como opcion seleccionable.',

    'parent_attribute' => 'La opcion se mostrara bajo este atributo.',

    'list_order' => 'Orden de visualizacion en la lista.',

    // 'external_url' => 'Si tienes un sitio web puedes tener el enlace externo aqui',

    'shop_external_url' => 'Si posee un sitio web, puede poner el enlace externo aqui, la url se puede establecer como pagina de inicio de la tienda.',

    'product_name' => 'Los clientes no veran esto. Este nombre solo ayuda a los comerciantes a encontrar el articulo para el listado.',

    'product_featured_image' =>  'Los clientes no veran esto. Esto solo ayuda a los comerciantes a encontrar el articulo para el listado.',

    'product_images' => 'Los clientes verán estas imágenes solo si el listado del comerciante no tiene imágenes para mostrar.',

    'product_active' => 'Los comerciantes solo encontrarán artículos activos.',

    'product_description' => 'Los clientes no veran esto. Esta es la descripcion basica y comun del producto.',

    'model_number' => 'Un identificador de un producto dado por su fabricante. No requerido pero recomendado',

    'gtin' => 'El Número de artículo comercial global (GTIN) es un identificador único de un producto en el mercado global. Si desea obtener un código ISBN o UPC para su producto, encontrará más información en los siguientes sitios web: http://www.isbn.org/ y http://www.uc-council.org/',

    'mpn' => 'El Número de pieza del fabricante (MPN) es un identificador único emitido por el fabricante. Puede obtener MPNs del fabricante. No requerido pero recomendado',

    'sku' => 'SKU (Unidad de Mantenimiento de Stock) es el identificador especifico del vendedor. Te ayudara a gestionar tu inventario',

    'isbn' => 'El Número de libro estándar internacional (ISBN) es un código de barras de identificador de libro comercial único. Cada código ISBN identifica únicamente un libro. ISBN tiene 10 o 13 dígitos. Todos los ISBN asignados después del 1 de enero de 2007 tienen 13 dígitos. Normalmente, el ISBN se imprime en la contraportada del libro',

    'ean' => 'El Número de Artículo Europeo (EAN) es un estándar de código de barras, un código de identificación de producto de 12 o 13 dígitos. Puede obtener los EAN del fabricante. Si sus productos no tienen EAN del fabricante y necesita comprar códigos EAN, vaya a GS1 UK http://www.gs1uk.org',

    'upc' => 'Codigo de producto universal (UPC), tambien llamado GTIN-12 y UPC-A. Un identificador numerico unico para productos comerciales que generalmente se asocia con un codigo de barras impreso en una mercancia minorista',

    'meta_title' => 'Las etiquetas de título, técnicamente llamadas elementos de título, definen el título de un documento. Las etiquetas de título a menudo se usan en las páginas de resultados del motor de búsqueda (SERPs) para mostrar fragmentos de vista previa de una página determinada, y son importantes tanto para SEO como para compartir en redes sociales.',

    'meta_description' => 'Las meta descripciones son atributos HTML que proporcionan explicaciones concisas del contenido de las páginas web. Las descripciones meta se usan comúnmente en las páginas de resultados del motor de búsqueda (SERPs) para mostrar fragmentos de vista previa de una página determinada',

    'catalog_min_price' => 'Establecer un precio mínimo para el producto. Los vendedores pueden agregar inventario dentro de estos límites de precios.',

    'catalog_max_price' => 'Establecer un precio máximo para el producto. Los vendedores pueden agregar inventario dentro de estos límites de precios.',

    'has_variant' => 'Este artículo tiene variantes como diferentes colores, formas, tamaños, etc.',

    'requires_shipping' => 'Este articulo requiere envio.',

    'downloadable' => 'Este articulo es un contenido digital y los compradores pueden descargarlo.',

    'manufacturer_url' => 'El enlace al sitio web oficial del fabricante.',

    'manufacturer_email' => 'El sistema utilizará esta dirección de correo electrónico para comunicarse con el fabricante.',

    'manufacturer_phone' => 'El numero de telefono de soporte del fabricante.',

    'supplier_email' => 'El sistema utilizará esta dirección de correo electronico para comunicarse con el proveedor.',

    'supplier_contact_person' => 'Persona de contacto',

    // 'supplier_phone' => 'El numero de telefono de soporte del proveedor.',

    // 'supplier_address' => 'El sistema utilizara esta direccion para crear la factura.',

    'shop_address' => 'La direccion fisica de la tienda.',

    'search_product' => 'Puede utilizar cualquier identificador de GTIN como UPC, ISBN, EAN, JAN o ITF. También puede usar el nombre y número de modelo O parte del nombre o número de modelo.',

    'seller_description' => 'Esta es la descripción específica del producto para el vendedor. El cliente verá esto',

    'seller_product_condition' => '¿Cual es la condicion actual del producto?',

    'condition_note' => 'La nota de condicion es util cuando el producto es usado / restaurado',

    'select_supplier' => 'Campo recomendado. Esto ayudara a generar informes',

    'select_warehouse' => 'Elija el almacen desde donde se enviara el producto.',

    // 'inventory_select_tax' => 'El impuesto se agregará al precio de venta / oferta en la tienda. Los pedidos creados en back office no aplicarán el impuesto autométricamente. Necesita seleccionar el impuesto cuando cree una orden en back office. Si su precio incluye el impuesto, seleccione la opción "Sin impuestos" aquí',

    // 'select_carriers' => 'Lista de transportistas disponibles para enviar el producto. Deje en blanco si el articulo no requiere envio',

    'select_packagings' => 'Lista de opciones de embalaje disponibles para enviar el producto. Deje en blanco para deshabilitar la opcion de embalaje',

    'available_from' => 'La fecha en que estara disponible el stock. predetermindo = immediatamente',

    'sale_price' => 'El precio sin ningun impuesto. El impuesto se calculara automaticante en funcion de la zona de envio.',

    'purchase_price' => 'Campo recomendado. Esto ayudara a calcular ganancias y generar informes',

    'min_order_quantity' => 'La cantidad permitida para tomar pedidos. Debe ser un valor entero. Predeterminado = 1',

    'offer_price' => 'El precio de la oferta se efectuará entre las fechas de inicio y finalización de la oferta',

    'offer_start' => 'Una oferta debe tener una fecha de inicio. Requerido si el campo de precio de oferta es dado',

    'offer_end' => 'Una oferta debe tener una fecha de finalización. Requerido si el campo de precio de oferta es dado',

    'seller_inventory_status' => '¿El artículo está abierto a la venta? El artículo inactivo no se mostrará en el mercado.',

    'stock_quantity' => 'Numero de articulos que tienes en tu almacen',

    'offer_starting_time' => 'Oferta hora de inicio',

    'offer_ending_time' => 'Oferta final de tiempo',

    'set_attribute' => 'Si el valor no está en la lista, puede agregar el valor apropiado simplemente escribiendo el nuevo valor',

    'variants' => 'Variantes de producto',

    'delete_this_combination' => 'Eliminar esta combinacion',

    'romove_this_cart_item' => 'Quitar este articulo del carrito',

    'no_product_found' => '¡No se ha encontrado ningun producto! Por favor intente una busqueda diferente o agregue un nuevo producto',

    'not_available' => '¡No disponible!',

    'admin_note' => 'Nota de administrador no sera visible para el cliente',

    'message_to_customer' => 'Este mensaje se enviara al cliente con la factura de correo electronico',

    'empty_cart' => 'El carro esta vacio',

    'send_invoice_to_customer' => 'Enviar una factura al cliente con este mensaje',

    'delete_the_cart' => 'Eliminar el carrito y proceder al pedido',

    'order_status_name' => 'El titulo del estado que sera visible en todas partes.',

    'order_status_color' => 'El color de la etiqueta del estado del pedido',

    'order_status_send_email' => 'Se enviara un correo electronico al cliente cuando se actualice el estado del pedido',

    'order_status_email_template' => 'Esta plantilla de correo electronico se enviara al cliente cuando se actualice el estado del pedido. Obligatorio si el correo electronico esta habilitado para el estado',

    'update_order_status' => 'Actualizar el estado del pedido',

    'email_template_name' => 'Ponle un nombre a la plantilla. Esto es solo para uso del sistema.',

    'template_use_for' => 'La plantilla sera utilizado por',

    'email_template_subject' => 'Esto se utilizara como el asunto de correo electronico.',

    'email_template_body' => 'Hay algunos codigos cortos que pueden utilizar para obtener informacion dinamica. Consulte la parte inferior de este formulario para ver los codigos cortos disponibles.',

    'email_template_type' => 'El tipo de correo electronico.',

    'template_sender_email' => 'Esta dirección de correo electrónico se utilizará para enviar correos electrónicos y el receptor puede responder a esta.',

    'template_sender_name' => 'Este nombre se usará como nombre del remitente',

    // 'payment_method_name' => 'Nombre del método de pago',

    // 'payment_method_company_name' => 'El nombre de la empresa principal',

    'packaging_name' => 'El cliente verá esto si la opción de embalaje está disponible al momento de la compra',

    'width' => 'El ancho del embalaje',

    'height' => 'La altura del embalaje',

    'depth' => 'La profundidad del embalaje',

    'packaging_cost' => 'El coste del embalaje. Puede elegir si desea cargar el costo a los clientes o no',

    'set_as_default_packaging' => 'Si está marcado: este embalaje se utilizará como paquete de envío predeterminado',

    // 'packaging_charge_customer' => 'Si se marca: el costo se agregará con el envío cuando un cliente realice un pedido.',

    'shipping_carrier_name' => 'Nombre del transportista',

    // 'shipping_tax' => 'El impuesto sobre el envío se agregará al costo de envío durante la compra.',

    'shipping_zone_name' => 'Dar un nombre de zona. El cliente no verá este nombre.',

    'shipping_rate_name' => 'Dar un nombre significativo. El cliente verá este nombre al momento de pagar. mi. sol. \'Envío estándar\'',

    'shipping_zone_carrier' => 'Puede enlazar el transportista. El cliente verá esto en la caja.',

    'free_shipping' => 'Si está habilitado, la etiqueta de envío gratis se mostrará en la página de listado de productos.',

    'shipping_rate' => 'Marque la opción \'Envío gratis\' o otorgue a 0 el monto del envío gratis',

    'shipping_zone_tax' => 'Este perfil de impuestos se aplicará cuando el cliente realice una compra desde esta zona de envío',

    'shipping_zone_select_countries' => 'Seleccione los países para esta zona a la que envía. Marque la opción Resto del mundo para zona mundial.',

    'rest_of_the_world' => 'Esta zona incluye todos los países y regiones que aún no están definidos en sus otras zonas de envío.',

    'shipping_max_width' => 'Paquete máximo con asa por el transportista. Deje vacío para deshabilitar.',

    'shipping_tracking_url' => ' \'@\' será reemplazado por el número de seguimiento dinámico',

    'shipping_tracking_url_example' => 'e.g.: http://example.com/track.php?num=@',

    'order_tracking_id' => 'ID de seguimiento de pedido proporcionado por el proveedor de servicios de envío.',

    'order_fulfillment_carrier' => 'Elija el transportista para cumplir con el pedido.',

    'notify_customer' => 'Se enviará un correo electrónico de notificación al cliente con la información necesaria.',

    'order_status_fulfilled' => '¿Desea marcar el pedido como cumplido cuando el estado del pedido cambió a esto?',

    'shipping_weight' => 'Se utilizarán para calcular el costo de envío.',

    'order_number_prefix_suffix' => 'El prefijo y el sufijo se agregarán automáticamente para dar formato a todos los números de pedido. Déjelo en blanco si no desea formar números de pedido.',

    'customer_not_see_this' => 'El cliente no vera esto',

    'customer_will_see_this' => 'Los clientes veran esto',

    'refund_select_order' => 'Seleccione el pedido que desea reembolsar ',

    'refund_order_fulfilled' => '¿Se envia el pedido al cliente?',

    'refund_return_goods' => '¿Se te devuelve el objeto?',

    'customer_paid' => 'El cliente pagó <strong> <em> :amount </em> </strong>, incluidos todos los impuestos, cargos de envío y otros.',

    'order_refunded' => 'Anteriormente reembolsado <strong><em> :amount </em></strong> del total <strong><em> :total </em></strong>',

    'search_customer' => 'Encuentra al cliente por correo electronico, bonito nombre o nombre completo.',

    'coupon_quantity' => 'Numero total de cupones disponibles',

    'coupon_name' => 'El nombre sera usado en factura y resumen de pedido',

    'coupon_code' => 'El codigo de cupon unico',

    'coupon_value' => 'El valor del cupon',

    'coupon_min_order_amount' => 'Elija el importe minimo de pedido para el carrito (opcional)',

    'coupon_quantity_per_customer' => 'Elija cuantas veces un cliente puede utilizar este cupon. Si lo deja vacio, un cliente puede usar este cupon hasta que este disponible.',

    'starting_time' => 'El cupon estara disponible desde este momento',

    'ending_time' => 'El cupon estara disponible hasta este momento',

    'exclude_tax_n_shipping' => 'Excluye impuestos y gastos de envio',

    'exclude_offer_items' => 'Excluye articulos que ya tienen una oferta en curso o un descuento',

    // 'coupon_partial_use' => 'Permitir el uso parcial del valor total del cupon',

    'coupon_limited_to_customers' => 'Elija si desea hacer el cupon solo para clientes especificos',

    'coupon_limited_to_shipping_zones' => 'Elija si desea hacer el cupon para zonas de envio especificas solamente',

    'coupon_limited_to' => 'Utilice la direccion de correo electronico o el nombre para encontrar clientes',

    'faq_placeholders' => 'Puede usar este marcador de posicion en su pregunta y respuesta, esto sera reemplazado por el valor real',

    'gift_card_name' => 'El nombre de la tarjeta de regalo.',

    'gift_card_pin_code' => 'El codigo secreto unico. El codigo PIN es el unico de acceso de la tarjeta. No puedes cambiar este valor mas tarde.',

    'gift_card_serial_number' => 'El numero de serie unico para la tarjeta. No puedes cambiar este valor mas tarde.',

    'gift_card_value' => 'El valor de la tarjeta. El cliente recibira la misma cantidad de descuento.',

    'gift_card_activation_time' => 'Tiempo de activacion de la tarjeta. La tarjeta puede ser utilizada despues de este tiempo.',

    'gift_card_expiry_time' => 'Tiempo de caducidad de la tarjeta. La tarjeta puede ser valida hasta este momento.',

    'gift_card_partial_use' => 'Permitir el uso parcial del valor total de la tarjeta',

    'number_between' => ' Entre: min y max',

    // 'default_tax_id' => 'El perfil de impuestos predeteminado sera preselecccionado cuando se agregue un nuevo inventario',

    'default_tax_id' => 'El perfil impositivo predeteminado se aplicara cuando la zona de envio no este cubierta por ninguna area impositiva.',

    'default_payment_method_id' => 'Si se selecciona, el metodo de pago se preseleccionara al crear un nuevo cliente',

    'config_order_handling_cost' => 'Este costo adicional se agregara al costo de envio de cada pedido. Dejelo en blanco para deshabilitar el cargo por manejo de pedidos',

    // 'default_carrier' => 'El operador predeterminado sera preseleccionado al realizar un nuevo pedido. Te ayudara a agilizar el proceso de compra',

    // 'default_packaging' => 'Establezca un empaque predeterminado, si desea habilitar las opciones de empaque en el pedido., entonces este valor predeterminado ayudara a acelerar el proceso de pago',

    'default_warehouse' => 'El almacen predeterminado sera preseleccionado al agregar nuevo invertario',

    'default_supplier' => 'El proveedor predeterminado sera preseleccionado al agregar nuevo inventario',

    'default_packaging_ids_for_inventory' => 'Los embalajes predeterminados se preseleccionaran cuando se agregue un nuevo inventario. Esto te ayudara a agregar inventario mas rapido',

    'config_payment_environment' => '¿Las credenciales son para el modo en vivo o prueba más?',

    'config_authorize_net_transaction_key' => 'La transaction key desde Authorize.net. Si no está seguro, póngase en contacto con Authorize.net para obtener ayuda.',

    'config_authorize_net_api_login_id' => 'La API login ID desde Authorize.net. Si no está seguro, póngase en contacto con Authorize.net para obtener ayuda.',

    'config_enable_payment_method' => 'El sistema ofrece varios tipos de pasarelas de pago. Puede habilitar cualquier pasarale de pago para controlar las opciones de pago que el proveedor puede usar para aceptar el pago de los clientes.',

    'config_additional_details' => 'Aparece en la pagina Metodo de pago, mientras el cliente elije como pagar.',

    'config_payment_instructions' => 'Se muestra en la pagina de a gradecimiento, despues de que el cliente haya realizado su pedido.',

    'config_stripe_publishable_key' => 'Las claves de API publicables estan destinadas unicamente a identificar su cuenta con Stripe, no son secretas. Se pueden publicar de forma segura.',

    'config_paypal_express_account' => 'Por general, la direccion de correo electronico de su aplicacion de PayPal. Cree su aplicacion de PayPal desde aqui: https://developer.paypal.com/webapps/developer/applications/myapps',

    'config_paypal_express_client_id' => 'El ID es un identificador unico y largo de su aplicacion de PayPal. Encontrara este valor en la seccion Mis aplicaciones y credenciales en su panel de PayPal.',

    'config_paypal_express_secret' => 'La clave secreta de la API de PayPal. Encontrara este valor en la secciones mis aplicaciones y credenciales en su panel de PayPal.',

    'config_paystack_merchant_email' => 'El correo electrónico del comerciante de su cuenta Paystack.',

    'config_paystack_public_key' => 'La clave pública es un identificador único y largo de su aplicación Paystack. Encontrará este valor en las claves de API y en la sección de Webhooks en la configuración de su panel de Paystack.',

    'config_paystack_secret' => 'La clave secreta de la API de Paystack. Encontrará este valor en las claves de API y en la sección de Webhooks en la configuración de su panel de Paystack.',

    'config_auto_archive_order' => 'Archivar automaticante el pedido. Seleccione esta funcion si no desea archivar manualmente todos los pedidos una vez que se hayan cumplido.',

    // 'config_stripe_secret_key' => 'Se requeriran claves API secretas para cobrar al cliente al momento de pagar.',

    // 'config_paypal_express' => 'Debe tener una cuenta comercial de PayPal para activar este metodo de pago.',

    'config_pagination' => 'Cuantos elementos de lista desea ver por pagina en las tablas de datos',

    'support_phone' => 'El cliente  se pondra en contacto con este numero para soporte y consulta',

    'support_email' => 'Recibiras todo el correo electronico de soporte a esta direccion',

    'support_phone_toll_free' => 'Si tiene un numero gratuito para atencion al cliente',

    'default_sender_email_address' => 'Todos los correos electronicos automaticos a los clientes se enviaran desde esta direccion de correo electronico. Y tambien cuando no se puede establecer una direccion de correo electronico del remitente al enviar un correo electronico',

    'default_email_sender_name' => 'Este nombre se usara como remitente del correo electronico enviado desde la direccion de correo electronico predeterminada al remitente',

    // 'google_analytics_id' => 'El ID de seguimiento de Google Analytics. Parece algo asi como "UA-XXXXX-XX".',

    'google_analytic_report' => 'Solo debe habilitar esto, Si el sistema esta configurado con Google analytics. De lo contrario, puede causar errores. Consulte la documentacion para obtener ayuda. Alternativamente, puede utilizar el sistema de informes incorporado de la aplicacion. ',

    'inventory_linked_items' => 'Los articulos vinculados se mostraran en la pagina del producto como articulos comprados con frecuencia. Esto es opcional pero importante.',

    'notify_new_message' => 'Envieme una notificacion cuando llegue un nuevo mensaje',

    'notify_alert_quantity' => 'Envieme una notificacion cuando cualquier articulo en mi inventario alcance el nivel de cantidad de alerta',

    'notify_inventory_out' => 'Envieme una notificacion cuando cualquier articulo en mi inventario alcance el nivel de cantidad de alerta',

    'notify_new_order' => 'Envieme una notificacion cuando se haya realizado un nuevo pedido en mi tienda',

    'notify_abandoned_checkout' => 'Envieme una notificacion cuando el cliente abandone la compra de mi articulo',

    'notify_when_vendor_registered' => 'Envieme una notificacion cuando un nuevo proveedor haya sido registrado',

    'notify_new_ticket' => 'Envieme una notificacion cuando se haya creado un ticket de soporte en el sistema',

    'notify_new_disput' => 'Envieme una notificacion cuando un cliente presenta una nueva disputa',

    'notify_when_dispute_appealed' => 'Envieme una notificacion cuando una disputa haya sido apelada a revision por el equipo de marketplace',

    'download_template' => '<a href=":url">Descargue una plantilla CSV de muestra </a> para ver un ejemplo del formato requerido.',

    'download_category_slugs' => '<a href=":url">Descargar slugs de categoria </a> para obtener la categoria correcta para sus productos.',

    'first_row_as_header' => 'La primera fila es el encabezado. <strong>No cambiar</strong> esta fila.',

    'user_category_slug' => 'Utilice la categoria <strong>slug</strong> en el campo de categoria.',

    'cover_img' => 'Esta imagen se mostrara en la parte superior de la imagen',

    'cat_grp_img' => 'Esta imagen se mostrara en el fondo del cuadro despegable de categorias',

    'cat_grp_desc' => 'El cliente no vera esto. Pero los comerciantes veran esto.',

    'inactive_for_back_office' => 'Si está inactivo, los clientes todavía pueden visitar la página: page. Pero los comerciantes no podrán usar esto: página para listados futuros.',

    'invalid_rows_will_ignored' => 'Las filas no válidas se <strong> ignorarán </strong>.',

    'upload_rows' => 'No suba más de <strong>:rows filas </strong> por lote para un mejor rendimiento.',

    'name_field_required' => 'Campo de nombre es obligatorio.',

    'email_field_required' => 'Correo electronico es requerido.',

    'invalid_email' => 'Dirección de correo electrónico no válida.',

    'invalid_category' => 'categoria no valida.',

    'category_desc' => 'De un breve detalle. Los clientes verán esto.',

    'email_already_exist' => 'La dirección de correo electrónico ya en uso.',

    'slug_already_exist' => 'La bala ya en uso.',

    'display_order' => 'Este número se utilizará para organizar el orden de visualización. El número más pequeño se mostrará primero.',

    'banner_title' => 'Esta línea se resaltará en el banner. Déjelo en blanco si no quiere mostrar el título.',

    'banner_description' => '( Ejemplo: 50% de descuento! )  Déjelo en blanco si no quiere mostrar esto.',

    'banner_image' => 'La imagen principal que se mostrará sobre el fondo. Comúnmente use una imagen del producto..',

    'banner_background' => 'Elige un color o sube una imagen como fondo.',

    'banner_group' => 'La colocación del banner en el escaparate. El banner no se mostrará si el grupo no está especificado.',

    'bs_columns' => 'Cuántas columnas usará este banner? El sistema utiliza 12 columnas de sistema de rejilla para mostrar banners.',

    'banner_order' => 'Este número se utilizará para organizar el orden de visualización en el grupo de banners. El número más pequeño se mostrará primero.',

    'banner_link' => 'Los usuarios redireccionarán a este enlace..',

    'link_label' => 'La etiqueta del botón de enlace.',

    'slider_link' => 'Los usuarios redireccionarán a este enlace.',

    'slider_title' => 'Esta línea se resaltará sobre el control deslizante. Déjelo en blanco si no quiere mostrar el título.',

    'slider_sub_title' => 'La segunda línea del título. Déjelo en blanco si no quiere mostrar esto.',

    'slider_image' => 'La imagen principal que se mostrará como control deslizante. Se requiere para generar el control deslizante.',

    'slider_img_hint' => 'La imagen del deslizador debe ser 1280x300px',

    'slider_order' => 'El control deslizante se organizará por este orden.',

    'slider_thumb_image' => 'Esta pequeña imagen será utilizada como miniatura. El sistema creará una miniatura si no se proporciona.',

    'slider_thumb_hint' => 'Puede ser 150x59px',

];
