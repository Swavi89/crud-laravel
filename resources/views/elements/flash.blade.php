@if (session('success'))
<div class="flash-alert alert alert-success alert-dismissible" role="alert">
    <i class="menu-icon tf-icons bx bx-check"></i>{{ session('success')  }}
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif
@if (session('error'))
<div class="flash-alert alert alert-danger alert-dismissible" role="alert">
    <i class="menu-icon tf-icons bx bx-error"></i>{{session('error')}}
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif
<script>
    setTimeout(function() {
        $('.flash-alert').slideUp('slow');
    }, 3000)
</script>
