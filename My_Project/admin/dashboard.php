<!-- Code Php Start include file inc/essentials.php Start -->
<?php
        require ('inc/essentials.php');
        adminLogin();
?>
<!-- Code Php Start include file inc/essentials.php end -->


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel - Dashboard</title>

    <!-- Import the css from boxicon start -->
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <!-- Import the css from boxicon end -->
     
    <!-- Include link bootstrap css 5 for use start -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <!-- Include link bootstrap css 5 for use end -->
    
    <!-- Include file from inc/links.php start -->
        <?php require('inc/links.php'); ?>
    <!-- Include file from inc/links.php end -->

</head>
<body class="bg-light">

<!-- include file from inc/header.php start -->
        <?php require('inc/header.php'); ?>
<!-- include file from inc/header.php end -->

<!-- container-fluid start -->
        <div class="container-fluid" id="main-content">
            <div class="row">
                <div class="col-lg-10 ms-auto p-4 overflow-hidden">
                    Welcome to Admin Dashboard.
                </div>
            </div>
        </div>
<!-- container-fluid end -->
</body>
</html>