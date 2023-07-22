<?= Form::open(['id' => 'updateForm']) ?>
    <input type="hidden" name="record_id" value="<?= $userProfile?->id ?>" />
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="popup">×</button>
        <h4 class="modal-title"><?= e($this->pageTitle) ?></h4>
    </div>

    <?php if (!$this->fatalError): ?>

        <div class="modal-body">
            <div class="w-full">
                <div class="table-container">
                    <h4>User Details</h4>
                    <table class="table data" data-provides="rowlink">
                        <tbody>
                            <tr>
                                <td><b>Name</b></td>
                                <td><?= $userProfile->user->name ?></td>
                            </tr>
                            <tr>
                                <td><b>Phone Number</b></td>
                                <td>
                                    <a tel="<?= $userProfile->phone ?>" href="#"><?= $userProfile->phone ?></a>
                                </td>
                            </tr>
                            <tr>
                                <td><b>Email</b></td>
                                <td><?= $userProfile->user->email ?></td>
                            </tr>
                            <tr>
                                <td><b>Center</b></td>
                                <td><?= $userProfile->center->name ?></td>
                            </tr>
                            <tr>
                                <td><b>Center Location</b></td>
                                <td><?= $userProfile->center->location ?></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="control-list">            
                <div class="table-container">
                    <h4>Courses Details</h4>
                    <table class="table data" data-provides="rowlink">
                        <thead>
                            <tr>
                                <th><span>Name</span></th>
                                <th><span>Score</span></th>
                                <th><span>Start Date</span></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($reports as $r) { ?>
                            <tr>
                                <td><?= $r['course']->name ?></td>
                                <td><?= gettype($r['score']) == 'float' ? (floatval($r['score'])) : $r['score'] ?></td>
                                <td><?= !is_null($r['startedOn']) ? $r['startedOn']->created_at : null ?></td>
                            </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>

        </div>
        <div class="modal-footer">
            <button
                type="button"
                class="btn btn-default"
                data-dismiss="popup">
                <?= e(trans('backend::lang.form.close')) ?>
            </button>
        </div>

    <?php else: ?>

        <div class="modal-body">
            <p class="flash-message static error"><?= e(trans($this->fatalError)) ?></p>
        </div>
        <div class="modal-footer">
            <button
                type="button"
                class="btn btn-default"
                data-dismiss="popup">
                <?= e(trans('backend::lang.form.close')) ?>
            </button>
        </div>

    <?php endif ?>

    <script>
        setTimeout(
            function(){ $('#updateForm input.form-control:first').focus() },
            310
        )
    </script>

<?= Form::close() ?>