<?php 
    include "config.php";

    //admin login script
    if(isset($_POST['login'])){
        if(!isset($_POST['name']) || empty($_POST['name'])){
            echo json_encode(array('error'=>'Username empty')); exit;
        }else if(!isset($_POST['pass']) || empty($_POST['pass'])){
            echo json_encode(array('error'=>'Password empty')); exit;
        }else{

            $db = new Database();
            $username = $db->escapeString($_POST['name']);
            //$password = md5($db->escapeString($_POST['pass']));
            $password =$_POST['pass'];
            $db->select('users','users.id, users.firstName, users.lastName, roles.shortName as shortName, roles.id as roleId',"roles ON users.role = roles.id","username = '$username' AND password = '$password'",null,0);

            $result = $db->getResult();
            if(!empty($result)){
                /* start session */
                session_start();
                /* set session variable */
                $_SESSION['admin_fullname'] = $result[0]['firstName']. ' ' . $result[0]['lastName'];
                $_SESSION['admin_id'] = $result[0]['id'];
                $_SESSION['role'] = $result[0]['shortName'];
                $_SESSION['roleId'] = $result[0]['roleId'];
                $_SESSION['loggedInUsersId'] = $result[0]['id'];
                echo json_encode(array('success'=>'true')); exit;
            }else{
                echo json_encode(array('error'=>'false')); exit;
            }
        }
    }

    //admin logout script
    if(isset($_POST['logout'])){
        /* session start */
        session_start();
        /* remove all session variable */
        session_unset();
        /* destroy the session */
        session_destroy();

        echo '1'; exit;
    }
?>
