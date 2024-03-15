<?php

namespace App\Enums;

use ArchTech\Enums\Metadata;
use ArchTech\Enums\Values;
use App\Enums\MetaProperties\{Description, FeatureGroup};
use ArchTech\Enums\Meta\Meta;


/**
 * @method string description()
 * @method string featureGroup()
 */
#[Meta(Description::class, FeatureGroup::class)]
enum Permission:string {
    use Values;
    use Metadata;


    #MANAGEMENT
    #MANAGEMENT - PERMISSIONS
    #[Description("can show all data permission")] #[FeatureGroup("management - permissions")]
    case MANAGEMENT_PERMISSIONS_SHOW = "management.permissions.show";


    #MANAGEMENT - ROLES
    #[Description("can show data role")] #[FeatureGroup("management - roles")]
    case MANAGEMENT_ROLES_SHOW = "management.roles.show";
    #[Description("can add new data role")] #[FeatureGroup("management - roles")]
    case MANAGEMENT_ROLES_STORE = "management.roles.store";
    #[Description("can update data role")] #[FeatureGroup("management - roles")]
    case MANAGEMENT_ROLES_UPDATE = "management.roles.update";
    #[Description("can delete data role")] #[FeatureGroup("management - roles")]
    case MANAGEMENT_ROLES_DESTROY = "management.roles.destroy";

}
