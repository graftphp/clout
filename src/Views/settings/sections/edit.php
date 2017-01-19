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

    <hr />

    <h4>
        <button id="add-field" type="button" class="uk-button uk-button-primary uk-float-right">
            Add Field <i class="uk-icon-plus"></i>
        </button>
        Fields
    </h4>

    <table class="uk-table">
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
                                <input type="text" name="field-name[]" class="uk-width-1-1" value="<?= $field->name ?>">
                            </td>
                            <td width="200">
                                <select name="field-type[]" class="uk-width-1-1">
                                    <?php foreach ($fieldtypes as $fieldtype): ?>
                                    <option value="<?=$fieldtype->id ?>" <?= $field->type == $fieldtype->id ? ' selected' : '' ?>>
                                        <?= $fieldtype->name ?>
                                    </option>
                                    <?php endforeach;?>
                                </select>
                            </td>
                            <td width="75">
                                <select name="field-list[]">
                                    <option value="1" <?= $field->list ? 'selected' : '' ?>>Yes</option>
                                    <option value="0" <?= !$field->list ? 'selected' : '' ?>>No</option>
                                </select>
                            </td>
                            <td width="30" class="uk-text-center">
                                <input type="radio" name="slug" value="1" <?= $field->slug ? 'checked' : '' ?> required>
                                <input type="hidden" name="field-slug[]" value="<?= $field->slug ? '1' : '0' ?>">
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
                    <th>Name</th>
                    <th>Section</th>
                    <th>Multiple?</th>
                    <th></th>
                </tr>
            </thead>
        </table>
        <div id="relationships-sortable">
        </div>

    <hr />

    <button type="submit" class="uk-button uk-button-success">Save Section</button>

</form>

<table id="field-template" class="uk-table" style="display: none;">
    <tr class="field">
        <input type="hidden" name="field-id[]" value="">
        <input type="hidden" name="field-order[]" class="field-order" value="">
        <td>
            <input type="text" name="field-name[]" class="field-id uk-width-1-1">
        </td>
        <td width="200">
            <select name="field-type[]" class="uk-width-1-1">
                <?php foreach ($fieldtypes as $fieldtype): ?>
                <option value="<?=$fieldtype->id?>">
                    <?= $fieldtype->name ?>
                </option>
                <?php endforeach;?>
            </select>
        </td>
        <td width="75">
            <select name="field-list[]">
                <option value="1">Yes</option>
                <option value="0">No</option>
            </select>
        </td>
        <td width="30" class="uk-text-center">
            <input type="radio" name="slug" required>
            <input type="hidden" name="field-slug[]" value="0">
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
</table>

<table id="relationship-template" class="uk-table" style="display:none;">
    <tr class="relationship">
        <input type="hidden" name="relationship-id[]" value="">
        <td>
            <input type="text" name="relationship-name[]" class="relationship-id uk-width-1-1">
        </td>
        <td>
            <select name="relationship-section[]">
                <?php foreach($sections as $section) : ?>
                    <option value="<?= $section->id ?>"><?= $section->name ?></option>
                <?php endforeach; ?>
            </select>
        </td>
        <td>
            <select name="relationship-multiple[]">
                <option value="1">Yes</option>
                <option value="0">No</option>
            </select>
        </td>
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

        $('body').on('click', '#delete-field', function() {
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
