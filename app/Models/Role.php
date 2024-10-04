<?php

namespace App\Models;

use App\Enums\Table;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Iqbalatma\LaravelServiceRepo\Contracts\Interfaces\DeletableRelationCheck;
use Override;

/**
 * @property string id
 * @property string name
 * @property string guard_name
 * @property boolean is_mutable
 * @property Carbon created_at
 * @property Carbon updated_at
 * @property Collection<Permission> permissions
 * @property boolean is_active
 *
 */class Role extends \Spatie\Permission\Models\Role implements DeletableRelationCheck
{
    use HasUuids;

    protected const array RELATION_CHECK_BEFORE_DELETE = ["users"];

    protected $table = Table::ROLES->value;
    protected $fillable = [
        "name", "guard_name", "is_mutable"
    ];

    /**
     * @return array|string[]
     */
    #[Override] public function getRelationCheckBeforeDelete(): array
    {
        return self::RELATION_CHECK_BEFORE_DELETE;
    }
}
