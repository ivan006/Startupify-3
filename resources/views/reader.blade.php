<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <title>Laravel</title>

  <!-- Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

  <!-- Styles -->

  <!-- CSRF Token -->
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
  <link rel="stylesheet" href="{{ asset('vendor/file-manager/css/file-manager.css') }}">

  <style media="screen">
  .BgCo_Grey {background-color: rgb(200,200,200);}
  .BgCo_White {background-color: white;}
  .Wi_700 {width: 700px;}
  .MarLe_Auto {margin-left: auto;}
  .MarRi_Auto {margin-right: auto;}
  .Pa_10px {padding: 10px;}
  .BoRa_10px {border-radius: 5px;}
  .Bo_1pxsolidgrey {border:1px solid grey;}
  .Wi_25Per {width: 25%;}
  .Wi_50Per {width: 50%;}
  .Di_InBl {display:inline-block;}
  .Di_Fl {display: flex;}
  .Wi_100Per {width: 100%;}
  .BoSi_BoBo {box-sizing: border-box;}
  .Fl_Wr {flex-wrap: wrap;}
  </style>


</head>
<body>


  <div class="Wi_700 BgCo_White MarLe_Auto MarRi_Auto Pa_10px BoRa_10px">
    <div class="">

      <?php echo $result ?>
    </div>

  </div>

</body>
</html>
