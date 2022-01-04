<form method="post" enctype="multipart/form-data" action="<?php echo FORMURL; ?>project/fileupload" >

        <input type="file" name="myfile" id="myfile">
        <br>
        <p><b>Upload Multiple</b></p>
        <br>
        <input type="file" multiple="" name="images[]">
        <br>
        <input type="submit" name="save" value="upload">
        
      </form>

      <p id="msg"></p>

      <!-- <form enctype="multipart/form-data" class="jNice" accept-charset="utf-8" method="post" action="<?php //echo FORMURL; ?>project/fileuploadv">              
    <fieldset>      
            <label>Title * : </label>                       
            <input type="text" class="text-long" value="" name="title">

            <label>Description : </label>                       
            <textarea class="mceEditor" rows="10" cols="40" name="description"></textarea>

            <label>Image : </label>                     
                                         

            <button class="button-submit" type="submit" name="save" id="">upload</button>
    </fieldset>         
</form> -->