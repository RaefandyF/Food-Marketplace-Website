<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <link rel="stylesheet" href="loginPage.css">
    <script src="https://kit.fontawesome.com/a8b7d392df.js" crossorigin="anonymous"></script>
</head>
<body>
    <div class="container center">
        <div class="logoContainer">
            <a class="blog-header-logo text-dark logo" href="">Uni Store</a>
        </div>
        <form action="loginData.php" method="POST">
            <div class="form-group">
                <label for="Email">Email</label>
                <input type="email" class="form-control" name="email" id="Email" placeholder="Masukkan email" required>
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" class="form-control" name="password" id="Password" placeholder="Masukkan password" required>
            </div>
            <div class="lupaPassword">
                <a href="">Lupa password?</a>
            </div>
            <div class="buttonCont">
                <input class="btn btn-primary" type="submit" value="Login" id="btnSubmit">
            </div>
            <div style="text-align: center; margin-top: 10px;">
                <p>Belum punya akun? <a href="registerPage.php">klik disini</a></p>
            </div>
        </form>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.1.js" integrity="sha256-3zlB5s2uwoUzrXK3BT7AX3FyvojsraNFxCc2vC/7pNI=" crossorigin="anonymous"></script>
    <script>
        $('#btnSubmit').click(function(e) {
            e.preventDefault();
            console.log("Hello");
            let data = {
                email: $('#Email').val(),
                password: $('#Password').val(),      
            };
            submitData(data);
        });

        function submitData(data) {
            $.ajax({
                method: "POST",
                url: "database/loginData.php",
                data: data,
                success: function(response) {
                    console.log(data);
                    console.log('Submit Status: ', response);
                    if(response == "Admin") {
                        location.replace("adminPage.php");
                    } else if(response == "Tenant") {
                        location.replace("guestPage.php");
                    } else if(response == "Customer") {
                        location.replace("customerPage.php");
                    } else {
                        alert("Email atau password salah");
                    }
                    
                }
            });
        }
    </script>
</body>