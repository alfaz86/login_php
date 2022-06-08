<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Login</title>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <!-- JQuery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

    <style>
        .btn-primary {
            background-color : #6558F5;
            border-color : #6558F5;
        }
        .btn-primary:active,
        .btn-primary:hover,
        .btn-primary:focus {
            background-color : #4d40e1 !important;
            border-color : #4d40e1 !important;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1 class="text-center mt-5 mb-5">Form Login</h1>
        <div class="row">
            <div class="col-6 offset-3">
                <div id="alert" class="alert alert-info alert-dismissible" role="alert">
                    <span id="alert-value"></span>
                    <button type="button" class="close" onclick="$('#alert').hide();">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form id="login">
                    <table class="table table-borderless">
                        <tr>
                            <td>Username</td>
                            <td><input class="form-control" type="text" name="username" autocomplete="off"></td>
                        </tr>
                        <tr>
                            <td>Password</td>
                            <td><input class="form-control" type="text" name="password" autocomplete="off"></td>
                        </tr>
                        <tr>
                            <td></td>
                            <td>
                                <button type="submit" class="btn btn-primary mr-3">Login</button> <button type="button" class="btn btn-primary mr-3" onclick="$('#login')[0].reset();">Batal</button>
                            </td>
                        </tr>
                    </table>
                </form>
            </div>
        </div>
    </div>

    <div class="fixed-bottom m-3">
        Develop by <a href="https://github.com/alfaz86" target="blank">Muhammad Alfaz</a>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

    <!-- Script -->
    <script>
        let msg = new URLSearchParams(window.location.search).get('msg');
        if (msg == "logout") {
            $("#alert-value").html("Anda berhasil logout");
        } else {
            $("#alert").hide();
        }

        $("#login").submit(function(e){
            e.preventDefault();
            let serializedData = $(this).serialize();
            let post = $.post("auth.php", serializedData)
            
            post.done(function(data) {
                if (data == "success") {
                    window.location.href = "http://login_php.test";
                } else if (data == "failed") {
                    $("#alert").show();
                    $("#alert-value").html("Username dan Password salah!");
                }
            });
            
            post.fail(function(data) {
                alert( "error" );
            });
        });
    </script>
</body>
</html>