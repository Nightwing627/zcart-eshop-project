<!-- jQuery 2.1.4 -->
<script src="{{asset("assets/plugins/jQuery/jQuery-2.1.4.min.js") }}"></script>
<!-- Bootstrap 3.3.5 -->
<script src="{{asset("assets/bootstrap/js/bootstrap.min.js") }}"></script>

<!-- Notification -->
@include('admin.notification')

@yield("page-script")

<!-- DataTables -->
<script src="{{ asset("assets/plugins/datatables/jquery.dataTables.min.js") }}"></script>
<script src="{{ asset("assets/plugins/datatables/dataTables.bootstrap.min.js") }}"></script>
<link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.4.1/css/buttons.dataTables.min.css" />
<script src="https://cdn.datatables.net/buttons/1.4.1/js/dataTables.buttons.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.4.1/js/buttons.bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.32/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.32/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/buttons/1.4.1/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.4.1/js/buttons.print.min.js"></script>

<!-- bootstrap-validator v0.9.0 -->
<script src="{{ asset("assets/plugins/validator/validator.min.js") }}"></script>
<!-- Select2 -->
<script src="{{ asset("assets/plugins/select2/select2.full.min.js") }}"></script>
<!-- summernote -->
<script src="{{ asset("assets/plugins/summernote/summernote.min.js") }}"></script>
<!-- iCheck 1.0.1 -->
<script src="{{ asset("assets/plugins/iCheck/icheck.min.js") }}"></script>
<!-- bootstrap-select -->
<script src="{{ asset("assets/plugins/bootstrap-select/bootstrap-select.js") }}"></script>
<link rel="stylesheet" href="{{ asset("assets/plugins/bootstrap-select/bootstrap-select.css") }}" />

<!-- date-range-picker -->
<script src="{{ asset("assets/plugins/moment/moment.min.js") }}"></script>
{{-- <script src="{{ asset("assets/plugins/daterangepicker/daterangepicker.js") }}"></script> --}}
<script src="{{ asset("assets/plugins/datepicker/bootstrap-datepicker.js") }}"></script>
<script src="{{ asset("assets/plugins/datetimepicker/bootstrap-datetimepicker.js") }}"></script>
<!-- bootstrap color picker -->
<script src="{{ asset("assets/plugins/colorpicker/bootstrap-colorpicker.min.js") }}"></script>

<!-- App -->
<script src="{{ asset("assets/dist/js/app.min.js") }}"></script>

<!-- confirmation -->
<script src="{{ asset("assets/dist/js/confirmation.js") }}"></script>
<script type="text/javascript">

  /*************************************
  *** Initialise application plugins ***
  **************************************/
  ;(function($, window, document) {
    $(document).ready(function(){
      // Initialise all plugins
      initDatatables();
      initAppPlugins();

      // Support for AJAX loaded modal window.
      $('[data-toggle="modal"]').click(function(e) {
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
            }
            else
            {
              alert("{{ trans('responses.error') }}");
            }
          });
        }
      });

    })
  }(window.jQuery, window, document));


  function initDatatables()
  {
    $(".table-2nd-short").DataTable({
      "iDisplayLength": 25,
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
      "iDisplayLength": 25,
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

  }

  function initAppPlugins()
  {
    $(".confirm").confirmation({
        title: "{{ trans('app.are_you_sure') }}", // The title of the confirm
        popout: true,
        singleton: true,
        placement: "left", // The placement of the confirm (Top, Right, Bottom, Left)
        btnOkLabel: "{{ trans('app.im_sure') }}",
        btnCancelLabel: "{{ trans('app.cancel') }}",
        btnOkClass: "btn-danger btn-flat btn-xs",
        btnCancelClass: "btn-new btn-flat btn-xs",
    });

    $.ajaxSetup ({
      cache: false
    });

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

    $(".select2-attribute_value-attribute").select2(
    {
      placeholder: "{{ trans('app.placeholder.select') }}",
      minimumResultsForSearch: -1,
    }).on("change", function(e)
    {
      var dataString = 'id=' + $(this).val();
      $.ajax({
          type: "get",
          url : "{{ route('admin.catalog.parrentAttributeType') }}",
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
      // console.log("change val=" + $(this).val());
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
        var url = "{{ route('address.getCountryStates') }}"

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
        format: 'YYYY-MM-DD hh:mm A'
    });

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

    // carrier form
    $('input#is_free').on('ifChecked', function () {
      $('#flat_shipping_cost_field').removeClass('show').addClass('hidden');
      $('#flat_shipping_cost').removeAttr('required');
    })

    $('input#is_free').on('ifUnchecked', function () {
      $('#flat_shipping_cost_field').removeClass('hidden').addClass('show');
      $('#flat_shipping_cost').attr('required', 'required');
    });
    //END carrier form

    //User Role form
    $("#user-role-status").change(function()
    {
      var roleType = $("#user-role-status").select2('data')[0].text;
      var rows = $('table#tbl-permissions tr');
      var platform = rows.filter('.platform-module');
      var merchant = rows.filter('.merchant-module');

      switch(roleType)
      {
        case 'Restricted':
          platform.show();
          merchant.hide();
          merchant.find("input[type='checkbox']").iCheck('uncheck');
          break;
        case 'Public':
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
        return Text
            .toLowerCase()
            .replace(/[^\w ]+/g, '')
            .replace(/ +/g, '-')
            ;
    }

    //Timepicker
    // $(".timepicker").timepicker({
    //   showInputs: false
    // });

    if( $('#uploadBtn').length ){
      document.getElementById("uploadBtn").onchange = function () {
        document.getElementById("uploadFile").value = this.value;
      };
    }

    //Radom code tring maker
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

  }


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