<?= $this->extend('admin/layout/main') ?>
<?= $this->section('content') ?>

<div class="row">
  <div class="col-sm-12">
    <div id="basicwizard" class="form-wizard row justify-content-center">
      <div class="col-12">
        <div class="card">
          <div class="card-body p-3">
            <ul class="nav nav-pills nav-justified">
              <li class="nav-item" data-target-form="#contactDetailForm">
                <a href="#contactDetail" data-bs-toggle="tab" data-toggle="tab" class="nav-link active">
                  <i class="ph-duotone ph-user-circle"></i>
                  <span class="d-none d-sm-inline">Proje Bilgileri</span>
                </a>
              </li>
              <li class="nav-item" data-target-form="#jobDetailForm">
                <a href="#jobDetail" data-bs-toggle="tab" data-toggle="tab" class="nav-link icon-btn">
                  <i class="ph-duotone ph-map-pin"></i>
                  <span class="d-none d-sm-inline">Detay</span>
                </a>
              </li>
              <li class="nav-item" data-target-form="#educationDetailForm">
                <a href="#educationDetail" data-bs-toggle="tab" data-toggle="tab" class="nav-link icon-btn">
                  <i class="ph-duotone ph-graduation-cap"></i>
                  <span class="d-none d-sm-inline">Üyeler</span>
                </a>
              </li>
              <li class="nav-item">
                <a href="#finish" data-bs-toggle="tab" data-toggle="tab" class="nav-link icon-btn">
                  <i class="ph-duotone ph-check-circle"></i>
                  <span class="d-none d-sm-inline">Son</span>
                </a>
              </li>
            </ul>
          </div>
        </div>

        <form id="projectForm" method="post" action="<?= base_url('duzenle') ?>" enctype="multipart/form-data">
  <input type="hidden" name="project_id" value="<?= esc($project['project_id']) ?>">

  <div class="card">
    <div class="card-body">
      <div class="tab-content">

        <!-- İlerleme Çubuğu -->
        <div id="bar" class="progress mb-3" style="height: 7px">
          <div class="bar progress-bar progress-bar-striped progress-bar-animated bg-success"></div>
        </div>

        <!-- TAB 1: Proje Bilgileri -->
        <div class="tab-pane show active" id="contactDetail">
          <div class="row mt-4">
            <div class="col-sm-12">
              <div class="mb-3">
                <label class="form-label">Projenin Adı</label>
                <input type="text" class="form-control" name="project_name" value="<?= esc($project['project_name']) ?>" />
              </div>
            </div>
            <div class="col-sm-6">
              <div class="mb-3">
                <label class="form-label">Birim</label>
                <input type="text" class="form-control" name="unit" value="<?= esc($project['unit']) ?>" />
              </div>
            </div>
            <div class="col-sm-6">
              <div class="mb-3">
                <label class="form-label">Lokasyon</label>
                <input type="text" class="form-control" name="location" value="<?= esc($project['location']) ?>" />
              </div>
            </div>
            <div class="col-sm-4">
              <div class="mb-3">
                <label class="form-label">Projenin Konusu</label>
                <select class="form-select" name="subject" id="subjectSelect" onchange="toggleOtherSubject(this)">
                  <option disabled>Seçiniz</option>
                  <?php
                  $konular = ['Eğitim','Kültür','Sanat','Spor','Sağlık','Sosyal Destek','Çevre','Hayvan Hakları','Diğer'];
                  foreach ($konular as $konu): ?>
                    <option value="<?= $konu ?>" <?= $project['subject'] === $konu ? 'selected' : '' ?>><?= $konu ?></option>
                  <?php endforeach; ?>
                </select>
                <input type="text" class="form-control mt-2 <?= $project['subject'] === 'Diğer' ? '' : 'd-none' ?>" name="subject_other" id="subjectOther" placeholder="Lütfen belirtiniz..." value="<?= esc($project['subject_other']) ?>">
              </div>
            </div>
            <div class="col-sm-4">
              <div class="mb-3">
                <label class="form-label">Projeye Katkı Sağlayabilecek Kurum/Kuruluşlar</label>
                <input type="text" class="form-control" name="institutions" value="<?= esc($project['institutions']) ?>">
              </div>
            </div>
            <div class="col-sm-4">
              <div class="mb-3">
                <label class="form-label">Hedef Kitle</label>
                <input type="text" class="form-control" name="target_audience" value="<?= esc($project['target_audience']) ?>">
              </div>
            </div>
          </div>
        </div>

        <!-- TAB 2: Detay -->
        <div class="tab-pane" id="jobDetail">
          <div class="row mt-4">
            <div class="col-6 mb-3">
              <label class="form-label">Amaç</label>
              <textarea class="form-control" name="purpose"><?= esc($project['purpose']) ?></textarea>
            </div>
            <div class="col-6 mb-3">
              <label class="form-label">Konu</label>
              <textarea class="form-control" name="topic"><?= esc($project['topic']) ?></textarea>
            </div>
            <div class="col-6 mb-3">
              <label class="form-label">Özet</label>
              <textarea class="form-control" name="summary"><?= esc($project['summary']) ?></textarea>
            </div>
            <div class="col-6 mb-3">
              <label class="form-label">Faaliyetlerin Açıklaması</label>
              <textarea class="form-control" name="activity_description"><?= esc($project['activity_description']) ?></textarea>
            </div>
            <div class="col-6 mb-3">
              <label class="form-label">Beklenen Sonuçlar</label>
              <textarea class="form-control" name="expected_results"><?= esc($project['expected_results']) ?></textarea>
            </div>
            <div class="col-6 mb-3">
              <label class="form-label">Neden Faaliyete Geçirilmeli</label>
              <textarea class="form-control" name="why_implement"><?= esc($project['why_implement']) ?></textarea>
            </div>
          </div>
        </div>

        <!-- TAB 3: Üyeler -->
        <div class="tab-pane" id="educationDetail">
          <div class="row mt-4">
            <div class="col-12">
              <div class="alert alert-primary">
                <i class="ti ti-info-circle"></i> PROJE GRUBU ÜYE BİLGİLERİ
              </div>

              <table id="editorTable" class="table table-bordered">
                <thead>
                  <tr>
                    <th>E-posta</th>
                    <th>Ad Soyad</th>
                    <th>Unvan</th>
                    <th>İşlem</th>
                  </tr>
                </thead>
                <tbody id="editorTableBody">
                  <?php foreach ($editors as $editor): ?>
                    <tr class="editor-row">
                      <td><input type="email" name="editorEmail[]" class="form-control" value="<?= esc($editor['email']) ?>"></td>
                      <td><input type="text" name="editorName[]" class="form-control" value="<?= esc($editor['name']) ?>"></td>
                      <td>
                        <input type="text" name="editorAppellation[]" class="form-control" value="<?= esc($editor['appellation']) ?>">
                      </td>
                      <td><button type="button" class="btn btn-danger" onclick="removeEditorRow(this)">Sil</button></td>
                    </tr>
                  <?php endforeach; ?>
                </tbody>
              </table>
              <button type="button" class="btn btn-secondary" onclick="addEditorRow()">Yeni Üye Ekle</button>
            </div>
          </div>
        </div>

        <!-- TAB 4: Son -->
        <div class="tab-pane" id="finish">
          <div class="row d-flex justify-content-center">
            <div class="col-lg-12">
              <div class="row">
                <div class="col-lg-12 mb-3">
                  <label class="form-label">Dokümantasyon:</label>
                  <input name="file" id="file" type="file" class="form-control" />
                  <?php if (!empty($project['documentation'])): ?>
                    <small>Mevcut: <a href="<?= base_url('uploads/' . esc($project['documentation'])) ?>" target="_blank"><?= esc($project['documentation']) ?></a></small>
                  <?php endif; ?>
                </div>
                <div class="col-lg-6 mb-3">
                  <label class="form-label">Başlangıç Tarihi:</label>
                  <input type="date" class="form-control" name="start_date" value="<?= esc($project['start_date']) ?>" />
                </div>
                <div class="col-lg-6 mb-3">
                  <label class="form-label">Bitiş Tarihi:</label>
                  <input type="date" class="form-control" name="end_date" value="<?= esc($project['end_date']) ?>" />
                </div>
                <div class="col-12 d-flex justify-content-center">
                  <button type="submit" class="btn btn-primary">Güncelle</button>
                </div>
              </div>
            </div>
          </div>
        </div>

        <!-- Adım Geçiş Butonları -->
        <div class="d-flex wizard justify-content-between flex-wrap gap-2 mt-3">
          <div class="first">
            <a href="javascript:void(0);" class="btn btn-secondary"> İlk </a>
          </div>
          <div class="d-flex">
            <div class="previous me-2">
              <a href="javascript:void(0);" class="btn btn-secondary"> Önceki </a>
            </div>
            <div class="next">
              <a href="javascript:void(0);" class="btn btn-secondary"> Sonraki </a>
            </div>
          </div>
          <div class="last">
            <a href="javascript:void(0);" class="btn btn-secondary"> Bitiş </a>
          </div>
        </div>

      </div> <!-- .tab-content -->
    </div> <!-- .card-body -->
  </div> <!-- .card -->
</form>


        <div id="result"></div>
      </div>
    </div>
  </div>
</div>
<?= $this->endSection() ?>
<?= $this->section('script') ?>
<script src="/assets/js/plugins/choices.min.js"></script>
<link href="https://cdn.jsdelivr.net/npm/sweetalert2@11.7.2/dist/sweetalert2.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.7.2/dist/sweetalert2.all.min.js"></script>
<script>
    function toggleOtherSubject(select) {
        const subjectOtherDiv = document.getElementById('subjectOtherDiv');
        if (select.value === 'Diğer') {
            subjectOtherDiv.style.display = 'block';
        } else {
            subjectOtherDiv.style.display = 'none';
        }
    }

    // Editör ekleme
    document.getElementById('addEditor').addEventListener('click', function () {
        const container = document.getElementById('editors-container');
        const div = document.createElement('div');
        div.classList.add('editor-item', 'mb-3');
        div.innerHTML = `
            <input type="email" name="editorEmail[]" placeholder="Email" class="form-control mb-1" required>
            <input type="text" name="editorName[]" placeholder="Ad Soyad" class="form-control mb-1">
            <input type="text" name="editorAppellation[]" placeholder="Unvan" class="form-control mb-1">
        `;
        container.appendChild(div);
    });
</script>
<script>
  function toggleOtherSubject(select) {
    const otherInput = document.getElementById('subjectOther');
    if (select.value === 'Diğer') {
      otherInput.classList.remove('d-none');
    } else {
      otherInput.classList.add('d-none');
    }
  }
</script>
<script>
  document.addEventListener('DOMContentLoaded', function() {
    const tabs = document.querySelectorAll('.tab-pane');
    const navLinks = document.querySelectorAll('.nav-link');
    const firstBtn = document.querySelector('.first a');
    const prevBtn = document.querySelector('.previous a');
    const nextBtn = document.querySelector('.next a');
    const lastBtn = document.querySelector('.last a');

    function getActiveIndex() {
      return Array.from(tabs).findIndex(tab => tab.classList.contains('show') && tab.classList.contains('active'));
    }

    function showTab(index) {
      if (index < 0 || index >= tabs.length) return;

      // Tüm tabları gizle, nav linklerin active sınıfını kaldır
      tabs.forEach(tab => tab.classList.remove('show', 'active'));
      navLinks.forEach(link => link.classList.remove('active'));

      // İstenen tabı göster
      tabs[index].classList.add('show', 'active');

      // İlgili nav-link'i aktif yap
      const targetId = tabs[index].getAttribute('id');
      navLinks.forEach(link => {
        if (link.getAttribute('href') === '#' + targetId) {
          link.classList.add('active');
        }
      });

      // Buton durumlarını güncelle
      updateButtons(index);
    }

    function updateButtons(index) {
      firstBtn.parentElement.classList.toggle('disabled', index === 0);
      prevBtn.parentElement.classList.toggle('disabled', index === 0);
      nextBtn.parentElement.classList.toggle('disabled', index === tabs.length - 1);
      lastBtn.parentElement.classList.toggle('disabled', index === tabs.length - 1);
    }

    // Butonlara tıklama olayları
    firstBtn.addEventListener('click', () => showTab(0));
    lastBtn.addEventListener('click', () => showTab(tabs.length - 1));
    prevBtn.addEventListener('click', () => {
      const current = getActiveIndex();
      if (current > 0) showTab(current - 1);
    });
    nextBtn.addEventListener('click', () => {
      const current = getActiveIndex();
      if (current < tabs.length - 1) showTab(current + 1);
    });

    // Başlangıçta butonları güncelle
    updateButtons(getActiveIndex());
  });
</script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
    document.getElementById('addEditor').addEventListener('click', function() {
        const container = document.getElementById('editors-container');
        const div = document.createElement('div');
        div.classList.add('editor-item', 'mb-3');
        div.innerHTML = `
            <input type="email" name="editorEmail[]" placeholder="Email" class="form-control mb-1" required>
            <input type="text" name="editorName[]" placeholder="Ad Soyad" class="form-control mb-1">
            <input type="text" name="editorAppellation[]" placeholder="Unvan" class="form-control mb-1">
        `;
        container.appendChild(div);
    });
</script>
<script>
  $('#projectForm').on('submit', function(e) {
    e.preventDefault();

    var formData = new FormData(this);

    $.ajax({
      url: "<?= base_url('duzenle') ?>",
      type: "POST",
      data: formData,
      processData: false,
      contentType: false,
      dataType: 'json',
      success: function(response) {
        if (response.status === 'success') {
          Swal.fire({
            icon: 'success',
            title: 'Başarılı!',
            text: response.message,
            confirmButtonText: 'Tamam'
          }).then((result) => {
            if (result.isConfirmed) {
              // Sayfayı yenile
              location.reload();
            }
          });
          $('#projectForm')[0].reset();
          $('#result').html('');
        } else {
          Swal.fire({
            icon: 'error',
            title: 'Hata!',
            text: response.message,
            confirmButtonText: 'Tamam'
          });
        }
      },
      error: function() {
        Swal.fire({
          icon: 'error',
          title: 'Hata!',
          text: 'Bir hata oluştu.',
          confirmButtonText: 'Tamam'
        });
      }
    });
  });
</script>


<?= $this->endSection() ?>