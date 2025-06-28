<?= $this->extend('admin/layout/main') ?>
<?= $this->section('content') ?>

<div class="card">
    <div class="card-header">
        <h5 class="mb-0">Kullanıcı Detayları</h5>
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col-md-6">
                <label>Ad Soyad</label>
                <input type="text" class="form-control" value="<?= esc($user['user_username']) ?>" readonly>
            </div>
            <div class="col-md-6">
                <label>E-Posta</label>
                <input type="email" class="form-control" value="<?= esc($user['user_mail']) ?>" readonly>
            </div>
            <div class="col-md-6">
                <label>Telefon</label>
                <input type="text" class="form-control" value="<?= esc($user['user_phone']) ?>" readonly>
            </div>
            <div class="col-md-6">
                <label>Kurumu</label>
                <input type="text" class="form-control" value="<?= esc($user['user_institution']) ?>" readonly>
            </div>
            <div class="col-md-6">
                <label>Unvan</label>
                <input type="text" class="form-control" value="<?= esc($user['user_appellation'] ?? '-') ?>" readonly>
            </div>
            <div class="col-md-6">
                <label>Kayıt Tarihi</label>
                <input type="text" class="form-control" value="<?= esc($user['created_at']) ?>" readonly>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection() ?>
