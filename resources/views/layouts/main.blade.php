@extends('layouts.app')
@section('content')
@include('layouts.sidebar')
 <section class="content">
            <div class="container-fluid">
                @include('flash::message')
                @yield('content-main')
            </div>
        </section>
@stop
