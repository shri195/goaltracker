<?php 
    include "config.php";
    if(!session_id()){ session_start();}
    //add goal
    if(isset($_POST['add-goal'])){
        if(!isset($_POST['name']) || empty($_POST['name'])){
            echo json_encode(array('error'=>'Goal Name Field is Empty.')); exit;
        }else{
            $db = new Database();

            $params = [
                'project'=>$db->escapeString($_POST['project']),
                'name'=>$db->escapeString($_POST['name']),
                'sprintReleaseName'=>$db->escapeString($_POST['sprintReleaseName']),
                'smStartDate'=>$db->escapeString($_POST['smStartDate']),
                'smEndDate'=>$db->escapeString($_POST['smEndDate']),
                'scaStatus'=>$db->escapeString($_POST['scaStatus']),
                'codeReview'=>$db->escapeString($_POST['codeReview']),
                'utsRatio'=>$db->escapeString($_POST['utsRatio']),
                'utcCount'=>$db->escapeString($_POST['utcCount']),
                'codeCoverage'=>$db->escapeString($_POST['codeCoverage']),
                'dmInjection'=>$db->escapeString($_POST['dmInjection']),
                'dmDefects'=>$db->escapeString($_POST['dmDefects']),
                'dmDER'=>$db->escapeString($_POST['dmDER']),
                'dmRegressionDefects'=>$db->escapeString($_POST['dmRegressionDefects']),
                'dmReopenDefects'=>$db->escapeString($_POST['dmReopenDefects']),
                'bvtSanityRatio'=>$db->escapeString($_POST['bvtSanityRatio']),
                'performanceLoadingTime'=>$db->escapeString($_POST['performanceLoadingTime']),
                'defaultSecurityCount'=>$db->escapeString($_POST['defaultSecurityCount']),
                'functionalTestCoverage'=>$db->escapeString($_POST['functionalTestCoverage']),
                'functionalTestCaseCount'=>$db->escapeString($_POST['functionalTestCaseCount']),
                'functionTestRatio'=>$db->escapeString($_POST['functionTestRatio']),
                'sprintSuccessRatio'=>$db->escapeString($_POST['sprintSuccessRatio']),
                'sprintVelocity'=>$db->escapeString($_POST['sprintVelocity']),
                'dmdhNotes'=>$db->escapeString($_POST['dmdhNotes']),
                'qnNotes'=>$db->escapeString($_POST['qnNotes']),
                'goalStatus'=>$db->escapeString($_POST['goalStatus']),
                'goaETA'=>$db->escapeString($_POST['goaETA']),
                'isLatest'=>$db->escapeString(1),
                'createdAt'=>$db->escapeString(date('Y-m-d H:i:s')),
                'createdBy'=>$db->escapeString($_SESSION['admin_id']),
            ];

            $db->insert('goals',$params);
            $response = $db->getResult();
            if(!empty($response)){
                echo json_encode(array('success'=>'1')); 
            }else{
                echo json_encode(array('error'=>'Data not inserted.'));
            }
        }
    }

    //update goal
    if(isset($_POST['update-goal'])){
        if(!isset($_POST['name']) || empty($_POST['name'])){
            echo json_encode(array('error'=>'Goal Name Field is Empty.')); exit;
        }else{

            $db = new Database();

            $params = [
                'id' => $db->escapeString($_POST['cat_id']),
                'project'=>$db->escapeString($_POST['project']),
                'name'=>$db->escapeString($_POST['name']),
                'sprintReleaseName'=>$db->escapeString($_POST['sprintReleaseName']),
                'smStartDate'=>$db->escapeString($_POST['smStartDate']),
                'smEndDate'=>$db->escapeString($_POST['smEndDate']),
                'scaStatus'=>$db->escapeString($_POST['scaStatus']),
                'codeReview'=>$db->escapeString($_POST['codeReview']),
                'utsRatio'=>$db->escapeString($_POST['utsRatio']),
                'utcCount'=>$db->escapeString($_POST['utcCount']),
                'codeCoverage'=>$db->escapeString($_POST['codeCoverage']),
                'dmInjection'=>$db->escapeString($_POST['dmInjection']),
                'dmDefects'=>$db->escapeString($_POST['dmDefects']),
                'dmDER'=>$db->escapeString($_POST['dmDER']),
                'dmRegressionDefects'=>$db->escapeString($_POST['dmRegressionDefects']),
                'dmReopenDefects'=>$db->escapeString($_POST['dmReopenDefects']),
                'bvtSanityRatio'=>$db->escapeString($_POST['bvtSanityRatio']),
                'performanceLoadingTime'=>$db->escapeString($_POST['performanceLoadingTime']),
                'defaultSecurityCount'=>$db->escapeString($_POST['defaultSecurityCount']),
                'functionalTestCoverage'=>$db->escapeString($_POST['functionalTestCoverage']),
                'functionalTestCaseCount'=>$db->escapeString($_POST['functionalTestCaseCount']),
                'functionTestRatio'=>$db->escapeString($_POST['functionTestRatio']),
                'sprintSuccessRatio'=>$db->escapeString($_POST['sprintSuccessRatio']),
                'sprintVelocity'=>$db->escapeString($_POST['sprintVelocity']),
                'dmdhNotes'=>$db->escapeString($_POST['dmdhNotes']),
                'qnNotes'=>$db->escapeString($_POST['qnNotes']),
                'goalStatus'=>$db->escapeString($_POST['goalStatus']),
                'goaETA'=>$db->escapeString($_POST['goaETA']),
                'modifiedAt'=>$db->escapeString(date('Y-m-d H:i:s')),
                'modifiedBy'=>$db->escapeString($_SESSION['admin_id']),
            ];

            $db->update('goals',$params,"id='{$_POST['cat_id']}'");
            $response = $db->getResult();
            if(!empty($response)){
                echo json_encode(array('success'=>$response));
            }else{
                echo json_encode(array('error'=>'Data not updated.'));
            }
        }
    } 

//delete account
if(isset($_POST['cat_delete'])){
    $db = new Database();

    $cat_id = $db->escapeString($_POST['cat_delete']);
    $db->delete('goals',"id='{$cat_id}'");
    $response = $db->getResult();
    if(!empty($response)){
        echo json_encode(array('success'=>$response)); exit;
    }else{
        echo json_encode(array('error'=>'Data not deleted.')); exit;
    }
}
?>