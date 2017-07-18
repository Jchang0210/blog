window.setTimeout(function() {
    $(".alert").fadeTo(600, 0).slideUp(600, function(){
        $(this).remove();
    });
}, 4000);