<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class report extends Model
{
  public static function show($GET) {
    $report_object = new report;
    $array = $report_object->show_array($GET);
    $html = $report_object->show_html($array);
    return $html;
  }

  public function show_html($var) {
    $report_object = new report;

    $data_items = array(
      "Find Partner" => array(
        "Bradley Hunter" => array(),
        "Marie Bennett" => array(),
        "Diana Wells" => array(),
        "Christopher Pierce" => array(),
        "ReportData"=>array(
          "Contact"=> array(
            "Telephone"=> "(000) 000-0000",
            "Email"=> "dreamshare@email.com",
          ),
          "1"=> "Share your holiday dream",
          "2"=> "And find the perfect partner to fulfill it",
          "3"=> "Find your holiday partner",
          "Meet a partner for your best holiday"=> array(
            "Bradley Hunter" => array(
              "Overview"=>  "Based in Chicago, I love playing tennis and loud music.",
              "Photo.jpeg"=> "assets\partner1.jpg",
            ),
            "Marie Bennett" => array(
              "Overview"=> "Currently living in Colorado. Lover of art, language and travelling.",
              "Photo.jpeg"=> "assets\partner2.jpg",
            ),
            "Diana Wells" => array(
              "Overview"=> "Living in Athens, Greece. I love black and white classics, chillout music and green tea.",
              "Photo.jpeg"=> "assets\partner3.jpg",
            ),
            "Christopher Pierce" => array(
              "Overview"=> "Star Wars fanatic. I have a persistent enthusiasm to create new things.",
              "Photo.jpeg"=> "assets\partner4.jpg",
            ),
          ),
          "Discover holiday activity ideas" => array(
            "1" => array(
              "Overview"=> "Sports",
              "Photo.jpeg"=> "assets\block1Sports.jpg",
            ),
            "2" => array(
              "Overview"=> "Wellness and Health",
              "Photo.jpeg"=> "assets\block2Wellness.jpg",
            ),
            "3" => array(
              "Overview"=> "Expeditions",
              "Photo.jpeg"=> "assets\block3Expeditions.jpg",
            ),
            "4" => array(
              "Overview"=> "Games",
              "Photo.jpeg"=> "assets\block4Games.jpg",
            ),
          ),
        ),

      ),
    );
    // dd($var);
    // dd($data_items);

    $data_items = $var;


    if (!empty($data_items)) {
      reset($data_items);
      $data_items_0 = key($data_items);


      ob_start();
      ?>
      <h1>
        <?php echo $data_items_0; ?>
      </h1>
      <hr>
      <?php
      foreach ($data_items[$data_items_0] as $data_item_key => $data_item_value) {
        // echo $data_item_key;
        // echo "<br>";
        if (is_array($data_item_value)) {
          if ($report_object->ends_with($data_item_key, "_report") == null) {
          } else {
            ?>
            <table  class="Pa_10px BoRa_10px Bo_1pxsolidgrey Wi_25Per  ">
              <tr>
                <td>
                  <b>
                    <a href="/reader/?1=<?php echo $data_item_key ?>">
                      <?php echo $report_object->ends_with($data_item_key, "_report") ?>
                    </a>
                  </b>
                </td>

              </tr>
            </table>
            <?php

          }

        }
      }


      $title_html = ob_get_contents();
      ob_end_clean();

      $reportdata_html = "";
      $subreports_html = "";

      $data_items_0_items = $data_items[$data_items_0];

      $reportdata_html =  $reportdata_html . $report_object->show_html_helper($data_items_0_items,1);

      // foreach ($data_items_0_items as $data_items_0_items_key => $data_items_0_items_value) {
      //   if (is_array($data_items_0_items_value)){
      //
      //     // if ($data_items_0_items_key == "ReportData") {
      //     //
      //
      //     // } else {
      //     //   ob_start();
            ?>
            <!-- <table  class="Pa_10px BoRa_10px Bo_1pxsolidgrey Wi_25Per  ">
              <tr>
                <td>
                  <b>
                    <?php //echo $data_items_0_items_key; ?>
                  </b>
                </td>

              </tr>
            </table> -->

            <?php
      //       // $subreports_html = $subreports_html.ob_get_contents();
      //       // ob_end_clean();
      //     // }
      //   }
      // }



      ob_start();
      ?>

      <div class="Di_Fl Fl_Wr">

        <?php echo $subreports_html; ?>
      </div>
      <hr>

      <?php
      $subreports_html = ob_get_contents();
      ob_end_clean();

      $page_html = $title_html.$subreports_html.$reportdata_html;
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
          $data_item_value_0_value = $data_item_value[$data_item_value_0];
          if (is_array($data_item_value_0_value)) {
            $ItemWidth = "Wi_100Per";
          } else {
            $ItemWidth = "Wi_50Per";
          }



          ob_start();
          ?>
          <div class=" <?php echo $ItemWidth ?>">
            <h<?php echo $LayerNumber ?>>
              <?php echo $data_item_key; ?>
            </h<?php echo $LayerNumber ?>>
            <div class="Di_Fl Fl_Wr">

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
          $FieldWidth = "Wi_50Per";
        } else {
          $FieldWidth = "Wi_100Per";
        }
        ob_start();
        ?>
        <table  class="Pa_10px BoRa_10px Bo_1pxsolidgrey BoSi_CoBo  <?php echo $FieldWidth ?>">

          <tr>
            <td>
              <b>
                <?php echo $data_item_key; ?>
              </b>
            </td>
            <td>
              <?php echo $data_item_value ?>
            </td>

          </tr>
        </table>

        <?php
        $result_part_1_loose_files = $result_part_1_loose_files.ob_get_contents();

        ob_end_clean();

      }
    }



    ob_start();
    ?>
    <div class="Di_Fl Fl_Wr">
      <?php echo $result_part_1_loose_files; ?>
    </div>
    <?php
    $result_part_1_loose_files = ob_get_contents();
    ob_end_clean();



    ob_start();
    ?>
    <div class="Di_Fl Fl_Wr">
      <?php echo $result_part_2; ?>
    </div>
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
    $URI = "";
    if (!empty($GET)) {
      foreach ($GET as $key => $value) {
        $URI = $URI."\\".$value;
      }
    }

    $ShowLocation = storage_path()."\app\public\Blue Gem".$URI."\\";


    if (is_dir($ShowLocation)) {

      $Show =   array(basename($ShowLocation) => ShowHelper($ShowLocation));

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
