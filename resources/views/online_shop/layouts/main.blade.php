@extends('online_shop.layouts.plane')

@section('menu')
    @include('online_shop.layouts.nav_onlineshop')
@stop

@section('body')
    

    <div class="col-md-3">
         @include('online_shop.layouts.sidemenu')
    </div>

    <div class="col-md-9">
    
        <h2>
            @yield('page_Heading')
        </h2>
        <!-- Global function to display a feedback message to the user's. this
        must be present in all the views that we give feedback on-->   
        @include('flash::message')

        @yield('section')
    </div>
@stop

