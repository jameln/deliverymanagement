<div  class="text-left"> 
    <div class="form-group"> 
        <label class="label-control">Title</label> 
        <input type="text" class="form-control"> 
    </div> 
    <div class="form-group "> 
        <label class="label-control">Content</label> 
        <textarea class="form-control"></textarea> 
    </div> 
    <div class="form-group "> 
        <label class="label-control">Photo</label><br>
        <div class="fileinput fileinput-new text-center" data-provides="fileinput"> 
            <div class="fileinput-new thumbnail"> 
                <img src="public/img/image_placeholder.jpg" alt="..."> 
            </div> 
            <div class="fileinput-preview fileinput-exists thumbnail"></div> 
            <div> 
                <span class="btn btn-rose btn-round btn-file"> 
                                    <span class="fileinput-new">Select photo</span> 
                                <span class="fileinput-exists">Change</span> 
                                <input type="file" name="..." /> 
                                </span> 
                <a href="extended.html#pablo" class="btn btn-danger btn-round fileinput-exists" data-dismiss="fileinput"><i class="fa fa-times"></i> Remove</a> 
            </div> 
        </div> 
    </div> 
    <div class="checkbox"> 
        <label> 
            <input type="checkbox" name="status"> Status 
        </label> 
    </div> 
    <div class="form-group"> 
        <label class="label-control">Date</label> 
        <input type="text" class="form-control datetimepicker" value="10/05/2016" /> 
    </div> 
</div>