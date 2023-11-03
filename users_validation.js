
function isNumber(evt) {
    evt = (evt) ? evt : window.event;
    var charCode = (evt.which) ? evt.which : evt.keyCode;
    if (charCode > 31 && (charCode < 48 || charCode > 57)) {
        return false;
    }
    return true;
}

  function validateForm()
  {
    let num = document.forms['reg_form']['number'].value;
    let y=num.toString();
    if (y.length!=10){
        alert("Phone number must contain exactly 10 digits.");
     
      return false;
    }

    let fname = document.forms['reg_form']['first_name'].value;
    if(fname.length>50){
        
        alert("First name length cannot exceed 50 characters.");
        return false;
    }
    else if(fname=''){
        
        alert("First name must contain atleast 1 letter.");
        return false;
    }

    let lname = document.forms['reg_form']['last_name'].value;
    if(lname.length>10){
        alert("Last name length cannot exceed 10 characters.");
        return false;
    }
    else if(lname=''){
        alert("Last name must contain atleast 1 letter.");
        return false;
    }

    let pcode = document.forms['reg_form']['pincode'].value;
    if(pcode.length!=6){
        alert("Pincode must contain exactly 6 digits.");
        return false;
    }

    
    console.log(document.forms['reg_form']['profile_picture']);

    let input_file=document.forms['reg_form']['profile_picture'].value;
    let all_ext = /(\.jpg|\.jpeg|\.png)$/i;
    if(!all_ext.exec(input_file)){
        alert("Profile picture file format must be 'jpg', 'jpeg' or 'png'");
        return false;
    }

    const fileInput=document.getElementById('profile_picture');
    const fileSize=fileInput.files[0].size;
    const maxSize=1024*1024;

    if(fileSize>maxSize){
        alert('File size must be less than 1 MB.');
        return false;
    }
        
    
  }

  
  
