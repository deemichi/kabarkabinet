<!-- This Page CSS -->
<link href="<?php echo base_url(); ?>src/assets/extra-libs/datatables.net-bs4/css/dataTables.bootstrap4.css" rel="stylesheet">
<link href="<?php echo base_url(); ?>src/assets/extra-libs/datatables.net-bs4/css/responsive.dataTables.min.css" rel="stylesheet" type="text/css">
<link href="<?php echo base_url(); ?>src/assets/libs/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css" rel="stylesheet" type="text/css">
<link href="<?php echo base_url(); ?>src/assets/libs/select2/dist/css/select2.min.css" rel="stylesheet" type="text/css">
<!-- This Page JS -->
<script src="<?php echo base_url(); ?>src/assets/libs/jquery/dist/jquery.min.js"></script>
<script src="<?php echo base_url(); ?>src/assets/extra-libs/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="<?php echo base_url(); ?>src/assets/extra-libs/datatables.net-bs4/js/dataTables.responsive.min.js"></script>
<script src="<?php echo base_url(); ?>src/assets/libs/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
<script src="<?php echo base_url(); ?>src/assets/libs/select2/dist/js/select2.full.min.js"></script>
<script src="<?php echo base_url(); ?>src/assets/libs/select2/dist/js/select2.min.js"></script>
<!--<div class="card card-body">
    <div class="row">
        <div class="col-md-4 col-xl-2 text-end d-flex justify-content-left mt-3 mt-md-0"><button type="button" class="btn btn-success btn-sm float-left mdi mdi-plus" onclick="tambah_narsum()" style="font-size:14px;">Narsum</button>&nbsp;

        </div>
        <div class="col-md-8 col-xl-10"></div>
    </div>
</div>!-->
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="border-bottom title-part-padding">
                <div class="col-md-4 col-xl-2 text-end d-flex justify-content-left mt-3 mt-md-0"><button type="button" class="btn btn-success btn-sm float-left mdi mdi-plus" onclick="tambah_narsum()" style="font-size:14px;">Narsum</button>&nbsp;

                </div>
                <div class="col-md-8 col-xl-10"></div>
            </div>
            <div class="card-body">

                <!--<h6 class="card-subtitle mb-3">With DataTables you can alter the ordering characteristics of the table at initialisation time. Using the<code>order | option</code>order initialisation parameter,
                    you can set the table to display the data in exactly the order that you want.</h6> !-->
                <div class="table-responsive">
                    <table id="narsum_table" class="table table-bordered display" style="width:100%">
                        <thead>
                            <tr>
                                <th>Aksi</th>
                                <th>Nama</th>
                                <th>Jabatan</th>
                                <th>K/L</th>
                                <th>Awal Jabatan</th>
                                <th>Akhir Jabatan</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody></tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
    var table;

    $(document).ready(function() {

            //datatables
            table = $('#narsum_table').DataTable({

                "processing": true, //Feature control the processing indicator.
                "serverSide": true, //Feature control DataTables' server-side processing mode.
                "order": [], //Initial no order.

                "language": {
                    "sEmptyTable": "Tidak ada data yang tersedia pada tabel ini",
                    "sProcessing": "Sedang memproses...",
                    "sLengthMenu": "Tampilkan _MENU_ data",
                    "sZeroRecords": "Tidak ditemukan data yang sesuai",
                    "sInfo": "Menampilkan _START_ sampai _END_ dari _TOTAL_ data",
                    "sInfoEmpty": "Menampilkan 0 sampai 0 dari 0 data",
                    "sInfoFiltered": "(disaring dari _MAX_ data keseluruhan)",
                    "sInfoPostFix": "",
                    "sSearch": "Cari:",
                    "sUrl": "",
                    "oPaginate": {
                        "sFirst": "Pertama",
                        "sPrevious": "Sebelumnya",
                        "sNext": "Selanjutnya",
                        "sLast": "Terakhir"
                    }
                },

                // Load data for the table's content from an Ajax source
                "ajax": {
                    "url": "<?php echo site_url('narsum/ajax_list') ?>",
                    "type": "POST",
                    "data": function(data) {

                    }
                },

                //Set column definition initialisation properties.
                "columnDefs": [{
                    "targets": [0], //first column / numbering column
                    "orderable": false, //set not orderable
                }, ],




            });


            $('#btn-filter').click(function() {
                    //button filter event click
                    table.ajax.reload(); //just reload table
                }

            );
            $('#btn-reset').click(function() {
                    //button reset event click
                    $('#form-filter')[0].reset();
                    table.ajax.reload(); //just reload table
                }

            );

        }

    );




    function tambah_narsum() {
        save_method = 'add';
        $('#form')[0].reset(); // reset form on modals
        $('.form-group').removeClass('has-error'); // clear error class
        $('.help-block').empty(); // clear error string
        $('#modal_form').modal('show'); // show bootstrap modal
        $('.modal-title').text('Tambah Narsum'); // Set Title to Bootstrap modal title

    }

    function edit_narsum(id) {
        save_method = 'update';
        $('#form')[0].reset(); // reset form on modals
        $('.form-group').removeClass('has-error'); // clear error class
        $('.help-block').empty(); // clear error string


        //Ajax Load data from ajax
        $.ajax({

                url: "<?php echo site_url('narsum/ajax_edit') ?>/" + id,
                type: "GET",
                dataType: "JSON",
                success: function(data) {

                        $('[name="id"]').val(data.id);
                        $('[name="id_kl"]').val(data.id_kl);
                        $('[name="nama"]').val(data.nama);
                        $('[name="jabatan"]').val(data.jabatan);
                        $('[name="awal_jabatan"]').val(data.awal_jabatan);
                        $('[name="akhir_jabatan"]').val(data.akhir_jabatan);
                        $('[name="status"]').val(data.status);
                        $('#modal_form').modal('show'); // show bootstrap modal when complete loaded
                        $('.modal-title').text('Edit Narsum'); // Set title to Bootstrap modal title


                    }

                    ,
                error: function(jqXHR, textStatus, errorThrown) {
                    alert('Error get data from ajax');
                }
            }

        );
    }

    function reload_table() {
        table.ajax.reload(null, false); //reload datatable ajax 
    }

    function save() {
        $('#btnSave').text('Menyimpan...'); //change button text
        $('#btnSave').attr('disabled', true); //set button disable 
        var url;

        if (save_method == 'add') {
            url = "<?php echo site_url('narsum/ajax_add') ?>";
        } else {
            url = "<?php echo site_url('narsum/ajax_update') ?>";
        }

        // ajax adding data to database
        var formData = new FormData($('#form')[0]);

        $.ajax({

                url: url,
                type: "POST",
                data: formData,
                contentType: false,
                processData: false,
                dataType: "JSON",
                success: function(data) {

                        if (data.status) //if success close modal and reload ajax table

                        {
                            $('#modal_form').modal('hide');
                            reload_table();
                        } else {
                            for (var i = 0; i < data.inputerror.length; i++) {
                                $('[name="' + data.inputerror[i] + '"]').parent().parent().addClass('has-error'); //select parent twice to select div form-group class and add has-error class
                                $('[name="' + data.inputerror[i] + '"]').next().text(data.error_string[i]); //select span help-block class set text error string
                            }
                        }

                        $('#btnSave').text('Simpan'); //change button text
                        $('#btnSave').attr('disabled', false); //set button enable 


                    }

                    ,
                error: function(jqXHR, textStatus, errorThrown) {
                    alert('Error adding / update data');
                    $('#btnSave').text('Simpan'); //change button text
                    $('#btnSave').attr('disabled', false); //set button enable 

                }
            }

        );
    }

    function hapus_narsum(id) {
        if (confirm('Yakin akan hapus data ini ?')) {

            // ajax delete data to database
            $.ajax({

                    url: "<?php echo site_url('narsum/ajax_delete') ?>/" + id,
                    type: "POST",
                    dataType: "JSON",
                    success: function(data) {
                            //if success reload ajax table
                            $('#modal_form').modal('hide');
                            reload_table();
                        }

                        ,
                    error: function(jqXHR, textStatus, errorThrown) {
                        alert('Error deleting data');
                    }
                }

            );

        }
    }
</script>
<div class="modal" id="modal_form" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel1">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header d-flex align-items-center">
                <h4 class="modal-title" id="exampleModalLabel1"></h4><button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="#" id="form" class="form-horizontal">
                    <div class="mb-3"><label for="message-text" class="control-label">Nama</label><input type="text" class="form-control" name="nama" id="nama"></div>
                    <div class="mb-3"><label for="message-text" class="control-label">Jabatan</label><input type="text" class="form-control" name="jabatan" id="jabatan"></div>
                    <div class="mb-3"><label for="recipient-name" class="control-label">Sumber K/L</label><input type="hidden" class="form-control" name="id" id="id"><select class="id_kl form-control custom-select" name="id_kl" id="id_kl" style="width: 100%; height:36px;">
                            <option></option><?php
                                                foreach ($websitekl as $website) {
                                                ?><option value="<?php echo $website->id; ?>"><?php echo $website->nama_kl; ?></option><?php
                                                                                                                                    }
                                                                                                                                        ?>
                        </select></div>
                    <div class="mb-3"><label for="message-text" class="control-label">Awal Jabatan</label><input type="text" class="form-control" name="awal_jabatan" id="datepicker1-autoclose"></div>
                    <div class="mb-3"><label for="message-text" class="control-label">Akhir Jabatan</label><input type="text" class="form-control" name="akhir_jabatan" id="datepicker2-autoclose"></div>
                    <div class="mb-3"><label for="message-text" class="control-label">Status</label><select name="status" id="status" class="form-control">
                            <option value="AKTIF">AKTIF</option>
                            <option value="TIDAK AKTIF">TIDAK AKTIF</option>
                        </select></div>
                </form>
            </div>
            <div class="modal-footer"><button type="button" class="btn btn-success" id="btnSave" onclick="save()">Simpan</button><button type="button" class="btn btn-light-danger text-danger font-weight-medium" data-bs-dismiss="modal">Batal</button></div>
        </div>
    </div>
</div>
<script>
    // Date Picker
    jQuery('.mydatepicker, #datepicker, .input-group.date').datepicker();

    jQuery('#datepicker1-autoclose').datepicker({
            autoclose: true,
            todayHighlight: true,
            format: 'yyyy-mm-dd',
        }

    );

    jQuery('#datepicker2-autoclose').datepicker({
            autoclose: true,
            todayHighlight: true,
            format: 'yyyy-mm-dd',
        }

    );


    $(".id_klxxx").select2();
</script>