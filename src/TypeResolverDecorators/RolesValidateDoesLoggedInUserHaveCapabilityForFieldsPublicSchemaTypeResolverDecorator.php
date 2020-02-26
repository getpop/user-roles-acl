<?php
namespace PoP\UserRolesACL\Conditional\UserState\TypeResolverDecorators;

use PoP\UserRolesACL\Conditional\UserState\Environment;
use PoP\UserRolesACL\Conditional\UserState\TypeResolverDecorators\AbstractValidateDoesLoggedInUserHaveCapabilityForFieldsPublicSchemaTypeResolverDecorator;

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
