<?php
namespace PoP\UserRolesACL\Config;

use PoP\API\TypeResolvers\RootTypeResolver;
use PoP\API\TypeResolvers\SiteTypeResolver;
use PoP\Users\TypeResolvers\UserTypeResolver;
use PoP\Root\Component\PHPServiceConfigurationTrait;
use PoP\ComponentModel\Container\ContainerBuilderUtils;
use PoP\UserRolesAccessControl\Services\AccessControlGroups as UserRolesAccessControlGroups;
use PoP\UserRolesACL\Environment;
use PoP\UserStateAccessControl\ConfigurationEntries\UserStates;
use PoP\UserStateAccessControl\Services\AccessControlGroups as UserStateAccessControlGroups;

class ServiceConfiguration
{
    use PHPServiceConfigurationTrait;

    protected static function configure()
    {
        // Inject the access control entries
        if (Environment::userMustBeLoggedInToAccessRolesFields()) {
            ContainerBuilderUtils::injectValuesIntoService(
                'access_control_manager',
                'addEntriesForFields',
                UserStateAccessControlGroups::STATE,
                [
                    [RootTypeResolver::class, 'roles', UserStates::IN],
                    [SiteTypeResolver::class, 'roles', UserStates::IN],
                    [UserTypeResolver::class, 'roles', UserStates::IN],
                    [UserTypeResolver::class, 'capabilities', UserStates::IN],
                ]
            );
        }
        if ($roles = Environment::anyRoleLoggedInUserMustHaveToAccessRolesFields()) {
            foreach ($roles as $role) {
                ContainerBuilderUtils::injectValuesIntoService(
                    'access_control_manager',
                    'addEntriesForFields',
                    UserRolesAccessControlGroups::ROLES,
                    [
                        [RootTypeResolver::class, 'roles', $role],
                        [SiteTypeResolver::class, 'roles', $role],
                        [UserTypeResolver::class, 'roles', $role],
                        [UserTypeResolver::class, 'capabilities', $role],
                    ]
                );
            }
        }
        if ($capabilities = Environment::anyCapabilityLoggedInUserMustHaveToAccessRolesFields()) {
            foreach ($capabilities as $capability) {
                ContainerBuilderUtils::injectValuesIntoService(
                    'access_control_manager',
                    'addEntriesForFields',
                    UserRolesAccessControlGroups::CAPABILITIES,
                    [
                        [RootTypeResolver::class, 'roles', $capability],
                        [SiteTypeResolver::class, 'roles', $capability],
                        [UserTypeResolver::class, 'roles', $capability],
                        [UserTypeResolver::class, 'capabilities', $capability],
                    ]
                );
            }
        }
    }
}
