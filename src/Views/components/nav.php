<div class="uk-padding uk-background-secondary uk-height-1-1 uk-light">
    <h1>Clout</h1>

    <ul class="uk-nav">
        <li class="uk-nav-header">Content</li>
        <?php if($sections->count() > 0) : ?>
            <?php foreach($sections as $section) : ?>
            <li>
                <a href="<?= \GraftPHP\Clout\Settings::cloutURL()?>/sections/<?= $section->slug ?>">
                    <?= $section->name ?>
                </a>
            </li>
            <?php endforeach; ?>
        <?php else : ?>
            <a href="<?= \GraftPHP\Clout\Settings::cloutURL() ?>/settings/sections/create">Add a Section</a>
        <?php endif; ?>
        <li class="uk-nav-header">System</li>
        <li>
            <a href="<?= \GraftPHP\Clout\Settings::cloutURL()?>/settings/sections">
                Section Setup
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
