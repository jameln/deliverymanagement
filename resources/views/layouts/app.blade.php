<!DOCTYPE html>
<html lang="{{ App::getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'DELIVERY MANAGEMENT') }}</title>

    <!-- Styles -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <!-- Latest datatable CSS -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">
    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <!-- Latest datatable JavaScript -->
    <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>

        <script src="https://cdn.datatables.net/buttons/1.5.2/js/dataTables.buttons.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"></script>
        <script src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.html5.min.js"></script>
        <script src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.colVis.min.js"></script>
        <script src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.print.min.js"></script>
        <link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.5.2/css/buttons.dataTables.min.css">



    {{-- <link href="{{ asset('css/app.css') }}" rel="stylesheet"> --}}

    <style>
        body {
            padding-top: 65px;
            padding-bottom: 20px;
        }

        /* Set padding to keep content from hitting the edges */
        .body-content {
            padding-left: 15px;
            padding-right: 15px;
        }

        /* Override the default bootstrap behavior where horizontal description lists
           will truncate terms that are too long to fit in the left column.
           Also, add a 8pm to the bottom margin
        */
        .dl-horizontal dt {
            white-space: normal;
            margin-bottom: 8px;
        }

        /* Set width on the form input elements since they're 100% wide by default */
        input,
        select,
        textarea,
        .uploaded-file-group,
        .input-width-input {
            max-width: 380px;
        }

        .input-delete-container {
            width: 46px !important;
        }

        /* Vertically align the table cells inside body-panel */
        .panel-body .table > tr > td
        {
            vertical-align: middle;
        }

        .panel-body-with-table
        {
            padding: 0;
        }

        .mt-5 {
            margin-top: 5px !important;
        }

        .mb-5 {
            margin-bottom: 5px !important;
        }
        .text-white{
            margin: 10px !important;
            box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2);
            transition: 0.3s;
            border-radius: 5px; /* 5px rounded corners */
        }
        /* .container.body-content {
            width: -webkit-fill-available;
        } */
        .panel-heading .accordion-toggle:after {
            /* symbol for "opening" panels */
            font-family: 'Glyphicons Halflings';  /* essential for enabling glyphicon */
            content: "\e114";    /* adjust as needed, taken from bootstrap.css */
            float: right;        /* adjust as needed */
            color: grey;         /* adjust as needed */
        }
        .panel-heading .accordion-toggle.collapsed:after {
            /* symbol for "collapsed" panels */
            content: "\e080";    /* adjust as needed, taken from bootstrap.css */
        }
    </style>

</head>

<body>

    <nav class="navbar navbar-inverse navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar">A</span>
            <span class="icon-bar">B</span>
            <span class="icon-bar">C</span>
          </button>
          <a href="{!! url('/') !!}" class="navbar-brand">{{ config('app.name', 'DELIVERY MANAGEMENT') }}</a>
          <a href="{{ url('/home') }}">
            <span class="glyphicon glyphicon-home" style="color:#eee;line-height:3;"></span>
          </a>
        </div>
        <div id="navbar" class="collapse navbar-collapse">
          <ul class="nav navbar-nav">

          </ul>

          @if (Route::has('login'))
            <div class="collapse navbar-collapse">
                <ul class="nav navbar-nav navbar-right">
                @if (Auth::check())
                @if(Auth::user()->role_id == 1)
                    @if(has_permission_slug('settings_show'))
                    <li>
                        <a class="btn dropdown-toggle" data-toggle="dropdown" href="#">
                            {{ __('Settings') }}
                            <span class="caret"></span>
                        </a>
                        <ul class="dropdown-menu">
                            
                            <li><a href="{{ route('settings.manage') }}" >{{ __('Configurations') }}</a></li>
                            <li><a href="{{ url('/register') }}">{{ __('Add user') }}</a></li>
                            <li><a href="{{ url('/statuses') }}">{{ __('Statuses') }}</a></li>  
                            <li><a href="{{ url('/languages') }}">{{ __('languages') }}</a></li>
                            <li><a href="{{ url('/currencies') }}">{{ __('currency') }}</a></li>
                        </ul>
                    </li>
                    @endif

                    <li>
                        <a class="btn dropdown-toggle" data-toggle="dropdown" href="#">
                            {{ __('Expediteurs') }}
                            <span class="caret"></span>
                        </a>
                        <ul class="dropdown-menu">
                            <li><a href="{{ url('/sender_categories') }}">Categories</a></li>
                            <li><a href="{{ url('/sender_clients') }}">Clients</a></li>
                            <li><a href="{{ url('/sender_client_addresses') }}">Destinations</a></li>
                            <li><a href="{{ url('/sender_companies') }}">Etablisements</a></li>
                            <li><a href="{{ url('/sender_deliveries') }}">Delivery</a></li>
                            <li><a href="{{ url('/sender_items') }}">Articles</a></li>
                            <li><a href="{{ url('/sender_sites') }}">Sites Exppiditeurs</a></li>
                            <li><a href="{{ url('/sender_users') }}">Utilisateurs</a></li>

                        </ul>
                    </li>

                    <li>
                        <a class="btn dropdown-toggle" data-toggle="dropdown" href="#">
                            {{ __('Livraisons') }}
                            <span class="caret"></span>
                        </a>
                        <ul class="dropdown-menu">
                            <li><a href="{{ url('/delivery_agents') }}">Agents</a></li>
                            <li><a href="{{ url('/delivery_companies') }}">Companies</a></li>
                            <li><a href="{{ url('/delivery_deposits') }}">Deposits</a></li>
                            <li><a href="{{ url('/delivery_requests') }}">Delivery</a></li>
                            <li><a href="{{ url('/delivery_request_items') }}">Articles</a></li>
                            <li><a href="{{ url('/delivery_users') }}">Livreures</a></li>
                        </ul>
                    </li>
                    @endif
                    <li>
                    <a class="btn dropdown-toggle" data-toggle="dropdown" href="#"> 
                        welcome {{{ isset(Auth::user()->name) ? Auth::user()->name : Auth::user()->email }}}
                        <span class="caret"></span>
                    </a>
                    <ul class="dropdown-menu">   
                        <li><a href="{{ url('/logout') }}">Logout</a></li>
                    </ul>
                    </li>
                    <input type="hidden" class="CurrentRoute" value="{{Route::current()->getName()}}">

                @else
                    <!-- <li><a href="{{ url('/login') }}">Login</a></li> -->
                    <!-- <li><a href="{{ url('/register') }}">Register</a></li> -->
                @endif
                </ul>
            </div>
          @endif

        </div><!--/.nav-collapse -->
      </div>
    </nav>

    <div class="container body-content">
        @yield('content')
    </div>

    <!-- Scripts -->

    <script src="https://code.jquery.com/jquery-1.12.4.min.js"
        integrity="sha256-ZosEbRLbNQzLpnKIkEdrPv7lOy9C27hHQ+Xp8a4MxAQ="
        crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.15.0/jquery.validate.min.js"></script>
    {{-- <script src="{{ asset('js/app.js') }}"></script> --}}
    <script type="text/javascript">
        $(function(){

             // sends the uploaded file file to the fielselect event
            $(document).on('change', ':file', function() {
                var input = $(this);
                var label = input.val().replace(/\\/g, '/').replace(/.*\//, '');

                input.trigger('fileselect', [label]);
            });

            // Set the label of the uploaded file
            $(':file').on('fileselect', function(event, label) {
                $(this).closest('.uploaded-file-group').find('.uploaded-file-name').val(label);
            });

            // Deals with the upload file in edit mode
            $('.custom-delete-file:checkbox').change(function(e){
                var self = $(this);
                var container = self.closest('.input-width-input');
                var display = container.find('.custom-delete-file-name');

                if (self.is(':checked')) {
                    display.wrapInner('<del></del>');
                } else {
                    var del = display.find('del').first();
                    if (del.is('del')) {
                        del.contents().unwrap();
                    }
                }
            }).change();

            // Sets the validator defaults
            $.validator.setDefaults({
                errorElement: "span",
                errorClass: "help-block",
                highlight: function (element, errorClass, validClass) {
                    $(element).closest('.form-group').addClass('has-error');
                },
                unhighlight: function (element, errorClass, validClass) {
                    $(element).closest('.form-group').removeClass('has-error');
                },
                errorPlacement: function (error, element) {
                    if (element.parent('.input-group').length) {
                        error.insertAfter(element.parent());
                    } else if(element.prop('type') === 'checkbox' || element.prop('type') === 'radio') {
                        error.appendTo(element.closest(':not(input, label, .checkbox, .radio)').first());
                    } else {
                        error.insertAfter(element);
                    }
                }
            });

            // Makes sure any input with the required class is actually required
            $('form').each(function(index, item){
                var form = $(item);
                form.validate();

                form.find(':input.required').each(function(i, input){
                    $(input).attr('required', true);
                });
            });

        });
        function slugify(string){
            string = string.toLowerCase();
            result = string.replace(/[^a-z0-9\s]/gi, '-').replace(/[_\s]/g, '-');

            return result;
        }
        $(document).ready( function () {
            var d = new Date();
            var strDate = d.getFullYear() + "/" + (d.getMonth()+1) + "/" + d.getDate();

            if ($('.CurrentRoute').val() == 'home'){
                $('.btn-group-sm').hide();
            }
            $.noConflict();
            $('.table').DataTable( {
                    responsive: true,
                    stateSave: true,
                    "pagingType": "full_numbers",
                    "language": {
                        "lengthMenu": "Display _MENU_ records per page",
                        "zeroRecords": "Nothing found - sorry",
                        "info": "Showing page _PAGE_ of _PAGES_",
                        "infoEmpty": "No records available",
                        "infoFiltered": "(filtered from _MAX_ total records)"
                    },
                    dom: 'Blfrtip',
                    buttons: [
                        {
                            extend: 'print',
                            exportOptions: {
                                columns: ':visible'
                            },
                            title: 'Export '+strDate,
                            
                        },
                    'colvis'
                    ],
                    columnDefs: [ {
                        targets: -1,
                        visible: false
                    } ],
            } );
        } );

    </script>
    @yield('after_footer')
</body>
</html>
