function isNumber(evt) {
    evt = (evt) ? evt : window.event;
    var charCode = (evt.which) ? evt.which : evt.keyCode;
    if (charCode > 31 && (charCode < 48 || charCode > 57)) {
        return false;
    }
    return true;
}

function validateForm(){
    let cname = document.forms['reg_form']['cat_name'].value;
    if(cname.length>20){
        
        alert("Category name length cannot exceed 20 characters.");
        return false;
    }

    let cindex = document.forms['reg_form']['cat_index'].value;
    if(cindex.length>4){
        
        alert("Category index length cannot exceed 4 digits.");
        return false;
    }

}