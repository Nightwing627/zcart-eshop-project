<script type="text/javascript">
"use strict";
;(function($, window, document) {
    $(document).ready(function(){

        // price slider
        $("#price-slider").ionRangeSlider({
            hide_min_max: true,
            keyboard: true,
            min: {{ $priceRange['min'] }},
            max: {{ $priceRange['max'] }},
            from: {{ Request::get('price') ? explode('-', Request::get('price'))[0] : $priceRange['min'] }},
            to: {{ Request::get('price') ? explode('-', Request::get('price'))[1] : $priceRange['max'] }},
            step: 10,
            type: 'double',
            prefix: "$",
            grid: true,
            onFinish: function (data) {
                var href = removeQueryStringParameter(window.location.href, 'price'); //Remove currect price
                window.location.href = getFormatedUrlStr(href, 'price='+ data.from + '-' + data.to);
                // console.log(data.from + ' to ' + data.to);
            },
        });

        $('#filter_opt_sort').on('change', function(){
            var opt = $(this).attr('name');
            var href = removeQueryStringParameter(window.location.href, opt); //Remove currect sorting
            opt = opt + '=' + $(this).val();
            window.location.href = getFormatedUrlStr(href, opt);
        });
        $('.filter_opt_checkbox').on('ifChecked', function() {
            var opt = $(this).attr('name') + '=true';
            window.location.href = getFormatedUrlStr(window.location.href, opt);
        });
        $('.filter_opt_checkbox').on('ifUnchecked', function() {
            var opt = $(this).attr('name');
            var href = removeQueryStringParameter(window.location.href, 'page'); //Reset the pagination
            window.location.href = removeQueryStringParameter(href, opt);
        });

        $('.link-filter-opt').on('click', function(e){
            e.preventDefault();
            var opt = $(this).data('name');
            var href = removeQueryStringParameter(window.location.href, opt); //Remove currect filter
            window.location.href = getFormatedUrlStr(href, opt+'='+ $(this).data('value'));
        });

        $('.clear-filter').on('click', function(e){
            e.preventDefault();
            window.location.href = removeQueryStringParameter(window.location.href, $(this).data('name')); //Remove the filter
        });

    });

    function getFormatedUrlStr(sourceURL, opt) {
        var url = removeQueryStringParameter(sourceURL, 'page'); //Reset the pagination;

        if(url.indexOf('?') !== -1)
            return url + '&' + opt;

        return url + '?' + opt;
    }

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