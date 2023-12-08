<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

class Brinquedo extends Entity
{
    protected array $_accessible = [
        'id' => true,
        'modelo' => true,
        'marca' => true,
        'faixa_etaria' => true,
        'foto' => true,
        'created' => true,
        'modified' => true,
    ];
}