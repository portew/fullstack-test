<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
</head>
<body style="margin: 0; padding: 0; font-family: Arial, sans-serif; background-color: #ffffff; color: #000000;">

<table width="100%" cellpadding="0" cellspacing="0" border="0" style="background-color: #ffffff;">
    <tr>
        <td align="center">
            <!-- Główna tabela o szerokości 600px -->
            <table width="600" cellpadding="0" cellspacing="0" border="0" style="background-color: #ffffff; padding: 20px;">

                <!-- TREŚĆ GŁÓWNA -->
                <tr>
                    <td style="font-size: 16px; line-height: 1.5; color: #000000;">
                        @yield('content')
                    </td>
                </tr>


            </table>
        </td>
    </tr>
</table>

</body>
</html>
