<?php 
    include "config.php";
    if(!session_id()){ session_start();}

    //add account
    if(isset($_POST['add-role'])){
        if(!isset($_POST['roleName']) || empty($_POST['roleName'])){
            echo json_encode(array('error'=>'Role Name Field is Empty.')); exit;
        }else{
            $db = new Database();

            $params = [
                'roleName' => $db->escapeString($_POST['roleName']),
                'shortName' => $db->escapeString($_POST['shortName']),
                'createdAt'=>$db->escapeString(date('Y-m-d H:i:s')),
                'createdBy'=>$db->escapeString($_SESSION['admin_id']),
            ];

            $db->select('roles','roleName',null,"roleName='{$_POST['roleName']}'",null,null);
            $result = $db->getResult();
            if(!empty($result)){
                echo json_encode(array('error'=>'Role Name is already exist.')); exit;
            }else{
                $db->insert('roles',$params);
                $response = $db->getResult();
                if(!empty($response)){
                    echo json_encode(array('success'=>$response)); 
                }else{
                    echo json_encode(array('error'=>'Data not inserted.'));
                }
            }
        }
    }

    //update role
    if(isset($_POST['update-role'])){
        if(!isset($_POST['roleName']) || empty($_POST['roleName'])){
            echo json_encode(array('error'=>'Account Name Field is Empty.')); exit;
        }else{
            $db = new Database();
            $params = [
                'id' => $db->escapeString($_POST['roleId']),
                'roleName' => $db->escapeString($_POST['roleName']),
                'shortName' => $db->escapeString($_POST['shortName'])
            ];

            $db->select('roles','roleName',null,"roleName='{$_POST['roleName']}' AND id !='{$_POST['roleId']}'",null,null);
            $result = $db->getResult();
            if(!empty($result)){
                echo json_encode(array('error'=>'Role Name is already exist.')); exit;
            }else{
                $db->update('roles',$params,"id='{$_POST['roleId']}'");
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
    if(isset($_POST['role_delete'])){
        $db = new Database();
        $role_id = $db->escapeString($_POST['role_delete']);
        $db->select('roles','*',null,"id='{$role_id}'",null,null);
        $result = $db->getResult();
        if(!empty($result)){
            $db->delete('roles',"id='{$role_id}'");
            $response = $db->getResult();
            if(!empty($response)){
                echo json_encode(array('success'=>$response)); exit;
            }else{
                echo json_encode(array('error'=>'Data not deleted.')); exit;
            }
        }
    }



?>