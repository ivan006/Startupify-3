<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class report extends Model
{
  public static function show($GET) {
    $report_object = new report;

    // dd($array);
    $html = $report_object->show_html();
    return $html;
  }

  public function show_html() {

    $report_object = new report;

    $data_items = $report_object->show_array($_GET);

    if (!empty($data_items)) {
      reset($data_items);
      $data_items_0 = key($data_items);

      $GET = $_GET;
      array_pop($GET);

      $link = "";
      $separator = "?";
      $i = 1;
      foreach ($GET as $key => $value) {
        // echo $key."zzz";
        $link = $link.$separator.$i."=".$value;
        if ($key > 0) {
          $separator = "&";
        }
        $i = $i+1;
      }

      ob_start();
      ?>
      <h1 class="my-3">
        <?php echo $report_object->ends_with($data_items_0, "_report") ?>
      </h1>

      <hr>

      <div class="row">
        <div class="col-md-3">
          <!-- <table  class="rounded border border-secondary w-100" style="border-collapse: separate;"> -->
          <table  class="p-2 rounded w-100" style="border-collapse: separate;">
            <tr>
              <td class="p-2">
                <b>

                  <a href="/<?php echo $link ?>">Back</a>
                </b>
              </td>

            </tr>
          </table>

        </div>
      <?php
      foreach ($data_items[$data_items_0] as $data_item_key => $data_item_value) {
        // echo $data_item_key;
        // echo "<br>";
        if (is_array($data_item_value)) {
          if ($report_object->ends_with($data_item_key, "_report") == null) {
          } else {


            $GET = $_GET;

            $link = "";
            $separator = "?";
            $i = 1;
            foreach ($GET as $key => $value) {
              // echo $key."zzz";
              $link = $link.$separator.$i."=".$value;
              if ($key > 0) {
                $separator = "&";
              }
              $i = $i+1;
            }

            $link = $link.$separator.$i."=".$data_item_key;
            ?>

              <div class="col-md-3">
                <!-- <table  class="rounded border border-secondary w-100" style="border-collapse: separate;"> -->
                <table  class="p-2 rounded w-100" style="border-collapse: separate;">
                  <tr>
                    <td class="p-2 ">
                      <b>
                        <a href="/<?php echo $link ?>">
                          <?php echo $report_object->ends_with($data_item_key, "_report") ?>
                        </a>
                      </b>
                    </td>

                  </tr>
                </table>

              </div>
            <?php

          }

        }
      }
      ?>
      </div>
      <hr>

      <?php


      $title_html = ob_get_contents();
      ob_end_clean();

      $reportdata_html = "";

      $data_items_0_items = $data_items[$data_items_0];

      $reportdata_html =  $reportdata_html . $report_object->show_html_helper($data_items_0_items,1);


      ob_start();
      ?>

      <div class="row">

        <?php echo $reportdata_html; ?>
      </div>


      <?php
      $reportdata_html = ob_get_contents();
      ob_end_clean();

      $page_html = $title_html.$reportdata_html;
      return $page_html;

    }
  }

  public function show_html_helper($data_items, $LayerNumber){
    $report_object = new report;

    $LayerNumber = $LayerNumber+1;

    $data_items_field_type = array();
    $data_items_item_type = array();

    $result_part_2 = "";

    foreach ($data_items as $data_item_key => $data_item_value) {
      // echo $data_item_key;
      // echo "<br>";
      if (is_array($data_item_value)) {
        if ($report_object->ends_with($data_item_key, "_report") == null) {
          reset($data_item_value);
          $data_item_value_0 = key($data_item_value);


          $ItemWidth = "col-md-6";
          if (isset($data_item_value[$data_item_value_0])) {
            $data_item_value_0_value = $data_item_value[$data_item_value_0];
            // code...
            if (is_array($data_item_value_0_value)) {
              $ItemWidth = "col-md-12";
            }
          }



          ob_start();
          ?>
          <div class=" <?php echo $ItemWidth ?>">
            <h<?php echo $LayerNumber ?> class="" style="margin-top: <?php echo (1/$LayerNumber)*5*16 ?>px;">
              <?php echo $data_item_key; ?>
            </h<?php echo $LayerNumber ?>>
            <div class="row">

              <?php echo $report_object->show_html_helper($data_item_value,$LayerNumber) ?>

            </div>

          </div>

          <?php

          $result_part_2 = $result_part_2.ob_get_contents();

          ob_end_clean();
        }

      }
    }


    $result_part_1_loose_files = "";
    foreach ($data_items as $data_item_key => $data_item_value) {
      if (!is_array($data_item_value)){

        if ($LayerNumber < 1) {
          $FieldWidth = "col-md-6";
        } else {
          $FieldWidth = "col-md-12";
        }
        ob_start();
        ?>
        <div class="<?php echo $FieldWidth ?>">
          <!-- <table  class="rounded border border-secondary w-100" style="border-collapse: separate;"> -->
          <table  class="p-2 rounded w-100" style="border-collapse: separate;">

            <tr>
              <td class="p-2 w-50" style="vertical-align: text-top;">
                <b>
                  <?php echo $data_item_key; ?>
                </b>
              </td>
              <td class="p-2 w-50">
                <?php echo $data_item_value ?>
              </td>

            </tr>
          </table>

        </div>

        <?php
        $result_part_1_loose_files = $result_part_1_loose_files.ob_get_contents();

        ob_end_clean();

      }
    }



    ob_start();
    ?>
    <!-- <div class="Di_Fl Fl_Wr"> -->
      <?php echo $result_part_1_loose_files; ?>
    <!-- </div> -->
    <?php
    $result_part_1_loose_files = ob_get_contents();
    ob_end_clean();



    ob_start();
    ?>
    <!-- <div class="Di_Fl Fl_Wr"> -->
      <?php echo $result_part_2; ?>
    <!-- </div> -->
    <?php
    $result_part_2 = ob_get_contents();
    ob_end_clean();



    $result = $result_part_1_loose_files.$result_part_2;
    return $result;
  }

  // public static function show($ShowID) {
  public static function show_array($GET) {

    if(!function_exists('App\ShowHelper')){
      function ShowHelper($ShowLocation) {
        $report_object = new report;
        $result = array();
        $shallowList = scandir($ShowLocation);


        foreach ($shallowList as $key => $value) {

          if (!in_array($value,array(".","..")))  {
            $DataLocation = $ShowLocation . "/" . $value;

            if (is_dir($DataLocation)){
              // $result[$value] = ShowHelper($DataLocation);
              if ($report_object->ends_with($value, "_report") == null) {
                $result[$value] = ShowHelper($DataLocation);
              } else {
                $result[$value] = array();
              }
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
    $URI = "";
    if (!empty($GET)) {
      foreach ($GET as $key => $value) {
        $URI = $URI."/".$value;
      }
    }

    $pub_store = storage_path()."/app/public/";
    $base_report = scandir($pub_store);
    if (isset($base_report[2])) {
      $base_report = $base_report[2];
    } else {
      $base_report = "fake_dir_name";
    }
    // var_dump($base_report);

    $ShowLocation = $pub_store.$base_report.$URI."/";


    if (is_dir($ShowLocation)) {

      $Show =   array(basename($ShowLocation) => ShowHelper($ShowLocation));

      return $Show;
    }
  }


  public function read_file($DataLocation) {

    // $result = file_get_contents($DataLocation);

    if (file_exists($DataLocation)){
      if (mime_content_type($DataLocation) == "image/jpeg") {
        $result = "";
        // $result = $DataLocation;
        // $type = pathinfo($result, PATHINFO_EXTENSION);
        // $result = file_get_contents($result);
        // $result = 'data:image/' . $type . ';base64,' . base64_encode($result);


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

  public function ends_with($string, $test) {
      $strlen = strlen($string);
      $testlen = strlen($test);
      if ($testlen > $strlen ) {
        return null;
      } elseif (substr_compare($string, $test, $strlen - $testlen, $testlen) === 0) {
        $result = str_replace($test, "",$string);
        return $result;
      }
  }



}
