<!-- Outer Row -->
<div class="row justify-content-center">

    <div class="col-lg-9 mt-5">
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
                                <h1 class="h4 text-center text-gray-900 mb-4"><b>Create Member!</b></h1>
                            </div>
                            <hr>
                            <form class="user" method="post" action="<?= base_url('auth/register') ?>">
                                <div class="form-group">
                                    <label>Name</label><span class='required text-danger'>*</span>
                                    <input type="text" class="form-control" id="name"
                                        placeholder="Input Your Name..." name="name" value="<?= set_value('name'); ?>">
                                        <?= form_error('name', '<small class="text-danger pl-3">', '</small>'); ?>
                                </div>
                                <div class="form-group">
                                    <label>Email</label><span class='required text-danger'>*</span>
                                    <input type="text" class="form-control" id="email"
                                        placeholder="Email Address" name="email" value="<?= set_value('email'); ?>">
                                        <?= form_error('email', '<small class="text-danger pl-3">', '</small>'); ?>
                                </div>
                                <label>Password</label><span class='required text-danger'>*</span>
                                <div class="form-group mb-3 row">
                                    <div class="col-sm-6 mb-sm-0">
                                        <input type="password" class="form-control"
                                            id="password1" placeholder="Password" name="password1">
                                    </div>
                                    <div class="col-sm-6">
                                        <input type="password" class="form-control"
                                            id="password2" placeholder="Repeat Password" name="password2">
                                    </div>
                                    <?= form_error('password1', '<small class="text-danger pl-3 ml-2">', '</small>'); ?>
                                </div>
                                <button type="submit" class="btn btn-primary btn-block">
                                    Sign Up
                                </button>
                            </form>
                            <hr>
                            <!-- <div class="text-center">
                                <a class="small" href="forgot-password.html">Forgot Password?</a>
                            </div> -->
                            <div class="text-center">
                                <div class="small">
                                    Already have an account?<br>
                                    <a href="<?= base_url('auth') ?>">Login</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
</div>