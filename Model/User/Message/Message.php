<?php
namespace Model\User\Message;

use Model\User\User;

/**
 * Сообщение пользователя.
 *
 * @Entity
 * @Table(name="user_message")
 *
 * @author Artur Sh. Mamedbekov
 */
class Message{
  /**
   * @var string Идентификатор.
   *
   * @Id
   * @GeneratedValue(strategy="NONE")
   * @Column(type="string")
   */
  private $id;

  /**
   * @ManyToOne(targetEntity="Model\User\User")
   * @JoinColumn(name="author", referencedColumnName="id")
   */
  private $author;

  /**
   * @var string Текст сообщения.
   *
   * @Column(type="string")
   */
  private $content;

  /**
   * @param User $author Автор.
   * @param string $content Текст.
   */
  public function __construct(User $author, $content){
    $this->id = uniqid('', true);
    $this->author = $author;
    $this->content = $content;
  }

  // Getters
  /**
   * @return User Автор.
   */
  public function getAuthor(){
    return $this->author;
  }

  /**
   * @return string Текст сообщения.
   */
  public function getContent(){
    return $this->content;
  }

  /**
   * @return string Текст сообщения.
   */
  public function __toString(){
    return $this->getContent();
  }
}
