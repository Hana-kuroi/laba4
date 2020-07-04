$(document).ready(function(){

$('#myForm').change(function(){
$.ajax({
type: "POST",
url: "search.php",
data: {pole: $("#role").val(),
search: $("#search").val()},
success: function(html){
$("#cont").html(html);
}
});
return false;
});

});