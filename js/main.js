// The root URL for the RESTful services

var rootURL = "Codeigniter_first/index.php/rest";

var currentWine;

// Retrieve wine list when application starts 
//findAll();



// Nothing to delete in initial application state
$(document).ready(function() {



    var userName = "";
    userName = document.getElementById('user_name').innerHTML.trim();
    // alert(userName);
    console.log(userName);
    if (!userName.length > 0) {
        $('#nav ul > li').eq(1).hide();
    }


    if (getUrlVars()["searchkey"]) {
        var searchKey = getUrlVars()["searchkey"];
        console.log(searchKey);
        // document.getElementById("search_keyword").innerHTML=searchKey;
        document.getElementById("search_keyword").value = searchKey;
        searchByHeaderBar(searchKey.trim());
    } else {
        ajax_table();
    }



});
function getUrlVars() {
    var vars = {};
    var parts = window.location.href.replace(/[?&]+([^=&]+)=([^&]*)/gi, function(m, key, value) {
        vars[key] = value;
    });

    return vars;
}

document.getElementById("new-tab").onclick = function() {

    document.getElementById("new-tab").className = "active-tab dashboard-tab";
    document.getElementById("popular-tab").className = "";
    document.getElementById("old-tab").className = "";
    var search = $("#search_keyword").val().trim();
    var tag = $("#tags").val();
    var catagory = $("#catogaty").val();
    var encodedSearch = encodeURIComponent(search);
    var url = '';


    if (search.length > 0 && tag.length === 0) {


        url = "http://localhost/Codeigniter_first/index.php/rest/resource/search/catagary/" + catagory + "/title/" + encodedSearch + '/new';
        searchByTag(url);
    } else if (search.length === 0 && tag.length > 0) {
        url = "http://localhost/Codeigniter_first/index.php/rest/resource/search/tag/" + tag + "/catagary/" + catagory + '/new';
        searchByTag(url);
    } else if (search.length === 0 && tag.length === 0) {
        searchByTag(tag, search, catagory);
        url = "http://localhost/Codeigniter_first/index.php/rest/resource/search/catagary/" + catagory + '/new';
        searchByTag(url);
    } else {
        url = "http://localhost/Codeigniter_first/index.php/rest/resource/search/tag/" + tag + "/catagary/" + catagory + "/title/" + encodedSearch + '/new';
        searchByTag(url);
    }

};
document.getElementById("popular-tab").onclick = function() {
    document.getElementById("new-tab").className = "";
    document.getElementById("popular-tab").className = "active-tab dashboard-tab";

    document.getElementById("old-tab").className = "";


    var search = $("#search_keyword").val().trim();
    var tag = $("#tags").val();
    var catagory = $("#catogaty").val();
    var encodedSearch = encodeURIComponent(search);
    var url = '';
    if (search.length > 0 && tag.length === 0) {


        url = "http://localhost/Codeigniter_first/index.php/rest/resource/search/catagary/" + catagory + "/title/" + encodedSearch + '/popular';
        searchByTag(url);
    } else if (search.length === 0 && tag.length > 0) {
        url = "http://localhost/Codeigniter_first/index.php/rest/resource/search/tag/" + tag + "/catagary/" + catagory + '/popular';
        searchByTag(url);
    } else if (search.length === 0 && tag.length === 0) {
        searchByTag(tag, search, catagory);
        url = "http://localhost/Codeigniter_first/index.php/rest/resource/search/catagary/" + catagory + '/popular';
        searchByTag(url);
    } else {
        url = "http://localhost/Codeigniter_first/index.php/rest/resource/search/new/tag/" + tag + "/catagary/" + catagory + "/title/" + encodedSearch + '/popular';
        searchByTag(url);
    }

};
document.getElementById("old-tab").onclick = function() {
    document.getElementById("new-tab").className = "";
    document.getElementById("popular-tab").className = "";
    document.getElementById("old-tab").className = "active-tab dashboard-tab";
    var search = $("#search_keyword").val().trim();
    var tag = $("#tags").val();
    var catagory = $("#catogaty").val();
    var encodedSearch = encodeURIComponent(search);
    var url = '';
    if (search.length > 0 && tag.length === 0) {


        url = "http://localhost/Codeigniter_first/index.php/rest/resource/search/catagary/" + catagory + "/title/" + encodedSearch + '/old';
        searchByTag(url);
    } else if (search.length === 0 && tag.length > 0) {
        url = "http://localhost/Codeigniter_first/index.php/rest/resource/search/tag/" + tag + "/catagary/" + catagory + '/old';
        searchByTag(url);
    } else if (search.length === 0 && tag.length === 0) {
        searchByTag(tag, search, catagory);
        url = "http://localhost/Codeigniter_first/index.php/rest/resource/search/catagary/" + catagory + '/old';
        searchByTag(url);
    } else {
        url = "http://localhost/Codeigniter_first/index.php/rest/resource/search/new/tag/" + tag + "/catagary/" + catagory + "/title/" + encodedSearch + '/old';
        searchByTag(url);
    }

};
// Register listeners

function ajax_table() {
    var number = 0;
    $.ajax({
        url: "http://localhost/Codeigniter_first/index.php/rest/resource/search/catagary/0/new",
        async: true,
        type: "GET",
        dataType: "json",
        contentType: "application/json",
        success: function(data) {
            setData(data);
            //console.log("gfcyt" + trHTML);
            //$('#records_table tr:last').after(trHTML)
            // $('#ajax-content-container').html(data);
            // alert("sucess web service."+data);

        }, error: function() {
             document.getElementById('error').style.display = "block";
                        document.getElementById('error').innerHTML = "Error calling the web service.";
                        $('#success').delay(2000).fadeOut('slow');
           // alert("Error calling the web service.");
        }
    });


}

function test(pageNumber)
{

    var page = "#content" + pageNumber;
    $('.selection').hide();
    $(page).show();

}
function setData(data)
{

    var trHTML = '';
     var question_title = '';
    //console.log(data);

    $('#contentAll').empty();
    var nextIndex = 0;
    var loopAmount = 10;
    var totalCount = Math.ceil(data.length / 10);
    for (var x = 0; x < totalCount; x++) {
        var divContent = document.createElement("div");
        //divContent.setAttribute('class', 'selection');
        divContent.setAttribute('id', 'content' + x);
        divContent.setAttribute('class', 'selection');
        divContent.setAttribute('style', 'width:1000px; margin:0 auto');
        $("#contentAll").append(divContent);
        console.log('content' + x);
        ((data.length - (x * 10)) > 10) ? loopAmount = 10 : loopAmount = data.length - (x * 10);
        // $.each(data, function(i, item) {
        for (var y = 0; y < loopAmount; y++) {

            var div = document.createElement("div");

            // div.setAttribute('class', 'selection');
            div.setAttribute('id', 'page' + nextIndex);

            //var lineBreakDiv = document.createElement("div2");

            //   lineBreakDiv.setAttribute('class', 'break');
            //   lineBreakDiv.setAttribute('id', 'div2' + nextIndex);
            //lineBreakDiv.set

           if(data[nextIndex].question_title.length>50){
              question_title= data[nextIndex].question_title.substring(0,60);
           
           }else{
               question_title= data[nextIndex].question_title;
           }

            var html = "<table width='100%' align='center' ><tr><th  width='5%' ></th></tr><tr><td colspan='4' width='65%'><div id='descriptionTitle'><p><a href='/Codeigniter_first/index.php/question/questionView?id=" + data[nextIndex].question_id + "'>" +  question_title + "</a></p></div></td></tr><tr><td width='5%'><div id='asker_user'><label id='asker_user_name_lable'>Asked by </label><label id='asker_user_name'><a href=\"" + '/Codeigniter_first/index.php/profile/loadView?user=' + data[nextIndex].user_name + "\">" + data[nextIndex].user_name + "</a></label></div></td><td width='5%'><label id='reputation_user'> Answers :" + data[nextIndex].number_of_answers + "</label></td><td width='5%'><label id='dateQuestion'>" + timeDifference(parseFloat(data[nextIndex].date)) + "</label></td><td width='10%><label id='views'><span style=\"float:left;\">Views "+data[nextIndex].number_of_views+"</label><span></td></tr></table> ";

            div.innerHTML = html;

            // $("#content"+x).append(lineBreakDiv);
            //   trHTML += '<tr><td>' + '<a href="/Codeigniter_first/index.php/question/questionView?id=' + item.question_id + '">' + item.question_title + '</td><td>' + item.number_of_answers + '</td><td>' +'<a href="/Codeigniter_first/index.php/profile/loadView?user=' + item.user_name + '">' +item.user_name + '</td></tr>';
            //  });
            $("#content" + x).append(div);
            nextIndex++;
        }


    }

    //var divContent = document.createElement("div");
    //divContent.setAttribute('class', 'selection');
    //divContent.setAttribute('id', 'content' + i);



    $(function() {
        $('#page-selection').pagination({
            items: data.length,
            itemsOnPage: 10,
            cssStyle: 'compact-theme',
            onPageClick: function(pageNumber) {
                //console.log(pageNumber);
                test(pageNumber - 1);
            }
        });
    });

    $('.question_yes').click(function() {
        var parameter = window.location.search.replace("?", ""); // will return the GET parameter 

        var values = parameter.split("=");
//alert(parameter);
        var valuesSecond = values[1];
        var id = $(this).attr('id');
        var values = id.split(",");
        var questionId = values[0];
      //  alert("id" + questionId);
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
     //   alert("id" + questionId);
        console.log(values[1]);
        questionVotes(questionId, "no", values[1]);
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

function findByName(searchKey) {
    console.log('findByName: ' + searchKey);
    $.ajax({
        type: 'GET',
        async: false,
        url: rootURL + '/search/' + searchKey,
        dataType: "json",
        success: renderList
    });
}
function searchByHeaderBar(searchKey) {
    console.log('findByName: ' + searchKey);
    var encodedSearch = encodeURIComponent(searchKey);
    var number = 0;

    $.ajax({
        type: 'GET',
        url: "http://localhost/Codeigniter_first/index.php/rest/resource/search/catagary/0/title/" + encodedSearch + "/new",
        dataType: "json",
        success: function(result) {
            var trHTML = '';

            console.log('data: ' + result);

            if (!result.length > 0) {
                document.getElementById("search_keyword").value = '';
                ajax_table();

               // alert("no result found in this search catagory");
                 document.getElementById('error').style.display = "block";
                        document.getElementById('error').innerHTML = "No result found in this search catagory";
                        $('#error').delay(2000).fadeOut('slow');
            } else {

                setData(result);



            }



        }, error: function() {
           // alert("Error calling the web service.");
             document.getElementById('error').style.display = "block";
                        document.getElementById('error').innerHTML = "Error calling the web service.";
                        $('#error').delay(2000).fadeOut('slow');
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
function findByUserName(name) {
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
function numberOfAnswers(id) {
    var propCount = 0;
    //console.log('findById: ' + id);
    $.ajax({
        type: 'GET',
        async: false,
        url: 'http://localhost/Codeigniter_first/index.php/rest/resource/answer/question_id/' + id,
        dataType: "json",
        success: function(data) {

            var prop;


            for (prop in data) {
                propCount++;
            }
            // callback(propCount);
            //    console.log("arrayy"+propCount);






        }
    });
    return propCount;
}

$('#search_button').on('click', function() {
 document.getElementById("new-tab").className = "";
    document.getElementById("popular-tab").className = "";
    document.getElementById("old-tab").className = "";
    var search = $("#search_keyword").val().trim();
    var tag = $("#tags").val();
    var catagory = $("#catogaty").val();
    var encodedSearch = encodeURIComponent(search);
    var url = '';
    if (search.length > 0 && tag.length === 0) {


        url = "http://localhost/Codeigniter_first/index.php/rest/resource/search/catagary/" + catagory + "/title/" + search + '/new';
        searchByTag(url);
    } else if (search.length === 0 && tag.length > 0) {
        url = "http://localhost/Codeigniter_first/index.php/rest/resource/search/tag/" + tag + "/catagary/" + catagory + '/new';
        searchByTag(url);
    } else if (search.length === 0 && tag.length === 0) {
        searchByTag(tag, search, catagory);
        url = "http://localhost/Codeigniter_first/index.php/rest/resource/search/catagary/" + catagory + '/new';
        searchByTag(url);
    } else {
        url = "http://localhost/Codeigniter_first/index.php/rest/resource/search/tag/" + tag + "/catagary/" + catagory + "/title/" + encodedSearch + '/new';
        searchByTag(url);
    }



    /*$.ajax({
     type: "GET",
     async: false,
     url: url,
     dataType: "json",
     success: function(result) {
     if (!result.length > 0) {
     
     alert("no result found in this search catagory");
     } else {
     $('#records_table tbody').remove();
     }
     console.log("   nameeeeeeeee" + result);
     var trHTML = '';
     
     $.each(result, function(i, item) {
     
     //console.log(item.asker_user_id);
     console.log(item.question_title);
     console.log("array cout" + numberOfAnswers(item.question_id));
     console.log("array cout user" + findByUserId(item.asker_user_id));
     trHTML += '<tr><td>' + '<a href="/Codeigniter_first/index.php/question/questionView?id=' + item.question_id + '">' + item.question_title + '</td><td>' + numberOfAnswers(item.question_id) + '</td><td>' + findByUserId(item.asker_user_id) + '</td></tr>';
     
     
     
     });
     $('#records_table').append(trHTML);
     
     }
     });*/
});


function searchByTag(url) {



    var trHTML = '';
    var number = 0;
    console.log(url);

    $.ajax({
        type: "GET",
        async: false,
        url: url,
        dataType: "json",
        success: function(result) {
            //  console.log(result);

            if (!result.length > 0) {

            //    alert("No result found in this search catagory");
                  document.getElementById('error').style.display = "block";
                        document.getElementById('error').innerHTML = "No result found in this search catagory";
                        $('#error').delay(2000).fadeOut('slow');
            } else {
setData(result);
            }
        }
    });

}


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

              //  alert("successfull");
                //  document.getElementById(questionId+','+askerId).innerHTML = getloyalityToUser(askerId);

                document.getElementById('votes_question' + questionId).innerHTML = getloyality(questionId);

                //  window.location.reload();
            } else if (response.status === 1) {

                alert(response.error);
            }





        }
    });



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
