<?php
$reload = mt_rand(28800,86400);
echo '<meta http-equiv="refresh" content="'.$reload.'; url="http://www.al-maliki.com/admin/post/" />';
// SETTINGS
$sitenames = env('DOMAIN_NAME');
$_MYSQL_HOST = "localhost";
$_MYSQL_USER = env('DB_USERNAME');
$_MYSQL_PASS = env('DB_PASSWORD');
$_MYSQL_DB = env('DB_DATABASE');

// slug settings
$ASSET_SLUG = env('ASSET_SLUG');  // sesuaiken dengan nama dir
$SINGLE_SLUG = env('SINGLE_SLUG');
$CATEGORY_SLUG = env('CATEGORY_SLUG');
$RESOLUTION_SLUG = env('RESOLUTION_SLUG');

$mysqli = new mysqli($_MYSQL_HOST, $_MYSQL_USER, $_MYSQL_PASS, $_MYSQL_DB);
/* check connection */
if ($mysqli->connect_errno) {
    printf("Connect failed: %s\n", $mysqli->connect_error);
    exit();
}

require_once(base_path() . '/resources/views/colors.inc.php');

$delta = 8;
$reduce_brightness = false;
$reduce_gradients = false;
$num_results = 3; // Jumlah warna yang diambil

// Jumlah image Sekali Submit
//$max = 1;
$max = mt_rand(1,11);

$i = 1;

$arrDir = array();
$handledir = @opendir(base_path() . '/uploads');

while($dir = readdir($handledir)){
	$arrDir[] = $dir;
}

closedir($handledir);
shuffle($arrDir);
foreach($arrDir as $dirname) {
	if($dirname != '.' && $dirname != '..'){
		echo "<h2>".$dirname.":</h2>";

				$arrFiles = '';
				$file = '';
				$filenya = '';
				$tfile = '';
				$arrFiles = array();
                
				if($handle = @opendir(base_path() . '/uploads/' . $dirname)){
					while($file = readdir($handle)){
						$arrFiles[] = $file;
					}
					closedir($handle);
					
					foreach($arrFiles as $filenya){  // loop through the files
						if($filenya!= '.gitignore' && $filenya != '.' && $filenya != '..' && $i <= $max){
							
							$tfile = str_replace('.jpg', '', $filenya);
							$tfile = str_replace('.jpeg', '', $tfile);
							$tfile = str_replace('_', ' ', $tfile);
							$tfile = str_replace('-', ' ', $tfile);
							$tfile = str_replace('1920x1080', '', $tfile);
							$tfile = str_replace('1920x1200', '', $tfile);
							$tfile = str_replace('800x600', '', $tfile);
							$tfile = str_replace('1600x1200', '', $tfile);
							$tfile = str_replace('1024x768', '', $tfile);
							$tfile = str_replace('1280x720', '', $tfile);
							$tfile = str_replace('1440x900', '', $tfile);
							$tfile = str_replace('1600x1200', '', $tfile);
							$tfile = str_replace('1920x1080', '', $tfile);
							$tfile = str_replace('1920x1440', '', $tfile);
							$tfile = str_replace('+', '', $tfile);
							$tfile = str_replace('www', '', $tfile);
							$tfile = str_replace('basketWallpapers.com', '', $tfile);
							$tfile = str_replace('BasketWallpapers', '', $tfile);
							$tfile = str_replace('.com', '', $tfile);
							$tfile = str_replace('fanpop', '', $tfile);
							$tfile = str_replace('.', ' ', $tfile);
							$tfile = str_replace('normal5.4', 'wallpaper', $tfile);
							$tfile = str_replace('normal', 'wallpaper', $tfile);
							$tfile = str_replace('wide', 'wallpaper', $tfile);
							$tfile = str_replace('2880x1800', 'wallpaper', $tfile);
							$tfile = str_replace('2560x1600', 'wallpaper', $tfile);
							$tfile = str_replace('2560x1440', 'wallpaper', $tfile);
							$tfile = str_replace('2560x1600', 'wallpaper', $tfile);
							$tfile = str_replace('2880x1800', 'wallpaper', $tfile);
							$tfile = str_replace('2560x1024', 'wallpaper', $tfile);
							$tfile = str_replace('wide', 'wallpaper', $tfile);
							$tfile = str_replace('HD', 'HD wallpaper', $tfile);
							/*
							$tfile = str_replace('0', '', $tfile);
							$tfile = str_replace('1', '', $tfile);
							$tfile = str_replace('2', '', $tfile);
							$tfile = str_replace('3', '', $tfile);
							$tfile = str_replace('4', '', $tfile);
							$tfile = str_replace('5', '', $tfile);
							$tfile = str_replace('6', '', $tfile);
							$tfile = str_replace('7', '', $tfile);
							$tfile = str_replace('8', '', $tfile);
							$tfile = str_replace('9', '', $tfile);
							$tfile = str_replace('1920-x-1200','', $tfile);
							*/

							$tfile = str_replace(' x','', $tfile);
							//$tfile = str_replace('digital art','', $tfile);
							
							$walltitle = addslashes(trim($tfile));
              				$walltags = str_replace(' ',",", $tfile);
							$walldate = date("Y-m-d");
							$walldatenow = date("Y-m-d H:i:s");
							$wallslug = strtolower(str_replace(' ', "-", $walltitle));
							$wallslug = preg_replace('|[^a-z0-9-]|i', "", $wallslug);
							$wallslug = str_replace('--', "-", $wallslug);
                            
							$cek = mysqli_num_rows($mysqli->query(" SELECT id FROM wallpaper WHERE wallslug = '".$wallslug."' "));
							
							if($cek < 1){  // jika tidak ada nama file yang sama
								
								preg_match("/(\.\w{1,5})$/i", $filenya, $extfile);
								// jika nama file mengandung lebih dari satu .
								// skip and continue loop
								if (count($extfile) <= 1) {
								   continue;
								}
								$newimg = $wallslug.strtolower($extfile[0]);
								$newlarge = "large-".$newimg;
								$newthb = "thumb-".$newimg;
								$newsmall = "small-".$newimg;
								
								$dir = public_path().$ASSET_SLUG.date('Y').'/'.date('m').'/'.date('d');
								if(file_exists($dir)){
									//echo 'N';
								}else {
									mkdir($dir,0775,true);
									//echo 'Y';
								}
								// moving the file
								rename(base_path() . "/uploads/".$dirname."/".$filenya, public_path().$ASSET_SLUG.date('Y').'/'.date('m').'/'.date('d').'/'.$newimg);
								
								if(file_exists(public_path().$ASSET_SLUG.date('Y').'/'.date('m').'/'.date('d').'/'.$newimg)){
									exec("convert ".public_path().$ASSET_SLUG.date('Y').'/'.date('m').'/'.date('d').'/'.$newimg." -resize 1170 -quality 100% ".public_path().$ASSET_SLUG.date('Y').'/'.date('m').'/'.date('d').'/'.$newlarge);
									exec("convert ".public_path().$ASSET_SLUG.date('Y').'/'.date('m').'/'.date('d').'/'.$newimg." -resize 600x380! -gravity Center -crop 600x380+0+0 -quality 100% ".public_path().$ASSET_SLUG.date('Y').'/'.date('m').'/'.date('d').'/'.$newthb);
									exec("convert ".public_path().$ASSET_SLUG.date('Y').'/'.date('m').'/'.date('d').'/'.$newimg." -resize 270x207! -gravity Center -crop 270x207+0+0 -quality 100% ".public_path().$ASSET_SLUG.date('Y').'/'.date('m').'/'.date('d').'/'.$newsmall);
									
									if(file_exists(public_path().$ASSET_SLUG.date('Y').'/'.date('m').'/'.date('d').'/'.$newthb)){
										
										$getres = getimagesize(public_path().$ASSET_SLUG.date('Y').'/'.date('m').'/'.date('d').'/'.$newimg);
										$wallresolution = $getres[0]."x".$getres[1];
										$flcalc =  $getres[0] / $getres[1];
										$flres = round($flcalc, 1);
										
										if($flres == 1.3){
											$iswide = 1;
										}else{
											$iswide = 2;
										}
										
										$colors = '';
										$ex = '';
                                        $wallcolors = '';
										
										// Ambil Warna
										$ex = new GetMostCommonColors();
										$colors = $ex->Get_Color(public_path().$ASSET_SLUG.date('Y').'/'.date('m').'/'.date('d').'/'.$newimg, $num_results, $reduce_brightness, $reduce_gradients, $delta);
										foreach($colors as $hex => $count){
											if($count > 0 && $count <= $num_results){
												$wallcolors .= $hex." ";
											}
										}
										
										$wallfilesize = filesize(public_path().$ASSET_SLUG.date('Y').'/'.date('m').'/'.date('d').'/'.$newimg);
										

                                        // adding date to slug for easier db access
                                        $walldir = str_replace('-', '/', $walldate);
                                        // $wallpath = '/' . $dateslug . '/' . $newimg;
										
										$addwall = $mysqli->query("INSERT INTO wallpaper ( 
														`cat`, 
														`walltitle`, 										
														`wallslug`, 
														`walldir`,
														`wallresolution`, 
														`wallfilesize`, 
														`wallimg`, 
														`walldate`, 
														`walltags`, 
														`wallcolors`,
														`walllastview`,
														`walllastdownload`

													) VALUES ( 
														'". $dirname ."', 
														'". ucwords($walltitle) ."', 
														'". $wallslug ."', 
														'". $walldir ."',
														'". $wallresolution ."', 
														'". $wallfilesize ."', 
														'". $newimg ."', 
														'". $walldatenow ."', 
														'". $walltags ."', 
														'". $wallcolors ."', 
														'". $walldate ."',
														'". $walldate ."'
													) ");
										
										@unlink(public_path() . "/uploads/".$dirname."/".$filenya);
										
										echo "<div>". ucwords($tfile) ."</div>";
										echo "<div>". $newimg ."</div>";
										echo "<div>Category: ". $dirname ."</div>";
										// echo '<div><img src="'.public_path().$ASSET_SLUG.date('Y').'/'.date('m').'/'.date('d').'/'.$newsmall.'"></div>';
                                        // $nama = "sopier";
                                        $path_to_img = date('Y') . '/' . date('m').'/'.date('d').'/'.$newsmall;
                                        ?>
                                        <div><img src="{{ url(env('ASSET_SLUG') . $path_to_img) }}"></div>
                                        <?php
										echo "<div>&nbsp;</div>";
										
										$i++;
									}
								}
							}

				}
				echo "<div>&nbsp;</div>";
			}
		}
	}
}

?>