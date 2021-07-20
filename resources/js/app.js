require('./bootstrap');

$('#createPostForm').on('submit',function(e){
    e.preventDefault();
    $('.errors').html('');
    $('.success').html('');
    let id = $('#id').val();
    let value = $('#value').val();
    $.ajax({
      url: "/store",
      type:"POST",
      data:{
        "_token": $('meta[name="csrf-token"]').attr('content'),
        id,
        value,
      },
      success:function(response){
        let sucessString = '<p class="alert alert-success">';
        sucessString += `Successfully stored ID: ${response.data.id} and Value: ${response.data.value}`;
        sucessString += '</p>';
        $('.success').html(sucessString);
        $('#createPostForm').find("input[type=text], input[type=number]").val("");
      },
    }).fail(function( data ) {
        let response = JSON.parse(data.responseText);
        let errorString = '<div class="alert alert-danger">';
        if (response.errors) {
            $.each( response.errors, function( key, value) {
                errorString += '<p class="error-text">' + value + '</p>';
            });
            errorString += '</div>';
        } else {
            errorString += '<p class="error-text">Internal Server Error. Please try again.</p>';
        }
        $('.errors').html(errorString);
    });
});