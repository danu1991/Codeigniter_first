$(document).ready(function() {
    var userName = "";
    userName = document.getElementById('user_name').innerHTML.trim();
   
    console.log(userName);
    if (!userName.length > 0) {
        $('#nav ul > li').eq(1).hide();
    }


    $('#profiletabs ul li a').on('click', function(e) {
        e.preventDefault();
        var newcontent = $(this).attr('href');
        console.log(newcontent);

        $('#profiletabs ul li a').removeClass('sel');
        $(this).addClass('sel');

        $('#content section').each(function() {
            if (!$(this).hasClass('hidden')) {
                $(this).addClass('hidden');
            }
        });

        $(newcontent).removeClass('hidden');
    });

    getUser();
});
function getUser( ) {
    var parameter = window.location.search.replace("?", ""); // will return the GET parameter 

    var values = parameter.split("=");

    var valuesSecond = values[1].trim();
    console.log(valuesSecond);
    var currentLogInUser = document.getElementById('user_name').innerHTML;
    var logInUserProfile = '';
    console.log(currentLogInUser);
    currentLogInUser = currentLogInUser.trim();
    if (currentLogInUser === valuesSecond) {

        console.log(currentLogInUser + "innnnnn    " + valuesSecond);

        logInUserProfile = valuesSecond;
    } else {
        console.log(currentLogInUser + "  " + valuesSecond);

        $('#profiletabs ul > li').eq(2).hide();
    }
    //    $('.clearfix ul li:nth-child(1)~li').hide();
    //$('.clearfix ul li:nth-child(2)~li').hide();

    $.ajax({
        url: "http://localhost/Codeigniter_first/index.php/rest/resource/users/user_name/" + valuesSecond,
        type: "GET",
        contentType: "application/json",
        dataType: "json",
        success: function(data, textStatus, jqXHR)
        {
            if (!data.length > 0) {
                console.log(data);
                alert("No such a user");
                window.location = "http://localhost/Codeigniter_first/index.php";


            } else {

                $.each(data, function(i, item) {

                    //console.log(item.asker_user_id);

                    if (item.user_type === '1') {
                        $('#profiletabs ul > li').eq(1).hide();
                        document.getElementById('user_type').innerHTML = 'Student';
                    } else if (item.user_type === '2') {
                        document.getElementById('user_type').innerHTML = 'Tutor';

                    } else  if (item.user_type === '3'){
                        document.getElementById("user_type").innerHTML  = 'Admin';
                    }else{
                    document.getElementById("user_type").style.display = 'none';

                    }

                    document.getElementById('profile_username').innerHTML = valuesSecond;

                    if (item.sex === '1') {

                        document.getElementById('gender').innerHTML = "male";
                    } else if (item.sex === '2') {
                        document.getElementById('gender').innerHTML = 'female';

                    } else {
                        document.getElementById("gender").style.display = 'none';
                    }

                    document.getElementById('emial_id').innerHTML = item.email_id;

                    document.getElementById('loyality').innerHTML = item.loyality;

                    if (item.user_type === '2') {
                        document.getElementById('reputation').innerHTML = item.reputation;
                    } else if (item.user_type === '1') {
                        document.getElementById("reputation-lable").style.display = 'none';
                        document.getElementById("reputation").style.display = 'none';
                    } else {
                        document.getElementById("reputation-lable").style.display = 'none';
                        document.getElementById("reputation").style.display = 'none';
                        document.getElementById('loyality').style.display = 'none';
                        document.getElementById('loyality-lable').style.display = 'none';
                    }
                    ajax_table(item.user_id, logInUserProfile);
                    ajax_tableAnswer(item.user_id, logInUserProfile);
                    $('#uname').val(item.user_name);

                });
            }
        },
        error: function(data, textStatus, errorThrown)
        {
            console.log(data);
        }
        // avoid to execute the actual submit of the form.
    });

}
function getloyality(user_id) {
    //console.log('findById: ' + id);


    var loyality = 0;
    $.ajax({
        type: 'GET',
        async: false,
        url: 'http://localhost/Codeigniter_first/index.php/rest/resource/loyality/loyality_user_id/' + user_id,
        dataType: "json",
        success: function(data) {
            $.each(data, function(i, item) {


                //console.log(item.asker_user_id);



                loyality += parseFloat(item.loyality_point);


            });


        }
    });

    return  loyality.toString();
}
function getreputation(user_id) {
    //console.log('findById: ' + id);


    var reputation = 0;
    $.ajax({
        type: 'GET',
        async: false,
        url: 'http://localhost/Codeigniter_first/index.php/rest/resource/reputation/reputation_user_id/' + user_id,
        dataType: "json",
        success: function(data) {
            $.each(data, function(i, item) {


                //console.log(item.asker_user_id);


                reputation += parseFloat(item.reputation_point);


            });


        }
    });

    return  reputation.toString();
}
function ajax_table(userId, logInUserProfile) {
    var header = ''


    $.ajax({
        url: ' http://localhost/Codeigniter_first/index.php/rest/resource/question/asker_user_id/' + userId,
        async: false,
        type: "GET",
        dataType: "json",
        contentType: "application/json",
        success: function(data) {
            var trHTML = '';
            console.log(data);
            if (!data.length > 0) {
                $('#profiletabs ul > li').eq(0).hide();

            } else {

                if (logInUserProfile === '') {
                    header = '<thead><tr><th>' + 'Questions' + '</th></tr></thead>';
                    $('#profile_question_table').append(header);
                } else {

                    header = '<thead><tr><th>' + 'Question' + '</th><th>' + 'action' + '</th></tr></thead>'
                    $('#profile_question_table').append(header);
                }

                $.each(data, function(i, item) {

                    //console.log(item.asker_user_id);
                    console.log(item.question_title);


                    if (logInUserProfile === '') {
                        console.log("other user");

                        trHTML += '<tr><td>' + '<a href="/Codeigniter_first/index.php/question/questionView?id=' + item.question_id + '">' + item.question_title + '</td></tr>';

                    } else {
                        if (item.number_of_answers == '0' && item.question_avalability=='0' ) {
                            trHTML += '<tr><td>' + '<a href="/Codeigniter_first/index.php/question/questionView?id=' + item.question_id + '">' + item.question_title + '</a>' + '</td><td>' + '<a href="javascript:deleteQuestion(' + item.question_id + ')"class="table-actions-button ic-table-delete"></a><a href="/Codeigniter_first/index.php/question/edit?editId=' + item.question_id + '"class="table-actions-button ic-table-edit"> </a>' + '</td></tr>';
                            console.log("login user");
                        } else {
                            trHTML += '<tr><td>' + '<a href="/Codeigniter_first/index.php/question/questionView?id=' + item.question_id + '">' + item.question_title + '</a>' + '</td><td>' + '<a href="javascript:deleteQuestion(' + item.question_id + ')" class="table-actions-button ic-table-delete"></a>' + '</td></tr>';
                            console.log("login user");
                        }

                    }

                });
                $('#profile_question_table').append(trHTML);
            }
        }, error: function() {
            alert("Error calling the web service.");
        }
    });
}
function ajax_tableAnswer(user_id, logInUserProfile) {



    $.ajax({
        url: ' http://localhost/Codeigniter_first/index.php/rest/resource/answer/answer_user_id/' + user_id,
        async: false,
        type: "GET",
        dataType: "json",
        contentType: "application/json",
        success: function(data) {
            var trHTML = '';
            if (!data.length > 0) {
                console.log(data);
                $('#profiletabs ul > li').eq(1).hide();
            } else {

                var header = ''
                if (logInUserProfile === '') {
                    header = '<thead><tr><th>' + 'Questions' + '</th></tr></thead>';
                    $('#answer_question').append(header);
                } else {

                    header = '<thead><tr><th>' + 'Answers' + '</th><th>' + 'action' + '</th></tr></thead>'
                    $('#answer_question').append(header);

                }
                $.each(data, function(i, item) {

                    //console.log(item.asker_user_id);
                    console.log(item.answer);


                    if (logInUserProfile === '') {
                        console.log("other user");

                        trHTML += '<tr><td>' + '<a href="/Codeigniter_first/index.php/question/questionView?id=' + item.question_id + '">' + item.answer + '</td></tr>';

                    } else {
                        if (item.vote_value == '0') {
                         
                            trHTML += '<tr><td>' + '<a href="/Codeigniter_first/index.php/question/questionView?id=' + item.question_id + '">' + item.answer + '</a>' + '</td><td>' + '<a href="javascript:deleteAnswer(' + item.answer_id + ')"  class="table-actions-button ic-table-delete"></a><a href="/Codeigniter_first/index.php/answer/editAnswer?questionId=' + item.question_id + '&answerId=' + item.answer_id + '" class="table-actions-button ic-table-edit"> </a>' + '</td></tr>';
                        } else {
                            trHTML += '<tr><td>' + '<a href="/Codeigniter_first/index.php/question/questionView?id=' + item.question_id + '">' + item.answer + '</a>' + '</td><td>' + '<a href="javascript:deleteAnswer(' + item.answer_id + ')"  class="table-actions-button ic-table-delete"></a></td></tr>';

                        }

                    }

                });
                $('#answer_question').append(trHTML);
            }
        }, error: function() {
            alert("Error calling the web service.");
        }
    });
}
function deleteAnswer(answerId) {
    var agree = confirm("Are you sure you want to delete this answer?");
    if (agree) {
        formData = {answer_id: answerId};

        $.ajax({
            url: ' http://localhost/Codeigniter_first/index.php/rest/resource/delete_answer',
            async: false,
            type: "POST",
            data:formData,
            success: function(data) {
                console.log(data);
              
                  var response = JSON.parse(data);
                   
                    if(response.status === 0){
                    alert("suceessful");
                     window.location.reload();

                    }else{
                        
                        
                    }

                   

               
            }, error: function() {
                alert("Error calling the web service.");
            }
        });
    }
    else {
        return false;
    }
}
//    $.ajax({
//        url: ' http://localhost/Codeigniter_first/index.php/rest/resource/delete_answer/answer-id' + answerId,
//        async: false,
//        type: "GET",
//        dataType: "json",
//        contentType: "application/json",
//        success: function(data) {
//            var trHTML = '';
//            console.log(data);
//            $.each(data, function(i, item) {
//
//                //console.log(item.asker_user_id);
//                console.log(item.question_title);
//
//
//
//
//            });
//        }, error: function() {
//            alert("Error calling the web service.");
//        }
//    });



// $('.table-actions-button ic-table-delete').click(function() {
//              
//                var id = $(this).attr('id');
//            
//             
//                console.log('deete');
//
//               // questionVotes(questionId, "yes", values[1]);
//
//
//            });


$("#setting-form").submit(function() {

    var parameter = window.location.search.replace("?", ""); // will return the GET parameter 

    var values = parameter.split("=");
//alert(parameter);
    var valuesSecond = values[1].trim();

    var userName = $('#uname').val();
    var currentPassword = $('#current_pword').val().trim();
    var newPassword = $('#new_pword').val().trim();
    var confirmPassword = $('#confirm_new_pword').val().trim();

    var formData = '';
    if (currentPassword == '' && confirmPassword == '' && newPassword == '') {
        if (userName != valuesSecond) {
            formData = {current_user_name: valuesSecond, edit_user_name: userName, current_password: '', new_password: ''};
        } else {
            alert('success');
            window.location.replace("http://localhost/Codeigniter_first/index.php/profile/loadView?user=" + valuesSecond);
             return false;
        }
    } else if (currentPassword == '' || confirmPassword == '' || newPassword == '') {
        alert("please fil the password feilds");
        return false;


    } else if (newPassword.length < 5) {
        alert('password should be more that 5 latters');
        return false;

    } else if (newPassword != confirmPassword) {
        alert('confirm password not match');
        return false;


    } else {


        formData = {current_user_name: valuesSecond, edit_user_name: userName, current_password: currentPassword, new_password: newPassword}

    }


    // var formData = "{question_title=" + encodedTitle + "&question_description=" + encodedDescription + "&tag=" + tag+ "&question_catagory=" + catagory+ "&date=" + dateString+ "&asker_user_id=" + userId+"}";  //Name value Pair


    console.log("formData" + formData);

    //   var url = "http://localhost/Codeigniter_first/index.php/rest/resource/question/question_title/" + encodeURIComponent(title) + "/question_description/" + encodedDescription + "/tag/" + tag + "/question_catagory/" + catagory + "/date/" + dateString + "/asker_user_id/" + userId;
    //  console.log(url);
    $.ajax({
        url: "http://localhost/Codeigniter_first/index.php/rest/resource/edit_user",
        type: "POST",
        //dataType:"json",
        // contentType: "application/json",
        data: formData,
        success: function(data, textStatus, jqXHR)
        {
            var response = JSON.parse(data);

            alert(response.status);
            if (response.status === 0) {
                alert('successful');
                ;
                console.log("successful");
    window.location.replace("http://localhost/Codeigniter_first/index.php/profile/loadView?user=" + userName);

            } else {
                console.log(response.error);
            }

        },
        error: function(data, textStatus, errorThrown)
        {
            console.log(data);
            alert("fail");
        }
        // avoid to execute the actual submit of the form.
    });

    return false; // avoid to execute the actual submit of the form.
});



function deleteQuestion(questionId) {

    var retVal = confirm("Are you sure you want to delete this Question?");
    if (retVal) {
        formData = {question_id: questionId,flag:"notFlag"};

        $.ajax({
            url: ' http://localhost/Codeigniter_first/index.php/rest/resource/delete_question',
            async: false,
            type: "POST",
            data: formData,
            success: function(data) {
               
               var response = JSON.parse(data);
                   
                    if(response.status === 0){
                    alert("suceessful");
                     window.location.reload();

                    }else{
                        
                        
                    }
            }, error: function() {
                alert("Error calling the web service.");
            }
        });
        return true;
    } else {
        return false;
    }

    return false;
}