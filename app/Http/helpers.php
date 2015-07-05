<?php 

use Jenssegers\Date\Date;
use Illuminate\Support\Facades\DB as DB;

    function shortTitle($string) {
        // get the first 2 words from $string
        $ex_string = explode(' ', $string);
        return $ex_string[0] . ' ' . $ex_string[1];
    }


    function title($string) {
        return ucwords($string);
    }

    function removeDash($string) {
        return str_replace('-', ' ', $string);
    }

    function slugToTitle($string) {
        return title(removeDash($string));
    }

    function humanize($date) {
        return Date::now()->timespan($date);
    }

    function humanDate($date) {
        $date = new Date($date);
        return $date->format('j F, Y');
    }

    function arrayToTitleString($array) {
        // ['aku-dan', 'dia-kamu'] => 'Aku Dan, Dia Kamu'
        return ucwords(rtrim(implode(', ', str_replace('-', ' ', $array)), ','));
    }

    function categoryCounter($catname) {
        // count images on each category
        $total = DB::table('wallpaper')
            ->where('cat', '=', $catname)
            ->get();
        return count($total);
    }

    function dynamicImgRes($w, $resolutionString) {
        /*
	* $w -> 1280
    	* $resolutionString -> 1280x780
	* showing auto-calculated height in html
	* given fixed width as input
    	*/
    	$resArray = explode('x', $resolutionString);
    	// dd($resArray);
    	$x = $resArray[0];
    	$y = $resArray[1];
	$ratio = $x / $y;
	$newY = round($w / $ratio, 0);
	return $w . 'x' . $newY;
    }

?>