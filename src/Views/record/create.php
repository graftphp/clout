{template:template}

{body}

    <h1>Create a <?= $section->name ?></h1>

    <form method="post" action="<?= \GraftPHP\Clout\Settings::cloutURL()?>/sections/<?= $section->slug ?>/store"
        class="uk-form uk-form-stacked">
        <?php foreach ($section->fields() as $field) : ?>
            <div class="uk-form-row">
                <label class="uk-form-label" for="f<?= $field->id ?>"><?= $field->name ?></label>
                <?= \GraftPHP\Clout\Fieldtype::render($field->type, 'f' . $field->id) ?>
            </div>
        <?php endforeach; ?>
        <div class="uk-form-row">
            <button type="submit" class="uk-button uk-button-success">Create <?= $section->name ?></button>
        </div>
    </form>

{/body}
