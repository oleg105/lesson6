<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
</head>
<body>
<?php if ($message) : ?>
    <p><?= $message ?></p>
<?php endif ?>

<?= $form->render() ?>

</body>
</html>
