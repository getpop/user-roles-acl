<?php
namespace PoP\UserRolesACL\TypeResolverDecorators;

use PoP\UserRolesACL\Environment;
use PoP\ComponentModel\TypeResolvers\TypeResolverInterface;
use PoP\UserStateAccessControl\TypeResolverDecorators\AbstractValidateIsUserLoggedInForFieldsTypeResolverDecorator;

class RolesValidateIsUserLoggedInForFieldsPublicSchemaTypeResolverDecorator extends AbstractValidateIsUserLoggedInForFieldsTypeResolverDecorator
{
    use RolesValidateConditionForFieldsPublicSchemaTypeResolverDecoratorTrait;

    public function enabled(TypeResolverInterface $typeResolver): bool
    {
        return parent::enabled($typeResolver) && Environment::userMustBeLoggedInToAccessRolesFields();
    }
}
