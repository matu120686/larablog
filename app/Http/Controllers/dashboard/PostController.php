<?php
namespace App\Http\Controllers\dashboard;

use App\Category;
use App\Post;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\StorePostPost;
use App\PostImage;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

class PostController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except('index ','create');
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::orderBy('created_at','desc')->paginate(10);
       //select * from spots
        return view('dashboard.post.index',['posts' => $posts]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::pluck('id','title');
        return view('dashboard\post\create',["post" => new Post(),'categories'=>$categories]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePostPost $request)
    {
        
        Post::create($request->validated());

        /*$title = $request->title;
        $url_clean = $request->url_clean;
        $content = $request->content;*/
       
        return back()->with('status','Registro exitoso');
       
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        //$post = Post::findOrFail($id);        
            return view('dashboard\post\show',["post" => $post]);    

        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        $categories = Category::pluck('id','title');
        return view('dashboard\post\edit',['post' => $post,'categories'=>$categories]);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StorePostPost $request, Post $post)
    {
        $post->update($request->validated());       
        return back()->with('status','Registro Actualizado con exito');
        
    }
    public function image(Request $request, Post $post)
    {
        /*$post->update($request->validated());       
        return back()->with('status','Registro Actualizado con exito');*/
        $request->validate([

            'image' => 'required|mimes:jpeg,bmp,png|max:10240'//10MB
        ]);
         $filename = time().".".$request->image->extension();
         $request->image->move(public_path('images'),$filename);

         PostImage::create(['image' => $filename, 'post_id' => $post->id]);
         return back()->with('status','Imagen Cargado con exito');
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy( Post $post)
    {
        $post->delete();
        return back()->with('status','Post eliminado con exito');
        
    }
}
