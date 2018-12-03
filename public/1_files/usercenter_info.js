var loader = $('<div />').addClass('mail_loading');
var mailWrap = $('body');
var legaldata = {'nickname':1,'username':1,'group':1,'realname':1};
function loadingStart() {
	mailWrap.append(loader);
}
function loadingEnd() {
	loader.remove();
}
function inituserinfo(item,num) {
    var provObject = document.add_place_form[item];
    for(var i = 0; i < document.add_place_form[item].options.length; i++) {
        if (document.add_place_form[item].options[i].value==num)
        {
            document.add_place_form[item].selectedIndex = i;
        }
    }
}
            //回车感应事件
            function chkkeysend(event,flag)
            {
                if (event.keyCode==13) {
                    if(flag==1){
                        $("#next_tel").click();
                    }else{
                        $("#next_email").click();
                    }
                }
            }
            //修改按钮
            $(function(){
                $("a.change_detail").click(function(){
                    $(".show_item").addClass("hidden");
                    $(".write_item").removeClass("hidden");
                    $("#cancelBtn").css("display","inline-block");
                    $("#editBtn").css("display","none");
                    $("#saveBtn").css("display","inline-block");
                });
                $("#editBtn").click(function(){
                 $(this).css('display','none');
                 $("#saveBtn").css("display","inline-block");
                 $("#cancelBtn").css("display","inline-block");
                 $(".show_item").addClass("hidden");
                 $(".write_item").removeClass("hidden");
                	
                });
            });
            

            //处理英文、中文长度计算
            function strlen(str) {
                var len = 0;
                for (var i = 0; i < str.length; i++) {
                    if (str.charCodeAt(i) > 255 || str.charCodeAt(i) < 0){
                        len += 2;
                    } else {
                        len ++;
                    }
                }
                return len;
            }

            //验证用户名规则
            function check_username(){
            	 var username=$("#username").val();
            	 var oldusername = $("#copyusername").val();
            	     username = username.replace(/(^\s*)|(\s*$)/g,'');
            	     oldusername = oldusername.replace(/(^\s*)|(\s*$)/g,'');
            	     if(username == oldusername) {
            	    	 legaldata.username = 1;
            	    	 return true;
            	     }
            	     if(username==''){
            	    	 $('#user-tip').html('请输入用户名');
            	    	 $('#user-tip').show().addClass("err_tips");
            	    	 legaldata.username = 0;
            	    	 return false;
            	     }
            	     if(strlen(username) > 20 || strlen(username) < 5){
            	    	 $('#user-tip').html('请输入5-20位字符');
            	    	 $('#user-tip').show().addClass("err_tips");
            	    	 legaldata.username = 0;
            	    	 return false;
            	     }
            	     if(new RegExp("^[a-zA-Z][a-zA-Z0-9_]{4,19}$").test(username) == false){
            	    	 $('#user-tip').html('用户名格式错误');
            	    	 $('#user-tip').show().addClass("err_tips");
            	    	 legaldata.username = 0;
            	    	 return false;
            	     }
            	     //验证唯一性
            	     var url = '/userinfoconfirmajax/checkusername';
            	     username = encodeURI(username);
            	     $.post(url,{username:username},function(data){
            	    	 if(parseInt(data) == 2){
            	    		 $('#user-tip').html('该用户名已经存在');
            	    		 $('#user-tip').show().addClass("err_tips");
            	    		 legaldata.username = 0;
            	    		 return false;
            	    	 }else{
            	    		 $('#user-tip').html('恭喜，该用户名可以使用！').removeClass("err_tips");
            	    		 legaldata.username = 1;
            	    		 return true;
            	    	 }
            	     });
            }

            //验证昵称规则
            function check_nickname(){
            	var nickname=$("#nickname").val();
            	var oldnickname=$("#copynickname").val();
            	
            	nickname = nickname.replace(/(^\s*)|(\s*$)/g,'');
            	oldnickname = oldnickname.replace(/(^\s*)|(\s*$)/g,'');
            	if(nickname == oldnickname ){
            		legaldata.nickname = 1;
            		return true;
            	}else{
            		if(nickname==''){
            			$('#nick-tip').html('请输入昵称');
            			$('#nick-tip').show().addClass("err_tips");
            			legaldata.nickname = 0;
            			return false;
            		}else if(strlen(nickname) > 11 || strlen(nickname) < 4){
            			$('#nick-tip').html('请输入4-11位字符:支持中文、英文、数字、"-"、"_"');
            			$('#nick-tip').show().addClass("err_tips");
            			legaldata.nickname = 0;
            			return false;
            		}else if(new RegExp("^[\u4e00-\u9fa5\\w-]+$").test(nickname) == false) {
            			$('#nick-tip').html('<span>昵称格式错误</span>');
            			$('#nick-tip').show().addClass("err_tips");
            			legaldata.nickname = 0;
            			return false;
            		}else{
            			 nickname = encodeURI(nickname); 
            			 var url = '/userinfoconfirmajax/checkrepetition';
            			 $.post(url,{nickname:nickname},function(data){
            				 if(parseInt(data) == 2){
            					 $('#nick-tip').html('该昵称已存在');
                                 $('#nick-tip').show().addClass("err_tips"); 
                                 legaldata.nickname = 0;
                                 return false;
            				 }else {
            					 $('#nick-tip').html('恭喜，该昵称可以使用！').removeClass("err_tips");
            					 legaldata.nickname = 1;
                                 return true;
            				 }
            			 });
            		}
            	}
           }

            //验证真实姓名
            function check_realname(){
            	 var realname=$("#realname").val();//新名称
            	     realname = realname.replace(/(^\s*)|(\s*$)/g,'');
            	 var oldrealname = $("#copyrealname").val();//旧的名称
            	     oldrealname = oldrealname.replace(/(^\s*)|(\s*$)/g,'');
                if( realname == oldrealname && oldrealname != '' ) {
                    legaldata.realname = 1;
                    return true;
                }else {
                    if (realname == '') {
                        $('#real-tip').show().html('请输入真实姓名').addClass("err_tips");
                        legaldata.realname = 0;
                        return false;
                    } else if (strlen(realname) < 2 || strlen(realname) > 16) {
                        $('#real-tip').show().html('请输入2-16个字符').addClass("err_tips");
                        legaldata.realname = 0;
                        return false;
                    } else if (new RegExp("^[\u4e00-\u9fa5a-zA-Z·\\s]{1,60}$").test(realname) == false) {
                        $('#real-tip').show().html('请输入真实姓名').addClass("err_tips");
                        legaldata.realname = 0;
                        return false;
                    } else {
                        $('#real-tip').html('姓名格式正确！').removeClass("err_tips");
                        legaldata.realname = 1;
                        return true;
                    }
                }
            }

            //验证地址
            function check_address(){
                var province = $("#province").val().replace(/(^\s*)|(\s*$)/g,'');
                var city = $('#city').val().replace(/(^\s*)|(\s*$)/g,'');
                var address = $('#address').val().replace(/(^\s*)|(\s*$)/g,'');


                if( province != '' && city!='' && address!='' ) {
                    $('#province_tip').html('').removeClass("err_tips");
                    return true;
                }else{
                    $('#province_tip').show().html('请输入完整地址').addClass("err_tips");
                    return false;
                }
            }


//            //焦点移至输入框 触发事件
            function hide_note(data){
                if(data == 'user-tip'){
                    $('#user-tip').html('必须为英文字母开头，5位以上英文字母、数字或下划线组成');
                    $('#user-tip').show().removeClass("err_tips");
                }else if(data == 'nick-tip'){
                    $('#nick-tip').html('必须为4-11位字符:支持中文、英文、数字、"-"、"_"');
                    $('#nick-tip').show().removeClass("err_tips");
                }else if(data == 'real-tip'){
                    $('#real-tip').html('2-16个英文或1-8个中文，支持空格、"·"');
                    $('#real-tip').show().removeClass("err_tips");
                }else if(data == 'province_tip'){
                    $('#province_tip').html('请输入完整地址');
                    $('#province_tip').show().removeClass("err_tips");
                }
            }
            //验证座机号码
            function check_phone(){
            	var area_code = $("#area_code").val();
    	    	var fix_phone = $("#phone").val();
    	    	if(area_code =='' && fix_phone =='') {
    	    		$("#phoneTip").html('').removeClass("err_tips");
    	    		return true;
    	    	}
    	    	if(fix_phone == ''){
    	    		$("#area_code").val('');
    	    		$("#phoneTip").html('').removeClass("err_tips");
    	    		return true;
    	    	}
    	    	var result = checkPhone(area_code,fix_phone);
    	    	switch(result){
    	    	  case 1:
    	                $("#phoneTip").html('').removeClass("err_tips");
    	                return true;
    	                break;
    	    	  case 2:
    	    		   $("#phoneTip").html('请填写正确的区号').addClass("err_tips");
    	    		   return false;
    	    		   break;
    	    	  default:
    	    		  $("#phoneTip").html('请填写正确的座机号').addClass("err_tips");
    	    	      return false;
    	    	      break;
    	    	}
            }
            //验证邮编
            function check_postcode(){
            	var postcode = $("#postcode").val().replace(/(^\s*)|(\s*$)/g,'');
            	var expression = new RegExp("^[0-9][0-9]{5,5}$");
            	if(postcode != ''){
            		if(expression.test(postcode) == true){
            			$("#postcode-tip").html('').removeClass("err_tips");
                        return true;
            		}else{
            			$("#postcode-tip").html('请填写正确的邮编').addClass("err_tips");
            			return false;
            		}
            	}else{
        			$("#postcode-tip").html('').removeClass("err_tips");
                    return true;
            	}
            }

            //证件校验
            function check_idefycode(){
            	 var paper_num = $("#paper_num").val();
            	 var oldpaper_num = $("#copyid_card").val();
            	 var paper_type = $("select[name='pspt_type'] option:selected").val();
            	 var oldpaper_type = $("#copypspt_type").val();
                 if((paper_num == oldpaper_num) && (paper_type == oldpaper_type)) {
					 $(".verify_block").hide();
                	 $("#id_tip").html('').removeClass("err_tips");
                	 return true;
                 }else if(paper_num=='') {
					 $(".verify_block").hide();
                	 $("#id_tip").html('请填写正确的证件号码').addClass("err_tips");
                	 return false;
                 }else if(paper_type==1) {
                	 var result = $.TN_checkIdCard(paper_num);
                	 if(result!=15 && result!=18){
					   $(".verify_block").hide();
                       $("#id_tip").html('请填写正确的身份证号码').addClass("err_tips");
                       return false;
                     }else{
						 $(".verify_block").show();
                    	 $("#id_tip").html('').removeClass("err_tips");
                    	 return true;
                     }
                 }else if(paper_type==2){
                	//因私护照
                	 var patrn = /^[A-Za-z0-9]+$/;
                     if(!patrn.exec(paper_num)){
					   $(".verify_block").hide();
                       $("#id_tip").html('请填写正确的护照号码').addClass("err_tips");
                       return false;
                    }else{
					    $(".verify_block").show();
                    	$("#id_tip").html('').removeClass("err_tips");
                    	return true;
                    }
                 }else if(paper_type==4){
                	//港澳通行证
                   var patrn = /^[A-Z][0-9]{8,8}$/;
                   if(!patrn.exec(paper_num)){
				      $(".verify_block").hide();
                      $("#id_tip").html('请填写正确的港澳通行证号码').addClass("err_tips");
                      return false;
                      }else{
				   	  $(".verify_block").show();
                      $("#id_tip").html('').removeClass("err_tips");
                      return true;
                     }
                 }else if(paper_type==3) {
                	 var patrn = /^[0-9]{8}$/;
                	 if(!patrn.exec(paper_num)){
						 $(".verify_block").hide();
                         $("#id_tip").html('请填写正确的军官证号码').addClass("err_tips");
                         return false;
                         }else{
						 $(".verify_block").show();
                         $("#id_tip").html('').removeClass("err_tips");
                         return true;
                        }
                	 
                 }else if(paper_type==7) {
                	 var patrn = /^[a-zA-Z]([0-9]{9})$/;
                	 if(!patrn.exec(paper_num)){
						 $(".verify_block").hide();
                         $("#id_tip").html('请填写正确的台胞证').addClass("err_tips");
                         return false;
                         }else{
						 $(".verify_block").show();
                         $("#id_tip").html('').removeClass("err_tips");
                         return true;
                        }
                	 
                 }else{
                	 var patrn = /^[\w\s]+$/;
                	 if(!patrn.exec(paper_num)){
						 $(".verify_block").hide();
                         $("#id_tip").html('请填写常规的其它证件').addClass("err_tips");
                         return false;
                         }else{
						 $(".verify_block").show();
                         $("#id_tip").html('').removeClass("err_tips");
                         return true;
                        }
                 }
            }
            
            function check_birthday() {
               var sel_year = parseInt($("#sel_year option:selected").val());
               var sel_month = parseInt($("#sel_month option:selected").val());
               var sel_day = parseInt($("#sel_day option:selected").val());
               if((sel_year && sel_month && sel_day) || (!sel_year && !sel_month && !sel_day )) {
            	   $("#birthday_tip").html('').removeClass("err_tips");
            	   return true;
               }else {
            	   $("#birthday_tip").html('请填写完整的生日日期').addClass("err_tips");
            	   return false;
               }
            }
            
            function check_birthplace() {
            	var province = $("#province option:selected").val();
            	var oldprovince = $("#copyprovince").val();
            	if(province == oldprovince) {
            		$("#province_tip").html('').removeClass("err_tips");	
            		return true;
            	}else {
            		if(province == ''){
            			$("#province_tip").html('请选择地址').addClass("err_tips");	
            			return false;
            		}else{
            			$("#province_tip").html('').removeClass("err_tips");
            			return true;
            		}
            		
            	}
            }

			//校验团队验证码
			function check_group(tag) {
				var patrn = /^[a-z0-9]+$/;
				var code = $("#group_id").val();
				var oldcode = $("#copygroup_id").val();
				if((code == oldcode) || code == ''){
					legaldata.group = 1;
					$('#group_tip').html('').removeClass("err_tips");
					return true;
				}else if(!patrn.exec(code)){
					 $('#group_tip').html("请输入数字和字母组成的正确识别码").removeClass("err_tips");
					 legaldata.group = 0;
					 return false;
				}else{
					var url = "/userinfoconfirmajax/checkgroupcode";
					$.post(url,{groupcode:code},function(data){
						if(parseInt(data)==1) {
							$('#group_tip').html('').removeClass("err_tips");
							legaldata.group = 1;
							return true;
						}else if(parseInt(data)==2) {
						   $('#group_tip').html('识别码达到使用次数上限').addClass("err_tips");
						   legaldata.group = 0;
 	                       return false;
						}else if(parseInt(data)==3) {
							$('#group_tip').html('网络异常,请稍后重试').addClass("err_tips");
						    legaldata.group = 0;
	 	                    return false;
							
						}else{
							$('#group_tip').html('输入的团队识别码无效').addClass("err_tips");
							legaldata.group = 0;
							return false;
						}
					});
				}
         }

         (function($){     
          //生日
          $.ms_DatePicker();
          var uyearNow = parseInt(new Date().getFullYear());
          var umonthNow = parseInt(new Date().getMonth()+1);
          var initYear = $("#sel_year option:selected").val(); 
    	  var initMonth = $("#sel_month option:selected").val();
    	  if(initYear == uyearNow) {
    		  $("#sel_month option:gt("+umonthNow+")").css('display','none');
    	  }

          //头像悬浮按钮
             $('#avatar_area').on({'mouseenter': function() {
                 $(this).find('#modifyheader').show();
             },'mouseleave': function() {
                 $(this).find('#modifyheader').hide();
             }});

          $('#sel_year').change(function(){
        	  var uselectYear = $("#sel_year option:selected").val(); 
        	  var uselectMonth = $("#sel_month option:selected").val(); 
        	  if(uselectYear == uyearNow) {
        		  $("#sel_month option:gt("+umonthNow+")").css('display','none');
        		  if(uselectMonth > umonthNow) {
      				$("#sel_month").val(1);
      			 }
        	  }else{
        		  $("#sel_month option").css('display','');
        	  }
          });
          
         })(jQuery);
          
     	//1: 验证通过
     	//2: 区号错误,3~4位数字
     	//3: 座机号错误,7~8位数字
     	function checkPhone(area_code,phone) {
     		if (area_code!= '' || phone!='') {
     			var reg1 = /^\d{3,4}$/;
     			var reg2 =/^\d{7,8}$/;
     			if(!reg1.test(area_code)){
     				return 2;
     			}
     			if(!reg2.test(phone)){
     				return 3;
     			}		
     		}
     		return 1;
     	}
            
            
      function info_submit(){
    	 var r_idefycode = check_idefycode();//证件校验
    	 var r_birthday = check_birthday();//校验生日
    	 var r_birthplace = check_birthplace();//校验出生地
    	 var r_postcode = check_postcode();//邮编校验
    	 var r_phone = check_phone();
          var r_address = check_address();
    	 if(r_idefycode && r_birthday && r_postcode && r_birthplace && r_phone && r_address && legaldata.realname &&legaldata.nickname && legaldata.username && legaldata.group){
             loadingStart();
             var csrf_token = $("#csrf_token").val().replace(/(^\s*)|(\s*$)/g,'');
    		 var s_nickname = $("#nickname").val().replace(/(^\s*)|(\s*$)/g,'');
    		 var s_username = $("#username").val().replace(/(^\s*)|(\s*$)/g,'');
    		 var s_realname = $("#realname").val().replace(/(^\s*)|(\s*$)/g,'');
    		 var s_papertype = $("select[name='pspt_type'] option:selected").val();
    		 var s_papernum = $("#paper_num").val().replace(/(^\s*)|(\s*$)/g,'');
    		 var s_sex = $("input[name='sex']:checked").val();
    		 var s_year = $("#sel_year").val();
    		 var s_month = $('#sel_month').val();
    		 var s_day = $('#sel_day').val();
    		 var s_province = $("#province").val().replace(/(^\s*)|(\s*$)/g,'');
    		 var s_city = $('#city').val().replace(/(^\s*)|(\s*$)/g,'');
    		 var s_address = $('#address').val().replace(/(^\s*)|(\s*$)/g,'');
    		 var s_groupid = $('#group_id').val().replace(/(^\s*)|(\s*$)/g,'');
    		 var s_postcode = $("#postcode").val().replace(/(^\s*)|(\s*$)/g,'');
    		 var s_oldgroupid = $("#copygroup_id").val().replace(/(^\s*)|(\s*$)/g,'');
    		 var s_areacode = $('#area_code').val().replace(/(^\s*)|(\s*$)/g,'');
    		 var s_phone = $('#phone').val().replace(/(^\s*)|(\s*$)/g,'');
             //手机验证码
             var s_code = $('#code').val().replace(/(^\s*)|(\s*$)/g,'');
    		 
    		 var url = '/userinfoconfirmajax/edituserinfo';
    		 $.post(
                 url,
                 {
                     'csrf_token':csrf_token,
                     'nickname':s_nickname,
                     'username':s_username,
                     'realname':s_realname,
                     'papertype':s_papertype,
                     'papernum':s_papernum,
                     'sex':s_sex,
                     'year':s_year,
                     'month':s_month,
                     'day':s_day,
                     'province':s_province,
                     'city':s_city,
                     'address':s_address,
                     'postcode':s_postcode,
                     'groupid':s_groupid,
                     'oldgroupid':s_oldgroupid,
                     'areacode':s_areacode,
                     'phone':s_phone,
                     'code':s_code
                 },
                 function(data){
                     loadingEnd();
                     switch(parseInt(data)){
                         case 0:$('#resultTip').html('您的操作存在风险').addClass('err_tips');break;
                         case 1:$('#resultTip').html('昵称异常').addClass('err_tips');break;
                         case 2:$('#resultTip').html('昵称已经被注册').addClass('err_tips');break;
                         case 3:$('#resultTip').html('用户名异常').addClass('err_tips');break;
                         case 4:$('#resultTip').html('用户名重复').addClass('err_tips');break;
                         case 5:$('#resultTip').html('真实姓名异常').addClass('err_tips');break;
                         case 6:$('#resultTip').html('证件号码').addClass('err_tips');break;
                         case 7:$('#resultTip').html('邮编错误').addClass('err_tips');break;
                         case 8:$('#resultTip').html('关联团队识别码错误').addClass('err_tips');break;
                         case 9:$('#resultTip').html('座机号码错误').addClass('err_tips');break;
                         case 10:$('#resultTip').html('地址异常').addClass('err_tips');break;
                         case 11:$('#resultTip').html('证件号码修改，短信验证码错误').addClass('err_tips');break;
                         default:location.reload();break;
                     }
                 }
             );
    	 }
      }

    function info_cancel(){
        var s_nickname = $("#nickname").val().replace(/(^\s*)|(\s*$)/g,'');
        var o_nickname = $("#copynickname").val().replace(/(^\s*)|(\s*$)/g,'');
        var s_username = $("#username").val().replace(/(^\s*)|(\s*$)/g,'');
        var o_username = $("#copyusername").val().replace(/(^\s*)|(\s*$)/g,'');
        var s_realname = $("#realname").val().replace(/(^\s*)|(\s*$)/g,'');
        var o_realname = $("#copyrealname").val().replace(/(^\s*)|(\s*$)/g,'');

        var s_papertype = $("select[name='pspt_type'] option:selected").val();
        var o_papertype = $("#copypspt_type").val();
        var s_papernum = $("#paper_num").val().replace(/(^\s*)|(\s*$)/g,'');
        var o_papernum = $("#copyid_card").val().replace(/(^\s*)|(\s*$)/g,'');
        var s_sex = $("input[name='sex']:checked").val();
        var o_sex = $("#copysex").val();
        var s_year = $("#sel_year").val();
        var o_year = $("#copyyear").val();
        var s_month = $('#sel_month').val();
        var o_month = parseInt($('#copymonth').val());
        var s_day = $('#sel_day').val();
        var o_day = parseInt($('#copyday').val());
        var s_province = $("#province").val().replace(/(^\s*)|(\s*$)/g,'');
        var o_province = $("#copyprovince").val().replace(/(^\s*)|(\s*$)/g,'');
        var s_city = $('#city').val();
        var o_city = $('#copycity').val();
        var s_address = $('#address').val().replace(/(^\s*)|(\s*$)/g,'');
        var o_address = $('#copyaddress').val().replace(/(^\s*)|(\s*$)/g,'');
        var s_groupid = $('#group_id').val().replace(/(^\s*)|(\s*$)/g,'');
        var o_groupid = $('#copyid_code').val().replace(/(^\s*)|(\s*$)/g,'');
        var s_postcode = $("#postcode").val().replace(/(^\s*)|(\s*$)/g,'');
        var o_postcode = $("#copypostcode").val().replace(/(^\s*)|(\s*$)/g,'');
        var s_areacode = $('#area_code').val().replace(/(^\s*)|(\s*$)/g,'');
        var o_areacode = $('#copyarea_code').val().replace(/(^\s*)|(\s*$)/g,'');
        var s_phone = $('#phone').val().replace(/(^\s*)|(\s*$)/g,'');
        var o_phone = $('#copyfix_phone').val().replace(/(^\s*)|(\s*$)/g,'');

        var tag = 1;

        if(s_nickname != o_nickname){
            tag = 0;
        }else if(s_username!=o_username){
            tag = 0;
        }else if(s_realname != o_realname){
            tag = 0;
        }else if(s_papertype != o_papertype){
            tag = 0;
        }else if(s_papernum != o_papernum){
            tag = 0;
        }else if(s_sex != o_sex){
            tag = 0;
        }else if(s_year != o_year){
            tag = 0;
        }else if(s_month != o_month){
            tag = 0;
        }else if(s_day != o_day){
            tag = 0;
        }else if(s_province !=  o_province){
            tag = 0;
        }else if(s_city !=  o_city){
            tag = 0;
        }else if(s_address != o_address){
            tag = 0;
        }else if(s_groupid != o_groupid){
            tag = 0;
        }else if(s_postcode !=  o_postcode){
            tag = 0;
         }else if(s_areacode != o_areacode){
            tag = 0;
        }else if(s_phone != o_phone){
            tag = 0;
        }

        if(!tag){
            cancelMsg();
        }else{
            $('#editBtn').css('display','block');
            $("#saveBtn").css("display","none");
            $("#cancelBtn").css("display","none");
            $(".show_item").removeClass("hidden");
            $(".write_item").addClass("hidden");
        }
    }

    function cancelMsg(){
        $.layer({
            type: 1,
            title: '提示',
            btns: 2,
            btn: ['否', '是'],
            area: ['460px', '250px'],
            page: {html: '<div class="del_pop_box"><span class="pop_tip_icon"></span><p class="p1">放弃已编辑内容？</p></div>'},
            no: function () {
                window.location.href='/userinfoconfirm/';
            }
        });
    }



