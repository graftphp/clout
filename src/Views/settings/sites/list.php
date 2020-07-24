{template:template}

{title}Sites{/title}

{body}

    <div class="uk-cover-container">
        <table class="uk-table uk-table-small uk-table-striped uk-table-hover">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th class="uk-padding-remove-horizontal">
                        <a href="<?= clout_settings('clout_url')?>/settings/sites/create"
                            class="uk-button uk-button-primary uk-float-right uk-button-small"
                        >
                            Create a Site
                            <span uk-icon="icon: plus"></span>
                        </a>
                    </th>
                </tr>
            </thead>
            <tbody>
                <?php if ($sites->count() > 0) : ?>
                    <?php foreach($sites as $_site) : ?>
                    <tr>
                        <td><?= $_site->id ?></td>
                        <td><?= $_site->label ?></td>
                        <td>
                            <a href="<?= clout_settings('clout_url')?>/settings/sites/<?= $site->id ?>"
                                class="uk-text-primary" uk-icon="icon: pencil">
                            </a>
                        </td>
                    </tr>
                    <?php endforeach ?>
                <?php endif ?>
            </tbody>
        </table>
    </div>

{/body}