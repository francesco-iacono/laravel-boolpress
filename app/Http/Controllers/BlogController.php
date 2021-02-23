<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Comment;

class BlogController extends Controller
{
    /*
    *   articoli
    */
    public function index() {
        // usare first per ottenere un solo modello rispetto a get che restituisce un intera collection
        $posts = Post::all();
        
        return view('blog', compact('posts')); //compact sostituisce 'post' => $post
    }


    /*
    *   Dettaglio articolo
    */
    public function show($slug) {
        // usare first per ottenere un solo modello rispetto a get che restituisce un intera collection
        $post = Post::where('slug', $slug)->firstOrFail();
        
        return view('post', compact('post')); //compact sostituisce 'post' => $post
    }

    /*
    *   Aggiungere un commento
    */


    public function addComment(Request $request, $id) {

        /* dd($request->all()); */
        $data = $request->all();
        $data['post_id'] = $id;
        //nuova istanza
        $newComment = new Comment();
        $newComment->fill($data);
        /* $newComment->author = $data['author'];
        $newComment->text = $data['text'];
        $newComment->post_id = $id; */
        
        //salvataggio
        $newComment->save();

        $post = Post::findOrFail($id);
        return redirect()
            ->route('post', $post->slug);
    
    }
}
