@extends('layouts.app')
@section('content')
@include('layouts.sidebar')
 <section class="content">
            <div class="container-fluid">
                @yield('content-main')
            </div>
        </section>
@stop
