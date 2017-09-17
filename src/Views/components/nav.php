<div class="uk-padding uk-background-secondary uk-height-1-1 uk-light">
    <h1>Clout</h1>

    <ul class="uk-nav uk-text-bold">
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
    </ul>
    <ul class="uk-nav uk-margin-top uk-text-small">
        <li class="uk-nav-header">System</li>
        <li>
            <a href="<?= \GraftPHP\Clout\Settings::cloutURL()?>/settings/sections"
            class=" uk-text-muted">
                <span uk-icon="icon: cog"></span>
                <span class="uk-text-middle">&nbsp;Section Setup</span>
            </a>
        </li>
        <li>
            <a href="https://github.com/graftphp/clout/wiki" target="_blank"
            class=" uk-text-muted">
                <span uk-icon="icon: info"></span>
                <span class="uk-text-middle">&nbsp;Get help</span>
            </a>
        </li>
        <li>
            <a href="https://github.com/graftphp/clout/issues" target="_blank"
            class=" uk-text-muted">
                <span uk-icon="icon: warning"></span>
                <span class="uk-text-middle">&nbsp;Report a problem</span>
            </a>
        </li>
        <li>
            <a href="<?= \GraftPHP\Clout\Settings::cloutURL()?>/logout"
            class=" uk-text-muted">
                <span uk-icon="icon: sign-out"></span>
                <span class="uk-text-middle">&nbsp;Log out</span>
            </a>
        </li>
    </ul>
</div>
