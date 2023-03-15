<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Setting;
use Intervention\Image\ImageManager;
use Illuminate\Support\Facades\Storage;
use GuzzleHttp\Client;
use Carbon\Carbon;
use App\Seo;
use Auth;

class AdminThemeEditorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
        $this->middleware('admin');
    }

    
     public function Main()
     {
         $data['infosetting'] = Setting::first();
         return $data;
     }

    
    public function code_editor($file)
    {
        $file_isset = [
            // 'root' => resource_path('views/master.blade.php'),
            'home' => resource_path('views/movie/home.blade.php'),
            'movie-root' => resource_path('views/movie/movie.blade.php'),
            'movie-template' => resource_path('views/template/movie.blade.php'),
            'article-sigle' => resource_path('views/article/article.blade.php'),
            'article-all' => resource_path('views/article/article_all.blade.php'),
            'sidebar' => resource_path('views/template/content-right.blade.php'),
            'header' => resource_path('views/template/header.blade.php'),
            'footer' => resource_path('views/template/footer.blade.php'),
            'listmovie' => resource_path('views/template/movie/listmovie.blade.php')
        ];

        $file_isset_description = [
            // 'root' => "ไฟล์",
            'home' => "ไฟล์แสดงเพจหน้าแรก",
            'movie' => "ไฟล์แสดงเพจหน้าดูหนัง",
            'article-sigle' => "ไฟล์แสดงเพจบทความ",
            'article-all' => "ไฟล์แสดงเพจรวมบทความ",
            'sidebar' => "ไฟล์เมนูด้านขวา",
            'header' => "ไฟล์ Header จัดการ Navbar",
            'footer' => "ไฟล์ Footer",
            'listmovie' => "การแสดงลิสหนัง"
        ];

        $get_file_root = fopen($file_isset[$file], "r") or die("Unable to open file!");
        $data['file'] = $file;
    
        $data['code'] = fread($get_file_root,filesize($file_isset[$file]));

        

        return view('admin.page.themeeditor.editor',$data);
    }

    public function code_editor_post(Request $req, $file)
    {
        $file_isset = [
            // 'root' => resource_path('views/master.blade.php'),
            'home' => resource_path('views/movie/home.blade.php'),
            'movie-root' => resource_path('views/movie/movie.blade.php'),
            'movie-template' => resource_path('views/template/movie.blade.php'),
            'article-sigle' => resource_path('views/article/article.blade.php'),
            'article-all' => resource_path('views/article/article_all.blade.php'),
            'sidebar' => resource_path('views/template/content-right.blade.php'),
            'header' => resource_path('views/template/header.blade.php'),
            'footer' => resource_path('views/template/footer.blade.php'),
            'listmovie' => resource_path('views/template/movie/listmovie.blade.php')
        ];


        $get_file_root = fopen($file_isset[$file], "r+") or die("Unable to open file!");
        fwrite($get_file_root,html_entity_decode($req->data['code']));
        // $data['file'] = $file;
        // $data['code'] = htmlspecialchars_decode(fread($get_file_root,filesize(resource_path('views/movie/home.blade.php'))));


        // return view('admin.page.themeeditor.editor',$data);
    }


    public function index(Request $req)
    {
        if(!Auth::check())
        {
            return redirect()->route('admin.login');
        }
        $data = $this->Main();
        $data['header_title'] = "THEME Editor ".strtoupper($req->type);

        $data['request'] = Setting::find(1);

        $file_isset = [
            // 'root' => resource_path('views/master.blade.php'),
            'home' => resource_path('views/movie/home.blade.php'),
            'movie-root' => resource_path('views/movie/movie.blade.php'),
            'movie-template' => resource_path('views/template/movie.blade.php'),
            'article-sigle' => resource_path('views/article/article.blade.php'),
            'article-all' => resource_path('views/article/article_all.blade.php'),
            'sidebar' => resource_path('views/template/content-right.blade.php'),
            'header' => resource_path('views/template/header.blade.php'),
            'footer' => resource_path('views/template/footer.blade.php'),
            'listmovie' => resource_path('views/template/movie/listmovie.blade.php')
        ];

        $file_isset_description = [
            // 'root' => "ไฟล์",
            'home' => "ไฟล์แสดงเพจหน้าแรก",
            'movie-root' => "ไฟล์แสดงเพจหน้าดูหนัง",
            'movie-template' => "ไฟล์แสดงเพจหน้าดูหนัง รายละเอียดต่างๆ",
            'article-sigle' => "ไฟล์แสดงเพจบทความ",
            'article-all' => "ไฟล์แสดงเพจรวมบทความ",
            'sidebar' => "ไฟล์เมนูด้านขวา",
            'header' => "ไฟล์ Header จัดการ Navbar",
            'footer' => "ไฟล์ Footer",
            'listmovie' => "การแสดงลิสหนัง"
        ];
        $data['file_list'] = $file_isset;
        $data['file_list_detail'] = $file_isset_description;

        return view('admin.page.themeeditor.themeeditor', $data);
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
        if(env("DEMO",'0') == "1")
        {
            return redirect()->back();
        }
        
        // /** Check Domain IAMTHEME **/
        // $checkDomain = new Client;
        // $res = $checkDomain->request('GET', $url, ['http_errors' => false]);

        $data = Seo::first();
        $data->seo_title = $request->seo_title;
        $data->seo_description_type = $request->seo_description_type;
        $data->front_seo = trim($request->front_seo);
        $data->update();

        session()->flash('message', 'อัพเดทสำเร็จ');
        return redirect()->route('admin.seo');


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
