   <html>
   <head>
   </head>
   <body>
   Procesando...
    <!-- Use latest PDF.js build from Github -->
    <script src="{{Request::root()}}/js/jquery.js"></script>
    <script src="http://mozilla.github.io/pdf.js/build/pdf.js"></script>
        
    <script>
    /*$.get("{{Request::root()}}/local/actualizar_paginas/9/2", function()
      {
        
      });*/
      var url = '{{$ruta_libro}}';
      PDFJS.disableWorker = true;

      var pdfDoc = null;

      PDFJS.getDocument(url).then(function (pdfDoc_) {
        pdfDoc = pdfDoc_;
        var totalPage = pdfDoc.numPages;

       $.get( "{{$ruta_controlador}}/"+totalPage, function(data) {

        if ({{$redireccion}} == '1')
          window.location.replace("{{Request::root()}}/admin/libros");
        else
          return data;
      });
    });
    </script>


</body>
</html>