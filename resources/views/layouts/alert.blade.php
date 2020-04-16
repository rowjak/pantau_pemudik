@if(session('alert'))
<div class="alert alert-danger alert-dismissible fade show" role="alert">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true"><i class="material-icons text-mute">close</i>
        </span>
    </button>
    <strong>Peringatan!</strong> {{ session('alert') }}
</div>
@endif
