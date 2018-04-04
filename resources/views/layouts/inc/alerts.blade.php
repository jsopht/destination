@if(session('alert'))
  <div class="alert alert-{{ session('alert') }} alert-secondary alert-dismissible fade show mb-0 text-center" role="alert">
    @if(session('alert') == 'success')
      Success!
    @elseif (session('alert') == 'danger')
      Error!
    @endif

    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
  </div>
@endif
