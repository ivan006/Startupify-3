<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class report extends Model
{
  // public static function show($ShowID) {
  public static function show() {

    if(!function_exists('App\ShowHelper')){
      function ShowHelper($ShowLocation) {
        $result = array();
        $shallowList = scandir($ShowLocation);


        foreach ($shallowList as $key => $value) {

          if (!in_array($value,array(".","..")))  {
            $DataLocation = $ShowLocation . "/" . $value;

            if (is_dir($DataLocation)){
              
              $result[$value] = ShowHelper($DataLocation);
            } else {
              $this_object = new report;
              $result[$value] = $this_object->read_file($DataLocation);
            }
          }
        }
        return  $result;
      }
    }


    // $ShowLocation = PostM::ShowLocation($ShowID);
    // $ShowLocation = base_path()."/storage/app/public/";
    $ShowLocation = storage_path()."\app\\";


    if (is_dir($ShowLocation)) {

      $Show =   ShowHelper($ShowLocation);

      return $Show;
    }
  }


  public function read_file($DataLocation) {

    // $result = file_get_contents($DataLocation);

    if (file_exists($DataLocation)){
      if (mime_content_type($DataLocation) == "image/jpeg") {
        $type = pathinfo($DataLocation, PATHINFO_EXTENSION);
        $data = file_get_contents($DataLocation);
        $base64 = 'data:image/' . $type . ';base64,' . base64_encode($data);

        $result = $base64;
      } elseif (mime_content_type($DataLocation) == "text/plain" OR mime_content_type($DataLocation) == "text/html") {

        $result = file_get_contents($DataLocation);
      } else {
        $result = "error dont support this: ".mime_content_type($DataLocation);
      }
      return $result;
    } else {
      $result = "error";

      return $result;
    }

  }


}
