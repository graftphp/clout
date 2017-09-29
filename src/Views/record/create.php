{template:template}

{body}

    <h1>Create a <?= $section->name ?></h1>

    <form method="post" action="<?= \GraftPHP\Clout\Settings::cloutURL()?>/sections/<?= $section->slug ?>/store"
        class="uk-form uk-form-horizontal">
        <?php foreach ($section->fields() as $field) : ?>
            <div class="uk-margin">
                <label class="uk-form-label" for="f<?= $field->id ?>">
                    <?= $field->name ?>
                </label>
                <div class="uk-form-controls">
                    <?= \GraftPHP\Clout\Fieldtype::render($field->type, 'f' . $field->id) ?>
                </div>
            </div>
        <?php endforeach; ?>
        <div class="uk-margin">
            <div class="uk-form-controls">
                <button type="submit" class="uk-button uk-button-primary">Create <?= $section->name ?></button>
            </div>
        </div>
    </form>

{/body}
