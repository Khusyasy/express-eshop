<?php if(isset($user)): ?>
<h2>Logged in as</h2>
<?php $imageDir = file_exists(FCPATH."assets/images/account/".$user['username'].".png") ? base_url()."assets/images/account/".$user['username'].".png" : base_url()."assets/images/account/default.png"; ?>
<img src="<?php echo $imageDir."?=" ?>" alt="profile pict" height="256" width="256">
<h4><?php echo $user['username'] ?></h4>
<h4><?php echo $user['name'] ?></h4>
<?php endif; ?>