<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Video</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">

        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Raleway', sans-serif;
                font-weight: 100;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                /*align-items: center;*/
                display: flex;
                justify-content: center;
            }

            .text-center {
                text-align: center;
            }

            .title {
                font-size: 84px;
            }

            .m-b-md {
                margin-bottom: 30px;
            }
        </style>
    </head>
    <body>
        <div class="flex-center full-height">
            <div class="text-center">
                <div class="title m-b-md">
                    Video
                </div>
                {{-- snapshot --}}
                <img src="images/cam.jpeg" alt="">
                {{-- canvas --}}
                <canvas id="videoCanvas"></canvas>
            </div>
        </div>
        <script>
          var canvas, context;

          init();
          function init() {
              canvas = document.getElementById('videoCanvas');
              canvas.width = window.innerWidth;
              canvas.height = window.innerHeight;
              context = canvas.getContext('2d');
              animate();
          }

          function animate() {
              if (context) {
                  var piImage = new Image();
                  piImage.onload = function() {
                      console.log('Drawing image');
                      context.drawImage(piImage, 0, 0, canvas.width, canvas.height);
                  }
                  piImage.src = "{{ url('images/cam.jpeg') }}" + "?time=" + new Date().getTime();
                  // piImage.src = "http://raspberrypi.local/html/cam_pic.php?time=" + new Date().getTime();
              }
              requestAnimationFrame(animate);
          }
        </script>
    </body>
</html>
