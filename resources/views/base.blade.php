<!DOCTYPE html>
<html>
  <head>
    @section('html-header')
      @include('globals.html-header')
    @show
  </head>

  <body>
    @section('header')
      @include('globals.header')
    @show

    @section('content')
      <p>
        Sorry, no content is available...
      </p>
    @show

    @section('footer')
      @include('globals.footer')
    @show

    @section('html-footer')
      @include('globals.html-footer')
    @show
  </body>
</html>
