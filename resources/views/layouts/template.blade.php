<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>@yield('title', 'Library')</title>

 
  {{-- <link href="{{ asset('template/assets/plugins/global/plugins.bundle.css') }}" rel="stylesheet" type="text/css"> --}}

  {{-- Metronic styles --}}
  <link href="{{ asset('template/assets/css/demo1/style.bundle.min.css') }}" rel="stylesheet" type="text/css">
</head>

<body id="kt_app_body" data-kt-app-layout="light-header" class="app-default">


  <div class="d-flex flex-column flex-root" id="kt_app_root">
 
    <div class="app-page flex-column flex-column-fluid" id="kt_app_page">

    
      @includeIf('layouts.partials.header')

      {{-- Wrapper --}}
      <div class="app-wrapper flex-column flex-row-fluid" id="kt_app_wrapper">

     
        {{-- @includeIf('layouts.partials.sidebar') --}}

        {{-- Main --}}
        <div class="app-main flex-column flex-row-fluid" id="kt_app_main">
          {{-- Content Wrapper --}}
          <div class="d-flex flex-column flex-column-fluid">
         
            {{-- <div class="app-toolbar py-3 py-lg-6" id="kt_app_toolbar"> ... </div> --}}

            {{-- Content --}}
            <div class="app-content flex-column-fluid" id="kt_app_content">
              <div class="container-xxl">
                @yield('content')
              </div>
            </div>
          </div>

          {{-- Footer --}}
          @includeIf('layouts.partials.footer')
        </div>
      </div>
    </div>
  </div>

 
  <script src="{{ asset('template/assets/plugins/global/plugins.bundle.js') }}"></script>

  <script src="{{ asset('template/assets/js/scripts.bundle.min.js') }}"></script>

 
  @stack('scripts')
</body>
</html>

