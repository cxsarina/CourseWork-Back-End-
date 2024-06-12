<?php
/** @var string $error_message Повідомлення про помилку */
$this->Title = 'Додавання новини';
?>
<form method="post" action="" enctype="multipart/form-data">
    <?php
    if (!empty($error_message)) : ?>
        <div class="alert alert-danger" role="alert">
            <?= $error_message ?>
        </div>
    <?php endif; ?>
    <div>
        <div class="mb-3">
            <label for="InputTitle" class="form-label">Заголовок</label>
            <input value="<?=$this->controller->post->title ?>" name="title" type="text" class="form-control" id="InputTitle">
        </div>
        <div class="mb-3">
            <label for="InputText" class="form-label">Текст новини</label>
            <input value="<?=$this->controller->post->text ?>" name="text" type="text" class="form-control" id="InputText">
        </div>
        <div class="mb-3">
            <label for="InputShortText" class="form-label">Короткий текст новини</label>
            <input value="<?=$this->controller->post->shorttext ?>"  name="shorttext" type="text" class="form-control" id="InputShortText">
        </div>
        <div class="mb-3">
            <label for="file" class="form-label">Завантажити файл:</label>
            <input id="file" value="<?= $this->controller->files->image ?>" type="file" class="form-control" name="image" required>
        </div>
        <input type="hidden" name="date" value="<?= date('Y-m-d H:i:s')?>">
        <button type="submit" class="btn btn-primary">Додати</button>
    </div>
</form>