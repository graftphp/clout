{template:template}

{body}

    <h1>
        <a href="<?= \GraftPHP\Clout\Settings::cloutURL() ?>/settings/users/create" class="uk-button uk-button-primary uk-float-right">
            Create a User
            <i class="uk-icon-plus"></i>
        </a>
        Users
    </h1>

    <div class="uk-overflow-container">
        <table class="uk-table uk-table-striped uk-table-hover">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Username</th>
                    <th>Active?</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                <?php if($users->count() > 0) : ?>
                    <?php foreach($users as $_user) : ?>
                    <tr>
                        <td><?= $_user->id ?></td>
                        <td><?= $_user->username ?></td>
                        <td>
                            <?php if ($_user->active == 1) : ?>
                                <span uk-icon="icon: check"></span>
                            <?php else : ?>
                                <span uk-icon="icon: close"></span>
                            <?php endif; ?>
                        </td>
                        <td class="uk-text-right" nowrap>
                            <a href="<?= \GraftPHP\Clout\Settings::cloutURL()?>/settings/users/<?= $_user->id ?>"
                                class="uk-icon-button uk-button-primary" uk-icon="icon: pencil">
                            </a>
                            <?php if ($_user->id != 1) : ?>
                            <a href="<?= \GraftPHP\Clout\Settings::cloutURL()?>/settings/users/<?= $_user->id ?>/delete"
                                class="uk-icon-button uk-button-danger" onclick="return confirm('Delete this user?');"
                                uk-icon="icon: trash">
                            </a>
                            <?php endif; ?>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                <?php endif; ?>
            </tbody>
        </table>
    </div>

{/body}
