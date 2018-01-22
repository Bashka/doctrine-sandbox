<?php
namespace Model\User;

use Model\User\Message\Message;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * Пользователь.
 *
 * @Entity(repositoryClass="Model\User\Repository\UserRepository")
 * @Table(name="user")
 *
 * @author Artur Sh. Mamedbekov
 */
class User{
  /**
   * @var string Идентификатор.
   *
   * @Id
   * @GeneratedValue(strategy="NONE")
   * @Column(type="string")
   */
  private $id;

  /**
   * @var string Логин.
   *
   * @Column(type="string")
   */
  private $login;

  /**
   * @var Role Роль.
   *
   * @Column(type="Model\User\Role")
   */
  private $role;

  /**
   * @var Message[] Сообщения пользователя.
   * 
   * @OneToMany(
   *   targetEntity="Model\User\Message\Message",
   *   mappedBy="author",
   *   cascade={"persist", "remove"},
   *   orphanRemoval=true
   * )
   */
  private $messages;

  /**
   * @param string $login Логин.
   * @param Role $role Роль.
   * @param string $id Идентификатор.
   */
  public function __construct($login, Role $role, $id = null){
    $this->id = is_null($id)? uniqid('', true) : $id;
    $this->login = $login;
    $this->setRole($role);
    $this->messages = new ArrayCollection;
  }

  // Getters
  /**
   * @return string Идентификатор.
   */
  public function getId(){
    return $this->id;
  }

  /**
   * @return string Логин.
   */
  public function getLogin(){
    return $this->login;
  }

  /**
   * @return Role Роль.
   */
  public function getRole(){
    return $this->role;
  }

  /**
   * @return Message[] Сообщения.
   */
  public function getMessages(){
    return $this->messages;
  }

  // Actions
  /**
   * @param Role $role Роль.
   */
  public function setRole($role){
    $this->role = $role;
  }

  /**
   * @param string $content Текст сообщения.
   *
   * @return Message Сообщение.
   */
  public function writeMessage($content){
    $message = new Message($this, $content);
    $this->messages->add($message);

    return $message;
  }
}
