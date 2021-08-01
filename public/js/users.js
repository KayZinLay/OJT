
$(function() {

    /**
     * toggle change password part in update screen
     */
    $('#showPwd').on('click', function() {
        
        $('#hidePwd').removeClass('d-none').show();
        $('#changePwd').removeClass('d-none').show();
        $(this).hide();
    });

    $('#hidePwd').on('click', function() {
        $(this).hide();
        $('#changePwd').hide();
        $('#showPwd').show();
    });

    if ($('#newPwd').val() || $('#confirmPwd').val()) {
        $('#hidePwd').removeClass('d-none').show();
        $('#changePwd').removeClass('d-none').show();
        $('#showPwd').hide();
    }

    // Show or hide toggle of company recruitement part
    displayToggleComRec($('#role').val());
    $('#role').on('change', function() {
        displayToggleComRec($('#role').val());
    });
});


