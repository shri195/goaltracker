<?php $title = "Add User";
include "header.php" ?>
  <div class="message"></div>
  <div class="container">
    <div class="admin-content">
      <div class="card">
        <div class="card-header">
          <h2 class="d-inline">Add User</h2>
          <a href="manage-users.php" class="btn btn-success float-right">
            <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-arrow-left-short" viewBox="0 0 16 16">
              <path fill-rule="evenodd" d="M12 8a.5.5 0 0 1-.5.5H5.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L5.707 7.5H11.5a.5.5 0 0 1 .5.5z"/>
            </svg>
            User List
          </a>
        </div>
        <div class="card-body position-relative">
          <form class="yourform" id="add-user" action="<?php $_SERVER['PHP_SELF']; ?>" method="post" autocomplete="off">
              <div class="form-group">
                  <label>First Name</label>
                  <input type="text" class="form-control first_name" placeholder="First Name" name="firstName" value="" required>
              </div>
              <div class="form-group">
                  <label>Last Name</label>
                  <input type="text" class="form-control last_name" placeholder="Last Name" name="lastName" value="" required>
              </div>

              <div class="form-group">
                  <label>Email</label>
                  <input type="email" class="form-control email" placeholder="Email Address" name="email" value="" required>
              </div>

              <div class="form-group">
                  <label>Username</label>
                  <input type="text" class="form-control username" placeholder="Username" name="username" value="" required>
              </div>

              <div class="form-group">
                  <label>Password</label>
                  <input type="password" class="form-control password" placeholder="Password" name="password" required>
              </div>
              <div class="form-group">
                  <label>Role</label>
                  <?php
                    $db->select('roles','*',null,null,null,null);
                    $result1 = $db->getResult();
                    if(count($result1) > 0){ ?>
                    <select class="form-control role" name="role" id="" required>
                      <option value="">Select</option>
                      <?php foreach($result1 as $row1) { ?>
                      <option value="<?php echo $row1['id']; ?>"><?php echo $row1['roleName']; ?></option>
                      <?php } ?>
                    </select>
                  <?php } ?>                  
              </div>
              <input type="submit" name="save" class="btn btn-dark float-right" value="Save" required>
          </form>
        </div>
      </div>
    </div>
  </div>

<?php include "footer.php" ?>
