<div class="container-fluid">
    <div class="row h-100">
        <div class="col-md-2 m-auto bg-light">
            <form action="<?= base_url() ?>regis/process" method="post">

            <h3>Create Account</h3>
            <div class="form-group">
                <label for="username" class="text-dark">Username</label>
                <input type="text" class="form-control" name="username" placeholder="Enter Username" required>
                <label for="username" class="text-muted"><small>Choose Wisely, Because It Can't Be Changed Later</small></label>
            </div>

            <div class="form-group">
                <label for="password" class="text-dark">Password</label>
                <input type="text" class="form-control" name="password" placeholder="Enter Password" required>
            </div>

            <div class="form-group">
                <label for="name" class="text-dark">Name</label>
                <input type="text" class="form-control" name="name" placeholder="Enter Name" required>
            </div>

            <div class="form-group">
                <label for="email" class="text-dark">Email</label>
                <input type="email" class="form-control" name="email" placeholder="Enter Email" required>
            </div>

            <div class="form-group">
                <input type="button" onclick="window.history.back()" class="btn btn-dark" value="Cancel"></a>
                <input type="submit" name="submit" class="btn btn-primary">
            </div>
            </form>
        </div>
    </div>
</div>