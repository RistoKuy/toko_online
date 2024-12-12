<body class="bg-gradient-primary">

    <div class="container">

        <div class="row justify-content-center">
            <div class="card o-hidden border-0 shadow-lg col-lg-6 my-5">
                <div class="card-body p-0">
                    <!-- Nested Row within Card Body -->
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="p-5">
                                <div class="text-center">
                                    <h1 class="h4 text-gray-900 mb-4">Form Registrasi</h1>
                                </div>
                                <form method="post" action="<?php echo base_url('registrasi'); ?>" class="user">
                                    <div class="form-group">
                                        <input type="text" class="form-control form-control-user" id="exampleFirstName" placeholder="Nama" name="nama">
                                        <?php echo form_error('nama', '<div class="text-danger small ml-2">','</div>') ?>
                                    </div>
                                    <div class="form-group">
                                        <input type="text" class="form-control form-control-user" id="exampleLastName" placeholder="Email" name="username">
                                        <?php echo form_error('username', '<div class="text-danger small ml-2">','</div>') ?>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-sm-6 mb-3 mb-sm-0">
                                            <input type="password" class="form-control form-control-user" id="exampleInputPassword" placeholder="Password" name="password_1">
                                            <?php echo form_error('password_1', '<div class="text-danger small ml-2">','</div>') ?>
                                        </div>
                                        <div class="col-sm-6">
                                            <input type="password" class="form-control form-control-user" id="exampleRepeatPassword" placeholder="Repeat Password" name="password_2">
                                            <?php echo form_error('password_2', '<div class="text-danger small ml-2">','</div>') ?>
                                        </div>
                                    </div>
                                    <button type="submit" class="btn btn-primary btn-user btn-block">
                                        Register Account
                                    </button>
                                    <hr>
                                </form>
                                <hr>
                                <div class="text-center">
                                    <a class="small" href="<?php echo base_url('auth/login') ?>">Sudah punya akun? Login!</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

</body>