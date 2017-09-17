{template:template}

{body}

<h1>Create a Section</h1>

<form method="post" action="<?= \GraftPHP\Clout\Settings::cloutURL()?>/settings/sections/store"
    class="uk-form uk-form-horizontal">

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
