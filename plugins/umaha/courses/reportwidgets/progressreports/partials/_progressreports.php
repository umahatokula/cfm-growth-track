<div class="report-widget">
    <h3>Top pages</h3>

    <div class="table-container">
        <table class="table data" data-provides="rowlink">
            <thead>
                <tr>
                    <th><span>Name</span></th>
                    <?php foreach ($courses as $course) { ?>
                        <th><span><?= $course->name ?> (%)</span></th>
                    <?php } ?>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($reports as $report) { ?>

                <tr>

                    <td><?= $report['user']->name ?></td>

                    <?php foreach ($report['courses'] as $course) { ?>
                        <td><?= gettype($course) == 'float' ? (floatval($course)) : $course ?></td>
                    <?php } ?>

                </tr>

                <?php } ?>

            </tbody>
        </table>
    </div>
</div>

