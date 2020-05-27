<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Post;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('pages.post_creator_page', [
            'title' => 'Create Post'
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        sleep(1);
        $validated_data = request()->validate([
            'title' => 'required',
            'post_creator' => 'required',
            'image_thumbnail_post' => 'required|file',
        ]);

        $validated_data['person_id'] = $request->session()->get('profile_id');

        $post = new Post();
        $status = $post->add($validated_data);
        if($status) {
            return redirect()->route('profile', ['profile_id' => $request->session()->get('profile_id')]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($post_id, Request $request)
    {
        $post = new Post();
        $post_ids = $request->session()->get('profile_id') ? $post->select("SELECT id FROM `posts` WHERE person_id=:person_id", [
            ':person_id' => $request->session()->get('profile_id'),
        ])->fetchAll() : "";

        if(!empty($post_ids))
            if($post_ids != "")
                foreach($post_ids as $post_detail)
                    $posts_ids[] = $post_detail['id'];

        $post_dataset = $post->select("SELECT * FROM `posts` WHERE id=:id", [':id' => $post_id])->fetch();
        return view('pages.show_post', [
            'title' => $post_dataset['title'],
            'post' => $post_dataset,
            'online_account' => $request->session()->get('profile_id') ? true : false,
            'post_owned' => !empty($post_ids) ? in_array($post_id, $posts_ids) ? true : false : false,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($post_id)
    {
        $post = new Post();

        if(is_array($post->specific_post($post_id)))
        {
            echo json_encode([
                'data' => base64_encode(base64_encode(json_encode($post->specific_post($post_id)))),
            ]);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $post_id)
    {
        sleep(1);
        $request_data = request();
        if($request->hasFile('image_thumbnail_post_update')) {
            $request_data = request()->validate([
                'title_post_update' => 'required',
                'post_creator_update' => 'required',
                'image_thumbnail_post_update' => 'required|file',
            ]);
        }

        $post = new Post();
        $request_data['email'] = $post->select("SELECT `email` from `personal_information` WHERE id=:person_id;", [
            ':person_id' => $request->session()->get('profile_id'),
        ])->fetch()['email'];

        $request_data['post_id'] = $post_id;

        $status = $post->update_by_id($request_data);

        if($status) {
            return redirect()->route('profile', ['profile_id' => $request->session()->get('profile_id')]);
        } else {
            return back();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($post_id)
    {
        $post = new Post();

        $status = $post->delete_by_id($post_id);

        if($status) {
            echo response()->JSON([
                'msg' => 'deleted',
            ])->header('Access-Control-Allow-Origin', '*');
        }
    }
}
