<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-lg-8 col-md-10 col-sm-12 text-center">
            <div class="text-box rounded shadow-sm p-5">
                <h1 class="mb-4" style="font-family: 'Quicksand', sans-serif; color: #222;">Hoşgeldiniz!</h1>
                <p style="font-size: 18px; color: #555; line-height: 1.6;">
                    Bu uygulama ile kendi görevlerinizi kolayca ekleyebilir, güncelleyebilir ve silebilirsiniz. 
                    Her kullanıcı sadece kendi görevlerini görebilir ve yönetebilir. 
                    Kullanıcı girişi yaparak görevlerinizi güvenli bir şekilde takip edebilirsiniz.
                </p>
                <div class="mt-4 d-flex justify-content-center flex-wrap gap-2">
                    <a href="/tasks" class="btn btn-primary rounded-3 px-4 py-2">Görevleri Görüntüle</a>
                    <a href="/tasks/create" class="btn btn-outline-secondary rounded-3 px-4 py-2">Yeni Görev Oluştur</a>
                </div>
                <p class="mt-4" style="font-size: 14px; color: #888;">
                    MVC ve OOP prensiplerine uygun olarak geliştirilmiştir. Destek için: 
                    <a href="https://esatyucel.com" target="_blank" style="text-decoration: none; color: #007bff;">esatyucel.com</a>
                </p>
                <p class="mt-4" style="font-size: 14px; color: #888;">
                    Proje Kaynak Kodları İçin :  
                    <a href="https://github.com/esatyucell/task-managment-system" target="_blank" style="text-decoration: none; color: #007bff;">GitHub Esat Yücel</a>
                </p>
            </div>
        </div>
    </div>
</div>

<style>
   body {
   
    background-size: cover;
    font-family: 'Quicksand', sans-serif;
    min-height: 100vh;
    display: flex;
    flex-direction: column; /* Footer aşağıda kalacak */
}

.main-content {
    flex: 1; /* Footer’ı aşağı iter */
    display: flex;
    align-items: center;
    justify-content: center;
    padding: 50px 15px; /* Mobil uyumlu padding */
}

.text-box {
    background: rgba(255, 255, 255, 0.75);
    backdrop-filter: blur(5px);
    border-radius: 18px;
    box-shadow: 0 8px 24px rgba(0,0,0,0.08);
    padding: 50px;
    max-width: 800px;
    width: 100%;
    text-align: center;
}

@media (max-width: 576px) {
    .text-box {
        padding: 30px;
    }
    h1 {
        font-size: 28px;
    }
    p {
        font-size: 16px;
    }
    .btn {
        font-size: 14px;
        width: 100%;
        margin-bottom: 10px;
    }
}

</style>
