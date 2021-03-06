@extends('layouts.app')

@section('body')

<div class="">
     <div id="wrapper">
        <div id="page-wrapper">
            <div class="row">
                   <div class="col-lg-12">
                           <h1 class="page-header">
                                   @yield('page_heading')
                                <div style="float:right;">
                                 @yield('page_title_buttons')
                                </div>
                           </h1>
                   </div>
                   <!-- /.col-lg-12 -->

            </div>
            <div class="row">
                    <!-- Global function to display a feedback message to the user's. this
                        must be present in all the views that we give feedback on
                   -->
                   @include('flash::message')

                   @yield('section')

             </div>
                <!-- /#page-wrapper -->
        </div>
    </div>
</div>

@stop
