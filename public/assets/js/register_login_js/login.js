
// +++++++++++++++ When Click on "lock icon" +++++++++++++
var lockIcon = document.getElementById("lockId"),
    passwordEl = document.getElementById("passId");

lockIcon.addEventListener("click", function(){
    if(  lockIcon.getAttribute("class") == "fa fa-eye" ) 
    {
        passwordEl.setAttribute('type','text');
        lockIcon.setAttribute("class","fa fa-eye-slash");
    }
    else
    {
        passwordEl.setAttribute('type','password'); 
        lockIcon.setAttribute("class","fa fa-eye");
    }    
});
