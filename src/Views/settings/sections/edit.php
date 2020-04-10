{template:template}

{title}Update the <?=$section->name?> Section{/title}

{body}

<form method="post" action="<?=clout_settings('clout_url')?>/settings/sections/<?=$section->id?>/update"
    class="uk-form uk-form-horizontal">
    <?=csrf_field()?>

    <ul uk-tab>
        <li><a href="#">Properties</a></li>
        <li><a href="#">Fields</a></li>
        <li><a href="#">Relationships</a></li>
    </ul>

    <ul class="uk-switcher uk-margin">
        <li>
            <?php require 'edit-properties.php'; ?>
        </li>
        <li>
            <?php require 'edit-fields.php'; ?>
        </li>
        <li>
            <?php require 'edit-relationships.php'; ?>
        </li>
    </ul>

</form>

{/body}

{script}
    <script>
        // fields section
        $('#add-field').on('click', function() {
            $('#field-template')
                .clone()
                .appendTo('#fields-sortable')
                .show()
                .attr('id', '');
            setOrderBy();
        });

        $('body').on('click', '.delete-field', function() {
            $(this).closest('.field').remove();
            setOrderBy();
        });

        $('body').on('click', "[name='slug']", function(){
            $("[name='field-slug[]'").val(0);
            $(this).next().val(1);
        });

        $("#fields-sortable").on('change.uk.sortable', function(event, sortable, dragged, action){
            setOrderBy();
        });

        function setOrderBy()
        {
            var order = 1;
            $('input.field-order').each(function(){
                $(this).val(order);
                order ++;
            });
        }

        // relationships section
        $('#add-relationship').on('click', function() {
            $('#relationship-template')
                .clone()
                .appendTo('#relationships-sortable')
                .show()
                .attr('id', '');
        });
    </script>
{/script}
