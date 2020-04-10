<div>
    <label class="uk-form-label uk-text-right@m" for="name">
        Section Name
    </label>
    <div class="uk-form-controls">
        <input type="text" name="name" class="uk-input uk-form-small" required value="<?=$section->name;?>">
    </div>
</div>
<div class="uk-margin-top">
    <div class="uk-form-controls">
        <button type="submit" class="uk-button uk-button-small uk-button-primary">Update</button>
        <a href="<?=clout_settings('clout_url')?>/settings/sections" class="uk-button uk-button-small uk-button-default">Cancel</a>
    </div>
</div>
