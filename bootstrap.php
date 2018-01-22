<?php
use Doctrine\ORM\Tools\Setup;
use Doctrine\ORM\EntityManager;
use Doctrine\DBAL\Types\Type;

$config = Setup::createAnnotationMetadataConfiguration([__DIR__ . '/Model'], true, __DIR__ . '/Model');
$config->setAutoGenerateProxyClasses(Doctrine\Common\Proxy\AbstractProxyFactory::AUTOGENERATE_ALWAYS);
$entityManager = EntityManager::create([
  'driver' => 'pdo_mysql',
  'user' => 'root',
  'password' => 'root',
  'dbname' => 'doctrine',
], $config);

// Register custom types
Type::addType(
  Model\User\Role::class,
  Model\User\Type\RoleType::class
);
