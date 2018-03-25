{template:template}

{body}

<h1>Create a Section</h1>

<form method="post" action="<?=clout_settings('clout_url')?>/settings/users/store"
    class="uk-form uk-form-horizontal">
    <?=csrf_field()?>
    <div>
        <label class="uk-form-label" for="name">
            Username
        </label>
        <div class="uk-form-controls">
            <input type="text" name="username" class="uk-input" required>
        </div>
    </div>
    <div>
        <label class="uk-form-label">
            Password
        </label>
        <div class="uk-form-controls">
            <input type="text" name="password" class="uk-input" required>
        </div>
    </div>
    <div>
        <label class="uk-form-label">
            Active?
        </label>
        <div class="uk-form-controls">
            <label><input class="uk-radio" type="radio" name="active" value="1" checked> Yes</label><br>
            <label><input class="uk-radio" type="radio" name="active" value="0"> No</label>
        </div>
    </div>
    <div class="uk-margin-top">
        <div class="uk-form-controls">
            <button type="submit" class="uk-button uk-button-primary">Create User</button>
        </div>
    </div>

</form>

{/body}
