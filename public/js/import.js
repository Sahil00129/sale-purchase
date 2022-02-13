$(document).ready(function (e) {
    $('#new_item_master').submit(function(e) {
        //alert('hii');return false;
       e.preventDefault();
       var formData = new FormData(this);
       var myfile = jQuery('#myCsv').val();
       var itype = jQuery('#itype').val();
       if (!itype) {
       swal("Error!", "Please select import type", "error");
       return false;
    }
    if (!myfile) {
      swal("Error!", "No file, please upload an import file", "error");
      return false;
    }
              //alert (this);
              $.ajax({
                    url: "/import", 
                    headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                    type: 'POST',  
                    data:new FormData(this),
                    processData: false,
                    contentType: false,
                    beforeSend: function(){
                      $(".indicator-progress").show(); 
                      $(".indicator-label").hide();
                         
                       },
                      success: (data) => {
                        $(".indicator-progress").hide();
                        $(".indicator-label").show();
                       
                        $('#new_sender_import').trigger('reset');
                      //this.reset();
                      //console.log(data.ignoredItems);
                      //console.log(data.ignoredcount);
                      if(data.success === true) { 
                        
                         
                          swal("Success!", "File has been imported successfully", "success");
                        }
                      
                      else{
                      swal("Error", data.messages, "error");
                      }
                      
                      }
              });
          });
          ///////////////////////////////////////////////////////////////////
          $.ajaxSetup({
            headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
            });
          $('#igroup').on('change', function() {
            $('#ipacking').empty(); 
           var selected = this.value; 
           var fd = new FormData();
           fd.append('group', selected);
            $.ajax({
              type:'POST',
              url: "/filter-items", 
              data: fd,
              cache:false, 
              contentType: false,
              processData: false,
              success: (data) => {
              console.log(data);
              if(data.success === true) {
                //alert(data.messages);
               var sObj = data.messages;
               $.each(data.messages, function (index, value) {
                // APPEND OR INSERT DATA TO SELECT ELEMENT.
                
                $('#ipacking').append('<option value="' + value.pack + '">' + value.pack + '</option>');
                });
              }
              else{
              swal("error!", data.messages, "error");
              }
            }
          });
          });
        });