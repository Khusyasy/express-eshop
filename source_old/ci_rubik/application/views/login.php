<div class="container-fluid">
    <div class="row h-100">
        <div class="col-md-2 m-auto bg-light">
            <form action="<?= base_url() ?>login/process" method="post">

            <h3>Login</h3>

            <div class="form-group">
                <label for="username" class="text-dark">Username</label>
                <input type="text" class="form-control" name="username" placeholder="Enter username" required>
            </div>

            <div class="form-group">
                <label for="password" class="text-dark">Password</label>
                <input type="password" class="form-control" name="password" placeholder="Enter password" required>
            </div>

            <div class="form-group">
                <input type="button" onclick="window.history.back()" class="btn btn-dark" value="Cancel"></a>
                <input type="submit" name="submit" class="btn btn-primary">
            </div>
            </form>
        </div>
    </div>
</div>