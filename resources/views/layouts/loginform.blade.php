<div id="login-popup" class="popup">
    <div class="popup-content">
        <span class="close" id="close-login-popup">&times;</span>
        <form method="post" id="login-form" action="postLogin">
            @csrf
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" id="email" name="email" required>
            </div>
            <div class="form-group">
                <label for="password">Password:</label>
                <input type="password" id="password" name="password" required>
            </div>
            {{-- <div class="form-group">
                <label for="role">Masuk sebagai:</label>
                <select id="role" name="role">
                    <option value="customer">Customer</option>
                    <option value="owner">Owner</option>
                </select>
            </div> --}}
            <div class="form-group text-end">
                <button type="submit" name="login" class="btn btn-primary">Login</button>
            </div>
        </form>
    </div>
</div>