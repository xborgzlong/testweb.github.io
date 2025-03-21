<?php 

        // fronted purpose data
        define('SITE_URL', 'http://127.0.0.1/2025/My_Project/');
        //define('ABOUT_IMG_PATH', SITE_URL.'images/about/');
        define('CAROUSEL_IMG_PATH', SITE_URL.'images/carousel/');
        //define('FACILITIES_IMG_PATH', SITE_URL.'images/facilities/');
        //define('ROOMS_IMG_PATH', SITE_URL.'images/rooms/');  
    
    
        // backend upload process needs this data.
        define('UPLOAD_IMAGE_PATH', $_SERVER['DOCUMENT_ROOT'].'/2025/My_Project/images/');
        //define('ABOUT_FOLDER', 'about/');
        define('CAROUSEL_FOLDER', 'carousel/');
        //define('FACILITIES_FOLDER', 'facilities/');
        //define('ROOMS_FOLDER', 'rooms/');
        //define('USERS_FOLDER', 'users/');



    // create function adminlogin for use start.
        function adminLogin()
        {
            session_start();
                if (!(isset($_SESSION['adminLogin']) && $_SESSION['adminLogin'] == true))
                {
                    header ("location: index.php");
                        echo "
                            <script>
                                window.location.href='index.php';
                            </script>
                        ";
                }
        }
    // create function adminlogin for use start.


    // create function redirect for use start.
        function redirect($url)
        {
            echo "
                <script>
                    window.location.href='$url';
                </script>
            ";
        }
    // create function redirect for use end.
    


    // creaet function alert for use start.
        function alert($type, $msg)
        {
            $bs_class = ($type == "success") ? "alert-success" : "alert-danger";

            echo <<<alert
                <div class="alert $bs_class alert-dismissible fade show custom-alert" role="alert">
                    <strong class="me-3">$msg</strong>
                    <button type="button" class="btn-close" 
                    data-bs-dismiss="alert" aria-label="Close">
                    </button>
                </div>
            alert;
        }
    // creaet function alert for use end.


    // create function for upload image start.
    function uploadImage($image, $folder) 
    {

        $valid_mime = ['image/jpeg','image/png','image/webp'];
        $img_mime = $image['type'];

        if (!in_array($img_mime, $valid_mime)) {
            return 'inv_img'; // invalid image mime or format.
        } else if ( ($image ['size']/(1024*1024)) > 2 ) {
            return 'inv_size'; // invalid image size greater than 2mb.
        } else {
            $ext = pathinfo($image['name'],PATHINFO_EXTENSION);
            $rname = 'IMG_'.random_int(11111, 99999).".$ext";

            $img_path = UPLOAD_IMAGE_PATH.$folder.$rname;
            if (move_uploaded_file($image['tmp_name'], $img_path)) {
                return $rname;
            } else {
                return 'upd_failed';
            }
        }
    }
    // create function for upload image end.

    // create function for delete image start.
    function deleteImage($image, $folder) 
    {
        if (unlink(UPLOAD_IMAGE_PATH.$folder.$image)) {
            return true;
        } else {
            return false;
        }
    }
    // create function for delete image end.
?>