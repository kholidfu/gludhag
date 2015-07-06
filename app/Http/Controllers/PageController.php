<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Request as req;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\URL;
use DB;
use Kholid\CustomPagination;


class PageController extends Controller { 

    function index() {

        $random = env('RANDOM_INDEX');

        if ($random) {
            $images = DB::table('wallpaper')
            ->orderByRaw("RAND()")
            ->paginate(env('LIMIT_PER_PAGE'))
            ->setPath(env('PAGING_SLUG'));
        } else {
            $images = DB::table('wallpaper')
            ->orderBy('id', 'DESC')
            ->paginate(env('LIMIT_PER_PAGE'))
            ->setPath(env('PAGING_SLUG'));
        }
        foreach ($images as $des) {
            $desc = $des;
        }
        
        $recents = DB::table('wallpaper')
            ->orderBy('id', 'DESC')
            ->take(5)
            ->get();
        $randimg = DB::table('wallpaper')
            ->orderByRaw("RAND()")
            ->take(3)
            ->get();
        $randimg1 = DB::table('wallpaper')
            ->orderByRaw("RAND()")
            ->take(3)
            ->skip(3)
            ->get();
        $tags = DB::table('wallpaper')
            ->orderByRaw("RAND()")
            ->take(mt_rand(7,11))
            ->get();            

        // pagination
        $paging = with(new CustomPagination($images))->render();

        return view('arkitekt.index', compact('images', 'desc', 'recents', 'randimg', 'randimg1', 'tags', 'paging'));
    }


    function indexPaging() {

        // redirect if page param value == 1
        if ($_GET['page'] == 1) {
            return Redirect::to("/", 301);
        }

        // paging customize ~> Illuminate\Pagination\BootstrapThreePresenter.php

        $images = DB::table('wallpaper')
            ->orderBy('id', 'DESC')
            ->paginate(env('LIMIT_PER_PAGE'))
            ->setPath(env('PAGING_SLUG'));
        foreach ($images as $des) {
            $desc = $des;
        }            
        $recents = DB::table('wallpaper')
            ->orderBy('id', 'DESC')
            ->take(5)
            ->get();
        $randimg = DB::table('wallpaper')
            ->orderByRaw("RAND()")
            ->take(3)
            ->get();
        $randimg1 = DB::table('wallpaper')
            ->orderByRaw("RAND()")
            ->take(3)
            ->skip(3)
            ->get();
        $tags = DB::table('wallpaper')
            ->orderByRaw("RAND()")
            ->take(mt_rand(7,11))
            ->get();            

        // pagination
        $paging = with(new CustomPagination($images))->render();

        // get current page /goto?page=num
        $curPage = $images->currentPage();

        return view('arkitekt.index_paging', compact('images', 'desc', 'recents', 'randimg', 'randimg1', 'tags', 'paging', 'curPage'));
    }


    function detail($imgtitle, $id) {
        // get single image
        $image = DB::table('wallpaper')->find($id);
	// find the title, if not match return 404
	if ($imgtitle !== $image->wallslug) {
	   abort(404);
	}
        $short_title = str_slug($this->shortTitle($image->walltitle), '-');

        $vav = DB::table('wallpaper')
            ->orderByRaw("RAND()")
            ->take(mt_rand(3,5))
            ->get(); 
        // get related images (abal2)
        $relateds1 = DB::table('wallpaper')
            ->orderBy('id', 'DESC')
            ->skip(1)
            ->take(3)
            ->get();                
        $relateds2 = DB::table('wallpaper')
            ->orderBy('id', 'DESC')
            ->skip(4)
            ->take(3)
            ->get();
        $relateds3 = DB::table('wallpaper')
            ->orderBy('id', 'DESC')
            ->skip(7)
            ->take(3)
            ->get();
        $recents = DB::table('wallpaper')
            ->orderBy('id', 'DESC')
            ->take(5)
            ->get();
        $randimg = DB::table('wallpaper')
            ->orderByRaw("RAND()")
            ->take(3)
            ->get();
        $randimg1 = DB::table('wallpaper')
            ->orderByRaw("RAND()")
            ->take(3)
            ->skip(3)
            ->get(); 
        $images = DB::table('wallpaper')
            ->orderBy('wallview', 'DESC')
            ->take(7)
            ->get(); 
        $tags = DB::table('wallpaper')
            ->orderByRaw("RAND()")
            ->take(mt_rand(7,11))
            ->get();

        // get categories
        $categories = $this->getCategory();

        return view('arkitekt.detail', compact('image', 'vav', 'vavsqq', 'short_title', 'short_title1', 'relateds1', 'relateds2', 'relateds3', 'recents', 'randimg', 'randimg1', 'images', 'tags', 'categories'));
    }


    function attachment($twowordsoftitle, $imgtitle, $id) {
        $image = DB::table('wallpaper')->find($id);
        // increment view by 1
        DB::table('wallpaper')
            ->where('id', '=', $id)
            ->increment('wallview');

        // fake related
        // get related images (abal2)
        $images = DB::table('wallpaper')
            ->orderBy('id', 'RAND')
            ->skip(mt_rand(7,15))
            ->take(env('LIMIT_ATTACHMENT'))
            ->get();
        $recents = DB::table('wallpaper')
            ->orderBy('id', 'DESC')
            ->take(5)
            ->get();
        $randimg = DB::table('wallpaper')
            ->orderByRaw("RAND()")
            ->take(3)
            ->get();
        $randimg1 = DB::table('wallpaper')
            ->orderByRaw("RAND()")
            ->take(3)
            ->skip(3)
            ->get();
        $tags = DB::table('wallpaper')
            ->orderByRaw("RAND()")
            ->take(mt_rand(7,11))
            ->get();                   

        return view('arkitekt.attachment', compact('image', 'recents', 'randimg', 'randimg1', 'tags', 'images'));
    }


    function category() {
        /*
          - get categories
          - query db, get first image of each category.
          - show them in view
         */
        $categories = $this->getCategory();
        $thumbs = array();
        for ($i=0; $i<sizeof($categories); $i++) {
            $results = DB::table('wallpaper')
                 ->where('cat', '=', $categories[$i])
                 ->take(1)
                 ->get();
            // dd($results[$i]->wallpath);
            if ($results) {
                array_push($thumbs, $results[0]);
            }
        }       

        $recents = DB::table('wallpaper')
            ->orderBy('id', 'DESC')
            ->take(5)
            ->get();
        $randimg = DB::table('wallpaper')
            ->orderByRaw("RAND()")
            ->take(3)
            ->get();
        $randimg1 = DB::table('wallpaper')
            ->orderByRaw("RAND()")
            ->take(3)
            ->skip(3)
            ->get();
        $tags = DB::table('wallpaper')
            ->orderByRaw("RAND()")
            ->take(mt_rand(7,11))
            ->get();
        $images = DB::table('wallpaper')
            ->orderBy('wallview', 'DESC')
            ->take(7)
            ->get();      
        $catString = arrayToTitleString($categories);

        return view('arkitekt.category', compact('categories', 'recents', 'randimg', 'randimg1', 'tags', 'images', 'thumbs', 'thumbar', 'catString'));
    }

    function listcategory($catname) {
        /*
          get first 20 images within category :: $catname
         */
        $images = DB::table('wallpaper')
            ->where('cat', '=', $catname)
            ->orderBy('id', 'DESC')
            ->paginate(env('LIMIT_LISTCATEGORY'))
            ->setPath(env('PAGING_SLUG'));

        // get 3 titles for page title meta           
        $titles = DB::table('wallpaper')
            ->where('cat', '=', $catname)
            ->orderBy('id', 'DESC')
            ->paginate(env('LIMIT_LISTCATEGORY'))
            ->setPath(env('PAGING_SLUG')) 
            ->take(3);      

        // get titles for meta description
        $descriptions = DB::table('wallpaper')
            ->where('cat', '=', $catname)
            ->orderBy('id', 'DESC')
            ->paginate(env('LIMIT_LISTCATEGORY'))
            ->setPath(env('PAGING_SLUG')); 

        // extract walltitle and join it to string
        $container = array();
        for ($i=0; $i<sizeof($titles); $i++) {
            array_push($container, $titles[$i]->walltitle);
        }

        $titles = arrayToTitleString($container);

        // extract walltitle and join it to string
        $container = array();
        for ($i=0; $i<sizeof($descriptions); $i++) {
            array_push($container, $descriptions[$i]->walltitle);
        }

        $descriptions = arrayToTitleString($container);
        $recents = DB::table('wallpaper')
            ->orderBy('id', 'DESC')
            ->take(5)
            ->get();
        $randimg = DB::table('wallpaper')
            ->orderByRaw("RAND()")
            ->take(3)
            ->get();
        $randimg1 = DB::table('wallpaper')
            ->orderByRaw("RAND()")
            ->take(3)
            ->skip(3)
            ->get();
        $tags = DB::table('wallpaper')
            ->orderByRaw("RAND()")
            ->take(mt_rand(7,11))
            ->get();                          

        // paging
        $paging = with(new CustomPagination($images))->render();

        return view('arkitekt.list_category', compact('images', 'catname', 'titles', 'descriptions', 'recents', 'randimg', 'randimg1', 'tags', 'paging'));
    }


    function categoryPaging($catname) {

        if ($_GET['page'] == 1) {
            header('HTTP/1.1 301 Moved Permanently');
            header('Location: ' . env('CATEGORY_SLUG') . $catname . '/');
            exit();
        }

        $images = DB::table('wallpaper')
            ->where('cat', '=', $catname)
            ->orderBy('id', 'DESC')
            ->paginate(env('LIMIT_LISTCATEGORY'))
            ->setPath(env('PAGING_SLUG'));

        // get 3 titles for page title meta           
        $titles = DB::table('wallpaper')
            ->where('cat', '=', $catname)
            ->orderBy('id', 'DESC')
            ->paginate(env('LIMIT_LISTCATEGORY'))
            ->setPath(env('PAGING_SLUG')) 
            ->take(3);      

        // get titles for meta description
        $descriptions = DB::table('wallpaper')
            ->where('cat', '=', $catname)
            ->orderBy('id', 'DESC')
            ->paginate(env('LIMIT_LISTCATEGORY'))
            ->setPath(env('PAGING_SLUG')); 

        // extract walltitle and join it to string
        $container = array();
        for ($i=0; $i<sizeof($titles); $i++) {
            array_push($container, $titles[$i]->walltitle);
        }

        $titles = arrayToTitleString($container);

        // extract walltitle and join it to string
        $container = array();
        for ($i=0; $i<sizeof($descriptions); $i++) {
            array_push($container, $descriptions[$i]->walltitle);
        }

        $descriptions = arrayToTitleString($container);
        $recents = DB::table('wallpaper')
            ->orderBy('id', 'DESC')
            ->take(5)
            ->get();
        $randimg = DB::table('wallpaper')
            ->orderByRaw("RAND()")
            ->take(3)
            ->get();
        $randimg1 = DB::table('wallpaper')
            ->orderByRaw("RAND()")
            ->take(3)
            ->skip(3)
            ->get();
        $tags = DB::table('wallpaper')
            ->orderByRaw("RAND()")
            ->take(mt_rand(7,11))
            ->get();                 

        // paging
        $paging = with(new CustomPagination($images))->render();

        // get page parameter value 1, 2, 3, 4 dst
        $curPage = $images->currentPage();

        return view('arkitekt.category_paging', compact('images', 'catname', 'titles', 'descriptions', 'recents', 'randimg', 'randimg1', 'tags', 'paging', 'curPage'));
    }


    function popular() {
        $images = DB::table('wallpaper')
            ->orderBy('wallview', 'DESC')
            ->take(20)
            ->get();
        $recents = DB::table('wallpaper')
            ->orderBy('id', 'DESC')
            ->take(5)
            ->get();
        $randimg = DB::table('wallpaper')
            ->orderByRaw("RAND()")
            ->take(3)
            ->get();
        $randimg1 = DB::table('wallpaper')
            ->orderByRaw("RAND()")
            ->take(3)
            ->skip(3)
            ->get();
        $tags = DB::table('wallpaper')
            ->orderByRaw("RAND()")
            ->take(mt_rand(7,11))
            ->get();                    
        return view('arkitekt.popular', compact('images', 'recents', 'randimg', 'randimg1', 'tags'));
    }


    function newest() {
        $images = DB::table('wallpaper')
            ->orderBy('id', 'DESC')
            ->take(20)
            ->get();
        $recents = DB::table('wallpaper')
            ->orderBy('id', 'DESC')
            ->take(5)
            ->get();
        $randimg = DB::table('wallpaper')
            ->orderByRaw("RAND()")
            ->take(3)
            ->get();
        $randimg1 = DB::table('wallpaper')
            ->orderByRaw("RAND()")
            ->take(3)
            ->skip(3)
            ->get();
        $tags = DB::table('wallpaper')
            ->orderByRaw("RAND()")
            ->take(mt_rand(7,11))
            ->get();                      
        return view('arkitekt.newest', compact('images', 'recents', 'randimg' , 'randimg1', 'tags'));
    }


    function about() {
        $recents = DB::table('wallpaper')
            ->orderBy('id', 'DESC')
            ->take(5)
            ->get();
        $randimg = DB::table('wallpaper')
            ->orderByRaw("RAND()")
            ->take(3)
            ->get();
        $randimg1 = DB::table('wallpaper')
            ->orderByRaw("RAND()")
            ->take(3)
            ->skip(3)
            ->get();
        $tags = DB::table('wallpaper')
            ->orderByRaw("RAND()")
            ->take(mt_rand(7,11))
            ->get();          
        return view('arkitekt.about', compact('recents' ,'randimg' , 'randimg1' ,'tags'));
    }


    function privacy() {
        $recents = DB::table('wallpaper')
            ->orderBy('id', 'DESC')
            ->take(5)
            ->get();
        $randimg = DB::table('wallpaper')
            ->orderByRaw("RAND()")
            ->take(3)
            ->get();
        $randimg1 = DB::table('wallpaper')
            ->orderByRaw("RAND()")
            ->take(3)
            ->skip(3)
            ->get();
        $tags = DB::table('wallpaper')
            ->orderByRaw("RAND()")
            ->take(mt_rand(7,11))
            ->get();          
        return view('arkitekt.privacy', compact('recents' ,'randimg' , 'randimg1' ,'tags'));
    }

    function terms() {
        $recents = DB::table('wallpaper')
            ->orderBy('id', 'DESC')
            ->take(5)
            ->get();
        $randimg = DB::table('wallpaper')
            ->orderByRaw("RAND()")
            ->take(3)
            ->get();
        $randimg1 = DB::table('wallpaper')
            ->orderByRaw("RAND()")
            ->take(3)
            ->skip(3)
            ->get();
        $tags = DB::table('wallpaper')
            ->orderByRaw("RAND()")
            ->take(mt_rand(7,11))
            ->get();          
        return view('arkitekt.terms', compact('recents' ,'randimg' , 'randimg1' ,'tags'));
    }    


    function contact() {
        $recents = DB::table('wallpaper')
            ->orderBy('id', 'DESC')
            ->take(5)
            ->get();
        $randimg = DB::table('wallpaper')
            ->orderByRaw("RAND()")
            ->take(3)
            ->get();
        $randimg1 = DB::table('wallpaper')
            ->orderByRaw("RAND()")
            ->take(3)
            ->skip(3)
            ->get();
        $tags = DB::table('wallpaper')
            ->orderByRaw("RAND()")
            ->take(mt_rand(7,11))
            ->get();          
        return view('arkitekt.contact', compact('recents' ,'randimg' , 'randimg1' ,'tags'));
    }


    function sitemap($char) {
        // show all posts which started with $char
	$recents = DB::table('wallpaper')
            ->orderBy('id', 'DESC')
            ->take(5)
            ->get();
        $randimg = DB::table('wallpaper')
            ->orderByRaw("RAND()")
            ->take(3)
            ->get();
        $randimg1 = DB::table('wallpaper')
            ->orderByRaw("RAND()")
            ->take(3)
            ->skip(3)
            ->get();
        $tags = DB::table('wallpaper')
            ->orderByRaw("RAND()")
            ->take(mt_rand(7,11))
            ->get();          
	$data = DB::table('wallpaper')
	    ->where('wallslug', 'LIKE', $char . '%')
	    ->take(5)
	    ->get();
	$char = ucwords($char);
	return view('arkitekt.sitemap', compact('char', 'recents', 'tags', 'randimg', 'randimg1', 'data'));
    }


    function shortTitle($string) {
        // get the first 2 words from $string
        $ex_string = explode(' ', $string);
        return $ex_string[0] . ' ' . $ex_string[1];
    }


    function getCategory() {
        /*
          ideally ini read folder di uploads/
          masing-masing nama folder ini adalah category.
         */
        return [
            "home-interior", 
            "bathroom-design",
            "home-element",
            "kitchen-design",
            "modern-architecture",
            "gardening",
            "dining-room",
            "living-room",
            "contemporary-office",
            "interior-decoration",
            "modern-bathroom",
            "bedroom-ideas",
            "modern-kitchen",
        ];
    }

}
