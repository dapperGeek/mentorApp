// User registration
function registerUser(){
    let level = $('#user_level').val();
    let name = $('#name').val();
    let username = $('#username').val();
    let password = $('#password').val();

    // console.log(level);

    if (!isEmptyOrSpaces(username) && !isEmptyOrSpaces(password))
    {
        // console.log(password);
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

                let result = JSON.parse(data);
                console.log(data);

                if (result.success)
                {
                    let url = '';

                    if (parseInt(level) === 1 && parseInt(result.auth) === 1)
                    {
                        url = 'dashboard.php'
                    }
                    else if (parseInt(level) === 1 && parseInt(result.auth) === 0)
                    {
                        url = 'profile.php';
                    }
                    else if(parseInt(level) === 2)
                    {
                        url = 'mProfile.php';
                    }

                    window.location = url;
                }
                else{
                    alert(result.success)
                }
            }
        })
    }
    else {
        console.log('Fill all fields');
    }
}

// User login
function loginUser() {
    let level = $('#user_level').val();
    let username = $('#username').val();
    let password = $('#password').val();

    if (!isEmptyOrSpaces(username) && !isEmptyOrSpaces(password))
    {
        console.log(level);
        $.ajax({
            type: 'POST',
            url:'includes/registerController.php',
            data: {
                'loginUser' : 1,
                'username' : username,
                'level' : level,
                'password' : password
            },
            success: function (data) {
                // let message = data['message'];
                let result = JSON.parse(data);
                console.log(result.auth);

                if (result.success === true)
                {
                    let url = '';

                    if (parseInt(level) === 1 && parseInt(result.auth) === 1)
                    {
                        url = 'dashboard.php'
                    }
                    else if (parseInt(level) === 1 && parseInt(result.auth) === 0)
                    {
                        url = 'profile.php';
                    }
                    else if(parseInt(level) === 2)
                    {
                        url = 'mProfile.php';
                    }

                    window.location = url;
                }
                else{
                   alert(result.message)
                }
            }
        })
    }
    else {
        console.log('Fill all fields');
    }

}

function doLogin(data, level) {

}

// Assign mentor
function assingMentor(mentorID, menteeID) {
    // console.log(mentorID);
    $.ajax({
        type: 'POST',
        url:'includes/AssignController.php',
        data: {
            'assignMentor' : 1,
            'mentorID' : mentorID,
            'menteeID' : menteeID
        },

        success: function (data) {
            // let message = data['message'];
            let result = JSON.parse(data);
            console.log(data);

            if (result.success === true)
            {
                location.reload();
            }
            else{
                alert('Assignment Failed')
            }
        }
    })
}

function isEmptyOrSpaces(str){
    return str === null || str.match(/^ *$/) !== null;
}