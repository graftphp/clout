{template:template}

{body}

    <h1>Create a Section</h1>

    <form method="post" action="<?= \GraftPHP\Clout\Settings::cloutURL()?>/sections/store">
        <div class="form-group">
            <label for="name">Section Name</label>
            <input type="text" name="name" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-primary">Create Section</button>
    </form>

{/body}
