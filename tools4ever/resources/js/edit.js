window.edit_product_mode = function(event,form_id){
event.preventDefault();
// Select first child element:

document.getElementById(form_id+"_name_text").className = "hide";
document.getElementById(form_id+"_name_input").className = "";
document.getElementById(form_id+"_type_text").className = "hide";
document.getElementById(form_id+"_type_input").className = "";
document.getElementById(form_id+"_manufacturer_text").className = "hide";
document.getElementById(form_id+"_manufacturer_input").className = "";
document.getElementById(form_id+"_edit_button").className = "hide";
document.getElementById(form_id+"_confirm_button").className = "";
}

window.confirm_edit = function(form_id){
document.getElementById(form_id).submit();
}
