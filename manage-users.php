<?php $title = "Manage Users";
include "header.php" ?>
  <div class="message"></div>
  <div class="container">
    <div class="admin-content">
      <div class="card">
        <div class="card-header">
          <h2 class="d-inline">Users List</h2>
          <a href="add-user.php" class="btn btn-dark float-right">Add New User</a>
        </div>
        <div class="card-body position-relative">
          <div id="table-data">
            <?php 
              $db = new Database();
              $db->select('users', '*, users.id as uid', "roles ON users.role = roles.id", null, 'users.id DESC', null);
              $result = $db->getResult();
            ?>
            <table class="table-data table table-bordered">
              <thead class="thead-light">
                <tr>
                  <th>S.No</th>
                  <th>FirstName</th>
                  <th>LastName</th>
                  <th>Email</th>
                  <th>Role</th>
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
                    <td><?php echo $row['firstName']; ?></td>
                    <td><?php echo $row['lastName']; ?></td>
                    <td><?php echo $row['email']; ?></td>
                    <td><?php echo $row['roleName']; ?></td>
                    <td>
                        <ul class="action-list">
                          <li><a href="update-user.php?uid=<?php echo $row['uid']; ?>" class="btn btn-primary btn-sm"><img src="images/edit.png" alt=""></a></li>
                          <li><a href="#" data-uid="<?php echo $row['uid']; ?>" class="btn btn-danger btn-sm delete-user"><img src="images/delete.png" alt=""></a></li>
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
