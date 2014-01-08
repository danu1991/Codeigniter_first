/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */


$(document).ready(function() {
    var userName = "";
    userName = document.getElementById('user_name').innerHTML.trim();
   // alert(userName);
    console.log(userName);
    if (!userName.length > 0) {
        $('#nav ul > li').eq(1).hide();
    }

    var question_id = getUrlVars()["questionId"];
    var answer_id = getUrlVars()["answerId"];

    getQuestion(question_id);
    getAnswers(answer_id);
});

function getUrlVars() {
    var vars = {};
    var parts = window.location.href.replace(/[?&]+([^=&]+)=([^&]*)/gi, function(m, key, value) {
        vars[key] = value;
    });
    return vars;
}

function getQuestion(question_id) {


    $.ajax({
        url: "http://localhost/Codeigniter_first/index.php/rest/resource/question/question_id/" + question_id,
        type: "GET",
        contentType: "application/json",
        dataType: "json",
        success: function(data, textStatus, jqXHR)
        {
            if (!data.length > 0) {
                console.log(data);
                alert("No such a Question");
                window.location = "http://localhost/Codeigniter_first/index.php";


            } else {


                $.each(data, function(i, item) {

                    //console.log(item.asker_user_id);


                    document.getElementById('title').innerHTML = item.question_title;
                    document.getElementById('description').innerHTML =  item.question_description;
                    document.getElementById('tag').innerHTML =  tags(item.question_id);

                    $("#asker_user").append("<lable class='ret' id ='asker_user_name'>" + '<a href="/Codeigniter_first/index.php/profile/loadView?user=' + findByUserId(item.asker_user_id) + '">' + findByUserId(item.asker_user_id) + "</lable>");

                    // document.getElementById('asker_user_name').innerHTML = "user " + findByUserId(item.asker_user_id);
                    document.getElementById('loyality_user').innerHTML = "loyality " + item.loyality;
                    document.getElementById('dateQuestion').innerHTML = timeDifference(parseFloat(item.date));
                    document.getElementById('votes_question').innerHTML = item.vote;



                });
            }
        },
        error: function(jqXHR, textStatus, errorThrown)
        {
            console.log(data);
        }
        // avoid to execute the actual submit of the form.
    });

}
function getAnswers(answer_id) {


    $.ajax({
        url: "http://localhost/Codeigniter_first/index.php/rest/resource/answer/answer_id/" + answer_id,
        type: "GET",
        contentType: "application/json",
        dataType: "json",
        success: function(data, textStatus, jqXHR)
        {


            $.each(data, function(i, item) {

                //console.log(item.asker_user_id);


                document.getElementById('edit_anwser_text').innerHTML = item.answer;

            });

        },
        error: function(jqXHR, textStatus, errorThrown)
        {
            console.log(data);
        }
        // avoid to execute the actual submit of the form.
    });

}

$('#edit_answer_button').on('click', function() {

    var answer_id = getUrlVars()["answerId"];
    var textAira = $.trim($('#edit_anwser_text').val());
    if (textAira.length === 0) {


        alert('empty aira. please fill');

        return;

    }
    postAnswer(answer_id, textAira);
    //  alert('not empty');

});

function postAnswer(answerId, answer) {
    //console.log('findById: ' + id);
    var now = new Date();


    var utc_now = new Date(now.getUTCFullYear(), now.getUTCMonth(), now.getUTCDate(), now.getUTCHours(), now.getUTCMinutes(), now.getUTCSeconds(), now.getUTCMilliseconds());

    var dateString = utc_now.getTime().toString();

    var anwserString = encodeURIComponent(answer);
    var dataform = {answer_id: answerId, answer: anwserString, date: dateString};
    console.log('data : ' + dataform);
    alert(utc_now.getTime());
    $.ajax({
        type: 'POST',
        url: 'http://localhost/Codeigniter_first/index.php/rest/resource/edit_answer',
        data: dataform,
        success: function(data) {
            console.log(data);



            var response = JSON.parse(data);
            //console.log(item.asker_user_id);
            if (response.status === 0) {

                alert("successfull");

                window.location.reload();
            } else if (response.status === 1) {

                alert(response.error);
            }





        }
    });

}



function timeDifference(previous) {

    var today = new Date();
    var localoffset = -(today.getTimezoneOffset() / 60);

    var d = new Date(parseFloat(previous) + (3600000 * localoffset));

    var convertedvalue = parseFloat(d.getTime());
    var date = new Date(convertedvalue);

    var msPerMinute = 60 * 1000;
    var msPerHour = msPerMinute * 60;
    var msPerDay = msPerHour * 24;
    var msPerMonth = msPerDay * 30;
    var msPerYear = msPerDay * 365;
    var now = new Date().getTime();
    var elapsed = now - date;

    if (elapsed < msPerMinute) {
        return Math.round(elapsed / 1000) + ' seconds ago';
    }

    else if (elapsed < msPerHour) {
        return Math.round(elapsed / msPerMinute) + ' minutes ago';
    }

    else if (elapsed < msPerDay) {
        return Math.round(elapsed / msPerHour) + ' hours ago';
    }

    else if (elapsed < msPerMonth) {
        return  Math.round(elapsed / msPerDay) + ' days ago';
    }

    else if (elapsed < msPerYear) {
        return  Math.round(elapsed / msPerMonth) + ' months ago';
    }

    else {
        return   Math.round(elapsed / msPerYear) + ' years ago';
    }
}
function tags(id) {
    //console.log('findById: ' + id);
    var tags = '';
    $.ajax({
        type: 'GET',
        async: false,
        url: 'http://localhost/Codeigniter_first/index.php/rest/resource/tag/question_id/' + id,
        dataType: "json",
        success: function(data) {
            $.each(data, function(i, item) {


                //console.log(item.asker_user_id);



                tags += item.tag + " ";

            });


        }
    });
    return tags;
}
function findByUserId(id) {
    //console.log('findById: ' + id);
    var user = 0;
    $.ajax({
        type: 'GET',
        async: false,
        url: 'http://localhost/Codeigniter_first/index.php/rest/resource/users/user_id/' + id,
        dataType: "json",
        success: function(data) {
            $.each(data, function(i, item) {


                //console.log(item.asker_user_id);



                user = item.user_name;

            });


        }
    });
    return user;
}