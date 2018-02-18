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
        // dd($request->header('authorization'));
        $this->validate($request, [
            'title' => 'required',
            'content' => 'required',
            'description' => 'required',
            'author' => 'required'
        ]);

        return $this->blog->create($request->all());
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
