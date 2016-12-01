{template:template}

{body}

    <form method="post" action="<?= \GraftPHP\Clout\Settings::cloutURL()?>/sections/<?= $section->slug ?>/update"
        class="uk-form uk-form-stacked">
        <fieldset>
            <legend>Update the <?= $section->name ?> Section</legend>
            <div class="uk-form-row">
                <label class="uk-form-label" for="name">Section Name</label>
                <input type="text" name="name" class="form-control" required
                    value="<?=$section->name;?>">
            </div>
        </fieldset>

        <h4>Fields</h4>

        <table class="uk-table uk-table-striped">
            <tbody class="fields">
            </tbody>
        </table>

        <button id="add-field" type="button" class="uk-button uk-button-primary">
            Add Field <i class="uk-icon-plus"></i>
        </button>

        <div class="form-group fields">


            <tr id="field-template" class="field" style="display:none;">
                <input type="hidden" name="field-id[]" value="">
                <div class="form-inline">
                    <div class="panel panel-default">
                        <div class="panel-body">
                            <button id="delete-field" type="button" class="btn btn-danger pull-right">
                                <span class="glyphicon glyphicon-trash"></span>
                            </button>
                            <div class="form-group">
                                <label>Name</label>
                                <input type="text" name="field-name[]" class="form-control">
                                <label>Type</label>
                                <select name="field-type[]" class="form-control">
                                    <?php foreach ($fieldtypes as $ft): ?>
                                    <option value="<?=$ft->id?>">
                                        <?= $ft->name ?>
                                    </option>
                                    <?php endforeach;?>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
            </tr>
            <?php if ($section->fields()) : ?>
                <?php foreach($section->fields() as $f) : ?>
                <div class="field">
                    <input type="hidden" name="field-id[]" value="<?= $f->id ?>">
                    <div class="form-inline">
                        <div class="panel panel-default">
                            <div class="panel-body">
                                <button id="delete-field" type="button" class="btn btn-danger pull-right">
                                    <span class="glyphicon glyphicon-trash"></span>
                                </button>
                                <div class="form-group">
                                    <label>Name</label>
                                    <input type="text" name="field-name[]" class="form-control" value="<?= $f->name ?>">
                                    <label>Type</label>
                                    <select name="field-type[]" class="form-control">
                                        <?php foreach ($fieldtypes as $ft): ?>
                                        <option value="<?=$ft->id ?>" <?= $f->type == $ft->id ? ' selected' : '' ?>>
                                            <?= $ft->name ?>
                                        </option>
                                        <?php endforeach;?>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <?php endforeach; ?>
            <?php endif; ?>
        </div>
        <div>
            <button type="submit" class="btn btn-primary">Save Section</button>
        </div>
    </form>

{/body}

{script}
    <script>
        $('#add-field').on('click', function() {
            $('#field-template')
                .clone()
                .appendTo('.fields')
                .show()
                .attr('id','');
        });

        $('body').on('click', '#delete-field', function() {
            $(this).closest('.field').remove();
        });
    </script>
{/script}
