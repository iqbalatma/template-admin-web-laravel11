<?php

namespace App\Enums;

use ArchTech\Enums\Metadata;
use ArchTech\Enums\Values;
use App\Enums\MetaProperties\{Description, FeatureGroup};
use ArchTech\Enums\Meta\Meta;

#[Meta(Description::class, FeatureGroup::class)]
enum Permission:string {
    use Values;
    use Metadata;


}
