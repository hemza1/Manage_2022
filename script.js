var email=document.registration.email;
var emailer=document.getElementsByClassName('email')
var password=document.registration.password;
var firstname=document.registration.username;
var lastname=document.registration.lastname;
var checked=document.getElementsByClassName('check1');
var erreurmail=document.getElementById('nameErrmail');
var erreurpass=document.getElementById('nameErrpass');
var erreurfname=document.getElementById('nameErrfname');
var erreurlname=document.getElementById('nameErrlname');
var erreurcheck=document.getElementsById('nameErrcheck');
var paswd=  /^(?=.*[0-9])(?=.*[!@#$%^&*])[a-zA-Z0-9!@#$%^&*]{7,15}$/; // regex for the password validation
var input=document.getElementsByTagName('input'); 
function valider(){
   erreurmail.innerHTML="";
   erreurpass.innerHTML="";
   erreurfname.innerHTML="";
   erreurlname.innerHTML="";
   if(email.value=='' ){
    erreurmail.innerHTML+="*Please fill the missing email field<br>";
    
   }
   if(password.value==''){
    erreurpass.innerHTML+="*Please fill the missing password field<br>";
   }
   if(firstname.value==''){
    erreurfname.innerHTML+="*Please fill the missing first name field<br>";
   }
   if(lastname.value==''){
    erreurlname.innerHTML+="*Please fill the missing last name field<br>";

   }
   if(password.value.length<6){
  erreurpass.innerHTML+="* At least 6 characters in password's length<br>";
    
}
// you may add more here
  

}