<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-lg-5 col-md-7 col-sm-9">
            <div class="bg-white rounded shadow-sm p-5" style="transition: all 0.3s ease;">
                <h2 class="mb-4 text-center" style="color: #222; font-family: 'Quicksand', sans-serif;">Kayıt Ol</h2>

                <?php if (!empty($error)): ?>
                    <div class="alert alert-danger"><?= htmlspecialchars($error) ?></div>
                <?php endif; ?>
                <?php if (!empty($success)): ?>
                    <div class="alert alert-success"><?= htmlspecialchars($success) ?></div>
                <?php endif; ?>

                <form method="post" action="/register" autocomplete="off">
                    <div class="mb-3">
                        <label for="username" class="form-label">Kullanıcı Adı</label>
                        <input type="text" class="form-control form-control-lg rounded-3" id="username" name="username" required maxlength="50" placeholder="Kullanıcı adınızı girin" value="<?= htmlspecialchars($_POST['username'] ?? '') ?>">
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Şifre</label>
                        <input type="password" class="form-control form-control-lg rounded-3" id="password" name="password" required placeholder="Şifrenizi girin">
                    </div>
                    <div class="mb-3">
                        <label for="confirm" class="form-label">Şifre Tekrar</label>
                        <input type="password" class="form-control form-control-lg rounded-3" id="confirm" name="confirm" required placeholder="Şifrenizi tekrar girin">
                    </div>
                    <div class="d-flex flex-column flex-sm-row justify-content-between align-items-center gap-2 mt-4">
                        <button type="submit" class="btn btn-primary rounded-3 px-4 py-2 w-100 w-sm-auto">Kayıt Ol</button>
                        <a href="/login" class="btn btn-outline-secondary rounded-3 px-4 py-2 w-100 w-sm-auto">Giriş Yap</a>
                    </div>
                </form>

                <p class="text-center mt-3" style="font-size: 14px; color: #666;">
                    Zaten hesabınız var mı? <a href="/login" style="text-decoration: none;">Giriş Yap</a>
                </p>
            </div>
        </div>
    </div>
</div>

<style>
    body {
    font-family: 'Quicksand', sans-serif;
    min-height: 100vh;
    display: flex;
    flex-direction: column; /* üst-alt düzeni */
}

.main-content {
    flex: 1; /* footer’ı aşağı iter */
    display: flex;
    align-items: center;
    justify-content: center;
    padding: 50px 15px; /* mobil uyumlu padding */
}

.bg-white {
    background: rgba(255,255,255,0.95); /* transparan veya hafif opak */
}

.rounded {
    border-radius: 18px !important;
}

.shadow-sm {
    box-shadow: 0 8px 24px rgba(0,0,0,0.08) !important;
}

.form-control, .btn {
    border-radius: 12px !important;
    font-size: 16px;
}

.form-control-lg {
    height: 50px;
    padding: 0 15px;
}

.form-label {
    font-weight: 600;
    color: #495057;
}

.alert {
    border-radius: 12px;
    padding: 10px 15px;
    font-size: 14px;
}

@media (max-width: 576px) {
    .p-5 {
        padding: 30px !important;
    }
    h2 {
        font-size: 24px;
    }
    .btn {
        font-size: 14px;
    }
}

/* Footer */
footer {
    text-align: center;
    padding: 15px;
    background-color: #f8f9fa;
}

</style>
