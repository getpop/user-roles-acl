<?php

declare(strict_types=1);

namespace PoP\UserRolesACL;

class Environment
{
    public static function disableRolesFields(): bool
    {
        return isset($_ENV['DISABLE_ROLES_FIELDS']) ? strtolower($_ENV['DISABLE_ROLES_FIELDS']) == "true" : false;
    }

    public static function userMustBeLoggedInToAccessRolesFields(): bool
    {
        return isset($_ENV['USER_MUST_BE_LOGGED_IN_TO_ACCESS_ROLES_FIELDS']) ? strtolower($_ENV['USER_MUST_BE_LOGGED_IN_TO_ACCESS_ROLES_FIELDS']) == "true" : false;
    }

    public static function anyRoleLoggedInUserMustHaveToAccessRolesFields(): array
    {
        return isset($_ENV['ANY_ROLE_LOGGED_IN_USER_MUST_HAVE_TO_ACCESS_ROLES_FIELDS']) ? json_decode($_ENV['ANY_ROLE_LOGGED_IN_USER_MUST_HAVE_TO_ACCESS_ROLES_FIELDS']) : [];
    }

    public static function anyCapabilityLoggedInUserMustHaveToAccessRolesFields(): array
    {
        return isset($_ENV['ANY_CAPABILITY_LOGGED_IN_USER_MUST_HAVE_TO_ACCESS_ROLES_FIELDS']) ? json_decode($_ENV['ANY_CAPABILITY_LOGGED_IN_USER_MUST_HAVE_TO_ACCESS_ROLES_FIELDS']) : [];
    }
}
