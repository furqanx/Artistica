<?php

namespace App\Http\Controllers;

use App\Models\Post_Likes;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Posts;
use App\Models\User;
use App\Models\Comments;

class PostController extends Controller
{
    public function create()
    {
        return view('pages.upload');        
    }

    public function store(Request $request)
    {
        // Validasi inputan
        $request->validate([
            'image_path' => 'required', 
            'title' => 'required',
            'description' => 'required',
        ]);

        // Menyimpan gambar ke dalam folder "public/img/post"
        $image = $request->file('image_path');
        $imageName = $image->getClientOriginalName();
        $image->move(public_path('img/post'), $imageName);

        // Menyimpan data inputan ke dalam database
        $posts = new Posts;
        $posts->user_id = Auth::user()->id;
        $posts->image_path = $imageName;
        $posts->title = $request->title;
        $posts->description = $request->description;
        $posts->save();

        // Mengirimkan id postingan ke tabel Comments
        $comment = new Comments();
        $comment->post_id = $posts->id;
        $comment->save();

        // Redirect ke halaman upload postingan
        return redirect('home')->with('success', 'Sampah berhasil diupload.');
    }

    public function show($id)
    {
        $auth_user = auth()->user();
        $posts = Posts::findOrFail($id);
        $likeCount = $posts->post_likes->count(); // menghitung jumlah like yang dimiliki oleh suatu postingan
        $comments = Comments::where('post_id', $id)->get(); // 
        // $post_comments = $posts->Comments[0];

        // dd($posts->image_path);                          // gambar postingan
        // dd($posts->Users->name);                         // nama pemilik postingan
        // dd($posts->title);                               // title postingan
        // dd($posts->description);                         // deskripsi postingan
        // dd($posts->Comments[0]->Users->name);            // nama user yang memberikan komentar
        // dd($posts->Comments[0]->comment_content);        // kalimat komentar / isi dari komentar
        
        return view('pages.post', compact('posts', 'auth_user', 'comments', 'likeCount'));
    }

    public function comment(Request $request, $id)
    {
        $existingComment = Comments::where('post_id', $id)->first();

        /** jika masih ada post_id yang tersedia, maka gunakan record tersebut, tidak perlu membuat yang baru */
        if ($existingComment && $existingComment->user_id === null && $existingComment->comment_content === null) {
            $existingComment->user_id = Auth::user()->id;
            $existingComment->comment_content = $request->comment;
            $existingComment->save();
        } /** jika tidak ada lagi post_id yang tersedia, maka buat record baru */
        else {
            $comment = new Comments;
            $comment->user_id = Auth::user()->id;
            $comment->post_id = $id;
            $comment->comment_content = $request->comment;
            $comment->save();
        }
        
        // Redirect ke halaman postingan
        return redirect()->route('post.show', ['id' => $id])->with('success', 'Komentar berhasil diupload');
    }

    public function destroy($id)
    {
        /** menghapus postingan */
        $post = Posts::findOrFail($id);
        $post->delete();

        return redirect()->route('home')->with('success', 'Postingan berhasil dihapus.');
    }
    
    public function like($id)
    {
        $user = Auth::user();
        $post = Posts::findOrFail($id);

        $existingLike = Post_Likes::where('post_id', $post->id)
                                ->where('user_id', $user->id)
                                ->first();

        if (!$existingLike) {
            // Tambahkan like jika belum ada
            $likes = new Post_Likes();
            $likes->user_id = $user->id;
            $likes->post_id = $post->id;
            $likes->save();

            return redirect()->route('post.show', ['id' => $id])->with('success', 'Likes a post');
        } 
        else {
            // Jika sudah ada like dengan user_id yang sama, hapus like tersebut
            $existingLike->delete();

            return redirect()->route('post.show', ['id' => $id])->with('success', 'Cancelled like');
        }
    }
}


