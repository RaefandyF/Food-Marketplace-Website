<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <link rel="stylesheet" href="newTenant.css">
    <script src="https://kit.fontawesome.com/a8b7d392df.js" crossorigin="anonymous"></script>
</head>
<body>
    <div class="container">
    <header class="blog-header lh-1 py-3">
        <div class="row flex-nowrap justify-content-between align-items-center">
        <div class="col-4 pt-1">
            <a class="blog-header-logo text-dark" href="#">Uni Store</a>
        </div>
        <div class="col-4 d-flex justify-content-end align-items-center">
            <i class="fa-solid fa-circle-user user"></i>
            <p class="adminText">Admin</p>
        </div>
        </div>
    </header>
    </div>

    <div class="container center">
        <form action="submitNewTenant.php" method="POST">
            <div class="form-group">
                <label for="tenantName">Tenant Name</label>
                <input type="text" class="form-control" id="tenantName" placeholder="Masukkan nama tenant" required>
            </div>
            <div class="form-group">
                <label for="tenantEmail">Email</label>
                <input type="email" class="form-control" id="tenantEmail" placeholder="Masukkan email tenant" required>
            </div>
            <div class="form-group">
                <label for="">tenantCategory</label>
                <input type="text" class="form-control" id="tenantCategory" placeholder="Masukkan kategori tenant" required>
            </div>
            <div class="form-group">
                <label for="tenantLogo">Tenant Logo</label>
                <input type="file" class="form-control-file" id="tenantLogo">
            </div>
            <input type="hidden" value="" id="categoryIdHidden">
            <input type="submit" value="Submit" id="btnSubmit">
        </form>
    </div>

    <!-- <img src="images/halo.png" alt="Foto"> -->

    <script src="https://code.jquery.com/jquery-3.6.1.js" integrity="sha256-3zlB5s2uwoUzrXK3BT7AX3FyvojsraNFxCc2vC/7pNI=" crossorigin="anonymous"></script>

    <script>
        $(document).ready(function () {
            // getData();
        });

        $('#btnSubmit').click(function(e) {
            e.preventDefault();
            let pathLogo = $('#tenantLogo').val();
            let indexPath = pathLogo.lastIndexOf("fakepath\\") + 9;
            let fileLogo = pathLogo.substring(indexPath);
            function generatePass(length) {
                var result           = '';
                var characters       = 'abcdefghijklmnopqrstuvwxyz';
                var charactersLength = characters.length;
                for ( var i = 0; i < length; i++ ) {
                result += characters.charAt(Math.floor(Math.random() * charactersLength));
            }
                return result;
            }
            let password = generatePass(5) + Math.floor(Math.random() * 10) + Math.floor(Math.random() * 10) + Math.floor(Math.random() * 10);

            let categoryNum = 0;
            if($('#tenantCategory').val() === 'Makanan') {
                categoryNum = 1;
            } else if ($('#tenantCategory').val() === 'Minuman') {
                categoryNum = 2;
            } else if ($('#tenantCategory').val() === 'Snack') {
                categoryNum = 3;
            }

            let data = {
                tenantName: $('#tenantName').val(),
                tenantEmail: $('#tenantEmail').val(),
                tenantPassword: password,
                tenantCategory: $('#tenantCategory').val(),
                tenantCategoryId : categoryNum,
                tenantRating : 0,
                tenantIMG : 'images/' + fileLogo        
            };

            
            submitData(data);
        });

        function submitData(data) {
            $.ajax({
                method: "POST",
                url: "database/submitNewTenant.php",
                data: data,
                success: function(response) {
                    console.log(data);
                    console.log('Submit Status: ', response);
                    alert("Data berhasil dimasukkan");
                    location.replace("adminPage.php");
                }
            });
        }
    </script>

</body>
