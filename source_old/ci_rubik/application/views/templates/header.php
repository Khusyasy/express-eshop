<!DOCTYPE html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="<?= base_url() ?>assets/css/style.css">
    <title><?= $title ?></title>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <a class="navbar-brand" href="<?= base_url() ?>">Speedcubing</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item mr-2 index">
                    <a class="nav-link" href="<?= base_url() ?>">Home</a>
                </li>
                <?php if(isset($user)): ?>
                    <?php if($user['level'] == 'admin'): ?>
                        <li class="nav-item mr-2 admin">
                            <a class="nav-link" href="<?= base_url() . 'admin' ?>">Admin</a>
                        </li>
                    <?php endif; ?>
                    <li class="nav-item mr-2 addthread">
                        <a class="nav-link" href="<?= base_url() . 'thread/form_add_thread' ?>">New Thread</a>
                    </li>
                    <li class="nav-item mr-2 profile">
                        <a class="nav-link" href="<?= base_url() . 'home/profile/'.$user['id'] ?>">Profile</a>
                    </li>
                    <li class="nav-item mr-2 logout">
                    <a class="nav-link" href="<?= base_url() . 'logout' ?>">Logout</a>
                    </li>
                <?php else: ?>
                    <li class="nav-item mr-2 form_login">
                        <a class="nav-link" href="<?= base_url() . 'login' ?>">Login</a>
                    </li>
                    <li class="nav-item mr-2 form_regis">
                        <a class="nav-link" href="<?= base_url() . 'regis' ?>">Create Account</a>
                    </li>
                <?php endif; ?>
            </ul>
        </div>
    </nav>