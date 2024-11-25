<?php 
    include "config.php";
    if(!session_id()){ session_start();}

    //add account
    if(isset($_POST['add-user'])){
        if(!isset($_POST['email']) || empty($_POST['email'])){
            echo json_encode(array('error'=>'Email Field is Empty.')); exit;
        }else{
            $db = new Database();
            $params = [
                'firstName' => $db->escapeString($_POST['firstName']),
                'lastName' => $db->escapeString($_POST['lastName']),
                'email' => $db->escapeString($_POST['email']),
                'username' => $db->escapeString($_POST['username']),
                'password' => $db->escapeString($_POST['password']),
                'role' => $db->escapeString($_POST['role']),
                'createdAt'=>$db->escapeString(date('Y-m-d H:i:s'))
            ];

            $db->select('users','*',null,"email='{$_POST['email']}'",null,null);
            $result = $db->getResult();

            if(!empty($result)){
                echo json_encode(array('error'=>'user already exist.')); exit;
            }else{
                $db->insert('users',$params);
                $response = $db->getResult();
                if(!empty($response)){
                    echo json_encode(array('success'=>$response)); 
                }else{
                    echo json_encode(array('error'=>'User not inserted.'));
                }
            }
        }
    }

    //update role
    if(isset($_POST['update-user'])){
        if(!isset($_POST['email']) || empty($_POST['email'])){
            echo json_encode(array('error'=>'email Field is Empty.')); exit;
        }else{
            $db = new Database();
            $params = [
                'firstName' => $db->escapeString($_POST['firstName']),
                'lastName' => $db->escapeString($_POST['lastName']),
                'email' => $db->escapeString($_POST['email']),
                'username' => $db->escapeString($_POST['username']),
                'password' => $db->escapeString($_POST['password']),
                'role' => $db->escapeString($_POST['role']),
                'updatedAt'=>$db->escapeString(date('Y-m-d H:i:s')),
            ];            

            $db->select('users','*',null,"email='{$_POST['email']}' AND id !='{$_POST['userId']}'",null,null);
            $result = $db->getResult();
            if(!empty($result)){
                echo json_encode(array('error'=>'Email already exist.')); exit;
            }else{
                $db->update('users',$params,"id='{$_POST['userId']}'");
                $response = $db->getResult();
                if(!empty($response)){
                    echo json_encode(array('success'=>$response)); 
                }else{
                    echo json_encode(array('error'=>'Data not updated.'));
                }
            }
        }
    }

    //delete account
    if(isset($_POST['user_delete'])){
        $db = new Database();
        $userId = $db->escapeString($_POST['user_delete']);
        $db->select('users','*',null,"id='{$userId}'",null,null);
        $result = $db->getResult();
        if(!empty($result)){
            $db->delete('users',"id='{$userId}'");
            $response = $db->getResult();
            if(!empty($response)){
                echo json_encode(array('success'=>$response)); exit;
            }else{
                echo json_encode(array('error'=>'Data not deleted.')); exit;
            }
        }
    }



?>