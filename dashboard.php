<?php $title = "Dashboard";
include "header.php";
?>
<div class="admin-content">
  <div class="container">
    <div id="admin-dashboard">
        <div class="row">
            <div class="col-md-3">
              <?php 
                $db = new Database();

                $db->sql("SELECT COUNT(*) AS tot_project FROM projects;");
                $result = $db->getResult();
                if(!empty($result)){
                  foreach($result as $row){
              ?>
              <div class="card young-passion-gradient">
                <div class="card-body text-center">
                  <span class="icon"><i class="fas fa-taxi"></i></span>
                  <p class="card-text mb-3"><?php echo $row['tot_project']; ?></p>
                  <h6 class="card-title text-white mb-0">Total # Projects</h6>
                </div>
              </div>
              <?php 
                  }
                }
              ?>
            </div>
            <div class="col-md-3">
              <?php 
                $db = new Database();

                $db->sql("SELECT COUNT(*) AS ini_goal FROM goals WHERE goalStatus=1;");
                $result = $db->getResult();
                if(!empty($result)){
                  foreach($result as $row){
              ?>
              <div class="card young-passion-gradient1">
                <div class="card-body text-center">
                  <span class="icon"><i class="fas fa-taxi"></i></span>
                  <p class="card-text mb-3"><?php echo $row['ini_goal']; ?></p>
                  <h6 class="card-title text-white mb-0">Initiated Goal Tracker</h6>
                </div>
              </div>
              <?php 
                  }
                }
              ?>
            </div>
            <div class="col-md-3">
              <?php 
                $db = new Database();

                $db->sql("SELECT COUNT(*) AS review_goal FROM goals WHERE goalStatus=3");
                $result = $db->getResult();
                if(!empty($result)){
                  foreach($result as $row){
              ?>
              <div class="card green-gradient">
                <div class="card-body text-center">
                  <span class="icon"><i class="fas fa-file"></i></span>
                  <p class="card-text mb-3"><?php echo $row['review_goal']; ?></p>
                  <h6 class="card-title text-white mb-0">In Review Goal Tracker</h6>
                </div>
              </div>
              <?php 
                  }
                }
              ?>
            </div>
            <div class="col-md-3">
              <?php 
                $db = new Database();

                $db->sql("SELECT COUNT(*) AS closure_goal FROM goals WHERE goalStatus=4");
                $result = $db->getResult();
                if(!empty($result)){
                  foreach($result as $row){
              ?>
              <div class="card peach-gradient">
                <div class="card-body text-center">
                  <span class="icon"><i class="fas fa-taxi"></i></span>
                  <p class="card-text mb-3"><?php echo $row['closure_goal']; ?></p>
                  <h6 class="card-title text-white mb-0">In Closure Goal Tracker</h6>
                </div>
              </div>
              <?php 
                  }
                }
              ?>
            </div>

        </div>
    </div>
    <?php if($_SESSION['admin_id'] != 3) { ?>
    <div class="row">
      <div class="col-md-12">
        <div class="card mt-4">
          <div class="card-header">
            <h2>Latest Projects</h2>
          </div>
          <div class="card-body table-responsive">
            <?php 
              $db = new Database();
              $db->select('projects','*',null,"status=1","projects.id DESC","5");
              $result = $db->getResult();
            ?>
            <table class="table table-bordered">
              <thead>
                <th>S.No</th>
                <th>Name</th>
                <th>Account</th>
                <th>DU Name</th>
                <th>DM Name</th>
                <th>PM Name</th>
                <th>Remark</th>
                <th>Status</th>
                <th>Action</th>
              </thead>
              <tbody>
                <?php if(isset($result) && !empty($result)){
                  $i=0;
                  foreach($result as $row){
                    $i++;
                ?>
               <tr class='tr-shadow'>
                    <td><?php echo $i; ?></td>
                    <td><?php echo $row['name']; ?></td>
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
                    <td><?php echo $row['deliveryManager']; ?></td>
                    <td><?php echo $row['projectManager']; ?></td>
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
                }else{ ?>
                <tr>
                  <td colspan="6" align="center">No Record Found.</td>
                </tr>
                <?php } ?>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
    <?php } ?>
  </div>
</div>
<?php include "footer.php" ?>
