{template:template}

{body}

    <h1>Create a <?= $section->name ?></h1>

    <form method="post" action="<?= clout_settings('clout_url')?>/sections/<?= $section->slug ?>/store"
        class="uk-form uk-form-horizontal" enctype="multipart/form-data">

        <?php foreach ($section->fields() as $field) : ?>
            <div id="field-<?= $field->id ?>" class="uk-margin">
                <div>
                    <label class="uk-form-label" for="f<?= $field->id ?>">
                        <?= $field->name ?>
                    </label>
                    <div class="uk-form-controls">
                        <?php if ($field->type()->name == 'Image' || $field->type()->name == 'File') : ?>
                            Uploads become available after creating a record.
                        <?php else : ?>
                            <?= \GraftPHP\Clout\Fieldtype::render($field->type, 'f' . $field->id) ?>
                        <?php endif; ?>
                    </div>
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
