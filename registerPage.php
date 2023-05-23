<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <link rel="stylesheet" href="registerPage.css">
    <script src="https://kit.fontawesome.com/a8b7d392df.js" crossorigin="anonymous"></script>
</head>
<body>
    <div class="container center">
        <div class="logoContainer">
            <a class="blog-header-logo text-dark logo" href="">Uni Store</a>
        </div>
        <form>
            <div class="form-group">
                <label for="Email">Email</label>
                <input type="email" class="form-control" name="email" id="Email" placeholder="Masukkan email" required>
            </div>
            <div class="form-group">
                <label for="username">Username</label>
                <input type="text" class="form-control" name="username" id="Username" placeholder="Masukkan username" required>
                <p style='color: red; display: none;' id="usernameAlert">Username min 5 karakter alphabet</p>
            </div>
            <div class="form-group">
                <label for="noTelepon">No Telepon</label>
                <input type="text" class="form-control" name="noTelepon" id="noTelepon" placeholder="Masukkan nomor telepon" required>
                <p style='color: red; display: none;' id="noTeleponAlert">No Telepon min 10 karakter hanya berisi angka atau tanda '+'</p>
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" class="form-control" name="password" id="Password" placeholder="Masukkan password" required>
                <p style='color: red; display: none;' id="password">Password minimal 6 karakter</p>
            </div>
            <div class="form-group">
                <label for="passwordConfirm">Confirm Password</label>
                <input type="password" class="form-control" name="passwordConfirm" id="passwordConfirm" placeholder="Masukkan confirm password" required>
                <p style='color: red; display: none;' id="passwordAlert">Password tidak sesuai</p>
            </div>
            <div class="buttonCont">
                <input class="btn btn-primary" type="submit" value="Register" id="btnSubmit">
            </div>
        </form>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.1.js" integrity="sha256-3zlB5s2uwoUzrXK3BT7AX3FyvojsraNFxCc2vC/7pNI=" crossorigin="anonymous"></script>
    <script> 

        $('#btnSubmit').click(function(e) {
            e.preventDefault();
            $("#usernameAlert").css("display","none");
            $("#noTeleponAlert").css("display","none");
            $("#password").css("display","none");
            $("#passwordAlert").css("display","none");
            var regexUsername = new RegExp("^.{4,}[A-Za-z]+$");
            var regexNumber = new RegExp("^.{11,}[0-9+]*$");
            var regexPassword = new RegExp("^.{6,}");

            if(!regexUsername.test($('#Username').val())){
                $("#usernameAlert").css("display","block");
            }
            else if(!regexNumber.test($('#noTelepon').val())){
                $("#noTeleponAlert").css("display","block");
            }
            else if(!regexPassword.test($('#Password').val())){
                $("#password").css("display","block");
            }
            else if($('#Password').val() != $('#passwordConfirm').val()) {
                $("#passwordAlert").css("display","block");
            } else {
                let data = {
                email: $('#Email').val(),
                username: $('#Username').val(),
                noTelepon: $('#noTelepon').val(),
                password: $('#Password').val(),      
            };
                submitData(data);
            };

        });

        function submitData(data) {
            $.ajax({
                method: "POST",
                url: "database/registerData.php",
                data: data,
                success: function(response) {
                    location.replace("loginPage.php");  
                }
            });
        }

    </script>

    
</body>