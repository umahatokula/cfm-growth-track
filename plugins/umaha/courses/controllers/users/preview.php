<?php Block::put('breadcrumb') ?>
    <ul>
        <li><a href="<?= Backend::url('umaha/courses/users') ?>">Users</a></li>
        <li><?= e($this->pageTitle) ?></li>
    </ul>
<?php Block::endPut() ?>

<?php if (!$this->fatalError): ?>

    <div class="form-preview">
        <?= $this->formRenderPreview() ?>
    </div>

<?php else: ?>

    <p class="flash-message static error"><?= e($this->fatalError) ?></p>
    <p><a href="<?= Backend::url('umaha/courses/users') ?>" class="btn btn-default"><?= e(trans('backend::lang.form.return_to_list')) ?></a></p>

<?php endif ?>
