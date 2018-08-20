$(document).ready(function(){
    $.notify({
        // oprions
        icon: 'fa fa-{{$icon or 'paw'}}',
        title: "<strong>{{ $type == 'danger' ? 'Error' : $type }}:</strong> ",
        message: '{{ $message or '' }}'
    },{
    	// settings
        type: '{{ $type or 'info' }}',
        delay: 3000,
        placement: {
            from: "top",
            align: "right"
        },
    });
});
