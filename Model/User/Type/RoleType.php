<?php
namespace Model\User\Type;

use Doctrine\DBAL\Types\Type;
use Doctrine\DBAL\Platforms\AbstractPlatform;
use Model\User\Role;

/**
 * @author Artur Sh. Mamedbekov
 */
class RoleType extends Type{
  /**
   * {@inheritdoc}
   */
  public function getSQLDeclaration(array $fieldDeclaration, AbstractPlatform $platform){
    return self::class;
  }

  /**
   * {@inheritdoc}
   */
  public function convertToPHPValue($value, AbstractPlatform $platform){
    return new Role($value);
  }

  /**
   * {@inheritdoc}
   */
  public function convertToDatabaseValue($value, AbstractPlatform $platform){
    return (string) $value;
  }

  /**
   * {@inheritdoc}
   */
  public function getName(){
    return self::class;
  }
}
