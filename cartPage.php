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
    <link rel="stylesheet" href="registerPage.css">
    <script src="https://kit.fontawesome.com/a8b7d392df.js" crossorigin="anonymous"></script>
</head>
<body>
    <div class="container center">
        <div class="logoContainer">
            <h2 class="blog-header-logo text-dark logo" href="">Order Details</h2>
        </div>
        <form>
            <div class="form-group">
                <label for="Email"><b>Shop</b></label><b></b>
                <p id="shopTitle"></p>
            </div>
            <div class="form-group">
                <label for="username"><b>Delivered To</b></label>
                <p id="customerName"></p>
            </div>
            <div class="form-group">
                <label for="alamat"><b>Alamat</b></label>
                <input type="text" class="form-control" name="alamat" id="alamat" placeholder="Masukkan alamat pengiriman" required>
            </div>

            <div class="form-group">
                <ul class="list-group listGroup">
                    <input type="hidden" id="tenantId">
                    <input type="hidden" id="customerId">
                </ul>
            </div>

            <div class='form-group'>
                <div style="float: left; font-weight: bold;">Total:</div>
                <div id="totalPrice" style="float: right; font-weight: bold;"></div>
            </div>
            
            <div style="margin-top: 7rem;" class="buttonCont">
                <input style="width: 20%;" class="btn btn-primary" type="submit" value="Order" id="btnOrder">
            </div>
        </form>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.1.js" integrity="sha256-3zlB5s2uwoUzrXK3BT7AX3FyvojsraNFxCc2vC/7pNI=" crossorigin="anonymous"></script>

    <script>

        let list = '<li class="list-group-item  d-flex justify-content-between align-items-start list0">' +
                        '<p id="productName0"></p>' +
                        '<p id="productCount0"></p>' +
                        '<p id="productTotal0"></p>' +                  
                    '</li>';

        $(document).ready(function() {

            let customer = {
                customerId: <?php echo $_SESSION["customerId"] ?>
            };
            data(customer);
            $('#btnOrder').click(function(e) {
                  e.preventDefault();
                  let order = {
                    tenantId: $("#tenantId").val(),
                    customerId: $("#customerId").val(),
                    customerAddress: $("#alamat").val()
                  };
                  insertOrder(order);
            });
    
        }); 
            
        function data(customer) {
            $.ajax({
                method: "POST",
                url: "database/cartData.php",
                data: customer,
                success: function(response) {
                    console.log(customer);
                    console.log('Submit Status: ', response);
                    getData(response);
                }
            });
        }

        function insertOrder(order){
            $.ajax({
                method: "POST",
                url: "database/insertOrder.php",
                data: order,
                success: function(response) {
                    console.log('Submit Status: ', response);
                    alert(response);
                    location.replace("customerPage.php");
                }
            });
        }

        function getData(response) {
            let data = JSON.parse(response);
            let i = 1;
            let totalPrice = 0;
            data.forEach(row => {
                if(i == 1) {
                    $("#shopTitle").html(row.TenantName);
                    $("#customerName").html(row.CustomerUsername);
                    $("#tenantId").attr("value",row.TenantID);
                    $("#customerId").attr("value",row.CustomerId);
                }
              $(".listGroup").append(list);
              $("#productName0").attr("id","productName" + i);
              $("#productName" + i).html(row.ProductName);
              $("#productCount0").attr("id","productCount" + i);
              $("#productCount" + i).html(row.ProductCount);
              $("#productTotal0").attr("id","productTotal" + i);
              $("#productTotal" + i).html(row.ProductTotal);
              console.log($(".listGroup").html());

              totalPrice += parseInt(row.ProductTotal);


            //   // $(".category" + i).attr("value", row.CategoryName);
            //   console.log($(".category").html());
              i++;
            });
            $("#totalPrice").html(totalPrice);
        }
        
    </script>