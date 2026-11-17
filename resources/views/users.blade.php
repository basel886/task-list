<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <title>إدارة المستخدمين</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light py-5">
    <div class="container" style="max-width: 700px;">
        <div class="card shadow-sm p-4 mb-4">
            @isset($user)
                <h2 class="mb-4 text-center">تعديل بيانات المستخدم</h2>
                <form action="/users/update" method="POST">
                    @csrf
                    <input type="hidden" name="id" value="{{ $user->id }}">
                    <div class="mb-3">
                        <label for="name" class="form-label">اسم المستخدم</label>
                        <input type="text" name="name" id="name" class="form-control" value="{{ $user->name }}" required>
                    </div>
                    <button type="submit" class="btn btn-warning w-100">تعديل المستخدم</button>
                </form>
            @else
                <h2 class="mb-4 text-center">إدارة المستخدمين</h2>
                <form action="/users" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="name" class="form-label">اسم المستخدم</label>
                        <input type="text" name="name" id="name" class="form-control" required placeholder="أدخل اسم المستخدم هنا...">
                    </div>
                    <button type="submit" class="btn btn-primary w-100">إضافة مستخدم</button>
                </form>
            @endisset
        </div>

        <div class="card shadow-sm p-4">
            <h4 class="mb-3">المستخدمون الحاليون</h4>
            <table class="table table-striped align-middle">
                <thead>
                    <tr>
                        <th>رقم المستخدم</th>
                        <th>اسم المستخدم</th>
                        <th>الإجراءات</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($users as $u)
                    <tr>
                        <td>{{ $u->id }}</td>
                        <td>{{ $u->name }}</td>
                        <td>
                            <form action="/users/delete/{{ $u->id }}" method="POST" style="display:inline-block;">
                                @csrf
                                <button type="submit" class="btn btn-danger btn-sm">حذف</button>
                            </form>

                            <form action="/users/edit/{{ $u->id }}" method="POST" style="display:inline-block;">
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