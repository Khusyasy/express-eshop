<div class="container-fluid h-100">
    <div class="row h-100 mt-md-5">
        <div class="col-md-8 offset-md-2 bg-secondary">
            <p class="text-light m-auto">Home</p>
            <div class="row h-100">
                <div class="col-md-8 bg-light h-100">
                    <h2>Latest post</h2>
                    <?php foreach($latest AS $data): ?>
                        <div class="card my-3 clickable" onclick="location.href = '<?= base_url() . 'thread/index/' . $data['id'] ?>'">
                            <div class="card-body">
                                <h5 class="card-title"><?php echo $data['username'];?> in <?php echo $data['nama_thread']?></h5>
                                <p class="card-text"><?php echo substr($data['isi_post'], 0, 50)."...";?></p>
                                <p class="card-text"><small class="text-muted">Posted on <?php echo $data['tanggal_post'];?>.</small></p>
                            </div>
                        </div>
                    <?php endforeach; ?>

                    <h2>Category</h2>
                    <?php foreach($kategori AS $data): ?>
                        <div class="card my-3 clickable" onclick="location.href = '<?= base_url() . 'kategori/index/' . $data['id'] ?>'">
                            <div class="card-body">
                                <h5 class="card-title"><?php echo $data['nama_kategori']?></h5>
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