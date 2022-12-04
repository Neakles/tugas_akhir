<!-- Modal Detail Santri -->
<div id="modal_detail" class="modal fade" role="dialog">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Detail Santri</h4>
                <button type="button" class="close" data-dismiss="modal">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row justify-content-center">
                    <div class="col-lg-8">
                        <div class="card mb-3" style="max-width: 540px;">
                            <div class="row g-0">
                                <div class="col-md-8">
                                    <div class="card-body">
                                        <ul class="list-group list-group-flush">
                                            <li class="list-group-item">
                                                <h4><?= $user->fullname; ?></h4>
                                            </li>
                                            <li class="list-group-item"><?= $user->username; ?></li>
                                            <li class="list-group-item"><?= $user->email; ?></li>
                                            <?= d($user); ?>
                                        </ul>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <img src="<?= base_url('/img/' . $user->user_image); ?>" class="img-fluid rounded-start" alt="<?= $user->fullname; ?>">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
            </div>
        </div>
    </div>
</div>
<!-- End of Modal Detail Santri -->