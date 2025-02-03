<?php
    require_once __DIR__ . '/header.php';
?>

<?php require __DIR__ . '/header.php';?>

<ul class="videos__container" alt="videos alura">
    <?php foreach ($videoList as $video) { ?>
        <?php if (str_starts_with(parse_url($video->url, PHP_URL_SCHEME), 'http')) { ?>
        <li class="videos__item">
            <iframe width="100%" height="72%" src="<?= $video->url?>"
                title="YouTube video player" frameborder="0"
                allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                allowfullscreen></iframe>
            <div class="descricao-video">
                <img src="./img/logo.png" alt="logo canal alura">
                <h3><?= $video->titele?></h3>
                <div class="acoes-video">
                    <a href="edit-video.php?id=<?= $video->id;?>">Editar</a>
                    <a href="remove-video.php?id=<?= $video->id;?>">Excluir</a>
                </div>
            </div>
        </li>
        <?php }?>
    <?php }?>
</ul>

<?php require __DIR__ . '/footer.php';?>