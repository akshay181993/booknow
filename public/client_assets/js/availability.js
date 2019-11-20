$(window).on('load', function() {
      
$(document).ready(function () {
    var origin = "http://localhost";
    // alert(origin);
    var host_url = origin+"/booknow/";

    $('div.setup-panel div a.btn-success').trigger('click');
       
   $(document).on( "click", ".flat-no", function() {
        isSelected = $(this).hasClass('check');
        $('.flat-details').find('li').removeClass('check');
        if(!isSelected){ 
            $(this).addClass('check');
            $("#slectedflat").val($(this).attr('data-value'));
            $("#flat_id").val($(this).attr('data-id'));
        }
    });
   
    $("#project_name").prop("selectedIndex", 1);
    
    getBuildings(host_url);
    setTimeout(function(){ 
        getFlats(host_url);
    }, 1000);
    
    setTimeout(function(){
        GetAllFlatData(host_url,getParams());         
    },2000);

     setTimeout(function(){
        $(".overflow").hide();
    },2000);

});

});



function getBuildings(url)
{
  var id = $("#project_name").val();
  // console.log(url);
  $.ajax({
      url : url+'get-builByproj/'+id, 
      type : 'GET',
      dataType : 'json',
      // data : {'id':id},
      success:function(data){
        $("#building_name").empty();
        $(data).each(function(){
          html = $('<option>').text(this.building_name).attr('value', this.id);
          $("#building_name").append(html);
        });
      },
      error : function(xhr, status, error)
      {
        // errorAlert("warning","Something Went Wrong");
      }
  })
}

function getFlats(url)
{
  var id = $("#building_name").val();
  $.ajax({
      url : url+'get-flatsByb/'+id, 
      type : 'GET',
      dataType : 'json',
      // data : {'id':id},
      success:function(data){
        $("#flat_type").empty();
        $(data).each(function(){
          html = $('<option>').text(this.flat_type).attr('value', this.flat_type);
          $("#flat_type").append(html);
        });
      },
      error : function(xhr, status, error)
      {
        // errorAlert("warning","Something Went Wrong");
      }
  })
}

$(document).on("mouseover", ".flat-no" ,function() {
    var className  = $(this).attr('class');
    // alert(className);
    if(className == "flat-no booked" || className == "flat-no blocked"|| className == "flat-no dissable"){
       $(this).css('pointer-events','none');
    }
});

function GetAllFlatData(url,params)
{
    $.ajax({
        url : url+'get-allflats',
        dataType : 'json',
        data : params,
        type : 'GET',
        success : function(data){ 
            $("#style-2").empty();
            if(data != false){
               var booked_status = [],booked_id = [],booked_date = [],flat_status = [],bookedflat_no = [],all_ids = [],all_floors =[], all_flats = [],all_views =[],all_area=[],all_cost = [],booking_status = [],payment_status =[];
                for(var i = 0;i < data.length;i++){ 
                    all_floors.push(data[i].floor_number);
                    all_flats.push(data[i].flat_no);
                    all_views.push(data[i].flat_view);
                    all_area.push(data[i].flat_area);
                    all_cost.push(data[i].flat_cost);
                    payment_status.push(data[i].payment_status);
                    booking_status.push(data[i].booking_status);
                    all_ids.push(data[i].id);
                    bookedflat_no.push(data[i].bookedflat_no);
                    flat_status.push(data[i].flat_status);
                    booked_id.push(data[i].bookedflat_id);
                    booked_date.push(data[i].booked_date);
                    booked_status.push(data[i].booked_status);
                }
                var counts = [];
                all_floors.forEach(function(x) { counts[x] = (counts[x] || 0)+1; });
                var m = 0,html = "";
                counts.map(function(val, key){
	                     html += 	'<div class="col-md-4">'+
						   				'<p style="font-size: 35px">'+key+'</p>'+
			   					 	'</div>'+'<div class="col-md-8">';
			   					 	for (var j = 1; j<= val; j++) { 
                                        var classname= "",attr = "";
                                        if((payment_status[m] == "Completed" && booking_status[m] == "Booked") || booked_status[m] == "Booked"){
                                            classname = "booked";
                                        }else if(all_views[m] != $("#flat_view").val()){
                                            classname = "disabled";
                                        }
				   			 			html += '<i class="material-icons available '+classname+'" data-id='+all_ids[m]+' data-value='+all_flats[m]+' data-placement="right" data-toggle="tooltip"  title="Flat View - '+all_views[m]+'</br>Flat Area - '+all_area[m]+'</br>Flat Cost - '+all_cost[m]+'" style="font-size: 50px;margin-right: 23px;">business</i>';
							   			m++;
					   				}
					   	html += '</div>';
                });
                $("#style-2").append(html);
                 $('[data-toggle="tooltip"]').tooltip({html: true});
            }
        }
    });
}

function ChangeFlatStructure()
{
    var origin = window.location.origin;
    GetAllFlatData(origin+'/booknow/',getParams());
}


function getParams(){
    var all_inputs;
    all_inputs  = {
            project_name  : $("#project_name").val(),
            building_name : $("#building_name").val(),
            flat_type : $("#flat_type").val(),
            flat_view : $("#flat_view").val()
        }
        // console.log(all_inputs);
    return all_inputs;
}
