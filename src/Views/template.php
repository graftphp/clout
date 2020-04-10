<!DOCTYPE html>
<html lang="en" class="uk-height-1-1">
    <head>
        {head}
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Clout<?=(!empty($title) ? ' | ' . $title : '') ?></title>
        <link href="<?=clout_settings('clout_url')?>/_/style.css" rel="stylesheet">
        <script src="<?=clout_settings('clout_url')?>/_/script.js"></script>
        <script>
            function initWysiwyg() {
                tinyMCE.baseURL = '<?=clout_settings('clout_url')?>/_/tinymce';
                tinymce.init({
                    height: 400,
                    menubar: false,
                    plugins: "link lists paste table",
                    paste_as_text: true,
                    selector: '.wysiwyg',
                    toolbar: '<?=clout_settings('wysiwyg_config')?>',
                });
            }
            initWysiwyg();
        </script>
        {css}
    </head>
    <body class="uk-height-1-1">

        <div class="uk-height-1-1 uk-grid-collapse" uk-grid>

            <div class="uk-width-1-1 uk-background-primary uk-light uk-padding-small ">

                <a href="<?=clout_settings('clout_url')?>" class="uk-text-bold">Clout</a>

                <div class="uk-float-right uk-text-small">

                    <a href="https://github.com/graftphp/clout/wiki" target="_blank" class="uk-margin-small-left"
                    ><span uk-tooltip="Get Help" uk-icon="icon: info"></span></a>

                    <a href="https://github.com/graftphp/clout/issues" target="_blank" class="uk-margin-small-left"
                    ><span uk-tooltip="Report a problem" uk-icon="icon: warning"></span></a>

                    <a href="<?=clout_settings('clout_url') . '/logout'?>" class="uk-margin-small-left"
                    ><span uk-tooltip="Log Out" uk-icon="icon: sign-out"></span></a>

                </div>

            </div>

            <div class="uk-width-auto uk-height-1-1">
                <?php require 'components/nav.php'?>
            </div>

            <div class="uk-width-expand">

                <div class="uk-background-muted">
                    <span class="uk-margin-small-left">{title}</span>
                </div>

                <div class="uk-container uk-container-center uk-padding-small">
                    {body}
                </div>

            </div>

        </div>

        {script}
    </body>
</html>
