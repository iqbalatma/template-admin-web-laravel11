<?php

namespace App\Models;

use App\Enums\Table;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Iqbalatma\LaravelServiceRepo\Contracts\Interfaces\DeletableRelationCheck;
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
    public const array RELATION_CHECK_BEFORE_DELETE = [];

    protected $table = Table::PERMISSIONS->value;

    protected $fillable = [
        "name", "guard_name", "feature_group", "description"
    ];

    /**
     * @return array|string[]
     */
    #[Override] public function getRelationCheckBeforeDelete(): array
    {
        return self::RELATION_CHECK_BEFORE_DELETE;
    }
}
