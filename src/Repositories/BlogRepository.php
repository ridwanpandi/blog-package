<?php
namespace Ridwanpandi\Blog\Repositories;

/**
 * Quote Repository
 * @created by @ridwanpandi
 */
interface BlogRepository
{
    public function getAll($page);

    public function create(array $attributes);

    public function update(array $attributes, $id);

    public function delete($id);
}
