{template:template}

{title}Sections{/title}

{body}

    <div class="uk-overflow-container">
        <table class="uk-table uk-table-small uk-table-striped uk-table-hover">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Records</th>
                    <th class="uk-padding-remove-horizontal">
                        <a href="<?= clout_settings('clout_url') ?>/settings/sections/create"
                            class="uk-button uk-button-primary uk-float-right uk-button-small"
                        >
                            Create a Section
                            <i class="uk-icon-plus"></i>
                        </a>
                    </th>
                </tr>
            </thead>
            <tbody>
                <?php if($sections->count() > 0) : ?>
                    <?php foreach($sections as $section) : ?>
                    <tr>
                        <td><?= $section->id ?></td>
                        <td>
                            <a href="<?= clout_settings('clout_url')?>/settings/sections/<?= $section->id ?>">
                                <?= $section->name ?>
                            </a>
                        </td>
                        <td>-</td>
                        <td class="uk-text-right" nowrap>
                            <a href="<?= clout_settings('clout_url')?>/settings/sections/<?= $section->id ?>"
                                class="uk-text-primary" uk-icon="icon: pencil">
                            </a>

                            <a href="<?= clout_settings('clout_url')?>/settings/sections/<?= $section->id ?>/delete"
                                class="uk-text-danger" onclick="return confirm('Delete this section?');"
                                uk-icon="icon: trash">
                            </a>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                <?php endif; ?>
            </tbody>
        </table>
    </div>

{/body}
