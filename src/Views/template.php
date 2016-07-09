<!DOCTYPE html>
<html lang="en">
<head>
    {head}
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Clout Dashboard</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css" rel="stylesheet">
    {css}
</head>
<body>

    <nav class="navbar navbar-default navbar-fixed-top">
        <div class="container-fluid">

            <div class="navbar-header">
                <button 
                    type="button" 
                    class="navbar-toggle collapsed" 
                    data-toggle="collapse" 
                    data-target="#master-navbar" 
                    aria-expanded="false"
                >
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="/clout/home">Clout</a>                    
            </div>

            <div class="collapse navbar-collapse" id="master-navbar">
                <ul class="nav navbar-nav">
                    <li>
                        <a href="/clout/home">
                            <span class="glyphicon glyphicon-home"></span>
                        </a>
                    </li>
                
                    <?php if($sections) : ?>
                        <?php foreach($sections as $s) : ?>
                        <li>
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <?=$s['name']?>
                                <span class="caret"></span>
                            </a>
                            <ul class="dropdown-menu">
                                <li>
                                    <a href="/clout/sections/<?=$s['slug']?>">
                                        <span class="glyphicon glyphicon-th-list"></span>
                                        View
                                    </a>
                                    <a href="/clout/sections/<?=$s['slug']?>/create">
                                        <span class="glyphicon glyphicon-plus"></span>
                                        Add Record
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <?php endforeach ?>
                    <?php endif; ?>

                </ul>

                <ul class="nav navbar-nav navbar-right">
                    <li><a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <span class="glyphicon glyphicon-cog"></span></a>
                        <ul class="dropdown-menu">
                            <li>
                                <a href="/clout/settings/sections">
                                    <span class="glyphicon glyphicon-cog"></span>
                                    Section Setup
                                </a>
                                <a href="/clout/sections/products/add">
                                    <span class="glyphicon glyphicon-cog"></span>
                                    System Settings
                                </a>
                                <a href="https://github.com/graftphp/clout/wiki">
                                    <span class="glyphicon glyphicon-globe"></span>
                                    Get help
                                </a>
                                <a href="https://github.com/graftphp/clout/issues" target="_blank">
                                    <span class="glyphicon glyphicon-globe"></span>
                                    Report a problem
                                </a>
                            </li>
                        </ul>                        
                    </li>
                    <li><a href="/clout/logout">
                        <span class="glyphicon glyphicon-log-out"></span>
                    </a></li>
                </ul>
            </div>

        </div>
    </nav>

    <p>&nbsp;</p>
    <p>&nbsp;</p>

    <div class="col-sm-12">
        
        {body}

    </div>

    <script src="//code.jquery.com/jquery-1.11.3.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
    {script}
</body>
</html>