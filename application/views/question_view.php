 <html>
 <head>
       <title>Question View</title>
     <link href='http://fonts.googleapis.com/css?family=Droid+Sans:400,700' rel='stylesheet'>
        <link rel="stylesheet" href="/Codeigniter_first/css/style_1.css">
 <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>


 </head>
 <body align="center">
<div id="content" style="width:800px; margin:0 auto;" >
<div >
<table width="100%" align="center" >
<tr>
	<th rowspan="3" width="10%" >        
	</th>
	<th colspan="3" >
        <div >
		<p align="left" ></p>
          <p align="left">
            <label id="title" font size="20"> </label>
          </p>
        </div>
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
	<td width="10%">
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
                           <!--<br><label id='editDateQuestion'style="display: none;"></label></br>-->
	</td>
	<td width="15%">
           
            <Button id='tag' style=" background-color: #C0C0C0; "></Button>
       
		
	</td>
</tr>
<tr>
<td></td>
<td colspan="4">
	
    <label id='editDateQuestion'style="display: none;"></label>
        <p><div id='button-div'> 
        </div> </p>		
	</td>
</tr>	
</table>       
</div >
</div >
<!--<table width="75%" align="center">
<td width="15%"></td>
<td colspan="4">
    </td>
</table>-->
	<div id="answer_content" style="width:800px; margin:0 auto;"  >
	<div id="answer"  >
	</div>
	<label id='anwer_user'></label>
    <label ></label>

    <label id='dateAnswer'></label>
    <label > </label>
    <label ></label>

    <!--        </p>    
            <label id='answer_useful_lable'></label>
            </p>
            <button type="button" id='answer_yes'/>
            <button type="button"  id='answer_no'/>-->

</div>
<div id="post_content" style="width:800px; margin:0 auto;" >
    <div id="close_content">


  <label id='close_lable'>This Question is closed</label>
        <div id="close_reason" style="width:800px; margin:0 auto;" >

        </div>


        <label id='close_user_name'></label>
    </div>
    <div id="add_answer_content" style="width:800px; margin:0 auto;">

        <label id='add_answer_lable'>Your answer</label>
        <p>
            <textarea  id="add_anwser_text"rows="6" cols="80"  name="add_anwser_text"placeholder="description">

            </textarea>
        </p>
        <button id='add_answer_button' >Post</button>
    </div>
</div>


</body>

<script  src="/Codeigniter_first/js/question.js " ></script>
</html>