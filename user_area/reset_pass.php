<?php
$error = "";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
</head>
<style>
    :root {
        --container-body-bg: whitesmoke;
        --input-field-bg: white;
        --bg-text-color: black;
        --input-text-color: white;

    }

    .dark-theme {
        --container-body-bg: rgb(35, 36, 53);
        --input-field-bg: #201f2c;
        --bg-text-color: white;
        --input-text-color: black;
    }

    body {
        background: var(--container-body-bg);
        color: var(--bg-text-color);
    }

    .panel-body {
        background-color: var(--input-field-bg);
    }

    .form-gap {
        padding-top: 70px;
    }

    .form-group {
        margin-top: 30px;
    }

    .alert {
        height: 30px;
        display: none;
        margin-bottom: 10px;
        padding: .2rem 1rem;
    }
</style>
<?php
if ($error != null) {
?>
    <style>
        .alert {
            display: block;
        }
    </style>
<?php
}
?>

<body>
    <div class="form-gap"></div>
    <h6 id="icon"></h6>
    <div class="container">
        <div class="row">
            <div class="col-md-4 col-md-offset-4">
                <div class="panel panel-default">
                    <div class="panel-body">
                        <div class="text-center">

                            <h2 class="text-center">Reset Password</h2>
                            <p>You can reset your password here.</p>
                            <div class="panel-body">

                                <form id="register-form" role="form" autocomplete="off" class="form" method="post">
                                    <div class="alert alert-danger">
                                        <center><?php echo $error ?></center>
                                    </div>
                                    <div class="form-group">
                                        <div class="input-group">
                                            <span class="input-group-addon"> <i class="fa fa-lock"></i></span>
                                            <input id="password" name="user_password" placeholder="New password" class="form-control" type="password">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="input-group">
                                            <span class="input-group-addon"> <i class="fa fa-lock"></i></span>
                                            <input id="password" name="conf_user_password" placeholder="Re-enter new password" class="form-control" type="password">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <input name="recover-submit" class="btn btn-lg btn-primary btn-block" value="Reset Password" type="submit">
                                    </div>

                                    <input type="hidden" class="hide" name="token" id="token" value="">
                                </form>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
<!-- dark theme js -->
<script>
    var icon = document.getElementById("icon");

    icon.onclick = function() {
        var SetTheme = document.body;

        SetTheme.classList.toggle("dark-theme");

        var theme;

        if (SetTheme.classList.contains("dark-theme")) {
            console.log("Dark mode");
            theme = "DARK";
        } else {
            console.log("Light mode");
            theme = "LIGHT";
        }

        localStorage.setItem("PageTheme", JSON.stringify(theme));

        if (document.body.classList.contains("dark-theme")) {
            icon.src = "../images/sun.png";
        } else {
            icon.src = "../images/moon.png";
        }
    };

    let GetTheme = JSON.parse(localStorage.getItem("PageTheme"));
    console.log(GetTheme);

    if (GetTheme === "DARK") {
        document.body.classList = "dark-theme";
        icon.src = "../images/sun.png";
    }
</script>

</html>