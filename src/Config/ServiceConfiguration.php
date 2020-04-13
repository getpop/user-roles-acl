<?php
namespace PoP\UserRolesACL\Config;

use PoP\Engine\TypeResolvers\RootTypeResolver;
use PoP\Users\TypeResolvers\UserTypeResolver;
use PoP\Root\Component\PHPServiceConfigurationTrait;
use PoP\ComponentModel\Container\ContainerBuilderUtils;
use PoP\UserRolesAccessControl\Services\AccessControlGroups as UserRolesAccessControlGroups;
use PoP\UserRolesACL\Environment;
use PoP\UserStateAccessControl\ConfigurationEntries\UserStates;
use PoP\AccessControl\Services\AccessControlGroups as AccessControlGroups;
use PoP\UserStateAccessControl\Services\AccessControlGroups as UserStateAccessControlGroups;

class ServiceConfiguration
{
    use PHPServiceConfigurationTrait;

    protected static function configure()
    {
        // Inject the access control entries
        if (Environment::disableRolesFields()) {
            ContainerBuilderUtils::injectValuesIntoService(
                'access_control_manager',
                'addEntriesForFields',
                AccessControlGroups::DISABLED,
                [
                    [RootTypeResolver::class, 'roles'],
                    [UserTypeResolver::class, 'roles'],
                    [RootTypeResolver::class, 'capabilities'],
                    [UserTypeResolver::class, 'capabilities'],
                ]
            );
        }
        if (Environment::userMustBeLoggedInToAccessRolesFields()) {
            ContainerBuilderUtils::injectValuesIntoService(
                'access_control_manager',
                'addEntriesForFields',
                UserStateAccessControlGroups::STATE,
                [
                    [RootTypeResolver::class, 'roles', UserStates::IN],
                    [UserTypeResolver::class, 'roles', UserStates::IN],
                    [RootTypeResolver::class, 'capabilities', UserStates::IN],
                    [UserTypeResolver::class, 'capabilities', UserStates::IN],
                ]
            );
        }
        if ($roles = Environment::anyRoleLoggedInUserMustHaveToAccessRolesFields()) {
            ContainerBuilderUtils::injectValuesIntoService(
                'access_control_manager',
                'addEntriesForFields',
                UserRolesAccessControlGroups::ROLES,
                [
                    [RootTypeResolver::class, 'roles', $roles],
                    [UserTypeResolver::class, 'roles', $roles],
                    [RootTypeResolver::class, 'capabilities', $roles],
                    [UserTypeResolver::class, 'capabilities', $roles],
                ]
            );
        }
        if ($capabilities = Environment::anyCapabilityLoggedInUserMustHaveToAccessRolesFields()) {
            ContainerBuilderUtils::injectValuesIntoService(
                'access_control_manager',
                'addEntriesForFields',
                UserRolesAccessControlGroups::CAPABILITIES,
                [
                    [RootTypeResolver::class, 'roles', $capabilities],
                    [UserTypeResolver::class, 'roles', $capabilities],
                    [RootTypeResolver::class, 'capabilities', $capabilities],
                    [UserTypeResolver::class, 'capabilities', $capabilities],
                ]
            );
        }
    }
}
