<?php
namespace Model\User\Repository;

use Doctrine\ORM\QueryBuilder;
use Model\User\Role;

/**
 * @author Artur Sh. Mamedbekov
 */
class UserQueryBuilder extends QueryBuilder{
  /**
   * Пользователи с данной ролью.
   *
   * @param Role|string $role Целевая роль.
   *
   * @return self
   */
  public function withRole($role){
    if(!$role instanceof Role){
      $role = new Role($role);
    }

    return $this
      ->andWhere(
        $this->expr()->eq(sprintf('%s.role', $this->getRootAlias()), ':role')
      )
      ->setParameter('role', $role);
  }
}
