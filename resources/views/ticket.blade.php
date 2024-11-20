<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tickets Dashboard</title>
    <style>
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
        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        table, th, td {
            border: 1px solid #ddd;
        }
        th, td {
            padding: 15px;
            text-align: left;
            vertical-align: top;
        }
        th {
            background-color: #4CAF50;
            color: white;
            text-align: center;
            font-size: 18px;
        }
        td {
            background-color: #ffffff;
            transition: background-color 0.3s;
        }
        td:hover {
            background-color: #f1f1f1;
        }
        .ticket-card {
            padding: 10px;
            margin-bottom: 10px;
            border-radius: 5px;
            background-color: #f5f5f5;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s, box-shadow 0.3s;
        }
        .ticket-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);
        }
        .ticket-card strong {
            font-size: 16px;
            color: #333;
        }
        .ticket-card em {
            color: #666;
        }
        .ticket-card small {
            display: block;
            margin-top: 5px;
            color: #999;
        }
    </style>
</head>
<body>

    <h1>Tickets Dashboard</h1>

    <table>
        <thead>
            <tr>
                <th>Pending</th>
                <th>Ongoing</th>
                <th>Finished</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td id="pending-tickets"></td>
                <td id="ongoing-tickets"></td>
                <td id="finished-tickets"></td>
            </tr>
        </tbody>
    </table>

    <script>
        // تحويل بيانات PHP إلى JavaScript
        const tickets = <?php echo json_encode($ticket); ?>;

        // فرز التذاكر حسب الحالة
        const sortedTickets = {
            pending: [],
            ongoing: [],
            finished: []
        };

        tickets.forEach(ticket => {
            sortedTickets[ticket.status].push(ticket);
        });

        // توليد محتويات الأعمدة
        const createTicketHTML = (ticket) => {
            return `
                <div class="ticket-card">
                    <strong>${ticket.ticket_name}</strong><br>
                    <em>${ticket.description}</em><br>
                    <small>Deadline: ${ticket.dead_line}</small><br>
                    <small>User_id: ${ticket.user_id}</small><br>
                    <small>User_assign: ${ticket.assign_user_id}</small><br>

                    <!-- نموذج زر الحذف -->
                    <form action="${window.location.origin}/ticket/delete/${ticket.id}" method="POST" style="display: inline;">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}"> <!-- توكن الحماية من هجمات CSRF -->
                        <input type="hidden" name="_method" value="DELETE"> <!-- استخدام طريقة الحذف DELETE -->
                        <button type="submit">Delete</button>
                    </form>

                    <!-- نموذج زر التحديث -->
                    <form action="${window.location.origin}/ticket/update/${ticket.id}" method="GET" style="display: inline;">
                        <button type="submit">Update</button>
                    </form>
                </div>`;
        };

        document.getElementById('pending-tickets').innerHTML = sortedTickets.pending.map(createTicketHTML).join('');
        document.getElementById('ongoing-tickets').innerHTML = sortedTickets.ongoing.map(createTicketHTML).join('');
        document.getElementById('finished-tickets').innerHTML = sortedTickets.finished.map(createTicketHTML).join('');
    </script>

</body>
</html>
