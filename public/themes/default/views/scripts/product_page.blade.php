<script type="text/javascript">
"use strict";
;(function($, window, document) {
    $(document).ready(function(){

        $('select.color-options').simplecolorpicker();

        $('.product-attribute-selector').on('change', function(){
            var attr = [];
            // console.log(attr);
            $('.product-attribute-selector').each(function(){
                var val = $(this).val();
                if(val)
                    attr.push(val);
            });

            var attrs_pivot = "{{ $attr_pivots or ''}}";

            console.log(attr);
            // console.log('this: ');
            // console.log($(this).val());
        });

    });
}(window.jQuery, window, document));
</script>