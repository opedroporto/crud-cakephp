<?php
declare(strict_types=1);

namespace App\Policy;

use App\Model\Entity\Brinquedo;
use Authorization\IdentityInterface;

/**
 * Brinquedo policy
 */
class BrinquedoPolicy
{
    /**
     * Check if $user can add Brinquedo
     *
     * @param \Authorization\IdentityInterface $user The user.
     * @param \App\Model\Entity\Brinquedo $brinquedo
     * @return bool
     */
    public function canAdd(IdentityInterface $user, Brinquedo $brinquedo)
    {
        return isset($user);
    }

    /**
     * Check if $user can edit Brinquedo
     *
     * @param \Authorization\IdentityInterface $user The user.
     * @param \App\Model\Entity\Brinquedo $brinquedo
     * @return bool
     */
    public function canEdit(IdentityInterface $user, Brinquedo $brinquedo)
    {
        return isset($user);
    }

    /**
     * Check if $user can delete Brinquedo
     *
     * @param \Authorization\IdentityInterface $user The user.
     * @param \App\Model\Entity\Brinquedo $brinquedo
     * @return bool
     */
    public function canDelete(IdentityInterface $user, Brinquedo $brinquedo)
    {
        return isset($user);
    }

    /**
     * Check if $user can view Brinquedo
     *
     * @param \Authorization\IdentityInterface $user The user.
     * @param \App\Model\Entity\Brinquedo $brinquedo
     * @return bool
     */
    public function canView(IdentityInterface $user = null, Brinquedo $brinquedo)
    {
        return true;
    }
}
