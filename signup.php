<!DOCTYPE html>
<html>
    <head>
        <title>Todo List</title>
        <link
            href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css"
            rel="stylesheet"
            />
        <link
            rel="stylesheet"
            href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css"
            />
        <style type="text/css">
            body {
                background: #fff;
            }
        </style>
    </head>
    <body>
    <div class="card rounded shadow-sm mx-auto my-4" style="max-width: 500px;">
        <div class="card-body">
            <h3 class="card-title mb-3">Sign up a new account</h3>
            <?php 
                // 1. check if there is a err
                if ( isset( $_SESSION['error'] ) ) : ?>
                <div class="alert alert-danger" role="alert">
                    <?= $_SESSION['error']; ?>
                    <?php
                        // once it's printed, you delete the session
                        unset( $_SESSION['error'] );
                    ?>
                </div>
            <?php endif; ?>
            <form action="do_signup.php" method="POST">
                <div class="mb-3">
                    <label for="name" class="form-label">Name</label>
                    <input type="text" class="form-control" id="name" name="name">
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">Email address</label>
                    <input type="email" class="form-control" id="email" name="email">
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" class="form-control" id="password" name="password">
                </div>
                <div class="mb-3">
                    <label for="confirm_password" class="form-label">Confirm Password</label>
                    <input type="password" class="form-control" id="confirm_password" name="confirm_password">
                </div>
                <div class="d-grid">
                    <button type="submit" class="btn btn-primary btn-fu">Sign Up</button>
                </div>
            </form>
        </div>
    </div>
    <div
          class="d-flex justify-content-between align-items-center gap-3 mx-auto pt-3"
          style="max-width: 500px;"
        >
          <a href="/" class="text-decoration-none small"
            ><i class="bi bi-arrow-left-circle"></i> Go back</a
          >
          <a href="/login" class="text-decoration-none small"
            >Don't have an account? Sign up here
            <i class="bi bi-arrow-right-circle"></i
          ></a>
        </div>
      </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
  </body>
</html>