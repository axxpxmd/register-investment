@extends('layouts.app')
@section('content')
<div class="container-contact100">
    <div class="wrap-contact100 animate__animated animate__zoomIn">
        <img class="mx-auto d-block" src="{{ asset('images/success.png') }}" width="150" alt="">
        <div class="text-center">
            <p class="fs-20 text-black font-weight-bold">Success!</p>
            <p class="fs-16 text-black">Please Check Your E-mail</p>
        </div>
    </div>
</div>
<div id="dropDownSelect1"></div>
@endsection
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.js"></script>
<script type="text/javascript">
    window.dataLayer = window.dataLayer || [];

    function gtag() {
        dataLayer.push(arguments);
    }
    gtag('js', new Date());

    gtag('config', 'UA-23581568-13');

</script>
