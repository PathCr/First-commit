<div class="dropdown d-inline-block">
    <a href="#" class="dropdown-toggle" data-bs-toggle="dropdown">
        <img src="<?= PATH ?>/assets/img/lang/<?= \S_Sait\App::$app->getPropety('language') ['code'] ?>.png" alt="">
    </a>
    <ul class="dropdown-menu" id="languages">

        <?php foreach ($this->languages as $k => $v): ?>
        <?php if (\S_Sait\App::$app->getPropety('language') ['code'] == $k) continue; ?>
            <li>
                <button class="dropdown-item" data-langcode="<?= $k ?>">
                    <img src="<?= PATH ?>/assets/img/lang/<?= $k ?>.png" alt="">
                    <?php $v['title']?>
                </button>
            </li>
        <?php endforeach; ?>


    </ul>
</div>