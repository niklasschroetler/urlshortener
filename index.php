<?php
    include 'db.php';

    if($debug) {
        ini_set('display_errors', 1); ini_set('display_startup_errors', 1); error_reporting(E_ALL);
    }

    $db = mysqli_connect($DB_SERVER, $DB_USERNAME, $DB_PASSWORD, $DB_NAME);
    if (!$db) {
        header("Location: ".$CONNECTION_UNSUCCESSFUL_TARGET);
        die;
    }

    $slug = substr($_SERVER['REQUEST_URI'], 1);

    if($slug == "") {
        header("Location: ".$EMPTY_TARGET);
    }
    else {
        if ($urldata = mysqli_query($db, "SELECT * FROM `".$DB_PREFIX."urls` WHERE `slug` LIKE '".$slug."' LIMIT 1")) {
            if($urldata -> num_rows == 0) {
                header("Location: ".$LOOKUP_UNSUCCESSFUL_TARGET);
                die;
            } else {
                $res = ($urldata -> fetch_row());

                $status = $res[2];
                $url = $res[3];
                
                echo PHP_EOL."Status: ".$status.", Target: ".$url;

                switch ($status) {
                    case "active":
                        header("Location: ".$url);
                        break;
                    case "tempdisabled":
//                        header("Location: ".$TEMPDISABLED_TARGET);
                        break;
                    case "removed":
//                        header("Location: ".$REMOVED_TARGET);
                        break;
                    default:
//                        header("Location: ".$LOOKUP_UNSUCCESSFUL_TARGET);
                        break;
                }
            }
        }
        else {
            header("Location: ".$INTERNAL_ERROR_TARGET);
        }
    }

    mysqli_close($db);
?>