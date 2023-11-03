function validateForm(){

    let pdesc = document.forms['reg_form']['prod_desc'].value;
    if(pdesc.length>75){
        
        alert("Product description length cannot exceed 75 characters.");
        return false;
    }
}