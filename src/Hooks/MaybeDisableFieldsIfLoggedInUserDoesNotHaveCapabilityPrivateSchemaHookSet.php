<?php
namespace PoP\UserRolesACL\Hooks;

use PoP\UserRolesACL\Environment;
use PoP\UserRolesAccessControl\Hooks\AbstractMaybeDisableFieldsIfLoggedInUserDoesNotHaveCapabilityPrivateSchemaHookSet;

class MaybeDisableFieldsIfLoggedInUserDoesNotHaveCapabilityPrivateSchemaHookSet extends AbstractMaybeDisableFieldsIfLoggedInUserDoesNotHaveCapabilityPrivateSchemaHookSet
{
    use MaybeDisableFieldsIfConditionPrivateSchemaHookSetTrait;

    protected function getCapabilities(): array
    {
        return Environment::anyCapabilityLoggedInUserMustHaveToAccessRolesFields();
    }
}
