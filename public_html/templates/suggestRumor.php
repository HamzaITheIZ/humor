<!-- Modal -->
<div class="modal fade" id="suggestModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">suggest your rumor</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form onsubmit="return false" id="suggestRumor">
                    <div class="row">
                        <div class="col-lg-12 mb-5">
                            <div class="form-group row">
                                <input type="hidden" id="username" name="username" value="<?php echo $_SESSION['username']; ?>" >
                                <div class="col-md-11">
                                    <input placeholder="title of rumor" class="form-control" id="suggest_rumor_title" name="suggest_rumor_title">
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-md-12">
                                    <textarea class="form-control contact-msg" placeholder="details of rumor" maxlength="1000"  rows="10" id="suggest_article" name="suggest_article" ></textarea>
                                </div>
                            </div>
                            <div class="form-group row">

                                <div class="col-md-12 ml-auto text-right">
                                    <button class="btn  mainBackColor2 text-white " type="submit">Suggest</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>