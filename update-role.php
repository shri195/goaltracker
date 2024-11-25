<?php $title = "Update Role";
include "header.php" ?>
  <div class="message"></div>
  <div class="container">
    <div class="admin-content">
      <div class="card">
        <div class="card-header">
          <h2 class="d-inline">Update Role</h2>
          <a href="manage-roles.php" class="btn btn-success float-right">
            <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-arrow-left-short" viewBox="0 0 16 16">
              <path fill-rule="evenodd" d="M12 8a.5.5 0 0 1-.5.5H5.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L5.707 7.5H11.5a.5.5 0 0 1 .5.5z"/>
            </svg>
            Role List
          </a>
        </div>
        <div class="card-body position-relative">
          <?php 
            $role_id = $_GET['rid'];
            $db = new Database();
            $db->select('roles','*',null,"id=$role_id",null,null);
            $result = $db->getResult();
            if(count($result) > 0){
              foreach($result as $row){
          ?>
          <form class="yourform" id="update-role" action="" method="post" autocomplete="off">
              <div class="form-group">
                  <label>Role Name</label>
                  <input type="hidden" name="roleId" value="<?php echo $row['id']; ?>" required>
                  <input type="text" class="form-control role_name" placeholder="Name" name="roleName" value="<?php echo $row['roleName']; ?>" required>
              </div>
              <div class="form-group">
                  <label>Role Shortname</label>
                  <input type="text" class="form-control" placeholder="shortName" name="shortName" value="<?php echo $row['shortName']; ?>" required>
              </div>
              <input type="submit" name="save" class="btn btn-dark float-right" value="Save" required>
          </form>
          <?php 
              }
            }
          ?>
        </div>
      </div>
    </div>
  </div>
  
<?php include "footer.php" ?>
