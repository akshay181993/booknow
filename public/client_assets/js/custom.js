$(window).on('load', function() {
      
$(document).ready(function () {
    var origin = "http://localhost";
    // alert(origin);
    var host_url = origin+"/booknow/";
    var navListItems = $('div.setup-panel div a'),
        allWells = $('.setup-content'),
        allNextBtn = $('.nextBtn');

    allWells.hide();

    navListItems.click(function (e) {
        e.preventDefault();
        var $target = $($(this).attr('href')),
            $item = $(this);
        if (!$item.hasClass('disabled')) {
            navListItems.removeClass('btn-success').addClass('btn-default');
            $item.addClass('btn-success');
            allWells.hide();
            $target.show();
            $target.find('input:eq(0)').focus();
        }

        if($(".parsley-errors-list p").length > 0){
            $(this).removeClass('btn-success').addClass('btn-danger');
        }
    });

    allNextBtn.click(function () {
        // var curInputs;
        var curStep = $(this).closest(".setup-content"),
            curStepBtn = curStep.attr("id"),
            nextStepWizard = $('div.setup-panel div a[href="#' + curStepBtn + '"]').parent().next().children("a"),
            curInputs = curStep.find("input[type='text'],input[type='url'],input[type='email']"),
            isValid = true;
            var returndata;
            if(curStepBtn == 'step-1')
            {
                returndata = SaveClientDetails(host_url);                
                if(returndata == false){
                    isValid = false;
                }
            }else if(curStepBtn == 'step-2')
            {
               returndata =  OtpCheck(host_url);
               if(returndata == false){
                    isValid = false;
                }
            }else if(curStepBtn == 'step-3'){
                returndata = BookedFlat(host_url);
                if(returndata == false){
                    isValid = false;
                }
                PaymentDetails(host_url);
            }else{
               window.reload(); 
            }

            $(".form-group").removeClass("has-error");
            for (var i = 0; i < curInputs.length; i++) {
                if (!curInputs[i].validity.valid) {
                    isValid = false;
                    $(curInputs[i]).closest(".form-group").addClass("has-error");
                }
            }

        if (isValid) nextStepWizard.removeAttr('disabled').trigger('click');
    });

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
    },1000);

});
     //Use the id of the form instead of #change
function ShowLayout($element)
{
     var origin = window.location.origin;
      var host_url = origin+"/booknow/";
      var title = $element.val();
      var imgsrc = $element.find('option:selected').attr("data-img");
      $('#layoutimg').attr('src',host_url+'public/uploads/'+imgsrc);
      $('#layout_head').html(title);
      $('#myModal').modal('show');
}
var previousValue;
$("#change")
    .mouseup(function() {
        var open = $(this).data("isopen");

        if (open) {
            if (this.value === previousValue)
            {
                  ShowLayout($(this));
            }else{
                 ShowLayout($(this));
            }
        }

        previousValue = this.value;
    
        $(this).data("isopen", !open);
       
    });



$("#chkPassport").click(function () {
    if ($(this).is(":checked")) 
    {
        $("#dvPassport").show();
    } else {
        $("#dvPassport").hide();
    }
});

});

function SaveClientDetails(url)
{
    $('.loader').show();
    var isValid = false;
    $.ajax({
        async: false,
        url : url+"user-details",
        dataType : 'json',
        type: 'POST',
        data : $("#user-form").serializeArray(),
        success : function(data){
            setTimeout(function(){
                $('.loader').hide();
            },1000);
            
            clearError();
            $("#otp-sent").empty();
            var html ="";
            if(data == "success"){
                isValid = true;
                $("#otp-sent").append("Otp Sent Successfully !!!");
                $("#step1").removeClass('btn-danger').addClass('btn-success');
            }else if(data == "cp_notvalid"){
                isValid = false;
                $("#token").empty();
                html = validationError("Given Code is Expired !!! Please Contact CP");
                $("#token").parent().append(html);
                $("#token").parent().addClass('has-error');
                $("#step1").removeClass('btn-danger').addClass('btn-danger');
            }else{

                isValid = false;
                // $(".parsley-errors-list").addClass('has-error');
                $("#step1").removeClass('btn-success').addClass('btn-danger');

                if(data.name){
                    html = validationError(data.name)
                    $("#name").parent().append(html);
                }
                if(data.email){
                    html = validationError(data.email);
                    $("#email").parent().append(html);
                }
                if(data.mobile_no){
                    html = validationError(data.mobile_no);
                    $("#mobile_no").parent().append(html);
                }
                if(data.token){
                    html = validationError(data.token);
                    $("#token").parent().append(html);
                    $("#token").parent().attr('class','has-error');                    
                }
            }
        }
    });
    var hasValid = (isValid == true) ? true : false;
    return hasValid;
}

function OtpCheck(url)
{
    $('.loader').show();
    var isValid = false;
    $.ajax({
        async: false,
        url : url+"otp-check",
        dataType : 'json',
        type: 'POST',
        data : $("#otp-form").serializeArray(),
        success : function(data){
             setTimeout(function(){
                $('.loader').hide();
            },1000);
            clearError();
            var html ="";
            if(data.status == "success"){
                isValid = true;
                id = data.data[0].id;
                $("#booked_id").val(id);
                $("#step2").removeClass('btn-danger').addClass('btn-success');

            }else if(data.status == "notvalid"){
                isValid = false;
                $("#otp").empty();
                html = validationError("Please Enter Valid OTP");
                $("#otp").parent().append(html);
                $("#otp").parent().attr('class','has-error');
                $("#step2").removeClass('btn-success').addClass('btn-danger');
            }else{
                isValid = false;
                 // $(".parsley-errors-list").addClass('has-error');
                $("#step2").removeClass('btn-success').addClass('btn-danger');
                if(data.otp){
                    html = validationError(data.otp)
                    $("#otp").parent().append(html);
                }
            }
        }
    });
    var hasValid = (isValid == true) ? true : false;
    return hasValid;
}

function BookedFlat(url)
{
    $('.loader').show();
    var id = $("#booked_id").val();
    console.log(id);
    var isValid = false;
    $.ajax({
        async: false,
        url : url+"flat-booking/"+id,
        dataType : 'json',
        type: 'POST',
        data : $("#flat-form").serializeArray(),
        success : function(data){
             setTimeout(function(){
                $('.loader').hide();
            },1000);
            clearError();
            var html ="";
            if(data == "success"){
                isValid = true;
                $("#step3").removeClass('btn-danger').addClass('btn-success');

            }else{
                isValid = false;
                $("#step3").removeClass('btn-success').addClass('btn-danger');

                if(data.project_name){
                    html = validationError(data.project_name)
                    $("#project_name").parent().append(html);
                }

                if(data.building_name){
                    html = validationError(data.building_name)
                    $("#building_name").parent().append(html);
                }

                if(data.flat_view){
                    html = validationError(data.flat_view)
                    $("#flat_view").parent().append(html);
                }

                if(data.flat_type){
                    html = validationError(data.flat_type)
                    $("#flat_type").parent().append(html);
                }

                if(data.slectedflat){
                    html = validationError(data.slectedflat)
                    $("#flat_no_err").append(html);
                }
                if(data.t_and_c){
                    html = validationError(data.t_and_c)
                    $("#tc").append(html);
                }
            }
        }
    });
    var hasValid = (isValid == true) ? true : false;
    return hasValid;
}

function PaymentDetails(url)
{
    $('.loader').show();
    var flat_id;
    flat_id = $("#booked_id").val();
    
    $.ajax({
        url : url+'get-booked-details',
        dataType : 'json',
        type : 'GET',
        data : {'id':flat_id},
        success : function(data){
             setTimeout(function(){
                $('.loader').hide();
            },1000);
            $(".confirmdetails").empty();
            if(data != false)
            {
                $("#cname").append(data[0].customer_name);
                $("#cmobile").append(data[0].customer_mobile);
                $("#cemail").append(data[0].customer_email);
                if(data[0].name != null && data[0].mobile_no != null){
                    $("#cpname").text(data[0].name);
                    $("#cagent_no").text(data[0].mobile_no);
                }else{
                    $("#cpname").text("NA");
                    $("#cagent_no").text("NA");
                }
                $("#cproject").append(data[0].project_name);
                $("#cbuilding").append(data[0].building_name);
                $("#cflat_no").append(data[0].flat_no);
                $("#cflat_view").append(data[0].flat_view);
                $("#cflat_cost").append(data[0].flat_cost);
                $("#cflat_area").append(data[0].flat_area);
                $("#cflat_type").append(data[0].flat_type);
                $("#hash").val(data[0].hash);
                $("#txnid").val(data[0].tid);
                $("#customer_mobile").val(data[0].customer_mobile);
                $("#customer_name").val(data[0].customer_name);
                $("#customer_email").val(data[0].customer_email);
            }
        },
    });
}

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
            $("#addflats").empty();
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
                     html += '<li class="floor gray">'+
                                '<span class="floor-number">'+key+'</span>'+'<ul class="flat">';
                                    for (var j = 1; j<= val; j++) { 
                                        var classname= "",attr = "";
                                        // var start_date = new Date(booked_date[m]);// your date object
                                        // var end_date = start_date.setDate(start_date.getDate() + 1);
                                        // var today = new Date();
                                        // if(booking_status[m] == "Booked" && payment_status[m] == "Pending" && end_date  < Date.parse(today)){
                                        //     UpdateStatus(url,all_ids[m]);
                                        // }else 
                                        if((payment_status[m] == "Completed" && booking_status[m] == "Booked") || booked_status[m] == "Booked"){
                                            classname = "booked";
                                        }else if(all_views[m] != $("#flat_view").val()){
                                            classname = "disabled";
                                        }
                                    html+= '<li class="flat-no '+classname+'" data-id='+all_ids[m]+' data-value='+all_flats[m]+' data-toggle="tooltip" title="Flat View - '+all_views[m]+'</br>Flat Area - '+all_area[m]+'</br>Flat Cost - '+all_cost[m]+'">'+
                                                all_flats[m]+
                                            '</li>'
                                        m++;
                                    }
                            html+='</ul>'+'</li>';
                });
                $("#addflats").append(html);
                 $('[data-toggle="tooltip"]').tooltip({html: true});
            }
        }
    });
}

/*error messages in validations*/
function validationError(msg){
    html = "<span class='parsley-errors-list filled text-danger' id='parsley-id-7'>"+msg+"</span>";
    return html;
}
/*clear error message*/
function clearError(){
    $(".parsley-errors-list.filled").each(function(){
        $(this).empty();
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

function UserCancelled(url)
{
    var id = $("#booked_id").val();
    $.ajax({
        url : url+'cancel-booking',
        type : 'POST',
        data : {'id' : id},
        dataType : 'json',
        success : function(data){
            if(data == "success"){
                location.reload();
            }
        }
    });
}

// to update cancelled or paymnt pending after 24 hrs.
function UpdateStatus(url,id)
{
    // console.log(id);
    $.ajax({
        url : url+'update-blockedflat',
        type : 'POST',
        data : {id : id},
        dataType : 'json',
        success : function(data){
        }
    });
}