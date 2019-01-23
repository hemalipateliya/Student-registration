
        var name,lname,sid,email,slot;


        
        
        function validate(e)
    {
            var d =/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
            
            sid=document.querySelector("#sid").value;
            name=document.querySelector("#name").value;
            lname=document.querySelector("#lname").value;
            email=document.querySelector("#email").value;
            slot=document.querySelector("#slot").value;
    
           
            if(name=="" || name.length > 20 || lname=="" || lname.length > 20  )
                {
                    //e.preventDefault();
                    alert("Enter valid name and last name");
                    return;
                }
            if(isNaN(sid) || sid=="")
                {
                    
                    alert("Enter valid SID");
                    return;
                }
            
        
            if(!d.test(email) || email=="")
            {
	               alert("enter perfect email address");
	               return;
            }
        document.registerForm.submit();
            
           
    }


    function reset()
{
    
    document.getElementById("registration-from").reset();
}
        

    
        