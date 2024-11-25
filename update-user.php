<?php $title = "Update User";
include "header.php" ?>
  <div class="message"></div>
  <div class="container">
    <div class="admin-content">
      <div class="card">
        <div class="card-header">
          <h2 class="d-inline">Update User</h2>
          <a href="manage-users.php" class="btn btn-success float-right">
            <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-arrow-left-short" viewBox="0 0 16 16">
              <path fill-rule="evenodd" d="M12 8a.5.5 0 0 1-.5.5H5.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L5.707 7.5H11.5a.5.5 0 0 1 .5.5z"/>
            </svg>
            User List
          </a>
        </div>
        <div class="card-body position-relative">
          <?php 
            $user_id = $_GET['uid'];
            $db = new Database();
            $db->select('users','*',null,"id=$user_id",null,null);
            $result = $db->getResult();
            if(count($result) > 0){
              foreach($result as $row){
          ?>
          <form class="yourform" id="update-user" action="" method="post" autocomplete="off">
          <div class="form-group">
                <label>First Name</label>
                <input type="hidden" name="userId" value="<?php echo $row['id']; ?>" required>
                <input type="text" class="form-control first_name" placeholder="First Name" name="firstName" value="<?php echo $row['firstName']; ?>" required>
            </div>

            <div class="form-group">
                <label>Last Name</label>
                <input type="text" class="form-control last_name" placeholder="Last Name" name="lastName" value="<?php echo $row['lastName']; ?>" required>
            </div>

            <div class="form-group">
                <label>Email</label>
                <input type="text" class="form-control email" placeholder="Email Address" name="email" value="<?php echo $row['email']; ?>" required>
            </div>

            <div class="form-group">
                <label>Username</label>
                <input type="text" class="form-control username" placeholder="Username" name="username" value="<?php echo $row['username']; ?>" required>
            </div>

            <div class="form-group">
                <label>Password</label>
                <input type="text" class="form-control password" placeholder="Password" name="password" value="<?php echo $row['password']; ?>" required>
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
                      <option value="<?php echo $row1['id']; ?>" <?php if($row['role']==$row1['id']){echo "selected";} ?>><?php echo $row1['roleName']; ?></option>
                      <?php } ?>
                    </select>
                  <?php } ?>
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
