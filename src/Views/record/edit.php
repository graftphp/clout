{template:template}

{body}

    <h1>Edit <?= $section->name ?></h1>

    <form method="post" action="/clout/sections/<?= $section->slug ?>/<?= $record->id ?>/update">
        <?php foreach ($section->fields() as $field) : ?>
            <div class="form-group">
                <label for="f<?= $field->id ?>"><?= $field->name ?></label>
                <input type="text" name="f<?= $field->id ?>" value="<?= $record->{$field->name} ?>" class="form-control">
            </div>
        <?php endforeach; ?>
        <div>
            <button type="submit" class="btn btn-primary">Save Changes</button>
        </div>
    </form>

{/body}
