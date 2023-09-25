$(document).ready(function() {
  function showdata() {
    output = "";
    $.ajax({
      url: "show.php",
      method: "GET",
      dataType: "json",
      success: function(data) {
        //  console.log(data);
        if (data) {
          x = data;
        } else {
          x = "";
        }
        for (i = 0; i < x.length; i++) {
          output +=
            "<tr><td>" +
            x[i].id +
            "</td>" +
            "<td>" +
            x[i].name +
            "</td>" +
            "<td>" +
            x[i].email +
            "</td>" +
            "<td>" +
            x[i].password +
            "</td>" +
            "<td><button class='btn btn-warning btn-sm btn-edit' data-sid="+x[i].id+" >Edit</button>&nbsp &nbsp<button class='btn btn-danger btn-sm btn-del' data-sid="+x[i].id+">Delete</button></td></tr>";
        }
        $("#tbody").html(output);
      }
    });
  }
  showdata();
  $("#btnadd").click(function(e) {
    e.preventDefault();
    let nm = $("#name").val();
    let em = $("#email").val();
    let pass = $("#password").val();
    mydata = { name: nm, email: em, password: pass };
    $.ajax({
      url: "insert.php",
      method: "POST",
      data: JSON.stringify(mydata),
      success: function(data) {
        // console.log(data);
        $("#myform")[0].reset();
        showdata();
      }
    });
  });
});
$("tbody").on("click",".btn-del",function(){
 let id =$(this).attr("data-sid");
 console.log(id);
 mydata={sid:id};
 mythis=this;
 $.ajax({
  url:"delete.php",
  method:"POST",
  data:JSON.stringify(mydata),
  success:function(data){
   $(mythis).closest("tr").fadeOut();
  },
 })
})
$("tbody").on("click",".btn-edit",function(){
  let id =$(this).attr("data-sid");
  console.log(id);
  mydata={sid:id};
  $.ajax({
   url:"update.php",
   method:"POST",
   dataType:"json",
   data:JSON.stringify(mydata),
   success:function(data){
    $("#name").val(data.name);
    $("#password").val(data.password);
    $("#email").val(data.email);
   },
  })
 })