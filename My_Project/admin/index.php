<!-- Code PHP Start -->
 <?php 
        require ('inc/essentials.php'); // Call this for show alert message.
        require ('inc/db_config.php');  // Call this for connect to database.

        // make this for catch adminlogin start.
            session_start();
                if ((isset($_SESSION['adminLogin']) && $_SESSION['adminLogin'] == true))
                {
                    redirect('dashboard.php');
                }
        // make this for catch adminlogin end.
 ?>
<!-- Code PHP End -->


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login Panel</title>

    <!-- Code Php link form inc/links.php Start -->
        <?php require('inc/links.php') ?>
    <!-- Code Php link form inc/links.php end -->

    <!-- Create Style CSS Start -->
        <style>
            div.login-form
            {
                position: absolute;
                top: 50%;
                left : 50%;
                transform: translate(-50%, -50%);
                width: 400px;
            }
        </style>
    <!-- Create Style CSS End -->

</head>
<body class="bg-light">
        <!-- Create Form_Login Start -->
            <div class="login-form text-center rounded bg-white shadow overflow-hidden">
                <form  method="POST">
                    <h4 class="bg-dark text-white py-3">Admin LOGIN PANEL</h4>
                        <div class="p-4">
                            <div class="mb-3">
                                <input 
                                   type = "text" 
                                   name = "admin_name"
                                   require 
                                   class = "
                                    form-control
                                    shadow-none
                                    text-center 
                                   "
                                   placeholder = "Admin Name"
                                />
                            </div>
                            <div class="mb-4">
                                <input 
                                    type = "text"
                                    name = "admin_pass"
                                    require
                                    class = "
                                        form-control
                                        shadow-none
                                        text-center
                                    "
                                    placeholder = "Admin Pass"
                                />
                            </div>
                            <button 
                                type = "submit"
                                name = "login"
                                class = " 
                                    btn
                                    text-white
                                    custom-bg
                                    shadow-none
                                "
                            
                            >
                                LOGIN
                            </button>
                        </div>
                </form>
            </div>
        <!-- Create Form_Login End -->


        <!-- User Admin Login Start -->
          <!-- Code PHP Start -->
                <?php 
                    if (isset($_POST['login']))
                    {
                        $frm_data = filteration($_POST);

                        $query = " SELECT * FROM `tbl_admin_login`
                        WHERE `admin_name`=? AND `admin_pass`=? ";
                        $values = [
                            $frm_data['admin_name'],
                            $frm_data['admin_pass']
                        ];
                        $datatypes = "ss";

                        $res = select ($query, $values, "ss");

                            // check conditional start.
                                if ( $res -> num_rows == 1) 
                                {
                                    $row = mysqli_fetch_assoc($res);

                                    $_SESSION ['adminLogin'] = true;
                                    $_SESSION ['adminId'] = $row['sr_no'];
                                    redirect('dashboard.php');
                                }
                                else
                                {
                                    alert ('error', 'Login failed - Invalid Credentials');
                                }
                            // check conditional end.
                    }
                ?>
          <!-- Code PHP End -->
        <!-- User Admin Login End -->


        <!-- Include link from foler inc/links.php start -->
                <?php require('inc/scripts.php') ?>
        <!-- Include link from foler inc/links.php end -->
</body>
</html>