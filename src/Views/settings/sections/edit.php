{template:template}

{body}

<form method="post" action="<?= \GraftPHP\Clout\Settings::cloutURL()?>/settings/sections/<?= $section->id ?>/update"
    class="uk-form uk-form-stacked">
    <fieldset>
        <legend>Update the <?= $section->name ?> Section</legend>
        <div class="uk-form-row">
            <label class="uk-form-label" for="name">Section Name</label>
            <input type="text" name="name" class="uk-width-1-1" required
                value="<?=$section->name;?>">
        </div>
    </fieldset>

    <h4>
        <button id="add-field" type="button" class="uk-button uk-button-primary uk-float-right">
            Add Field <i class="uk-icon-plus"></i>
        </button>
        Fields
    </h4>

    <table class="uk-table uk-table-striped">
        <thead>
            <tr>
                <th>Name</th>
                <th>Type</th>
                <th></th>
            </tr>
        </thead>
        <?php if ($section->fields()) : ?>
        <tbody class="fields">

            <?php foreach($section->fields() as $f) : ?>
            <tr class="field">
                <input type="hidden" name="field-id[]" value="<?= $f->id ?>">
                <td>
                    <input type="text" name="field-name[]" class="uk-width-1-1" value="<?= $f->name ?>">
                </td>
                <td>
                    <select name="field-type[]" class="uk-width-1-1">
                        <?php foreach ($fieldtypes as $ft): ?>
                        <option value="<?=$ft->id ?>" <?= $f->type == $ft->id ? ' selected' : '' ?>>
                            <?= $ft->name ?>
                        </option>
                        <?php endforeach;?>
                    </select>
                </td>
                <td>
                    <button id="delete-field" type="button" class="uk-button uk-button-danger">
                        <i class="uk-icon-trash"></i>
                    </button>
                </td>
            </tr>
            <?php endforeach; ?>

        </tbody>
        <?php endif; ?>
    </table>

    <button type="submit" class="uk-button uk-button-success">Save Section</button>

</form>

<table style="display: none;">
    <tr id="field-template" class="field">
        <input type="hidden" name="field-id[]" value="">
        <td>
            <input type="text" name="field-name[]" class="uk-width-1-1">
        </td>
        <td>
            <select name="field-type[]" class="uk-width-1-1">
                <?php foreach ($fieldtypes as $ft): ?>
                <option value="<?=$ft->id?>">
                    <?= $ft->name ?>
                </option>
                <?php endforeach;?>
            </select>
        </td>
        <td>
            <button id="delete-field" type="button" class="uk-button uk-button-danger">
                <i class="uk-icon-trash"></i>
            </button>
        </td>
    </tr>
</table>
{/body}

{script}
    <script>
        $('#add-field').on('click', function() {
            $('#field-template')
                .clone()
                .appendTo('.fields')
                .show()
                .attr('id','');
        });

        $('body').on('click', '#delete-field', function() {
            $(this).closest('.field').remove();
        });
    </script>
{/script}
