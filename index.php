<?php
require(__DIR__ . '/vendor/autoload.php');
require(__DIR__ . '/bootstrap.php');

use Model\User\User;
use Model\User\Role;

$userRepository = $entityManager->getRepository(User::class);

// Create user
/*
$user = new User('artur', new Role(Role::ADMIN), 1);
$userRepository->add($user);

$user = new User('artem', new Role(Role::USER), 2);
$userRepository->add($user);

$entityManager->flush();
*/

// Get user
/*
$user = $userRepository->find(1);
if(!is_null($user)){
  var_dump($user->getLogin());
  var_dump($user->getRole());
  var_dump((string) $user->getRole());
}
*/

// Select admins
/*
$admins = $userRepository->createQueryBuilder('user')
  ->withRole(Role::ADMIN)
  ->getQuery()->getResult();
foreach($admins as $admin){
  var_dump($admin->getLogin());
}
*/

// Remove user
/*
$user = $userRepository->find(2);
if(!is_null($user)){
  $userRepository->remove($user);

  $entityManager->flush();
}
*/

// Write message
/*
$user = $userRepository->find(1);
if(!is_null($user)){
  $message = $user->writeMessage('Hello world');

  $entityManager->flush();
}
*/

// Get all messages
/*
$user = $userRepository->find(1);
if(!is_null($user)){
  foreach($user->getMessages() as $message){
    var_dump((string) $message);
  }
}
*/
