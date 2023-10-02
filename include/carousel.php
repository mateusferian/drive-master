<?php
    $folderImages = 'img/carouselImage/';
    $extensoesPermitidas = array('jpg', 'jpeg', 'png');
    $image = array();

    if (is_dir($folderImages)) {
        $files = glob($folderImages . '*.{jpg,jpeg,png}', GLOB_BRACE);
        shuffle($files);
        $image = array_map(function($file) use ($folderImages) {
            return str_replace($folderImages, '', $file);
        }, $files);
    }
    ?>

    <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-indicators">
            <?php foreach ($image as $index => $imagem) : ?>
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="<?= $index; ?>"
                <?= $index === 0 ? 'class="active"' : '' ?> aria-label="Slide <?= ($index + 1); ?>"></button>
            <?php endforeach; ?>
        </div>
        <div class="carousel-inner">
            <?php foreach ($image as $index => $imagem) : ?>
            <div class="carousel-item <?= $index === 0 ? 'active' : '' ?>">
                <img src="<?= $folderImages . $imagem; ?>" class="d-block w-100 imagem-carrossel"
                    alt="banner <?= ($index + 1); ?>">
            </div>
            <?php endforeach; ?>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators"
            data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators"
            data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>
    <script>
    $(document).ready(function() {

        setInterval(function() {
            $('#carouselExampleIndicators').carousel('next');
        }, 9000);
    });
    </script>