<?php
namespace Model\User;

use InvalidArgumentException;

/**
 * Роль пользователя.
 *
 * @author Artur Sh. Mamedbekov
 */
class Role{
  /**
   * Администратор.
   */
  const ADMIN = 'admin';

  /**
   * Пользователь.
   */
  const USER = 'user';

  /**
   * @var string Значение.
   */
  private $value;

  /**
   * @return string[] Допустимые значения.
   */
  public static function getValues(){
    return [
      self::ADMIN,
      self::USER,
    ];
  }

  /**
   * @param string $value Значение роли.
   */
  public function __construct($value){
    if(!in_array($value, self::getValues())){
      throw new InvalidArgumentException('Invalid role value');
    }

    $this->value = $value;
  }

  /**
   * @return string Строчное представление роли.
   */
  public function __toString(){
    return $this->value;
  }
}
