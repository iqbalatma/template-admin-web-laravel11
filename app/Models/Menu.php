<?php

namespace App\Models;

use App\Enums\Table;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;


/**
 * @property string id
 * @property string label
 * @property string url
 * @property string icon
 * @property string parent_id
 * @property string permission_name
 * @property string level
 * @property Carbon created_at
 * @property Carbon updated_at
 */
class Menu extends Model
{
    use HasUuids;

    protected $table = Table::MENUS->value;

    protected $fillable = [
        "label", "url", "icon", "parent_id", "permission_name", "level"
    ];


    /**
     * @return BelongsTo
     */
    public function parent():BelongsTo
    {
        return $this->belongsTo(__CLASS__, "parent_id", "id");
    }


    /**
     * @return HasMany
     */
    public function children():HasMany
    {
        return $this->hasMany(__CLASS__, "parent_id", "id");
    }
}
