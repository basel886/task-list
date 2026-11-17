<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <title>قائمة المهام</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light py-5">
    <div class="container" style="max-width: 700px;">
        <div class="card shadow-sm p-4 mb-4">
            @isset($task)
                <h2 class="mb-4 text-center">تعديل المهمة</h2>
                <form action="/update" method="POST">
                    @csrf
                    <input type="hidden" name="id" value="{{ $task->id }}">
                    <div class="mb-3">
                        <label for="name" class="form-label">اسم المهمة</label>
                        <input type="text" name="name" id="name" class="form-control" value="{{ $task->name }}" required>
                    </div>
                    <button type="submit" class="btn btn-warning w-100">تعديل</button>
                </form>
            @else
                <h2 class="mb-4 text-center">إدارة المهام</h2>
                <form action="/tasks" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="name" class="form-label">اسم المهمة</label>
                        <input type="text" name="name" id="name" class="form-control" required placeholder="أدخل اسم المهمة هنا...">
                    </div>
                    <button type="submit" class="btn btn-primary w-100">إضافة مهمة</button>
                </form>
            @endisset
        </div>

        <div class="card shadow-sm p-4">
            <h4 class="mb-3">المهام الحالية</h4>
            <table class="table table-striped align-middle">
                <thead>
                    <tr>
                        <th>رقم المهمة</th>
                        <th>اسم المهمة</th>
                        <th>الإجراءات</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($tasks as $t)
                    <tr>
                        <td>{{ $t->id }}</td>
                        <td>{{ $t->name }}</td>
                        <td>
                            <form action="/delete/{{ $t->id }}" method="POST" style="display:inline-block;">
                                @csrf
                                <button type="submit" class="btn btn-danger btn-sm">حذف</button>
                            </form>

                            <form action="/edit/{{ $t->id }}" method="POST" style="display:inline-block;">
                                @csrf
                                <button type="submit" class="btn btn-warning btn-sm">تعديل</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>