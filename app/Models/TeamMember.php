<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\TeamMember
 *
 * @property int $id
 * @property string $full_name
 * @property string $role
 * @property string $photo
 * @property string $description
 * @property \Carbon\Carbon|null $created_at
 * @property \Carbon\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\TeamMember whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\TeamMember whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\TeamMember whereFullName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\TeamMember whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\TeamMember wherePhoto($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\TeamMember whereRole($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\TeamMember whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class TeamMember extends Model
{

    protected $table = 'team_members';

    protected $fillable = ['full_name','role','photo','description'];

    public function getTableColumns() {
        return $this->getConnection()->getSchemaBuilder()->getColumnListing($this->getTable());
    }
}
