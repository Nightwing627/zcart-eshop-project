<script type="text/javascript">
"use strict";
;(function($, window, document) {
    $(document).ready(function(){
        $('.payment-option').on('ifChecked', function(e) {
        	console.log($(this).val());
        	console.log($(this).data('type'));
            // $('#create-account').removeClass('hide');
        });

    });
}(window.jQuery, window, document));
</script>