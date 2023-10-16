$(document).ready(function () {
    // Check If Email Already Exists
    $("#stuemail").on("keypress blur", function () {
        var reg = /^[A-Za-z0-9._%+-]+@[A-Za-z0-9.-]+\.[A-Za-z]{2,}$/;
        var stuemail = $("#stuemail").val();
        $.ajax({
            url: 'addstudent.php',
            method: 'POST',
            data: {
                checkemail: "checkemail",
                stuemail: stuemail,
            },
            success: function (data) {
                // console.log(data);
                if (data != 0) {
                    $("#statusMsg2").html("<small style='color:red;'>Email Already Used! </small>");
                    $("#stusignupbtn").attr("disabled", true);

                } else if (data == 0 && reg.test(stuemail)) {
                    $("#statusMsg2").html("<small style='color:green;'>This email can be used! </small>");
                    $("#stusignupbtn").attr("disabled", false);
                } else if (!reg.test(stuemail)) {
                    $("#statusMsg2").html("<small style='color:red;'>Please Enter Valid Email! e.g IbtisamRajpoot@gmail.com  </small>");
                    $("#stusignupbtn").attr("disabled", true);
                }
                if (stuemail=="") {
                    $("#statusMsg2").html("<small style='color:red;'>Email cannot be empty! </small>");
                    $("#stusignupbtn").attr("disabled", true);
                }
            }
        })
    })
})


// Code for register student 
function addStu() {
    var reg = /^[A-Za-z0-9._%+-]+@[A-Za-z0-9.-]+\.[A-Za-z]{2,}$/;
    var stuname = $("#stuname").val();
    var stuemail = $("#stuemail").val();
    var stupass = $("#stupass").val();

    // console.log(stuname);console.log(stuemail);console.log(stupass);

    // Checking Form Fields on Form Submission
    if (stuname.trim() == "") {
        $("#statusMsg1").html("<small style='color:red;'>Please Enter Name ! </small>");
        $("#stuname").focus();
        return false;
    } else if (stuemail.trim() == "") {
        $("#statusMsg2").html("<small style='color:red;'>Please Enter Email ! </small>");
        $("#stuemail").focus();
        return false;
    } else if (stuemail.trim() != "" && !reg.test(stuemail)) {
        $("#statusMsg2").html("<small style='color:red;'>Please Enter Valid Email ! e.g IbtisamRajpoot@gmail.com </small>");
        $("#stuemail").focus();
        return false;
    }
    else if (stupass.trim() == "") {
        $("#statusMsg3").html("<small style='color:red;'>Please Enter Password ! </small>");
        $("#stupass").focus();
        return false;
    }
    else {

        $.ajax({
            url: 'addstudent.php',
            method: 'POST',
            dataType: "json",
            data: {
                stusignup: "stusignup",
                stuname: stuname,
                stuemail: stuemail,
                stupass: stupass,
            },
            success: function (data) {
                console.log(data);
                if (data == "OK") {
                    $("#successMsg").html("<span class='alert alert-success'>Registration Successful ! </span>");
                    clearStuRegField();
                }
                else if (data == "FAILED") {
                    $("#successMsg").html("<span class='alert alert-danger'>Unable to Register ! </span>");
                }
            }
        });

    }
}

// Empty All the Fields of Registration Form
function clearStuRegField() {
    $("#stu_reg_form").trigger("reset");
    $("#statusMsg1").html("");
    $("#statusMsg2").html("");
    $("#statusMsg3").html("");
}

// Ajax Call for Student Login Verification 
function checkStuLogin() {
    // console.log("Login Button Clicked");
    var stuLogemail=$("#stuLogemail").val();
    var stuLogpass=$("#stuLogpass").val();
    $.ajax({
        url: 'addstudent.php',
        method: 'POST',
        data:{

            checkLogemail:"checkLogemail",
            stuLogemail:stuLogemail,
            stuLogpass:stuLogpass,
            

        },success :function (data) {
            // console.log(data);
            if (data==0) {
                $("#statusLogMsg").html("<small class='alert alert-danger'>Invalid Email or password !</small>");
            }
            else if (data==1) {
                $("#statusLogMsg").html("<div class='spinner-border text-success' role=''status></div>");
                setTimeout(() => {
                    window.location.href="index.php";
                }, 1000);
            }
        }
    })

}

// Empty All the Fields of Login Form
function clearStuLoginField() {
    $("#stu_login_form").trigger("reset");
    $("#statusLogMsg").html("");
   
}