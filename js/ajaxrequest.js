function addStu(){
    var stuname = $("#stuname").val();
    var stuemail = $("#stuemail").val();
    var stupass = $("#stupass").val();

    console.log(stuname);
    console.log(stuemail);
    console.log(stupass);
    
    $.ajax({
        url: '../addstudent.php',
        method: 'POST',
        data: {
            stusignup:"stusignup",
            stuname: stuname,
            stuemail: stuemail,
            stupass: stupass,
        },
        success: function(data){
            console.log(data);
        }
    });
}
