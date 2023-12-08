<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Authentication\PasswordHasher\DefaultPasswordHasher;
use Cake\ORM\Entity;

class Usuario extends Entity
{
    protected array $_accessible = [
        'id' => true,
        'email' => true,
        'senha' => true,
        'foto' => true,
        'created' => true,
        'modified' => true,
    ];

    protected function _setSenha(string $senha) : ?string
    {
        if (strlen($senha) > 0) {
            return (new DefaultPasswordHasher())->hash($senha);
        }
    }
}