{template:template}

{title}Create a User{/title}

{body}

<form method="post" action="<?=clout_settings('clout_url')?>/settings/users/store"
    class="uk-form uk-form-horizontal">
    <?=csrf_field()?>
    <div>
        <label class="uk-form-label uk-text-right@m" for="name">
            Username
        </label>
        <div class="uk-form-controls">
            <input type="text" name="username" class="uk-input uk-form-small" autofocus required>
        </div>
    </div>
    <div class="uk-margin-top">
        <label class="uk-form-label uk-text-right@m">
            Password
        </label>
        <div class="uk-form-controls">
            <input type="password" name="password" class="uk-input uk-form-small" required>
        </div>
    </div>
    <div class="uk-margin-top">
        <label class="uk-form-label uk-text-right@m">
            Active?
        </label>
        <div class="uk-form-controls">
            <label><input class="uk-radio" type="radio" name="active" value="1" checked> Yes</label><br>
            <label><input class="uk-radio" type="radio" name="active" value="0"> No</label>
        </div>
    </div>
    <div class="uk-margin-top">
        <div class="uk-form-controls">
            <button type="submit" class="uk-button uk-button-small uk-button-primary">Create User</button>
            <a href="<?=clout_settings('clout_url')?>/settings/users" class="uk-button uk-button-small uk-button-default">Cancel</a>
        </div>
    </div>

</form>

{/body}
