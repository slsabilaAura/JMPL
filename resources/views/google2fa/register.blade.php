@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Set up Google Authenticator</div>

                <div class="panel-body" style="text-align: center;">
                    <p>Silahkan Scan Barcode dibawah ini aplikasi Google Authenticator atau dapat menginput kode ini.  Jika tidak, Anda tidak akan bisa masuk {{ $secret }}</p>
                    <div>
                        {!! $QR_Image !!}
                    </div>
                    <!-- <p>Anda harus menyiapkan aplikasi Google Authenticator sebelum melanjutkan. Jika tidak, Anda tidak akan bisa masuk</p> -->
                    <div>
                        <a href="/complete-login"><button class="btn btn-primary">Next</button></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection