<div class="container-fluid h-100">
    <div class="row h-100 mt-md-5">
        <div class="col-md-8 offset-md-2 bg-secondary">
            <p class="text-light m-auto">Create New Thread</p>
            <div class="row h-100">
                <div class="col-md-8 bg-light h-100">
                    <h2>Create New Thread</h2>
                    <form action="<?= base_url() ?>thread/add_thread" method="post">
                        <div class="form-group">
                            <label for="kategori" class="text-dark">Category</label>
                            <select class="form-control" name="kategori" id="kategori" required>
                                <?php foreach($kategori AS $data): ?>
                                    <option value="<?php echo $data['id'] ?>"><?php echo $data['nama_kategori'] ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="thr" class="text-dark">Thread name</label>
                            <input type="text" class="form-control" name="thr" id="thr" placeholder="Thread Name" required>
                        </div>

                        <div class="form-group">
                            <label for="isi" class="text-dark">Post</label>
                            <textarea class="form-control isi_post" name="isi" id="isi" placeholder="Post" rows="10" required></textarea>
                        </div>
                        
                        <div class="form-group">
                            <input type="button" onclick="window.history.back()" class="btn btn-dark" value="Cancel"></a>
                            <input type="submit" name="submit" class="btn btn-primary">
                        </div>
                    </form>
                </div>
                <div class="col-md-4 text-light">
                    <?= $userinfo ?>
                </div>
            </div>
        </div>
    </div>
</div>