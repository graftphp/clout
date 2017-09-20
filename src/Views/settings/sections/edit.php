{template:template}

{body}

<h1>Update the <?= $section->name ?> Section</h1>

<form method="post" action="<?= \GraftPHP\Clout\Settings::cloutURL()?>/settings/sections/<?= $section->id ?>/update"
    class="uk-form uk-form-horizontal">

    <div>
        <label class="uk-form-label" for="name">
            Section Name
            <small><br />(use singular form if possible)</small>
        </label>
        <div class="uk-form-controls">
            <input type="text" name="name" class="uk-input" required value="<?=$section->name;?>">
        </div>
    </div>

    <hr />

    <h4>
        <button id="add-field" type="button" class="uk-button uk-button-primary uk-float-right">
            Add Field <i class="uk-icon-plus"></i>
        </button>
        Fields
    </h4>

    <table class="uk-table uk-margin-remove">
        <thead>
            <tr>
                <th>Name</th>
                <th width="200">Type</th>
                <th width="75">List?</th>
                <th width="30">Slug?</th>
                <th width="30"></th>
                <th width="30"></th>
            </tr>
        </thead>
    </table>

    <div id="fields-sortable" class="uk-sortable" data-uk-sortable="{handleClass:'uk-sortable-handle', dragCustomClass:'uk-hidden'}">
        <?php if ($section->fields()) : ?>
            <?php foreach($section->fields() as $field) : ?>
                <table class="uk-table">
                    <tbody>
                        <tr class="field uk-form">
                            <input type="hidden" name="field-id[]" value="<?= $field->id ?>">
                            <input type="hidden" name="field-order[]" class="field-order" value="<?= $field->order ?>">
                            <td>
                                <input type="text" name="field-name[]" class="uk-input" value="<?= $field->name ?>">
                            </td>
                            <td width="200">
                                <select name="field-type[]" class="uk-select">
                                    <?php foreach ($fieldtypes as $fieldtype): ?>
                                    <option value="<?=$fieldtype->id ?>" <?= $field->type == $fieldtype->id ? ' selected' : '' ?>>
                                        <?= $fieldtype->name ?>
                                    </option>
                                    <?php endforeach;?>
                                </select>
                            </td>
                            <td width="75">
                                <select name="field-list[]" class="uk-select">
                                    <option value="1" <?= $field->list ? 'selected' : '' ?>>Yes</option>
                                    <option value="0" <?= !$field->list ? 'selected' : '' ?>>No</option>
                                </select>
                            </td>
                            <td width="30" class="uk-text-center">
                                <input type="radio" name="slug" value="1" <?= $field->slug ? 'checked' : '' ?> class="uk-radio" required>
                                <input type="hidden" name="field-slug[]" value="<?= $field->slug ? '1' : '0' ?>">
                            </td>
                            <td width="30">
                                <button type="button" class="delete-field uk-icon-button uk-button-danger"
                                uk-icon="icon: trash"></button>
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
        <?php endif; ?>
    </div>

    <hr />

        <h4>
            <button id="add-relationship" type="button" class="uk-button uk-button-primary uk-float-right">
                Add Relationship <i class="uk-icon-plus"></i>
            </button>
            Relationships
        </h4>

        <table class="uk-table">
            <thead>
                <tr>
                    <th width="200">Name</th>
                    <th width="200">Section</th>
                    <th width="50">Multiple?</th>
                    <th width="50"></th>
                </tr>
            </thead>
        </table>
        <div id="relationships-sortable">
            <button id="delete-relationship" type="button" class="uk-icon-button uk-button-danger"
            uk-icon="icon: trash"></button>
        </div>

    <hr />

    <button type="submit" class="uk-button uk-button-success">Save Section</button>

</form>

<table id="field-template" class="uk-table" style="display: none;">
    <tr class="field">
        <input type="hidden" name="field-id[]" value="">
        <input type="hidden" name="field-order[]" class="field-order" value="">
        <td>
            <input type="text" name="field-name[]" class="field-id uk-input">
        </td>
        <td width="200">
            <select name="field-type[]" class="uk-width-1-1 uk-select">
                <?php foreach ($fieldtypes as $fieldtype): ?>
                <option value="<?=$fieldtype->id?>">
                    <?= $fieldtype->name ?>
                </option>
                <?php endforeach;?>
            </select>
        </td>
        <td width="75">
            <select name="field-list[]" class="uk-select">
                <option value="1">Yes</option>
                <option value="0">No</option>
            </select>
        </td>
        <td width="30" class="uk-text-center">
            <input type="radio" name="slug" class="uk-radio" required>
            <input type="hidden" name="field-slug[]" value="0">
        </td>
        <td width="30">
            <button type="button" class="delete-field uk-icon-button uk-button-danger"
            uk-icon="icon: trash"></button>
        </td>
        <td width="30">
            <div class="uk-sortable-handle">
                <i class="uk-text-muted uk-icon-bars uk-icon-medium"></i>
            </div>
        </td>
    </tr>
</table>

<table id="relationship-template" class="uk-table" style="display:none;">
    <tr class="relationship">
        <input type="hidden" name="relationship-id[]" value="">
        <td width="200">
            <input type="text" name="relationship-name[]" class="relationship-id uk-input">
        </td>
        <td width="200">
            <select name="relationship-section[]" class="uk-select">
                <?php foreach($sections as $section) : ?>
                    <option value="<?= $section->id ?>"><?= $section->name ?></option>
                <?php endforeach; ?>
            </select>
        </td>
        <td width="50">
            <select name="relationship-multiple[]" class="uk-select">
                <option value="1">Yes</option>
                <option value="0">No</option>
            </select>
        </td>
        <td width="50"></td>
    </tr>
</table>

{/body}

{script}
    <script>
        // fields section
        $('#add-field').on('click', function() {
            $('#field-template')
                .clone()
                .appendTo('#fields-sortable')
                .show()
                .attr('id', '');
            setOrderBy();
        });

        $('body').on('click', '.delete-field', function() {
            $(this).closest('.field').remove();
            setOrderBy();
        });

        $('body').on('click', "[name='slug']", function(){
            $("[name='field-slug[]'").val(0);
            $(this).next().val(1);
        });

        $("#fields-sortable").on('change.uk.sortable', function(event, sortable, dragged, action){
            setOrderBy();
        });

        function setOrderBy()
        {
            var order = 1;
            $('input.field-order').each(function(){
                $(this).val(order);
                order ++;
            });
        }

        // relationships section
        $('#add-relationship').on('click', function() {
            $('#relationship-template')
                .clone()
                .appendTo('#relationships-sortable')
                .show()
                .attr('id', '');
        });
    </script>
{/script}
