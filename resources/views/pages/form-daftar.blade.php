@extends('layouts.app')
@section('content')
<div class="container-contact100">
    <div class="wrap-contact100 animate__animated animate__backInDown">
        <form class="needs-validation contact100-form" action="{{ route('register') }}" method="POST" enctype="multipart/form-data" novalidate>
            @csrf
            <img class="mx-auto d-block mt-n4 mb-3" src="{{ asset('images/logo/tangsel.png') }}" width="100" alt="">
            <span class="contact100-form-title">
                Investment
            </span>
            <span class="contact100-form-title fs-16" style="margin-top: -35px">Tangerang Selatan</span>
             <!-- Alert Errors -->
             @if (count($errors) > 0)
             <div class="alert alert-danger mb-5">
                 <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                     <span aria-hidden="true">&times;</span>
                 </button>
                 <strong>Whoops Error!</strong>&nbsp;
                 <span>You have {{ $errors->count() }} error</span>
                 <ul>
                     @foreach ($errors->all() as $error)
                         <li>{{ $error }}</li>
                     @endforeach
                 </ul>
             </div>
             @endif
            <div class="wrap-input100 validate-input">
                <span class="label-input100 font-weight-bold">Name</span>
                <input type="text" class="input100 form-control" style="border: none" name="name" id="name" placeholder="Enter Username" value="{{ old('name') }}" required autofocus>
            </div>
            <div class="wrap-input100 validate-input">
                <span class="label-input100 font-weight-bold">Email</span>
                <input type="email" class="input100 form-control" style="border: none" name="email" id="email" placeholder="Enter Email" value="{{ old('email') }}" required>
                <div class="invalid-feedback m-l-5">
                    Email must be a valid email address.
                </div>
            </div>
            <div class="wrap-input100 validate-input">
                <span class="label-input100 font-weight-bold">Company/Organization</span>
                <input type="text" class="input100 form-control" style="border: none" name="organization" id="organization" placeholder="Enter Organization" value="{{ old('organization') }}" required>
            </div>
            <div class="wrap-input100 validate-input">
                <span class="label-input100 font-weight-bold">Country</span>
                <input type="text" class="input100 form-control" style="border: none" name="country" id="country" placeholder="Enter country" value="{{ old('country') }}" required>
            </div>
            <div class="container-contact100-form-btn">
                <div class="wrap-contact100-form-btn">
                    <div class="contact100-form-bgbtn"></div>
                    <button class="contact100-form-btn">Register<i class="fa fa-long-arrow-right m-l-7" aria-hidden="true"></i></button>
                </div>
            </div>
        </form>
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
