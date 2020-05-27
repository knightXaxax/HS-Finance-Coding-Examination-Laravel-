<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($profile_id, Request $request)
    {

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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($profile_id, Request $request)
    {
        if(!$request->session()->get('profile_id'))
        {
            return redirect()->route('homepage');
        } else {
            if($profile_id != $request->session()->get('profile_id')) {
                return redirect()->route('profile', ['profile_id' => $request->session()->get('profile_id')]);
            } else {
                $posts = new Post();

                $posts_dataset = $posts->select("SELECT posts.id as 'id', posts.title as 'title', posts.content as 'content', posts.image_thumbnail_path as 'img_thumb_path', person.id as 'person_id', person.fullname as 'person_fullname', person.email as 'person_email', person.profile_picture_path as 'person_profile_pic' FROM `posts` posts INNER JOIN `personal_information` person ON posts.person_id = person.id WHERE person_id = :person_id", [
                    ':person_id' => $request->session()->get('profile_id'),
                ])->fetchAll();

                return view('pages.profile_page', [
                    'title' => 'Account',
                    'posts' => $posts_dataset,
                ]);
            }
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

    }
}
