<?php

namespace App\Models;

use App\Enums\Table;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


/**
 * @property string id
 * @property string name
 * @property integer quota
 * @property bool is_active
 * @property Carbon start_date
 * @property Carbon end_date
 * @property Carbon created_at
 * @property Carbon updated_at
 * @property Carbon deleted_at
 */
class Period extends Model
{
    use HasFactory, HasUuids, SoftDeletes;

    protected $table = Table::PERIODS->value;

    protected $fillable = ["name", "quota", "is_active", "start_date", "end_date"];
}
