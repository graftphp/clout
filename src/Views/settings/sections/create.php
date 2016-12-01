{template:template}

{body}

<form method="post" action="<?= \GraftPHP\Clout\Settings::cloutURL()?>/settings/sections/store"
    class="uk-form uk-form-stacked">
    <fieldset>
        <legend>Create a Section</legend>
        <div class="uk-form-row">
            <label class="uk-form-label" for="name">Section Name</label>
            <input type="text" name="name" class="form-control" placeholder="Blog.." required>
        </div>
        <div class="uk-form-row">
            <button type="submit" class="uk-button uk-button-primary">Create Section</button>
        </div>
    </fieldset>
</form>

{/body}
