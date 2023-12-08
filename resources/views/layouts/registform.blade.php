<div id="register-popup" class="popup">
    <div class="popup-content">
        <span class="close" id="close-register-popup">&times;</span>
        <form method="post" id="register-form" action="validator/register.php">
            <div class="form-group">
                <label class="form-label" for="name">Nama:</label>
                <input class="form-control" type="text" id="name" name="name" required>
            </div>
            <div class="form-group">
                <label class="form-label" for="email">Email:</label>
                <input class="form-control" type="email" id="email" name="email" required>
            </div>
            <div class="form-group">
                <label class="form-label" for="password">Password:</label>
                <input class="form-control" type="password" id="password" name="password" required>
            </div>
            <div class="form-group">
                <label class="form-label" for="role">Daftar sebagai:</label>
                <select class="form-control" id="role" name="role" required>
                    <option value="" disabled selected>--Select--</option>
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