{template:template}

{body}

    <h1>Edit <?= $section->name ?></h1>

    <form method="post" action="<?= \GraftPHP\Clout\Settings::cloutURL()?>/sections/<?= $section->slug ?>/<?= $record->id ?>/update"
        class="uk-form uk-form-horizontal">

        <?php foreach ($section->fields() as $field) : ?>
            <div class="uk-margin">
                <label class="uk-form-label for="f<?= $field->id ?>"><?= $field->name ?></label>
                <div class="uk-form-controls">
                <?= \GraftPHP\Clout\Fieldtype::render($field->type, 'f' . $field->id, $record->{$field->name}) ?>
                </div>
            </div>
        <?php endforeach; ?>
        <hr />
        <?php foreach($section->relationships() as $relationship) : ?>
            <div class="uk-margin">
                <label class="uk-form-label"><?= $relationship->name ?></label>
                <div class="uk-form-controls">
                    <?php foreach (\GraftPHP\Clout\Output::list($relationship->childSection()->slug)->all() as $option) : ?>
                        <div><label>
                            <input type="<?= $relationship->multiple ? 'checkbox' : 'radio' ?>" class="uk-checkbox" value="<?= $option->id ?>" name="r<?= $relationship->id ?>">
                            <?= $option->value ?>
                        </label></div>
                    <?php endforeach; ?>
                </div>
            </div>
        <?php endforeach; ?>

        <div class="uk-margin">
            <div class="uk-form-controls">
                <button type="submit" class="uk-button uk-button-primary">Save Changes</button>
            </div>
        </div>

    </form>

{/body}
