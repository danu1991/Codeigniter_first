$(document).ready(function() {

    ajax_table();
});
function ajax_table() {
    var header = ''


    $.ajax({
        url: ' http://localhost/Codeigniter_first/index.php/rest/resource/flag_questions',
        async: false,
        type: "GET",
        dataType: "json",
        contentType: "application/json",
        success: function(data) {
            var trHTML = '';
            console.log(data);
            if (!data.length > 0) {

                alert("no flag questions ");
                window.location = "http://localhost/Codeigniter_first/index.php/adminHome/load";
            } else {

                $('#profile_question_table tbody').remove();



                $.each(data, function(i, item) {

                    //console.log(item.asker_user_id);
                    console.log(item.question_title);




                    trHTML += '<tr><td>' + '<a href="/Codeigniter_first/index.php/question/questionView?id=' + item.question_id + '">' + item.question_title + '</a>' + '</td><td>' + '<a href="javascript:deleteQuestion(' + item.question_id + ')" class="table-actions-button ic-table-delete"></a>' + '</td></tr>';
                    console.log("login user");



                });
                $('#profile_question_table').append(trHTML);
            }
        }, error: function() {
            alert("Error calling the web service.");
        }
    });
}
function deleteQuestion(questionId) {

    var retVal = confirm("Are you sure you want to delete this Question?");
    if (retVal) {
        formData = {question_id: questionId,flag:"flag" };

        $.ajax({
            url: ' http://localhost/Codeigniter_first/index.php/rest/resource/delete_question',
            async: false,
            type: "POST",
            data: formData,
            success: function(data) {

                var response = JSON.parse(data);

                if (response.status === 0) {
                    alert("suceessful");
                    window.location.reload();

                } else {


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
