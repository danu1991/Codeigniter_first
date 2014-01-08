<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of rest
 *
 * @author ENVY i7
 */
class Rest extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('user');
        $this->load->model('question');
        $this->load->model('answer');
        $this->load->model('catagory');
        $this->load->model('reputationVote');
        $this->load->model('loyalityVote');
        $this->load->model('tag');
        $this->load->model('votedUser');
        //  $this->load->model('module'); 
    }

    // we'll explain this in a couple of slides time
    public function _remap() {
        // first work out which request method is being used
        $request_method = $this->input->server('REQUEST_METHOD');
        switch (strtolower($request_method)) {
            case 'get' : $this->get();
                break;
            case 'post': $this->post();
                break;
            default:
                show_error('Unsupported method', 404); // CI function for 404 errors
                break;
        }
    }

    public function get() {
        // we assume the URL is constructed using name/value pairs
        $args = $this->uri->uri_to_assoc(2);
        switch ($args['resource']) {
            case 'users' :
                //  $res = $this->answer->deleteAnswerByUserId('');
                $res = $this->user->get($args);

                // $res = $this->question-> deleteUserWithQuestion($args);
                if ($res === false) {
                    show_error('Unsupported request', 404);
                } else {
                    // assume we get back an array of data - now echo it as JSON
                    echo json_encode($res);
                }
                break;
            case 'question':

                $res = $this->question->get($args);

                if (isset($args['question_id'])) {
                    $isView = $this->user->checkSessionInViewQuestion($args['question_id']);


                    if ($isView == true) {
                        $isloggin = $this->user->is_loggedin();
                        if ($isloggin == false) {
                            $this->question->updateViewsOfQuestion($args['question_id']);
                        } else {
                            $userType = $this->user->getUserType($isloggin);
                            if ($userType != '3') {

                                $this->question->updateViewsOfQuestion($args['question_id']);
                            }
                        }
                    }
                }

                if ($res === false) {
                    show_error('Unsupported request', 404);
                } else {
                    // assume we get back an array of data - now echo it as JSON
                    echo json_encode($res);
                }
                break;

            case 'answer':


                $res = $this->answer->get($args);

                if ($res === false) {
                    show_error('Unsupported request', 404);
                } else {

                    echo json_encode($res);
                }
                break;
            case 'answer_list':

                $user_id = $this->user->getUserId($args['user_name']);


                $res = $this->answer->getAnswerList($user_id);

                if ($res === false) {
                    show_error('Unsupported request', 404);
                } else {

                    echo json_encode($res);
                }
                break;
            case 'catagory':
                $res = $this->catagory->get($args);
                if ($res === false) {
                    show_error('Unsupported request', 404);
                } else {
                    // assume we get back an array of data - now echo it as JSON
                    echo json_encode($res);
                }
                break;
            case 'tag':
                $res = $this->tag->get($args);
                if ($res === false) {
                    show_error('Unsupported request', 404);
                } else {
                    // assume we get back an array of data - now echo it as JSON
                    echo json_encode($res);
                }
                break;
            case 'reputation':
                $res = $this->user->get($args);
                if ($res === false) {
                    show_error('Unsupported request', 404);
                } else {
                    // assume we get back an array of data - now echo it as JSON
                    echo json_encode($res);
                }
                break;
            case 'loyality':
                $res = $this->loyalityVote->get($args);
                if ($res === false) {
                    show_error('Unsupported request', 404);
                } else {
                    // assume we get back an array of data - now echo it as JSON
                    echo json_encode($res);
                }
                break;
            case 'search':


                $res = $this->question->tabsearch($args);


                if ($res === false) {
                    show_error('Unsupported request', 404);
                } else {
                    // assume we get back an array of data - now echo it as JSON
                    echo json_encode($res);
                }
                break;
            case 'islogin':

                $isloggin = $this->user->is_loggedin();
                if ($isloggin == false) {
                    echo json_encode($isloggin);
                } else {


                    echo json_encode($isloggin);
                }
                break;
            case 'tutor_pending':

                $isloggin = $this->user->is_loggedin();
                if ($isloggin == false) {

                    echo json_encode(array('error' => 'Please login ', 'status' => 1));
                } else {
                    $userType = $this->user->getUserType($isloggin);

                    if ($userType == '3') {

                        $userType = $this->user->getPendingTutorRequests();
                        if ($userType == false) {
                            echo json_encode($userType);
                        } else {
                            echo json_encode($userType);
                        }
                    } else {
                        echo json_encode(array('error' => 'Please login', 'status' => 1));
                    }
                }
                break;

            case 'search_user':
                $isloggin = $this->user->is_loggedin();
                if ($isloggin == false) {
                    echo json_encode(array('error' => "Please login", 'status' => 1));
                } else {
                    $userType = $this->user->getUserType($isloggin);

                    if ($userType == '3') {

                        $res = $this->user->searchUser($args['user_name']);


                        if ($res === false) {

                            echo json_encode(array('error' => 'unable to enroll', 'status' => 1));
                        } else {
                            echo json_encode($res);
                        }
                    } else {
                        echo json_encode(array('error' => "Please login as a admin", 'status' => 1));
                    }
                }


                break;
            case 'flag_questions':

                $isloggin = $this->user->is_loggedin();
                if ($isloggin == false) {

                    echo json_encode(array('error' => 'Please login ', 'status' => 1));
                } else {
                    $userType = $this->user->getUserType($isloggin);

                    if ($userType == '3') {

                        $res = $this->question->getFlagQuestion();

                        echo json_encode($res);
                    } else {
                        echo json_encode(array('error' => 'Please login', 'status' => 1));
                    }
                }
                break;
            default:
                show_error('Unsupported resource', 404);
                break;
        }
    }

    public function post() {

        $args = $this->uri->uri_to_assoc(2);




        switch ($args['resource']) {
            case 'question' :

                $isloggin = $this->user->is_loggedin();
                if ($isloggin == false) {
                    echo json_encode(array('error' => 'Please login ', 'status' => 1));
                } else {

                    $asker_user_id = $this->user->getUserId($isloggin);

                    $question_title = $this->input->post('question_title');
                    $question_discription = $this->input->post('question_description');
                    $question_tag = $this->input->post('tag');
                    $question_catagory = $this->input->post('question_catagory');
                    $question_date = $this->input->post('date');

                    //echo '$question_title'+$question_title;
                    //echo var_dump("dump  "+$question_title);
                    //var_dump($question_title, $question_discription, $question_tag, $question_catagory, $question_date, $asker_iser_id);
                    if ($question_title === '' || $question_discription === '' || $question_tag === '' || $question_catagory === '' || $question_date === '' || $asker_user_id === '') {
                        echo json_encode(array('error' => 'unable to post', 'status' => "data missing"));
                    } else {

                        $res = $this->question->enroll($question_title, $question_discription, $question_tag, $question_catagory, $question_date, $asker_user_id);
                        if ($res === false) {
                            echo json_encode(array('error' => 'unable to enroll', 'status' => 1));
                        } else {
                            echo json_encode(array('status' => 0));
                            $this->tag->post($res, $question_tag);
                        }
                    }
                }
                break;
            case 'edit_question' :

                $isloggin = $this->user->is_loggedin();
                if ($isloggin == false) {
                    echo json_encode(array('error' => 'Please login ', 'status' => 1));
                } else {

                    $asker_user_id = $this->user->getUserId($isloggin);
                    $question_id = $this->input->post('question_id');

                    $question_title = $this->input->post('question_title');
                    $question_discription = $this->input->post('question_description');
                    $question_tag = $this->input->post('tag');
                    $question_catagory = $this->input->post('question_catagory');
                    $question_date = $this->input->post('date');

                    //echo '$question_title'+$question_title;
                    //echo var_dump("dump  "+$question_title);
                    //var_dump($question_title, $question_discription, $question_tag, $question_catagory, $question_date, $asker_iser_id);
                    if ($question_title === '' || $question_discription === '' || $question_tag === '' || $question_catagory === '' || $question_date === '' || $asker_user_id === '') {
                        echo json_encode(array('error' => 'unable to post', 'status' => "data missing"));
                    } else {


                        $res = $this->question->updateQuestion($question_id, $question_title, $question_discription, $question_tag, $question_catagory, $question_date);

                        if ($res === false) {

                            echo json_encode(array('error' => 'unable to enroll', 'status' => 1));
                        } else {
                            echo json_encode(array('status' => 0));
                            $this->tag->updateTag($question_id, $question_tag);
                        }
                    }
                }
                break;
            case 'edit_answer' :

                $isloggin = $this->user->is_loggedin();
                if ($isloggin == false) {
                    echo json_encode(array('error' => 'Please login ', 'status' => 1));
                } else {

                    $asker_user_id = $this->user->getUserId($isloggin);
                    $answer_id = $this->input->post('answer_id');

                    $answer = $this->input->post('answer');
                    $answer_date = $this->input->post('date');

                    $res = $this->answer->updateAnswer($answer_id, $answer, $answer_date);

                    if ($res === false) {

                        echo json_encode(array('error' => 'unable to enroll', 'status' => 1));
                    } else {
                        echo json_encode(array('status' => 0));
                    }
                }
                break;
            case 'loyality' :
                $question_id = $this->input->post('question_id');
                $vote = $this->input->post('vote');

                $isloggin = $this->user->is_loggedin();
                if ($isloggin == false) {
                    echo json_encode(array('error' => "Please login", 'status' => 1));
                } else {

                    $voted_user_type = $this->user->getUserType($isloggin);
                    if ($voted_user_type != '3') {


                        $voted_user_id = $this->user->getUserId($isloggin);



                        $question_author = $this->question->getAskerUserId($question_id);


                        if ($question_author != $voted_user_id) {
                            $question_id_string = "q" . $question_id;
                            $voted_user = $this->votedUser->getVotedResult($question_id_string, $voted_user_id);
                            if ($voted_user == false) {


                                $this->question->updateVotes($question_id, $vote);
                                $this->user->updateLoyalityVotes($question_author, $vote);
                                $this->votedUser->questionVotedUserInsert($question_id_string, $voted_user_id, $vote);




                                echo json_encode(array('status' => 0));
                            } else if ($voted_user['vote_type'] == $vote) {
                                echo json_encode(array('error' => 'you already voted as useful question', 'status' => 1));
                            } else if ($voted_user['vote_type'] == $vote) {
                                echo json_encode(array('error' => 'you already voted as unuseful question', 'status' => 1));
                            } else {
                                $question_id_string = "q" . $question_id;

                                $this->question->updateVotes($question_id, $vote);
                                $this->user->updateLoyalityVotes($question_author, $vote);
                                $this->votedUser->isVotedUser($question_id_string, $voted_user_id);

                                echo json_encode(array('status' => 0));
                            }
                        } else {
                            echo json_encode(array('error' => 'you can\'t vote your question', 'status' => 1));
                        }
                    } else {
                        echo json_encode(array('error' => 'you can\'t vote  questions', 'status' => 1));
                    }
                }

                break;
            case 'answer' :
                $isloggin = $this->user->is_loggedin();
                if ($isloggin == false) {
                    echo json_encode(array('error' => "Please login", 'status' => 1));
                } else {

                    $answer_user_type = $this->user->getUserType($isloggin);
                    if ($answer_user_type != '3') {

                        $answer_user_id = $this->user->getUserId($isloggin);


                        if ($answer_user_type == "2") {
                            $question_id = $this->input->post('question_id');
                            $answer_discription = $this->input->post('answer');

                            // $res = $this->question->enroll($question_title, $question_discription, $question_tag, $question_catagory, $question_date, $asker_iser_id);
                            $date = $this->input->post('date');
                            //$isAlreadyAnwer = $this->answer->alreadyAnswer($question_id,$answer_user_id);
                            //echo '$question_title'+$question_title;
                            //echo var_dump("dump  "+$question_title);
                            //var_dump($question_title, $question_discription, $question_tag, $question_catagory, $question_date, $asker_iser_id);
                            //if($isAlreadyAnwer==false){
                            if ($answer_user_id === '' || $question_id === '' || $answer_discription === '' || $date === '') {
                                echo json_encode(array('error' => 'unable to enroll', 'status' => 1));
                            } else {
                                $res = $this->answer->enroll($answer_user_id, $question_id, $answer_discription, $date);
                                if ($res === false) {
                                    echo json_encode(array('error' => 'unable to enroll', 'status' => 1));
                                } else {
                                    echo json_encode(array('status' => 0));
                                }
                            }
                            // }else{
                            // echo json_encode(array('error' => "you already answered this question before", 'status' => 1));
                            //    }
                        } else {
                            echo json_encode(array('error' => "you are a student ", 'status' => 1));
                        }
                    } else {
                        echo json_encode(array('error' => "You can't answer for the questions", 'status' => 1));
                    }
                }
                break;
            case 'reputation' :
                $answer_id = $this->input->post('answer_id');
                $vote = $this->input->post('vote');
                $isloggin = $this->user->is_loggedin();
                if ($isloggin == false) {
                    echo json_encode(array('error' => "Please login", 'status' => 1));
                } else {

                    $voted_user_type = $this->user->getUserType($isloggin);
                    if ($voted_user_type != '3') {

                        $voted_user_id = $this->user->getUserId($isloggin);


                        $answer_author = $this->answer->getAnswerUserId($answer_id);


                        if ($answer_author != $voted_user_id) {
                            $answer_id_string = "a" . $answer_id;
                            $voted_user = $this->votedUser->getVotedResult($answer_id_string, $voted_user_id);
                            if ($voted_user == false) {


                                $this->answer->updateVotes($answer_id, $vote);
                                $this->user->updaterReputationVotes($answer_author, $vote);
                                $this->votedUser->questionVotedUserInsert($answer_id_string, $voted_user_id, $vote);

                                echo json_encode(array('status' => 0));
                            } else if ($voted_user['vote_type'] == $vote) {
                                echo json_encode(array('error' => 'you already voted as useful answer', 'status' => 1));
                            } else if ($voted_user['vote_type'] == $vote) {
                                echo json_encode(array('error' => 'you already voted as unuseful answer', 'status' => 1));
                            } else {
                                $answer_id_string = "a" . $answer_id;

                                $this->answer->updateVotes($answer_id, $vote);
                                $this->user->updaterReputationVotes($answer_author, $vote);
                                $this->votedUser->isVotedUser($answer_id_string, $voted_user_id);

                                echo json_encode(array('status' => 0));
                            }
                        } else {
                            echo json_encode(array('error' => 'you can\'t vote your answer', 'status' => 1));
                        }
                    } else {
                        echo json_encode(array('error' => 'you can\'t vote answers', 'status' => 1));
                    }
                }



                break;
            case 'edit_user' :

                $isloggin = $this->user->is_loggedin();
                if ($isloggin == false) {
                    echo json_encode(array('error' => 'Please login ', 'status' => 1));
                } else {

                    $user_id = $this->user->getUserId($isloggin);
                    $edit_user_name = $this->input->post('edit_user_name');
                    $currnt_user_name = $this->input->post('current_user_name');
                    $current_password = $this->input->post('current_password');
                    $new_password = $this->input->post('new_password');

                    //echo '$question_title'+$question_title;
                    //echo var_dump("dump  "+$question_title);
                    //var_dump($question_title, $question_discription, $question_tag, $question_catagory, $question_date, $asker_iser_id);


                    $res = $this->user->editUser($user_id, $currnt_user_name, $edit_user_name, $current_password, $new_password);

                    if ($res === false) {

                        echo json_encode(array('error' => 'current password is not match', 'status' => 1));
                    } else {
                        echo json_encode(array('user_name' => $res, 'status' => 0));
                    }
                }
                break;
            default:
            case 'close_question' :

                $isloggin = $this->user->is_loggedin();
                if ($isloggin == false) {
                    echo json_encode(array('error' => 'Please login ', 'status' => 1));
                } else {
                    $answer_user_type = $this->user->getUserType($isloggin);
                    if ($answer_user_type == "2") {
                        $voted_user_id = $this->user->getUserId($isloggin);
                        $question_id = $this->input->post('question_id');
                        $reason = $this->input->post('close_reason');


                        //echo '$question_title'+$question_title;
                        //echo var_dump("dump  "+$question_title);
                        //var_dump($question_title, $question_discription, $question_tag, $question_catagory, $question_date, $asker_iser_id);


                        $res = $this->question->closeQuestion($question_id, $reason, $voted_user_id);

                        if ($res === false) {

                            echo json_encode(array('error' => 'current password is not match', 'status' => 1));
                        } else {
                            echo json_encode(array('status' => 0));
                        }
                    } else {
                        echo json_encode(array('error' => "yo can't close the questions", 'status' => 1));
                    }
                }
                break;

            case 'delete_user' :
                $user_id = $this->input->post('user_id');

                $user_name = $this->user->getUserName($user_id);

                $isloggin = $this->user->is_loggedin();
                if ($isloggin == false) {

                    echo json_encode(array('error' => 'Please login ', 'status' => 1));
                } else {
                    $userType = $this->user->getUserType($isloggin);

                    if ($userType == '3') {
                        $userTypeDeleted = $this->user->getUserType($user_name);

                        if ($userTypeDeleted == '2') {
                            $this->answer->deleteAnswerByUserId($user_id);
                        }
                        $this->votedUser->deleteVotedUser($user_id);
                        $this->question->deleteUserWithQuestion($user_id);
                        $this->user->deleteUser($user_id);
                        echo json_encode(array('status' => 0));
                    } else {
                        echo json_encode(array('error' => 'Please login as a admin', 'status' => 1));
                    }
                }
                break;
            case 'delete_question' :
                $question_id = $this->input->post('question_id');
                  $isFlag  =$this->input->post('flag');
                $isloggin = $this->user->is_loggedin();

                if ($isloggin == false) {

                    echo json_encode(array('error' => 'Please login ', 'status' => 1));
                } else {
                    $user_id = $this->user->getUserId($isloggin);
                    $question_author = $this->question->getAskerUserId($question_id);
                    $userType = $this->user->getUserType($isloggin);


                    if ($question_author == $user_id) {

                        $this->question->deleteQuestion($question_id);
                        $this->answer->deleteAnswerWithQuestionId($question_id);
                        
                        
                        echo json_encode(array('status' => 0));
                    } else if ($userType == '3') {

                        $this->question->deleteQuestion($question_id);
                        $this->answer->deleteAnswerWithQuestionId($question_id);
                       
                        if($isFlag=='flag'){
                       $this->user->updateLoyalityVotesOnflagQuestions($question_author);
                        }


                        echo json_encode(array('status' => 0));
                    } else {
                        echo json_encode(array('error' => 'Please login as a admin', 'status' => 1));
                    }
                }
                break;
            case 'delete_answer':
                $answer_id = $this->input->post('answer_id');
                $isloggin = $this->user->is_loggedin();
                if ($isloggin == false) {

                    echo json_encode(array('error' => 'Please login ', 'status' => 1));
                } else {
                    $user_id = $this->user->getUserId($isloggin);

                    $answer_author = $this->answer->getAnswerUserId($answer_id);
                    $userType = $this->user->getUserType($isloggin);


                    if ($answer_author == $user_id) {

                        $this->answer->deleteAnswer($answer_id);

                        echo json_encode(array('status' => 0));
                    } else {
                        echo json_encode(array('error' => 'You can\'t delete this answer ', 'status' => 1));
                    }
                }
                break;
            case 'tutor_select' :
                $user_id = $this->input->post('user_id');
                $type = $this->input->post('type');

                $isloggin = $this->user->is_loggedin();
                if ($isloggin == false) {

                    echo json_encode(array('error' => 'Please login ', 'status' => 1));
                } else {
                    $userType = $this->user->getUserType($isloggin);

                    if ($userType == '3') {

                        $res = $this->user->tutorPremitions($user_id, $type);


                        echo json_encode(array('status' => 0));
                    } else {
                        echo json_encode(array('error' => 'Please login', 'status' => 1));
                    }
                }
                break;
            case 'flag' :
                $question_id = $this->input->post('question_id');


                $isloggin = $this->user->is_loggedin();
                if ($isloggin == false) {

                    echo json_encode(array('error' => 'Please login ', 'status' => 1));
                } else {
                    $userType = $this->user->getUserType($isloggin);
                    $user_id = $this->user->getUserId($isloggin);
                    if ($userType != '3') {
                        $loyality = $this->user->getUserLoyality($user_id);
                        if ((int) $loyality > 4) {

                            if ($user_id != $this->question->getAskerUserId($question_id)) {
//                                $this->user->updateLoyalityVotesOnflagQuestions($user_id);
                                $res = $this->question->flagQuestion($question_id, $user_id);
                                if ($res == true) {
                                    echo json_encode(array('status' => 0));
                                } else {
                                    echo json_encode(array('error' => 'You flaged this question before', 'status' => 1));
                                }
                            } else {
                                echo json_encode(array('error' => 'You can\'t flag your question', 'status' => 1));
                            }
                        } else {
                            echo json_encode(array('error' => 'You don\'t have enough loality points to flag this question', 'status' => 1));
                        }
                    } else {
                        echo json_encode(array('error' => 'Please login as a user', 'status' => 1));
                    }
                }
                break;
            default:
                show_error('Unsupported resource', 404);
        }
    }

}

?>
