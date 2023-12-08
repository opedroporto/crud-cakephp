<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Table;
use Cake\Validation\Validator;

class BrinquedoTable extends Table
{
    public function initialize(array $config): void
    {
        parent::initialize($config);
        $this->addBehavior('Timestamp');
    }

    public function validationDefault(Validator $validator): Validator
    {
        $validator
            ->maxLength('modelo', 50, 'O modelo deve possuir no máximo 50 caracteres.')
            ->maxLength('marca', 40, 'A marca deve possuir no máximo 40 caracteres.')
            ->numeric('faixa_etaria', 'A faixa etária deve estar em um formato númerico.');
            // ->add('foto', 'extension', [
            //     'rule' => ['extension', ['png', 'jpg', 'jpeg', 'webp', 'gif']],
            //     'message' => 'A foto deve estar em um formato válida.'
            // ]);

        return $validator;
    }
}