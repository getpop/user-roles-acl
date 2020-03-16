<?php
namespace PoP\UserRolesACL;

use PoP\Root\Component\AbstractComponent;
use PoP\Root\Component\YAMLServicesTrait;
use PoP\Root\Component\CanDisableComponentTrait;
use PoP\UserRolesACL\Config\ServiceConfiguration;
use PoP\UserRolesAccessControl\Component as UserRolesAccessControlComponent;

/**
 * Initialize component
 */
class Component extends AbstractComponent
{
    use YAMLServicesTrait, CanDisableComponentTrait;
    // const VERSION = '0.1.0';

    /**
     * Initialize services
     */
    public static function init()
    {
        if (self::isEnabled()) {
            parent::init();
            self::initYAMLServices(dirname(__DIR__));
            ServiceConfiguration::init();
        }
    }

    protected static function resolveEnabled()
    {
        return UserRolesAccessControlComponent::isEnabled();
    }
}
