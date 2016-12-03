<h1>Clout</h1>

<div class="uk-panel uk-panel-box">

    <ul class="uk-nav">
        <li class="uk-nav-header">Content</li>
        <?php if($sections) : ?>
            <?php foreach($sections as $section) : ?>
            <li>
                <a href="<?= \GraftPHP\Clout\Settings::cloutURL()?>/sections/<?= $section->slug ?>">
                    <?= $section->name ?>
                </a>
            </li>
            <?php endforeach ?>
        <?php endif; ?>
        <li class="uk-nav-header">System</li>
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
            <a href="https://github.com/graftphp/clout/wiki" target="_blank">
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
