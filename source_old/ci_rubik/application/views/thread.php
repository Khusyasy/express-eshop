<div class="container-fluid h-100">
    <div class="row h-100 mt-md-5">
        <div class="col-md-8 offset-md-2 bg-secondary">
            <p class="text-light m-auto"><?php echo $thread['nama_thread'] ?></p>
            <div class="row h-100">
                <div class="col-md-8 bg-light">
                    <h2><?php  ?></h2>

                    <?php foreach($posts AS $data): ?>
                        <div class="card my-3 flex-row m-auto">
                            <div class="card-header m-auto">
                                <?php
                                $pid = $data['id'];
                                $idacc = $data['idacc'];
                                $imageDir = file_exists(FCPATH."assets/images/account/".$data['username'].".png") ? base_url()."assets/images/account/".$data['username'].".png" : base_url()."assets/images/account/default.png";
                                ?>
                                <img src="<?php echo $imageDir."?=" ?>" alt="profile pict" height="128" width="128">
                            </div>
                            <div class="card-body">
                                <h5 class="card-title"><?php echo $data['username']?></h5>
                                <p class="card-text"><?php echo $data['isi_post']?></p>
                                <p class="card-text"><small><?php echo $data['tanggal_post']?></small></p>
                            </div>
                            <div class="card-footer m-auto">
                                <img class="clickable" src="<?= base_url() ?>assets/images/upvote<?php echo ($data['upvoted'] == 1 ? 'd' : ''); ?>.png" alt="up" height="16" width="16" onclick="location.href = '<?= base_url() ?>thread/upvote/<?= $pid ?>';">
                                <p class="m-auto pl-1"><?= $data['upvote'] - $data['downvote'] ?></p>
                                <img class="clickable" src="<?= base_url() ?>assets/images/downvote<?php echo ($data['downvoted'] == 1 ? 'd' : ''); ?>.png" alt="down" height="16" width="16" onclick="location.href = '<?= base_url() ?>thread/downvote/<?= $pid ?>';">

                                <?php if(isset($user)): ?>
                                    <?php if($user['id'] == $idacc): ?>
                                        <p class="pt-5">
                                            <!-- <img class="clickable" src="<?= base_url() ?>assets/images/trash.png" alt="trash" height="16" width="16" onclick="location.href = '<?= base_url() ?>thread/delete/<?= $pid ?>';"> -->
                                            <!-- <img class="clickable" src="<?= base_url() ?>assets/images/edit.png" alt="edit" height="16" width="16" onclick="#"> -->
                                            <form action="<?= base_url() ?>thread/delete" method="post">
                                                <input type="hidden" name="id_thr" value="<?= $thread['id'] ?>">
                                                <input type="hidden" name="pid" value="<?= $pid ?>">
                                                <input type="image" src="<?= base_url() ?>assets/images/trash.png" alt="trash" height="16">
                                            </form>
                                        </p>
                                    <?php elseif($user['level'] == 'admin'): ?>
                                        <p class="pt-5">
                                            <form action="<?= base_url() ?>thread/delete" method="post">
                                                <input type="hidden" name="id_thr" value="<?= $thread['id'] ?>">
                                                <input type="hidden" name="pid" value="<?= $pid ?>">
                                                <input type="image" src="<?= base_url() ?>assets/images/trash.png" alt="trash" height="16">
                                            </form>
                                        </p>
                                    <?php endif; ?>
                                <?php endif; ?>
                            </div>
                        </div>
                    <?php endforeach; ?>

                    <?php if($thread != null): ?>
                        <?php if(isset($user)): ?>
                            <form action="<?= base_url() ?>thread/add_post" method="post">

                                <input type="hidden" name="id_thr" value="<?= $thread['id'] ?>">
                                
                                <div class="form-group">
                                    <label for="isi" class="text-dark">Add Post</label>
                                    <textarea class="form-control" name="isi" placeholder="Post" rows="3" required></textarea>
                                    <input type="reset" name="Cancel" class="btn btn-secondary">
                                    <input type="submit" name="Submit" class="btn btn-secondary">
                                </div>
                            </form>
                        <?php else: ?>
                            <h4 class="text-dark">Please login to add post</h4>
                        <?php endif; ?>
                    <?php else: ?>
                        <h4 class="text-dark">Thread not found</h4>
                    <?php endif; ?>
                </div>

                <div class="col-md-4 text-light">
                    <?= $userinfo ?>
                </div>
            </div>
        </div>
    </div>
</div>