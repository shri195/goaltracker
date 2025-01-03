<?php $title = "Add Category";
include "header.php" ?>
  <div class="message"></div>
  <div class="container">
    <div class="admin-content">
      <div class="card">
        <div class="card-header">
          <h2 class="d-inline">Add Account</h2>
          <a href="manage-accounts.php" class="btn btn-success float-right">
            <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-arrow-left-short" viewBox="0 0 16 16">
              <path fill-rule="evenodd" d="M12 8a.5.5 0 0 1-.5.5H5.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L5.707 7.5H11.5a.5.5 0 0 1 .5.5z"/>
            </svg>
            Account List
          </a>
        </div>
        <div class="card-body position-relative">
          <form class="yourform" id="add-account" action="<?php $_SERVER['PHP_SELF']; ?>" method="post" autocomplete="off">
              <div class="form-group">
                  <label>Name</label>
                  <input type="text" class="form-control cat_name" placeholder="Name" name="cat_name" value="" required>
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
