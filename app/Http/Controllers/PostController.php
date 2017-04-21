<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Post;
use Auth;

class PostController extends Controller
{
    
    public function showAllposts(){
        //show all post
    	//$varpost=Post::all();
        $varpost=Post::where([['user_id','=',Auth::user()->id]])->get();

    	return view('posts')->with('postview',$varpost);
    	// return view('posts')->withPostview($varpost);
    }

    public function createPost(){
    	return view('postform');
    }

    public function savePost(Request $request){

    	$this->validate($request, [
    		'title' => 'required|max:60',
    		'story' => 'required|max:100',
    		]);

    	$varpost=new Post;
        $varpost->user_id=Auth::user()->id;
    	$varpost->title=$request->input('title');
    	$varpost->story=$request->input('story');

    	$varpost->save();

    	return redirect()->route('post.index')->withSuccess('Post Created');
    }

    public function editPost($id){
        $varpost=Post::where([
            ['id','=',$id],
            ['user_id','=',Auth::user()->id]
            ])->first();

        return view('editform')->withId($id)->withPost($varpost);

    }

    public function updatePost(Request $request, $id){
        $varpost=Post::where([
            ['id','=',$id],
            ['user_id','=',Auth::user()->id]
            ])->first();

        if($varpost){
            $varpost->title=$request->input('title');
            $varpost->story=$request->input('story');
            $varpost->save();

            return redirect()->route('post.index')->withSuccess(' Syukur Post Succesfully Updated');

        }
        else {
            return redirect()->route('post.index')->withSuccess('Cannot Update Post');
        }


    }

    public function searchPost(Request $request){
        $searchtext=$request->input('searchtext');
        $searchopt=$request->input('searchopt');
        if ( !empty($searchtext)){
            switch($searchopt){
                case 'id': 
                $res=Post::where([['id','=',$searchtext]])->get();
                break;
                case 'title': 
                $searchtext='%'.$searchtext.'%';
                $res=Post::where([['title','like',$searchtext]])->get();
                break;
                case 'story': 
                $res=Post::where([['story','=',$searchtext]])->get();
                break;
                default: 
                $res=Post::where([['id','=',$searchtext]])->get();
                break;
            }
        }
        else{

            $res=Post::all();

        }
        return view('posts')->withPostview($res);
    }

    public function deletePost($id){
        $varpost=Post::find($id);
        //$varpost=Post::where([['id','=',$id],['user_id','=','0']])->first();

        if ($varpost){
            $varpost->delete();
            return redirect()->route('post.index')->withSuccess('Post Succesfully Deleted');
        }
        else{
            return redirect()->route('post.index')->withSuccess('Cannot Delete Post');
        }
    }



}
