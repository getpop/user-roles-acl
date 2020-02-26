<?php
namespace PoP\UserRolesACL\Conditional\UserState\TypeResolverDecorators;

use PoP\UserRolesACL\Conditional\UserState\Environment;
use PoP\UserRolesACL\Conditional\UserState\TypeResolverDecorators\AbstractValidateDoesLoggedInUserHaveRoleForFieldsPublicSchemaTypeResolverDecorator;

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
