{template:template}

{title}Users{/title}

{body}

    <div class="uk-overflow-container">
        <table class="uk-table uk-table-small uk-table-striped uk-table-hover">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Username</th>
                    <th class="uk-text-center">Active?</th>
                    <th class="uk-padding-remove-horizontal">
                        <a href="<?= clout_settings('clout_url') ?>/settings/users/create"
                            class="uk-button uk-button-small uk-button-primary uk-float-right"
                        >
                            Create a User
                            <i class="uk-icon-plus"></i>
                        </a>
                    </th>
                </tr>
            </thead>
            <tbody>
                <?php if($users->count() > 0) : ?>
                    <?php foreach($users as $_user) : ?>
                    <tr>
                        <td><?= $_user->id ?></td>
                        <td>
                            <a href="<?= clout_settings('clout_url')?>/settings/users/<?= $_user->id ?>">
                                <?= $_user->username ?>
                            </a>
                        </td>
                        <td class="uk-text-center">
                            <?php if ($_user->active == 1) : ?>
                                <span class="uk-text-success" uk-icon="icon: check"></span>
                            <?php else : ?>
                                <span class="uk-text-danger" uk-icon="icon: close"></span>
                            <?php endif; ?>
                        </td>
                        <td class="uk-text-right" nowrap>
                            <a href="<?= clout_settings('clout_url')?>/settings/users/<?= $_user->id ?>"
                                class="uk-text-primary" uk-icon="icon: pencil">
                            </a>
                            <?php if ($_user->id != 1) : ?>
                            <a href="<?= clout_settings('clout_url')?>/settings/users/<?= $_user->id ?>/delete"
                                class="uk-text-danger" onclick="return confirm('Delete this user?');"
                                uk-icon="icon: trash">
                            </a>
                            <?php else: ?>
                            <span class="uk-text-muted" uk-tooltip="Primary user cannot be deleted" uk-icon="icon: trash"></span>
                            <?php endif; ?>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                <?php endif; ?>
            </tbody>
        </table>
    </div>

{/body}
