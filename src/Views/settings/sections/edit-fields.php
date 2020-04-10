<table class="uk-table uk-margin-remove">
    <thead>
        <tr>
            <th>Name</th>
            <th width="200">Type</th>
            <th width="75">List?</th>
            <th width="30">Slug?</th>
            <th width="30"></th>
            <th width="30">
            </th>
        </tr>
    </thead>
</table>

<div id="fields-sortable" class="uk-sortable" data-uk-sortable="{handleClass:'uk-sortable-handle', dragCustomClass:'uk-hidden'}">
    <?php if ($section->fields()): ?>
        <?php foreach ($section->fields() as $field): ?>
            <table class="uk-table">
                <tbody>
                    <tr class="field uk-form">
                        <input type="hidden" name="field-id[]" value="<?=$field->id?>">
                        <input type="hidden" name="field-order[]" class="field-order" value="<?=$field->order?>">
                        <td>
                            <input type="text" name="field-name[]" class="uk-input" value="<?=$field->name?>">
                        </td>
                        <td width="200">
                            <select name="field-type[]" class="uk-select">
                                <?php foreach ($fieldtypes as $fieldtype): ?>
                                <option value="<?=$fieldtype->id?>" <?=$field->type == $fieldtype->id ? ' selected' : ''?>>
                                    <?=$fieldtype->name?>
                                </option>
                                <?php endforeach;?>
                            </select>
                        </td>
                        <td width="75">
                            <select name="field-list[]" class="uk-select">
                                <option value="1" <?=$field->list ? 'selected' : ''?>>Yes</option>
                                <option value="0" <?=!$field->list ? 'selected' : ''?>>No</option>
                            </select>
                        </td>
                        <td width="30" class="uk-text-center">
                            <input type="radio" name="slug" value="1" <?=$field->slug ? 'checked' : ''?> class="uk-radio" required>
                            <input type="hidden" name="field-slug[]" value="<?=$field->slug ? '1' : '0'?>">
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
        <?php endforeach;?>
    <?php endif;?>
</div>

<button id="add-field" type="button" class="uk-button uk-button-small uk-button-primary">
    Add Field
</button>

<table id="field-template" class="uk-table" style="display: none;">
    <tr class="field">
        <input type="hidden" name="field-id[]" value="">
        <input type="hidden" name="field-order[]" class="field-order" value="">
        <td>
            <input type="text" name="field-name[]" class="field-id uk-input uk-form-small">
        </td>
        <td width="200">
            <select name="field-type[]" class="uk-width-1-1 uk-select uk-form-small">
                <?php foreach ($fieldtypes as $fieldtype): ?>
                <option value="<?=$fieldtype->id?>">
                    <?=$fieldtype->name?>
                </option>
                <?php endforeach;?>
            </select>
        </td>
        <td width="75">
            <select name="field-list[]" class="uk-select uk-form-small">
                <option value="1">Yes</option>
                <option value="0">No</option>
            </select>
        </td>
        <td width="30" class="uk-text-center">
            <input type="radio" name="slug" class="uk-radio" required>
            <input type="hidden" name="field-slug[]" value="0">
        </td>
        <td width="30">
            <button type="button" class="delete-field uk-text-danger"
            uk-icon="icon: trash"></button>
        </td>
        <td width="30">
            <div class="uk-sortable-handle">
                <i class="uk-text-muted uk-icon-bars uk-icon-medium"></i>
            </div>
        </td>
    </tr>
</table>
