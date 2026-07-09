//////////////////////////////////////////////////////////////////////////////////////////////
// File Name        : droptech.php																//
// Craeted By       : Vishwajeet Mahadik													//
// Created Date     : 09-Nov-2021															//
// File Modified By : Vishwajeet Mahadik													//
// Modify  Date     : 09-Nov-2021															//
// Description      : common js file for website/cms page  									//
//////////////////////////////////////////////////////////////////////////////////////////////

var droptech = droptech ? droptech : {};
droptech.main = droptech.main ? droptech.main : {
	load  : '<div class="loadingIndicator"><button class="btn btn-default waves-effect waves-themed" type="button" disabled=""><span class="spinner-grow spinner-grow-sm" role="status" aria-hidden="true"></span> Loading...</button></div>',
	siteurl : $("#siteUrl").val()?$("#siteUrl").val():'',
	ajaxDataReturn : '',
	//function initPage
 ajaxFunction : function(datastr, action, datatype, ajaxCallbackMethod, ajaxOnErrorCallbackMethod, cache) {
               cache = typeof cache !== 'undefined' ? cache : true;
               
               var url = droptech.main.siteurl+"app/b2c/module/ajaxProcess.php?action="+action;
  return $.ajax({
         url : url,
         method: "POST",
         enctype : 'multipart/form-data',
         dataType : datatype,
         contentType: "application/x-www-form-urlencoded; charset=UTF-8",
         data : datastr,
         cache : cache,
         success : (function(data) {
         ajaxCallbackMethod(data);
         }), // end success section
         error : function(data) {
               if (ajaxOnErrorCallbackMethod) {
                      ajaxOnErrorCallbackMethod()
               } else {
                      console.log('Ajax request not recieved!');
               }
         }
  }); // end ajax function
},
progress : function(){
	var i = 0;
	if (i == 0) {
	    i = 1;
	    var elem = document.getElementById("progress-bar");
	    var width = 1;
	    var id = setInterval(frame, 10);
	    function frame() {
	      if (width >= 100) {
	        clearInterval(id);
	        i = 0;
	      } else {
	        width++;
	        elem.style.width = width + "%";
	        $("#progress-bar").css('width',width + "%");
	      }
	    }
	  }
},
viewAccountButton : function(mobile){
	var viewAccountButtonReturn = function(data){
		console.log(data);
	};
	setTimeout(function(){ 
		droptech.main.ajaxFunction("mobile="+mobile,'page_track','json',viewAccountButtonReturn);
	}, 3000);
},
loginWithGoogle : function(data){
	 console.log("login With Google Service data");
	 droptech.main.displayAlert("success","Login With Google.");
	 droptech.main.registerOTPConfirmed();	 
},
displayAlert :function(type,message){
	 $(".alertBlock .alert").hide();
	 $(".alertBlock .alert-"+type).show();
	 $(".alertBlock .alert-"+type+" span.msg").html(message);
	 var form =  droptech.main.formObject;
	 $(form).find(".form-group").hide();
     $(form).find(".btn").hide();
	 if(type == 'error' || type == 'danger'){
		 //droptech.main.formObject='';
		 $(form).find(".form-group").show();
         $(form).find(".btn").show();
	 }
},
onlyNumber : function() {
    var onlyNumber = $(".onlyNumber");
    onlyNumber.keydown(function(e) {
           var key = e.keyCode ? e.keyCode : e.which;
           if (!([ 8, 9, 13, 27, 46 ].indexOf(key) !== -1 ||
           (key == 65 && (e.ctrlKey || e.metaKey)) ||
           (key >= 35 && key <= 40) ||
           (key >= 48 && key <= 57 && !(e.shiftKey || e.altKey)) ||
           (key >= 96 && key <= 105)
           ))
                 e.preventDefault();
    });
    onlyNumber.keyup(function(e) {
           var inputVal = $(e.currentTarget).val();
           $(e.currentTarget).val(inputVal.replace('.', ''));
    });
    onlyNumber.on('paste', function(e) {
           var $this = $(this);
           setTimeout(function() {
                 $this.val($this.val().replace(/[^0-9]/g, ''));
           }, 5);
    });
},
alertMesasgeReset : function(){
	$(".droptech-bootstrap-validator-form .alertBlock .alert").hide();
	$(".droptech-bootstrap-validator-form .form-group").show();
    $(".droptech-bootstrap-validator-form .btn").show();
},
bootstrapValidator:function(){
	$('form.droptech-bootstrap-validator-form').each(function(){
		var ajax = $(this).attr('ajax')?$(this).attr('ajax'):'false';
		
		if(ajax == "true" || ajax == true || ajax == 'true'){
			droptech.main.cbeFormElementAjaxSubmit($(this));
		}else{
			$(this).bootstrapValidator();
		}
	});
},
cbeFormElementAjaxSubmit : function(formelement){
	formelement.bootstrapValidator().on('success.form.bv', function(e) {
           e.preventDefault();
           e.stopImmediatePropagation();
            var $form = $(e.target);
            droptech.main.formObject = $form;
            	droptech.main.cbeFormElementBeforeAjaxSubmit($form.attr('name'));
                var bv = $form.data('bootstrapValidator');
                var action = droptech.main.siteurl+"app/b2c/module/ajaxProcess.php?action="+$form.attr('action');
                var datastr = $form.serialize();
                var method = $form.attr('method').toLowerCase();
                var cache = typeof cache !== 'undefined' ? cache : true;
                droptech.main.displayAlert("process","");
                $.ajax({
                    type : method,
                    url : action,
                    enctype : 'multipart/form-data',
                    contentType : "application/x-www-form-urlencoded; charset=UTF-8",
                    dataType : 'text',
                   // data : datastr,
                    data: new FormData(this),
    	            contentType: false,
    	            cache: false,
    	            processData:false,
                    cache : cache,
                    success : (function(data) {
                    	droptech.main.cbeFormElementAjaxSubmitReturn($form.attr('action'),data);
                    }), // end success section
                    error : function(data) {
                    	console.log('Ajax request not recieved!');
                        console.log(data);
                    }
             });                    
    });	
},
cbeFormElementBeforeAjaxSubmit : function(formName){
	if(formName == 'addToCartQuickly'){}
},
cbeFormElementAjaxSubmitReturn : function(callback,data){
	droptech.main.ajaxDataReturn = JSON.parse(data);
	var data = JSON.parse(data);data=data[0];
	// code code for success / error
     var  alertClass = "";
	 var action = callback;
	 var message = data.value?data.value:'';
	 var reload = data.reload?data.reload:'false';
	 var status = data.status?data.status:''; if(status == 'true' || status == true ) 
	 {
		 status=true;
		 alertClass = "success";
	}else  { 
		status=false; 
		alertClass = "danger";
	}
	 droptech.main.displayAlert(alertClass,message);
	 if(action == "login" && status){
			 $("#loginForm").hide();
			 $("#loginOTPForm").show();
			 var mobile = data.mobile?data.mobile:'';
			 $("#loginOTPForm input[name=mobile]").val(mobile);
	 }
	 if(reload != "false" && status){
		 if(reload == "home")reload="";
		 setTimeout(function(){ 
			 window.location = droptech.main.siteurl+"/"+reload;
		}, 1000); 
	 }
	//var callback = 'droptech.main.'+callback+'()';
	//eval(callback);
},

getRetunData : function(){
	 var data = droptech.main.ajaxDataReturn;
	 data = JSON.parse(data);
	 data=data[0];
	 return data;
},
loadComponentData : function(targetObject,fileName,formData,callback){
	targetObject.html(droptech.main.load);
	var url = droptech.main.siteurl+"app/b2c/view/components/"+fileName+".php";
	$.get(url, function(dataReturn) {
		targetObject.html(dataReturn);
		if(fileName == "otp")droptech.main.registerOTP();
		if(fileName == "thankyou")droptech.main.registerOTPConfirmed();
	});
},
login : function(){
	var data = droptech.main.ajaxDataReturn;
},
register : function(data){
	var otp = data.OTP?data.OTP:'';
	droptech.main.loadComponentData($("#contentBox"),'otp','registerOTP');
},
registerOTP : function(){
	var data  = droptech.main.ajaxDataReturn;
	var data = data[0];
	var otp = data.OTP?data.OTP:'';
	var customerId = data.customerId?data.customerId:'';
	$("#contentBox #otpServer").val(otp);
	$("#contentBox #customerId").val(customerId);
	droptech.main.bootstrapValidator();
},
registerOTPConfirmed : function(){
	setTimeout(function(){ 
		 window.location = droptech.main.siteurl;
	}, 1000);
},
profileSave : function(){
	setTimeout(function(){ 
		 window.location = droptech.main.siteurl+"profile";
	}, 1000);
},


// project specific functions
clearText : function(ele){
	$(ele).val("");
},
notificationDisplay : function(type, messages) { // info ,
				    // success ,
				// error
				var errorTypeClass = "", errorTypeClassIcon = "";
				$('#globalMessages').html("");
				if ($("#notificationMessages").length != 0) {
					messages = $("#notificationMessages").attr(messages);
				}
				if (type == '') {
					$('#globalMessages').html("");
					return false;
				}
				var notificationString = '<div class="global-alerts">';
				var errorTypeClass = '';
				if (type == 'success') {
					errorTypeClass = 'alert alert-success';
					errorTypeClassIcon = "confirmation-icon";
				}
				if (type == 'error') {
					errorTypeClass = 'alert alert-danger';
					errorTypeClassIcon = "error-icon";
				}
				if (type == 'info') {
					errorTypeClass = 'alert alert-info';
					errorTypeClassIcon = "info-icon";
				}
				if (type == 'warning') {
					errorTypeClass = 'alert alert-warning';
					errorTypeClassIcon = "warning-icon";
				}
				if (messages != "") {
					notificationString += '<div class="'
							+ errorTypeClass
							+ ' alert-dismissable alert-bar" role="alert"><ul class="notificationicon">';
					notificationString += '<li class="text-center"><span><i class="global-alerts-icon '
							+ errorTypeClassIcon
							+ '" aria-hidden="true"></i></span><span class="text-center">'
							+ messages + '</span></li>';
					notificationString += '<ul></div>';
					$('#globalMessages').html(notificationString);
					cbe.scrollTopFromFooter();
				}
},
logout  : function(){
	var logoutReturn = function(data){
		setTimeout(function(){ 
			 window.location = droptech.main.siteurl;
		}, 1000);
	};
	droptech.main.ajaxFunction("",'logout','json',logoutReturn);
},
getOTPLink : function(){
	var mobile = $("#signupForm input[name=mobile]").val()?$("#signupForm input[name=mobile]").val():'';
	if(mobile!="" && mobile.length == 10){
		$(".getOTPOption").show();
	}else{
		$(".getOTPOption").hide();
	}
},
getOTP : function(){
	var getOTPReturn = function(data){
		var status = data[0].status?data[0].status:'';
		var message = data[0].value?data[0].value:'';
		if(status == "true" || status == true){
			 droptech.main.displayAlert('success',message);
			 $("#getOTPLink").html("Resend OTP");
		}
	};
	var mobile = $("#signupForm input[name=mobile]").val()?$("#signupForm input[name=mobile]").val():'';
	var name = $("#signupForm input[name=name]").val()?$("#signupForm input[name=name]").val():'';
	if(mobile!="" && mobile.length == 10){
		droptech.main.ajaxFunction("mobile="+mobile+"&name="+name,'getOTP','json',getOTPReturn);
	}
},
loginTriger : function(){
	setTimeout(function(){ 
		$("#sidebarNavToggler").trigger('click');
		$("#loginForm input#signinMobile").focus();
	}, 1000);
},
contactForm : function(){
	droptech.main.formObject = $("#contactForm");
	var name = $("#name").val()?$("#name").val():"";
	var mobile = $("#mobile").val()?$("#mobile").val():"";
	var message = $("#message").val()?$("#message").val():"";
	var datastr = "action=contactus&name="+name+"&mobile="+mobile+"&message="+message;
	droptech.main.displayAlert("process","");
	$("#contactForm .form-group").hide();
	$.ajax({
        url : 'service/constant.php',
        method: "POST",
        enctype : 'multipart/form-data',
        dataType : 'text',
        contentType: "application/x-www-form-urlencoded; charset=UTF-8",
        data : datastr,
        success : (function(data) {
        	data = JSON.parse(data);
        	var status = data.status?data.status:false;
        	var value = data.value?data.value:'Error';
        	if(status){
        		droptech.main.displayAlert("success",value);	
        		$("#contactForm .btn").hide();
        	}else{
        		droptech.main.displayAlert("danger",value);
        		$("#contactForm .form-group").show();
        	}
        }), // end success section
        error : function(data) {
        	 console.log('Ajax request not recieved!');
        }
	});
},

};
droptech.list = droptech.list ? droptech.list : {
	beforeLoad : function(){
		$("#filterListView").html(droptech.main.load);
	},
	load: function(){
		droptech.list.beforeLoad();
		droptech.list.ajax();
		droptech.list.afterLoad();
	},
	ajax : function(){
		var dataStr = droptech.list.collectData();
		droptech.main.ajaxFunction(dataStr,'listView','text',droptech.list.loadComplete);
	},
	loadComplete : function(data){
		$("#filterListView").html(data);
		// additional code to be executes
	},
	collectData : function(){
		var dataStr = "";
		if($("#categoryListCheckbox").length!=0){
			var values= [];
			$("#categoryListCheckbox .form-check-input.main-category").each(function(){
				var key = $(this).attr('value')?$(this).attr('value'):'';
				var subCategory = $(".sub-category-checkbox.sub-category-checkbox_"+key);
					if($(this).is(":checked")){
						values.push($(this).attr('value')?$(this).attr('value'):'');
						subCategory.removeClass("hide");
					}else{
						subCategory.addClass("hide");
						subCategory.find('input[type=checkbox]').prop("checked",false);
					}
					
			});
			let valueString = values.toString();
			dataStr+="&category="+valueString;
			
		}
		if($(".sub-category-checkbox .form-check-input").length!=0){
			var types= [];
			$("#categoryListCheckbox .sub-category-checkbox .form-check-input").each(function(){
				var key = $(this).attr('value')?$(this).attr('value'):'';
					if($(this).is(":checked")){
						types.push($(this).attr('value')?$(this).attr('value'):'');
					}
					
			});
			let valueString = types.toString();
			dataStr+="&types="+valueString;
		}
		return dataStr;
	},
	afterLoad : function(){
	},
	clear : function(){
		$("#categoryListCheckbox input[type=checkbox]").prop("checked",false);
		droptech.list.load();
	},
};
/* JS code for tab Table functionality*/
$(document).ready(function(){
	var page = $("#page").val()?$("#page").val():'';
	droptech.main.onlyNumber();
	droptech.main.bootstrapValidator();
	// Runtime check javascript reference load while page load 
	if($("#loadJavascriptFunction").length != 0){
		$("#loadJavascriptFunction li").each(function(){
			eval($(this).html());
		});
	};
	if($(".loadDyanamicComponent").length != 0){
		$(".loadDyanamicComponent").each(function(){
			var name = $(this).attr('name')?$(this).attr('name'):'';
			droptech.main.loadComponentData($(this),name,name);
		});
	};
	droptech.main.siteurl = $("#siteUrl").val()?$("#siteUrl").val():'';
	
	if($("#filterListView").length!=0){
		droptech.list.load();
		$("#categoryListCheckbox .form-check-input").change(function(){
			droptech.list.load();	
		});
	}
});
