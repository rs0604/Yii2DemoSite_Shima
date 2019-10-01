<?php

namespace app\models;

use yii\base\Model;

class EntryForm extends Model {
    public $name;
    public $email;

    public function rules() {
        return [
            [[ 'name', 'email'], 'required'], // nameとemail要素に必須指定を追加
            ['email', 'email'] // email要素にEmailアドレスフォーマットのバリデーションを追加
        ];
    }
}