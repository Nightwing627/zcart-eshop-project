<script type="text/javascript">
"use strict";
;(function($, window, document) {
    $(document).ready(function(){
        // console.log(opt);

        $('.filter_opt_checkbox').on('ifChecked', function() {
            var opt = $(this).attr('name');
            var href = removeQueryStringParameter(window.location.href, 'page'); //Reset the pagination
            window.location.href = href + '&' + opt + '=true';
        });
        $('.filter_opt_checkbox').on('ifUnchecked', function() {
            var opt = $(this).attr('name');
            var href = removeQueryStringParameter(window.location.href, 'page'); //Reset the pagination
            window.location.href = removeQueryStringParameter(href, opt);
        });


        $('#filter_opt_sort').on('change', function(){
            var opt = $(this).attr('name');
            var href = removeQueryStringParameter(window.location.href, 'page'); //Reset the pagination
            href = removeQueryStringParameter(href, opt);
            window.location.href = href + '&' + opt + '=' + $(this).val();
        });
    });

    function removeQueryStringParameter(sourceURL, key) {
        var rtn = sourceURL.split("?")[0],
            param,
            params_arr = [],
            queryString = (sourceURL.indexOf("?") !== -1) ? sourceURL.split("?")[1] : "";
        if (queryString !== "") {
            params_arr = queryString.split("&");
            for (var i = params_arr.length - 1; i >= 0; i -= 1) {
                param = params_arr[i].split("=")[0];
                if (param === key) {
                    params_arr.splice(i, 1);
                }
            }
            rtn = rtn + "?" + params_arr.join("&");
        }
        return rtn;
    }
}(window.jQuery, window, document));
</script>