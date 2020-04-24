<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>


        <link rel="stylesheet" href="{{ URL::asset('css/app.css') }}" />
        <script type="text/javascript" src="{{ URL::asset('js/app.js') }}"></script>
        <script type="text/javascript" src="{{ URL::asset('vendor/laravel-filemanager/js/stand-alone-button.js') }}"></script>
    </head>
    <body>
      <div class="input-group">
        <span class="input-group-btn">
          <a id="lfm" data-input="thumbnail" data-preview="holder" class="btn btn-primary">
            <i class="fa fa-picture-o"></i> Choose
          </a>
        </span>
        <input id="thumbnail" class="form-control" type="text" name="filepath">
      </div>
      <img id="holder" style="margin-top:15px;max-height:100px;">
      <script type="text/javascript">
         $('#lfm').filemanager('image');
      </script>




    </body>
</html>
