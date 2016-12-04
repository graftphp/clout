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
                <th width="200">Type</th>
                <th width="30"></th>
                <th width="30"></th>
            </tr>
        </thead>
    </table>
        <?php if ($section->fields()) : ?>

<div id="fields-sortable" class="uk-sortable" data-uk-sortable="{handleClass:'uk-sortable-handle', dragCustomClass:'uk-hidden'}">
            <?php foreach($section->fields() as $f) : ?>
    <table class="uk-table">
        <tbody class="fields">
            <tr class="field uk-form">
                <input type="hidden" name="field-id[]" value="<?= $f->id ?>">
                <td>
                    <input type="text" name="field-name[]" class="uk-width-1-1" value="<?= $f->name ?>">
                </td>
                <td width="200">
                    <select name="field-type[]" class="uk-width-1-1">
                        <?php foreach ($fieldtypes as $ft): ?>
                        <option value="<?=$ft->id ?>" <?= $f->type == $ft->id ? ' selected' : '' ?>>
                            <?= $ft->name ?>
                        </option>
                        <?php endforeach;?>
                    </select>
                </td>
                <td width="30">
                    <button id="delete-field" type="button" class="uk-button uk-button-danger">
                        <i class="uk-icon-trash"></i>
                    </button>
                </td>
                <td width="30">
                    <div class="uk-sortable-handle">
                        <i class="uk-text-muted uk-icon-bars uk-icon-medium"></i>
                    </div>
                </td>
            </tr>
        </tbody>
    </table>
            <?php endforeach; ?>
</div>
        <?php endif; ?>

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
        <td>
            <div class="uk-sortable-handle">
                <i class="uk-text-muted uk-icon-bars uk-icon-medium"></i>
            </div>
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

        var sortable;

        $(document).ready(function(){
            sortable = UIKit.sortable($('#fields-sortable'));
        });
    </script>
{/script}
