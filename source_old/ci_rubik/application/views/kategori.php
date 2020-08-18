<div class="container-fluid h-100">
    <div class="row h-100 mt-md-5">
        <div class="col-md-8 offset-md-2 bg-secondary">
            <p class="text-light m-auto"><?php echo $kategori['nama_kategori'] ?></p>
            <div class="row h-100">
                <div class="col-md-8 bg-light h-100">
                    <h2>Latest thread</h2>

                    <?php foreach($thread AS $data): ?>
                        <div class="card my-3 flex-row m-auto">
                            <div class="card-body clickable" onclick="location.href = '<?= base_url() . '/thread/index/' . $data['id'];?>'">
                                <h5 class="card-title"><?php echo $data['nama_thread']?></h5>
                                <p class="card-text"><small class="text-muted">Created by </small><small class="text-dark"><?php echo $data['username'];?></small><small class="text-muted"> on <?php echo $data['tanggal_buat'];?>.</small></p>
                            </div>
                            <div class="card-footer">
                                <?php if(isset($user)): ?>
                                    <?php if($user['level'] == 'admin'): ?>
                                        <p class="pt-5">
                                            <form action="<?= base_url() ?>kategori/delete" method="post">
                                                <input type="hidden" name="id_thr" value="<?= $data['id'] ?>">
                                                <input type="image" src="<?= base_url() ?>assets/images/trash.png" alt="trash" height="16">
                                            </form>
                                        </p>
                                    <?php endif; ?>
                                <?php endif; ?>
                            </div>
                        </div>
                    <?php endforeach; ?>
                    
                </div>
                <div class="col-md-4 text-light">
                    <?= $userinfo ?>
                </div>
            </div>
        </div>
    </div>
</div>