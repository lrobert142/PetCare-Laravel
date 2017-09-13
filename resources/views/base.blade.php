<!DOCTYPE html>
<html>
  <head>
    @section('html-header')
      @include('partials.html-header')
    @show
  </head>

  <body>
    @section('header')
      @include('partials.header')
    @show

    @section('content')
      <p>
        Sorry, no content is available...
      </p>
    @show

    @section('footer')
      @include('partials.footer')
    @show

    @section('html-footer')
      @include('partials.html-footer')
    @show
  </body>
</html>
