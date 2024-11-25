<?php $title = "Update Project";
include "header.php" ?>
  <div class="message"></div>
  <div class="container">
    <div class="admin-content">
      <div class="card">
        <div class="card-header">
          <h2 class="d-inline">Update Goal</h2>
          <a href="manage-goal.php" class="btn btn-success float-right">
            <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-arrow-left-short" viewBox="0 0 16 16">
              <path fill-rule="evenodd" d="M12 8a.5.5 0 0 1-.5.5H5.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L5.707 7.5H11.5a.5.5 0 0 1 .5.5z"/>
            </svg>
            Goal List
          </a>
        </div>
        <div class="card-body position-relative">
          <?php 
            $cat_id = $_GET['vcid'];
            $db = new Database();
            $db->select('goals','*',null,"id=$cat_id",null,null);
            $result = $db->getResult();
            if(count($result) > 0){
              foreach($result as $row){
          ?>
          <form class="yourform" id="update-goal" action="" method="post" autocomplete="off">
              <div class="form-group">
                  <label>Project Name</label>
                  <input type="hidden" name="cat_id" value="<?php echo $row['id']; ?>" required>
                  <?php
                  $where = "status=1";
                  if(isset($_SESSION['role']) &&  $_SESSION['role'] =="DM"){
                    $where .= " AND projects.deliveryManager = ".$_SESSION['admin_id'];
                  }
                    $db->select('projects','*',null,$where,null,null);
                    $result1 = $db->getResult();
                    if(count($result1) > 0){ ?>
                    <select class="form-control project" name="project" id="">
                      <?php foreach($result1 as $row1) { ?>
                      <option value="<?php echo $row1['id']; ?>" <?php echo $row['project'] == $row1['id'] ? "selected": ''; ?>><?php echo $row1['name']; ?></option>
                      <?php } ?>
                    </select>
                  <?php } ?>
              </div>
              <div class="form-group">
                  <label>Goal Name</label>
                  <input type="hidden" name="cat_id" value="<?php echo $row['id']; ?>" required>
                  <input type="text" class="form-control name" placeholder="Goal Name" name="name" value="<?php echo $row['name']; ?>" required>
              </div>
              <div class="form-group">
                  <label>Sprint / Release Name</label>
                  <input type="hidden" name="cat_id" value="<?php echo $row['id']; ?>" required>
                  <input type="text" class="form-control sprintReleaseName" name="sprintReleaseName" placeholder="Sprint / Release Name" value="<?php echo $row['sprintReleaseName']; ?>" required>
              </div>
              <div class="form-group">
                  <label>Sprint / Milestone Start Date</label>
                  <input type="hidden" name="cat_id" value="<?php echo $row['id']; ?>" required>
                  <input type="date" class="form-control smStartDate" name="smStartDate" value="<?php echo date("Y-m-d", strtotime($row['smStartDate'])); ?>" required>
              </div>
              <div class="form-group">
                  <label>Sprint / Milestone End Date</label>
                  <input type="hidden" name="cat_id" value="<?php echo $row['id']; ?>" required>
                  <input type="date" class="form-control smEndDate" name="smEndDate" value="<?php echo date("Y-m-d", strtotime($row['smEndDate'])); ?>" required>
              </div>
              <div class="form-group">
                  <label>Static Code Analysis - Quality Gate</label>
                  <input type="hidden" name="cat_id" value="<?php echo $row['id']; ?>" required>
                  <select class="form-control scaStatus" name="scaStatus" id="">
                    <option value="1" <?php echo $row['scaStatus'] == 1 ? "selected": ''; ?>>Pass</option>
                    <option value="0" <?php echo $row['scaStatus'] == 0 ? "selected": ''; ?>>Fail</option>
                  </select>
              </div>
              <div class="form-group">
                  <label>Code Review</label>
                  <input type="hidden" name="cat_id" value="<?php echo $row['id']; ?>" required>
                  <input type="text" class="form-control codeReview" placeholder="Provide counts for: 1. No. of PR, 2. No. of Comments" name="codeReview" value="<?php echo $row['codeReview']; ?>">
              </div>
              <div class="form-group">
                  <label>Unit Testing Success Ratio</label>
                  <input type="hidden" name="cat_id" value="<?php echo $row['id']; ?>" required>
                  <input type="number" class="form-control utsRatio" placeholder=">95%" name="utsRatio" value="<?php echo $row['utsRatio']; ?>" required>
              </div>
              <div class="form-group">
                  <label>Unit Test Cases Count</label>
                  <input type="hidden" name="cat_id" value="<?php echo $row['id']; ?>" required>
                  <input type="text" class="form-control utcCount" placeholder="Provide counts for: 1. Total, 2. Pass, 3. Fail" name="utcCount" value="<?php echo $row['utcCount']; ?>">
              </div>
              <div class="form-group">
                  <label>Code Coverage</label>
                  <input type="hidden" name="cat_id" value="<?php echo $row['id']; ?>" required>
                  <input type="number" class="form-control codeCoverage" placeholder=">80%" name="codeCoverage" value="<?php echo $row['codeCoverage']; ?>" required>
              </div>
              <div class="form-group">
                  <label>Defect Metrics - Defect Injection</label>
                  <input type="hidden" name="cat_id" value="<?php echo $row['id']; ?>" required>
                  <input type="text" class="form-control dmInjection" placeholder="Provide counts for defect found by QA in the sprint" name="dmInjection" value="<?php echo $row['dmInjection']; ?>">
              </div>
              <div class="form-group">
                  <label>Defect Metrics - No open defects [Critical, High]</label>
                  <input type="hidden" name="cat_id" value="<?php echo $row['id']; ?>" required>
                  <input type="text" class="form-control dmDefects" placeholder="0" name="dmDefects" value="<?php echo $row['dmDefects']; ?>">
              </div>
              <div class="form-group">
                  <label>Defect Metrics - DER</label>
                  <input type="hidden" name="cat_id" value="<?php echo $row['id']; ?>" required>
                  <input type="number" class="form-control dmDER" placeholder="<5%" name="dmDER" value="<?php echo $row['dmDER']; ?>" required>
              </div>
              <div class="form-group">
                  <label>Defect Metrics - Count of High/Critical Regression defects by client/QA</label>
                  <input type="hidden" name="cat_id" value="<?php echo $row['id']; ?>" required>
                  <input type="text" class="form-control dmRegressionDefects" placeholder="0" name="dmRegressionDefects" value="<?php echo $row['dmRegressionDefects']; ?>" required>
              </div>
              <div class="form-group">
                  <label>Defect Metrics - Count of reopen defects</label>
                  <input type="hidden" name="cat_id" value="<?php echo $row['id']; ?>" required>
                  <input type="text" class="form-control dmReopenDefects" placeholder="Provide counts for defects re-opened in the sprint" name="dmReopenDefects" value="<?php echo $row['dmReopenDefects']; ?>" required>
              </div>
              <div class="form-group">
                  <label>BVT/Sanity - Success Ratio</label>
                  <input type="hidden" name="cat_id" value="<?php echo $row['id']; ?>" required>
                  <input type="number" class="form-control bvtSanityRatio" placeholder="100%" name="bvtSanityRatio" value="<?php echo $row['bvtSanityRatio']; ?>" required>
              </div>
              <div class="form-group">
                  <label>Default Performance - No of pages taking more than 2 seconds loading time</label>
                  <input type="hidden" name="cat_id" value="<?php echo $row['id']; ?>" required>
                  <input type="number" class="form-control performanceLoadingTime" placeholder="0" name="performanceLoadingTime" value="<?php echo $row['performanceLoadingTime']; ?>" required>
              </div>
              <div class="form-group">
                  <label>Default Security -  Count of Critical/High severity security defects</label>
                  <input type="hidden" name="cat_id" value="<?php echo $row['id']; ?>" required>
                  <input type="number" class="form-control defaultSecurityCount" placeholder="0" name="defaultSecurityCount" value="<?php echo $row['defaultSecurityCount']; ?>" required>
              </div>
              <div class="form-group">
                  <label>Functional Test Coverage - Planned vs Executed %</label>
                  <input type="hidden" name="cat_id" value="<?php echo $row['id']; ?>" required>
                  <input type="number" class="form-control functionalTestCoverage" placeholder=">90%" name="functionalTestCoverage" value="<?php echo $row['functionalTestCoverage']; ?>" required>
              </div>
              <div class="form-group">
                  <label>Functional Test Cases Count</label>
                  <input type="hidden" name="cat_id" value="<?php echo $row['id']; ?>" required>
                  <input type="text" class="form-control functionalTestCaseCount" placeholder="Provide counts for: 1. Total, 2. Pass, 3. Fail" name="functionalTestCaseCount" value="<?php echo $row['functionalTestCaseCount']; ?>">
              </div>
              <div class="form-group">
                  <label>Functional Test Success Ratio - Pass Vs Fail %</label>
                  <input type="hidden" name="cat_id" value="<?php echo $row['id']; ?>" required>
                  <input type="number" class="form-control functionTestRatio" placeholder=">90%" name="functionTestRatio" value="<?php echo $row['functionTestRatio']; ?>" required>
              </div>
              <div class="form-group">
                  <label>Sprint Success ratio</label>
                  <input type="hidden" name="cat_id" value="<?php echo $row['id']; ?>" required>
                  <input type="number" class="form-control sprintSuccessRatio" placeholder=">90%" name="sprintSuccessRatio" value="<?php echo $row['sprintSuccessRatio']; ?>" required>
              </div>
              <div class="form-group">
                  <label>Sprint Velocity</label>
                  <input type="hidden" name="cat_id" value="<?php echo $row['id']; ?>" required>
                  <input type="text" class="form-control sprintVelocity" placeholder="DM to provide the benchmark if already defined, else average of last three sprints data" name="sprintVelocity" value="<?php echo $row['sprintVelocity']; ?>" required>
              </div>
              <div class="form-group">
                  <label>DM/DH Notes</label>
                  <input type="hidden" name="cat_id" value="<?php echo $row['id']; ?>" required>
                  <input type="text" class="form-control dmdhNotes" placeholder="DM/DH Notes" name="dmdhNotes" value="<?php echo $row['dmdhNotes']; ?>" required>
              </div>
              <div class="form-group">
                  <label>QN Notes</label>
                  <input type="hidden" name="cat_id" value="<?php echo $row['id']; ?>" required>
                  <input type="text" class="form-control qnNotes" placeholder="QN Notes" name="qnNotes" value="<?php echo $row['qnNotes']; ?>" required>
              </div>
              <div class="form-group">
                  <label>Goal Status</label>
                  <input type="hidden" name="cat_id" value="<?php echo $row['id']; ?>" required>
                  <select class="form-control goalStatus" name="goalStatus" id="">
                    <option value="1" <?php echo $row['goalStatus'] == 1 ? "selected": ''; ?>>Initiated</option>
                    <option value="2" <?php echo $row['goalStatus'] == 2 ? "selected": ''; ?>>In Progress</option>
                    <?php if($_SESSION['role'] == "QN") { ?>
                    <option value="3" <?php echo $row['goalStatus'] == 3 ? "selected": ''; ?>>In Review</option>
                    <option value="4" <?php echo $row['goalStatus'] == 4 ? "selected": ''; ?>>In Closure</option>
                    <option value="0" <?php echo $row['goalStatus'] == 0 ? "selected": ''; ?>>Defaulter</option>
                    <?php } ?>
                  </select>
              </div>
              <div class="form-group">
                  <label>Goal ETA</label>
                  <input type="hidden" name="cat_id" value="<?php echo $row['id']; ?>">
                  <input type="date" class="form-control goaETA" name="goaETA" value="<?php echo date("Y-m-d", strtotime($row['goaETA'])); ?>">
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
