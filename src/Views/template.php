<!DOCTYPE html>
<html lang="en" class="uk-height-1-1">
<head>
    {head}
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Clout Dashboard</title>
    <link href="<?= \GraftPHP\Clout\Settings::cloutURL()?>/_/style.css" rel="stylesheet">
    {css}
</head>
<body class="uk-height-1-1">

    <div class="uk-grid uk-height-1-1">

        <div class="uk-width-1-5 uk-height-1-1"
            style="background-color: #ddd">

            <h1>Clout</h1>

            <h4>Content</h4>
            <ul>
                <?php if($sections) : ?>
                    <?php foreach($sections as $section) : ?>
                    <li>
                        <a href="#">
                            <?= $section->name ?>
                            <span class="caret"></span>
                        </a>
                        <ul>
                            <li>
                                <a href="<?= \GraftPHP\Clout\Settings::cloutURL()?>/sections/<?= $section->slug ?>">
                                    View
                                </a>
                            </li>
                            <li>
                                <a href="<?= \GraftPHP\Clout\Settings::cloutURL()?>/sections/<?= $section->slug ?>/create">
                                    Add Record
                                </a>
                            </li>
                        </ul>
                    </li>
                    <?php endforeach ?>
                <?php endif; ?>
            </ul>

            <h4>System</h4>
            <ul>
                <li>
                    <a href="<?= \GraftPHP\Clout\Settings::cloutURL()?>/settings/sections">
                        Section Setup
                    </a>
                </li>
                <li>
                    <a href="<?= \GraftPHP\Clout\Settings::cloutURL()?>/sections/products/add">
                        System Settings
                    </a>
                </li>
                <li>
                    <a href="https://github.com/graftphp/clout/wiki">
                        Get help
                    </a>
                </li>
                <li>
                    <a href="https://github.com/graftphp/clout/issues" target="_blank">
                        Report a problem
                    </a>
                </li>
                <li>
                    <a href="<?= \GraftPHP\Clout\Settings::cloutURL()?>/logout">
                        Log out
                    </a>
                </li>
            </ul>

        </div>
        <div class="uk-width-4-5">
            {body}
        </div>

    </div>

    <script src="<?= \GraftPHP\Clout\Settings::cloutURL()?>/_/script.js"></script>
    {script}
</body>
</html>
