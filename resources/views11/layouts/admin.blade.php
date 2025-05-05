<!DOCTYPE html>
<html lang="zxx" class="js">

<head>
    <base href="../../">
    <meta charset="utf-8">
    <meta name="author" content="Softnio">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Corporate Action Calendar for FMDQ Private Markets Limited">
    <!-- Fav Icon  -->
    <link rel="shortcut icon" href="{{ asset('asset/images/logo.png') }}">
    <!-- Page Title  -->
    <title>Corporate Action Calendar for FMDQ Private Markets Limited</title>
    <!-- StyleSheets  -->
    <link rel="stylesheet" href="{{ asset('assets/css/dashlite.css') }}">
    <link id="skin-default" rel="stylesheet" href="{{ asset('assets/css/theme.css') }}">
    <link id="skin-default" rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
</head>

<body class="nk-body bg-lighter npc-general has-sidebar ">
    <div class="nk-app-root">
        <!-- main @s -->
        <div class="nk-main ">


            @include('layouts.adminsidebar')
            @include('layouts.adminheader')

            @yield('content')


            <div class="nk-footer">
                <div class="container-fluid">
                    <div class="nk-footer-wrap">
                        {{-- <div class="nk-footer-copyright"> &copy; <script>document.write(new Date().getFullYear())</script> FMDQ GROUP
                            </div> --}}
                        <div class="nk-footer-links">
                            <ul class="nav nav-sm">

                                <li class="nav-item">
                                    <p class="mb-0 text-muted"> Powered By iQx Consult Limited &copy;
                                        <script>
                                            document.write(new Date().getFullYear())
                                        </script>
                                    </p>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>


            <script>
                $(".formattedNumberField").on('keyup', function(evt) {

                    let value = $(this).val();
                    value = value.replace(/[^0-9.]/g, ''); // Remove non-digit and non-decimal characters
                    const parts = value.split('.'); // Split the number into integer and decimal parts
                    let integerPart = parts[0].replace(/\B(?=(\d{3})+(?!\d))/g, ','); // Format the integer part with commas

                    // Reconstruct the formatted number
                    if (parts.length > 1) {
                        parts[1] = parts[1].substring(0, 2); // Ensure two decimal places
                        value = integerPart + '.' + parts[1];
                    } else {
                        value = integerPart;
                    }

                    // remove leading 0 if characters > 1
                    if (value.length > 1 && value.charAt(0) === "0") {
                        value = value.substring(1);
                    }

                    if (value == "") {
                        value = "0";
                    } // make value 0 if empty string

                    $(this).val(value);

                });
            </script>
            <script src="{{ asset('assets/js/bundle.js') }}"></script>
            <script src="{{ asset('assets/js/scripts.js') }}"></script>
            <script src="{{ asset('assets/js/charts/chart-crm.js') }}"></script>
            <script src="{{ asset('assets/js/libs/datatable-btns.js') }}"></script>
</body>

</html>
