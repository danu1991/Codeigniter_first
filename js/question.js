

$(document).ready(function() {
    var userName = "";
    userName = document.getElementById('user_name').innerHTML.trim();
    // alert(userName);
    console.log(userName);
    if (!userName.length > 0) {
        $('#nav ul > li').eq(1).hide();
    }

    getQuestion();
    var elem = document.getElementById('post_content');
    elem.style.visibility = "hidden";
    var elem1 = document.getElementById('add_answer_content');
    elem1.style.visibility = "hidden";
});

function getQuestion( ) {
    var parameter = window.location.search.replace("?", ""); // will return the GET parameter 

    var values = parameter.split("=");
//alert(parameter);
    var valuesSecond = values[1];
    console.log(parameter);

    $.ajax({
        url: "http://localhost/Codeigniter_first/index.php/rest/resource/question/question_id/" + valuesSecond,
        type: "GET",
        contentType: "application/json",
        dataType: "json",
        success: function(data, textStatus, jqXHR)
        {

            if (!data.length > 0) {
                console.log(data);
                alert("No such a question");
                window.location = "http://localhost/Codeigniter_first/index.php";


            } else {
                $.each(data, function(i, item) {

                    //console.log(item.asker_user_id);


                    document.getElementById('title').innerHTML =  item.question_title;
                    document.getElementById('description').innerHTML =  item.question_description;
                    document.getElementById('tag').innerHTML =  " "+tags(item.question_id)+" ";

                    $("#asker_user").append("<lable class='ret' id ='asker_user_name'>" + '<a href="/Codeigniter_first/index.php/profile/loadView?user=' + item.user_name + '">' + item.user_name + "</lable>");

                    // document.getElementById('asker_user_name').innerHTML = "user " + findByUserId(item.asker_user_id);
                //    document.getElementById('loyality_user').innerHTML = "loyality:" + item.loyality;
                //    alert(item.loyality);
                    document.getElementById('dateQuestion').innerHTML =  timeDifference(parseFloat(item.date));
                 //   document.getElementById('votes_question').innerHTML = item.vote;
                    if(item.edit_date!="0"){
                          document.getElementById('editDateQuestion').style.display = "block";
                         document.getElementById('editDateQuestion').innerHTML = "edited :"+timeDifference(parseFloat(item.edit_date));
                    }
                   

                    $("#vt_artical1").append("<button  class='question_yes' id ='" + item.question_id + ',' + item.asker_user_id + "'>" + "</button >");
                    $("#vt_artical2").append("<button  class='question_no' id ='" + item.question_id + ',' + item.asker_user_id + "'>" + "</button >");
                  $("#button-div").append("<button  src=\"/Codeigniter_first/images/flag.png\"class='flag_button' id ='" + item.question_id +"'>" + "</button ><p></p>");

                    if (item.question_avalability == '0') {
                        var elem = document.getElementById('add_answer_content');
                        elem.style.visibility = "visible";
                        $("#button-div").append('<a href="/Codeigniter_first/index.php/question/close?id=' + item.question_id + '">Close Question </a>');

                    } else {

                        var elem = document.getElementById('close_content');
                        elem.style.visibility = "visible";
                        document.getElementById('close_reason').innerHTML = item.close_reason;
                        $("#close_content").append("<lable class='ret' id ='close_user_name'>" + '<a href="/Codeigniter_first/index.php/profile/loadView?user=' + findByUserId(item.close_user_id) + '">' + findByUserId(item.close_user_id) + "</lable>");


                    }
                    getAnswers(valuesSecond);

                });
            }
        /*    $('.question_yes').click(function() {
                var parameter = window.location.search.replace("?", ""); // will return the GET parameter 

                var values = parameter.split("=");
//alert(parameter);
                var valuesSecond = values[1];
                var id = $(this).attr('id');
                var values = id.split(",");
                var questionId = values[0];
                alert("id" + questionId);
                console.log(values[1]);
                questionVotes(questionId, "yes", values[1]);


            });
            $('.question_no').click(function() {
                var parameter = window.location.search.replace("?", ""); // will return the GET parameter 

                var values = parameter.split("=");
//alert(parameter);
                var valuesSecond = values[1];
                var id = $(this).attr('id');

                var values = id.split(",");
                var questionId = values[0];
                alert("id" + questionId);
                console.log(values[1]);
                questionVotes(questionId, "no", values[1]);
            });*/
             $('.flag_button').click(function() {
              
            
                var id = $(this).attr('id');
                 flagQuestion(id);
            });

        },
        error: function(jqXHR, textStatus, errorThrown)
        {
            console.log(data);
        }
        // avoid to execute the actual submit of the form.
    });

}
//$('.question_yes').click(function() {
//  // var id = $(this).attr('id');
//   alert('ybuyyuby');
//   
//});

function questionVotes(questionId, vote, askerId) {
    var dataform = {question_id: questionId, vote: vote};

    $.ajax({
        type: 'POST',
        url: 'http://localhost/Codeigniter_first/index.php/rest/resource/loyality',
        data: dataform,
        success: function(data) {
            console.log(data);



            var response = JSON.parse(data);
            console.log(response);
            //console.log(item.asker_user_id);
            if (response.status === 0) {

                alert("successfull");
              //  document.getElementById('loyality_user').innerHTML = "loyality " + getloyalityToUser(askerId);

              //  document.getElementById('votes_question').innerHTML = getloyality(questionId);

                //  window.location.reload();
            } else if (response.status === 1) {

                alert(response.error);
            }





        }
    });



}

function flagQuestion(questionId) {
    //console.log('findById: ' + id);
   
    var dataform = {question_id: questionId};
    
    $.ajax({
        type: 'POST',
        url: 'http://localhost/Codeigniter_first/index.php/rest/resource/flag',
        data: dataform,
        success: function(data) {
            console.log(data);



            var response = JSON.parse(data);
            //console.log(item.asker_user_id);
            if (response.status === 0) {

               alert('successful');

              
            } else if (response.status === 1) {

                alert(response.error);
            }





        }
    });

}

function answerVotes(answerId, vote, answererId) {

    var parameter = window.location.search.replace("?", ""); // will return the GET parameter 

    var values = parameter.split("=");
//alert(parameter);
    var valuesSecond = values[1];
    var dataform = {answer_id: answerId, vote: vote};

    $.ajax({
        type: 'POST',
        url: 'http://localhost/Codeigniter_first/index.php/rest/resource/reputation',
        data: dataform,
        success: function(data) {
            console.log(data);



            var response = JSON.parse(data);
            console.log(response);
            //console.log(response.error);
            //console.log(item.asker_user_id);
            if (response.status === 0) {

                alert("successfull");
                console.log(answererId);

                //document.getElementById("answer").innerHTML = "loyality " + getloyality(answerId);
                //  document.getElementById('lable' + answererId).innerHTML =  getReputationForUser(answererId);
                //  document.getElementById('lablee' + answerId).innerHTML =  getReputation(answerId);

//                var parameter = window.location.search.replace("?", ""); // will return the GET parameter 
//
//                var values = parameter.split("=");
////alert(parameter);
//                var valuesSecond = values[1];
                getAnswers(valuesSecond);

            } else if (response.status === 1) {

                alert(response.error);
            }





        }
    });



}

$('#add_answer_button').on('click', function() {


    var parameter = window.location.search.replace("?", ""); // will return the GET parameter 

    var values = parameter.split("=");

    var questionId = values[1];
    var textAira = $.trim($('#add_anwser_text').val());
    if (textAira.length === 0) {


        alert('empty aira. please fill');

        return;

    }
    postAnswer(questionId, textAira);
    //  alert('not empty');

});


function postAnswer(questionId, answer) {
    //console.log('findById: ' + id);
    var now = new Date();


    var utc_now = new Date(now.getUTCFullYear(), now.getUTCMonth(), now.getUTCDate(), now.getUTCHours(), now.getUTCMinutes(), now.getUTCSeconds(), now.getUTCMilliseconds());

    var dateString = utc_now.getTime().toString();

    var anwserString = encodeURIComponent(answer);
    var dataform = {question_id: questionId, answer: anwserString, date: dateString};
    console.log('data : ' + dataform);
    alert(utc_now.getTime());
    $.ajax({
        type: 'POST',
        url: 'http://localhost/Codeigniter_first/index.php/rest/resource/answer',
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

function findByUsername(name) {
    //console.log('findById: ' + id);
    var user = 0;
    $.ajax({
        type: 'GET',
        async: false,
        url: 'http://localhost/Codeigniter_first/index.php/rest/resource/users/user_name/' + name,
        dataType: "json",
        success: function(data) {
            $.each(data, function(i, item) {


                //console.log(item.asker_user_id);



                user = item.user_id;

            });


        }
    });
    return user;
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
function getAnswers(question_id) {
    var div = document.createElement("div");
    div.style.width = "100px";
    div.style.height = "100px";
    div.style.background = "red";
    div.style.color = "white";
    div.innerHTML = "Hello";
    $("#answer_content").append(div);
    var number = 0;

    $.ajax({
        type: 'GET',
        async: true,
        url: 'http://localhost/Codeigniter_first/index.php/rest/resource/answer/question_id/' + question_id,
        dataType: "json",
        success: function(data) {

            $('#answer_content').empty();


            $.each(data, function(i, item) {

                console.log(item.date);
                console.log(timeDifference(1387896279844));




                var div = document.createElement("div");


//                div.style.background = "red";
                number++;
                div.setAttribute('class', 'myclass');
                div.setAttribute('id', 'div1' + number);

                $("#answer_content").append(div);
if(item.edit_date=="0"){
                var html = "<table width='100%'align='center' ><tr><th rowspan='3' width='10%' ><div class='div_vote'><button  class='answer_yes' id='"+  item.answer_id + ',' + item.answer_user_id + "' </button ></div><div class='div_vote'><label id='votes_question'>"+  item.vote_value +"</label></div ><div class='div_vote'><button  class='answer_no' id='" + item.answer_id + ',' + item.answer_user_id + "' </button ></div></th></tr><tr><td colspan='4'><p><div id='description'>"+item.answer+"</div></p></td></tr><tr><td width='10%'><div id='asker_user'><label id='asker_user_name_lable'>Aswered by </label><label id='asker_user_name'><a href=\""+'/Codeigniter_first/index.php/profile/loadView?user=' + item.user_name + "\">"+item.user_name+"</a></label></div></td><td width='15%'><label id='reputation_user'> Reputation :"+ item.reputation+"</label></td><td width='15%'><label id='dateQuestion'>"+timeDifference(parseFloat(item.date))+"</label></td><td width='15%'><label id='edit'></label></td></tr><tr><td></td><td colspan='4'><div id='button-div'></div></td></tr></table> ";
}else{
                    var html = "<table width='100%'align='center' ><tr><th rowspan='3' width='10%' ><div class='div_vote'><button  class='answer_yes' id='"+  item.answer_id + ',' + item.answer_user_id + "' </button ></div><div class='div_vote'><label id='votes_question'>"+  item.vote_value +"</label></div ><div class='div_vote'><button  class='answer_no' id='" + item.answer_id + ',' + item.answer_user_id + "' </button ></div></th></tr><tr><td colspan='4'><p><div id='description'>"+item.answer+"</div></p></td></tr><tr><td width='10%'><div id='asker_user'><label id='asker_user_name_lable'>Aswered by </label><label id='asker_user_name'><a href=\""+'/Codeigniter_first/index.php/profile/loadView?user=' + item.user_name + "\">"+item.user_name+"</a></label></div></td><td width='15%'><label id='reputation_user'> Reputation :"+ item.reputation+"</label></td><td width='15%'><label id='dateQuestion'>"+timeDifference(parseFloat(item.date))+"</label></td><td width='15%'><label id='edit_date'>edited:"+timeDifference(parseFloat(item.edit_date))+"</label></td></tr><tr><td></td><td colspan='4'><div id='button-div'></div></td></tr></table> ";

}
                div.innerHTML = html;

//                // document.getElementById('answer').innerHTML = "answer "+item.answer;
//                $("#div1+number").append("<div class='answer' id ='answer'>" + item.answer + "</div>\n\
//                                <button  class='answer_yes' id ='" + item.answer_id + ',' + item.answer_user_id + "'>" + "</button >");
//                $("#div1").append("<lable class='data-ans' id ='lablee" + item.answer_id + "'>" + item.vote_value + " " + "</lable>");
//
//                $("#div1").append("<button  class='answer_no' id ='" + item.answer_id + ',' + item.answer_user_id + "'>" + "</button >");
//
//                $("#div1").append("<lable class='image-right' id ='anwer_user'>" + '<a href="/Codeigniter_first/index.php/profile/loadView?user=' + item.user_name + '">' + item.user_name + " " + "</lable>");
//                $("#div1").append("<lable class='loyality' id ='lable'>" + item.reputation + " " + "</lable>");
//                $("#div1").append("<lable class='data-answer' id ='item.answer_id '>" + timeDifference(parseFloat(item.date)) + " " + "</lable>");
//                // document.getElementById('answer_content').appendChild(node);
            });

            $('.answer_yes').click(function() {

                var id = $(this).attr('id');
                alert("id" + id);

                var values = id.split(",");

                var questionId = values[1];
                console.log(values[1]);
                answerVotes(values[0], "yes", values[1]);

            });
            $('.answer_no').click(function() {

                var id = $(this).attr('id');
                var values = id.split(",");

                var questionId = values[1];
                alert("id" + id);
                console.log(values[1]);
                answerVotes(values[0], "no", values[1]);

            });
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
function date(datee) {


    var today = new Date();
    var localoffset = -(today.getTimezoneOffset() / 60);

    var d = new Date(parseFloat(datee) + (3600000 * localoffset));

    var convertedvalue = parseFloat(d.getTime());
    var date = new Date(convertedvalue);
    var date = date.customFormat("#DD#/#MM#/#YYYY# #hh#:#mm#:#ss#");




    return date;
}
function getReputation(answer_id) {
    //console.log('findById: ' + id);


    var user = 0;
    $.ajax({
        type: 'GET',
        async: false,
        url: 'http://localhost/Codeigniter_first/index.php/rest/resource/reputation/answer_id/' + answer_id,
        dataType: "json",
        success: function(data) {
            $.each(data, function(i, item) {


                user += parseFloat(item.reputation_point);

            });


        }
    });
    return user.toString();
}

function getReputationForUser(user_id) {
    //console.log('findById: ' + id);


    var reputation = 0;
    $.ajax({
        type: 'GET',
        async: false,
        url: 'http://localhost/Codeigniter_first/index.php/rest/resource/reputation/reputation_user_id/' + user_id,
        dataType: "json",
        success: function(data) {
            $.each(data, function(i, item) {


                reputation += parseFloat(item.reputation_point);

            });


        }
    });
    return reputation.toString();
}

function getloyalityToUser(user_id) {
    //console.log('findById: ' + id);


    var loyality = '';
    $.ajax({
        type: 'GET',
        async: false,
        url: 'http://localhost/Codeigniter_first/index.php/rest/resource/users/user_id/' + user_id,
        dataType: "json",
        success: function(data) {
            $.each(data, function(i, item) {


                console.log(item.loyality);


                loyality = item.loyality;


            });


        }
    });

    return  loyality.toString();
}
function getloyality(question_id) {
    //console.log('findById: ' + id);


    var user = '';
    $.ajax({
        type: 'GET',
        async: false,
        url: 'http://localhost/Codeigniter_first/index.php/rest/resource/question/question_id/' + question_id,
        dataType: "json",
        success: function(data) {
            $.each(data, function(i, item) {


                //console.log(item.asker_user_id);
                user = item.vote;


            });


        }
    });
    return user.toString();
}
Date.prototype.customFormat = function(formatString) {
    var YYYY, YY, MMMM, MMM, MM, M, DDDD, DDD, DD, D, hhh, hh, h, mm, m, ss, s, ampm, AMPM, dMod, th;
    var dateObject = this;
    YY = ((YYYY = dateObject.getFullYear()) + "").slice(-2);
    MM = (M = dateObject.getMonth() + 1) < 10 ? ('0' + M) : M;
    MMM = (MMMM = ["January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"][M - 1]).substring(0, 3);
    DD = (D = dateObject.getDate()) < 10 ? ('0' + D) : D;
    DDD = (DDDD = ["Sunday", "Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday"][dateObject.getDay()]).substring(0, 3);
    th = (D >= 10 && D <= 20) ? 'th' : ((dMod = D % 10) == 1) ? 'st' : (dMod == 2) ? 'nd' : (dMod == 3) ? 'rd' : 'th';
    formatString = formatString.replace("#YYYY#", YYYY).replace("#YY#", YY).replace("#MMMM#", MMMM).replace("#MMM#", MMM).replace("#MM#", MM).replace("#M#", M).replace("#DDDD#", DDDD).replace("#DDD#", DDD).replace("#DD#", DD).replace("#D#", D).replace("#th#", th);

    h = (hhh = dateObject.getHours());
    if (h == 0)
        h = 24;
    if (h > 12)
        h -= 12;
    hh = h < 10 ? ('0' + h) : h;
    AMPM = (ampm = hhh < 12 ? 'am' : 'pm').toUpperCase();
    mm = (m = dateObject.getMinutes()) < 10 ? ('0' + m) : m;
    ss = (s = dateObject.getSeconds()) < 10 ? ('0' + s) : s;
    return formatString.replace("#hhh#", hhh).replace("#hh#", hh).replace("#h#", h).replace("#mm#", mm).replace("#m#", m).replace("#ss#", ss).replace("#s#", s).replace("#ampm#", ampm).replace("#AMPM#", AMPM);
}