<!-- Modal -->
<div class="modal fade" id="historyModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Consult History</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <h1 class="titleH1" style="text-align: center;">History</h1>
                <br>
                <table class="table table-striped table-bordered text-center" id="consult_history">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Operation</th>
                            <th>Admin Name</th>
                            <th>Operation Date</th>
                        </tr>
                    </thead>
                    <tbody id="get_history">

                    </tbody>
                </table>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>