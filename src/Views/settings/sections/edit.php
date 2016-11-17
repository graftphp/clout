{template:template}

{body}

    <h1>Update a Section</h1>

    <form method="post" action="/clout/settings/sections/update?<?= $section->id ?>">
        <div class="form-group">
            <label for="name">Section Name</label>
            <input type="text" name="name" class="form-control" required
                value="<?=$section->name;?>">
        </div>
        <div class="form-group fields">

            <button id="add-field" type="button" class="btn btn-xs btn-default btn-success pull-right">
                Add Field <span class="glyphicon glyphicon-plus"></span>
            </button>
            <label for="fields">Fields</label>

            <div id="field-template" class="field" style="display:none;">
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
                                    <option value="<?=$ft->id?>"><?= $ft->name ?></option>
                                    <?php endforeach;?>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php foreach($section->sectionFields() as $f) : ?>
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
                                    <option value="<?=$ft->id ?>"><?= $ft->name ?></option>
                                    <?php endforeach;?>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php endforeach; ?>
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
