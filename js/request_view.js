$(document).ready(function() {
    getRequestList();
});


function getRequestList() {

    var gender = '';
    $.ajax({
        type: 'GET',
        url: "http://localhost/Codeigniter_first/index.php/rest/resource/tutor_pending",
        dataType: "json",
        success: function(result) {
            var trHTML = '';

            console.log('data: ' + result);

            if (!result.length > 0) {


                alert("no pending tutor requests ");
                window.location = "http://localhost/Codeigniter_first/index.php/adminHome/load";

            } else {

                $('#profile_question_table tbody').remove();


                $.each(result, function(i, item) {
                    console.log('data: ' + item);
                    //console.log(item.asker_user_id);
                    //  console.log(item);
//                console.log("array cout" + numberOfAnswers(item.question_id));
//                console.log("array cout user" + findByUserId(item.asker_user_id));

                    if (item.sex == '1') {
                        gender = 'male';
                    } else {
                        gender = 'female';
                    }
                    trHTML += '<tr><td>' + item.user_name + '</td><td>' + item.email_id + '</td><td>' + gender + '</td><td>' + '<a href="javascript:accept(' + item.user_id + ')">accept</a>/<a href="javascript:reject(' + item.user_id + ')">reject</a>  </td></tr>';



                });
                $('#profile_question_table').append(trHTML);
                $('#overlay').fadeOut();
            }



        }, error: function() {
            alert("Error calling the web service.");
        }

    });
}

function accept(user_id) {


    var formData = {user_id: user_id, type: '2'}; //Array

    console.log("formData" + formData);

    //   var url = "http://localhost/Codeigniter_first/index.php/rest/resource/question/question_title/" + encodeURIComponent(title) + "/question_description/" + encodedDescription + "/tag/" + tag + "/question_catagory/" + catagory + "/date/" + dateString + "/asker_user_id/" + userId;
    //  console.log(url);
    $.ajax({
        url: "http://localhost/Codeigniter_first/index.php/rest/resource/tutor_select",
        type: "POST",
        data: formData,
        success: function(data, textStatus, jqXHR)
        {

            var response = JSON.parse(data);


            if (response.status === 0) {
                alert('successful');
                ;
                getRequestList();
            } else {

            }

        },
        error: function(data, textStatus, errorThrown)
        {
            console.log(data);
            alert("fail");
        }
        // avoid to execute the actual submit of the form.
    });

}
function reject(user_id) {


    var formData = {user_id: user_id, type: '-1'}; //Array

    console.log("formData" + formData);

    //   var url = "http://localhost/Codeigniter_first/index.php/rest/resource/question/question_title/" + encodeURIComponent(title) + "/question_description/" + encodedDescription + "/tag/" + tag + "/question_catagory/" + catagory + "/date/" + dateString + "/asker_user_id/" + userId;
    //  console.log(url);
    $.ajax({
        url: "http://localhost/Codeigniter_first/index.php/rest/resource/tutor_select",
        type: "POST",
        data: formData,
        success: function(data, textStatus, jqXHR)
        {

            var response = JSON.parse(data);


            if (response.status === 0) {
                alert('successful');
                ;
                getRequestList();
            } else {

            }

        },
        error: function(data, textStatus, errorThrown)
        {
            console.log(data);
            alert("fail");
        }
        // avoid to execute the actual submit of the form.
    });

}