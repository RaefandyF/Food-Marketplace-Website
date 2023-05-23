<?php
session_start();

if(!isset($_SESSION["usernameCustomer"])) {
    header("location:loginPage.php");
}
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
    <link rel="stylesheet" href="guestPage.css">
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
        <p style="margin: 0px 10px 0 5px;" class="adminText"><?php echo $_SESSION["usernameCustomer"]?></p>
        <a href="logout.php">Logout</a>
      </div>
      <div>
        <a href="cartPage.php"><i class="fa-solid fa-cart-shopping"></i></a>
    </div>
    </div>
  </header>

  <div class="nav-scroller py-1 mb-2">
    <nav class="nav d-flex justify-content-center category">
    </nav>
  </div>
</div>

<main class="container">
  <div class="row mb-2 rowTenant">
    </div>
  </div>
</main>

    <script src="https://code.jquery.com/jquery-3.6.1.js" integrity="sha256-3zlB5s2uwoUzrXK3BT7AX3FyvojsraNFxCc2vC/7pNI=" crossorigin="anonymous"></script>
    
    <!-- data tenant -->
<script>
      var tenantDisplay = 
    '<form>'+
        '<div class="col-md-12">' +
        '<div class="row g-0 border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative tenantSection">' +
            '<div class="col-auto d-none d-lg-block">' +
            '<img class="bd-placeholder-img tenantImage" id="tenantImage0" width="200" height="250" role="img" aria-label="Placeholder: Thumbnail" preserveAspectRatio="xMidYMid slice" focusable="false"><title>Placeholder</title><rect width="100%" height="100%" fill="#55595c"/></img>' +
            '</div>' +
            '<div class="col p-4 d-flex flex-column position-static">' +
            '<h3 type="hidden" class="mb-0 tenantName" id="tenantName0"></h3>' +
            '<div class="mb-1 text-muted tenantCategory" id="tenantCategory0"></div>' +
            '<span class="fa fa-star checked"><span class="fa fa-star checked"></span><span class="fa fa-star checked"></span><span class="fa fa-star checked"></span><span class="fa fa-star checked"></span></span>' +
            '<div style="margin-top: 5rem;" class="d-flex justify-content-end align-items-end">'+
                '<button type="submit" class="btn btn-success btnProductStyle btnPilih" id="tenantId0">Pilih Tenant</button>'+
            '</div>'+
            '</div>' +
        '</div>'+
    '</form>';
      var categoryID = '<button class="btn btn-outline-light" type="submit"><a class="p-2 link-secondary" id="category0" href="#"></a></button>';

      $(document).ready(function() {
        database("database/data.php", "");
      });

      $('#btnSearch').click(function(e) {
            e.preventDefault();
            console.log("Hello");
            let searchs = {
              searchInput: $('#searchInput').val()
            };
            // url = "dataSearchShop.php";
            search(searchs);
      });


      // $(document).ready(function () {
        function database(url, responses) {
          $.ajax({
            method: "GET",
            url: url,
            success: function(response) {
              let data = null;
              if(url === "database/data.php") {
                data = JSON.parse(response);
              } else {
                data = JSON.parse(responses);
              }
              console.log(data);
              $('.rowTenant').html("");
              // let column = $(".rowTenant").html();
              let i = 1;
              data.forEach(row => {
                // Tenant data
                $(".rowTenant").append(tenantDisplay);
                $("#tenantName0").attr("id", "tenantName" + i);
                $("#tenantName" + i).html(row.TenantName);
                $("#tenantCategory0").attr("id", "tenantCategory" + i);
                $("#tenantCategory" + i).html(row.TenantCategory);
                $("#tenantImage0").attr("id", "tenantImage" + i);
                $("#tenantImage" + i).attr("src" ,row.TenantIMG);
                $("#tenantId0").attr("id", "tenantId" + i);
                $("#tenantId" + i).attr("value", row.TenantID);
                i++;
              });

                $('.btnPilih').click(function(e) {
                    e.preventDefault();

                    let tenant = {
                        tenantId: $(this).val(),
                        customerId: <?php echo $_SESSION["customerId"] ?>
                    };
                    pilihTenant(tenant);                    
                });
              
            }
          });
        };
      // });

  <!-- data category -->
      $.ajax({
          method: "GET",
          url: "database/dataCategory.php",
          success: function(response) {
            let data = JSON.parse(response);
            // console.log(data);
            let i = 1;
            data.forEach(row => {
              $(".category").append(categoryID);
              $("#category0").attr("id","category" + i);
              $("#category" + i).html(row.CategoryName);
              // $(".category" + i).attr("value", row.CategoryName);
              console.log($(".category").html());
              i++;
            });

            $('#category1').click(function(e) {
              e.preventDefault();
              let category = {
                categoryInput: $("#category1").text()
              };
              categorySearch(category);
            });
            $('#category2').click(function(e) {
              e.preventDefault();
              let category = {
                categoryInput: $("#category2").text()
              };
              categorySearch(category);
            });
            $('#category3').click(function(e) {
              e.preventDefault();
              let category = {
                categoryInput: $("#category3").text()
              };
              categorySearch(category);
            });



          }
        });

    
      function search(searchInput) {
          $.ajax({
              method: "POST",
              url: "database/dataSearchShop.php",
              data: searchInput,
              success: function(response) {
                  console.log(searchInput);
                  console.log('Submit Status: ', response);
                  database("database/dataSearchShop.php", response);
              }
          });
        }

      function categorySearch(category) {
        $.ajax({
          method: "POST",
          url: "database/dataSearchCategory.php",
          data: category,
          success: function(response) {
              // console.log('Submit Status: ', response);
              database("database/dataSearchCategory.php", response);
          }
      });
      }

      function pilihTenant(tenantId) {
        $.ajax({
          method: "POST",
          url: "database/shopData.php",
          data: tenantId,
          success: function(response) {
              console.log('Submit Status: ', response);
              location.replace("shopPage.php");
            //   database("database/dataSearchCategory.php", response);
          }
      });
      }
    </script>
  </body>
</html>
