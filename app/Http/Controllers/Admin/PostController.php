<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Post;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Validator;

class PostController extends Controller
{
    protected function validator($data) {
        return Validator::make($data, [
            'title' => 'required|max:255',
            'type' => 'required|in:text,photo',
            'date' => 'nullable|date',
            'image' => 'nullable',
            'content' => 'required'
        ]);
    }

    // /**
    //  * Display a listing of the resource.
    //  *
    //  * @return \Illuminate\Http\Response
    //  */
    // public function index()
    // {
    //     // w tym miejscu można wywołać widok default dla administratorów (zupełnie inny wygląd niż strona)
    // }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin/post/create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $this->validator($request->all())->validate();

        // $data = Arr::add($data, 'date', now());

        // dd($request->all());
        $post = Post::create($request->all());
        session()->flash('message', 'Post został dodany');

        return redirect(route('posts/single', $post->slug));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = Post::findOrFail($id);
        return view('admin\post\edit', compact('post'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $post = Post::findOrFail($id);

        $data = $this->validator($request->all())->validate();
        $post->update($data);

        return back()->with('message', 'Post został zaktualizowany');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post::findOrFail($id);
        $post->delete();
        return redirect('/')->with('message', 'Wpis został usunięty');
    }
}
