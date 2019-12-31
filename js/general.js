// JavaScript Document
var isShown = false;
function onImageChange1(event){
	var fp =URL.createObjectURL(event.target.files[0]);
	$('#img1').attr('src',fp);}
function onImageChange2(event){
	var fp =URL.createObjectURL(event.target.files[0]);
	$('#img2').attr('src',fp);}
function onImageChange3(event){
	var fp =URL.createObjectURL(event.target.files[0]);
	$('#img3').attr('src',fp);}
function setImage1(x){
	$("#main_image").attr("src","uploads/" + x);}
function setImage2(x){
	$("#main_image").attr("src","uploads/" + x);}
function setImage3(x){
	$("#main_image").attr("src","uploads/" + x);}
function showPanel(){
			$("#outer_panel").css({
			"position":"absolute",
			"right":"0px",
			"transition":"ease-out 0.7s"
			});
	}
function hidePanel(){
			$("#outer_panel").css({
			"position":"absolute",
			"right":"-100px",
			"transition":"ease-out 0.7s"
			});
		}
function onSearch(){
	var v = $("#txt_search").val();
		$("#ifroom").attr("src","main.php?search=" + v);
}

$(document).ready(function(){
	$("#overlay").hide();
	$("#btnClose").click(function(){
		$("#overlay").hide();
	});
	$("#btnShowMenu").click(function(){
		$("#overlay").show();
		});
		$("#overlay").click(function(){
		$("#overlay").hide();
			});
	$("#img1").click(function(){
		$("#file1").click();
			});
	$("#img2").click(function(){
		$("#file2").click();
			});
	$("#img3").click(function(){
		$("#file3").click();
			});
	$("#outer_panel").click(function(){
		if(isShown){
		hidePanel();
		isShown = false;
		}else{
			showPanel();
			isShown = true;
			}
			});
	$("#btn_search").click(function(){
		 var v = $("#txt_search").val();
		$("#ifroom").attr("src","data.php?search=" + v);

	});

	$("#btnsend").click(function(e){
		var chat_message = new FormData($("#chat_form")[0]);
	 $.ajax({
		 url:"send_chat.php",
		 type:"POST",
		 data: chat_message,
		 async:false,
		 success: function(data){
			$("#txtMsg").val("");
		 },
		 cache:false,
		 processData:false,
		 contentType:false
	 });
		e.preventDefault();
	});
});
