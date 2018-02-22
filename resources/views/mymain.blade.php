@extends('layouts.app')

@section('content')
<!-- BEGIN CONTENT -->
@if(Route::is('root'))
    @include('auth.mylogin')
@endif


<!-- END CONTENT -->
@endsection