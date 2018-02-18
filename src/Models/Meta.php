<?php
namespace Ridwanpandi\Blog\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Manipulate your quotes here
 */
class Meta extends Model
{

    /**
     * Table Name
     *
     * @var string
     */
    protected $table = "blog_meta";

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        "blog_id", "name", "meta_value"
    ];

    /**
     * quotes belongs to user
     *
     * @var object
     */
    public function blog()
    {
        return $this->belongsTo("Ridwanpandi\Blog\Models\Blog", "blog_id", "blog_id");
    }

}
