<div class="container-fluid h-100">
    <div class="row h-100 mt-md-5">
        <div class="col-md-8 offset-md-2 bg-secondary">
            <p class="text-light m-auto">Profile</p>
            <div class="row h-100">
                <div class="col-md-8 bg-light h-100 py-3">
                    <table class="table table-sm">
                        <tr>
                            <?php $imageDir = file_exists(FCPATH."assets/images/account/".$profile['username'].".png") ? base_url()."assets/images/account/".$profile['username'].".png" : base_url()."assets/images/account/default.png"; ?>
                            <td><img src="<?php echo $imageDir."?=" ?>" alt="profile pict" height="256" width="256"></td>
                        </tr>
                            <td><h4>Name:</h4></td>
                            <td>
                                <h4 class="noedit"><?php echo $profile['name']?></h4>
                            </td>
                        </tr>
                        </tr>
                            <td><h4>Username:</h4></td>
                            <td>
                                <h4 class="noedit"><?php echo $profile['username']?></h4>
                            </td>
                        </tr>
                        </tr>
                            <td><h4>Email:</h4></td>
                            <td>
                                <h4 class="noedit"><?php echo $profile['email']?></h4>
                            </td>
                        </tr>
                        </form>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>