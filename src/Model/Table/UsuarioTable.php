<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Table;
use Cake\Validation\Validator;

class UsuarioTable extends Table
{
    public function initialize(array $config): void
    {
        parent::initialize($config);
        $this->addBehavior('Timestamp');
    }

    public function validationDefault(Validator $validator): Validator
    {
        $validator
            ->email('email', true, 'O e-mail deve estar em um formato válido.')
            ->minLength('senha', 8, 'A senha deve possuir no mínimo 8 caracteres.')
            ->maxLength('senha', 255, 'A senha deve possuir no máximo 255 caracteres.');
            // ->add('foto', 'extension', [
            //     'rule' => ['extension', ['png', 'jpg', 'jpeg', 'webp', 'gif']],
            //     'message' => 'A foto deve estar em um formato válida.'
            // ]);

        return $validator;
    }
}