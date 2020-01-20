<?php if ($this->session->flashdata('message')) { ?>
   <p><?= $this->session->flashdata('message') ?></p>
<?php } ?>
<?= form_open(base_url('auth/signin')) ?>
<div>
   <h5>Username</h5>
   <input type="text" name="username" value="<?= set_value('username') ?>" />
   <small><?= form_error('username') ?></small>
</div>

<div class="mb-3">
   <h5>Password</h5>
   <input type="text" name="password" />
   <small><?= form_error('password') ?></small>
</div>

<div>
   <button type="submit">Login</button>
</div>
</form>