<table class="uk-table uk-margin-remove">
    <thead>
        <tr>
            <th width="200">Name</th>
            <th width="200">Section</th>
            <th width="50">Multiple?</th>
            <th width="30"></th>
        </tr>
    </thead>
    <tbody id="relationships-sortable">
        <?php foreach ($section->relationships() as $relationship): ?>
            <tr class="relationship">
                <input type="hidden" name="relationship-id[]" value="<?=$relationship->id?>">
                <td>
                    <input type="text" name="relationship-name[]" value="<?=$relationship->name?>" class="relationship-id uk-input uk-form-small">
                </td>
                <td>
                    <select name="relationship-section[]" class="uk-select uk-form-small">
                        <?php foreach ($sections as $section): ?>
                            <option value="<?=$section->id?>"
                                <?=$relationship->child_section == $section->id ? ' selected' : ''?>>
                                <?=$section->name?>
                            </option>
                        <?php endforeach;?>
                    </select>
                </td>
                <td>
                    <select name="relationship-multiple[]" class="uk-select uk-form-small">
                        <option value="1" <?=$relationship->multiple ? ' selected' : ''?>>Yes</option>
                        <option value="0" <?=!$relationship->multiple ? ' selected' : ''?>>No</option>
                    </select>
                </td>
                <td>
                    <button id="delete-relationship" type="button" class="uk-text-danger"
                    uk-icon="icon: trash"></button>
                </td>
            </tr>
        <?php endforeach;?>
    </tbody>
</table>

<button id="add-relationship" type="button" class="uk-button uk-button-small uk-button-primary">
    Add Relationship
</button>

<table style="display:none;">
    <tr id="relationship-template" class="relationship">
        <input type="hidden" name="relationship-id[]" value="">
        <td>
            <input type="text" name="relationship-name[]" class="relationship-id uk-input uk-form-small">
        </td>
        <td>
            <select name="relationship-section[]" class="uk-select uk-form-small">
                <?php foreach ($sections as $section): ?>
                    <option value="<?=$section->id?>"><?=$section->name?></option>
                <?php endforeach;?>
            </select>
        </td>
        <td>
            <select name="relationship-multiple[]" class="uk-select uk-form-small">
                <option value="1">Yes</option>
                <option value="0">No</option>
            </select>
        </td>
        <td>
            <button id="delete-relationship" type="button" class="uk-text-danger"
            uk-icon="icon: trash"></button>
        </td>
    </tr>
</table>
