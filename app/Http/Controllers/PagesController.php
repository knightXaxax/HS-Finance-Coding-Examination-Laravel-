<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;

class PagesController extends Controller
{
    public function homepage()
    {
        $posts = new Post();

        $posts_dataset = $posts->select("SELECT posts.id as 'id', posts.title as 'title', posts.content as 'content', posts.image_thumbnail_path as 'img_thumb_path', person.id as 'person_id', person.fullname as 'person_fullname', person.email as 'person_email', person.profile_picture_path as 'person_profile_pic' FROM `posts` posts INNER JOIN `personal_information` person ON posts.person_id = person.id;",[])->fetchAll();

        return view('pages.homepage', [
            'title' => 'Homepage',
            'posts' => is_array($posts_dataset) ? $posts_dataset : '',
        ]);
    }

    public function login_page()
    {
        return view('pages.login_page', [
            'title' => 'Login',
        ]);
    }

    public function registration_page()
    {
        return view('pages.registration_page', [
            'title' => 'Registration',
        ]);
    }

    public function logout(Request $request)
    {
        sleep(1);
        $request->session()->flush();
        return redirect()->route('homepage');
    }
}
