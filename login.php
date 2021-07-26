<!doctype html>
<html>

<head>
    <meta name="ac:base" content="/iscambia">
    <base href="/iscambia/">
    <script src="dmxAppConnect/dmxAppConnect.js"></script>
    <meta charset="UTF-8">
    <title>Authentication</title>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="bootstrap/5/css/bootstrap.min.css" />
    <script src="dmxAppConnect/dmxBrowser/dmxBrowser.js" defer=""></script>
    <script src="dmxAppConnect/dmxBootstrap5Alert/dmxBootstrap5Alert.js" defer=""></script>
</head>

<body is="dmx-app" id="login" style="background-color:#000000">
    <dmx-value id="varIsLogin" dmx-bind:value="false"></dmx-value>
    <div is="dmx-browser" id="browserlogin">
    </div>
    <div class="row flex-column align-items-center justify-content-center mx-3 my-5">
        <div id="crLogin" class="text-center col-xl-4 col-md-6 col-12 login-box card p-0" is="dmx-if" dmx-bind:condition="varIsLogin.value == false">
            <div class="row align-self-center text-center">
                <div class="col ">
                    <img src="assets/smi%20logo.png" class="mt-4 mb-3" height="40px">
                    <h2 class="mb-4">Admin Panel</h2>
                </div>
            </div>
            <form id="formLogin" class="p-4" method="post" is="dmx-serverconnect-form" action="dmxConnect/api/login.php" dmx-on:success="browserlogin.goto('admin.php')"
                dmx-on:unauthorized="txtPassword.setValue('');alertLogin.setType('danger');alertLogin.setTextContent('Invalid username or password. Please try again.');alertLogin.show()"
                dmx-on:forbidden="txtPassword.setValue('');alertLogin.setType('danger');alertLogin.setTextContent('Invalid username or password. Please try again.');alertLogin.show()"
                dmx-on:invalid="txtPassword.setValue('');alertLogin.setType('danger');alertLogin.setTextContent(lastError.response);alertLogin.show()">
                <div class="form-group">
                    <div class="input-group">
                        <span class="input-group-prepend">
                            <span class="input-group-text">
                                <i class="fa fa-user"></i>
                            </span>
                        </span>
                        <input type="text" class="form-control form-control-lg" id="txtUsername" name="username" aria-describedby="username" placeholder="Username" required="" data-msg-required="Please enter username!" autocomplete="off"
                            autocapitalize="off" dmx-bind:disabled="state.executing" dmx-on:input="alertLogin.hide()">
                    </div>
                </div>
                <div class="form-group mt-4">
                    <div class="input-group">
                        <span class="input-group-prepend">
                            <span class="input-group-text">
                                <i class="fa fa-lock"></i>
                            </span>
                        </span>
                        <input type="password" class="form-control form-control-lg" id="txtPassword" name="password" aria-describedby="password" placeholder="password" required="" data-msg-required="Please enter password!"
                            dmx-bind:disabled="state.executing" dmx-on:input="alertLogin.hide()">
                    </div>
                </div>
                <button class="btn btn-pill btn-outline-primary mt-4" type="submit" dmx-bind:disabled="state.executing || !txtUsername.value || !txtPassword.value">LOGIN
                    <span class="spinner-border spinner-border-sm ml-2" role="status" dmx-show="state.executing"></span>
                </button>
            </form>
        </div>
        <div class="alert fade mt-3" id="alertLogin" is="dmx-bs4-alert" role="alert">
        </div>
    </div>
    <script src="bootstrap/4/js/popper.min.js"></script>
    <script src="bootstrap/4/js/bootstrap.min.js"></script>
    <script src="bootstrap/5/js/bootstrap.bundle.min.js"></script>
</body>

</html>