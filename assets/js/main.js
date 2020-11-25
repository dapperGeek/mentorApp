function registerUser(){
    let level = $('#user_level').val();
    let name = $('#name').val();
    let username = $('#username').val();
    let password = $('#password').val();

    // alert(level);

    if (!isEmptyOrSpaces(username) && !isEmptyOrSpaces(password))
    {
        console.log(password);
        $.ajax({
            type: 'POST',
            url:'includes/registerController.php',
            data: {
                'registerUser' : 1,
                'name' : name,
                'username' : username,
                'level' : level,
                'password' : password
            },
            success: function (data) {
                // console.log(data);
                let message = data === true ? 'Registration successful' : 'Registration failed';
            }
        })
    }
    else {
        console.log('Fill all fields');
    }
}

function isEmptyOrSpaces(str){
    return str === null || str.match(/^ *$/) !== null;
}