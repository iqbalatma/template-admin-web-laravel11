<?php

namespace App\Models;

use App\Contracts\Interfaces\DeletableRelationCheck;
use App\Enums\Table;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Override;


/**
 * @property string id
 * @property string name
 * @property string guard_name
 * @property string feature_group
 * @property string description
 * @property Carbon created_at
 * @property Carbon updated_at
 * @property boolean is_active
 */
class Permission extends \Spatie\Permission\Models\Permission implements DeletableRelationCheck
{
    use HasUuids;
    public array $relationCheckBeforeDelete = [];

    protected $table = Table::PERMISSIONS->value;

    protected $fillable = [
        "name", "guard_name", "feature_group", "description"
    ];

    /**
     * @return array|string[]
     */
    #[Override] public function getRelationCheckBeforeDelete(): array
    {
        return $this->relationCheckBeforeDelete;
    }
}
