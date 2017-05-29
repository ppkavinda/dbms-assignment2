function validatePassword() {
    if(document.getElementById("sign-password").value != document.getElementById("sign-re-password").value){
        alert("Passwords not matched!.")
        return false;
    }else{
        return true;
    }
}
