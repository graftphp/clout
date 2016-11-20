<!DOCTYPE html>
<html lang="en" class="uk-height-1-1">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Clout Login</title>

    <link href="<?= \GraftPHP\Clout\Settings::cloutURL()?>/_/style.css" rel="stylesheet">

</head>

<body class="uk-height-1-1">

    <div class="uk-vertical-align uk-text-center uk-height-1-1">
        <div class="uk-vertical-align-middle" style="width: 250px;">

            <form method="post" action="<?= \GraftPHP\Clout\Settings::cloutURL()?>/login" class="uk-panel uk-panel-box uk-form">
                <h1>Clout</h1>
                <div class="uk-form-row">
                    <input class="uk-width-1-1 uk-form-large" type="text" name="username" placeholder="Username" value="<?=isset($username)?$username:''?>" required>
                </div>
                <div class="uk-form-row">
                    <input class="uk-width-1-1 uk-form-large" type="password" name="password" placeholder="Password">
                </div>
                <div class="uk-form-row">
                    <button type="submit" class="uk-width-1-1 uk-button uk-button-primary uk-button-large">Login</button>
                </div>
            </form>

        </div>
    </div>

</body>

<script src="<?= \GraftPHP\Clout\Settings::cloutURL()?>/_/script.js"></script>

</body>
</html>
