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
              $db = new Database();
              $db->select('projects','*',null,null,'projects.id DESC',null);
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
