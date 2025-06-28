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

        <form id="projectForm" method="post" enctype="multipart/form-data">
          <div class="card">
            <div class="card-body">
              <div class="tab-content">
                <div id="bar" class="progress mb-3" style="height: 7px">
                  <div class="bar progress-bar progress-bar-striped progress-bar-animated bg-success"></div>
                </div>

                <div class="tab-pane show active" id="contactDetail">
                  <div class="row mt-4">
                    <div class="col">
                      <div class="row">
                        <div class="col-sm-12">
                          <div class="mb-3">
                            <label class="form-label">Projenin Adı</label>
                            <input type="text" class="form-control" name="project_name" placeholder="Projenin Adı" />
                          </div>
                        </div>
                        <div class="col-sm-6">
                          <div class="mb-3">
                            <label class="form-label">Birim</label>
                            <input type="text" class="form-control" name="unit" placeholder=".................Fakültesi/Enstitüsü/Meslek Yüksekokulu/Araştırma Merkezi" />
                          </div>
                        </div>
                        <div class="col-sm-6">
                          <div class="mb-3">
                            <label class="form-label">Projenin Uygulanacağı Yer(ler)</label>
                            <input type="text" class="form-control" name="location" placeholder="İl , İlçe, Uygulama Birimi sırasıyla belirtiniz." />
                          </div>
                        </div>
                        <div class="col-sm-4">
                          <div class="mb-3">
                            <label class="form-label">Projenin Konusu</label>
                            <select class="form-select" name="subject" id="subjectSelect" onchange="toggleOtherSubject(this)">
                              <option selected disabled>Seçiniz</option>
                              <option>Eğitim</option>
                              <option>Kültür</option>
                              <option>Sanat</option>
                              <option>Spor</option>
                              <option>Sağlık</option>
                              <option>Sosyal Destek</option>
                              <option>Çevre</option>
                              <option>Hayvan Hakları</option>
                              <option value="Diğer">Diğer</option>
                            </select>
                            <input type="text" class="form-control mt-2 d-none" name="subject_other" id="subjectOther" placeholder="Lütfen belirtiniz...">
                          </div>
                        </div>
                        <div class="col-sm-4">
                          <div class="mb-3">
                            <label class="form-label">Projeye Katkı Sağlayabilecek Kurum/Kuruluşlar</label>
                            <select class="form-select" name="institutions">
                              <option selected disabled>Kurum/Kuruluş Seçiniz</option>
                              <option>TÜBİTAK</option>
                              <option>KOSGEB</option>
                              <option>YÖK (Yükseköğretim Kurulu)</option>
                              <option>Milli Eğitim Bakanlığı</option>
                              <option>Tarım ve Orman Bakanlığı</option>
                              <option>Sanayi ve Teknoloji Bakanlığı</option>
                              <option>İŞKUR</option>
                              <option>UNICEF</option>
                              <option>Türk Kızılay</option>
                              <option>Belediyeler</option>
                              <option>Üniversiteler</option>
                              <option>Özel Sektör Kuruluşları</option>
                              <option>STK'lar (Sivil Toplum Kuruluşları)</option>
                            </select>
                          </div>
                        </div>
                        <div class="col-sm-4">
                          <div class="mb-3">
                            <label class="form-label">Projenin Hedef Kitlesi</label>
                            <select class="form-select" name="target_audience">
                              <option selected disabled>Hedef Kitle Seçiniz</option>
                              <option>Üniversite Öğrencileri</option>
                              <option>İlkokul / Ortaokul Öğrencileri</option>
                              <option>Akademisyenler</option>
                              <option>Kırsal Bölgede Yaşayan Vatandaşlar</option>
                              <option>Engelli Bireyler</option>
                              <option>Kadın Girişimciler</option>
                              <option>Genç İşsizler</option>
                              <option>Küçük ve Orta Ölçekli İşletmeler (KOBİ)</option>
                              <option>Tarım ve Hayvancılıkla Uğraşanlar</option>
                              <option>Kamu Kurumlarında Çalışanlar</option>
                              <option>Yerel Yönetimler</option>
                              <option>Sivil Toplum Kuruluşları</option>
                            </select>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="tab-pane" id="jobDetail">
                  <div class="row mt-4">
                    <div class="col-6 mb-3">
                      <label class="form-label" for="textarea1">Amaç</label>
                      <textarea class="form-control" id="textarea1" rows="1" name="purpose"></textarea>
                    </div>
                    <div class="col-6 mb-3">
                      <label class="form-label" for="textarea1">Konu</label>
                      <textarea class="form-control" id="textarea2" rows="1" name="topic"></textarea>
                    </div>
                    <div class="col-6 mb-3">
                      <label class="form-label" for="textarea1">Özet</label>
                      <textarea class="form-control" id="textarea3" rows="1" name="summary"></textarea>
                    </div>
                    <div class="col-6 mb-3">
                      <label class="form-label" for="textarea1">Faaliyetlerin Açıklaması</label>
                      <textarea class="form-control" id="textarea4" rows="1" name="activity_description"></textarea>
                    </div>
                    <div class="col-6 mb-3">
                      <label class="form-label" for="textarea1">Beklenen Sonuçlar/Somut Çıktılar</label>
                      <textarea class="form-control" id="textarea5" rows="1" name="expected_results"></textarea>
                    </div>
                    <div class="col-6 mb-3">
                      <label class="form-label" for="textarea1">Projenizi Neden Faaliyete Geçirmeliyiz?</label>
                      <textarea class="form-control" id="textarea6" rows="1" name="why_implement"></textarea>
                    </div>
                  </div>
                </div>

                <div class="tab-pane" id="educationDetail">
                  <div class="row mt-4">
                    <div class="alert alert-primary">
                      <div class="d-flex align-items-center">
                        <i class="ti ti-info-circle h2 f-w-400 mb-0"></i>
                        <div class="flex-grow-1 ms-3">
                          PROJE GRUBU ÜYE BİLGİLERİ
                        </div>
                      </div>
                    </div>
                    <div class="card">
                      <div class="card-body">
                        <table id="editorTable" class="table table-bordered">
                          <thead>
                            <tr>
                              <th><label for="editorEmail" class="form-label">E-posta</label></th>
                              <th><label for="editorName" class="form-label">Ad Soyad</label></th>
                              <th><label for="editorAppellation" class="form-label">Unvan</label></th>
                              <th>İşlemler</th>
                            </tr>
                          </thead>
                          <tbody id="editorTableBody">
                            <tr class="editor-row">
                              <td>
                                <input type="text" name="editorEmail[]" id="editorEmail" class="form-control" placeholder="editor@mail.com">
                              </td>
                              <td>
                                <input type="text" name="editorName[]" id="editorName" class="form-control" placeholder="Ad Soyad">
                              </td>
                              <td>
                                <select name="editorAppellation[]" id="editorAppellation" class="form-select">
                                  <option value="">Seçiniz</option>
                                  <option value="Prof.Dr.">Prof.Dr.</option>
                                  <option value="Doç.Dr.">Doç.Dr.</option>
                                  <option value="Yrd.Doç. Dr.">Yrd.Doç. Dr.</option>
                                  <option value="Dr.Öğr.Üyesi">Dr.Öğr.Üyesi</option>
                                  <option value="Araş.Gör.Dr.">Araş.Gör.Dr.</option>
                                  <option value="Araş.Gör.">Araş.Gör.</option>
                                  <option value="Öğr.Gör.Dr.">Öğr.Gör.Dr.</option>
                                  <option value="Öğr.Gör.">Öğr.Gör.</option>
                                  <option value="Diğer">Diğer</option>
                                </select>
                              </td>
                              <td>
                                <button type="button" class="btn btn-light-warning" onclick="moveEditorRowUp(this)">↑</button>
                                <button type="button" class="btn btn-light-warning" onclick="moveEditorRowDown(this)">↓</button>
                                <button type="button" class="btn btn-light-danger" onclick="removeEditorRow(this)">Sil</button>
                              </td>
                            </tr>
                          </tbody>
                        </table>
                        <div class="row mb-4">
                          <div class="col-lg-3">
                            <button type="button" id="editor_addButton" class="btn btn-light-primary" onclick="addEditorRow()">Ekle</button>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>


                <div class="tab-pane" id="finish">
                  <div class="row d-flex justify-content-center">
                    <div class="col-lg-12">
                      <div class="row">
                        <div class="col-lg-12 mb-3">
                          <label class="form-label">Dokümantasyon:</label>
                          <input name="file" id="file" type="file" class="form-control" required />
                        </div>
                        <div class="col-lg-6 mb-3">
                          <label class="form-label">Başlangıç Tarihi:</label>
                          <input type="date" class="form-control" name="start_date" required />
                        </div>
                        <div class="col-lg-6 mb-3">
                          <label class="form-label">Bitiş Tarihi:</label>
                          <input type="date" class="form-control" name="end_date" required />
                        </div>
                        <div class="col-12 d-flex justify-content-center">
                          <button type="submit" class="btn btn-primary">Kaydet</button>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>

                <div class="d-flex wizard justify-content-between flex-wrap gap-2 mt-3">
                  <div class="first">
                    <a href="javascript:void(0);" class="btn btn-secondary"> First </a>
                  </div>
                  <div class="d-flex">
                    <div class="previous me-2">
                      <a href="javascript:void(0);" class="btn btn-secondary"> Back To Previous </a>
                    </div>
                    <div class="next">
                      <a href="javascript:void(0);" class="btn btn-secondary"> Next Step </a>
                    </div>
                  </div>
                  <div class="last">
                    <a href="javascript:void(0);" class="btn btn-secondary"> Finish </a>
                  </div>
                </div>

              </div>
            </div>
          </div>
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
  $('#projectForm').on('submit', function(e) {
    e.preventDefault();

    var formData = new FormData(this);

    $.ajax({
      url: "<?= base_url('save') ?>",
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