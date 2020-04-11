<table class="uk-table uk-margin-remove">
    <thead>
        <tr>
            <th width="30"></th>
            <th>Name</th>
            <th width="200">Type</th>
            <th width="75">List?</th>
            <th width="30">Slug?</th>
            <th width="30"></th>
        </tr>
    </thead>
    <tbody id="fields-sortable" uk-sortable="handle: .uk-sortable-handle">
        <?php foreach($section->fields() as $_field): ?>
            <tr class="field">
                <input type="hidden" name="field-id[]" value="<?=$_field->id?>">
                <input type="hidden" name="field-order[]" class="field-order" value="<?=$_field->order?>">
                <td>
                    <span class="uk-sortable-handle uk-margin-small-right" uk-icon="icon: table"></span>
                </td>
                <td>
                    <input type="text" name="field-name[]" class="uk-input uk-form-small" value="<?=$_field->name?>">
                </td>
                <td>
                    <select name="field-type[]" class="uk-select uk-form-small">
                        <?php foreach ($fieldtypes as $_fieldtype): ?>
                        <option value="<?=$_fieldtype->id?>" <?=$_field->type == $_fieldtype->id ? ' selected' : ''?>>
                            <?=$_fieldtype->name?>
                        </option>
                        <?php endforeach;?>
                    </select>
                </td>
                <td>
                    <select name="field-list[]" class="uk-select uk-form-small">
                        <option value="1" <?=$_field->list ? 'selected' : ''?>>Yes</option>
                        <option value="0" <?=!$_field->list ? 'selected' : ''?>>No</option>
                    </select>
                </td>
                <td class="uk-text-center">
                    <input type="radio" name="slug" value="1" <?=$_field->slug ? 'checked' : ''?> class="uk-radio" required>
                    <input type="hidden" name="field-slug[]" value="<?=$_field->slug ? '1' : '0'?>">
                </td>
                <td width="30">
                    <button type="button" class="delete-field uk-text-danger"
                    uk-icon="icon: trash"></button>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>

<button id="add-field" type="button" class="uk-button uk-button-small uk-button-primary">
    Add Field
</button>

<table class="uk-table" style="display: none;">
    <tr id="field-template" class="field">
        <input type="hidden" name="field-id[]" value="">
        <input type="hidden" name="field-order[]" class="field-order" value="">
        <td>
            <span class="uk-sortable-handle uk-margin-small-right" uk-icon="icon: table"></span>
        </td>
        <td>
            <input type="text" name="field-name[]" class="field-id uk-input uk-form-small">
        </td>
        <td width="200">
            <select name="field-type[]" class="uk-width-1-1 uk-select uk-form-small">
                <?php foreach ($fieldtypes as $_fieldtype): ?>
                <option value="<?=$_fieldtype->id?>">
                    <?=$_fieldtype->name?>
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
    </tr>
</table>
