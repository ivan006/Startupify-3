<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class report extends Model
{
  public static function show($ShowID) {

    if(!function_exists('App\ShowHelper')){
      function ShowHelper($ShowLocation) {
        $result = array();
        $shallowList = scandir($ShowLocation);
        // dd($shallowList);
        // echo $ShowLocation."<br>";
        // if ($ShowLocation == "/home/vagrant/code-b/storage/app/public/aaas/smart") {
        //   // code...
        //   dd($shallowList);
        // }

        foreach ($shallowList as $key => $value) {

          if (!in_array($value,array(".","..")))  {
            $DataLocation = $ShowLocation . "/" . $value;

            $Attribute_types = array(
              '1' => 'SmartDataType',
              '2' => 'SmartDataContent'
            );
            if (is_dir($DataLocation)){
              $result[$value] = ShowHelper($DataLocation);
              $result[$value][$Attribute_types['1']] = 'dir';
            } else {
              $result[$value] = SmartDataItemM::Show($DataLocation);
            }
          }
        }
        return  $result;
      }
    }

    // $ShowLocation = PostM::ShowLocation($ShowID)."/".$ShowDataID;
    $ShowLocation = PostM::ShowLocation($ShowID);
    // dd($ShowLocation);
    if (is_dir($ShowLocation)) {
      // $Show[$ShowDataID] =   ShowHelper($ShowLocation);
      $Show =   ShowHelper($ShowLocation);
      // dd($Show);
      return $Show;
    }
  }

}
