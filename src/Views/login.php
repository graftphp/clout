<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Clout Login</title>

    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css" rel="stylesheet">

  </head>
  <body>
    <div class="container">
        <?php if (isset($err)) : ?>
            <div class="alert alert-danger" role="alert alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <strong>ERROR:</strong> <?=$err?>
            </div>
        <?php endif ?>
        <h1>Clout</h1>
        <div class="row">
            <div class="col-sm-4 col-sm-offset-4">
                <form method="post" action="/clout/login">
                    <div class="form-group">
                        <label for="username">Username</label>
                        <input type="username" name="username" class="form-control" required value="<?=isset($username)?$username:''?>">
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" name="password" class="form-control" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Log In</button>
                </form>
            </div>
        </div>
    </div>

    <script src="//code.jquery.com/jquery-1.11.3.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>

  </body>
</html>
