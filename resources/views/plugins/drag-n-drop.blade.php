<script src="{{asset("assets/plugins/dragNdrop/RowSorter.js") }}"></script>

<style type="text/css">

	table.sorting-table {
		cursor: move;
	}
	table tr.sorting-row td {
		background-color: #8b8;
	}

	table tr.sorting-row td i {
    	opacity: 0;
	}

	.sort-handler {
		cursor: move;
	}

    table#sortable.sorting-table {
    	cursor: ns-resize;
    	box-shadow: none;
    }

    table#sortable.sorting-table tbody tr:not(.sorting-row) td,
    table#sortable.sorting-table tbody tr:not(.sorting-row) td i {
    	opacity: 1;
    	color: #a3a3a3;
    	text-shadow: 0 1px 0 rgba(255, 255, 255, 1);
    }
</style>

<!-- page script -->
<script>
;(function($, window, document) {

	// var sorter = $('#sortable').rowSorter({
	$( document ).ready(function () {

		$.ajaxSetup({
		   headers: { 'X-CSRF-Token' : '{{ csrf_token() }}' }
		});

		RowSorter('#sortable', {
			handler: '.sort-handler',
		    onDrop: function(tbody, row, new_index, old_index)
		    {
		    	var url = $("#sortable").data("action");
		    	var max = Math.max(old_index, new_index);
		    	var min = Math.min(old_index, new_index);
		    	var order = {};
				$("#sortable tbody tr").each(function(index){
					if (index >= min && index <= max)
					{
						$( this ).find("span.order").text(index); //Update the reordered index

						order[ $( this ).attr('id') ] = index;

					}

				});

				// Update the database using AJAX
			   	$.post(url, order, function(theResponse, status)
			   	{
					notie.alert(1, "{{ trans('responses.reordered') }}", 2);
			    });
		    }
		});

	});

}(window.jQuery, window, document));
</script>