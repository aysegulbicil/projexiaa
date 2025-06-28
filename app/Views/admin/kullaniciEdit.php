<?= $this->extend('admin/layout/main') ?>
<?= $this->section('content') ?>

<div class="card">
    <div class="card-header">
        <h5 class="mb-0">Kullanıcı Bilgilerini Düzenle</h5>
    </div>
    <div class="card-body">
        <form action="<?= base_url('admin/kullanici/update/' . $user['user_id']) ?>" method="post">
            <?= csrf_field() ?>
            <div class="row">
                <div class="col-md-6">
                    <label>Ad Soyad</label>
                    <input type="text" name="user_username" class="form-control" value="<?= esc($user['user_username']) ?>" required>
                </div>
                <div class="col-md-6">
                    <label>E-Posta</label>
                    <input type="email" name="user_mail" class="form-control" value="<?= esc($user['user_mail']) ?>" required>
                </div>
                <div class="col-md-6">
                    <label>Telefon</label>
                    <input type="text" name="user_phone" class="form-control" value="<?= esc($user['user_phone']) ?>">
                </div>
                <div class="col-md-6">
                    <label>Kurumu</label>
                    <input type="text" name="user_institution" class="form-control" value="<?= esc($user['user_institution']) ?>">
                </div>
                <div class="col-md-6">
                    <label>Unvan</label>
                    <input type="text" name="user_appellation" class="form-control" value="<?= esc($user['user_appellation'] ?? '') ?>">
                </div>

                <!-- Şifre değiştirme isteğe bağlı -->
                <div class="col-md-12 mt-4">
                    <h5>Şifre Değiştirme (İsteğe Bağlı)</h5>
                </div>
                <div class="col-md-4">
                    <label>Mevcut Şifre</label>
                    <input type="password" name="current_password" class="form-control">
                </div>
                <div class="col-md-4">
                    <label>Yeni Şifre</label>
                    <input type="password" name="new_password" class="form-control">
                </div>
                <div class="col-md-4">
                    <label>Yeni Şifre (Tekrar)</label>
                    <input type="password" name="new_password_confirm" class="form-control">
                </div>

                <div class="col-md-12 text-end mt-4">
                    <button type="submit" class="btn btn-primary">Güncelle</button>
                </div>
            </div>
        </form>
    </div>
</div>

<?= $this->endSection() ?>
