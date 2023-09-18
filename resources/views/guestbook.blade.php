@extends('layouts.template')
@section('content')
<section class="section">
    <div class="container mt-3">
      <div class="row">
        <div class="col-12 col-sm-8 offset-sm-2 col-md-6 offset-md-3 col-lg-6 offset-lg-3 col-xl-4 offset-xl-4 mt-5">
          @if (session()->has('error'))
          <div class="alert alert-warning">{{ session('error') }}</div>
          @endif
          <div class="card">
            <img src="{{ asset('img') }}/logo.jpg" alt="logo" class="rounded-top">
            <div class="card-body">
              <form id="guestStore">
                @csrf
                <div class="form-group">
                  <label for="nama">Nama</label>
                  <input id="nama" type="text" class="form-control" name="nama" tabindex="1" required autofocus>
                </div>
                <div class="form-group">
                  <div class="d-block">
                      <label for="alamat" class="control-label">Alamat</label>
                  </div>
                  <textarea id="alamat" type="alamat" class="form-control" name="alamat" tabindex="2" required></textarea>
                </div>
                <div class="form-group">
                  @include('layouts._loading_submit')
                  <button id="btn_login" type="submit" class="btn btn-primary btn-lg btn-block" tabindex="4">
                    ISI BUKU TAMU
                  </button>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
@endsection
@push('js')
<script src="{{ asset('js') }}/sweetalert.min.js"></script>

<script type="text/javascript">
    $("#guestStore").submit(function(e) {
    e.preventDefault();
    
    var form = $(this)[0];
    var data = new FormData(form);

    loadingsubmit(true);
    $.ajax({
        'url': '/guestbook/store',
        'type': 'POST',
        'data': data,
        'headers': {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
        'processData': false,
        'contentType': false,   
        'cache': false,
        success(res) {
            swal({text: res.message, icon: 'success', timer: 3000,}).then(() => {
                loadingsubmit(false);
                window.location.href = '/thankyou';
            });
        },
        error(res) {
            loadingsubmit(false);
            if(res.status == 404){
                swal({text: res.responseJSON.message, icon: 'error'});
            }else{
                swal({text: 'Internal Server Error!', icon: 'error'});
            }
        }
    });

    function loadingsubmit(state){
        if(state) {
            $('#btn_loading').removeClass('d-none');
            $('#btn_login').addClass('d-none');
        }else {
            $('#btn_loading').addClass('d-none');
            $('#btn_login').removeClass('d-none');
        }
    }
});
</script>
@endpush