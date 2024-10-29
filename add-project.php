<?php $title = "Add Project";
include "header.php" ?>
  <div class="message"></div>
  <div class="container">
    <div class="admin-content">
      <div class="card">
        <div class="card-header">
          <h2 class="d-inline">Add Account</h2>
          <a href="manage-projects.php" class="btn btn-success float-right">
            <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-arrow-left-short" viewBox="0 0 16 16">
              <path fill-rule="evenodd" d="M12 8a.5.5 0 0 1-.5.5H5.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L5.707 7.5H11.5a.5.5 0 0 1 .5.5z"/>
            </svg>
            Account List
          </a>
        </div>
        <div class="card-body position-relative">
          <form class="yourform" id="add-project" action="<?php $_SERVER['PHP_SELF']; ?>" method="post" autocomplete="off">
              <div class="form-group">
                  <label>Project Name</label>
                  <input type="text" class="form-control cat_name" placeholder="Project Name" name="cat_name" value="" required>
              </div>
              <div class="form-group">
                  <label>Account Name</label>
                  <?php
                    $db->select('accounts','*',null,null,null,null);
                    $result1 = $db->getResult();
                    if(count($result1) > 0){ ?>
                    <select class="form-control account" name="account" id="">
                      <?php foreach($result1 as $row1) { ?>
                      <option value="<?php echo $row1['id']; ?>"><?php echo $row1['name']; ?></option>
                      <?php } ?>
                    </select>
                  <?php } ?>
              </div>
              <div class="form-group">
                  <label>Delivery Unit</label>
                  <input type="text" class="form-control deliveryUnit" placeholder="Delivery Unit" name="deliveryUnit" value="" required>
              </div>
              <div class="form-group">
                  <label>Delivery Manager</label>
                  <input type="text" class="form-control deliveryManager" placeholder="Delivery Manager" name="deliveryManager" value="" required>
              </div>
              <div class="form-group">
                  <label>Project Manager</label>
                  <input type="text" class="form-control projectManager" placeholder="Project Manager" name="projectManager" value="" required>
              </div>
              <div class="form-group">
                  <label>Remark</label>
                  <input type="text" class="form-control remark" placeholder="Remark" name="remark" value="" required>
              </div>
              <div class="form-group">
                  <label>Status</label>
                  <select class="form-control cat_status" name="cat_status" id="">
                      <option value="1">Active</option>
                      <option value="0">Inactive</option>
                  </select>
              </div>
              <input type="submit" name="save" class="btn btn-dark float-right" value="Save" required>
          </form>
        </div>
      </div>
    </div>
  </div>

<?php include "footer.php" ?>
