// Ajax Call for Admin Login Verification 
function checkAdminLogin() {
    // console.log("Login Button Clicked");
    var adminLogemail = $("#adminLogemail").val();
    var adminLogpass = $("#adminLogpass").val();
    $.ajax({
        url: 'admin.php',
        method: 'POST',
        data: {

            checkLogemail: "checkLogemail",
            adminLogemail: adminLogemail,
            adminLogpass: adminLogpass,


        }, success: function (data) {
            // console.log(data);
            if (data == 0) {
                $("#statusAdminLogMsg").html("<small class='alert alert-danger'>Invalid Email or password !</small>");
            }
            else if (data == 1) {
                $("#statusAdminLogMsg").html("<small class='alert alert-success'>Login Successful</small>");
                setTimeout(() => {
                    window.location.href = "adminDashboard.php";
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