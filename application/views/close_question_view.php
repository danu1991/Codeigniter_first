<link rel="stylesheet" type="text/css" href="<?= base_url() ?>css/style_1.css" title="" charset="utf-8">
  <title>Close Question</title>
<div id="content" style="width:800px; margin:0 auto;" >
<div >
<table width="75%" align="center" >
<tr>
	<th rowspan="3" width="15%" >
	
          
            <label id='votes_question_lable'>number of votes</label>
        <label id='votes_question'></label>
		
	
	</th>
	<th colspan="4" >
		<p align="left" ></p>
          <p align="left">
            <label id="title" font size="20"> </label>
          </p>
	</th>
</tr>
<tr>
	<td colspan="4">
		 <p>
        	<div id='description'></div>
        </p>		
	</td>
</tr>
<tr>
	<td width="5%">
             <div id="asker_user">
                 <label id='asker_user_name_lable'>Asked by</label>
            <label id='asker_user_name'></label>
        </div>
		
	</td>
	
	<td width="15%">
			 <label id='loyality_user'></label>

	</td>
	<td width="15%">
                 	  <label id='dateQuestion'></label>
	</td>
	<td width="15%">
           
            <Button id='tag' style=" background-color: #C0C0C0; "></Button>
       
		
	</td>
</tr>
<tr>
<td></td>
<td colspan="4">
	

        <div id='button-div'> 
        </div> 		
	</td>
</tr>	
</table>       
</div >
</div >
    <div id="close_question_content" style="width:800px; margin:0 auto;">
     
       <label id='edit_answer_lable'>Reason for closing the question</label>
      <p>
                <textarea  id="close_question_text" name="edit_anwser_text"placeholder="description">

                </textarea>
            </p>
            <button id='close_question_button' class="button round blue image-right ic-right-arrow">Post</label>
     </div>
    </div >
    
     <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
       <script  src="/Codeigniter_first/js/close_question.js"   ></script>
      