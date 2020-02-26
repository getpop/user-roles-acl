<?php
namespace PoP\UserRolesACL\TypeResolverDecorators;

use PoP\UserRolesACL\Environment;
use PoP\UserRolesACL\TypeResolverDecorators\AbstractValidateDoesLoggedInUserHaveRoleForFieldsPublicSchemaTypeResolverDecorator;

class RolesValidateDoesLoggedInUserHaveRoleForFieldsPublicSchemaTypeResolverDecorator extends AbstractValidateDoesLoggedInUserHaveRoleForFieldsPublicSchemaTypeResolverDecorator
{
    use RolesValidateConditionForFieldsPublicSchemaTypeResolverDecoratorTrait;

    protected function getRoleNames(): array
    {
        if ($roleName = Environment::roleLoggedInUserMustHaveToAccessRolesFields()) {
            return [$roleName];
        }
        return [];
    }
}
