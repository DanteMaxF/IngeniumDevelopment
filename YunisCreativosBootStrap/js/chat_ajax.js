$(document).ready(function() {
$.ajaxSetup({ cache: false }); // This part addresses an IE bug. without it, IE will only load the first number and will never refresh
setInterval(function() {
$('#ajaxChat').load('ajaxShowMsg.php');
}, 1000); 
});