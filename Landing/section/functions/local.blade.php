<html>
<head>
	
</head>
<body>
{{ HTML::style('css/styles.css') }}

<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>

<script type="text/javascript">

////////////////////////////////////////
     // http: //www.html5canvastutorials.com/tutorials/html5-canvas-wrap-text-tutorial/
     function wrapText(ctx, text, x, y, maxWidth, lineHeight) {
        var cars = text.split("\n");

        for (var ii = 0; ii < cars.length; ii++) {

            var line = "";
            var words = cars[ii].split(" ");

            for (var n = 0; n < words.length; n++) {
                var testLine = line + words[n] + " ";
                var metrics = ctx.measureText(testLine);
                var testWidth = metrics.width;

                if (testWidth > maxWidth) {
                    ctx.fillText(line, x, y);
                    line = words[n] + " ";
                    y += lineHeight;
                }
                else {
                    line = testLine;
                }
            }

            ctx.fillText(line, x, y);
            y += lineHeight;
        }
     }

     function DrawText() {
        
        canvas = document.getElementById("myCanvas");
        //image=document.getElementById("a");
        canvas.width = image.width;
        canvas.height = image.height;
        ctx=canvas.getContext("2d");
        ctx.drawImage(image, 0, 0);

             //var maxWidth = 400;
             var maxWidth = canvas.width -40;
             var lineHeight = 40;
             var x = 150; //Margen izquierda
                 
             var titulo = "{{$titulo}}";
             titulo = titulo.toUpperCase();
             if (titulo.length < 50)
              y = 150;
            else if (titulo.length < 75)
              y = 120
            else if (titulo.length < 100)
              y = 90;

             y = y-30;
             ctx.font = "26px 'Open Sans-Regular'";
             ctx.fillStyle = "#DCD5D5";
             ctx.textAlign="center";
             ctx.letterSpacing="-10px";
             wrapText(ctx, titulo, x, y, maxWidth, lineHeight);


             var autor = "{{$autor}}";
             autor = autor.toUpperCase();
             y= y+ 220;
             y = y+30;
             ctx.font = "italic 17px 'Open Sans-Regular'";
             ctx.fillStyle = "#FFF";
             ctx.textAlign="center"


         wrapText(ctx, autor, x, y, maxWidth, lineHeight);
         
     }

     function Jamon(){

             DrawText();
       dataURL = canvas.toDataURL("image/png");
       $.ajax({
        type: "POST",
        url: "{{Request::root()}}/imagen",
        data: { 
           imgBase64: dataURL
        }
      }).done(function(o) {
      });
     };
var image = new Image();
        image.onload = function() {
          Jamon();
        }
        image.src = "{{Request::root()}}/users_pdf/plantillas/darken.png";
</script>

<canvas id="myCanvas" height="500" width="500" style="display:block">

</canvas>
</body>
</html>
