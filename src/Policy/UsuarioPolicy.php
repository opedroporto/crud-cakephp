<?php
declare(strict_types=1);

namespace App\Policy;

use App\Model\Entity\Usuario;
use Authorization\IdentityInterface;

/**
 * Usuario policy
 */
class UsuarioPolicy
{
    public function canIndex(IdentityInterface $user, Usuario $usuario) {
        return $user->id = 1;
    }

    /**
     * Check if $user can add Usuario
     *
     * @param \Authorization\IdentityInterface $user The user.
     * @param \App\Model\Entity\Usuario $usuario
     * @return bool
     */
    public function canAdd(IdentityInterface $user, Usuario $usuario)
    {
        return $user->id == 1;
    }

    /**
     * Check if $user can edit Usuario
     *
     * @param \Authorization\IdentityInterface $user The user.
     * @param \App\Model\Entity\Usuario $usuario
     * @return bool
     */
    public function canEdit(IdentityInterface $user, Usuario $usuario)
    {
        return $user->id == 1;
    }

    /**
     * Check if $user can delete Usuario
     *
     * @param \Authorization\IdentityInterface $user The user.
     * @param \App\Model\Entity\Usuario $usuario
     * @return bool
     */
    public function canDelete(IdentityInterface $user, Usuario $usuario)
    {
        return $user->id == 1 && $usuario->id !== 1;
    }

    /**
     * Check if $user can view Usuario
     *
     * @param \Authorization\IdentityInterface $user The user.
     * @param \App\Model\Entity\Usuario $usuario
     * @return bool
     */
    public function canView(IdentityInterface $user, Usuario $usuario)
    {
        return $user->id == 1;
    }
}
