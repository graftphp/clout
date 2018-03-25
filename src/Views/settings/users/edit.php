{template:template}

{body}

<h1>Update <?=$user->username?> User</h1>

<form method="post" action="<?=clout_settings('clout_url')?>/settings/users/<?=$user->id?>/update"
    class="uk-form uk-form-horizontal">
    <?=csrf_field()?>
    <div>
        <label class="uk-form-label" for="name">
            Username
        </label>
        <div class="uk-form-controls">
            <input type="text" name="username" class="uk-input" required
            value="<?=$user->username?>">
        </div>
    </div>
    <div>
        <label class="uk-form-label">
            Password
        </label>
        <div class="uk-form-controls">
            <input type="text" name="password" class="uk-input"><br />
            <small>(leave blank to keep current password)</small>
        </div>
    </div>
    <?php if ($user->id != 1): ?>
    <div>
        <label class="uk-form-label">
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
            <button type="submit" class="uk-button uk-button-primary">Update User</button>
        </div>
    </div>

</form>

{/body}
