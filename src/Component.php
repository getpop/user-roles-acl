<?php

declare(strict_types=1);

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

    public static function getDependedComponentClasses(): array
    {
        return [
            \PoP\UserRolesAccessControl\Component::class,
        ];
    }

    /**
     * Initialize services
     */
    protected static function doInitialize(bool $skipSchema = false): void
    {
        if (self::isEnabled()) {
            parent::doInitialize($skipSchema);
            self::initYAMLServices(dirname(__DIR__));
            ServiceConfiguration::initialize();
        }
    }

    protected static function resolveEnabled()
    {
        return UserRolesAccessControlComponent::isEnabled();
    }
}
