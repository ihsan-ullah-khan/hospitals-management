<!DOCTYPE html>
<html lang="en">
  <head>
    @include('layout.partials.head')
  </head>
  @if(Route::is(['map-grid']))
  <body class="map-page">
  @endif
  @if(Route::is(['chat-doctor','chat']))
  <body class="chat-page">
  @endif
  @if(Route::is(['doctor-register','forgot-password','login','register']))
  <body class="account-page">
  @endif
  @if(Route::is(['video-call','voice-call']))
  <body class="call-page">
  @endif
  @if(Route::is(['index-13']))
  <body class="home-four">
  @endif
@yield('content')
@if(!Route::is(['chat-doctor','map-grid','map-list','chat','voice-call','video-call','index-13']))
@include('layout.partials.footer_index2')
@endif
 @if(Route::is(['index-13']))
@include('layout.partials.footer_index5')
@endif
@include('layout.partials.footer-scripts')

  </body>
</html>