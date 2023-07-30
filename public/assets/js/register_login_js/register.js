
// +++++++++++++++ When Click on "lock icon" +++++++++++++
var lockIcon = document.getElementById("lockId"),
    lockIcon2 = document.getElementById("lockId2"),
    passwordEl = document.getElementById("passId"),
    rePasswordEl = document.getElementById("rePassId");
/* ++++++++++++++++++ Password inputfield : lockIcon +++++++++++++++++ */
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
/* ++++++++++++++++++ Re-Password inputfield : lockIcon2 +++++++++++++++++ */
lockIcon2.addEventListener("click", function(){
    if( lockIcon2.getAttribute("class") == "fa fa-eye" )
    {
        rePasswordEl.setAttribute('type','text');
        lockIcon2.setAttribute("class","fa fa-eye-slash");
    }
    else
    {
        rePasswordEl.setAttribute('type','password');
        lockIcon2.setAttribute("class","fa fa-eye");
    }
});
