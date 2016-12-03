{template:template}

{body}

    <h1>Edit <?= $section->name ?></h1>

    <form method="post" action="<?= \GraftPHP\Clout\Settings::cloutURL()?>/sections/<?= $section->slug ?>/<?= $record->id ?>/update"
        class="uk-form uk-form-stacked">
        <?php foreach ($section->fields() as $field) : ?>
            <div class="uk-form-row">
                <label  class="uk-form-label for="f<?= $field->id ?>"><?= $field->name ?></label>
                <input type="text" name="f<?= $field->id ?>" value="<?= $record->{$field->name} ?>">
            </div>
        <?php endforeach; ?>
        <div class="uk-form-row">
            <button type="submit" class="uk-button uk-button-success">Save Changes</button>
        </div>
    </form>

{/body}
