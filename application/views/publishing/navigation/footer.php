
        <!-- footer -->
        <!-- ============================================================== -->
        <footer class="footer">
            © 2018 Eliteadmin by themedesigner.in
        </footer>
        <!-- ============================================================== -->
        <!-- End footer -->
        <!-- ============================================================== -->
    </div>
    <!-- ============================================================== -->
    <!-- End Wrapper -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- All Jquery -->
    <!-- ============================================================== -->
    <script src="<?php echo base_url('assets/node_modules/jquery/jquery-3.2.1.min.js'); ?>"></script>
    <!-- Bootstrap popper Core JavaScript -->
    <script src="<?php echo base_url('assets/node_modules/popper/popper.min.js'); ?>"></script>
    <script src="<?php echo base_url('assets/node_modules/bootstrap/dist/js/bootstrap.min.js'); ?>"></script>
    <!-- slimscrollbar scrollbar JavaScript -->
    <script src="<?php echo base_url('dist/js/perfect-scrollbar.jquery.min.js'); ?>"></script>
    <!--Wave Effects -->
    <script src="<?php echo base_url('dist/js/waves.js'); ?>"></script>
    <!--Menu sidebar -->
    <script src="<?php echo base_url('dist/js/sidebarmenu.js'); ?>"></script>
    <!--stickey kit -->
    <script src="<?php echo base_url('assets/node_modules/sticky-kit-master/dist/sticky-kit.min.js'); ?>"></script>
    <!--Custom JavaScript -->
    <script src="<?php echo base_url('dist/js/custom.min.js'); ?>"></script>
    <script src="<?php echo base_url('assets/node_modules/jquery-sparkline/jquery.sparkline.min.js'); ?>"></script>
    <!-- ============================================================== -->
    <!-- This page plugins -->
    <!-- ============================================================== -->
    <!--morris JavaScript -->
    <script src="<?php echo base_url('assets/node_modules/raphael/raphael-min.js'); ?>"></script>
    <script src="<?php echo base_url('assets/node_modules/morrisjs/morris.min.js'); ?>"></script>
    <!--Custom JavaScript -->
    <?php foreach($order_count_status as $ordercs){} ?>
    <script type="text/javascript">var order_value = "<?= $ordercs->total_orders ?>";</script>
    <?php foreach($order_count_delivering as $ordercd){} ?>
    <script type="text/javascript">var order_delivering = "<?= $ordercd->total_delivering ?>";</script>
    <?php foreach($order_count_delivering as $ordercdd){} ?>
    <script type="text/javascript">var order_delivered = "<?= $ordercdd->total_delivered ?>";</script>
    <script src="<?php echo base_url('dist/js/ecom-dashboard.js'); ?>"></script>

    <!--morris JavaScript -->
    <script src="<?php echo base_url('assets/node_modules/raphael/raphael-min.js'); ?>"></script>
    <script src="<?php echo base_url('assets/node_modules/morrisjs/morris.min.js'); ?>"></script>
    <script src="<?php echo base_url('assets/node_modules/jquery-sparkline/jquery.sparkline.min.js'); ?>"></script>
    <!-- Popup message jquery -->
    <script src="<?php echo base_url('assets/node_modules/toast-master/js/jquery.toast.js'); ?>"></script>
    <!-- Chart JS -->
    <script src="<?php echo base_url('dist/js/dashboard1.js'); ?>"></script>
    <script src="<?php echo base_url('assets/node_modules/toast-master/js/jquery.toast.js'); ?>"></script>

    <script src="<?php echo base_url('assets/node_modules/datatables/jquery.dataTables.min.js'); ?>"></script>
    <!-- Footable -->
    <script src="<?php echo base_url('assets/node_modules/footable/js/footable.all.min.js'); ?>"></script>
    <script src="<?php echo base_url('assets/node_modules/bootstrap-select/bootstrap-select.min.js'); ?>" type="text/javascript"></script>
    <!--FooTable init-->
    <script src="<?php echo base_url('dist/js/pages/footable-init.js'); ?>"></script>
    <script>
    $(document).ready(function() {
        $('#myTable').DataTable();
        $(document).ready(function() {
            var table = $('#example').DataTable({
                "columnDefs": [{
                    "visible": false,
                    "targets": 2
                }],
                "order": [
                    [2, 'asc']
                ],
                "displayLength": 25,
                "drawCallback": function(settings) {
                    var api = this.api();
                    var rows = api.rows({
                        page: 'current'
                    }).nodes();
                    var last = null;
                    api.column(2, {
                        page: 'current'
                    }).data().each(function(group, i) {
                        if (last !== group) {
                            $(rows).eq(i).before('<tr class="group"><td colspan="5">' + group + '</td></tr>');
                            last = group;
                        }
                    });
                }
            });
            // Order by the grouping
            $('#example tbody').on('click', 'tr.group', function() {
                var currentOrder = table.order()[0];
                if (currentOrder[0] === 2 && currentOrder[1] === 'asc') {
                    table.order([2, 'desc']).draw();
                } else {
                    table.order([2, 'asc']).draw();
                }
            });
        });
    });
    </script>

    <!-- jQuery file upload -->
    <script src="<?php echo base_url('assets/node_modules/dropify/dist/js/dropify.min.js'); ?>"></script>
    <script>
    $(document).ready(function() {
        // Basic
        $('.dropify').dropify();

        // Translated
        $('.dropify-fr').dropify({
            messages: {
                default: 'Glissez-déposez un fichier ici ou cliquez',
                replace: 'Glissez-déposez un fichier ou cliquez pour remplacer',
                remove: 'Supprimer',
                error: 'Désolé, le fichier trop volumineux'
            }
        });

        // Used events
        var drEvent = $('#input-file-events').dropify();

        drEvent.on('dropify.beforeClear', function(event, element) {
            return confirm("Do you really want to delete \"" + element.file.name + "\" ?");
        });

        drEvent.on('dropify.afterClear', function(event, element) {
            alert('File deleted');
        });

        drEvent.on('dropify.errors', function(event, element) {
            console.log('Has Errors');
        });

        var drDestroy = $('#input-file-to-destroy').dropify();
        drDestroy = drDestroy.data('dropify')
        $('#toggleDropify').on('click', function(e) {
            e.preventDefault();
            if (drDestroy.isDropified()) {
                drDestroy.destroy();
            } else {
                drDestroy.init();
            }
        })
    });
    </script>