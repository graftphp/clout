<div class="uk-padding-small uk-background-secondary uk-height-1-1 uk-light uk-padding-remove-vertical">
    <ul class="uk-nav">
        <li class="uk-nav-header">Content</li>
        <?php if($sections->count() > 0) : ?>
            <?php foreach($sections as $section) : ?>
            <li>
                <a href="<?= clout_settings('clout_url') ?>/sections/<?= $section->slug ?>">
                    <?= $section->name ?>
                </a>
            </li>
            <?php endforeach; ?>
        <?php else : ?>
            <a href="<?= clout_settings('clout_url') ?>/settings/sections/create"
            class="uk-text-small">
                <span uk-icon="icon: plus"></span>
                <span class="uk-text-middle">&nbsp;Add section</span>
            </a>
        <?php endif; ?>
    </ul>
    <ul class="uk-nav uk-margin-top uk-text-small">
        <li class="uk-nav-header">SETTINGS</li>
        <li>
            <a href="<?= clout_settings('clout_url') ?>/settings/sections"
            class="uk-text-muted">
                <span uk-icon="icon: grid"></span>
                <span class="uk-text-middle">&nbsp;Sections</span>
            </a>
        </li>
        <li>
            <a href="<?= clout_settings('clout_url') ?>/settings/users"
            class="uk-text-muted">
                <span uk-icon="icon: users"></span>
                <span class="uk-text-middle">&nbsp;Users</span>
            </a>
        </li>
        <li>
            <a href="<?= clout_settings('clout_url') ?>/settings"
            class="uk-text-muted">
                <span uk-icon="icon: cog"></span>
                <span class="uk-text-middle">&nbsp;System</span>
            </a>
        </li>
    </ul>
</div>
