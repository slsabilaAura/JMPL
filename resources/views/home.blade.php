@extends('layouts.app')

@section('content')
<div class="mt-16">
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8 ">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body ">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                </div>

                <div class="container mt-5">
        <h2>File Upload</h2>
        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
        @if(session('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
        @endif
        <form action="{{ route('upload.file') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="file">Choose file</label>
                <input type="file" name="file" class="form-control" id="file">
            </div>
            <button type="submit" class="btn btn-primary">Upload</button>
        </form>
    </div>
    <!-- batas  -->
            </div>
        </div>
    </div>
</div>
</div>

@endsection
