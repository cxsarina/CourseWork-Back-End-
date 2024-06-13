<?php
$this->Title = 'Список новин';
if (empty($newsarray))
    $newsarray = [];
?>
<style>
    .col-md-4{
        padding: 10px;
    }
</style>
<div class="content">
    <div class="row">
        <?php foreach ($newsarray as $news) { ?>
            <div class="col-md-4">
                <a style="text-decoration: none; color: inherit;" href="/news/view/<?= $news['id'] ?>">
                    <div class="card mb-4 h-100">
                        <img src="data:image/jpg;base64,<?= \core\Model::getImage($news) ?>" class="card-img-top"alt="...">
                        <div class="card-body">
                            <p class="card-text"><?= \models\News::getDate($news) ?></p>
                            <h5 class="card-title"><?= $news['title'] ?></h5>
                            <p class="card-text"><?= $news['short_text'] ?></p>
                        </div>
                    </div>
                </a>
            </div>
        <?php } ?>
    </div>
</div>