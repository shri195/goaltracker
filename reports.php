<?php $title = "Reports";
include "header.php" ?>
  <div class="message"></div>
  <div class="container">
    <div class="admin-content">
        <div class="card">
            <div class="card-header">
                <h2 class="d-inline">Reports</h2>
            </div>
            <div class="card-body position-relative">
                <div id="table-data">
                    <form id="search-form" class="form-horizontal row" type="POST">
                        <div class="col-12 col-md-6 form-group">
                            <label for="">From Date</label>
                            <input type="datetime-local" name="from_date" class="form-control" value="<?php echo date('Y-m-d 00:00:00'); ?>">
                        </div>
                        <div class="col-12 col-md-6 form-group">
                            <label for="">To Date</label>
                            <input type="datetime-local" name="to_date" class="form-control" value="<?php echo date('Y-m-d 23:59:59') ?>">
                        </div>
                        <div class="col-12 col-md-4 form-group">
                            <label for="">Type</label>
                            <select name="search_type" class="form-control">
                                <option value="all" <?php echo (isset($_GET['search_type']) && $_GET['search_type'] == 'all') ? 'selected' : '' ; ?>>All Records</option>
                            </select>
                        </div>
                        <div class="col-12 col-md-12 form-group">
                            <input type="submit" class="btn btn-dark btn-sm" name="submit" value="Submit">
                        </div>
                    </form>
                </div>
            </div>
        </div> 
    </div>
    <div class="card">
        <div class="card-body position-relative">
            <table id="reportData" class='table table-bordered w-100'>
                <thead class="thead-dark">
                    <tr>
                        <th>Project Name</th>
                        <th>Sprint / Release Name</th>
                        <th>Created Date</th>
                        <th>Delivery Manager</th>
                        <th>Goal Status</th>
                    </tr>
                </thead>
                <tbody>
                        
                </tbody>
            </table>
        </div>
    </div>
  </div>

<?php include "footer.php" ?>
