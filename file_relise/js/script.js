jQuery('document').ready(
function(){

	jQuery('#sort_autor, #sort_name_book, #sort_pages, #sort_year, #sort_publication, #sort_date').click(function() {
		//alert(this.id);
		// if(jQuery(this).attr("src")=="img/sort_asc.ico"){ 
		// 	//location.reload();//location.href=location.pathname+"?action=<?=$_GET['action']?>"+"&sort="+jQuery(this).attr("id");
		// 	jQuery('.sort').attr("src","img/sort_asc.ico");
		// 	jQuery(this).attr("src","img/sort_desc.ico");
		// }
		// else{
		// 	jQuery('.sort').attr("src","img/sort_asc.ico");
		// }
		if(jQuery('#sort').attr('value')==jQuery(this).attr('id'))
		{
			if(jQuery('#type_sort').attr("value")=="SORT_DESK")
				jQuery('#type_sort').attr("value","SORT_ASK")
			else jQuery('#type_sort').attr("value","SORT_DESK");
		}else
		{
			jQuery('#sort').attr('value',jQuery(this).attr('id'));
			jQuery('#type_sort').attr("value","SORT_ASK");
		}
		jQuery('#search_button').click();
	});
if(jQuery('#'+jQuery('#sort').attr('value')).attr("src")=="img/sort_asc.ico"&&jQuery('#type_sort').attr('value')=='SORT_DESK'){ 
			//location.reload();//location.href=location.pathname+"?action=<?=$_GET['action']?>"+"&sort="+jQuery(this).attr("id");
			jQuery('.sort').attr("src","img/sort_asc.ico");
			jQuery('#'+jQuery('#sort').attr('value')).attr("src","img/sort_desc.ico");
		}
})


// jQuery('input.add_phone').hide();
// 				jQuery( "input[src='images/add.png']").click(function() {
// 	  					var id_people=this.id;
// 	  					var this_ob=this;
// 							var phone;
// 							jQuery( this ).hide();
// 							jQuery('input.add_phone[name="'+id_people+'"]').show();
// 							jQuery('input.add_phone[name="'+id_people+'"]').focus();
// 								jQuery('input.add_phone').on('keyup', function(e) {
// 	    						if (e.keyCode === 13) {
// 	    							phone = jQuery('input.add_phone[name='+id_people+']').val();
// 	    							if (phone>380999999999||phone<380000000000){
// 	    								jQuery('input.add_phone[name="'+id_people+'"]').val('');
// 	    								jQuery('input.add_phone[name="'+id_people+'"]').attr('placeholder','Формат: +380XXXXXXXXX');
// 	    							}
// 											else if(!jQuery.isNumeric(phone)){
// 												jQuery('input.add_phone[name='+id_people+']').val('');
// 	    									jQuery('input.add_phone[name="'+id_people+'"]').attr('placeholder','Тільки цифри!');
// 											}
// 											else{
// 												jQuery.ajax({
// 													url:'ajax/phone.php',	
// 													type: 'POST',
// 													cache: false,
// 													data:{'phone':phone, 'id_people':id_people},
// 													dataType: 'html',
// 													success: function (data){
// 														jQuery('input.add_phone').blur();
// 														jQuery(this_ob).prepend(phone);
// 														location.reload();
// 												//alert(data);
// 													}
// 												});
// 											}
// 	    						}
// 								});
// 								jQuery('input.add_phone').blur(function() {
// 												jQuery(this).hide();
// 												jQuery( "input[src='images/add.png']").show();
// 												jQuery(this).val('');
// 	    									jQuery(this).attr('placeholder','Додати номер телефону');
// 								});
// 		});
// 	jQuery('#button_send').click(function(){
// 			jQuery('#messageShow').hide();
// 			var first_name=jQuery('#first_name').val();
// 			var second_name=jQuery('#second_name').val();
// 			var phone=jQuery('#phone').val();
// 			var fail="";
// 			if(first_name.length==0) fail='Поле "Ім\'я" не може бути порожнім.';
// 				else if (second_name.length==0) fail='Поле "Прізвище" не може бути порожнім.';
// 					else if (phone>380999999999||phone<380000000000) fail='Будь ласка введіть номер у форматі: +380XXXXXXXXX';
// 						else if(!jQuery.isNumeric(phone))fail='В полі "Номер телефону" тільки цифри!';
// 			if(fail!=""){
// 			jQuery('#messageShow').html(fail);
// 			jQuery('#messageShow').show();
// 			return false;
// 			}
// 			jQuery.ajax({
// 				url:'ajax/add_new.php',	
// 				type: 'POST',
// 				cache: false,
// 				data:{'first_name':first_name,'second_name':second_name,'phone':phone},
// 				dataType: 'html',
// 				success: function (data){
// 					jQuery('#first_name').val("");
// 					jQuery('#second_name').val("");
// 					jQuery('#phone').val("");	
// 					location.reload();	
// 					//alert(data);
// 				}
// 			});

			
// 	});	

// 			jQuery('#first_name, #second_name, #phone').on('keyup', function(e) {
//    			if (e.keyCode === 13) {
//         	jQuery('#button_send').click();
//     		}
// 			});
// 				jQuery(".delete_phone").click(function() {
// 					var id_phone=this.id;
// 					swal({
// 							title: "Ви дійсно хочете видалити номер?",
// 							text: "Дані не можна буде відновити!",
// 							type: "warning",
// 							showCancelButton: true,
// 							confirmButtonColor: "#DD6B55",
// 							cancelButtonText: "Ой, ні!",
// 							confirmButtonText: "Так!",
// 							closeOnConfirm: false,
// 							html: false
// 							}, function(){
// 								jQuery.ajax({
// 				url:'ajax/delete_phone.php',	
// 				type: 'POST',
// 				cache: false,
// 				data:{'id_phone':id_phone},
// 				dataType: 'html',
// 				success: function (data){
// 								swal({
// 							title: "Видалено!",
// 							text: "Номер успішно видалений",
// 							type: "success",
// 							confirmButtonText: "Добре!",
// 							});
// 					location.reload();
// 							}
// 						});
// 						});
// 		});

// 				jQuery(".delete_people").click(function() {

// 								var id_people=this.name;
// 					swal({
// 							title: "Ви дійсно хочете видалити контакт?",
// 							text: "Дані не можна буде відновити!",
// 							type: "warning",
// 							showCancelButton: true,
// 							confirmButtonColor: "#DD6B55",
// 							cancelButtonText: "Ой, ні!",
// 							confirmButtonText: "Так!",
// 							closeOnConfirm: false,
// 							html: false
// 							}, function(){
// 			jQuery.ajax({
// 				url:'ajax/delete_people.php',	
// 				type: 'POST',
// 				cache: false,
// 				data:{'id_people':id_people},
// 				dataType: 'html',
// 				success: function (data){
// 					swal({
// 							title: "Видалено!",
// 							text: "Контакт успішно видалений",
// 							type: "success",
// 							confirmButtonText: "Добре!",
// 							});
// 					location.reload();
// 				}
// 			});
// 						});
// 		});