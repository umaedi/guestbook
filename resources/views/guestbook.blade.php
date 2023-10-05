@extends('layouts.app')
@section('content')
    
    <!-- App Capsule -->
    <div id="appCapsule">

      <div class="section text-center">
         <img class="mb-2" src="{{ asset('img') }}/logo/logo-tuba.png" class="mt-2" alt="" width="80">
         <h3>BUKU TAMU</h3>
          <h4>Selamat datang di Anjungan Kabupaten <br> Tulang Bawang</h4>
      </div>
      <div class="section mb-5 p-2">

          <form id="guestStore">
              @csrf
              <div class="card">
                  <div class="card-body pb-1">
                      <div class="form-group boxed">
                          <div class="input-wrapper">
                              <label class="label" for="name">Nama Lengkap</label>
                              <input type="text" class="form-control" id="name" required>
                              <i class="clear-input">
                                  <ion-icon name="close-circle"></ion-icon>
                              </i>
                          </div>
                      </div>

                      <div class="form-group boxed">
                          <div class="input-wrapper">
                              <label class="label" for="alamat">Alamat</label>
                              <textarea type="text" class="form-control" id="alamat" required autocomplete="off"
                              ></textarea>
                              <i class="clear-input">
                                  <ion-icon name="close-circle"></ion-icon>
                              </i>
                          </div>
                      </div>
                  </div>
              </div>
              <div class="form-button-group  transparent">
                  <button id="btn_login" type="submit" class="btn btn-primary btn-block btn-lg">Kirim</button>
                  <button id="btn_loading" class="d-none btn btn-primary btn-block btn-lg" type="button">
                      <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> Tunggu sebentar yah...
                  </button>
              </div>

          </form>
      </div>
  </div>
  <!-- * App Capsule -->
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
            swal({text: 'Terimakasih sudah mengisi buku tamu', icon: 'success', timer: 3000,}).then(() => {
                loadingsubmit(false);
                window.location.href = '/guestbook/thankyou';
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
