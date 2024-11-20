<!-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Delete Ticket</title>
    <style>
        /* استخدام نفس الأنماط السابقة */
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
            background-color: #f9f9f9;
            color: #333;
        }
        h1 {
            text-align: center;
            color: #444;
        }
        .confirmation {
            text-align: center;
            margin-top: 50px;
        }
        .confirmation button {
            margin: 10px;
            padding: 10px 20px;
            font-size: 16px;
        }
    </style>
</head>
<body>

    <h1>حذف التذكرة</h1>

    <div class="confirmation">
        <p>هل أنت متأكد أنك تريد حذف هذه التذكرة؟</p>
        <button onclick="window.location.href='perform_delete.php?id=<?php echo $_GET['id']; ?>'">نعم، احذفها</button>
        <button onclick="window.location.href='index.php'">إلغاء</button>
    </div>

</body>
</html> -->
<!DOCTYPE html>
<html lang="ar">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>حذف التذكرة</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
            background-color: #f4f4f4;
            color: #333;
        }
        h1 {
            text-align: center;
            color: #e74c3c;
        }
        .confirmation {
            text-align: center;
            margin-top: 50px;
        }
        .confirmation button {
            margin: 10px;
            padding: 12px 20px;
            font-size: 16px;
            background-color: #e74c3c;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            transition: background-color 0.3s;
        }
        .confirmation button:hover {
            background-color: #c0392b;
        }
    </style>
</head>
<body>

    <h1>حذف التذكرة</h1>

    <div class="confirmation">
        <p>هل أنت متأكد أنك تريد حذف هذه التذكرة؟</p>
        <form action="{{ route('delete.ticket', $ticket->id) }}" method="POST">
            @csrf
            @method('DELETE')
            <button type="submit">نعم، احذفها</button>
            <button type="button" onclick="window.location.href='{{ route('ticket') }}'">إلغاء</button>
        </form>
    </div>

</body>
</html>
