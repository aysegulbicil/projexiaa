<!-- [ breadcrumb ] start -->
<!-- <div class="page-header">
    <div class="page-block">
        <div class="row align-items-center">
            <div class="col-md-12">
                <ul class="breadcrumb">
                    <li class="breadcrumb-item" aria-current="page"><?= esc($title ?? '') ?></li>
                </ul>
            </div>
        </div>
    </div>
</div> -->

<div class="page-header">
    <div class="page-block">
        <div class="row align-items-center">
            <div class="col-md-12">
                <?php if (isset($titletwo) && isset($title)): ?>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="<?= base_url('/admin') ?>"><?= lang('Main.' . esc($titletwo)) ?></a></li>
                        <li class="breadcrumb-item" aria-current="page"><?= lang('Main.' . esc($title)) ?></li>
                    </ul>
                <?php endif; ?>
            </div>
            <div class="col-md-12">
                <?php if (isset($title)): ?>
                    <div class="page-header-title">
                        <h2 class="mb-0"><?= lang('Main.' . esc($title)) ?></h2>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>

<!-- [ breadcrumb ] end -->