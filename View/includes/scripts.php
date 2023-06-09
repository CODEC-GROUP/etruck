<div class="modal fade logOut" id="logOut" tabindex="-1" role="dialog" aria-labelledby="logOutLabel" aria-hidden="true">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <div class="modal-header bg-primary">
                <h5 class="modal-title h4 text-white" id="logOutLabel"> Signing Out</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>


            <div class="modal-body">
                <p>Are you sure you want to Sign Out?</p>
                <div class="assign_job_id">

                </div>
                <div>

                    <div class="modal-footer">
                        <button type="button" class="btn  btn-secondary" data-dismiss="modal">Close</button>

                        <a href="logout.php"><button type="button" id="admin_assign_tutor" class="btn  btn-primary">Sign Out</button></a>

                    </div>

                </div>
            </div>
        </div>
    </div>



    <script>
        $(document).ready(function() {
            $('#example').DataTable({
                dom: 'Bfrtip',
                lengthMenu: [
                    [10, 25, 50, -1],
                    ['10 rows', '25 rows', '50 rows', 'Show all']
                ],
                buttons: [
                    'pageLength',
                    {
                        extend: 'excelHtml5',
                        autoFilter: true,
                        sheetName: 'Exported data'
                    },
                    {
                        extend: 'print',
                        messageTop: 'PDF created by PDFMake with Buttons for DataTables.',
                        exportOptions: {
                            columns: ':visible'
                        }
                    },
                    'colvis'
                ],
                columnDefs: [{
                    targets: -1,
                    visible: false
                }]
            });
        });
    </script>

    <script src="assets/js/vendor-all.min.js"></script>
    <script src="assets/js/plugins/bootstrap.min.js"></script>
    <script src="assets/js/pcoded.min.js"></script>
    <!-- chart -->
    <script src="assets/js/plugins/apexcharts.min.js"></script>

    <!-- copied -->
    <!-- <script src="includes/scripts/jquery.js"></script> -->
    <script src="includes/scripts/jquery.dataTables.min.js"></script>
    <script src="includes/scripts/dataTables.buttons.min.js"></script>
    <script src="includes/scripts/buttons.print.min.js"></script>
    <script src="includes/scripts/buttons.colVis.min.js"></script>

    <!-- original -->
    <!-- <script src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.3.2/js/dataTables.buttons.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.3.2/js/buttons.print.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.3.2/js/buttons.colVis.min.js"></script> -->

    <!-- pdf -->

    <!-- copied -->
    <script src="includes/scripts/pdf/pdfmake.min.js"></script>
    <script src="includes/scripts/pdf/vfs_fonts.js"></script>
    <script src="includes/scripts/pdf/buttons.html5.min.js"></script>
    <script src="includes/scripts/jszip.min.js"></script>


    <!-- original -->
    <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/buttons/2.3.2/js/buttons.html5.min.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script> -->
    <!--// pdf -->


    </body>

    </html>