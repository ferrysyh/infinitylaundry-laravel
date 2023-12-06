<div id="register-popup" class="popup">
    <div class="popup-content">
        <span class="close" id="close-register-popup">&times;</span>
        <form method="post" id="register-form" action="validator/register.php">
            <div class="form-group">
                <label for="name">Nama:</label>
                <input type="text" id="name" name="name" required>
            </div>
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" id="email" name="email" required>
            </div>
            <div class="form-group">
                <label for="username">Username:</label>
                <input type="text" id="username" name="username" required>
            </div>
            <div class="form-group">
                <label for="password">Password:</label>
                <input type="password" id="password" name="password" required>
            </div>
            <div class="form-group">
                <label for="role">Daftar sebagai:</label>
                <select id="role" name="role">
                    <option value="customer">Customer</option>
                    <option value="owner">Owner</option>
                </select>
            </div>
            <div class="form-group text-end">
                <button type="submit" name="register" class="btn btn-primary">Daftar</button>
            </div>
        </form>
    </div>
</div>