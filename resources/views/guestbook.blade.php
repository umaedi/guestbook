<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Buku Tamu</title>
    <link rel="stylesheet" href="{{ asset('css') }}/style_old.css">
</head>
<body>
    <div class="container">
        <!-- code here -->
        <div class="card">
            <div class="card-image">
                <h2 class="card-heading">
                   <span> Selamat datang<br>
                    <small>Di Anjungan Kabupaten Tulang Bawang</small>
                </h2>
            </div>
            <form id="isiAbsen" class="card-form">
                <div class="input">
                    <input type="text" name="nama" class="input-field" required autocomplete="off" />
                    <label class="input-label">Nama</label>
                </div>
                <div class="input">
                    <textarea type="text" name="alamat" class="input-field" required></textarea>
                    <label class="input-label">Alamat</label>
                </div>
                <div class="action">
                    <button  id="btn_loading" class="action-button" style="display: none" disabled type="button" disabled>
                        <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
                        Tunggu sebentar yah...
                    </button>
                <button id="btn_submit" class="action-button">ISI BUKU TAMU</button>
                </div>
            </form>
        </div>
    </div>
<script src="{{ asset('js') }}/sweetalert.min.js"></script>
<script src="{{ asset('js') }}/jquery-3.3.1.min.js"></script>
    <script type="text/javascript">
        $("#isiAbsen").submit(function(e) {
        e.preventDefault();
        
        var form = $(this)[0];
        var data = new FormData(form);

        var btn_loading = document.getElementById('btn_loading');
        var btn_submit  = document.getElementById('btn_submit');
        
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
                swal({text: res.message, icon: 'success'});
                loadingsubmit(false)
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
                btn_loading.removeAttribute('style', 'display: none');
                btn_submit.setAttribute('style', 'display: none');
            }else {
                btn_loading.setAttribute('style', 'display: none');
                btn_submit.removeAttribute('style', 'display: none');
            }
        }
    });
</script>
</body>
</html>