

$(document).ready(function() {
    var userName = "";
    userName = document.getElementById('user_name').innerHTML.trim();
    // alert(userName);
    console.log(userName);
    if (!userName.length > 0) {
        $('#nav ul > li').eq(1).hide();
    }

    var parameter = window.location.search.replace("?", ""); // will return the GET parameter 

    var values = parameter.split("=");
    if (values[0].trim() === 'editId') {

        editQuestion(values[1].trim());

    }
});


$("#question-form").submit(function() {

    var parameter = window.location.search.replace("?", ""); // will return the GET parameter 

    var values = parameter.split("=");
    if (values[0].trim() === 'editId') {

        updateQuestion(values[1].trim());

    } else {





        var title = $('#title').val();
        var encodedTitle = encodeURIComponent(title);
        var description = $('#description').val();
        var encodedDescription = encodeURIComponent(description);
        var tag = $('#tag').val();
        var catagory = $('#catogaty').val();
        var now = new Date();
        var utc_now = new Date(now.getUTCFullYear(), now.getUTCMonth(), now.getUTCDate(), now.getUTCHours(), now.getUTCMinutes(), now.getUTCSeconds(), now.getUTCMilliseconds());
        console.log('UTC (in ms): ' + utc_now.getTime());
        // var title = $('#title').val();
        var dateString = utc_now.getTime().toString();
        var userName = document.getElementById('user_name').innerHTML;
        var userId = findByUserName(userName);
        if (!title.trim().length > 0) {

            document.getElementById('error').style.display = "block";
            document.getElementById('error').innerHTML = "Title is missing";
            $('#error').delay(500).fadeOut('slow');

        } else if (!description.trim().length > 0) {

            document.getElementById('error').style.display = "block";
            document.getElementById('error').innerHTML = "Discription is missing";
            $('#error').delay(500).fadeOut('slow');
        } else if (!tag.trim().length > 0) {
            document.getElementById('error').style.display = "block";
            document.getElementById('error').innerHTML = "tags are missing";
            $('#error').delay(500).fadeOut('slow');

        } else if (catagory == '0') {
            document.getElementById('error').style.display = "block";
            document.getElementById('error').innerHTML = "Please select the catagary";
            $('#error').delay(500).fadeOut('slow');

        } else {

            // var formData = "{question_title=" + encodedTitle + "&question_description=" + encodedDescription + "&tag=" + tag+ "&question_catagory=" + catagory+ "&date=" + dateString+ "&asker_user_id=" + userId+"}";  //Name value Pair

            var formData = {question_title: encodedTitle, question_description: encodedDescription, tag: tag, question_catagory: catagory, date: dateString, asker_user_id: userId}; //Array

            console.log("formData" + formData);

            //   var url = "http://localhost/Codeigniter_first/index.php/rest/resource/question/question_title/" + encodeURIComponent(title) + "/question_description/" + encodedDescription + "/tag/" + tag + "/question_catagory/" + catagory + "/date/" + dateString + "/asker_user_id/" + userId;
            //  console.log(url);
            $.ajax({
                url: "http://localhost/Codeigniter_first/index.php/rest/resource/question",
                type: "POST",
                data: formData,
                success: function(data, textStatus, jqXHR)
                {

                    var response = JSON.parse(data);


                    if (response.status === 0) {

                        document.getElementById('success').style.display = "block";
                        document.getElementById('success').innerHTML = "Posted Question !!.";
                        $('#success').delay(2000).fadeOut('slow');
                        setInterval(function() {
                           var form = document.getElementById('question-form');
                        form.submit();
                         
                        }, 2000);

                        // 
                        
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
    }
    return false; // avoid to execute the actual submit of the form.
});

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

function editQuestion(questionId) {


    $.ajax({
        type: 'GET',
        async: false,
        url: 'http://localhost/Codeigniter_first/index.php/rest/resource/question/question_id/' + questionId,
        dataType: "json",
        success: function(data) {
            $.each(data, function(i, item) {
                $("#title").val(item.question_title);
                $("#description").val(item.question_description);

                $("#tag").val(item.tag);
                if (item.question_catagory === '1') {
                    $('#catogaty').val(1);
                } else if (item.question_catagory === '2') {

                    $('#catogaty').val(2);
                }

                console.log(item.question_title);
                console.log(item.question_description);
                console.log(item.tag);




            });


        }
    });


}
function updateQuestion(questionId) {
    var title = $('#title').val();
    var encodedTitle = encodeURIComponent(title);
    var description = $('#description').val();
    var encodedDescription = encodeURIComponent(description);
    var tag = $('#tag').val();
    var catagory = $('#catogaty').val();
    var now = new Date();
    var utc_now = new Date(now.getUTCFullYear(), now.getUTCMonth(), now.getUTCDate(), now.getUTCHours(), now.getUTCMinutes(), now.getUTCSeconds(), now.getUTCMilliseconds());
    console.log('UTC (in ms): ' + utc_now.getTime());
    // var title = $('#title').val();
    var dateString = utc_now.getTime().toString();
    var userName = document.getElementById('user_name').innerHTML;
    var userId = findByUserName(userName);


    // var formData = "{question_title=" + encodedTitle + "&question_description=" + encodedDescription + "&tag=" + tag+ "&question_catagory=" + catagory+ "&date=" + dateString+ "&asker_user_id=" + userId+"}";  //Name value Pair

    var formData = {question_id: questionId, question_title: encodedTitle, question_description: encodedDescription, tag: tag, question_catagory: catagory, date: dateString}; //Array

    console.log("formData" + formData);

    //   var url = "http://localhost/Codeigniter_first/index.php/rest/resource/question/question_title/" + encodeURIComponent(title) + "/question_description/" + encodedDescription + "/tag/" + tag + "/question_catagory/" + catagory + "/date/" + dateString + "/asker_user_id/" + userId;
    //  console.log(url);
    $.ajax({
        url: "http://localhost/Codeigniter_first/index.php/rest/resource/edit_question",
        type: "POST",
        //dataType:"json",
        // contentType: "application/json",
        data: formData,
        success: function(data, textStatus, jqXHR)
        {
            alert(data);
            var response = JSON.parse(data);

            alert(response.status);
            if (response.status === 0) {
                alert('successful');
                ;
                var form = document.getElementById('question-form');
                //  form.submit();
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
    return false;
}