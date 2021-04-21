<?php
    $resetLink = Yii::$app->urlManager->createAbsoluteUrl(
        ['site/reset-password', 'token' => $user->password_reset_token]
    );
?>

Hola <?= $user->username ?>,</p>
Sigue el enlace siguiente para reinicializar tu clave:
<?= $resetLink ?>
