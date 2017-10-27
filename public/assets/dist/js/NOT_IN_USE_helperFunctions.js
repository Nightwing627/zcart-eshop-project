<script type="text/javascript">
if(typeof number_format !== 'function'){
    // window.myFunction = function(){}; // for a global function or
	/**
	 * Format number like php's number_formate.
	 *
	 * @param  int/float number        the number need to formate
	 * @param  int decimals      the number of decimal after the decimal point
	 * @param  str dec_point
	 * @param  str thousands_separator
	 *
	 * @return float
	 */
	function number_format(number, decimals = 2, dec_point = '.', thousands_sep = ',')
	{
 		console.log('decimals: '+decimals);
 		console.log('dec_point: '+dec_point);
 		console.log('thousands_sep: '+thousands_sep);
	    number  = number*1;//makes sure `number` is numeric value
	    var str = number.toFixed(decimals?decimals:0).toString().split('.');
	    var parts = [];
	    for ( var i=str[0].length; i>0; i-=3 ) {
	        parts.unshift(str[0].substring(Math.max(0,i-3),i));
	    }
	    str[0] = parts.join(thousands_sep?thousands_sep:',');
	    // var ttt = str.join(dec_point ? dec_point : '.');
	    return str.join(dec_point ? dec_point : '.');
	    // return ttt;

	}
}

if(typeof get_formated_decimal !== 'function')
{
    /**
     * Get the formated decimal value.
     */
	function get_formated_decimal(value = 0)
 	{
 		// console.log('decimal: '+value);
 		var decimals = "<?=config('system_settings.decimals') ?: 2 ?>";
 		var decimalpoint = "<?=config('system_settings.decimalpoint') ?: 2 ?>";
 		var thousands_separator = "<?=config('system_settings.thousands_separator') ?: 2 ?>";

        var result = number_format(value, decimals, decimalpoint, thousands_separator);

        return (result != 0) ? result : 0;
 	}
}

if(typeof get_formated_currency !== 'function')
{
	function get_formated_currency(value = 0)
 	{
 		// console.log('currency: '+value);
        var result = get_formated_decimal(value);

 		var show_currency_symbol = "<?=config('system_settings.show_currency_symbol') ? 'TRUE' : 'FALSE' ?>";
 		var currency_symbol = "<?=config('system_settings.currency_symbol') ?: '$' ?>";
 		var show_space_after_symbol = "<?=config('system_settings.show_space_after_symbol') ? 'TRUE' : 'FALSE' ?>";

        return
            (show_currency_symbol ? currency_symbol : '') +
            (show_space_after_symbol ? ' ': '') +
            result;
 	}
}
</script>