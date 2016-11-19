@extends('online_shop.layouts.plane')

@section('menu')
    @include('online_shop.layouts.nav_onlineshop')
@stop

@section('body')


    <div class="col-md-3">
         @include('online_shop.layouts.sidemenu')
    </div>

    <div class="col-md-9">

      <script >

          //script to fade the header in when the user scrolls
          var headerHeight = 50;
          var navBar = $(".navbar");
          var headerBackground = $(".HeaderColorBackground");
          var hasSolidHeader = false;

          $(window).scroll(function() {
              if ($(this).scrollTop() > headerHeight) {
                if(! hasSolidHeader){
                  headerBackground.fadeIn();
                  hasSolidHeader = true;
                }
              }else{
                if(hasSolidHeader){
                  headerBackground.fadeOut();
                  hasSolidHeader = false;
                }
              }
          });
      </script>

        <h2>
            <div class="Title_Section">
              @yield('page_Heading')
            </div>
        </h2>


        <!-- Global function to display a feedback message to the user's. this
        must be present in all the views that we give feedback on-->
        @include('flash::message')

        @yield('section')
    </div>
@stop
