<?= $this->extend('admin/layout/main') ?>
<?= $this->section('style') ?>
<link rel="stylesheet" href="../assets/css/plugins/style.css" />

<?= $this->endSection() ?>
<?= $this->section('content') ?>


<div class="row">
    <div class="col-xl-12">
        <div class="card">
            <div class="card-body table-border-style">
                <div class="table-responsive">
                    <table class="table" id="pc-dt-simple">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Ad Soyad</th>
                                <th>E-Posta</th>
                                <th>Telefon</th>
                                <th>Kurumu</th>
                                <th>Giriş Tarihi</th>
                                <th>İşlemler</th>
                            </tr>
                        </thead>

                        <tbody>
                            <?php if (!empty($users)): ?>
                                <?php foreach ($users as $user): ?>
                                    <tr>
                                        <td><?= esc($user['user_id']) ?></td>
                                        <td><?= esc($user['user_username']) ?></td>
                                        <td><?= esc($user['user_mail']) ?></td>
                                        <td><?= esc($user['user_phone']) ?></td>
                                        <td><?= esc($user['user_institution']) ?></td>
                                        <td><?= esc($user['created_at']) ?></td>
                                        <td>
                                            <a href="<?= base_url('admin/kullanici/view/' . $user['user_id']) ?>" class="avtar avtar-xs btn-link-secondary btn-view-user" data-id="<?= $user['user_id'] ?>">
                                                <i class="ti ti-eye f-20"></i>
                                            </a>
                                            <a href="<?= base_url('admin/kullanici/edit/' . $user['user_id']) ?>" class="avtar avtar-xs btn-link-secondary btn-edit-user" data-id="<?= $user['user_id'] ?>">
                                                <i class="ti ti-edit f-20"></i>
                                            </a>
                                            <a href="javascript:void(0)" class="avtar avtar-xs btn-link-secondary btn-delete-user" data-id="<?= $user['user_id'] ?>">
                                                <i class="ti ti-trash f-20"></i>
                                            </a>

                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            <?php else: ?>
                                <tr>
                                    <td colspan="7" class="text-center">Kayıtlı kullanıcı bulunamadı.</td>
                                </tr>
                            <?php endif; ?>
                        </tbody>


                    </table>
                </div>

            </div>
        </div>
    </div>

</div>



<?= $this->endSection() ?>


<?= $this->section('script') ?>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script type="module">
    import {
        DataTable
    } from '/assets/js/plugins/module.js';
    $(document).ready(function() {
        const dt = new DataTable('#pc-dt-simple');

        $(".filter-option").click(function(e) {
            e.preventDefault();
            var selectedFilter = $(this).data("filter");

            if (selectedFilter === "") {
                dt.search('').draw();
            } else {
                dt.search(selectedFilter).draw();
            }
        });
    });
</script>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    $(document).ready(function () {
        // KULLANICIYI GÖRÜNTÜLE - Sayfaya yönlendir
        $('.btn-view-user').on('click', function () {
            const userId = $(this).data('id');
            window.location.href = "<?= base_url('admin/kullanici/view') ?>/" + userId;
        });

        // KULLANICIYI DÜZENLE - Sayfaya yönlendir
        $('.btn-edit-user').on('click', function () {
            const userId = $(this).data('id');
            window.location.href = "<?= base_url('admin/kullanici/edit') ?>/" + userId;
        });

        // KULLANICIYI SİL - Swal ile silme onayı
        $('.btn-delete-user').on('click', function () {
            const userId = $(this).data('id');

            Swal.fire({
                title: 'Emin misiniz?',
                text: "Bu kullanıcı kalıcı olarak silinecek!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Evet, sil!',
                cancelButtonText: 'İptal'
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        url: "<?= base_url('admin/kullanici/delete') ?>/" + userId,
                        type: 'POST',
                        success: function (response) {
                            Swal.fire('Silindi!', 'Kullanıcı başarıyla silindi.', 'success').then(() => {
                                location.reload(); // Sayfayı yenile
                            });
                        },
                        error: function () {
                            Swal.fire('Hata!', 'Silme işlemi başarısız oldu.', 'error');
                        }
                    });
                }
            });
        });
    });
</script>


<?= $this->endSection() ?>