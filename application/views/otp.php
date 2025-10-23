<!DOCTYPE html>
<html lang="en">

<head>
  <title>Form OTP</title>
</head>

<body>
  <form method="POST" action="<?php echo base_url(); ?>login/cek_otp" accept-charset="utf-8"
    style="margin: 100px auto;box-shadow: 0 0 15px -2px lightgray;width:100%;max-width:600px;padding:20px;box-sizing:border-box;">
    <h1 style="text-align: center;">OTP</h1>
    <center>
      <div style="display: flex;flex-direction:column;margin-bottom:10px;">
        <input placeholder="xxxxxx" name="otp" type="text" id="otp"
          style="padding:8px;border:2px solid lightgray;border-radius:5px;" />
      </div>
      <button type="submit" id="btn-login"
        style="background-color:darkturquoise;border:none;padding:8px 16px;color:white;cursor:pointer;"
        name="submit-login">Login</button>
    </center>
  </form>
</body>

</html>