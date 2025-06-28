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
                                <th>Projenin Adı</th>
                                <th>Projenin Konusu</th>
                                <th>Tarih</th>
                                <th>Başvuru Durumu</th>
                                <th>İşlemler</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($projects as $project): ?>
                                <tr>
                                    <td><?= esc($project['project_id']) ?></td>
                                    <td><?= esc($project['project_name']) ?></td>
                                    <td><?= esc($project['subject']) ?></td>
                                    <td><?= esc($project['start_date']) ?></td>
                                    <td><?= esc($project['unit']) ?></td>
                                    <td>
                                        <a href="<?= base_url('admin/projects/detay/' .$project['project_id']) ?>"
                                            class="btn btn-light-primary btn-sm detail-btn">Detay</a>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
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

<?= $this->endSection() ?>