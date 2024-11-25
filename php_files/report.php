<?php 
    include "config.php";
    $db = new Database();
    if(isset($_POST['type']) && $_POST['type'] != ''){
        $search_type = $_POST['type'];
        $from_date = date('Y-m-d H:i:s', strtotime($_POST['from_date']));   
        $to_date = date('Y-m-d H:i:s', strtotime($_POST['to_date']));
        $where = "(goals.createdAt >='{$from_date}' AND goals.createdAt <='{$to_date}') OR (goals.smEndDate >='{$from_date}' AND goals.smEndDate <='{$to_date}')";
        if($search_type == 'all'){
            $where .= '';
        }

        $db->select('goals','*',null,$where,null,null);
        $result = $db->getResult();
        $output = [];
        foreach($result as $row){
            $projectid = $row['project'];
            $projectName = $dmName = "";
            $db->select('projects','name, deliveryManager, firstName, lastName',"users ON projects.deliveryManager=users.id","projects.id=$projectid",null,null);
            $result1 = $db->getResult();
            if(!empty($result1)){
                $projectName = $result1[0]['name'];
                $dmName = $result1[0]['firstName'].' '.$result1[0]['lastName'];
            }
            $row['project'] = '<span>'.$projectName.'</span>';
            $row['sprintReleaseName'] = '<span>'.$row['sprintReleaseName'].'</span>';
            $row['createdAt'] = '<span>'.$row['createdAt'].'</span>';
            $row['dmName'] = '<span>'.$dmName.'</span>';
            switch($row['goalStatus']) {
                case 1:
                    $gstatus = 'Initiated';
                    $gcolor = 'badge-warning';
                    break;
                case 2:
                    $gstatus = 'In Progress';
                    $gcolor = 'badge-info';
                    break;
                case 3:
                    $gstatus = 'In Review';
                    $gcolor = 'badge-success';
                    break;
                case 4:
                    $gstatus = 'In Closure';
                    $gcolor = 'badge-dark';
                    break;
                case 0:
                    $gstatus = 'Defaulter';
                    $gcolor = 'badge-danger';
                    break;
                default:
                    break;
            }
            $row['goalStatus'] = '<span class="badge '.$gcolor.'">'.$gstatus.'</span>';
            
            array_push($output,$row);
        }

        $dataset = array(
            "totalrecords" => count($result),
            "totaldisplayrecords" => count($result),
            "data" => $output,
        );
        echo json_encode($dataset); exit;
    }

?>