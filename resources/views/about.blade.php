<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <title>Laravel</title>
    <style>
        body { font-family: Tahoma, sans-serif; background: #f4f4f9; padding: 40px; }
        .box { background: #fff; padding: 20px; border-radius: 8px; width: 400px; box-shadow: 0 0 10px rgba(0,0,0,0.1); }
        input, select, button { width: 100%; padding: 10px; margin-top: 10px; margin-bottom: 15px; border: 1px solid #ccc; border-radius: 4px; }
        button { background: #4f46e5; color: white; border: none; font-weight: bold; cursor: pointer; }
    </style>
</head>
<body>

<div class="box">
    <h2>التطبيق العملي</h2>
    
    @isset($name)
        <p><strong>{{ $name }}</strong></p>
    @endisset

    <form action="/about" method="POST">
        @csrf
        <input type="text" name="name" required>

        <select name="department">
            @foreach($departments as $key => $value)
                <option value="{{ $key }}">{{ $value }}</option>
            @endforeach
        </select>

        <button type="submit">إرسال</button>
    </form>
</div>

</body>
</html>