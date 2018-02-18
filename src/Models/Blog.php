<?php
namespace Ridwanpandi\Blog\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Manipulate your quotes here
 */
class Blog extends Model
{
    use SoftDeletes;

    /**
     * Table Name
     *
     * @var string
     */
    protected $table = "blog";

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        "content", "title", "description", "author"
    ];

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = ['deleted_at'];

    /**
     * quotes belongs to user
     *
     * @var object
     */
    public function metas()
    {
        return $this->hasMany("Ridwanpandi\Blog\Models\Meta", "user_id", "user_id");
    }

}
