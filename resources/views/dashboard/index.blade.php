@extends('layouts.app')
@section('content')

<!-- App Header -->
<div class="appHeader bg-primary text-light">
    <div class="left">
        <a href="#" class="headerButton" data-bs-toggle="modal" data-bs-target="#sidebarPanel">
            <ion-icon name="menu-outline"></ion-icon>
        </a>
    </div>
    <div class="pageTitle">
        <img src="{{ asset('img') }}/logo/logo-tuba.png" alt="logo" class="logo">
    </div>
</div>
<!-- * App Header -->
        <!-- App Capsule -->
        <div id="appCapsule">

            <!-- Wallet Card -->
            <div class="section wallet-card-section pt-1">
                <div class="wallet-card">
                    <!-- Balance -->
                    <div class="balance">
                        <div class="left">
                            <span class="title">Hallo</span>
                            <h1 class="total">Admin</h1>
                        </div>
                        <div class="right" id="date">
                           
                        </div>
                    </div>
                </div>
            </div>
            <!-- Wallet Card -->
    
            <!-- Stats -->
            <div class="section">
                <div class="row mt-2">
                    <div class="col-6">
                        <div class="stat-box">
                            <div class="title">Hari ini</div>
                            <div class="value text-success">{{ $hari_ini }}</div>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="stat-box">
                            <div class="title">Kemarin</div>
                            <div class="value text-danger">{{ $hari_kemarin }}</div>
                        </div>
                    </div>
                </div>
                <div class="row mt-2">
                    <div class="col-6">
                        <div class="stat-box">
                            <div class="title">Minggu Ini</div>
                            <div class="value">{{ $minggu_ini }}</div>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="stat-box">
                            <div class="title">Minggu Lalu</div>
                            <div class="value">{{ $minggu_kemarin }}</div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- * Stats -->
    
            <!-- Transactions -->
            <div class="section mt-2">
                <div class="section-title">Table Pengunjung</div>
                <div class="card" id="dataTable">
                    <button id="btn_loading" class="btn btn-primary btn-block btn-lg" type="button">
                        <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> Tunggu sebentar yah...
                    </button>
                </div>
            </div>
            <!-- * Transactions -->
   
        </div>
        <!-- * App Capsule -->
@endsection
@push('js')
<script type="text/javascript">
$(document).ready(function() {
    loadData();

    jQuery(function($) {
        setInterval(function() {
            var event = new Date();
            var date = event.toLocaleDateString();
            var time = event.toLocaleTimeString();
            $('#date').html(`
            <span class="title">${date}</span>
            <h2>${time}</h2>
            `);
        },1000);
    });
});

function loadData()
{
    $.ajax({
        'url': '{{ url()->current() }}',
        'type': 'GET',
        'data': {
            'load': 'table',
        },
        success(res) {
            $('#dataTable').html(res);
        },
        error(res) {
            console.log(res)
        }
    })
}
        
</script>
@endpush