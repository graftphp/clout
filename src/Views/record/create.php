{template:template}

{body}

    <h1>Create a <?= $section->name ?></h1>

    <form method="post" action="/clout/settings/<?= $section->slug ?>/update?<?= $section->id ?>">
        <?php foreach ($section->fields() as $field) : ?>
            <div class="form-group">
                <label for="f<?= $field->id ?>"><?= $field->name ?></label>
                <input type="text" name="name" class="form-control">
            </div>
        <?php endforeach; ?>
        <div>
            <button type="submit" class="btn btn-primary">Create <?= $section->name ?></button>
        </div>
    </form>

{/body}
