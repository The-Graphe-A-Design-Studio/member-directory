@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('ADMIN Login') }}
                    <!-- <span style="float: right;">or <a href="{{ route('admin.register') }}">Sign up?</a></span> -->
                </div>

                <div class="card-body">
                    <admin-login-form />
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
