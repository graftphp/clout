{template:template}

{title}Update <?=$user->username?> User{/title}

{body}

<form method="post" action="<?=clout_settings('clout_url')?>/settings/users/<?=$user->id?>/update"
    class="uk-form uk-form-horizontal">
    <?=csrf_field()?>
    <div>
        <label class="uk-form-label uk-text-right@m" for="name">
            Username
        </label>
        <div class="uk-form-controls">
            <input type="text" name="username" class="uk-input uk-form-small" required
            value="<?=$user->username?>">
        </div>
    </div>
    <div class="uk-margin-top">
        <label class="uk-form-label uk-text-right@m" for="password">
            Password
        </label>
        <div class="uk-form-controls">
            <input type="text" name="password" class="uk-input uk-form-small"><br />
            <small>(leave blank to keep current password)</small>
        </div>
    </div>
    <?php if ($user->id != 1): ?>
    <div class="uk-margin-top">
        <label class="uk-form-label uk-text-right@m">
            Active?
        </label>
        <div class="uk-form-controls">
            <label><input class="uk-radio" type="radio" name="active" value="1"
                <?=$user->active == 1 ? 'checked' : ''?>> Yes</label><br>
            <label><input class="uk-radio" type="radio" name="active" value="0"
                <?=$user->active == 0 ? 'checked' : ''?>> No</label>
        </div>
    </div>
    <?php endif;?>
    <div class="uk-margin-top">
        <div class="uk-form-controls">
            <button type="submit" class="uk-button uk-button-small uk-button-primary">Update</button>
            <a href="<?=clout_settings('clout_url')?>/settings/users" class="uk-button uk-button-small uk-button-default">Cancel</a>
        </div>
    </div>

</form>

{/body}
