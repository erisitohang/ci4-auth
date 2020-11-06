<div class="row">
    <div class="col-md-12">
        <?php if (session()->has('success')) : ?>
            <div class="flash_message alert alert-success">
                <?= session('success') ?>
            </div>
        <?php endif ?>

        <?php if (session()->has('error')) : ?>
            <div class="flash_message alert alert-danger">
                <?= session('error') ?>
            </div>
        <?php endif ?>

        <?php if (session()->has('errors')) : ?>
            <ul class="flash_message alert alert-danger">
                <?php foreach (session('errors') as $error) : ?>
                    <li><?= $error ?></li>
                <?php endforeach ?>
            </ul>
        <?php endif ?>
    </div>
</div>
