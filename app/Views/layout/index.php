<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title> <?= $title ?> </title>
    <script src="https://code.jquery.com/jquery-3.5.0.js"></script>
    <!-- Custom fonts for this template-->
    <script src="https://kit.fontawesome.com/db16c7444a.js" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="<?= base_url() . "/public"; ?>/css/sb-admin-2.min.css" rel="stylesheet">

    <!-- Custom styles for this page -->
    <link href="<?= base_url() . "/public"; ?>/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="<?= base_url() . "/public"; ?>/vendor/bootstrap-select/dist/css/bootstrap-select.css">
    <link rel="apple-touch-icon" sizes="76x76" href="/apple-icon-76x76.png">
</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <?= $this->include('layout/sidebar') ?>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <?= $this->include('layout/topbar') ?>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <?= $this->renderSection('page-content') ?>
                <!-- /.container-fluid -->
            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; Pondok Pesantren Al-Jihad Surabaya <?= date('Y') ?></span>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" href="<?= base_url('logout') ?>">Logout</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap core JavaScript-->
    <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></!--> -->
    <script src="<?= base_url() . "/public"; ?>/vendor/jquery/jquery.min.js"></script>
    <script src="<?= base_url() . "/public"; ?>/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="<?= base_url() . "/public"; ?>/vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="<?= base_url() . "/public"; ?>/js/sb-admin-2.min.js"></script>
    <script src="<?= base_url() . "/public"; ?>/js/script.js"></script>

    <!-- Page level plugins -->
    <script src="<?= base_url() . "/public"; ?>/vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="<?= base_url() . "/public"; ?>/vendor/datatables/dataTables.bootstrap4.min.js"></script>
    <script src="<?= base_url() . "/public"; ?>/vendor/bootstrap-select/dist/js/bootstrap-select.js"></script>
    <!-- Page level custom scripts -->
    <script src="<?= base_url() . "/public"; ?>/js/demo/datatables-demo.js"></script>

    <!-- css untuk dijalankan pada localhost (contoh base_url) 
    <script src="<?= base_url()?>/vendor/jquery/jquery.min.js"></script> -->

    <!-- Scripts datePicker year -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.2.0/css/datepicker.min.css" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.2.0/js/bootstrap-datepicker.min.js"></script>

</body>

<!-- ajax for datepicker -->
<script>
    jQuery(document).ready(function($) {
        $('#datepicker').datepicker({
            minViewMode: 'years',
            format: 'yyyy',
            startDate: "2011",
            endDate: 'year',
            autoclose: true
        });
    })
</script>
<!-- end of ajax for datepicker -->

<!-- ajax for tambah santri -->
<script type=text/javascript>
    $('#gender').on('change', function() {
        var item = $(this).val();

        if (item) {
            $.ajax({
                type: "GET",
                url: "getKamar/" + item,
                success: function(res) {
                    if (res) {
                        $("#kamar").empty();
                        $("#kamar").append('<option selected disabled>Pilih Kamar</option>');
                        var dataObj = jQuery.parseJSON(res);
                        if (dataObj) {
                            $(dataObj).each(function() {
                                $("#kamar").append('<option value="' + this.id_kamar + '">' + this.nama_kamar + '</option>');
                            });
                        } else {
                            $("#kamar").empty();
                        }
                    } else {
                        $("#kamar").empty();
                    }
                }
            });
        } else {
            $("#kamar").empty();
        }
    });

    // clear form when modal closed
    $('#modal_tambah').on('hidden.bs.modal', function(e) {
        $(this).find('form')[0].reset();
    });
</script>
<!-- end of ajax for tambah santri -->