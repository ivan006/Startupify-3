<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>


        <!-- <link rel="stylesheet" href="{{ URL::asset('css/app.css') }}" />
        <script type="text/javascript" src="{{ URL::asset('js/app.js') }}"></script>
        <script type="text/javascript" src="{{ URL::asset('vendor/laravel-filemanager/js/stand-alone-button.js') }}"></script> -->

        <!-- <link rel="stylesheet" href="{{ URL::asset('css/app.css') }}" />
        <script type="text/javascript" src="{{ URL::asset('js/app.js') }}"></script>


        <meta name="csrf-token" content="{{ csrf_token() }}">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
        <link rel="stylesheet" href="{{ asset('vendor/file-manager/css/file-manager.css') }}">
        <script src="{{ asset('vendor/file-manager/js/file-manager.js') }}"></script> -->

        <!-- <script src="//cdn.tinymce.com/4/tinymce.min.js" charset="utf-8"></script> -->

    </head>
    <body>
      <!-- <div class="input-group">
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
      </script> -->


      <!-- <div style="height: 600px;">
        <div id="fm"></div>
      </div> -->

      <!-- <textarea name="name" rows="8" cols="80" id="my-textarea"></textarea>
      <script type="text/javascript">
      tinymce.init({
        selector: '#my-textarea',
        // ...
        file_browser_callback: function(field_name, url, type, win) {
          tinyMCE.activeEditor.windowManager.open({
            file: '/file-manager/tinymce',
            title: 'Laravel File Manager',
            width: window.innerWidth * 0.8,
            height: window.innerHeight * 0.8,
            resizable: 'yes',
            close_previous: 'no',
          }, {
            setUrl: function(url) {
              win.document.getElementById(field_name).value = url;
            },
          });
        },
      });
      </script> -->


      <div class="input-group">
        <input type="text" id="image_label" class="form-control" name="image"
        aria-label="Image" aria-describedby="button-image">
        <div class="input-group-append">
          <button class="btn btn-outline-secondary" type="button" id="button-image">Select</button>
        </div>
      </div>

      <script type="text/javascript">
      document.addEventListener("DOMContentLoaded", function() {

        document.getElementById('button-image').addEventListener('click', (event) => {
          event.preventDefault();

          window.open('/file-manager/fm-button', 'fm', 'width=1400,height=800');
        });
      });

      // set file link
      function fmSetLink($url) {
        document.getElementById('image_label').value = $url;
      }
      </script>




    </body>
</html>
