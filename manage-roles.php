<?php $title = "Manage Roles";
include "header.php" ?>
  <div class="message"></div>
  <div class="container">
    <div class="admin-content">
      <div class="card">
        <div class="card-header">
          <h2 class="d-inline">Roles List</h2>
          <a href="add-role.php" class="btn btn-dark float-right">Add New Role</a>
        </div>
        <div class="card-body position-relative">
          <div id="table-data">
            <?php 
              $db = new Database();
              $db->select('roles','*',null,null,'roles.id DESC',null);
              $result = $db->getResult();
            ?>
            <table class="table-data table table-bordered">
              <thead class="thead-light">
                <tr>
                  <th>S.No</th>
                  <th>Role Name</th>
                  <th>Short Name</th>
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
                    <td><a href="manage-roles.php?rid=<?php echo $row['id']; ?>"><?php echo $row['roleName']; ?></a></td>
                    <td><?php echo $row['shortName']; ?></td>
                    <td>
                        <ul class="action-list">
                          <li><a href="update-role.php?rid=<?php echo $row['id']; ?>" class="btn btn-primary btn-sm"><img src="images/edit.png" alt=""></a></li>
                          <li><a href="#" data-rid="<?php echo $row['id']; ?>" class="btn btn-danger btn-sm delete-role"><img src="images/delete.png" alt=""></a></li>
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
