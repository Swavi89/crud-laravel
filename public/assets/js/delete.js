$(document).ready(function() {
    $('.deleteBtn').click(function(e) {
        e.preventDefault();
        var application_id = $(this).attr('value');
        $('#application_id').val(application_id);
        $('#deleteModal').modal('show');
    });
});