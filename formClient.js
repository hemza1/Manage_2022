$(document).ready(function(){
   
    $('.button').on('click', function (e) {
    var $btn = $(this),
        $step = $btn.parents('.modal-body'),
        stepIndex = $step.index(),
        $pag = $('.modal-header span').eq(stepIndex);
    var resume = $("#resume");

    resume.validate({
        rules: {
            fname: {
                required: true,
            },
            lname: {
                required: true,
            },
            address: {
                required: true,
                minlength: 10,
            },
            city: {
                required: true,
            },
            pin:{
                required: true,
                minlength: 6,
                maxlength: 6,
            },
            state: {
                required: true,
            },
            phone: {
                required: true,
            },
            email: {
                required: true,
                email: true,
            },
            sname_10: {
                required: true,
            },
            board_10: {
                required: true,
            },
            percentage_10: {
                required: true,
            },
            employer: {
                required: true,
            },
            job: {
                required: true,
            },
            function: {
                required: true,
            },
            address1: {
                required: true,
                minlength: 10,
            },
            city1: {
                required: true,
            },
            pin1:{
                required: true,
                minlength: 6,
                maxlength: 6,
            },
            state1: {
                required: true,
            },
            startyear: {
                required: true,
                maxlength:4,
            },
            endyear: {
                required: true,
                maxlength:4,
            },
            skill1: {
                required: true,
            },
            skill2: {
                required: true,
            },
            lang: {
                required: true,
            },
            hobby: {
                required: true,
            },
            award: {
                required: true,
            },
            passion: {
                required: true,
            },
            goal: {
                required: true,
            },
            
        },
        messages: {
            fname: {
                required: "First name required",
            },
            lname: {
                required: "Last name required",
            },
            address: {
                required: "Address required",
                minlength: "Atleast 10 characters required",
            },
            city: {
                required: "City name required",
            },
            pin:{
                required: "PIN number required",
                maxlength: "Please enter a valid pincode",
                minlength: "Please enter a valid pincode",
            },
            state: {
                required: "State required",
            },
            phone: {
                required: "Phone number required",
            },
            email: {
                required: "Email required",
                email: "Please enter a valid email",
            },
            sname_10: {
                required: "School name required",
            },
            board_10: {
                required: "Board required",
            },
            percentage_10: {
                required: "CGPA / Percentage required",
            },
            employer: {
                required: "Employer Name required",
            },
            job: {
                required: "Job Title required",
            },
            function: {
                required: "Functional Field required",
            },
            address1: {
                required: "Address required",
                minlength: "Atleast 10 characters required",
            },
            city1: {
                required: "City required",
            },
            pin1:{
                required: "Pin required",
                maxlength: "Please enter a valid pincode",
                minlength: "Please enter a valid pincode",
            },
            state1: {
                required: "State required ",
            },
            startyear: {
                required: "Start year required",
                maxlength:"Please enter a valid year",
            },
            endyear: {
                required: "End year is required",
                maxlength:"Please enter a valid year",
            },
            skill1: {
                required: "Skill 1 required",
            },
            skill1: {
                required: "Skill 2 required",
            },
            lang: {
                required: "Languages required",
            },
            hobby: {
                required: "Interests / Hobbies required",
            },
            award: {
                required: "Awards and Achievements required",
            },
            passion: {
                required: "Passion required",
            },
            goal: {
                required: "Goal required",
            },
        },	
    });
    
    
    if(stepIndex === 0 || stepIndex === 1 )
    { 
        step1($step, $pag);
        
    }
    else if(stepIndex === 2){
        if (resume.valid() === true){
            step1($step, $pag); 
            next_fs= $("#educational");
            next_fs.show();
        }
    }
    else if(stepIndex === 3){
        if (resume.valid() === true){
            step1($step, $pag); 
            next_fs= $("#experience");
            next_fs.show(); 
        }
    }
    else if(stepIndex === 4){
        if (resume.valid() === true){
            step1($step, $pag); 
            next_fs= $("#skill");
            next_fs.show(); 
        }
    }
    else if(stepIndex === 5){
        if (resume.valid() === true){
            step1($step, $pag); 
            next_fs= $("#awards");
            next_fs.show(); 
        }
    }
    else if(stepIndex === 6){
        if (resume.valid() === true){
            step1($step, $pag); 
            next_fs= $("#accounts");
            next_fs.show(); 
        }   
    }
    else if(stepIndex === 7){
        if (resume.valid() === true){
            step1($step, $pag); 
            next_fs= $("#skills");
            next_fs.show(); 
        }   
    }
    else if(stepIndex === 8){
        if (resume.valid() === true){
            step1($step, $pag); 
            next_fs= $("#submission");
            next_fs.show(); 
        }   
    }
    else if(stepIndex === 9){
        step1($step, $pag);
    }
    else 
        { 
            
            var options= {
                method : "post",
                url : "resume.php",
                success: step9($step, $pag)
            }
            $('#resume').ajaxForm(options); 
            //step9($step, $pag);
         }
    
    });

    //next button
    function step1($step, $pag){
    console.log('step1');

    // animate the step out
    $step.addClass('animate-out');
    
    // animate the step in
    setTimeout(function(){
        $step.removeClass('animate-out is-showing')
            .next().addClass('animate-in');
        $pag.removeClass('is-active')
            .next().addClass('is-active');
    }, 1200);
    
    // after the animation, adjust the classes
    setTimeout(function(){
        $step.next().removeClass('animate-in')
            .addClass('is-showing');
        
    }, 1200);
    
    }

    function step9($step, $pag){
    console.log('9');

    // animate the step out
    $step.parents('.modal-wrap').addClass('animate-up');

    }

    //back button 
    $('.button2').click(function(){
    var $btn2 = $(this),
        $step2 = $btn2.parents('.modal-body'),
        stepIndex2 = $step2.index(),
        $pag2 = $('.modal-header span').eq(stepIndex2);
        elem = document.getElementsByClassName('modal-body');
     step1_2($step2, $pag2);
    });

    function step1_2($step2, $pag2){
    console.log('step1_2');
    
    // animate the step out
    $step2.addClass('animate-out');
    
    // animate the step in
    setTimeout(function(){
        $step2.removeClass('animate-out is-showing')
            .prev().addClass('animate-in');
        $pag2.removeClass('is-active')
            .prev().addClass('is-active');
    }, 1200);
    
    
    // after the animation, adjust the classes
    setTimeout(function(){
        $step2.prev().removeClass('animate-in')
            .addClass('is-showing');
        
    }, 1200);
    }
    
    $('#educational_entry').on('click',function(e){
        // event.preventDefault();
        function onAddEntry(){
            var formData = readFormData();
            insertNewRecord(formData);
            resetForm();
            
        }
        
        onAddEntry();
        function readFormData() {
            var formData = {};
            formData["Institution"] = document.getElementById("Institution").value;
            formData["Degree_Class"] = document.getElementById("Degree_Class").value;
            formData["Percentage_Cgpa"] = document.getElementById("Percentage_Cgpa").value;
            formData["Passout"] = document.getElementById("Passout").value;
            return formData;
        }
        
        function insertNewRecord(data){
            var table = document.getElementById("educational_list").getElementsByTagName('tbody')[0];
            var newRow = table.insertRow(table.length);
            var cell1 = newRow.insertCell(0);
            cell1.innerHTML = data.Institution;
            var cell2 = newRow.insertCell(1);
            cell2.innerHTML = data.Degree_Class;
            var cell3 = newRow.insertCell(2);
            cell3.innerHTML = data.Percentage_Cgpa;
            var cell4 = newRow.insertCell(3);
            cell4.innerHTML = data.Passout;
            var cell5 = newRow.insertCell(4);
            cell5.innerHTML = '<a id="educational_edit" style="color:green;">Edit</a>' + ' ' + '<a style="color:red;">Delete</a>';
        }
        
        function onEdit(){
            alert("working");
        }

        function resetForm(){
            document.getElementById("Institution").value = " ";
            document.getElementById("Degree_Class").value = " ";
            document.getElementById("Percentage_Cgpa").value = " ";
            document.getElementById("Passout").value = " ";
        }   
      
        $('#educational_edit').on('click',function(){
        alert("working");
    });
    });  
     
});


