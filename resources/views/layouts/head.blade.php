<!-- Title -->
<title>@yield("title")</title>

<!-- Favicon -->
<link rel="shortcut icon" href="{{ URL::asset('assets/images/favicon.ico') }}" type="image/x-icon" />

<!-- Font -->
<link rel="stylesheet"
    href="https://fonts.googleapis.com/css?family=Poppins:200,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900">
{{-- ++++++++++++++++++++++++++++ Toastr.js Package ++++++++++++++++++++++++++++ --}}
<link rel="stylesheet" href="{{ asset('css/toastr/toastr.min.css') }}" />
{{-- ++++++++++++++++++++++++++++ Wizard Form Style ++++++++++++++++++++++++++++ --}}
<link rel="stylesheet" href="{{ asset('css/wizard.css') }}" id="bootstrap-css" />

@yield('css')
<!--- Style css -->
<link href="{{ URL::asset('assets/css/style.css') }}" rel="stylesheet">

<!--- +++++++++++++++++++++++ Style css +++++++++++++++++++++++ -->
@if (App::getLocale() == 'ar')
    {{-- If "Website Language" is "Arabic" --}}
    <link href="{{ URL::asset('assets/css/rtl.css') }}" rel="stylesheet">
@else
    {{-- If "Website Language" is "English" or "Any Other Language" --}}
    <link href="{{ URL::asset('assets/css/ltr.css') }}" rel="stylesheet">
@endif
