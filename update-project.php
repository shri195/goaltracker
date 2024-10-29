<?php $title = "Update Project";
include "header.php" ?>
  <div class="message"></div>
  <div class="container">
    <div class="admin-content">
      <div class="card">
        <div class="card-header">
          <h2 class="d-inline">Update Project</h2>
          <a href="manage-projects.php" class="btn btn-success float-right">
            <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-arrow-left-short" viewBox="0 0 16 16">
              <path fill-rule="evenodd" d="M12 8a.5.5 0 0 1-.5.5H5.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L5.707 7.5H11.5a.5.5 0 0 1 .5.5z"/>
            </svg>
            Project List
          </a>
        </div>
        <div class="card-body position-relative">
          <?php 
            $cat_id = $_GET['vcid'];
            $db = new Database();
            $db->select('projects','*',null,"id=$cat_id",null,null);
            $result = $db->getResult();
            if(count($result) > 0){
              foreach($result as $row){
          ?>
          <form class="yourform" id="update-project" action="" method="post" autocomplete="off">
              <div class="form-group">
                  <label>Project Name</label>
                  <input type="hidden" name="cat_id" value="<?php echo $row['id']; ?>" required>
                  <input type="text" class="form-control cat_name" placeholder="Project Name" name="cat_name" value="<?php echo $row['name']; ?>" required>
              </div>
              <div class="form-group">
                  <label>Account Name</label>
                  <input type="hidden" name="cat_id" value="<?php echo $row['id']; ?>" required>
                  <?php
                    $db->select('accounts','*',null,null,null,null);
                    $result1 = $db->getResult();
                    if(count($result1) > 0){ ?>
                    <select class="form-control account" name="account" id="">
                      <?php foreach($result1 as $row1) { ?>
                      <option value="<?php echo $row1['id']; ?>" <?php echo $row['account'] == $row1['id'] ? "selected": ''; ?>><?php echo $row1['name']; ?></option>
                      <?php } ?>
                    </select>
                  <?php } ?>
              </div>
              <div class="form-group">
                  <label>Delivery Unit</label>
                  <input type="hidden" name="cat_id" value="<?php echo $row['id']; ?>" required>
                  <input type="text" class="form-control deliveryUnit" placeholder="Delivery Unit" name="deliveryUnit" value="<?php echo $row['deliveryUnit']; ?>" required>
              </div>
              <div class="form-group">
                  <label>Delivery Manager</label>
                  <input type="hidden" name="cat_id" value="<?php echo $row['id']; ?>" required>
                  <input type="text" class="form-control deliveryManager" placeholder="Delivery Manager" name="deliveryManager" value="<?php echo $row['deliveryManager']; ?>" required>
              </div>
              <div class="form-group">
                  <label>Project Manager</label>
                  <input type="hidden" name="cat_id" value="<?php echo $row['id']; ?>" required>
                  <input type="text" class="form-control projectManager" placeholder="Project Manager" name="projectManager" value="<?php echo $row['projectManager']; ?>" required>
              </div>
              <div class="form-group">
                  <label>Remark</label>
                  <input type="hidden" name="cat_id" value="<?php echo $row['id']; ?>" required>
                  <input type="text" class="form-control remark" placeholder="Remark" name="remark" value="<?php echo $row['remark']; ?>" required>
              </div>
              <div class="form-group">
                  <label>Status</label>
                  <select class="form-control cat_status" name="cat_status" id="">
                      <option value="1" <?php echo $row['status'] == '1' ? "selected": ''; ?>>Active</option>
                      <option value="0" <?php echo $row['status'] == '0' ? "selected": ''; ?>>Inactive</option>
                  </select>
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
