<?php
namespace Model\User\Repository;

use Doctrine\ORM\EntityRepository;
use Model\User\User;

/**
 * @author Artur Sh. Mamedbekov
 */
class UserRepository extends EntityRepository{
  // Actions
  /**
   * {@inheritdoc}
   */
  public function createQueryBuilder($alias, $indexBy = null){
    return (new UserQueryBuilder($this->getEntityManager()))
      ->select($alias)
      ->from($this->_entityName, $alias, $indexBy);
  }

  /**
   * @param User $user Добавляемый пользователь.
   */
  public function add(User $user){
    $this->getEntityManager()->persist($user);
  }

  /**
   * @param User $user Удаляемый пользователь.
   */
  public function remove(User $user){
    $this->getEntityManager()->remove($user);
  }
}
