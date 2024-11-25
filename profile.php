<?php $title = "Profile";
include "header.php" ?>
  <div class="message"></div>
  <div class="container">
    <div class="admin-content">
      <div class="card">
        <div class="card-header">
          <h2 class="d-inline">Edit Profile</h2>
        </div>
        <div class="card-body position-relative">
          <?php
              $where = "users.id = ".$_SESSION['admin_id'];
              $db = new Database();
              $db->select('users','*',null,$where,null,null);
              $result = $db->getResult();
              if($result > 0){
                foreach ($result as $row) {
          ?>
          <form class="yourform" id="update-profile" action="<?php $_SERVER['PHP_SELF']; ?>" method="post" autocomplete="off">
              <div class="form-group">
                  <label>Name</label>
                  <input type="hidden" name="admin_id" value="<?php echo $row['id']; ?>">
                  <input type="text" class="form-control firstName" name="firstName" value="<?php echo $row['firstName']; ?>" required>
              </div>
              <div class="form-group">
                  <label>Name</label>
                  <input type="hidden" name="admin_id" value="<?php echo $row['id']; ?>">
                  <input type="text" class="form-control lastName" name="lastName" value="<?php echo $row['lastName']; ?>" required>
              </div>
              <div class="form-group">
                  <label>Email</label>
                  <input type="email" class="form-control email" name="email" value="<?php echo $row['email']; ?>" required>
              </div>
              <div class="form-group">
                  <label>Username</label>
                  <input type="text" class="form-control username" name="username" value="<?php echo $row['username']; ?>" required>
              </div>
              <div class="form-group">
                  <label>Password</label>
                  <input type="password" class="form-control" name="new_password" value="">
                  <input type="hidden" class="form-control" placeholder="" value="<?php echo $row['password']; ?>" name="old_password" required>
                  <small>( Leave password empty if not change in password. )</small>
              </div>
              <input type="submit" name="save" class="btn btn-dark float-right" value="Update" required>
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
