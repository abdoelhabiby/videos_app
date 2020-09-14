<?php





/*
   sidebar item is active and open
*/

function isActive($module){

    return request()->segment(2) !== null && request()->segment(2) == $module ? 'active open' : '';
}


/*
   order number of rows page pagination count
*/

function orderNumberOfRows() {
    $start = 0;
    $page = request()->page ? (int) request()->page : null;

    if ($page && $page > 0) {

        $start = ($page * PAGINATE_COUNT) - PAGINATE_COUNT;
    }

    return $start;
}


/*
  * get id form video yoytube url
*/

function getVideoId($url)
{
    $url = $url;
    parse_str(parse_url($url, PHP_URL_QUERY), $get_v);

    $id = null;

    if(isset($get_v['v'])){
        $id = $get_v['v'];
    }
    return $id;
}





function imageUpload($photo, $folder_save)
{

    $image = $photo->store("/", $folder_save);

    $path = "/images/" . $folder_save . "/" . $image;

    return $path;
}



function deleteFile($photo_to_delet)
{
    if (\Illuminate\Support\Facades\File::exists(public_path($photo_to_delet))) {

        \Illuminate\Support\Facades\File::delete(public_path($photo_to_delet));
    }
}
