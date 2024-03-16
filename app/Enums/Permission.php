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


    #MANAGEMENT - USERS
    #[Description("can show data user")] #[FeatureGroup("management - users")]
    case MANAGEMENT_USERS_SHOW = "management.users.show";
    #[Description("can add new data user")] #[FeatureGroup("management - users")]
    case MANAGEMENT_USERS_STORE = "management.users.store";
    #[Description("can update data user")] #[FeatureGroup("management - users")]
    case MANAGEMENT_USERS_UPDATE = "management.users.update";
    #[Description("can delete data user")] #[FeatureGroup("management - users")]
    case MANAGEMENT_USERS_DESTROY = "management.users.destroy";


    #TICKETS - PERIODS
    #[Description("can show data periods")] #[FeatureGroup("tickets - periods")]
    case TICKETS_PERIODS_SHOW = "tickets.periods.show";
    #[Description("can add new data periods")] #[FeatureGroup("tickets - periods")]
    case TICKETS_PERIODS_STORE = "tickets.periods.store";
    #[Description("can update data periods")] #[FeatureGroup("tickets - periods")]
    case TICKETS_PERIODS_UPDATE = "tickets.periods.update";
    #[Description("can delete data periods")] #[FeatureGroup("tickets - periods")]
    case TICKETS_PERIODS_DESTROY = "tickets.periods.destroy";

}
