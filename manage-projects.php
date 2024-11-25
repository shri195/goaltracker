<?php $title = "Manage Projects";
include "header.php" ?>
  <div class="message"></div>
  <div class="container">
    <div class="admin-content">
      <div class="card">
        <div class="card-header">
          <h2 class="d-inline">Projects List</h2>
          <a href="add-project.php" class="btn btn-dark float-right">Add New Project</a>
        </div>
        <div class="card-body position-relative">
          <div id="table-data">
            <?php 
              $where = "";
              if(isset($_GET['aid'])) {
                $where = "projects.account = ".$_GET['aid'];
              }
              if(isset($_SESSION['role']) &&  $_SESSION['role'] =="DM"){
                $where .= "projects.deliveryManager = ".$_SESSION['admin_id'];
              }
             $db = new Database();
             $db->select('projects','projects.id as id, projects.name, projects.account, projects.deliveryUnit, projects.remark,  projects.status, delivery_manager.firstName as DMFirst, project_manager.firstName as PMFirst, delivery_manager.lastName as DMLast, project_manager.lastName as PMLast',"users AS delivery_manager ON projects.deliveryManager = delivery_manager.id JOIN users AS project_manager ON projects.projectManager = project_manager.id",$where,'projects.id DESC',null);
             $result = $db->getResult();
            ?>
            <table class="table-data table table-bordered">
              <thead class="thead-light">
                <tr>
                  <th>S.No</th>
                  <th>Name</th>
                  <th>Account</th>
                  <th>DU Name</th>
                  <th>DM Name</th>
                  <th>PM Name</th>
                  <th>Remark</th>
                  <th>Status</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
                <?php 
                  if(count($result) > 0){
                    $i = 0;
                    foreach($result as $row){
                      $i++;
                ?>
                <tr>
                    <td><?php echo $i; ?></td>
                    <td><a href="manage-goal.php?pid=<?php echo $row['id']; ?>"><?php echo $row['name']; ?></a></td>
                    <td>
                    <?php
                    $accountid = $row['account'];
                    $db->select('accounts','name',null,"id=$accountid",null,null);
                    $result1 = $db->getResult();
                    if(!empty($result1)){
                    echo $result1[0]['name'];
                    } ?>
                    </td>
                    <td><?php echo $row['deliveryUnit']; ?></td>
                    <td><?php echo $row['DMFirst'], ' '.$row['DMLast']; ?></td>
                    <td><?php echo $row['PMFirst'], ' '.$row['PMLast']; ?></td>
                    <td><?php echo $row['remark']; ?></td>
                    <td>
                      <?php
                        if($row['status'] == '1'){ ?>
                          <span class="badge badge-success">
                            Active
                          </span>
                      <?php }else{ ?>
                          <span class="badge badge-danger">
                            Inactive
                          </span>
                      <?php } ?>
                    </td>
                    <td>
                        <ul class="action-list">
                          <li><a href="update-project.php?vcid=<?php echo $row['id']; ?>" class="btn btn-primary btn-sm"><img src="images/edit.png" alt=""></a></li>
                          <li><a href="#" data-vcid="<?php echo $row['id']; ?>" class="btn btn-danger btn-sm delete-project"><img src="images/delete.png" alt=""></a></li>
                        </ul>
                    </td>
                </tr>
                <?php 
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
