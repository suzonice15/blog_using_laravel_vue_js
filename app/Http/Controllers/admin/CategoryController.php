<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use  Session;
use Image;
use AdminHelper;
use URL;
use Illuminate\Support\Facades\Redirect;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {


    }

    public function index()
    {


        $data['main'] = 'Categories';
        $data['active'] = 'All Categories';
        $data['title'] = '  ';
       // $data['users']=DB::table('category')->orderBy('cateo','desc')->get();
      //  return view('admin.user.index', $data);
        $data['categories']= DB::table('category')->orderBy('category_id', 'desc')->paginate(10);
        return response()->json($data);
    }

    public  function  fetch_data(Request $request){
        if($request->ajax())
        {

            $query = $request->get('query');
            $query = str_replace(" ", "%", $query);
            $categories = DB::table('category')
                ->orWhere('category_title', 'like', '%'.$query.'%')->paginate(10);
            return view('admin.category.pagination', compact('categories'));
        }

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $data['main'] = 'Categories';
        $data['active'] = 'All Categories';
        $data['title'] = '  ';
        $data['categories']=DB::table('category')->orderBy('category_title','ASC')->get();
        return view('admin.category.create', $data);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data['category_title']=$request->category_title;
        $data['category_name']=$request->category_name;

        $data['rank_order']=$request->rank_order;
        $data['status']=$request->status;
        $data['seo_title']=$request->seo_title;
        $data['seo_meta_title']=$request->seo_meta_title;
        $data['seo_keywords']=$request->seo_keywords;
        $data['seo_content']=$request->seo_content;
        $data['seo_meta_content']=$request->seo_meta_content;



            $data['registered_date']=date('Y-m-d');
        $result =DB::table('category')->insert($data);
        if ($result) {
            return redirect('admin/categories')
                ->with('success', 'created successfully.');
        } else {
            return redirect('admin/categories')
                ->with('error', 'No successfully.');
        }
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
        $user_id=AdminHelper::Admin_user_autherntication();
        $url=  URL::current();

        if($user_id < 1){
            //  return redirect('admin');
            Redirect::to('admin')->with('redirect',$url)->send();

        }

        $data['category']=DB::table('category')->where('category_id',$id)->first();
        $data['main'] = 'Users';
        $data['active'] = 'Update user';
        $data['title'] = 'Update User Registration Form';
        $data['categories']=DB::table('category')->orderBy('category_title','ASC')->get();
        return view('admin.category.edit', $data);
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
        $data['category_title']=$request->category_title;
        $data['category_name']=$request->category_name;
        $data['rank_order']=$request->rank_order;
        $data['status']=$request->status;
        $data['seo_title']=$request->seo_title;
        $data['seo_meta_title']=$request->seo_meta_title;
        $data['seo_keywords']=$request->seo_keywords;
        $data['seo_content']=$request->seo_content;
        $data['seo_meta_content']=$request->seo_meta_content;
        $data['registered_date']=date('Y-m-d');
        $result= DB::table('category')->where('category_id',$id)->update($data);
        if ($result) {
            return redirect('admin/categories')
                ->with('success', 'Updated successfully.');
        } else {
            return redirect('admin/categories')
                ->with('error', 'No successfully.');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function delete($id)
    {
        $user_id=AdminHelper::Admin_user_autherntication();
        $url=  URL::current();

        if($user_id < 1){
            //  return redirect('admin');
            Redirect::to('admin')->with('redirect',$url)->send();

        }

        $result=DB::table('category')->where('category_id',$id)->delete();
        if ($result) {
            return redirect('admin/categories')
                ->with('success', 'Deleted successfully.');
        } else {
            return redirect('admin/categories')
                ->with('error', 'No successfully.');
        }

    }
    public function destroy($id)
    {
        //
    }
    public  function  urlCheck(Request $request){
        $category_name = $request->get('url');
      $result= DB::table('category')->where('category_name',$category_name)->first();
        if($result){
            echo 'This category exit';
        } else {
            echo '';
        }


    }


}
