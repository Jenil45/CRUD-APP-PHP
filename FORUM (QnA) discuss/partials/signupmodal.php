<!-- Button trigger modal -->
<!-- <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#signupModal">
  Launch demo modal
</button> -->

        


<!-- Modal -->
<div class="modal fade" id="signupModal" tabindex="-1" aria-labelledby="signupModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="signupModalLabel">Signup for QUERA</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form actiion="<?php echo $_SERVER['PHP_SELF']?>" method="post">
            <div class="modal-body">
                    <div class="mb-3">
                        <label for="uname" class="form-label">User Name</label>
                        <input type="text" class="form-control" id="uname" name="uname" aria-describedby="uname">
                        <!-- <input type="text" name = " uname" id="uname"> -->
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" class="form-control" id="password" name ="password">
                    </div>
                    <div class="mb-3">
                        <label for="cpassword" class="form-label">Confirm Password</label>
                        <input type="cpassword" class="form-control" id="cpassword" name ="cpassword">
                    </div>
                    
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
              
            </div>
        </form>
        
    </div>
  </div>
</div>
