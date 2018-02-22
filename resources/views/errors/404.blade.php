@extends('layouts.app')

@section('content')
<nav class="navbar navbar-default navbar-static-top">
    <div class="container">
        <div class="navbar-header head-logo-img">

            <!-- Collapsed Hamburger -->
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                <span class="sr-only">Toggle Navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>

            <!-- Branding Image -->
            <a class="navbar-brand logo-img" href="{{ url('/') }}">
               <img class="logo-headbar" src="{{ asset('images/new-logo.png') }}">
            </a>
        </div>
    </div>
</nav>

<div class="container">
    <div class="row">
        <div class="col-sm-12">
            @include('dashboard.title-box', ['icon' => 'fa fa-exclamation-triangle', 'title' => '404', 'subTitle' => ''])

            <div class="row"> 
            
                <div class="col-sm-12 error-404">
                    OOPS! Looks like you have lost your way. <br>
                    return to <a href="{{ route('root') }}">home</a>
                </div>

        </div>
    </div>
</div>
@endsection
