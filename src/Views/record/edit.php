{template:template}

{body}

    <h1>Edit <?= $section->name ?></h1>

    <form method="post" action="<?= \GraftPHP\Clout\Settings::cloutURL()?>/sections/<?= $section->slug ?>/<?= $record->id ?>/update"
        class="uk-form uk-form-horizontal"  enctype="multipart/form-data">

        <?php foreach ($section->fields() as $field) : ?>
            <div id="field-<?= $field->id ?>" class="uk-margin">
                <div>
                    <label class="uk-form-label for="f<?= $field->id ?>"><?= $field->name ?></label>
                    <div class="uk-form-controls">
                    <?= \GraftPHP\Clout\Fieldtype::render($field->type, 'f' . $field->id, $record->{$field->name}) ?>
                    <?php if ($field->type == 8 && !empty($record->{$field->name})) : ?>
                        <div id="images-<?= $field->id ?>">
                            <div>
                                <?php foreach (json_decode($record->{$field->name}) as $_image) : ?>
                                    <img src="<?= \GraftPHP\Clout\Settings::storageURL()?>/<?= $record->id ?>/<?= $field->id ?>/<?= $_image->file ?>"
                                        width="100" />
                                <?php endforeach; ?>
                            </div>
                        </div>
                    <?php endif; ?>
                    </div>
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
                            <input type="<?= $relationship->multiple ? 'checkbox' : 'radio' ?>"
                                class="uk-checkbox" value="<?= $option->id ?>" name="r<?= $relationship->id ?>[]">
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

{script}
<?php foreach ($section->fields() as $field) : ?>
<?php if ($field->type == 7 || $field->type == 8) : ?>
<script>
$(function() { $.ajaxSetup({ cache: false }); });

    var bar = document.getElementById('bar-<?= $field->id ?>');

    UIkit.upload('#upload-<?= $field->id ?>', {

        url: '<?= \GraftPHP\Clout\Settings::cloutURL()?>/upload/<?= $record->id ?>/<?= $field->id ?>',
        multiple: false,
        loadStart: function (e) {
            console.log('loadStart', arguments);

            bar.removeAttribute('hidden');
            bar.max = e.total;
            bar.value = e.loaded;
        },
        progress: function (e) {
            bar.max = e.total;
            bar.value = e.loaded;
        },
        loadEnd: function (e) {
            bar.max = e.total;
            bar.value = e.loaded;
        },
        completeAll: function () {
            console.log('complete');
            $('#images-<?= $field->id ?>').load('/clout/sections/portfolio/<?= $record->id ?>/edit #images-<?= $field->id ?> div');
            setTimeout(function () {
                bar.setAttribute('hidden', 'hidden');
            }, 1000);
        }

    });

</script>
<?php endif; ?>
<?php endforeach; ?>
{/script}
