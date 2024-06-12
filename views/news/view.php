<?php
if (empty($model))
    $model = [];
$this->Title = 'СТАТТЯ:'." ".$model['title'];
?>
<style>
    h1 {
        text-align: center;
    }

    .img {
        width: 90%;
        height: 50%;
        margin-left: 5%;
        margin-bottom: 20px;
    }

    .container {
        width: 100%;
        max-width: 90%;
        margin: auto;
    }

    .content {
        font-size: 18px;
        white-space: pre-wrap;
        word-wrap: break-word;
    }

    .date {
        text-align: center;
        margin: 20px;
        font-size: 30px;
        color: crimson;
    }
</style>
<div class="container">
    <div class="date">
        <small><?= \models\News::getDate($model) ?></small>
    </div>
    <div class="container">
        <img class="img" src="data:image/jpg;base64,<?= \core\Model::getImage($model) ?>" class="card-img-top" alt="<?= $model['short_text'] ?>">
    </div>

    <div class="container">
        <pre class="content"><?= htmlspecialchars($model['text']) ?></pre>
    </div>
</div>
