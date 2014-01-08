

$(document).ready(function() {

    var url = '';
    url = "http://localhost/Codeigniter_first/index.php/rest/resource/search_user/user_name/";
    searchUser(url);

});

$('#search_button').on('click', function() {
//      var textboxvalue = $('input[name=search_keyword]').val();
//     $(this).closest('tr').remove(); 
//       console.log("nameeeeeeeee"+textboxvalue) 
    var search = $("#search_keyword").val().trim();

    var catagory = $("#catogaty").val();
    var encodedSearch = encodeURIComponent(search);
    var url = '';
    if (search.length > 0 && catagory === '1') {


        url = "http://localhost/Codeigniter_first/index.php/rest/resource/search_user/user_name/" + encodedSearch;
        searchUser(url);
    } else if (search.length > 0 && catagory === '2') {
        url = "http://localhost/Codeigniter_first/index.php/rest/resource/search/catagary/0/title/" + encodedSearch + "/new";

        seachQuestion(url);
    } else if (search.length === 0) {
        alert('please fill the search');
    }



});

function searchUser(url) {
    var header = '';
    $.ajax({
        type: 'GET',
        url: url,
        dataType: "json",
        success: function(result) {
            var trHTML = '';
            var user_type = '';
            var user_score = '';
              var user_details='';
            console.log('data: ' + result);

            if (!result.length > 0) {


                alert("no result found in this search user");
            } else {
                document.getElementById("records_table").innerHTML = "";

                header = '<thead><tr><th>' + 'User' + '</th><th>' + 'User Role' + '</th><th>' + 'Score' + '</th><th>' + 'Action' + '</th></tr></thead>'
                $('#records_table').append(header);



                $.each(result, function(i, item) {
                    console.log('data: ' + item);


                    //console.log(item.asker_user_id);
                    //  console.log(item);
//                console.log("array cout" + numberOfAnswers(item.question_id));
//                console.log("array cout user" + findByUserId(item.asker_user_id));

                    if (item.user_type == '1') {
                        user_type = 'Student';
                        user_score = item.loyality;
                    } else if (item.user_type == '2') {
                        user_type = 'Tutor';
                        user_score = item.reputation;

                    }
                    if (item.user_type != '3' && item.user_type != '0') {
                  
                        trHTML += '<tr><td>' + '<a href="/Codeigniter_first/index.php/profile/loadView?user=' + item.user_name + '">' + item.user_name + '</td><td>' + user_type + '</td><td>' + user_score + '</td><td>' + '<a href="javascript:deleteUser('+item.user_id +')">' + 'delete'  + '</td></tr>';
                    }


                });
                $('#records_table').append(trHTML);

            }



        }, error: function() {
            alert("Error calling the web service.");
        }

    });
}
function seachQuestion(url) {
    var header = '';
    $.ajax({
        type: 'GET',
        url: url,
        dataType: "json",
        success: function(result) {
            var trHTML = '';

            console.log('data: ' + result);

            if (!result.length > 0) {


                alert("no result found in this search user");
                
            } else {

                document.getElementById("records_table").innerHTML = "";

                header = '<thead><tr><th>' + 'Question' + '</th><th>' + 'Number of answers' + '</th><th>' + 'Action' + '</th></tr></thead>'
                $('#records_table').append(header);

                $.each(result, function(i, item) {

                    //console.log(item.asker_user_id);
                    //  console.log(item);
//                console.log("array cout" + numberOfAnswers(item.question_id));
//                console.log("array cout user" + findByUserId(item.asker_user_id));
                    trHTML += '<tr><td>' + '<a href="/Codeigniter_first/index.php/question/questionView?id=' + item.question_id + '">' + item.question_title + '</td><td>' + item.number_of_answers + '</td><td>' +'<a href="javascript:deleteQuestion('+item.question_id +')">' + 'delete'  + '</td></tr>';



                });
                $('#records_table').append(trHTML);

            }



        }, error: function() {
            alert("Error calling the web service.");
        }

    });


}
function deleteUser(user_id) {

 var agree = confirm("Are you sure you want to delete this user?");
    if (agree) {
  var dataform = {user_id: user_id};

    $.ajax({
        type: 'POST',
        url: 'http://localhost/Codeigniter_first/index.php/rest/resource/delete_user',
        data: dataform,
        success: function(data) {
            console.log(data);



            var response = JSON.parse(data);
            console.log(response);
            //console.log(response.error);
            //console.log(item.asker_user_id);
            if (response.status === 0) {

                alert("successfull");
              
  var url = "http://localhost/Codeigniter_first/index.php/rest/resource/search_user/user_name/";
    searchUser(url);

            } else if (response.status === 1) {

                alert(response.error);
            }





        }
    });
    }else{
           return false;
    }

}
function deleteQuestion(question_id) {

 var agree = confirm("Are you sure you want to delete this question?");
    if (agree) {
  var dataform = {question_id: question_id,flag:"notFlag"};

    $.ajax({
        type: 'POST',
        url: 'http://localhost/Codeigniter_first/index.php/rest/resource/delete_question',
        data: dataform,
        success: function(data) {
            console.log(data);



            var response = JSON.parse(data);
            console.log(response);
            //console.log(response.error);
            //console.log(item.asker_user_id);
            if (response.status === 0) {

                alert("successfull");
              
  var url = "http://localhost/Codeigniter_first/index.php/rest/resource/search/catagary/0/new";
    seachQuestion(url);

            } else if (response.status === 1) {

                alert(response.error);
            }





        }
    });
    }else{
           return false;
    }

}