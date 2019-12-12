$(document).ready(function(){
    $( "#login" ).focus(function() {
        $('.log').addClass('active');
    });
    $( "#login" ).focusout(function() {
        $('.log').removeClass('active');
    });
    $( "#password" ).focus(function() {
        $('.pass').addClass('active');
    });
    $( "#password" ).focusout(function() {
        $('.pass').removeClass('active');
    });
})

$(document).ready(function() {

    $('#text').summernote({
        height: 700,
        callbacks: {
            onImageUpload: function(files) {
                var el = $(this);
                sendFile(files[0],el);
            }
        }
    });
});

function sendFile(file, el) {
    var  data = new FormData();
    data.append("file", file);
    var url = `create/file`;
    $.ajax({
        data: data,
        type: "POST",
        headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
        dataType: 'json',
        url: url,
        cache: false,
        contentType: false,
        processData: false,
        success: function(url2) {
            el.summernote('insertImage', url2);
        },
        error: function (data) {
            console.log('Error:', data);
        }
    });
}
