<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Gemingear</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="{{asset('assets/customer/img/favicon1.ico')}}">


    <link rel="stylesheet" href="{{asset('assets/customer/css/plugins.css')}}">

    <link rel="stylesheet" href="{{asset('assets/customer/css/style.css')}}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/all.css">

    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <!------ Include the above in your HEAD tag ---------->

    <script src="https://cdn.jsdelivr.net/jquery.validation/1.15.1/jquery.validate.min.js"></script>
    <link href="https://fonts.googleapis.com/css?family=Kaushan+Script" rel="stylesheet">
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet"
        crossorigin="anonymous">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    {{-- slick --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick-theme.css">
    <style>
        .myform {
            position: relative;
            display: -ms-flexbox;
            display: flex;
            padding: 1rem;
            -ms-flex-direction: column;
            flex-direction: column;
            width: 100%;
            pointer-events: auto;
            background-color: #fff;
            background-clip: padding-box;
            border: 1px solid rgba(0, 0, 0, .2);
            border-radius: 1.1rem;
            outline: 0;
            max-width: 500px;
        }

        .tx-tfm {
            text-transform: uppercase;
        }

        .mybtn {
            border-radius: 50px;
        }

        .login-or {
            position: relative;
            color: #aaa;
            margin-top: 10px;
            margin-bottom: 10px;
            padding-top: 10px;
            padding-bottom: 10px;
        }

        .span-or {
            display: block;
            position: absolute;
            left: 50%;
            top: -2px;
            margin-left: -25px;
            background-color: #fff;
            width: 50px;
            text-align: center;
        }

        .hr-or {
            height: 1px;
            margin-top: 0px !important;
            margin-bottom: 0px !important;
        }

        .google {
            color: #666;
            width: 100%;
            height: 40px;
            text-align: center;
            outline: none;
            border: 1px solid lightgrey;
        }

        form .error {
            color: #ff0000;
        }

        #second {
            display: none;
        }

        ul#results {
            list-style: none;
            width: 100%;
            margin: 0;
            padding: 0;
            overflow: auto;
            height: 400px;
        }

        ul#results li a {
            color: #000;
            background: white;
            display: block;
            text-decoration: none;
        }

        ul#results li a:hover {
            background: #edecec;
        }

        .col-lg-8.p-0 {
            position: absolute;
            z-index: 2;
            margin-left: 150px;

        }

        .detail span {
            color: red;
            margin-left: 24px;

            .info {
                font-family: :Comfortaa, sans-serif;
            }
        }
    </style>
    <style>
        .zoom {
            transition: transform .2s;
        }

        .zoom:hover {

            transform: scale(1.1);
        }
    </style>
    <style>
        .main {
            font-family: Arial;
            width: 500px;
            display: block;
            margin: 0 auto;
            color: black;
        }

        .slick-prev::before,
        .slick-next:before {
            color: #dc0707;
        }
    </style>
</head>
