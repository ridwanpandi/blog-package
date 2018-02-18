<?php
namespace Ridwanpandi\Blog\Repositories;

use Ridwanpandi\Blog\Models\Blog;
use Ridwanpandi\Blog\Repositories\BlogRepository;

/**
 * blog Repository
 */
class BlogEloquent implements BlogRepository
{

    private $model;

    function __construct(Blog $model)
    {
        $this->model = $model;
    }

    /**
    * Get all data
    * @return boolean
    */
    public function getAll($page = 10)
    {
        if (!empty($page)) {
            return $this->model->paginate($page);
        }
        return $this->model->all();
    }

    /**
    * Create blog
    * @param Array $attributes
    * @return boolean
    */
    public function create(array $attributes)
    {
        return $this->model->create($attributes);
    }

    /**
    * Create blog
    * @param Array $attributes
    * @return boolean
    */
    public function delete($id)
    {
        $blog = $this->model->where("blog_id", $id);
        return $blog->delete();
    }

}
