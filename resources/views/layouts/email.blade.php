<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <style type="text/css" media="screen">
        
        body {
            background-color: #FFFFFF;
            font-family: 'Nunito', 'Helvetica', Arial, sans-serif;
            color: #333;
        }

        h1, h2, h3, h4 {
            line-height: 130%;
            font-family: 'Nunito', 'Helvetica', Arial, sans-serif;
            font-weight: 700;
        }

        p, li, td, th {
            font-size: 10pt;
            line-height: 130%;
            vertical-align: top;
            text-align: left;
            font-family: 'Nunito', 'Helvetica', Arial, sans-serif;
        }

        b {
            font-weight: 700;
        }

        .brand, a {
            color: #121E29;
        }


    </style>
</head>
<body>

    <p style="padding:20px;background-color:#121E29"><a href="{{ config('app.url') }}"><img src="{{ config('app.url') }}/images/admin_logo.png" alt="" width="250" border="0" /></a></p>

    @yield('content')

    <div style="border-top:1px solid #ccc;color:#666;margin-top:20px">

        <p>Wolviston House<br>
            5 Falcon Court<br>
            Preston Farm<br>
            Stockton-on-Tees<br>
            Cleveland TS18 3TS</p>

        <p>Telephone : +44 (0)1642 615792<br>
            Email : <a href="mailto:wms@wolviston.com" style="color:#121E29">wms@wolviston.com</a><br>
            Website : <a href="https://www.wolviston.com" style="color:#121E29">www.wolviston.com</a></p>

    </div>

</body>
</html>
