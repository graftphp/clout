{template:template}

{body}

    <h1>
        <a href="<?= clout_settings('clout_url') ?>/sections/<?= $section->slug ?>/create" class="uk-button uk-button-primary uk-float-right">
            Create a <?= $section->name ?>
            <i class="uk-icon-plus"></i>
        </a>
        <?= $section->name ?>
    </h1>

    <?php if($records->count() > 0) : ?>
    <div class="uk-overflow-container">
        <table class="uk-table uk-table-striped uk-table-hover">
            <thead>
                <tr>
                    <th>ID</th>
                    <?php foreach ($section->listFields() as $field) : ?>
                    <th><?= $field->name ?></th>
                    <?php endforeach; ?>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($records as $record) : ?>
                <tr>
                    <td><?= $record->id ?></td>
                    <?php foreach ($section->listFields() as $field) : ?>
                    <td><?= htmlentities( $record->{$field->name} ) ?></td>
                    <?php endforeach; ?>
                    <td width="80">
                        <a href="<?= clout_settings('clout_url')?>/sections/<?= $section->slug ?>/<?= $record->id ?>/edit"
                        class="uk-icon-button uk-button-primary" uk-icon="icon: pencil">
                        </a>

                        <a href="<?= clout_settings('clout_url')?>/sections/<?= $section->slug ?>/<?= $record->id ?>/delete"
                        onclick="return confirm('Delete this section?');"
                        class="uk-icon-button uk-button-danger" uk-icon="icon: trash">
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
