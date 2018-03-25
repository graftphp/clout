{template:template}

{body}

<h1>Create a Section</h1>

<form method="post" action="<?=clout_settings('clout_url')?>/settings/sections/store"
    class="uk-form uk-form-horizontal">
    <?=csrf_field()?>
    <div>
        <label class="uk-form-label" for="name">
            Section Name
            <small><br />(use singular form if possible)</small>
        </label>
        <div class="uk-form-controls">
            <input type="text" name="name" class="uk-input" placeholder="eg. Blog.." required>
        </div>
    </div>
    <div class="uk-margin-top">
        <div class="uk-form-controls">
            <button type="submit" class="uk-button uk-button-primary">Create Section</button>
        </div>
    </div>

</form>

{/body}
