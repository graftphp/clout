<table class="uk-table">
    <thead>
        <tr>
            <th width="200">Name</th>
            <th width="200">Section</th>
            <th width="50">Multiple?</th>
            <th width="50">
                <button id="add-relationship" type="button" class="uk-button uk-button-small uk-button-primary">
                    Add Relationship
                </button>
            </th>
        </tr>
    </thead>
</table>
<div id="relationships-sortable">
    <?php if ($section->relationships()): ?>
        <?php foreach ($section->relationships() as $relationship): ?>
        <table class="uk-table">
            <tr class="relationship">
                <input type="hidden" name="relationship-id[]" value="<?=$relationship->id?>">
                <td width="200">
                    <input type="text" name="relationship-name[]" value="<?=$relationship->name?>" class="relationship-id uk-input">
                </td>
                <td width="200">
                    <select name="relationship-section[]" class="uk-select">
                        <?php foreach ($sections as $section): ?>
                            <option value="<?=$section->id?>"
                                <?=$relationship->child_section == $section->id ? ' selected' : ''?>>
                                <?=$section->name?>
                            </option>
                        <?php endforeach;?>
                    </select>
                </td>
                <td width="50">
                    <select name="relationship-multiple[]" class="uk-select">
                        <option value="1" <?=$relationship->multiple ? ' selected' : ''?>>Yes</option>
                        <option value="0" <?=!$relationship->multiple ? ' selected' : ''?>>No</option>
                    </select>
                </td>
                <td width="50">
                    <button id="delete-relationship" type="button" class="uk-icon-button uk-button-danger"
                    uk-icon="icon: trash"></button>
                </td>
            </tr>
        </table>
        <?php endforeach;?>
    <?php endif;?>
</div>

<table id="relationship-template" class="uk-table" style="display:none;">
    <tr class="relationship">
        <input type="hidden" name="relationship-id[]" value="">
        <td width="200">
            <input type="text" name="relationship-name[]" class="relationship-id uk-input">
        </td>
        <td width="200">
            <select name="relationship-section[]" class="uk-select">
                <?php foreach ($sections as $section): ?>
                    <option value="<?=$section->id?>"><?=$section->name?></option>
                <?php endforeach;?>
            </select>
        </td>
        <td width="50">
            <select name="relationship-multiple[]" class="uk-select">
                <option value="1">Yes</option>
                <option value="0">No</option>
            </select>
        </td>
        <td width="50">
            <button id="delete-relationship" type="button" class="uk-icon-button uk-button-danger"
            uk-icon="icon: trash"></button>
        </td>
    </tr>
</table>
