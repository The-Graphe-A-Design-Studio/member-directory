@extends('errors::minimal')

@section('title', __('Service Unavailable'))
@section('code', '503')
<<<<<<< HEAD
@section('message', __($exception->getMessage() ?: 'Service Unavailable'))
=======
@section('message', __('Service Unavailable'))
>>>>>>> 618d5a84e3460e9d830f42d69dd19295c6b2cbbd
