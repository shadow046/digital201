<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>Digital File 201</title>
        <link rel="icon" href="/images/ideaserv_systems_logo.png">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
        <link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" integrity="sha384-DyZ88mC6Up2uqS4h/KRgHuoeGwBcD4Ng9SiP4dIRy0EXTlnuz47vAwmeGwVChigm" crossorigin="anonymous"/>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
        <link href='https://cdn.jsdelivr.net/npm/sweetalert2@11.4.24/dist/sweetalert2.min.css' rel='stylesheet'>
        <style>
            
            .f-outline{
                position: relative;
            }
            .forminput{
                background-color: white;
                font-size: 13px !important;
                font-family: Arial, Helvetica, sans-serif !important;
            }
            .formlabel{
                font-size: 13px;
                font-family: Arial, Helvetica, sans-serif !important;
                position: absolute;
                left: 0.2rem;
                top: 0.5rem;
                padding: 0 0.5rem;
                color: black;
                cursor: text;
                transition: top 200ms ease-in,
                    left 200ms ease-in,
                    font-size 200ms ease-in;
            }
            .forminput:focus{
                background-color: white;
                border-color: #0d1a80;
                border-width: 2px;
                box-shadow: none !important;
            }
            .forminput:hover{
                background-color: white;
                border-color: #0d1a80;
                border-width: 2px;
                box-shadow: none !important;
            }
            .forminput:focus ~ .form-label,
            .forminput:not(:placeholder-shown).forminput:not(:focus)
            ~.formlabel{
                top: -0.8rem;
                font-size: 0.8rem;
                left: 0.4rem;
                background-color: white;
                color: #0d1a80;
            }
            input:-webkit-autofill,
            input:-webkit-autofill:focus{
                transition: background-color 600000s 0s, color 600000s 0s;
            }
            input[data-autocompleted]{
                background-color: transparent !important;
            }
            input, select{
                color: black;
                border-color: black;
                outline: none;
            }
            .bp{
                font-weight: bold;
                background-color: #0d1a80;
                border-color: #0d1a80;
                color: white;
            }
            .close{
                zoom: 80%;
                color: white;
                opacity: 100%;
            }
            html {
                scrollbar-width: normal;
                scrollbar-color: #777 #555;
                scroll-behavior: smooth;
            }
            html::-webkit-scrollbar {
                width: 1vw;
            }
            html::-webkit-scrollbar-thumb {
                background-color: #0d1a80;
            }
            html::-webkit-scrollbar-thumb:hover {
                background-color: #0d1a80;
            }
            html::-webkit-scrollbar-track {
                background-color: #5555;
            }
            html::-webkit-scrollbar-track:hover {
                background-color: #555;
            }
            .center{
                display: block;
                margin-left: auto;
                margin-right: auto;
                width:500px;
            }
            .digital-file-201{
                display: inline;
                padding:0;
                margin: 10§;
                font-size: 25px;
                font-weight: bolder;
                color:#0d1a80;
            }
            .create-new, .view-table{
                color:white;
                border-radius: 5px;
            }
            .create-new:hover, .view-table:hover{
                border:inset;
                transition: 0.2s;
            }
            body{
                overflow-x: hidden;
            }
            nav{
                font-weight: bold;
            }
            ul li{
                color:white;
            }
            ul li:hover{
                background-color: #5464d8;
                transition: 0.9s;
            }
            th{
                color:white;

            }
            thead{
                background-color:#3b60c4;
            }
            h3,h5{
                color:#0d1a80;
            }
            /* Back on top */
            #button {
                display: inline-block;
                background-color: #0d1a80;
                width: 30px;
                height: 30px;
                text-align: center;
                border-radius: 4px;
                position: fixed;
                bottom: 30px;
                right: 30px;
                transition: background-color .3s, 
                opacity .5s, visibility .5s;
                opacity: 0;
                visibility: hidden;
                z-index: 1000;
                text-decoration: none;
            }
            #button::after {
                content: "\f077";
                font-family: FontAwesome;
                font-weight: normal;
                font-style: normal;
                font-size: 2em;
                line-height: 30px;
                color: #fff;
            }
            #button:hover {
                cursor: pointer;
                background-color: #333;
            }
            #button:active {
                background-color: #555;
            }
            #button.show {
                opacity: 1;
                visibility: visible;
            }

            .grow {
                display: inline-block;
                transition-duration: 0.3s;
                transition-property: transform;
                -webkit-tap-highlight-color: transparent;
                transform: translateZ(0);
                box-shadow: 0 0 1px transparent;
            }
            .grow:hover {
                transform: scale(1.1);
            }
            
            legend{
                background-color: #4e71cf;
                color:white;
                border-top-left-radius: 10px;
                border-bottom-right-radius:15px ;
                font-size: 18px;
                font-weight: bold;
            }
            fieldset{
                border:1px solid black;
            }
            a{
                text-decoration: none;
            }

        </style>
    </head>
<body>
        @if(!Auth::guest())

            @include('inc.navbar')
        @else
            @include('inc.guest')
        @endif

        <div class="container-fluid">
            {{-- Scroll on top --}}
            <a id="button" title="GO UP"></a>
            @yield('content')
        </div>

        <!-- To avoid repeating html structure tags -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js" integrity="sha512-aVKKRRi/Q/YV+4mjoKBsE4x3H+BkegoM/em46NNlCqNTmUYADjBbeNefNxYV7giUp0VxICtqdrbqU7iVaeZNXA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js"></script>
        <script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.4.24/dist/sweetalert2.all.min.js"></script>
        
        <!-- Insert JS FILES -->
        @if(Request::is('employees'))
            <script src="{{ env('APP_URL')}}js/employees.js"></script>
        @endif
        @if(Request::is('home'))
            <script src="{{ env('APP_URL')}}js/home.js"></script>
        @endif
        @if(Request::is('users'))
            <script src="{{ env('APP_URL')}}js/users.js"></script>
        @endif
        
        <script>
            const d = new Date().toDateString();
            const t = new Date().toLocaleTimeString();
            document.getElementById("date").innerHTML = d + ' ' + t;
        </script>
</body>
</html>
