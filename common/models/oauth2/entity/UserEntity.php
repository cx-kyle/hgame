<?php
namespace common\models\oauth2\entity;

use League\OAuth2\Server\Entities\Traits\EntityTrait;
use League\OAuth2\Server\Entities\UserEntityInterface;

/**
 * Class UserEntity
 * @package common\models\oauth2\entity
 *   
 */
class UserEntity implements UserEntityInterface
{
    use EntityTrait;
}