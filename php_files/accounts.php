<?php 
    include "config.php";
    if(!session_id()){ session_start();}
    //add account
    if(isset($_POST['add-account'])){
        if(!isset($_POST['cat_name']) || empty($_POST['cat_name'])){
            echo json_encode(array('error'=>'Account Name Field is Empty.')); exit;
        }else{
            $db = new Database();

            $params = [
                'name' => $db->escapeString($_POST['cat_name']),
                'status' => $db->escapeString($_POST['cat_status']),
                'createdAt'=>$db->escapeString(date('Y-m-d H:i:s')),
                'createdBy'=>$db->escapeString($_SESSION['admin_id']),
            ];

            $db->select('accounts','name',null,"name='{$_POST['cat_name']}'",null,null);
            $result = $db->getResult();
            if(!empty($result)){
                echo json_encode(array('error'=>'Account Name is already exist.')); exit;
            }else{
                $db->insert('accounts',$params);
                $response = $db->getResult();
                if(!empty($response)){
                    echo json_encode(array('success'=>$response)); 
                }else{
                    echo json_encode(array('error'=>'Data not inserted.'));
                }
            }
        }
    }

    //update account
    if(isset($_POST['update-account'])){
        if(!isset($_POST['cat_name']) || empty($_POST['cat_name'])){
            echo json_encode(array('error'=>'Account Name Field is Empty.')); exit;
        }else{
            $db = new Database();

            $params = [
                'id' => $db->escapeString($_POST['cat_id']),
                'name' => $db->escapeString($_POST['cat_name']),
                'status' => $db->escapeString($_POST['cat_status']),
                'modifiedAt'=>$db->escapeString(date('Y-m-d H:i:s')),
                'modifiedBy'=>$db->escapeString($_SESSION['admin_id']),
            ];

            $db->select('accounts','name',null,"name='{$_POST['cat_name']}' AND id !='{$_POST['cat_id']}'",null,null);
            $result = $db->getResult();
            if(!empty($result)){
                echo json_encode(array('error'=>'Account Name is already exist.')); exit;
            }else{
                $db->update('accounts',$params,"id='{$_POST['cat_id']}'");
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
    if(isset($_POST['cat_delete'])){
        $db = new Database();

        $cat_id = $db->escapeString($_POST['cat_delete']);
        $db->select('projects','*',null,"account='{$cat_id}'",null,null);
        $result = $db->getResult();
        if(!empty($result)){
            echo json_encode(array('error'=>'Can not delete account record this is used in project.'));
        }else{  
            $db->delete('accounts',"id='{$cat_id}'");
            $response = $db->getResult();
            if(!empty($response)){
                echo json_encode(array('success'=>$response)); exit;
            }else{
                echo json_encode(array('error'=>'Data not deleted.')); exit;
            }
        }
    }



?>