<!-- Modal -->
<div class="modal fade" id="form_update_rumors" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Modify Rumor</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="POST" id="update_rumor_form" onsubmit="return false;" enctype="multipart/form-data">
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label>Date</label>
                            <input type="text" class="form-control" name="date" id="date" value="<?php echo date("d/m/Y"); ?>" readonly/>
                        </div>
                        <div class="form-group col-md-6">
                            <input type="hidden" name="id" id="id" value=""/>
                            <label>Admin Name</label>
                            <input type="text" class="form-control" name="admin" id="admin" readonly value="Hamza The Z">
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Rumor Type</label>
                        <select class="form-control" id="select_Type" name="select_Type" required/>
                        <option value="Science">Science</option>
                        <option value="Technologie">Technologie</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Title</label>
                        <input class="form-control" type="text" id="title" name="title" placeholder="Write a Title here" required>
                    </div>
                    <div class="form-group">
                        <label>Article</label>
                        <textarea class="form-control" rows="10" id="article" name="article">
                            
                        </textarea>
                    </div>
                    <div class="form-group">
                        <label>Image</label><br>
                        <input class="" type="file" id="file" name="file">
                    </div>
                    <button type="submit" class="btn btn-primary">Modify</button>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>