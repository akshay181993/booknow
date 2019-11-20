(function($){
  activateNotificationAndTasksScroll();
  var origin = window.location.origin;
  

    var url = window.location;
    $('.list a').filter(function() {
      $(".list").find(".active").removeClass("active");
        return this.href == url;
    }).parent().addClass('active');

     $('#aniimated-thumbnials').lightGallery({
        thumbnail: true,
        selector: 'a'
    });
  getBuildings(origin+"/booknow/");
  $('.input-daterange').datepicker({
      format: 'yyyy-mm-dd',
      todayHighlight:'TRUE',
      autoclose: true,
  });
  if($("#bookingdata >tbody >tr").length == 0){
    $("#exportbtn").css("pointer-events", "none");
  }
})(jQuery);


function GenerateRows(id,id1)
{
  $("#addrandomb").empty();
  var no_of_rows,no_of_floors;
  no_of_rows = $("#"+id).val();
  no_of_floors = $("#no_of_floors").val();
  if(no_of_rows == ""){
    $("#no_of_buildings_err").append("Please Enter Value");
  }else{
    $("#no_of_buildings_err").empty();
    $("#"+id1).removeAttr('style');    
    for(var i = 1; i <= no_of_rows ; i++){
      $("#addrandomb").append('<div class="col-sm-6 dynamicrow">'+
                                '<div class="input-group">'+
                                    '<div class="input-group-addon">'+
                                        '<i class="material-icons">location_city</i>'+
                                    '</div>'+
                                    '<div class="form-line">'+
                                        '<input type="text" class="form-control date" placeholder="Enter Building '+i+'" name="building_name[]" id="building_name'+i+'">'+
                                    '</div>'+
                                    '<span class="errors" id="building_name_err'+i+'"></span>'+
                                '</div>'+
                            '</div>');
    }
  }
}

function GenerateFlats()
{
  $("#addrandomb").empty();
  var no_of_rows,no_of_floors;
  no_of_rows = $("#no_of_flats").val();
  no_of_floors = $("#no_of_floors").val();
  if(no_of_rows == ""){
    $("#no_of_flats_err").append("Please Enter Flats to add");
    $("#no_of_floors_err").append("Please enter floors");
  }else{
     $("#no_of_flats_err").empty();
     $("#no_of_floors_err").empty();
    $("#buildingsrows").css('display','block');
    var no = 101;
    var no1 = 101;
    var inc = 1;
    var amviewselect,nonamviewselect;
    for (var i = 1; i <= no_of_floors; i++) {
      for(var j = 1; j <= no_of_rows; j++){
        if(j == 1 || j== 2){
          amviewselect = "Amenities";
        }else{
          amviewselect = "Hill View";
        }
        
        $("#addrandomb").append('<div class="col-sm-2 dynamicrow">'+
                                '<div class="input-group">'+
                                    '<span class="input-group-addon">'+
                                        '<i class="material-icons">location_city</i>'+
                                    '</span>'+
                                    '<div class="form-line">'+
                                        '<input type="text" class="form-control date" value="'+no+'" placeholder="Enter Flat No" name="flat_no[]" id="flat_no">'+
                                    '</div>'+
                                    '<span class="errors" id="flat_no_err'+inc+'"></span>'+
                                '</div>'+
                            '</div>'+
                            '<div class="col-sm-2">'+
                                    '<div class="input-group">'+
                                        '<span class="input-group-addon">'+
                                            '<i class="material-icons">home</i>'+
                                        '</span>'+
                                        '<div class="form-line">'+
                                            '<select class="form-control show-tick" name="flat_type[]" id="flat_type">'+
                                                '<option value="">-- Please Select Flat type --</option>'+
                                                '<option value="1 BHK">1 BHK</option>'+
                                                '<option value="2 BHK" selected="selected">2 BHK</option>'+
                                            '</select>'+
                                        '</div>'+
                                        '<span class="errors" id="flat_type_err'+inc+'"></span>'+
                                    '</div>'+
                                '</div>'+
                                '<div class="col-sm-2">'+
                                    '<div class="input-group">'+
                                      '<span class="input-group-addon">'+
                                          '<i class="material-icons">location_city</i>'+
                                      '</span>'+
                                      '<div class="form-line">'+
                                          '<input type="text" class="form-control date" value="'+i+'" placeholder="Enter Floor No" name="floor_number[]">'+
                                      '</div>'+
                                      '<span class="errors" id="floor_number'+inc+'"></span>'+
                                '</div>'+
                                '</div>'+
                                '<div class="col-sm-2">'+
                                    '<div class="input-group">'+
                                        '<span class="input-group-addon">'+
                                            '<i class="material-icons">home</i>'+
                                        '</span>'+
                                        '<div class="form-line">'+
                                            '<select class="form-control show-tick" name="view[]" id="view">'+
                                                '<option value="">-- Please Select View --</option>'+
                                                '<option value="'+amviewselect+'" selected="selected">'+amviewselect+' View</option>'+
                                                '<option value="Non Amenities">Non Amenities</option>'+
                                            '</select>'+
                                        '</div>'+
                                        '<span class="errors" id="view_err'+inc+'"></span>'+
                                    '</div>'+
                                '</div>'+
                                '<div class="col-sm-2">'+
                                '<div class="input-group">'+
                                    '<span class="input-group-addon">'+
                                        '<i class="material-icons">attach_money</i>'+
                                    '</span>'+
                                    '<div class="form-line">'+
                                        '<input type="text" class="form-control date" placeholder="Enter Cost" name="flat_cost[]" id="flat_cost" value="48.5 Lac All Incl">'+
                                    '</div>'+
                                    '<span class="errors" id="cost_err'+inc+'"></span>'+
                                '</div>'+
                            '</div>'+'<div class="col-sm-2">'+
                                '<div class="input-group">'+
                                    '<span class="input-group-addon">'+
                                        '<i class="material-icons">straighten</i>'+
                                    '</span>'+
                                    '<div class="form-line">'+
                                        '<input type="text" class="form-control date" placeholder="Enter Area" name="flat_area[]" id="flat_area" value="59.20 Sqmt">'+
                                    '</div>'+
                                    '<span class="errors" id="area_err'+inc+'"></span>'+
                                '</div>'+
                            '</div>');
        no = no+1;
       inc++;
      }
      no = no1+100;
      no1 = no1+100;
      inc-1;
    }
  }
}

// pagination
function pagination()
{
  var items = $(".list-wrapper .list-item");
    var numItems = items.length;
    // console.log(numItems);
    var perPage = 12;

    items.slice(perPage).hide();

    $('#pagination-container').pagination({
        items: numItems,
        itemsOnPage: perPage,
        prevText: "&laquo;",
        nextText: "&raquo;",
        onPageClick: function (pageNumber) {
            var showFrom = perPage * (pageNumber - 1);
            var showTo = showFrom + perPage;
            items.hide().slice(showFrom, showTo).show();
        }
    });
}

//Activate notification and task dropdown on top right menu
function activateNotificationAndTasksScroll() {
    $('.navbar-right .dropdown-menu .body .menu').slimscroll({
        height: '254px',
        color: 'rgba(0,0,0,0.5)',
        size: '4px',
        alwaysVisible: false,
        borderRadius: '0',
        railBorderRadius: '0'
    });
}

/*sweet alert success*/

function succesAlert(title,bodymsg, link=""){
    swal(title, bodymsg, "success");
                setTimeout(function(){
     swal.close();
                    setTimeout(function(){
    if(link!=""){
        location.href = link;
    }
                        }, 500);
                }, 3000);
}

/*sweet alert error*/

function errorAlert(title,bodymsg){
    swal(title, bodymsg, "error");
                        setTimeout(function(){
             swal.close();
                        }, 3000);
}

/*sweet alert for confirmation*/

function confirmationAlert(title,bodymsg){
   swal({
  title: "Are you sure?",
  text: "You will not be able to recover this record!",
  type: "warning",
  showCancelButton: true,
  confirmButtonColor: "#DD6B55",
  confirmButtonText: "Yes, Delete!",
  closeOnConfirm: false
},
function(){
  swal("Deleted!", "Your imaginary file has been deleted.", "success");
});
}

function toggle(input,id) {
    var x = document.getElementById(input);
    if (x.type === "password") {
        x.type = "text";
        $("#"+id).text('visibility_off');

    } else {
        x.type = "password";
        $("#"+id).text('visibility');
    }
}

function profile(url,id,redi,route)
{
  var ids;
    ids = $('#'+id+' input[name]').map(function() {
      return this.id;
    }).get();
    
	$.ajax({
	   url: url+route,
	   type: 'POST',
	   data: $("#"+id).serialize(),
	   dataType: 'JSON',
	   success: function(msg){
      // console.log(msg);
	   	     clearError();
           $("#confirm_password_err").empty();
			if(msg == 'success')
			{
				succesAlert("success","Data Updated Successfully",url+redi);				
			}else if(msg == 'notmatched'){
        $("#confirm_password_err").append('Old Password Not matched')
      }else{	         	
				ids.map(function(key,val){
          console.log(msg[key]);
            if(msg[key]){
                html = validationError(msg[key]);
                $("#"+id+" span[id^="+key+'_err'+"]" ).append(html);
            }
        });  
			 }
	    },
	   error:function(xhr, status, error){
	   	errorAlert("","Something Went Wrong")
	   }
	});
}

function SaveData(url,form_id,redi)
{
    var ids;
    ids = $('#'+form_id+' input[name]:not(input[type="hidden"]),#'+form_id+' select[name]').map(function() {
      return this.name;
    }).get();
    console.log(ids);
      $.ajax({
        dataType:'json',
        data:$("#"+form_id).serializeArray(),
        type:'post',
        url:url+"common-save/"+ids,
        success: function (data) {  
            /*remove error message*/
                clearError();
            /*end remove error message*/         
            if(data == "success")
            {
                succesAlert("success","Data Updated Successfully",url+redi);        
            }else{
                var html = "";
                ids.map(function(key,val){
                    if(data[key]){
                        html = validationError(data[key]);
                        $("#"+form_id+" span[id^='"+key+'_err'+"']").append(html);
                    }
                })  
            }
        },
        error:function(xhr, status, error){
        
        }
    });
}

/*clear error message*/
function clearError(){
    $(".errors").each(function(){
        $(this).empty();
    });
}

// Common delete for everything
function DeleteAll(url,id,name)
{
     var id = id;
     swal({
          title: "Are you sure?",
          text: "You will not be able to recover this record!",
          type: "warning",
          showCancelButton: true,
          confirmButtonColor: "#DD6B55",
          confirmButtonText: "Yes, Delete!",
          closeOnConfirm: false
      },
      function(){
         $.ajax({ 
            type: 'post',
            url: url+'all_delete',
            data:{
                    id:id,
                    name:name,                
                },
            success: function(data) {      
            var result = $.parseJSON(data);
                if(result == "success"){
                  $('#'+id).remove();
                    succesAlert("success","Data Deleted Successfully");
                    setTimeout(function() {
                      location.reload();
                  }, 2000);
                }
            }, 
            error: function(xhr, status, error) {
              errorAlert("","Something Went Wrong");
            }, 
        });
    });
}

// end here

function Status_update(url,id,name,model)
{
   var id = id;
   var name = name;
   var msg,btncolor;
   if(name == "active"){
     msg = "Active!";
     btncolor = "#4faa45";
   }else{
     msg = "InActive!";
     btncolor = "#DD6B55";
   }
   swal({
    title: "Are you sure?",
    text: "You want to "+msg,
    type: "warning",
    showCancelButton: true,
    confirmButtonColor: btncolor,
    confirmButtonText: "Yes,"+msg,
    closeOnConfirm: false
    },function(){
         $.ajax({ 
            type: 'post',
            url: url+'all_status',
            data:{
                    id:id,
                    name:name,
                    model:model
                },
            success: function(data) {
                var result = $.parseJSON(data);
                if(result == 'success'){
                    succesAlert("success","Status Updated Successfully");
                    setTimeout(function() {
                    location.reload();
                }, 2000);
              }
            }, 
            error: function(xhr, status, error) {
              errorAlert("","Something Went Wrong");
            }, 
        });
    });
 
}

function SaveBuildings(url,id,redi,route)
{
  $.ajax({
    url : url+route,
    type : 'POST',
    dataType : 'json',
    data : $("#"+id).serializeArray(),
    success : function(data){
      clearError();
      if(data == "success")
      {
        succesAlert("success","Data Saved Successfully",url+redi);
      }else{
        var html = "";        
        if(data.project_name){
          html = validationError(data.project_name);
          $("#project_name_err").append(html);
        }

        if(data.building_name.length > 0){
          var j = 1;
          for (var i = 0; i < data.building_name.length; i++) {
            html = validationError(data.building_name[i]);
            $("#building_name_err"+j).append(html);
            j++;
          } 
        }
      }
    },
    error : function(xhr,status,error){
      errorAlert("","Something Went Wrong");
    }
  });
}

function SaveflatsData(url,id,redi,route)
{
  $.ajax({
    url : url+route,
    type : 'POST',
    dataType : 'json',
    data : $("#"+id).serializeArray(),
    success : function(data){
      clearError();
      if(data == "success")
      {
        succesAlert("success","Data Saved Successfully",url+redi);
      }else{
        var html = "";        
        if(data.project_name){
          html = validationError(data.project_name);
          $("#project_name_err").append(html);
        }

        if(data.building_name){
          html = validationError(data.building_name);
          $("#building_name_err").append(html);
        }
        
        if(data.flat_no.length > 0){
          var j = 1;
          for (var i = 0; i < data.flat_no.length; i++) {
            $("#flat_no_err"+j).append(validationError(data.flat_no[i]));
            $("#flat_type_err"+j).append(validationError(data.flat_type[i]));
            $("#view_err"+j).append(validationError(data.view[i]));
            $("#cost_err"+j).append(validationError(data.flat_cost[i]));
            $("#area_err"+j).append(validationError(data.flat_area[i]));
            $("#floor_number"+j).append(validationError(data.floor_number[i]));
            j++;
          } 
        }
      }
    },
    error : function(xhr,status,error){
      errorAlert("","Something Went Wrong");
    }
  });
}

function getBuildings(url)
{
  var id = $("#project_name").val();
  if($('#building_id').length > 0){
    var building_id = $('#building_id').val();
  }
  
  $.ajax({
      url : url+'get-builByp', 
      type : 'GET',
      dataType : 'json',
      data : {'id':id},
      success:function(data){
        $("#building_name").empty();
        $(data).each(function(){
          html = $('<option>').text(this.building_name).attr('value', this.id);
          $("#building_name").append(html);
        });
        if($('#building_id').length > 0){
          $('#building_name').selectpicker('val', [building_id]);
        }
        $("#building_name").selectpicker('refresh');
        $("#building_name").selectpicker('render');   
      },
      error : function(xhr, status, error)
      {
        errorAlert("warning","Something Went Wrong");
      }
  })
}
function ChengeClr(){
  alert($(this).child().text());
}

/*error messages in validations*/
function validationError(msg){
    html = "<span class='parsley-errors-list filled' id='parsley-id-7'><p class='parsley-required text-danger'>"+msg+"</p></span>";
    return html;
}
/*clear error message*/
function clearError(){
    $(".parsley-errors-list.filled").each(function(){
        $(this).empty();
    });
}

function UpdateFlatStatus(url,id)
{
	var flat_status = $("#flat_status"+id).prop('checked');
	var cbtn,text,btnclr;
	if(flat_status == true){
		cbtntext = "Yes, Booked!";
		text = "You want to mark this flat as Booked!";
		btnclr = "#DD6B55";
	}else{
		cbtntext = "Yes, Available!";
		text = "You want to mark this flat as Available";
		btnclr = "#A5DC86";
	}
    swal({
          title: "Are you sure?",
          text: text,
          type: "warning",
          showCancelButton: true,
          confirmButtonColor: btnclr,
          confirmButtonText: cbtntext,
          closeOnConfirm: false
      },function(isConfirm){
        if(isConfirm){
           $.ajax({ 
           	url: url+'update-status',
              type: 'post',
              dataType: 'json',
              data:{
              	flat_id:id,
              	flat_status:flat_status
              },
              success: function(data) {
                  if(data == "success"){
                      succesAlert("success","Flat Booked Successfully");
                      setTimeout(function() {
                        location.reload();
                    }, 2000);
                  }
              }, 
              error: function(xhr, status, error) {
                errorAlert("","Something Went Wrong");
              }, 
          });
        }else{
          location.reload();
        }
    });
}
