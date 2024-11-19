<?php $title = "Manage Accounts";
include "header.php" ?>
  <div class="message"></div>
  <div class="container">
    <div class="admin-content">
      <div class="card">
        <div class="card-header">
          <h2 class="d-inline">Accounts List</h2>
          <a href="add-account.php" class="btn btn-dark float-right">Add New Account</a>
        </div>
        <div class="card-body position-relative">
          <div id="table-data">
            <?php 
              $db = new Database();
              $db->select('accounts','*',null,null,'accounts.id DESC',null);
              $result = $db->getResult();
            ?>
            <table class="table-data table table-bordered">
              <thead class="thead-light">
                <tr>
                  <th>S.No</th>
                  <th>Account Name</th>
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
                    <td><a href="manage-projects.php?aid=<?php echo $row['id']; ?>"><?php echo $row['name']; ?></a></td>
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
                          <li><a href="update-account.php?vcid=<?php echo $row['id']; ?>" class="btn btn-primary btn-sm"><img src="images/edit.png" alt=""></a></li>
                          <li><a href="#" data-vcid="<?php echo $row['id']; ?>" class="btn btn-danger btn-sm delete-category"><img src="images/delete.png" alt=""></a></li>
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
