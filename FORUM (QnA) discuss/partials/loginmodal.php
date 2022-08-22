<!-- Modal -->

<div class="modal fade" id="loginModal" tabindex="-1" aria-labelledby="loginModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="loginModalLabel">Login to QUERA</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form actiion="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
            <div class="modal-body">
                    <div class="mb-3">
                        <label for="uname" class="form-label">User Name</label>
                        <input type="text" class="form-control" id="uname1" name="uname1"aria-describedby="emailHelp">
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" class="form-control" id="password1" name="password1">
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            
            </div>
        </form>
    </div>
</div>
