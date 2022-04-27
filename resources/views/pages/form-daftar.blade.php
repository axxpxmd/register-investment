@extends('layouts.app')
@section('content')
<div class="container-contact100">
    <div class="wrap-contact100 animate__animated animate__backInDown">
        <form class="needs-validation contact100-form" action="{{ route('register') }}" id="form" method="POST" enctype="multipart/form-data" novalidate>
            @csrf
            <img class="mx-auto d-block mt-n4 mb-3" src="{{ asset('images/logo/tangsel.png') }}" width="100" alt="">
            <span class="contact100-form-title">
                Investment
            </span>
            <span class="contact100-form-title fs-16" style="margin-top: -35px">Tangerang Selatan</span>
            <!-- Alert Errors -->
            @include('layouts.alerts')
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
                    <button type="button" class="contact100-form-btn" onclick="showData()">Register<i class="fa fa-long-arrow-right m-l-7" aria-hidden="true"></i></button>
                </div>
            </div>
        </form>
    </div>
</div>
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-body">
                <table>
                    <tr>
                        <td><label class="col-sm fs-14 text-black">Name</label></td>
                        <td><label class="col-sm fs-14 text-black" id="nameShow"></label></td>
                    </tr>
                    <tr>
                        <td><label class="col-sm fs-14 text-black">Email</label></td>
                        <td><label class="col-sm fs-14 text-black" id="emailShow"></label></td>
                    </tr>
                    <tr>
                        <td><label class="col-sm fs-14 text-black">Company</label></td>
                        <td><label class="col-sm fs-14 text-black" id="organizationShow"></label></td>
                    </tr>
                    <tr>
                        <td><label class="col-sm fs-14 text-black">Country</label></td>
                        <td><label class="col-sm fs-14 text-black" id="countryShow"></label></td>
                    </tr>
                </table>
                <p class="text-black fs-14 ml-3 font-weight-bold">Are you sure to send this data ?</p>
            <hr>
            <div class="text-right">
                <button type="button" class="btn btn-outline-primary mr-2" data-dismiss="modal"><i class="fa fa-edit mr-2"></i>Edit</button>
                <button type="submit" form="form" class="btn btn-outline-success"><i class="fa fa-send mr-2"></i>Send</button>
            </div>
            </div>
        </div>
    </div>
</div>
@endsection
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.js"></script>
<script type="text/javascript">

    function showData(){
        if ($('#form')[0].checkValidity()) {
            $('#exampleModalCenter').modal('show')
        }else{
            $('#form')[0].reportValidity()
        }

        // get data
        var name = $('#name').val();
        var email = $('#email').val();
        var organization = $('#organization').val();
        var country = $('#country').val();

        $('#nameShow').html(': '+name);
        $('#emailShow').html(': '+email);
        $('#organizationShow').html(': '+organization);
        $('#countryShow').html(': '+country);
    }
</script>
