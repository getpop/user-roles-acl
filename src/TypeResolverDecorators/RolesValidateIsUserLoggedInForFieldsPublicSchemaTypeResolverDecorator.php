<?php
namespace PoP\UserRolesACL\Conditional\UserState\TypeResolverDecorators;

use PoP\UserRolesACL\Conditional\UserState\Environment;
use PoP\ComponentModel\TypeResolvers\TypeResolverInterface;
use PoP\UserState\TypeResolverDecorators\AbstractValidateIsUserLoggedInForFieldsTypeResolverDecorator;

class RolesValidateIsUserLoggedInForFieldsPublicSchemaTypeResolverDecorator extends AbstractValidateIsUserLoggedInForFieldsTypeResolverDecorator
{
    use RolesValidateConditionForFieldsPublicSchemaTypeResolverDecoratorTrait;

    public function enabled(TypeResolverInterface $typeResolver): bool
    {
        return parent::enabled($typeResolver) && Environment::userMustBeLoggedInToAccessRolesFields();
    }
}
