<!-- Title -->
<title>@yield("title")</title>

<!-- Favicon -->
<link rel="shortcut icon" href="{{ URL::asset('assets/images/favicon.ico') }}" type="image/x-icon" />

<!-- Font -->
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Cairo:wght@400;500&display=swap" rel="stylesheet">
{{-- ++++++++++++++++++++++++++++ Toastr.js Package ++++++++++++++++++++++++++++ --}}
{{-- <link rel="stylesheet" href="{{ asset('css/toastr/toastr.min.css') }}" /> --}}
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
