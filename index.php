<!doctype html>
<html>

<head>
    <meta name="ac:route" content="/">
    <base href="/">
    <script src="dmxAppConnect/dmxAppConnect.js"></script>
    <meta charset="UTF-8">
    <title>Iscambia</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="bootstrap/5/css/bootstrap.min.css" />
    <script src="js/jquery-3.4.1.slim.min.js"></script>
    <style>
        .form-control {
            height: 43px;
            border-radius: 6px;
            font-size: 16;
        }

        label {
            font-weight: 600;
            font-size: 16;
            margin-bottom: 7px;
        }

        .form-check-input {
            height: 20px;
            width: 20px;
        }
    </style>
    <link rel="stylesheet" href="dmxAppConnect/dmxValidator/dmxValidator.css" />
    <script src="dmxAppConnect/dmxValidator/dmxValidator.js" defer=""></script>
    <link rel="stylesheet" href="dmxAppConnect/dmxDropzone/dmxDropzone.css" />
    <script src="dmxAppConnect/dmxDropzone/dmxDropzone.js" defer=""></script>
    <link rel="stylesheet" href="dmxAppConnect/dmxNotifications/dmxNotifications.css" />
    <script src="dmxAppConnect/dmxNotifications/dmxNotifications.js" defer=""></script>
    <script src="dmxAppConnect/dmxBootstrap5Navigation/dmxBootstrap5Navigation.js" defer=""></script>
    <script src="dmxAppConnect/dmxRouting/dmxRouting.js" defer=""></script>
    <script src="dmxAppConnect/dmxBrowser/dmxBrowser.js" defer=""></script>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.14.0/css/all.css" integrity="sha384-HzLeBuhoNPvSl5KYnjx0BT+WB0QEEqLprO+NBkkk5gbc67FTaL7XIGa2w1L0Xbgc" crossorigin="anonymous" />
    <script src="dmxAppConnect/dmxFormatter/dmxFormatter.js" defer></script>
</head>

<body is="dmx-app" id="index" class="">
    <div is="dmx-browser" id="browser1"></div>
    <dmx-notifications id="notif"></dmx-notifications>
    <header>
        <nav class="navbar navbar-expand-lg navbar-light bg-light py-4 px-5">
            <div class="container-fluid">
                <a class="navbar-brand" href="#"><img src="assets/images/logo.jpeg" class="img-fluid" style="height:50px"></a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav mr-auto">
                        <li class="nav-item active">
                            <a class="nav-link fs-5 text-dark me-3" href="#">Home <span class="sr-only">(current)</span></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link fs-5 text-dark me-3" href="#">About</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link fs-5 text-dark me-3" href="./registor" internal>Registration</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link fs-5 text-dark me-3" href="#">Yellow Pages</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link fs-5 text-dark me-3" href="#">Photo Gallery</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link fs-5 text-dark me-3" href="#">Contact</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link fs-5 text-white me-3" href="./gala-dinner">Gala Dinner</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>
    <div class="container">
        <div id="conditional1" is="dmx-if" dmx-bind:condition="browser1.location.pathname == '/'">
            <div class="d-flex justify-content-center">
                <img src="assets/images/logo.jpeg" class="img-fluid" style="height:150px">
            </div>
            <div class="d-flex justify-content-center mt-5">
                <p class="fs-2">Welcome</p>
            </div>
        </div>
        <div id="divRoutes">
            <div is="dmx-route" id="routeRegistration" path="/registor" url="registor.php">
            </div>
            <div is="dmx-route" id="routeGalaDinner" url="gala_dinner.php" path="/gala-dinner"></div>
        </div>
    </div>
    <script src="bootstrap/5/js/bootstrap.bundle.min.js"></script>
</body>

</html>