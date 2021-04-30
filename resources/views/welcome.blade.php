<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Kin And Carta - Full-Stack Coding Challenge</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet">
        <link href="css/styles.css" rel="stylesheet">
    </head>
    <body>

    <div class="container">
        <div class="row background py-5">
            <div class="col-md-12 text-center">
                <a href="/"><img src="images/logo.png" title="Kin And Carta" alt="Kin and Carta" border="0"></a>
            </div>
        </div>
        <div id="app" class="row background py-5">
            <contact-component></contact-component>
        </div>
    </div>
    
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.min.js"></script>
    <script src="{{asset('js/app.js')}}"></script>
    </body>
</html>
