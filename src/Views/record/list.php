{template:template}

{body}

    <a href="<?= \GraftPHP\Clout\Settings::cloutURL() ?>/sections/<?= $section->slug ?>/create"
        class="btn btn-primary pull-right">
        Add <?= $section->name ?>
        <span class="glyphicon glyphicon-plus"></span>
    </a>

    <h1><?= $section->name ?></h1>

    <?php if($records->count() > 0) : ?>
    <div class="uk-overflow-container">
        <table class="uk-table uk-table-hover">
            <thead>
                <tr>
                    <th>ID</th>
                    <?php foreach ($section->fields() as $field) : ?>
                    <th><?= $field->name ?></th>
                    <?php endforeach; ?>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($records as $record) : ?>
                <tr>
                    <td><?= $record->id ?></td>
                    <?php foreach ($section->fields() as $field) : ?>
                    <td><?= $record->{$field->name} ?></td>
                    <?php endforeach; ?>
                    <td width="50">
                        <a href="<?= \GraftPHP\Clout\Settings::cloutURL()?>/sections/<?= $section->slug ?>/<?= $record->id ?>/edit">
                            <span class="glyphicon glyphicon-edit"></span>
                        </a>

                        <a href="<?= \GraftPHP\Clout\Settings::cloutURL()?>/sections/<?= $section->slug ?>/<?= $record->id ?>/delete"
                        onclick="return confirm('Delete this section?');">
                            <span class="glyphicon glyphicon-trash"></span>
                        </a>
                    </td>
                </tr>
                <?php endforeach ?>
            </tbody>
        </table>
    </div>
    <?php else: ?>
        <p>This section is empty</p>
    <?php endif; ?>

{/body}
