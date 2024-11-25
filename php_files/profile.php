<?php 
    include "config.php";

    //update profile script
    if(isset($_POST['update-profile'])){
        $db = new Database();
        if(!isset($_POST['admin_id']) || empty($_POST['admin_id'])){
            echo json_encode(array('error'=>'Admin Id is missing.')); exit;
        }else if(!isset($_POST['firstName']) || empty($_POST['firstName'])){
            echo json_encode(array('error'=>'First Name filed is missing.')); exit;
        }else if(!isset($_POST['lastName']) || empty($_POST['lastName'])){
            echo json_encode(array('error'=>'Last Name filed is missing.')); exit;
        }else if(!isset($_POST['email']) || empty($_POST['email'])){
            echo json_encode(array('error'=>'Email filed is missing.')); exit;
        }else if(!isset($_POST['username']) || empty($_POST['username'])){
            echo json_encode(array('error'=>'Username filed is missing.')); exit;
        }else{
            if(isset($_POST['new_password']) && !empty($_POST['new_password'])){
                $password = $db->escapeString($_POST['new_password']);
            }else{
                $password = $db->escapeString($_POST['old_password']);
            }

            $params = [
                'firstName' => $db->escapeString($_POST['firstName']),  
                'lastName' => $db->escapeString($_POST['lastName']),  
                'email' => $db->escapeString($_POST['email']),  
                'username' => $db->escapeString($_POST['username']),  
                'password' => $password,  
            ];

            $db->update('users',$params,"id='{$_POST['admin_id']}'");
            $result = $db->getResult();
            if(!empty($result)){
                if(isset($_POST['new_password']) && !empty($_POST['new_password'])){
                    /* session start */
                    session_start();
                    /* remove all session variable */
                    session_unset();
                    /* destroy the session */
                    session_destroy();
                    echo json_encode(array('login'=>'1'));
                }else{
                    echo json_encode(array('success'=>'1')); exit;
                }
            }
        }
    }

?>