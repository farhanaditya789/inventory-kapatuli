<!-- Outer Row -->
<div class="row justify-content-center mt-5">

    <div class="col-lg-8 mt-5">
        <div class="text-center text-white h1" style="text-shadow: 2px 5px 5px rgba(0,0,0,0.2);">
            <!-- <img src="<?= base_url('assets/template/img/bread.png') ?>" width="60" height="60" class="mb-2"> -->
            <b>&nbsp;Kapatuli</b>
        </div>

        <div class="card o-hidden border-0 shadow-lg my-5 col-lg-7 mx-auto">
            <div class="card-body p-0">
                <!-- Nested Row within Card Body -->
                <div class="row">
                    <div class="col-lg">
                        <div class="p-5">
                            <div class="text-center">
                                <h1 class="h4 text-center text-gray-900 mb-4"><b>Login to Dashboard!</b></h1>
                            </div>
                            <?= $this->session->flashdata('message') ?>
                            <hr>
                            <form class="user" method="post" action="<?= base_url('auth') ?>">
                                <div class="form-group mt-1">
                                    <label>Email</label>
                                    <input type="text" class="form-control"
                                        id="email" placeholder="Enter Email Address..." name="email" value="<?= set_value('email'); ?>">
                                    <?= form_error('email', '<small class="text-danger pl-3">', '</small>'); ?>
                                </div>

                                <div class="form-group mt-1 mb-4">
                                    <label>Password</label>
                                    <input type="password" class="form-control"
                                        id="password" placeholder="Password" name="password">
                                    <?= form_error('password', '<small class="text-danger pl-3">', '</small>'); ?>
                                </div>
                                <button type="submit" class="btn btn-primary btn-block">
                                    Sign In
                                </button>
                            </form>
                            <!-- <div class="text-center">
                                <a class="small" href="forgot-password.html">Forgot Password?</a>
                            </div> -->
                            <!-- <div class="text-center">
                                <a class="small" href="<?= base_url('auth/register') ?>">Create an Account!</a>
                            </div> -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>