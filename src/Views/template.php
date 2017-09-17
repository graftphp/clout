<!DOCTYPE html>
<html lang="en" class="uk-height-1-1">
<head>
    {head}
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Clout Dashboard</title>
    <link href="<?= \GraftPHP\Clout\Settings::cloutURL()?>/_/style.css" rel="stylesheet">
    <script src="<?= \GraftPHP\Clout\Settings::cloutURL()?>/_/script.js"></script>
    {css}
</head>
<body class="uk-height-1-1">

    <div class="uk-grid uk-height-1-1">

        <div class="uk-width-auto uk-height-1-1">
            <?php require('components/nav.php') ?>
        </div>

        <div class="uk-width-expand">
            <div class="uk-container uk-container-center uk-padding">
                {body}
            </div>
        </div>

    </div>

    {script}
</body>
</html>
