@extends('layouts.app')
@section('content')
  <!-- App Capsule -->
  <div id="appCapsule">

    <div class="section">
        <div class="splash-page mt-5 mb-5">
            <div class="mb-3">
                <img src="{{ asset('img') }}/thk.png" alt="thankyou" width="100%">
            </div>
            <h2 class="mb-2">Terimakasih</h2>
            <p>
                Terimakasih sudah mengisi buku absen, dan terimakasih sudah mampir di ajungan kami
            </p>
        </div>
    </div>

    <div class="fixed-bar">
        <div class="row">
            <div class="col-12">
                <a href="/" class="btn btn-lg btn-outline-secondary btn-block">Go Back</a>
            </div>
        </div>
    </div>

</div>
<!-- * App Capsule -->
@endsection