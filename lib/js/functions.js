$(function() {

  var em = /^\w+@[a-zA-Z_]+?\.[a-zA-Z]{2,3}$/;
  var numb = /^\d+$/; // /^[0-9]+$/;
  var file = /(\.jpg|\.jpeg|\.png)$/i;
  var alphabeth = /^[A-Za-z ]+$/;

  // hide info alert
  $('.info-alert').delay(12000).fadeOut(500);

  $(".navbar-expand-toggle").click(function() {
    $(".app-container").toggleClass("expanded");
    $(".navbar-expand-toggle").toggleClass("fa-rotate-90");
  });
  $(".navbar-right-expand-toggle").click(function() {
    $(".navbar-right").toggleClass("expanded");
    $(".navbar-right-expand-toggle").toggleClass("fa-rotate-90");
  });

  // $('select2').select2();
  // $('.match-height').matchHeight();

  // $('.toggle-checkbox').bootstrapSwitch({
  //   size: "small"
  // });

  // filter print
  $('.print-filter-by-date').hide();
  $(".btn-print-filter").on('click', function() {
    $(".print-filter-by-date").show();
  });
  $('.btn-cancel-filter').on('click', function() {
    $('.print-filter-by-date').hide();
  });

  $(".side-menu .nav .dropdown").on('show.bs.collapse', function() {
    $(".side-menu .nav .dropdown .collapse").collapse('hide');
  });

 // Sidebar Menu active class
  // var url = window.location;
  // // $('.side-menu-container a[href="' + url + '"]').parent('li').addClass('active');
  // $('.side-menu-container a').filter(function () {
  //   return this.href == url;
  // }).parent('li').addClass('active');
  // if ($("li .active").length > 0) {
  //   $('#dropdown-table').addClass('in');
  // }
  /**  end: Menu active class **/


  // add child karyawan
  $('#add-child2').on('click', function() {
    $('.data_nama_anak2').show();
    $(this).hide();
  });
  $('#add-child3').on('click', function() {
    $('.data_nama_anak3').show();
    $(this).hide();
  });
  $('#add-child4').on('click', function() {
    $('.data_nama_anak4').show();
    $(this).hide();
  });
  $('#add-child5').on('click', function() {
    $('.data_nama_anak5').show();
    $(this).hide();
  });

  $('.mybtn-print-filter').on('click', function() {
    var first_date = $('.first_date').val();
    var last_date = $('.last_date').val();
    if (first_date == '') {
      alert('Masukan tanggal 1');
      $('.first_date').css('border','1px solid #f00').focus();
      return false;
    }
    else if (last_date == '') {
      alert('Masukan tanggal 2');
      $('.last_date').css('border','1px solid #f00').focus();
      return false;
    }
  });

  $('.first_date').bind('change keydown keyup', function() {
   $('.first_date').css('border','1px solid #ccc');
  });
  $('.last_date').bind('change keydown keyup', function() {
   $('.last_date').css('border','1px solid #ccc');
  });

  // tinymce
  tinymce.init({
    selector: '.my-editor',
    height: 150,
    plugins: 'table',
    style_formats: [
      { title: 'Bold text', inline: 'strong' },
      { title: 'Red text', inline: 'span', styles: { color: '#ff0000' } },
      { title: 'Red header', block: 'h1', styles: { color: '#ff0000' } },
      { title: 'Badge', inline: 'span', styles: { display: 'inline-block', border: '1px solid #2276d2', 'border-radius': '5px', padding: '2px 5px', margin: '0 2px', color: '#2276d2' } },
      { title: 'Table row 1', selector: 'tr', classes: 'tablerow1' }
    ],
    formats: {
      alignleft: { selector: 'p,h1,h2,h3,h4,h5,h6,td,th,div,ul,ol,li,table,img', classes: 'left' },
      aligncenter: { selector: 'p,h1,h2,h3,h4,h5,h6,td,th,div,ul,ol,li,table,img', classes: 'center' },
      alignright: { selector: 'p,h1,h2,h3,h4,h5,h6,td,th,div,ul,ol,li,table,img', classes: 'right' },
      alignfull: { selector: 'p,h1,h2,h3,h4,h5,h6,td,th,div,ul,ol,li,table,img', classes: 'full' },
      bold: { inline: 'span', 'classes': 'bold' },
      italic: { inline: 'span', 'classes': 'italic' },
      underline: { inline: 'span', 'classes': 'underline', exact: true },
      strikethrough: { inline: 'del' },
      customformat: { inline: 'span', styles: { color: '#00ff00', fontSize: '20px' }, attributes: { title: 'My custom format' }, classes: 'example1' },
    },
    content_css: [
      '//fast.fonts.net/cssapi/e6dc9b99-64fe-4292-ad98-6974f93cd2a2.css',
      '//www.tinymce.com/css/codepen.min.css'
    ]
  });

   /*
  * -----------------
  * Remove image tk/kb
  * -----------------
  */
  $('.upload-new1-tk').hide();
  $('.upload-new2-tk').hide();

  // Delete photo 1 siswa tk/kb
  $(document).on('click', '.remove-img1-tk', function() {
    var the_id = this.id;

    swal({   
      title: "Confirmation",   
      text: "Anda yakin akan menghapus foto ini ?",   
      type: "info",   
      showCancelButton: true,   
      closeOnConfirm: false,   
      showLoaderOnConfirm: true, 
    }, function() {  
      $.ajax({
        type: "POST",
        url: "action-delete.php",
        data: {the_id_photo1_tk: the_id},

        success: function() {
          setTimeout(function() {     
            swal({   
              title: "Delete Successfully", 
              imageUrl: "img/assets/thumbs-up.jpg",  
              text: "Foto berhasil dihapus.",
              animation: "slide-from-top", 
              timer: 2000,   
              showConfirmButton: false 
            });  
            $('.display-img1-tk').hide();
            $('.upload-new1-tk').fadeIn();
          }, 1000); 
        } // end: success ajax
      }); // end: ajax 
    }); // end: swall confirm 
    return false;
  });

  // Delete photo 2 siswa tk/kb
  $(document).on('click', '.remove-img2-tk', function() {
    var the_id = this.id;

    swal({   
      title: "Confirmation",   
      text: "Anda yakin akan menghapus foto ini ?",   
      type: "info",   
      showCancelButton: true,   
      closeOnConfirm: false,   
      showLoaderOnConfirm: true, 
    }, function() {  
      $.ajax({
        type: "POST",
        url: "action-delete.php",
        data: {the_id_photo2_tk: the_id},

        success: function() {
          setTimeout(function() {     
            swal({   
              title: "Delete Successfully", 
              imageUrl: "img/assets/thumbs-up.jpg",  
              text: "Foto berhasil dihapus.",
              animation: "slide-from-top",   
              timer: 2000,   
              showConfirmButton: false 
            });  
            $('.display-img2-tk').hide();
            $('.upload-new2-tk').fadeIn();
          }, 1000); 
        } // end: success ajax
      }); // end: ajax 
    }); // end: swall confirm 
    return false;
  });

  /*
  * -----------------
  * Remove image sd
  * -----------------
  */
  $('.upload-new1-sd').hide();
  $('.upload-new2-sd').hide();

  // Delete photo 1 siswa sd
  $(document).on('click', '.remove-img1-sd', function() {
    var the_id = this.id;

    swal({   
      title: "Confirmation",   
      text: "Anda yakin akan menghapus foto ini ?",   
      type: "info",   
      showCancelButton: true,   
      closeOnConfirm: false,   
      showLoaderOnConfirm: true, 
    }, function() {  
      $.ajax({
        type: "POST",
        url: "action-delete.php",
        data: {the_id_photo1_sd: the_id},

        success: function() {
          setTimeout(function() {     
            swal({   
              title: "Delete Successfully", 
              imageUrl: "img/assets/thumbs-up.jpg",  
              text: "Foto berhasil dihapus.",
              animation: "slide-from-top",   
              timer: 2000,   
              showConfirmButton: false 
            });  
            $('.display-img1-sd').hide();
            $('.upload-new1-sd').fadeIn();
          }, 1000); 
        } // end: success ajax
      }); // end: ajax 
    }); // end: swall confirm 

    // if (confirm("Are you sure you want to delete this ?")) {
    //     $.ajax({
    //         type: "POST",
    //         url: "action-delete.php",
    //         data: {the_id_photo1_sd: the_id},
    //         // success: function() {
    //         // }
    //     });
    //     $(this).parents(".display-img1-sd").animate({ opacity: "hide" }, "slow");
    // } else {
    //   $('.display-img1-sd').show();
    //   $('.upload-new1-sd').hide();
    // }
    return false;
  });

  // Delete photo 2 siswa sd
  $(document).on('click', '.remove-img2-sd', function() {
    var the_id = this.id;

    swal({   
      title: "Confirmation",   
      text: "Anda yakin akan menghapus foto ini ?",   
      type: "info",   
      showCancelButton: true,   
      closeOnConfirm: false,   
      showLoaderOnConfirm: true, 
    }, function() {  
      $.ajax({
        type: "POST",
        url: "action-delete.php",
        data: {the_id_photo2_sd: the_id},

        success: function() {
          setTimeout(function() {     
            swal({   
              title: "Delete Successfully", 
              imageUrl: "img/assets/thumbs-up.jpg",  
              text: "Foto berhasil dihapus.",
              animation: "slide-from-top",   
              timer: 2000,   
              showConfirmButton: false 
            });  
            $('.display-img2-sd').hide();
            $('.upload-new2-sd').fadeIn();
          }, 1000); 
        } // end: success ajax
      }); // end: ajax 
    }); // end: swall confirm 
    return false;
  });

  /*
  * -----------------
  * Remove image smp
  * -----------------
  */
  $('.upload-new1-smp').hide();
  $('.upload-new2-smp').hide();

  // Delete photo 1 siswa smp
  $(document).on('click', '.remove-img1-smp', function() {
    var the_id = this.id;

    swal({   
      title: "Confirmation",   
      text: "Anda yakin akan menghapus foto ini ?",   
      type: "info",   
      showCancelButton: true,   
      closeOnConfirm: false,   
      showLoaderOnConfirm: true, 
    }, function() {  
      $.ajax({
        type: "POST",
        url: "action-delete.php",
        data: {the_id_photo1_smp: the_id},

        success: function() {
          setTimeout(function() {     
            swal({   
              title: "Delete Successfully", 
              imageUrl: "img/assets/thumbs-up.jpg",  
              text: "Foto berhasil dihapus.",
              animation: "slide-from-top",   
              timer: 2000,   
              showConfirmButton: false 
            });  
            $('.display-img1-smp').hide();
            $('.upload-new1-smp').fadeIn();
          }, 1000); 
        } // end: success ajax
      }); // end: ajax 
    }); // end: swall confirm 
    return false;
  });

  // Delete photo 2 siswa smp
  $(document).on('click', '.remove-img2-smp', function() {
    var the_id = this.id;

    swal({   
      title: "Confirmation",   
      text: "Anda yakin akan menghapus foto ini ?",   
      type: "info",   
      showCancelButton: true,   
      closeOnConfirm: false,   
      showLoaderOnConfirm: true, 
    }, function() {  
      $.ajax({
        type: "POST",
        url: "action-delete.php",
        data: {the_id_photo2_smp: the_id},

        success: function() {
          setTimeout(function() {     
            swal({   
              title: "Delete Successfully", 
              imageUrl: "img/assets/thumbs-up.jpg",  
              text: "Foto berhasil dihapus.",
              animation: "slide-from-top",   
              timer: 2000,   
              showConfirmButton: false 
            });  
            $('.display-img2-smp').hide();
            $('.upload-new2-smp').fadeIn();
          }, 1000); 
        } // end: success ajax
      }); // end: ajax 
    }); // end: swall confirm 
    return false;
  });

  // ------------------

  // Datepicker
  $( ".datepicker" ).datepicker({
    dateFormat: "dd-mm-yy",
    changeYear: true
  });

  // Load functions
  $(window).load(function() {
      $('#preloader').delay(1000).fadeOut(500);  // Loader pages
  });


  // $(".finish-step-from-question-teacher").click(function() {
  //   var jawaban = $('.jawaban').val();
  //   if ( jawaban == '' ) {
  //     alert('Jawaban tidak boleh kosong !');
  //     return false;
  //   }
  // });

  // DataTable
  $('.datatable').DataTable({
    "dom": '<"top"fl<"clear">>rt<"bottom"ip<"clear">>',
    "order": [[ 0, "desc" ]]
  });
});
