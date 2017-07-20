function readURL(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function (e) {
            $('#blah').attr('src', e.target.result).height(250).css("margin-bottom","15px");
        	$('#blah').show();
        }

        reader.readAsDataURL(input.files[0]);
    }
}

$("#post-post_image").change(function(){
    readURL(this);
});

$('#blah').hide();