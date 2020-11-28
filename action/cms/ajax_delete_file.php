<?php
    require_once('../../includes/session.php');
    auth_user('admin', '../../');

    $success = 'Reverted to default image...';
    $already_default = 'Already set to default...';

    if(isset($_GET['file'])) {
        switch ($_GET['file']) {
            case 'bannerhomepage':
                if(file_exists('../../img/banner/index.jpg')) {
                    unlink('../../img/banner/index.jpg');
                    $response = $success;
                    break;
                }
                $response = $already_default;
                break;

            case 'bannercategories':
                if(file_exists('../../img/banner/categories.jpg')) {
                    unlink('../../img/banner/categories.jpg');
                    $response = $success;
                    break;
                }
                $response = $already_default;
                break;

            case 'bannerabout':
                if(file_exists('../../img/banner/about.jpg')) {
                    unlink('../../img/banner/about.jpg');
                    $response = $success;
                    break;
                }
                $response = $already_default;
                break;

            case 'bannercontact':
                if(file_exists('../../img/banner/contact.jpg')) {
                    unlink('../../img/banner/contact.jpg');
                    $response = $success;
                    break;
                }
                $response = $already_default;
                break;

            case 'logo':
                if(file_exists('../../img/branding/custom_logo.jpg')) {
                    unlink('../../img/branding/custom_logo.jpg');
                    $response = $success;
                    break;
                }
                $response = $already_default;
                break;

            case 'favicon':
                if(file_exists('../../img/branding/custom_favicon.jpg')) {
                    unlink('../../img/branding/custom_favicon.jpg');
                    $response = $success;
                    break;
                }
                $response = $already_default;
                break;
            
            default:
                $response = "invalid filename!";
                break;
        }

        echo($response);
    }
?>