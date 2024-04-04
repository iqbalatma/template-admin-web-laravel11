<?php

namespace App\Models;

use App\Contracts\Interfaces\DeletableRelationCheck;
use App\Enums\Table;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Model;
use Override;

/**
 * @property string id
 * @property string name
 * @property string guard_name
 * @property boolean is_mutable
 * @property Carbon created_at
 * @property Carbon updated_at
 */
class Role extends \Spatie\Permission\Models\Role implements DeletableRelationCheck
{
    use HasUuids;

    public array $relationCheckBeforeDelete = ["users"];
    protected $table = Table::ROLES->value;
    protected $fillable = [
        "name", "guard_name", "is_mutable"
    ];

    /**
     * @return array|string[]
     */
    #[Override] public function getRelationCheckBeforeDelete(): array
    {
        return $this->relationCheckBeforeDelete;
    }
}
