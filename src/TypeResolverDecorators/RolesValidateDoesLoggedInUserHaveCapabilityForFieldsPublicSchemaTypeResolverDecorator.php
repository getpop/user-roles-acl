<?php
namespace PoP\UserRolesACL\TypeResolverDecorators;

use PoP\UserRolesACL\Environment;
use PoP\UserRolesACL\TypeResolverDecorators\AbstractValidateDoesLoggedInUserHaveCapabilityForFieldsPublicSchemaTypeResolverDecorator;

class RolesValidateDoesLoggedInUserHaveCapabilityForFieldsPublicSchemaTypeResolverDecorator extends AbstractValidateDoesLoggedInUserHaveCapabilityForFieldsPublicSchemaTypeResolverDecorator
{
    use RolesValidateConditionForFieldsPublicSchemaTypeResolverDecoratorTrait;

    protected function getCapabilities(): array
    {
        if ($capability = Environment::capabilityLoggedInUserMustHaveToAccessRolesFields()) {
            return [$capability];
        }
        return [];
    }
}
