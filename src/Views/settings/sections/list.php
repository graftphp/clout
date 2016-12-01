{template:template}

{body}

    <a href="<?= \GraftPHP\Clout\Settings::cloutURL() ?>/settings/sections/create" class="uk-button uk-button-primary uk-float-right">
        Add Section
        <span class="glyphicon glyphicon-plus"></span>
    </a>

    <h1>Sections</h1>

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
                <?php if($sections) : ?>
                    <?php foreach($sections as $section) : ?>
                    <tr>
                        <td><?= $section->id ?></td>
                        <td><?= $section->name ?></td>
                        <td>-</td>
                        <td width="50">
                            <a href="<?= \GraftPHP\Clout\Settings::cloutURL()?>/settings/sections/<?= $section->slug ?>/edit">
                                <i class="uk-icon-edit"></i>
                            </a>

                            <a href="<?= \GraftPHP\Clout\Settings::cloutURL()?>/settings/sections/<?= $section->slug ?>/delete"
                            onclick="return confirm('Delete this section?');">
                                <i class="uk-icon-trash"></i>
                            </a>
                        </td>
                    </tr>
                    <?php endforeach ?>
                <?php endif; ?>
            </tbody>
        </table>
    </div>

{/body}
