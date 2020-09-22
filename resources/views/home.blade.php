@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
<<<<<<< HEAD
                <div class="card-header">{{ __('USER Dashboard') }}</div>
=======
                <div class="card-header">{{ __('Dashboard') }}</div>
>>>>>>> 618d5a84e3460e9d830f42d69dd19295c6b2cbbd

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

<<<<<<< HEAD
                    @component('components.who')
                    @endcomponent
=======
                    {{ __('You are logged in!') }}
>>>>>>> 618d5a84e3460e9d830f42d69dd19295c6b2cbbd
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
