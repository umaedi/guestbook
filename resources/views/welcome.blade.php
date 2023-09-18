<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <title>Guest book</title>

  <!-- Template CSS -->
  <link rel="stylesheet" href="{{ asset('css') }}/style.css">
  <link rel="stylesheet" href="{{ asset('css') }}/components.css">
</head>

<body>
  <div id="app">
    <section class="section">
      <div class="container" style="margin-top: 10px">
        <div class="page-error">
            <div class="page-inner">
            <img data-src="{{ asset('/img/qrcode.svg') }}" width="300" class="lazyload img-fluid" alt="Closing">
          </div>
        </div>
      </div>
    </section>
  </div>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/lazysizes/5.2.2/lazysizes.min.js" async=""></script>
</body>
</html>
