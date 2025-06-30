<?= $this->extend('admin/layout/main') ?>

<?= $this->section('content') ?>
<div class="row">
    <div class="col-lg-4">
        <div class="card">
            <div class="card-header">
                <h5>İşlemler</h5>
            </div>
            <div class="card-body actionbuttons d-flex flex-wrap gap-2">
                <?php foreach ($actionDetails as $action): ?>
                    <button type="button" class="btn btn-<?= esc($action['color']) ?>"
                        data-action-code="<?= esc($action['action_code']) ?>" data-next="<?= esc($action['next']) ?>"
                        data-process-code="<?= esc($action['process_code']) ?>" data-bks-id="<?= esc($project_id) ?>">
                        <i class="<?= esc($action['icon']) ?>"></i> <?= esc($action['name']) ?>
                    </button>
                <?php endforeach; ?>
            </div>
        </div>

    </div>
    <div class="col-xl-8 col-md-12">
        <div class="card">
            <div class="card-body border-bottom pb-0">
                <div class="d-flex align-items-center justify-content-between">
                    <div class="dropdown">
                        <a
                            class="avtar avtar-s btn-link-secondary dropdown-toggle arrow-none"
                            href="#"
                            data-bs-toggle="dropdown"
                            aria-haspopup="true"
                            aria-expanded="false">
                            <i class="ti ti-dots-vertical f-18"></i>
                        </a>
                        <div class="dropdown-menu dropdown-menu-end">
                            <a class="dropdown-item" href="#">Today</a>
                            <a class="dropdown-item" href="#">Weekly</a>
                            <a class="dropdown-item" href="#">Monthly</a>
                        </div>
                    </div>
                </div>
                <ul class="nav nav-tabs analytics-tab" id="myTab" role="tablist">
                    <li class="nav-item" role="presentation">
                        <button
                            class="nav-link active"
                            id="analytics-tab-1"
                            data-bs-toggle="tab"
                            data-bs-target="#analytics-tab-1-pane"
                            type="button"
                            role="tab"
                            aria-controls="analytics-tab-1-pane"
                            aria-selected="true">Genel</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button
                            class="nav-link"
                            id="analytics-tab-2"
                            data-bs-toggle="tab"
                            data-bs-target="#analytics-tab-2-pane"
                            type="button"
                            role="tab"
                            aria-controls="analytics-tab-2-pane"
                            aria-selected="false">Üyeler</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button
                            class="nav-link"
                            id="analytics-tab-3"
                            data-bs-toggle="tab"
                            data-bs-target="#analytics-tab-3-pane"
                            type="button"
                            role="tab"
                            aria-controls="analytics-tab-3-pane"
                            aria-selected="false">Dosyalar</button>
                    </li>
                </ul>

                <div class="tab-content" id="myTabContent">
                    <!-- Genel Tab -->
                    <div
                        class="tab-pane fade show active"
                        id="analytics-tab-1-pane"
                        role="tabpanel"
                        aria-labelledby="analytics-tab-1"
                        tabindex="0">
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item"><strong>Proje Adı:</strong> <?= esc($project['project_name']) ?></li>
                            <li class="list-group-item"><strong>Birim:</strong> <?= esc($project['unit']) ?></li>
                            <li class="list-group-item"><strong>Lokasyon:</strong> <?= esc($project['location']) ?></li>
                            <li class="list-group-item"><strong>Konu:</strong> <?= esc($project['subject']) ?></li>
                            <li class="list-group-item"><strong>Başlangıç Tarihi:</strong> <?= esc($project['start_date']) ?></li>
                            <li class="list-group-item"><strong>Bitiş Tarihi:</strong> <?= esc($project['end_date']) ?></li>
                            <li class="list-group-item"><strong>Kurum/Kuruluşlar:</strong> <?= esc($project['institutions']) ?></li>
                            <li class="list-group-item"><strong>Hedef Kitle:</strong> <?= esc($project['target_audience']) ?></li>
                            <li class="list-group-item"><strong>Amaç:</strong> <?= esc($project['purpose']) ?></li>
                            <li class="list-group-item"><strong>Konu (Detay):</strong> <?= esc($project['topic']) ?></li>
                            <li class="list-group-item"><strong>Özet:</strong> <?= esc($project['summary']) ?></li>
                            <li class="list-group-item"><strong>Faaliyetlerin Açıklaması:</strong> <?= esc($project['activity_description']) ?></li>
                            <li class="list-group-item"><strong>Beklenen Sonuçlar:</strong> <?= esc($project['expected_results']) ?></li>
                            <li class="list-group-item"><strong>Neden Faaliyete Geçirilmeli:</strong> <?= esc($project['why_implement']) ?></li>
                        </ul>
                    </div>


                    <!-- Üyeler Tab -->
                    <div
                        class="tab-pane fade"
                        id="analytics-tab-2-pane"
                        role="tabpanel"
                        aria-labelledby="analytics-tab-2"
                        tabindex="0">
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>E-posta</th>
                                        <th>Ad Soyad</th>
                                        <th>Unvan</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php if (!empty($members)): ?>
                                        <?php foreach ($members as $member): ?>
                                            <tr>
                                                <td><?= esc($member['email']) ?></td>
                                                <td><?= esc($member['name']) ?></td>
                                                <td><?= esc($member['appellation']) ?></td>
                                            </tr>
                                        <?php endforeach; ?>
                                    <?php else: ?>
                                        <tr>
                                            <td colspan="3" class="text-center">Üye bulunamadı.</td>
                                        </tr>
                                    <?php endif; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>


                    <!-- Dosyalar Tab -->
                    <div
                        class="tab-pane fade"
                        id="analytics-tab-3-pane"
                        role="tabpanel"
                        aria-labelledby="analytics-tab-3"
                        tabindex="0">
                        <?php if (!empty($files)): ?>
                            <div class="table-responsive">
                                <table class="table table-bordered table-hover">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Dosya Adı</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($files as $index => $file): ?>
                                            <tr>
                                                <td><?= $index + 1 ?></td>
                                                <td><a href="<?= base_url('uploads/' . esc($file['documentation'])) ?>" target="_blank" class="btn btn-sm">
                                                        <?= esc($file['documentation']) ?></a></td>
                                            </tr>
                                        <?php endforeach; ?>
                                    </tbody>
                                </table>
                            </div>
                        <?php else: ?>
                            <p>Dosya bulunamadı.</p>
                        <?php endif; ?>
                    </div>
                    <div
                        class="tab-pane fade"
                        id="analytics-tab-3-pane"
                        role="tabpanel"
                        aria-labelledby="analytics-tab-3"
                        tabindex="0">
                        <ul class="list-group list-group-flush">
                            <?php if (!empty($files)): ?>
                                <?php foreach ($files as $file): ?>
                                    <li class="list-group-item">
                                        <a href="<?= base_url('uploads/' . esc($file['documentation'])) ?>" target="_blank"><?= esc($file['documentation']) ?></a>
                                    </li>
                                <?php endforeach; ?>
                            <?php else: ?>
                                <li class="list-group-item">Dosya bulunamadı.</li>
                            <?php endif; ?>
                        </ul>
                    </div>
                </div>

            </div>
        </div>

    </div>
    <div class="modal fade" id="confirmationModal" tabindex="-1" aria-labelledby="confirmationModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content" id="modalBody"></div>
        </div>
    </div>
    <?= $this->endSection() ?>
    <?= $this->section('script') ?>
    <!-- jQuery gerekiyorsa -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <!-- SweetAlert2 -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
       document.querySelectorAll('button[data-action-code="duzeltmeok"]').forEach(function(button) {
    button.addEventListener('click', function() {
        var projectId = this.getAttribute('data-project-id') || this.getAttribute('data-bks-id');
        if (projectId) {
            window.location.href = '/duzenle/' + projectId;
        }
    });
});

    </script>

    <?= $this->endSection() ?>