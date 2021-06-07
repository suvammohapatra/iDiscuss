<!-- Modal -->
<div class="modal fade" id="signupmodal" tabindex="-1" aria-labelledby="signupmodalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="signupmodalLabel">SignUp Here</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="/test/FORUM/partials/_handleSignup.php" method ="post">
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="signupEmail" class="form-label">Email Id</label>
                        <input type="email" class="form-control" id="signupEmail" name="signupEmail" aria-describedby="emailHelp">
                        <div id="signupEmail" name="signupEmail" class="form-text">We'll never share your email with anyone else.</div>
                    </div>
                    <div class="mb-3">
                        <label for="Password" class="form-label">Password</label>
                        <input type="password" class="form-control" id="Password" name="Password">
                    </div>
                    <div class="mb-3">
                        <label for="cPassword" class="form-label">Confirm Password</label>
                        <input type="password" class="form-control" id="cPassword" name="cPassword">
                    </div>

                    <button type="submit" class="btn btn-success">SignUp</button>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>

                </div>
            </form>
        </div>
    </div>
</div>