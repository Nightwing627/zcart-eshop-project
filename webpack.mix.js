const mix = require('laravel-mix');

// Compile js
mix.scripts([
	    'resources/assets/plugins/jQuery/jquery-3.3.1.min.js',
	    'resources/assets/plugins/moment/moment.js',
	    'resources/assets/plugins/bootstrap/js/bootstrap.js',
	    'resources/assets/plugins/datatables/jquery.dataTables.js',
	    'resources/assets/plugins/datatables/dataTables.bootstrap.js',
		'resources/assets/plugins/datatables/buttons/dataTables.buttons.js',
		'resources/assets/plugins/datatables/buttons/buttons.bootstrap.min.js',
		'resources/assets/plugins/datatables/buttons/jszip.min.js',
		'resources/assets/plugins/datatables/buttons/pdfmake.min.js',
		'resources/assets/plugins/datatables/buttons/vfs_fonts.js',
		'resources/assets/plugins/datatables/buttons/buttons.html5.js',
		'resources/assets/plugins/datatables/buttons/buttons.print.js',
	    'resources/assets/plugins/validator/validator.min.js',
	    'resources/assets/plugins/select2/select2.full.js',
	    'resources/assets/plugins/summernote/summernote.min.js',
	    'resources/assets/plugins/iCheck/icheck.min.js',
	    'resources/assets/plugins/fontawesome-iconpicker/iconpicker.min.js',
	    'resources/assets/plugins/bootstrap-select/bootstrap-select.js',
	    'resources/assets/plugins/datepicker/bootstrap-datepicker.js',
	    'resources/assets/plugins/datetimepicker/bootstrap-datetimepicker.min.js',
	    'resources/assets/plugins/colorpicker/bootstrap-colorpicker.min.js',
	    'resources/assets/plugins/dragNdrop/RowSorter.js',
	    'resources/assets/dist/js/app.min.js',
	    'resources/assets/plugins/jquery-confirm/js/jquery-confirm.js',
	    'resources/assets/plugins/notie/notie.js',
		// 'resources/assets/js/app.js',
	], 'public/js/app.js');

// Compile css
mix.sass('resources/assets/sass/app.scss', '../resources/assets/tmp/scss.css')
	.styles([
		'resources/assets/tmp/scss.css',
	   'resources/assets/plugins/bootstrap/css/bootstrap.min.css',
	   'resources/assets/plugins/datatables/dataTables.bootstrap.css',
	   'resources/assets/plugins/datatables/buttons/buttons.dataTables.min.css',
	   'resources/assets/plugins/datepicker/datepicker3.css',
	   'resources/assets/plugins/fontawesome-iconpicker/iconpicker.min.css',
	   'resources/assets/plugins/datetimepicker/bootstrap-datetimepicker.css',
	   'resources/assets/plugins/bootstrap-select/bootstrap-select.css',
	   'resources/assets/plugins/iCheck/flat/blue.css',
	   'resources/assets/plugins/iCheck/flat/pink.css',
	   'resources/assets/plugins/iCheck/line/pink.css',
	   'resources/assets/plugins/iCheck/minimal/blue.css',
	   'resources/assets/plugins/colorpicker/bootstrap-colorpicker.min.css',
	   'resources/assets/plugins/select2/select2.min.css',
	   'resources/assets/plugins/summernote/summernote.css',
	   'resources/assets/plugins/jquery-confirm/css/jquery-confirm.css',
	   'resources/assets/plugins/handle-btn/handle-btn.css',
	   'resources/assets/dist/css/style.css',
	   'resources/assets/dist/css/skins.css',
	], 'public/css/app.css');

// kartik-v-bootstrap-fileinput
mix.scripts([
        'resources/assets/plugins/kartik-v-bootstrap-fileinput/js/plugins/sortable.min.js',
        'resources/assets/plugins/kartik-v-bootstrap-fileinput/js/plugins/piexif.min.js',
        'resources/assets/plugins/kartik-v-bootstrap-fileinput/js/fileinput.min.js',
	], 'public/js/fileinput.js')
   .styles([
        'resources/assets/plugins/kartik-v-bootstrap-fileinput/css/fileinput.min.css',
   ], 'public/css/fileinput.css');
//END kartik-v-bootstrap-fileinput

// highcharts
mix.scripts([
        'resources/assets/plugins/highcharts/highcharts.js',
        'resources/assets/plugins/highcharts/exporting.js',
        'resources/assets/plugins/highcharts/export-data.js',
	], 'public/js/highchart.js');
//END highcharts

// Copy some assets file for iCheck plugin
mix.copy('resources/assets/plugins/iCheck/line/line.png', 'public/css/line.png')
	.copy('resources/assets/plugins/iCheck/line/line@2x.png', 'public/css/line@2x.png')
	.copy('resources/assets/plugins/iCheck/minimal/blue.png', 'public/css/blue.png')
	.copy('resources/assets/plugins/iCheck/minimal/blue@2x.png', 'public/css/blue@2x.png')
	.copy('resources/assets/plugins/iCheck/flat/flat.png', 'public/css/flat.png')
	.copy('resources/assets/plugins/iCheck/flat/flat@2x.png', 'public/css/flat@2x.png')
	.copy('resources/assets/plugins/iCheck/flat/pink.png', 'public/css/pink.png')
	.copy('resources/assets/plugins/iCheck/flat/pink@2x.png', 'public/css/pink@2x.png')
	.copy('resources/assets/plugins/colorpicker/img/alpha.png', 'public/css/img/alpha.png')
	.copy('resources/assets/plugins/colorpicker/img/alpha-horizontal.png', 'public/css/img/alpha-horizontal.png')
	.copy('resources/assets/plugins/colorpicker/img/hue.png', 'public/css/img/hue.png')
	.copy('resources/assets/plugins/colorpicker/img/hue-horizontal.png', 'public/css/img/hue-horizontal.png')
	.copy('resources/assets/plugins/colorpicker/img/saturation.png', 'public/css/img/saturation.png');
