<div data-control="toolbar">
    <a
        href="<?= Backend::url('umaha/courses/users/create') ?>"
        class="btn btn-primary oc-icon-plus">
        <?= e(trans('backend::lang.list.create_button', ['name'=>'User'])) ?>
    </a>

    <button
        class="btn btn-danger oc-icon-trash-o"
        disabled="disabled"
        onclick="$(this).data('request-data', { checked: $('.control-list').listWidget('getChecked') })"
        data-request="onDelete"
        data-request-confirm="<?= e(trans('backend::lang.list.delete_selected_confirm')) ?>"
        data-trigger-action="enable"
        data-trigger=".control-list input[type=checkbox]"
        data-trigger-condition="checked"
        data-request-success="$(this).prop('disabled', 'disabled')"
        data-stripe-load-indicator>
        <?= e(trans('backend::lang.list.delete_selected')) ?>
    </button>
</div>
