<?php
$path = 'D:\xampp\htdocs\wp_test1\wp-content\plugins\my360view\black_chair';
$images = glob($path . "/*.jpg");

foreach($images as $image)
{
  echo $image;
}
// function listAllFiles($path)
// {
//     $array = array_diff(scandir($path), array('.', '..'));

//     foreach ($array as &$item) {
//         $item = $path . $item;
//     }
//     unset($item);
//     foreach ($array as $item) {
//         if (is_dir($item)) {
//             $array = array_merge($array, listAllFiles($item . DIRECTORY_SEPARATOR));
//         }
//     }
//     return $array;
// }
?>