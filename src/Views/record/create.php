{template:template}

{body}

    <h1>Create a <?= $section->name ?></h1>

    <form method="post" action="/clout/sections/<?= $section->slug ?>/store">
        <?php foreach ($section->fields() as $field) : ?>
            <div class="form-group">
                <label for="f<?= $field->id ?>"><?= $field->name ?></label>
                <input type="text" name="f<?= $field->id ?>" class="form-control">
            </div>
        <?php endforeach; ?>
        <div>
            <button type="submit" class="btn btn-primary">Create <?= $section->name ?></button>
        </div>
    </form>

{/body}
