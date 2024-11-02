<?php $title = "Add Goal Tracker";
include "header.php" ?>
  <div class="message"></div>
  <div class="container">
    <div class="admin-content">
      <div class="card">
        <div class="card-header">
          <h2 class="d-inline">Add Goal Tracker</h2>
          <a href="manage-goal.php" class="btn btn-success float-right">
            <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-arrow-left-short" viewBox="0 0 16 16">
              <path fill-rule="evenodd" d="M12 8a.5.5 0 0 1-.5.5H5.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L5.707 7.5H11.5a.5.5 0 0 1 .5.5z"/>
            </svg>
            Goal Tracker List
          </a>
        </div>
        <div class="card-body position-relative">
          <form class="yourform" id="add-goal" action="<?php $_SERVER['PHP_SELF']; ?>" method="post" autocomplete="off">
              <div class="form-group">
                <label>Project Name</label>
                <?php
                    $db->select('projects','*',null,"status=1",null,null);
                    $result1 = $db->getResult();
                    if(count($result1) > 0){ ?>
                    <select class="form-control project" name="project" id="">
                      <?php foreach($result1 as $row1) { ?>
                      <option value="<?php echo $row1['id']; ?>"><?php echo $row1['name']; ?></option>
                      <?php } ?>
                    </select>
                  <?php } ?>
              </div>
              <div class="form-group">
                <label>Goal Name</label>
                <input type="text" class="form-control name" name="name" placeholder="Goal Name" required>
              </div>
              <div class="form-group">
                <label>Sprint / Release Name</label>
                <input type="text" class="form-control sprintReleaseName" name="sprintReleaseName" placeholder="Sprint / Release Name" required>
              </div>
              <div class="form-group">
                <label>Sprint / Milestone Start Date</label>
                <input type="date" class="form-control smStartDate" name="smStartDate" required>
              </div>
              <div class="form-group">
                <label>Sprint / Milestone End Date</label>
                <input type="date" class="form-control smEndDate" name="smEndDate" required>
              </div>
              <div class="form-group">
                <label>Static Code Analysis - Quality Gate</label>
                <select class="form-control scaStatus" name="scaStatus" id="">
                  <option value="1">Pass</option>
                  <option value="0">Fail</option>
                </select>
              </div>
              <div class="form-group">
                <label>Code Review</label>
                <input type="text" class="form-control codeReview" name="codeReview" placeholder="Provide counts for: 1. No. of PR, 2. No. of Comments">
              </div>
              <div class="form-group">
                <label>Unit Testing Success Ratio</label>
                <input type="number" class="form-control utsRatio" name="utsRatio" placeholder=">95%" required>
              </div>
              <div class="form-group">
                <label>Unit Test Cases Count</label>
                <input type="text" class="form-control utcCount" name="utcCount" placeholder="Provide counts for: 1. Total, 2. Pass, 3. Fail">
              </div>
              <div class="form-group">
                <label>Code Coverage</label>
                <input type="number" class="form-control codeCoverage" name="codeCoverage" placeholder=">80%" required>
              </div>
              <div class="form-group">
                <label>Defect Metrics - Defect Injection</label>
                <input type="text" class="form-control dmInjection" name="dmInjection" placeholder="Provide counts for defect found by QA in the sprint">
              </div>
              <div class="form-group">
                <label>Defect Metrics - No open defects [Critical, High]</label>
                <input type="text" class="form-control dmDefects" name="dmDefects" placeholder="0">
              </div>
              <div class="form-group">
                <label>Defect Metrics - DER</label>
                <input type="number" class="form-control dmDER" name="dmDER" placeholder="<5%" required>
              </div>
              <div class="form-group">
                <label>Defect Metrics - Count of High/Critical Regression defects by client/QA</label>
                <input type="text" class="form-control dmRegressionDefects" name="dmRegressionDefects" placeholder="0" required>
              </div>
              <div class="form-group">
                <label>Defect Metrics - Count of reopen defects</label>
                <input type="text" class="form-control dmReopenDefects" name="dmReopenDefects" placeholder="Provide counts for defects re-opened in the sprint" required>
              </div>
              <div class="form-group">
                <label>BVT/Sanity - Success Ratio</label>
                <input type="number" class="form-control bvtSanityRatio" name="bvtSanityRatio" placeholder="100%" required>
              </div>
              <div class="form-group">
                <label>Default Performance - No of pages taking more than 2 seconds loading time </label>
                <input type="number" class="form-control performanceLoadingTime" name="performanceLoadingTime" placeholder="0" required>
              </div>
              <div class="form-group">
                <label>Default Security -  Count of Critical/High severity security defects</label>
                <input type="number" class="form-control defaultSecurityCount" name="defaultSecurityCount" placeholder="0" required>
              </div>
              <div class="form-group">
                <label>Functional Test Coverage - Planned vs Executed %</label>
                <input type="number" class="form-control functionalTestCoverage" name="functionalTestCoverage" placeholder=">90%" required>
              </div>
              <div class="form-group">
                <label>Functional Test Cases Count</label>
                <input type="text" class="form-control functionalTestCaseCount" name="functionalTestCaseCount" placeholder="Provide counts for: 1. Total, 2. Pass, 3. Fail">
              </div>
              <div class="form-group">
                <label>Functional Test Success Ratio - Pass Vs Fail %</label>
                <input type="number" class="form-control functionTestRatio" name="functionTestRatio" placeholder=">90%" required>
              </div>
              <div class="form-group">
                <label>Sprint Success ratio</label>
                <input type="number" class="form-control sprintSuccessRatio" name="sprintSuccessRatio" placeholder=">90%" required>
              </div>
              <div class="form-group">
                <label>Sprint Velocity</label>
                <input type="text" class="form-control sprintVelocity" name="sprintVelocity" placeholder="DM to provide the benchmark if already defined, else average of last three sprints data" required>
              </div>
              <div class="form-group">
                <label>DM/DH Notes</label>
                <input type="text" class="form-control dmdhNotes" name="dmdhNotes" placeholder="DM/DH Notes" required>
              </div>
              <div class="form-group">
                <label>QN Notes</label>
                <input type="text" class="form-control qnNotes" name="qnNotes" placeholder="QN Notes" required>
              </div>
              <div class="form-group">
                <label>Goal Status</label>
                <select class="form-control goalStatus" name="goalStatus" id="">
                  <option value="1">Initiated</option>
                  <option value="2">In Progress</option>
                  <?php if($_SESSION['admin_id'] != 3) { ?>
                  <option value="3">In Review</option>
                  <option value="4">In Closure</option>
                  <option value="0">Defaulter</option>
                  <?php } ?>
                </select>
              </div>
              <div class="form-group">
                <label>Goal ETA</label>
                <input type="date" class="form-control goaETA" name="goaETA" value="<?php echo date("Y-m-d");?>">
              </div>
              <input type="submit" name="save" class="btn btn-dark float-right" value="Save" required>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
</div>
</div>

<?php include "footer.php" ?>
