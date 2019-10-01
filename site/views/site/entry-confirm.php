<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
?>
<p>あなたは次の情報を入力しました</p>
<ul>
    <li><label>名前</label>: <?= Html::encode($model->name) ?></li>
    <li><label>メール</label>: <?= Html::encode($model->email) ?></li>
</ul>
