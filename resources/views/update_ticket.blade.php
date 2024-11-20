
<!DOCTYPE html>
<html lang="ar">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>تحديث التذكرة</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
            background-color: #f4f4f4;
            color: #333;
        }
        h1 {
            text-align: center;
            color: #2c3e50;
        }
        form {
            max-width: 500px;
            margin: 0 auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        }
        input, textarea {
            width: 100%;
            padding: 12px;
            margin: 10px 0;
            border: 1px solid #ccc;
            border-radius: 4px;
        }
        button {
            padding: 12px 20px;
            background-color: #3498db;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            transition: background-color 0.3s;
        }
        button:hover {
            background-color: #2980b9;
        }
    </style>
</head>
<body>

    <h1>updating ticket </h1>

    <form action="{{ route('update.ticket', $ticket->id) }}" method="POST">
        @csrf
        @method('PUT')
        <input type="hidden" name="id" value="{{ $ticket->id }}">
        <label for="ticket_name">ticket_name</label>
        <input type="text" id="ticket_name" name="ticket_name" value="{{ $ticket->ticket_name }}" required>

        <label for="description">description:</label>
        <textarea id="description" name="description" required>{{ $ticket->description }}</textarea>

        <label for="dead_line">dead_line</label>
        <input type="date" id="dead_line" name="dead_line" value="{{ $ticket->dead_line }}" required>
        <div class="form-group">
                <label for="status">Status</label>
                <select id="status" name="status" required>
                    <option value="pending">Pending</option>
                    <option value="ongoing">Ongoing</option>
                    <option value="finished">Finished</option>
                </select>
            </div>
        <label for="user_id">user:</label>
        <input type="text" id="user_id" name="user_id" value="{{ $ticket->user_id }}" required>

        <label for="assign_user_id"> assign_user:</label>
        <input type="text" id="assign_user_id" name="assign_user_id" value="{{ $ticket->assign_user_id }}" required>

        <button type="submit">update</button>
    </form>

</body>
</html>
