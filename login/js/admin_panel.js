$("#patient").click(function(){
    $("a").removeClass('active');
    $(this).addClass('active');
    $.ajax({
        type:"GET",
        url:"ajax.php",
        data:{name:"patient"},
        success:function(data){
              $("#content").empty();
            $("#content").append(data);
        }
    });
});
$("#payment").click(function(){
    $("a").removeClass('active');
    $(this).addClass('active');
      $.ajax({
        type:"GET",
        url:"ajax.php",
        data:{name:"payment"},
        success:function(data){
              $("#content").empty();
            $("#content").append(data);

        }
    });
});
$("#staff").click(function(){
    $("a").removeClass('active');
    $(this).addClass('active');
      $.ajax({
        type:"GET",
        url:"ajax.php",
        data:{name:"staff"},
        success:function(data){
              $("#content").empty();
            $("#content").append(data);

        }
    });
});
$("#add_new_staff").click(function(){
    $("a").removeClass('active');
    $(this).addClass('active');
      $.ajax({
        type:"GET",
        url:"ajax.php",
        data:{name:"add_new_staff"},
        success:function(data){
              $("#content").empty();
            $("#content").append(data);

        }
    });
});
$("#staff_details").click(function(){
    $("a").removeClass('active');
    $(this).addClass('active');
      $.ajax({
        type:"GET",
        url:"ajax.php",
        data:{name:"staff_details"},
        success:function(data){
              $("#content").empty();
            $("#content").append(data);

        }
    });
});
$("#patient_details").click(function(){
    $("a").removeClass('active');
    $(this).addClass('active');
      $.ajax({
        type:"GET",
        url:"ajax.php",
        data:{name:"patient_details"},
        success:function(data){
              $("#content").empty();
            $("#content").append(data);

        }
    });
});

function my_func(event){
  var r = confirm("Are u sure?");
  var input = event.currentTarget.parentNode.childNodes[1];
  console.log(input);
  if(r ==  false){
    // window.location.href="http://localhost:8080/hms";
  }else{
    $.ajax({
        type:"POST",
        url:"delete_patient.php",
        data:{id:input.value},
        success:function(){
          alert('Appointment has been deleted');
          window.location.href="http://localhost:8080/hms";
        }
    });
  }
}
