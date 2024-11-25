<?php $title = "Goal Tracker";
include "header.php" ?>
  <div class="message"></div>
  <div class="container">
    <div class="admin-content">
      <div class="card">
        <div class="card-header">
          <h2 class="d-inline">Goal Tracker List</h2>
          <a href="add-goal.php" class="btn btn-dark float-right">Add New Goal Tracker</a>
        </div>
        <div class="card-body position-relative">
          <div id="table-data">
            <?php 
              $where = "";
              if(isset($_GET['pid'])) {
                $where = "goals.project = ".$_GET['pid'];
              }
              $join = "";
              if(isset($_SESSION['role']) &&  $_SESSION['role'] =="DM"){
                $join = " projects ON goals.project = projects.id AND projects.deliveryManager = ".$_SESSION['admin_id'];
              }
              $db = new Database();
              $db->select('goals','*',$join,$where,'goals.id DESC',null);
              $result = $db->getResult();
            ?>
            <table class="table-data table table-bordered">
              <thead class="thead-light">
                <tr>
                  <th>S.No</th>
                  <th>Project Name</th>
                  <th>Goal Name</th>
                  <th>Sprint/Release Name</th>
                  <th>S/M Start Date</th>
                  <th>S/M End Date</th>
                  <th>Status</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
                <?php 
                  if(count($result) > 0){
                    $i = 0;
                    foreach($result as $row){
                    if(isset($row['id']) && $row['isLatest'] == '1'){
                      $i++;
                ?>
                <tr>
                    <td><?php echo $i; ?></td>
                    <td>
                    <?php
                    $projectid = $row['project'];
                    $db->select('projects','name',null,"id=$projectid",null,null);
                    $result1 = $db->getResult();
                    if(!empty($result1)){
                    echo $result1[0]['name'];
                    } ?>
                    </td>
                    <td><?php echo $row['name']; ?></td>
                    <td><?php echo $row['sprintReleaseName']; ?></td>
                    <td><?php echo date('d-m-Y', strtotime($row['smStartDate'])); ?></td>
                    <td><?php echo date('d-m-Y', strtotime($row['smEndDate'])); ?></td>
                    <td>
                    <?php
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
                    ?>
                    <span class="badge <?php echo $gcolor; ?>"><?php echo $gstatus; ?></span>
                    </td>
                    <td>
                        <ul class="action-list">
                          <li><a href="update-goal.php?vcid=<?php echo $row['id']; ?>" class="btn btn-primary btn-sm"><img src="images/edit.png" alt=""></a></li>
                          <li><a href="#" data-vcid="<?php echo $row['id']; ?>" class="btn btn-danger btn-sm delete-goal"><img src="images/delete.png" alt=""></a></li>
                        </ul>
                    </td>
                </tr>
                <?php 
                    }
                    }
                  }
                ?>
              </tbody>
           </table>
          </div>
        </div>
      </div>
    </div>
  </div>

<?php include "footer.php" ?>
