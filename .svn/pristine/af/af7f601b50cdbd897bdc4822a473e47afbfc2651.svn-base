<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="Tu bitacora del cannabis, registra tus seguimientos, compara productos y comparte el conocimiento.">
    <meta name="keywords" content="cannabis,seguimientos,marihuana,weed">
    <meta name="author" content="Envolabs Spa">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Weedtracking</title>


{{--     <link href="{{ asset('css/bootstrap-select.css') }}" rel="stylesheet">
    <link href="{{ asset('css/daterangepicker.css') }}" rel="stylesheet">
    <link href="{{ asset('css/jquery.mCustomScrollbar.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/magnific-popup.css') }}" rel="stylesheet">
    <link href="{{ asset('css/mediaelementplayer.css') }}" rel="stylesheet">
    <link href="{{ asset('css/mediaelement-playlist-plugin.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/simplecalendar.css') }}" rel="stylesheet">
    <link href="{{ asset('css/swiper.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/Tables-of-content.css') }}" rel="stylesheet"> --}}


    <!-- Bootstrap CSS -->
    <link href="{{ asset('css/bootstrap-reboot.css') }}" rel="stylesheet">
    <link href="{{ asset('css/bootstrap.css') }}" rel="stylesheet">
    <link href="{{ asset('css/bootstrap-grid.css') }}" rel="stylesheet">
    <link href="{{ asset('css/bootstrap-select.css') }}" rel="stylesheet">
    <!-- Styles -->    
    <link href="{{ asset('css/blocks.css') }}" rel="stylesheet">
    <link href="{{ asset('css/theme-styles.css') }}" rel="stylesheet">
    <link href="{{ asset('css/fonts.css') }}" rel="stylesheet">

    <!-- Styles for plugins -->
    <link href="{{ asset('css/jquery.mCustomScrollbar.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/simplecalendar.css') }}" rel="stylesheet">
    <link href="{{ asset('css/daterangepicker.css') }}" rel="stylesheet">
    <link href="{{ asset('css/magnific-popup.css') }}" rel="stylesheet">
    <link href="{{ asset('css/jquery.fancybox.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/summernote.css') }}" rel="stylesheet">
    <link href="{{ asset('css/slick.css') }}" rel="stylesheet">
    <link href="{{ asset('css/slick-theme.css') }}" rel="stylesheet">



    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.4/css/bootstrap-select.min.css">

<style>
  .thumb {
    height: 75px;
    border: 1px solid #000;
    margin: 10px 5px 0 0;
  }
</style>
     
</head>
<body>

    @include('layouts.left-sidebar')
    @include('layouts.right-sidebar')
    @include('layouts.header')
    <div id="app" style="">
        @yield('content')
    </div>
    @include('layouts.footer')


<!-- jQuery -->
<script src="{{ asset('js/jquery-3.2.0.min.js') }}"></script>


<script src="{{ asset('js/material.min.js') }}"></script>
<script src="{{ asset('js/theme-plugins.js') }}"></script>
<script src="{{ asset('js/main.js') }}"></script>
{{-- <script src="{{ asset('js/jquery.magnific-popup.min.js') }}"></script>
 --}}
<script src="{{ asset('js/isotope.pkgd.min.js') }}"></script>
<script src="{{ asset('js/jquery.multifile.min.js') }}"></script>
<script src="{{ asset('js/jquery.fancybox.min.js') }}"></script>
<script src="{{ asset('js/swiper.jquery.min.js') }}"></script>
<script src="{{ asset('js/selectize.min.js') }}"></script>
<script src="{{ asset('js/summernote.min.js') }}"></script>
<script src="{{ asset('js/jquery.jscroll.js')}}"></script>
<script src="{{ asset('js/slick.min.js')}}"></script>
<script src="{{ asset('js/jquery.blockUI.js')}}"></script>

<script type="text/javascript" src="{{ url('js/app.js') }}"></script>
    <!-- Latest compiled and minified JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.4/js/bootstrap-select.min.js"></script>

 @yield('scripts')

<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-114372153-1"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-114372153-1');
</script>

<script type="text/javascript">


    $(document).ready(function() {

            
        //var scroll = new SmoothScroll('a[href*="#"]');
        //inicializar sumernote
        $('#summernote').summernote({
            dialogsInBody: true,
            toolbar: [
                // [groupName, [list of button]]
                ["font", ["bold", "underline", "clear"]]
              ],
            height:200,

            callbacks: {
                onInit: function() {
                    $('body > .note-popover').appendTo("#summernote");
                }
            }
        });

        $('.image-slick').slick();



    });
            ///fin inicializar sumernote


</script>

{{-- infinit scroll --}}
    <script type="text/javascript">
       $(document).ready(function() { 
            $('.js-user-search').selectize({
                        maxItems: 1,
                        valueField: 'link',
                        labelField: 'name',
                        searchField: ['name'],

                        options: [
                        @foreach(App\Strain::all() as $strain)
                        {image: '{{url('/img/plant.png')}}', name: '{{$strain->name}} - {{$strain->type}} ', link: '{!!url('strain/'.$strain->id)!!}'},
                        @endforeach
                        ],
                        create: false,
                        onChange: function(value) {
                            window.location = value;
                            
                        },
                        
                        
                        render: {
                            option: function(item, escape) {
                                return '<div class="inline-items" ><a href="' + escape(item.link) + '">' +
                                    (item.image ? '<div class="author-thumb"><img src="' + escape(item.image) + '" alt="avatar" width="40"></div>' : '') +
                                        '<div class="notification-event">' +
                                    (item.name ? '<span class="h6 notification-friend">' + escape(item.name) + '</span>' : '') + '</a></div>';
                            },

                            item: function(item, escape) {
                                var label = item.link;
                                return '<div>' +
                                    '<span class="label">' + escape(item.name) + '</span>' +
                                    '</div>';
                            }

                        }


                    });
            })
    </script>


</body>
</html>
