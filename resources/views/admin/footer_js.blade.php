<script type="text/javascript">
	/*************************************
	*** Initialise application plugins ***
	**************************************/
	;(function($, window, document) {
	  $(".ajax-modal-btn").hide(); // hide the ajax functional button untill the page load completely

	  $('img').on('error', function(){
	    // console.log('img not found');
	    $(this).hide();
	  });

	  $(document).ready(function(){
	    $(".ajax-modal-btn").show(); // show the ajax functional button when the page loaded completely

	    // Initialise all plugins
	    initDatatables();
	    initAppPlugins();
	    initMassActions();

	    // Support for AJAX loaded modal window.
	    // $('[data-toggle="modal"]').on('click', function(e) {
	    $('body').on('click', '.ajax-modal-btn', function(e) {
	      e.preventDefault();
	      $('.loader').show();
	      $(".wrapper").addClass('blur-filter');
	      var url = $(this).attr('href');

	      if (url.indexOf('#') == 0) {
	        $(url).modal('open');
	      } else {
	        $.get(url, function(data) {
	          $(".wrapper").removeClass('blur-filter');
	          $('.loader').hide();
	          //Load modal data
	          $('#myDynamicModal').modal().html(data);

	          //Initialize application plugins after ajax load the content
	          if (typeof initAppPlugins == 'function') {
	            initAppPlugins();
	          }
	        })
	        .done(function()
	        {
	          $('.modal-body input:text:visible:first').focus();
	        })
	        .fail(function(response)
	        {
	          if (401 === response.status)
	          {
	            window.location = "{{ route('login') }}";
	          } else
	          {
	            alert("{{ trans('responses.error') }}");
	          }
	        });
	      }
	    });
	  })
	}(window.jQuery, window, document));

	//DataTables
	function initDatatables()
	{
	  $(".table-2nd-short").DataTable({
	    "iDisplayLength": {{ getPaginationValue() }},
	    "aaSorting": [[ 1, "asc" ]],
	    "oLanguage": {
	        "sInfo": "_START_ to _END_ of _TOTAL_ entries",
	        "sLengthMenu": "Show _MENU_",
	        "sSearch": "",
	        "sEmptyTable": "No data found!",
	        "oPaginate": {
	          "sNext": '<i class="fa fa-hand-o-right"></i>',
	          "sPrevious": '<i class="fa fa-hand-o-left"></i>',
	        }
	    },
	    "aoColumnDefs": [
	      {
	        "bSortable": false,
	        "aTargets": [ 0,-1 ]
	      }
	    ],
	    dom: 'Bfrtip',
	    buttons: [
	          'copy', 'csv', 'excel', 'pdf', 'print'
	      ]
	  });

	  $(".table-option").DataTable({
	    "iDisplayLength": {{ getPaginationValue() }},
	    "oLanguage": {
	        "sInfo": "_START_ to _END_ of _TOTAL_ entries",
	        "sLengthMenu": "Show _MENU_",
	        "sSearch": "",
	        "sEmptyTable": "No data found!",
	        "oPaginate": {
	          "sNext": '<i class="fa fa-hand-o-right"></i>',
	          "sPrevious": '<i class="fa fa-hand-o-left"></i>',
	        },
	    },
	    "aoColumnDefs": [
	      {
	        "bSortable": false,
	        "aTargets": [ -1 ]
	      }
	    ],
	    dom: 'Bfrtip',
	    buttons: [
	          'copy', 'csv', 'excel', 'pdf', 'print'
	      ]
	  });

	  $(".table-desc").DataTable({
	    "iDisplayLength": {{ getPaginationValue() }},
	    "aaSorting": [[ 0, "desc" ]],
	    "oLanguage": {
	        "sInfo": "_START_ to _END_ of _TOTAL_ entries",
	        "sLengthMenu": "Show _MENU_",
	        "sSearch": "",
	        "sEmptyTable": "No data found!",
	        "oPaginate": {
	          "sNext": '<i class="fa fa-hand-o-right"></i>',
	          "sPrevious": '<i class="fa fa-hand-o-left"></i>',
	        },
	    },
	    "aoColumnDefs": [
	      {
	        "bSortable": false,
	        "aTargets": [ -1 ]
	      }
	    ],
	    dom: 'Bfrtip',
	    buttons: [
	          'copy', 'csv', 'excel', 'pdf', 'print'
	      ]
	  });

	  $('.table-no-option').DataTable({
	    "sLength": "",
	    "paging": true,
	    "lengthChange": false,
	    "searching": false,
	    "ordering": false,
	    "info": true,
	    "autoWidth": false
	  });

	  $(".dataTables_length select").addClass('select2-normal'); //Make the data-table length dropdown like select 2
	  $(".dt-buttons > .btn").addClass('btn-sm'); //Make the data-table option buttins smaller
	}
	//END DataTables

	//App plugins
	function initAppPlugins()
	{
	  $.ajaxSetup ({
	    cache: false,
	    headers: {
	        'X-CSRF-TOKEN': "{{ csrf_token() }}"
	    }
	  });

	  $('.confirm').on('click', function (e) {
	    e.preventDefault();

	    var form = this.closest("form");
	    var url = $(this).attr("href");

	    $.confirm({
	        title: "{{ trans('app.confirmation') }}",
	        content: "{{ trans('app.are_you_sure') }}",
	        type: 'red',
	        icon: 'fa fa-question-circle',
	        animation: 'scale',
	        closeAnimation: 'scale',
	        opacity: 0.5,
	        buttons: {
	          'confirm': {
	              text: '{{ trans('app.proceed') }}',
	              keys: ['enter'],
	              btnClass: 'btn-red',
	              action: function () {
	                if (typeof url != 'undefined') {
	                  location.href = url;
	                }else if(form != null){
	                  form.submit();
	                  notie.alert(4, "{{ trans('messages.confirmed') }}", 3);
	                }
	                return true;
	              }
	          },
	          'cancel': {
	              text: '{{ trans('app.cancel') }}',
	              action: function () {
	                notie.alert(2, "{{ trans('messages.canceled') }}", 3);
	              }
	          },
	        }
	    });
	  });

	  // $(".confirm").confirmation({
	  //     title: "{{ trans('app.are_you_sure') }}", // The title of the confirm
	  //     popout: true,
	  //     singleton: true,
	  //     placement: "left", // The placement of the confirm (Top, Right, Bottom, Left)
	  //     btnOkLabel: "{{ trans('app.im_sure') }}",
	  //     btnCancelLabel: "{{ trans('app.cancel') }}",
	  //     btnOkClass: "btn-danger btn-flat btn-xs",
	  //     btnCancelClass: "btn-new btn-flat btn-xs",
	  // });

	//Initialize Select2 Elements
	$(".select2").not(".dataTables_length .select2").select2();

	$(".select2-normal").select2({
		placeholder: "{{ trans('app.placeholder.select') }}",
		minimumResultsForSearch: -1,
	});

	$(".select2-tag").select2({
	    placeholder: "{{ trans('app.placeholder.tags') }}",
	    allowClear: true,
	    tags: true,
	    tokenSeparators: [',', ';'],
	});

	$(".select2-set_attribute").select2({
	    placeholder: "{{ trans('app.placeholder.attribute_values') }}",
	    tags: true,
	    tokenSeparators: [',', ';'],
	});

	$(".select2-attribute_value-attribute").select2({
	    placeholder: "{{ trans('app.placeholder.select') }}",
	    minimumResultsForSearch: -1,
	}).on("change", function(e){
	    var dataString = 'id=' + $(this).val();
	    $.ajax({
	        type: "get",
	        url : "{{ route('admin.ajax.getParrentAttributeType') }}",
	        data : dataString,
	        datatype: 'JSON',
	        success : function(attribute_type)
	        {
	          if (attribute_type == 1)
	          {
	            $('#color-option').removeClass('hidden').addClass('show');
	          }
	          else
	          {
	            $('#color-option').removeClass('show').addClass('hidden');
	          }
	        }
	    },"html");
	});

	// $(".select2-roles").select2({
	//  {{--   placeholder: "{{ trans('app.placeholder.roles') }}" --}}
	// });

	//Country
	$("#country_id").change(
	    function()
	    {
	      $("#state_id").empty().trigger('change'); //Reset the state dropdown
	      var ID = $("#country_id").select2('data')[0].id;
	      var url = "{{ route('ajax.getCountryStates') }}"

	      $.ajax({
	          delay: 250,
	          data: "id="+ID,
	          url: url,
	          success: function(result)
	          {
	            var data = [];

	            if(result.length !== 0)
	            {
	              data = $.map(result, function(val, id) {
	                  return { id: id, text: val };
	              })
	            }

	            $("#state_id").select2({
	              allowClear: true,
	              tags: true,
	              placeholder: "{{ trans('app.placeholder.state') }}",
	              data: data,
	              sortResults: function(results, container, query) {
	                  if (query.term) {
	                      return results.sort();
	                  }
	                  return results;
	              }
	            });

	          }
	      });
	    }
	);

	  $(".select2-categories").select2({
	    placeholder: "{{ trans('app.placeholder.category_sub_groups') }}"
	  });

	  $(".select2-multi").select2({
	    maximumSelectionLength: 2,
	  });

	  $(".select2").not(".dataTables_length .select2").css('width', '100%');

	  //Customer Seach
	  $('.searchCustomer').select2({
	    ajax: {
	      delay: 250, // wait 250 milliseconds before triggering the request
	      url : "{{ route('search.customer') }}",
	      dataType: 'json',
	      processResults: function (data) {
	        return {
	          results: data
	        };
	      }
	    },
	    placeholder: "{{ trans('app.placeholder.search_customer') }}",
	  });
	  //End Customer Seach

	  /* bootstrap-select */
	  $(".selectpicker").selectpicker();

	  //Initialize validator
	  $('#form').validator();

	  //Initialize summernote text editor
	  $('.summernote').summernote({
	    placeholder: "{{ trans('app.placeholder.start_here') }}",
	    toolbar: [
	      ['style', ['style']],
	      ['font', ['bold', 'italic', 'underline', 'clear']],
	      ['para', ['ul', 'ol', 'paragraph']],
	      ['table', ['table']],
	      ['color', ['color']],
	      ['insert', ['link', 'picture', 'video']],
	      ["view", ["codeview"]],
	    ],
	  });
	  $('.summernote-min').summernote({
	    placeholder: "{{ trans('app.placeholder.start_here') }}",
	    toolbar: [
	      ['font', ['bold', 'italic', 'underline', 'clear']],
	      ['para', ['ul', 'ol', 'paragraph']],
	      ['table', ['table']],
	    ],
	  });
	  $('.summernote-without-toolbar').summernote({
	    placeholder: "{{ trans('app.placeholder.start_here') }}",
	    toolbar: [],
	  });
	  $('.summernote-long').summernote({
	    placeholder: "{{ trans('app.placeholder.start_here') }}",
	    toolbar: [
	      ['style', ['style']],
	      ['font', ['bold', 'italic', 'underline', 'clear']],
	      ['fontname', ['fontname']],
	      ['color', ['color']],
	      ['para', ['ul', 'ol', 'paragraph']],
	      ['height', ['height']],
	      ['table', ['table']],
	      ['insert', ['link', 'picture', 'video', 'hr']],
	      ['view', ['codeview']],
	    ],
	    // codemirror: {
	    //   theme: 'monokai'
	    // },
	    // onImageUpload: function(files) {
	    //   url = $(this).data('upload'); //path is defined as data attribute for  textarea
	    //   console.log(url);
	    //   console.log(' not');
	    //   // sendFile(files[0], url, $(this));
	    // }
	  });

	  /*
	   * Summernote hack
	   */
	  // Keep the dynamic modal open after close the insert media in summernote field
	  $(document).on('hidden.bs.modal', '.modal', function () {
	      $('.modal:visible').length && $(document.body).addClass('modal-open');
	  });

	  $('.modal-dismiss').click(function (event) {
	    $('.note-modal').modal('hide');
	  });

	  //Datemask dd/mm/yyyy
	  // $(".datemask").inputmask("yyyy-mm-dd", {"placeholder": "yyyy-mm-dd"});

	  //Datemask2 mm/dd/yyyy
	  // $(".datemask2").inputmask("mm/dd/yyyy", {"placeholder": "mm/dd/yyyy"});

	  //Money Euro
	  // $("[data-mask]").inputmask();

	  //Date range picker
	  // $('#reservation').daterangepicker();

	  //Date range picker with time picker
	  // $('#reservationtime').daterangepicker({timePicker: true, timePickerIncrement: 30, format: 'MM/DD/YYYY h:mm A'});

	  //Date range as a button
	  //Timepicker
	  // $(".timepicker").timepicker({
	  //   showInputs: false
	  // });

	  //Datepicker
	  $(".datepicker").datepicker({
	      format: 'yyyy-mm-dd'
	  });
	  //DateTimepicker
	  $(".datetimepicker").datetimepicker({
	  });

	  // $(".datetimepicker").datetimepicker({
	  //     format: 'YYYY-MM-DD hh:mm A',
	  //     icons:{
	  //         time: 'glyphicon glyphicon-time',
	  //         date: 'glyphicon glyphicon-calendar',
	  //         up: 'fa fa-arrow-up',
	  //         down: 'fa fa-arrow-down',
	  //         previous: 'glyphicon glyphicon-chevron-left',
	  //         next: 'glyphicon glyphicon-chevron-right',
	  //         today: 'glyphicon glyphicon-screenshot',
	  //         clear: 'glyphicon glyphicon-trash',
	  //         close: 'glyphicon glyphicon-remove'
	  //     }
	  // });

	  //Colorpicker
	  $(".my-colorpicker1").colorpicker();
	  //color picker with addon
	  $(".my-colorpicker2").colorpicker();

	  // $('#daterange-btn').daterangepicker(
	  //     {
	  //       ranges: {
	  //         'Today': [moment(), moment()],
	  //         'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
	  //         'Last 7 Days': [moment().subtract(6, 'days'), moment()],
	  //         'Last 30 Days': [moment().subtract(29, 'days'), moment()],
	  //         'This Month': [moment().startOf('month'), moment().endOf('month')],
	  //         'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
	  //       },
	  //       startDate: moment().subtract(29, 'days'),
	  //       endDate: moment()
	  //     },
	  //     function (start, end) {
	  //       $('#reportrange span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'));
	  //     }
	  // );

	  //iCheck for checkbox and radio inputs
	  $('input[type="checkbox"].icheck, input[type="radio"].icheck').iCheck({
	    checkboxClass: 'icheckbox_flat-pink',
	    radioClass: 'iradio_flat-pink'
	  });
	  //iCheck line checkbox and radio
	  $('.icheckbox_line').each(function(){
	    var self = $(this),
	    label = self.next(),
	    label_text = label.text();

	    label.remove();
	    self.iCheck({
	      checkboxClass: 'icheckbox_line-pink',
	      radioClass: 'iradio_line-pink',
	      insert: '<div class="icheck_line-icon form-control"></div>' + label_text
	    });
	  });

	  // coupon form
	  $('input#limited').on('ifChecked', function () {
	    $('#customers_field').removeClass('hidden').addClass('show');
	    $('input#limited').attr('required', 'required');
	  })

	  $('input#limited').on('ifUnchecked', function () {
	    $('#customers_field').removeClass('show').addClass('hidden');
	    $('input#limited').removeAttr('required');
	  });
	  //END coupon form

	  //shipping zone
	  $('input#rest_of_the_world').on('ifChecked', function () {
	    $('select#country_ids').removeAttr('required').attr('disabled', 'disabled');
	    $('select#country_ids').select2('val', '');
	  });

	  $('input#rest_of_the_world').on('ifUnchecked', function () {
	    $('select#country_ids').removeAttr('disabled').attr('required', 'required');
	  });

	  $('input#free_shipping_checkbox').on('ifChecked', function () {
	    $('input#shipping_rate_amount').val(0.0).removeAttr('required').attr('disabled', 'disabled');
	  });

	  $('input#free_shipping_checkbox').on('ifUnchecked', function () {
	    $('input#shipping_rate_amount').removeAttr('disabled').attr('required', 'required');
	  });
	  //END shipping zone

	  //User Role form
	  $("#user-role-status").change(function()
	  {
	    var temp = $("#user-role-status").select2('data')[0].text;
	    var roleType = temp.toLowerCase();
	    var rows = $('table#tbl-permissions tr');
	    var platform = rows.filter('.platform-module');
	    var merchant = rows.filter('.merchant-module');

	    switch(roleType)
	    {
	      case 'platform':
	        platform.show();
	        merchant.hide();
	        merchant.find("input[type='checkbox']").iCheck('uncheck');
	        break;
	      case 'merchant':
	        platform.hide();
	        merchant.show();
	        platform.find("input[type='checkbox']").iCheck('uncheck');
	        break;
	      default:
	        platform.hide();
	        merchant.hide();
	        merchant.find("input[type='checkbox']").iCheck('uncheck');
	        platform.find("input[type='checkbox']").iCheck('uncheck');
	    }
	  });

	  $('input.role-module').on('ifChecked', function () {
	    var selfId = $(this).attr('id');
	    var childClass =  '.' + selfId + '-permission';
	    $(childClass).iCheck('enable').iCheck('check');
	  });

	  $('input.role-module').on('ifUnchecked', function () {
	    var selfId = $(this).attr('id');
	    var childClass =  '.' + selfId + '-permission';
	    $(childClass).iCheck('uncheck').iCheck('disable');
	  });
	  //END User Role form

	  //Slug URL Maker
	  $('.makeSlug').on('keyup', function(){
	    var slugstr = convertToSlug(this.value);
	    $('.slug').val(slugstr);
	  });

	  function convertToSlug(Text){
	    return Text.toLowerCase().replace(/[^\w ]+/g, '').replace(/ +/g, '-');
	  }
	  //END Slug URL Maker

	  //Popover
	  $('[data-toggle="popover"]').popover({
	      html: 'true',
	  });

	  $('[data-toggle="popover"]').on('click', function(){
	    $('[data-toggle="popover"]').not(this).popover('hide');
	  });

	  $(document).on("click", ".popover-submit-btn", function() {
	    $('[data-toggle="popover"]').popover('hide');
	  });
	  //END Popover

	  if( $('#uploadBtn').length ){
	    document.getElementById("uploadBtn").onchange = function () {
	      document.getElementById("uploadFile").value = this.value;
	    };
	  }

	  //SEARCH OPTIONS
	  var $search_rows = $('#search_table tr');
	  $('#search_this').keyup(function() {
	      var val = $.trim($(this).val()).replace(/ +/g, ' ').toLowerCase();
	      $search_rows.show().filter(function() {
	          var text = $(this).text().replace(/\s+/g, ' ').toLowerCase();
	          return !~text.indexOf(val);
	      }).hide();
	  });
	  //END SEARCH OPTIONS

	  //Random code string maker
	  /**
	   * generate Code
	   */
	  $( '.generate-code' ).on( "click", function( event )
	  {
	    var id = $( event.target ).attr('id');
	    var func = 'generateCouponCode';

	    switch(id)
	    {
	      case 'gc-pin-number':
	        func = 'generatePinCode';
	        break;
	      case 'gc-serial-number':
	        func = 'generateSerialNumber';
	        break;
	      default:
	        func = 'generateCouponCode';
	    }

	    var couponCode = getFromPHPHelper(func);
	    $('#'+id).closest( ".code-field" ).find( "input.code" ).val(couponCode);
	  });
	  //END Random code string maker

	  // Toggle button
	  $('.btn-toggle').on("click", function(e){
	      e.preventDefault();
	      var node = $( this );
	      $.ajax({
	          url: node.attr('href'),
	          type: 'POST',
	          data: {
	              "_token": "{{ csrf_token() }}",
	              "_method": "PUT",
	          },
	          success: function (data) {
	            if (data == 'success'){
	              notie.alert(1, "{{ trans('responses.success') }}", 2);
	            }
	            else{
	              notie.alert(3, "{{ trans('responses.failed') }}", 2);
	              node.toggleClass('active');
	            }
	          },
	          error: function (data) {
	            if (data.status == 403){
	              notie.alert(2, "{{ trans('responses.denied') }}", 2);
	            }
	            else{
	              notie.alert(3, "{{ trans('responses.error') }}", 2);
	            }
	            node.toggleClass('active');
	          }
	      });
	  });
	  // END Toggle button

	  // Ajax Form Submit
	  $('.ajax-submit-btn').on("click", function(e){
	      // console.log('btn');
	      return;
	  });

	  $('.ajax-form').submit(function(e){
	      e.preventDefault();
	      //Return false and abort the action if the form validation failed
	      if($(this).find('input[type=submit]').hasClass('disabled')){
	        notie.alert(3, "{{ trans('responses.form_validation_failed') }}", 5);
	        return;
	      }

	      var action = this.action;
	      var data = $( this ).serialize();

	      $.ajax({
	          url: action,
	          type: 'POST',
	          data: data,
	          success: function (data) {
	            $('#myDynamicModal').modal('hide');
	            if (data == 'success'){
	              notie.alert(1, "{{ trans('responses.success') }}", 3);
	            }
	            else{
	              notie.alert(3, "{{ trans('responses.failed') }}", 3);
	              node.toggleClass('active');
	            }
	          },
	          error: function (data) {
	            $('#myDynamicModal').modal('hide');
	            if (data.status == 403){
	              notie.alert(2, "{{ trans('responses.denied') }}", 3);
	            }
	            else{
	              notie.alert(3, "{{ trans('responses.error') }}", 3);
	            }
	            node.toggleClass('active');
	          }
	      });
	  });
	  // END Ajax Form Submit

	  // Offer Price form
	  var errHelp = '<div class="help-block with-errors"></div>';
	  $('#offer_price').keyup(
	      function(){
	          var offerPrice = this.value;
	          if (offerPrice !== ""){
	              $('#offer_start').attr('required', 'required');
	              $('#offer_end').attr('required', 'required');
	          }
	          else{
	              $('#offer_start').removeAttr('required');
	              $('#offer_end').removeAttr('required');
	          }
	      }
	  );
	  //END Offer Price form

	  // Collapsible fieldset
	  $(function () {
	      $('fieldset.collapsible > legend').prepend('<span class="btn-box-tool"><i class="fa fa-toggle-up"></i></span>');
	      $('fieldset.collapsible > legend').click(function () {
	          $(this).find('span i').toggleClass('fa-toggle-up fa-toggle-down');
	          var $divs = $(this).siblings().toggle("slow");
	      });
	  });
	  //END collapsible fieldset
	}
	//END App plugins

	//Mass selection and action section
	function initMassActions()
	{
	  //Enable iCheck plugin for checkboxes
	  //iCheck for checkbox and radio inputs
	  $('#massSelectArea input[type="checkbox"]').iCheck({
	    checkboxClass: 'icheckbox_minimal-blue',
	    radioClass: 'iradio_flat-blue'
	  });

	  //Enable check and uncheck all functionality
	  $(".checkbox-toggle").click(function () {
	    var clicks = $(this).data('clicks');
	    if (clicks) {
	      $(".fa", this).removeClass("fa-check-square-o").addClass('fa-square-o');
	      unCheckAll(); //Uncheck all checkboxes
	    } else {
	      $(".fa", this).removeClass("fa-square-o").addClass('fa-check-square-o');
	      checkAll();  //Check all checkboxes
	    }
	    $(this).data("clicks", !clicks);
	  });

	  //Trigger the mass action functionality
	  $('.massAction').on('click', function(e) {
	    e.preventDefault();

	    var doAfter = $(this).data('doafter');

	    var allVals = [];
	    $(".massCheck:checked").each(function() {
	        allVals.push($(this).attr('id'));
	    });

	    if(allVals.length <= 0){
	        notie.alert(3, "{{ trans('responses.select_some_item') }}", 2);
	    } else {
	        $.ajax({
	            url: $(this).attr('href'),
	            type: 'POST',
	            data: {
	                "_token": "{{ csrf_token() }}",
	                "ids": allVals,
	            },
	            success: function (data) {
	                if (data['success']) {
	                    notie.alert(1, data['success'], 2);
	                    switch(doAfter){
	                      case 'reload':
	                          window.location.reload();
	                          break;
	                      case 'remove':
	                          $(".massCheck:checked").each(function() {
	                            $(this).parents("tr").remove();
	                          });
	                          break;
	                      default:
	                        unCheckAll(); //Uncheck all checkboxes
	                    }
	                } else if (data['error']) {
	                    notie.alert(3, data['error'], 2);
	                } else {
	                    notie.alert(3, "{{ trans('responses.failed') }}", 2);
	                }
	            },
	            error: function (data) {
	              notie.alert(3, "{{ trans('responses.error') }}", 2);
	            }
	        });
	    }
	  });
	}

	function checkAll(){
	  $("#massSelectArea input[type='checkbox']").iCheck("check");
	}

	function unCheckAll(){
	  $("#massSelectArea input[type='checkbox']").iCheck("uncheck");
	}
	//End Mass selection and action section

	/*************************************
	*** END Initialise application plugins ***
	**************************************/

	 /*
	 * Get result from PHP helper functions
	 *
	 * @param  {str} funcName The PHP function name will be called
	 * @param  {mix} args     arguments need to pass into the PHP function
	 *
	 * @return {mix}
	 */
	function getFromPHPHelper(funcName, args = null)
	{
	    var url = "{{ url('admin/system/ajax/getFromPHPHelper') }}";
	    var result = 0;
	    $.ajax({
	        url: url,
	        data: "funcName="+ funcName + "&args=" + args,
	        async: false,
	        success: function(v)
	        {
	          result = v;
	        }
	    });
	    return result;
	}
</script>