{template:template}

{title}Create a Section{/title}

{body}

<form method="post" action="<?=clout_settings('clout_url')?>/settings/sections/store"
    class="uk-form uk-form-horizontal">
    <?=csrf_field()?>
    <div>
        <label class="uk-form-label" for="name">
            Section Name
        </label>
        <div class="uk-form-controls">
            <input type="text" name="name" class="uk-input uk-form-small" placeholder="eg. Blog.." autofocus required>
        </div>
    </div>
    <div class="uk-margin-top">
        <div class="uk-form-label uk-margin-remove">
            <a href="<?=clout_settings('clout_url')?>/settings/users" class="uk-button uk-button-small uk-button-default">Cancel</a>
        </div>
        <div class="uk-form-controls">
            <button type="submit" class="uk-button uk-button-primary uk-button-small">
                Create
            </button>
        </div>
    </div>

</form>

{/body}
