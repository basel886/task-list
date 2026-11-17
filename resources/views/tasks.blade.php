<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <title>قائمة المهام</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light py-5">
    <div class="container" style="max-width: 600px;">
        <div class="card shadow-sm p-4">
            <h2 class="mb-4 text-center">إدارة المهام</h2>
            
            <!-- فورم إضافة مهمة جديدة -->
            <form action="/tasks" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="name" class="form-label">اسم المهمة</label>
                    <input type="text" name="name" id="name" class="form-label form-control" required placeholder="أدخل اسم المهمة هنا...">
                </div>
                <button type="submit" class="btn btn-primary w-100">إضافة مهمة</button>
            </form>
        </div>
    </div>
</body>
</html>