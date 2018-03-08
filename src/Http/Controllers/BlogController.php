<?php
namespace Ridwanpandi\Blog\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Ridwanpandi\Blog\Repositories\BlogRepository as BlogRepository;

class BlogController extends Controller
{
    private $blog;

    /**
    * Constructor
    * @param Repository
    * @return void
    */
    public function __construct(BlogRepository $blog)
    {
        $this->middleware("jwt");
        $this->blog = $blog;
    }

    /**
    * Get all data
    *
    * @return JSON
    */
    public function getAll()
    {
        $response = $this->blog->getAll();
        return response()->json($response);
    }

    /**
    * Create quote
    *
    * @param Array
    * @return Response
    */
    public function create(Request $request)
    {
        $this->validate($request, [
            'title' => 'required',
            'content' => 'required',
            'description' => 'required',
            'author' => 'required'
        ]);

        return $this->blog->create($request->all());
    }

    /**
    * Update quote
    *
    * @param Array
    * @return Response
    */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'title' => 'required',
            'content' => 'required',
            'description' => 'required',
            'author' => 'required'
        ]);

        return $this->blog->update($request->all(), $id);
    }

    /**
    * Delete quote
    *
    * @param Array
    * @return Response
    */
    public function delete($id)
    {
        return $this->blog->delete($id);
    }
}
