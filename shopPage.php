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
    <link rel="stylesheet" href="shopPage.css">
    <script src="https://kit.fontawesome.com/a8b7d392df.js" crossorigin="anonymous"></script>
  </head>
  <body>
    
<div class="container">
  <header class="blog-header lh-1 py-3">
    <div class="row flex-nowrap justify-content-between align-items-center">
      <div class="col-4 pt-1">
        <a class="blog-header-logo text-dark" href="#">Uni Store</a>
      </div>
      <div class="col-4 text-center">
        <form class="d-flex" role="search">
          <input class="form-control me-2" name="searchInput" type="search" id="searchInput" placeholder="Search" aria-label="Search">
          <button class="btn btn-outline-success" type="submit" id="btnSearch" >Search</button>
        </form>
      </div>
      <div class="col-4 d-flex justify-content-end align-items-center">
        <i class="fa-solid fa-circle-user user"></i>
        <p style="margin: 0px 10px 0 5px;" class="adminText">username</p>
        <a href="logout.php">Logout</a>
      </div>
    </div>
  </header>

  <div class="nav-scroller py-1 mb-2">
    <nav class="nav d-flex justify-content-center category">
    </nav>
  </div>
</div>

<main class="container">
  <div class="row mb-2" id="rowTenant">

    </div>

      <div>
        <h3><b>Product</b></h3>
      </div>
        <ul class="list-group">
            <li class="list-group-item" id="product">

            </li>
        </ul>
  </div>
</main>

    <script src="https://code.jquery.com/jquery-3.6.1.js" integrity="sha256-3zlB5s2uwoUzrXK3BT7AX3FyvojsraNFxCc2vC/7pNI=" crossorigin="anonymous"></script>
    
    <!-- data tenant -->
<script>
      var tenantDisplay = '<div class="col-md-12 pageContainer">' +
      '<div class="row g-0 border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative tenantSection">' +
        '<div class="col-auto d-none d-lg-block">' +
        '<img class="bd-placeholder-img tenantImage" id="tenantImage0" width="200" height="250" role="img" aria-label="Placeholder: Thumbnail" preserveAspectRatio="xMidYMid slice" focusable="false"><title>Placeholder</title><rect width="100%" height="100%" fill="#55595c"/></img>' +
        '</div>' +
        '<div class="col p-4 d-flex flex-column position-static">' +
          '<h3 type="hidden" class="mb-0 tenantName" id="tenantName0"></h3>' +
          '<div class="mb-1 text-muted tenantCategory" id="tenantCategory0"></div>' +
          '<span class="fa fa-star checked"><span class="fa fa-star checked"></span><span class="fa fa-star checked"></span><span class="fa fa-star checked"></span><span class="fa fa-star checked"></span></span>' +
        '</div>' +
      '</div>';

    var tenantItem = '<form>' +
                    '<div class="row g-0 overflow-hidden flex-md-row mb-4 shadow-sm h-md-170 position-relative tenantSection">'+
                    '<div class="col-auto d-none d-lg-block">'+
                    '<img class="bd-placeholder-img productImage" id="productImage0" width="200" height="200" role="img" aria-label="Placeholder: Thumbnail" preserveAspectRatio="xMidYMid slice" focusable="false"><title>Placeholder</title><rect width="100%" height="100%" fill="#55595c"/></img>'+
                    '</div>'+
                    '<div class="col p-4 d-flex flex-column position-static">'+
                    '<h3 class="mb-0 productName" id="productName0"></h3>'+
                    '<div class="mb-1 text-muted productDeksripsi" id="productDeksripsi0"></div>'+
                    '<div>'+
                    '<p style="font-weight: bold;" class="productPrice" id="productPrice0"><b></b></p>'+
                    '</div>'+
                    '<div class="d-flex justify-content-end">'+
                        '<button type="submit" class="btn btn-success btnProductStyle btnProduct" id="btnProduct0">Tambah ke keranjang</button>'+
                    '</div>'+
                '</form>';
    

      $(document).ready(function() {
            console.log(<?php echo $_SESSION["customerId"]; ?>);
            let response = JSON.stringify(<?php echo $_SESSION["dataProduct"]; ?>);
            console.log(response);
            let data = JSON.parse(response);
            // console.log(data);
            let i = 1;
            data.forEach(row => {
                if (i == 1) {
                    $("#rowTenant").append(tenantDisplay);
                    $("#tenantImage0").attr("id","tenantImage" + i);
                    $("#tenantImage" + i).attr("src", row.TenantIMG);
                    $("#tenantName0").attr("id","tenantName" + i);
                    $("#tenantName" + i).html(row.TenantName); 
                    $("#tenantCategory0").attr("id","tenantCategory" + i);
                    $("#tenantCategory" + i).html(row.TenantCategory);
                }
                $("#product").append(tenantItem);
                $("#productName0").attr("id","productName" + i);
                $("#productName" + i).html(row.ProductName);
                $("#productDeksripsi0").attr("id","productDeksripsi" + i);
                $("#productDeksripsi" + i).html(row.ProductDeksripsi);
                $("#productPrice0").attr("id","productPrice" + i);
                $("#productPrice" + i).html(row.ProductPrice);
                $("#productImage0").attr("id","productImage" + i);
                $("#productImage" + i).attr("src", row.ProductIMG);
                $("#btnProduct0").attr("id","btnProduct" + i);
                $("#btnProduct" + i).attr("value", row.ProductID);
                // console.log($("#product").html());
                i++;
            });

            $('.btnProduct').click(function(e) {
                e.preventDefault();

                let productCart = {
                    productId: $(this).val(),
                    customerId: <?php echo $_SESSION["customerId"] ?>
                };
                addCart(productCart);
            
            });

        });


        function addCart(productId) {
            $.ajax({
                method: "POST",
                url: "database/insertCart.php",
                data: productId,
                success: function(response) {
                    alert(response);
                    // database("database/dataSearchShop.php", response);
                }
            });
        }
            

        
    

    
    </script>
  </body>
</html>
