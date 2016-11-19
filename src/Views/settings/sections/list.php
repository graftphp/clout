{template:template}

{body}

    <a href="/clout/settings/sections/create" class="btn btn-primary pull-right">
        Add Section
        <span class="glyphicon glyphicon-plus"></span>
    </a>

    <h1>Sections</h1>

    <div class="table-responsive">
        <table class="table table-striped table-hover">
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
                            <a href="/clout/settings/sections/<?= $section->slug ?>">
                                <span class="glyphicon glyphicon-edit"></span>
                            </a>

                            <a href="/clout/settings/sections/delete?<?= $section->id ?>"
                            onclick="return confirm('Delete this section?');">
                                <span class="glyphicon glyphicon-trash"></span>
                            </a>
                        </td>
                    </tr>
                    <?php endforeach ?>
                <?php endif; ?>
            </tbody>
        </table>
    </div>

{/body}
