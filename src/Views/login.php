<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Clout Login</title>
    <link href="<?= clout_settings('clout_url')?>/_/style.css" rel="stylesheet">
</head>
<body>
    <div class="uk-width-1-3 uk-position-center">
        <form method="post" action="<?= clout_settings('clout_url')?>/login" class="uk-panel uk-panel-box uk-form">
            <h1>Clout</h1>
            <div class="uk-margin">
                <input class="uk-input" type="text" name="username" placeholder="Username" value="<?=isset($username)?$username:''?>" required>
            </div>
            <div class="uk-margin">
                <input class="uk-input" type="password" name="password" placeholder="Password">
            </div>
            <div class="uk-margin">
                <button type="submit" class="uk-width-1-1 uk-button uk-button-primary">Login</button>
            </div>
        </form>
    </div>
    <script src="<?= clout_settings('clout_url')?>/_/script.js"></script>
</body>
</html>
