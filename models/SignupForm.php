<?php

namespace app\models;

use Yii;
use yii\base\Model;

/**
 * SignupForm es el modelo tras la vista de login
 */
class SignupForm extends Model
{
    public $username;
    public $email;
    public $password;
    
    /**
     * @return array the validation rules.
     */
    
    public function rules()
    {
        return [
            ['username', 'trim'],
            ['username', 'required'],
            ['username', 'unique', 'targetClass' => '\app\models\User', 'message' => 'Este nombre ya existe, elija otro.'],
            ['username', 'string', 'min' => 2, 'max' => 255],
            ['email', 'trim'],
            ['email', 'required'],
            ['email', 'email'],
            ['email', 'string', 'max' => 255],
            ['email', 'unique', 'targetClass' => '\app\models\User', 'message' => 'Este buzón ya existe; elija otro.'],
            ['password', 'required'],
            ['password', 'string', 'min' => 6],
        ];
    }
    

    /**
     * @return array customized attribute labels
     */
    public function attributeLabels()
    {
        return [
            'username' => 'Nombre de Usuario',
            'email' => 'Email',
            'password' => 'Password',
        ];
    }

    /**
     * Signs user up.
     *
     * @return User|null the saved model or null if saving fails
     */
    public function signup()
    {
 
        if (!$this->validate()) {
            return null;
        }
 
        $user = new User();
        $user->username = $this->username;
        $user->email = $this->email;
        $user->setPassword($this->password);
        $user->generateAuthKey();
        return $user->save() ? $user : null;
    }
 
}


