{template:template}

{body}

    <h1>
        <a href="<?= \GraftPHP\Clout\Settings::cloutURL() ?>/settings/sections/create" class="uk-button uk-button-primary uk-float-right">
            Create a Section
            <i class="uk-icon-plus"></i>
        </a>
        Sections
    </h1>

    <div class="uk-overflow-container">
        <table class="uk-table uk-table-striped uk-table-hover">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Records</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                <?php if($sections->count() > 0) : ?>
                    <?php foreach($sections as $section) : ?>
                    <tr>
                        <td><?= $section->id ?></td>
                        <td><?= $section->name ?></td>
                        <td>-</td>
                        <td class="uk-text-right" nowrap>
                            <a href="<?= \GraftPHP\Clout\Settings::cloutURL()?>/settings/sections/<?= $section->id ?>"
                                class="uk-icon-button uk-button-primary" uk-icon="icon: pencil">
                            </a>

                            <a href="<?= \GraftPHP\Clout\Settings::cloutURL()?>/settings/sections/<?= $section->id ?>/delete"
                                class="uk-icon-button uk-button-danger" onclick="return confirm('Delete this section?');"
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
