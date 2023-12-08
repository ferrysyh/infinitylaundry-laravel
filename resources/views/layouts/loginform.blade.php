<div id="login-popup" class="popup">
    <div class="popup-content">
        <span class="close" id="close-login-popup">&times;</span>
        <form method="post" id="login-form" action="postLogin">
            @csrf
            <div class="form-group">
                <label class="form-label" for="email">Email:</label>
                <input class="form-control" type="email" id="email" name="email" required>
            </div>
            <div class="form-group">
                <label class="form-label" for="password">Password:</label>
                <input class="form-control" type="password" id="password" name="password" required>
            </div>
            <div class="form-group text-end">
                <button type="submit" name="login" class="btn btn-primary mt-4">Login</button>
            </div>
        </form>
    </div>
</div>