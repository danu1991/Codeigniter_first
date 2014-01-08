<link rel="stylesheet" type="text/css" href="<?= base_url() ?>css/style_1.css" title="" charset="utf-8">
<script src="//code.jquery.com/jquery-1.9.1.js"></script>
  <title>Ask Question</title>

<div id="content">
<div id ="error"  class="alert-box error" style="display: none;width:400px; margin:0 auto;"><span>error: </span></div>
<div id ="success"  class="alert-box success" style="display: none;width:400px; margin:0 auto;"><span>error: </span></div>

    <form action="/Codeigniter_first/index.php" method="POST" id="question-form"  novalidate="novalidate" >

        <fieldset>

            <p>

                <input type="text" id="title" size ="100" name="title"   placeholder="Title"  />
            
            </p>

            <p>
                <textarea rows="8" cols="100" id="description" name="description"placeholder="description"></textarea>
            </p>
<p>
<td>
                <input type="text" id="tag" size ="25" name="tag" class="round "placeholder=""  />
                </td><td>
                  <select name="catogaty" id="catogaty" class="round " >
                        <option value="0">select category</option>
                    <option value="1">Java</option>
                    <option value="2">Web</option>
                    
                    

                </select>
                      </td><td>
                     <input type="submit" value="Submit" >
                     </td>
            </p>
            
           
        </fieldset>
        
        
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
       <script  src="/Codeigniter_first/js/ask_question.js"   ></script>
                    <!--<script src="js/main.js"></script>-->  

    </form>

</div>