<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.23/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="<?php echo base_url(); ?>add_file/css/animation.css">
    <title>Sign In Page</title>

    <!-- Bootstrap core CSS -->
    <link href="dokumenengineering/application/css/bootstrap.min.css" rel="stylesheet">
    <link href="dokumenengineering/application/css/bootstrap.css" rel="stylesheet">
    <!-- Custom styles for this template -->
    <link href="dokumenengineering/application/signin.css" rel="stylesheet">
  </head>

  <body class="text-center">
    <?php echo form_open('page/loginProcess');?> 

    <form class="form-signin">
      <img class="mb-4" src="/dokumenengineering/LogoElitech.jpeg" alt="" width="140" height="50">
      <h1 class="h3 mb-3 font-weight-normal">Please sign in</h1>
      <label for="inputEmail" class="sr-only">Email address</label>
      <input type="email" name="inputEmail" id="inputEmail" class="form-control" placeholder="Email address" required autofocus>
      <label for="inputPassword" class="sr-only">Password</label>
      <input type="password" name="inputPassword" id="inputPassword" class="form-control" placeholder="Password" required>
      <div class="checkbox mb-3">
        <label>
          <input type="checkbox" value="remember-me"> Remember me
        </label>
      </div>
      <input class="btn btn-primary" id="submit" type="submit" value="Sign In"/>
      <p class="mt-5 mb-3 text-muted">PT. Sinko Prima Alloy &copy; 2021</p>
    </form>
  </body>
</html>