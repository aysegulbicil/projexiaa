<?php $this->extend('partials/main') ?>

<?php if ($section == 'default.on_inceleme.onay'): ?>
    <?php $this->section($section) ?>
    <form id="formonay">
        <div class="modal-header">
            <h5 class="modal-title" id="approveModalLabel">Onay İşlemi</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
        <p>Onaylamak istediğinize emin misiniz?</p>
            <div class="mb-3">
                <textarea id="textarea" class="form-control" rows="4"
                    placeholder="Buraya notunuzu yazabilirsiniz..."></textarea>
            </div>
            <div class="mb-3">
                <label class="text-label mt-1">Taslak Ekle (Word .Docx) (İsteğe Bağlı)</label>
                <div class="form-group form-file mb-3">
                    <input type="file" name="dosya[]" accept=".docx" class="form-control" id="dosya"
                        aria-label="file example">
                </div>
            </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-primary" id="confirmAction">Onayla</button>
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Kapat</button>
        </div>
    </form>
    <?php $this->endSection() ?>
<?php endif; ?>

<?php if ($section == 'default.on_inceleme.red'): ?>
    <?php $this->section($section) ?>
    <form id="formred">
        <div class="modal-header">
            <h5 class="modal-title" id="approveModalLabel">Red İşlemi</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
        <p>Reddetmek istediğinize emin misiniz?</p>
            <div class="mb-3">
                <textarea id="textarea" class="form-control" rows="4"
                    placeholder="Buraya notunuzu yazabilirsiniz..."></textarea>
            </div>
            <div class="mb-3">
                <label class="text-label mt-1">Taslak Ekle (Word .Docx) (İsteğe Bağlı)</label>
                <div class="form-group form-file mb-3">
                    <input type="file" name="dosya[]" accept=".docx" class="form-control" id="dosya"
                        aria-label="file example">
                </div>
            </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-primary" id="confirmAction">Onayla</button>
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Kapat</button>
        </div>
    </form>
    <?php $this->endSection() ?>
<?php endif; ?>

<?php if ($section == 'default.on_inceleme.duzeltme'): ?>
    <?php $this->section($section) ?>
    <form id="formduzeltme" class="p-3">
        <div class="modal-header">
            <h5 class="modal-title" id="approveModalLabel">Düzeltme İsteği</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <p>Düzeltmeye göndermek istediğinize emin misiniz?</p>
            <div class="mb-3">
                <textarea id="textarea" class="form-control" rows="4"
                    placeholder="Buraya notunuzu yazabilirsiniz..."></textarea>
            </div>
            <div class="mb-3">
                <label class="text-label mt-1">Taslak Ekle (Word .Docx) (İsteğe Bağlı)</label>
                <div class="form-group form-file mb-3">
                    <input type="file" name="dosya[]" accept=".docx" class="form-control" id="dosya"
                        aria-label="file example">
                </div>
            </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-primary" data-action-code="düzeltme" id="confirmAction">Onayla</button>
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Kapat</button>
        </div>
    </form>
    <?php $this->endSection() ?>
<?php endif; ?>


<?php if ($section == 'default.duzeltmeok.duzeltmeok'): ?>
    <?php $this->section($section) ?>
    <form id="formduzeltme" class="p-3">
        <div class="modal-header">
            <h5 class="modal-title" id="approveModalLabel">Düzeltme İsteği</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <div class="mb-3">
                <textarea id="textarea" class="form-control" rows="4"
                    placeholder="Buraya düzeltme notunuzu yazınız..."></textarea>
            </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-primary" data-action-code="düzeltme" id="confirmAction">Onayla</button>
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Kapat</button>
        </div>
    </form>
    <?php $this->endSection() ?>
<?php endif; ?>

<?php if ($section == 'default.basvurudosyasi.basvurudosyasi'): ?>
    <?php $this->section($section) ?>
    <form id="formduzeltme" class="p-3">
        <div class="modal-header">
            <h5 class="modal-title" id="approveModalLabel">Kitap Dosyası</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <div class="mb-3">
                <label class="text-label mt-1"> Dosya Ekle (Word .Docx)</label>
                <div class="form-group form-file mb-3">
                    <input type="file" name="dosya[]" accept=".docx" class="form-control" id="dosya"
                        aria-label="file example">
                    <div class="invalid-feedback">Geçersiz dosya formatı. Lütfen .docx dosyası yükleyin.</div>
                </div>
            </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-primary" data-action-code="düzeltme" id="confirmAction">Onayla</button>
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Kapat</button>
        </div>
    </form>
    <?php $this->endSection() ?>
<?php endif; ?>

<?php if ($section == 'default.cagriyisonlandir.cagriyisonlandir'): ?>
    <?php $this->section($section) ?>
    <form id="formred">
        <div class="modal-header">
            <h5 class="modal-title" id="approveModalLabel">Çağrıyı Sonlandır</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <p>Çağrıyı Sonlandırmak istediğinize emin misiniz?</p>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-primary" id="confirmAction">Onayla</button>
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Kapat</button>
        </div>
    </form>
    <?php $this->endSection() ?>
<?php endif; ?>

<?php if ($section == 'default.guncelle.guncelle'): ?>
    <?php $this->section($section) ?>
    <form id="formduzeltme" class="p-3">
        <div class="modal-header">
            <h5 class="modal-title" id="approveModalLabel">Başvuruyu Güncelleme</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <div class="mb-3">
                <textarea id="textarea" class="form-control" rows="4"
                    placeholder="Buraya düzeltme notunuzu yazınız..."></textarea>
            </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-primary" data-action-code="düzeltme" id="confirmAction">Onayla</button>
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Kapat</button>
        </div>
    </form>
    <?php $this->endSection() ?>
<?php endif; ?>