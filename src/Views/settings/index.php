{template:template}

{title}System Settings{/title}

{body}

    <div class="uk-overflow-container">
        <form method="post" action="<?=clout_settings('clout_url')?>/settings/update">
            <?=csrf_field()?>
            <table class="uk-table uk-table-small uk-table-strpied uk-table-hover">
                <thead>
                    <tr>
                        <th width="140">Setting</th>
                        <th>Value</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($settings as $_setting): ?>
                    <tr>
                        <td><?=$_setting->label?></td>
                        <td>
                            <textarea
                                class="uk-textarea"
                                name="<?=$_setting->id?>"
                            ><?=$_setting->value?></textarea>
                        </td>
                    </tr>
                    <?php endforeach;?>
                </tbody>
            </table>
            <button type="submit" class="uk-button uk-button-primary">Save Settings</button>
        </form>
    </div>

{/body}
