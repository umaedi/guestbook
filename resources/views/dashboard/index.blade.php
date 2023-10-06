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
        <img src="{{ asset('img') }}/logo.png" alt="logo" class="logo">
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
                        <div class="right">
                            <h3 id="clock"></h3>
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
                            <div class="value text-success">$ 552.95</div>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="stat-box">
                            <div class="title">Kemarin</div>
                            <div class="value text-danger">$ 86.45</div>
                        </div>
                    </div>
                </div>
                <div class="row mt-2">
                    <div class="col-6">
                        <div class="stat-box">
                            <div class="title">Minggu Ini</div>
                            <div class="value">$ 53.25</div>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="stat-box">
                            <div class="title">Minggu Lalu</div>
                            <div class="value">$ 120.99</div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- * Stats -->
    
            <!-- Transactions -->
            <div class="section mt-4">
                <div class="section-heading">
                    <h2 class="title">Transactions</h2>
                    <a href="app-transactions.html" class="link">View All</a>
                </div>
                <div class="transactions">
                    <!-- item -->
                    <a href="app-transaction-detail.html" class="item">
                        <div class="detail">
                            <img src="{{ asset('img') }}/sample/brand/1.jpg" alt="img" class="image-block imaged w48">
                            <div>
                                <strong>Amazon</strong>
                                <p>Shopping</p>
                            </div>
                        </div>
                        <div class="right">
                            <div class="price text-danger"> - $ 150</div>
                        </div>
                    </a>
                    <!-- * item -->
                </div>
            </div>
            <!-- * Transactions -->
   
        </div>
        <!-- * App Capsule -->
    
    
        <!-- App Bottom Menu -->
        <div class="appBottomMenu">
            <a href="index-2.html" class="item active">
                <div class="col">
                    <ion-icon name="pie-chart-outline"></ion-icon>
                    <strong>Overview</strong>
                </div>
            </a>
            <a href="app-pages.html" class="item">
                <div class="col">
                    <ion-icon name="document-text-outline"></ion-icon>
                    <strong>Pages</strong>
                </div>
            </a>
            <a href="app-components.html" class="item">
                <div class="col">
                    <ion-icon name="apps-outline"></ion-icon>
                    <strong>Components</strong>
                </div>
            </a>
            <a href="app-cards.html" class="item">
                <div class="col">
                    <ion-icon name="card-outline"></ion-icon>
                    <strong>My Cards</strong>
                </div>
            </a>
            <a href="app-settings.html" class="item">
                <div class="col">
                    <ion-icon name="settings-outline"></ion-icon>
                    <strong>Settings</strong>
                </div>
            </a>
        </div>
        <!-- * App Bottom Menu -->

@endsection
@push('js')
    <script type="text/javascript">
        jQuery(function($) {
            setInterval(function() {
                var date = new Date();
                var time = date.toLocaleTimeString();
                $('#clock').html(time);
            },1000);
        });
    </script>
@endpush