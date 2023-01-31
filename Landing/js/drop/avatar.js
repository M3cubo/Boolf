// Required for drag and drop file access
jQuery.event.props.push('dataTransfer');

// IIFE to prevent globals
(function() {

  var s;
  var Avatar = {

    settings: {
      bod: $(".drag_and_drop"),
      img: $("#profile-avatar"),
      fileInput: $("#uploader")
    },

    init: function() {
      s = Avatar.settings;
      Avatar.bindUIActions();
    },

    bindUIActions: function() {

      var timer;

      s.bod.on("dragover", function(event) {
        clearTimeout(timer);
        if (event.currentTarget == s.bod[0]) {
          Avatar.showDroppableArea();
        }

        // Required for drop to work
        return false;
      });

      s.bod.on('dragleave', function(event) {
        if (event.currentTarget == s.bod[0]) {
          // Flicker protection
          timer = setTimeout(function() {
            Avatar.hideDroppableArea();
          }, 200);
        }
      });

      s.bod.on('drop', function(event) {
        // Or else the browser will open the file
        event.preventDefault();

        Avatar.handleDrop(event.dataTransfer.files);
      });

      s.fileInput.on('change', function(event) {
        Avatar.handleDrop(event.target.files);
      });
    },

    showDroppableArea: function() {
      s.bod.addClass("droppable");
    },

    hideDroppableArea: function() {
      s.bod.removeClass("droppable");
    },

    handleDrop: function(files) {

      Avatar.hideDroppableArea();

      // Multiple files can be dropped. Lets only deal with the "first" one.
      var file = files[0];
      fileGlobal = file; //Global variable

      if (typeof file !== 'undefined' && file.type.match('image.*')) {

        Avatar.resizeImage(file, 256, function(data) {
          Avatar.placeImage(data);
        });
        activeButton();

      //}else if (typeof file !== 'undefined' && file.type.match('.pdf')) {
      //}else if (typeof file !== 'undefined' && file.type === 'application/pdf') {
      }else if (typeof file !== 'undefined' && file.name.match('\.pdf')) {

        //var reader = new FileReader;
        //reader.readAsDataURL(file);
        $(".span_box").html('<i class="fa fa-check i_right i_color_correct"></i>El archivo PDF se ha subido correctamente.');
        activeButton();

      } else {

        $(".span_box").html('<i class="fa fa-close i_right i_color_error"></i>El tipo de archivo debe ser un PDF.');

      }

    },

    resizeImage: function(file, size, callback) {

      var fileTracker = new FileReader;
      fileTracker.onload = function() {
        Resample(
         this.result,
         size,
         size,
         callback
       );
      }
      fileTracker.readAsDataURL(file);

      fileTracker.onabort = function() {
        console.log("The upload was aborted.");
      }
      fileTracker.onerror = function() {
        console.log("An error occured while reading the file.");
      }

    },

    placeImage: function(data) {
      s.img.attr("src", data);
    }

  }

  Avatar.init();

})();
