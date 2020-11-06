<?= $this->extend('Views\layout') ?>
<?= $this->section('main') ?>
<main>
    <div class="cotainer">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Halo <?= $user['name']; ?></div>
                </div>
            </div>
        </div>
    </div>
</main>
<?= $this->endSection() ?>
