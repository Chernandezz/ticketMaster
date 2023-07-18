<!DOCTYPE html>
<html>

<head>
    <title>Recibo de Pago</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            line-height: 1.6;
        }

        .receipt-container {
            max-width: 600px;
            margin: 0 auto;
            border: 1px solid #ccc;
            padding: 20px;
        }

        .header {
            text-align: center;
            margin-bottom: 20px;
        }

        .title {
            font-size: 24px;
            font-weight: bold;
        }

        .info {
            margin-bottom: 10px;
        }

        .label {
            font-weight: bold;
        }

        .total-container {
            margin-top: 20px;
            text-align: right;
        }

        .total-label {
            font-weight: bold;
        }

        .footer {
            margin-top: 40px;
            text-align: center;
            font-size: 12px;
            color: #777;
        }
    </style>
</head>

<body>
    <div class="receipt-container">
        <div class="header">
            <div class="title">Recibo de Pago</div>
        </div>
        <div class="info">
            <span class="label">Nombre:</span> {{ $mailData['nombre'] }}
        </div>
        <div class="info">
            <span class="label">Email:</span> {{ $mailData['email'] }}
        </div>
        <div class="info">
            <span class="label">Cédula:</span> {{ $mailData['cedula'] }}
        </div>
        <div class="info">
            <span class="label">Dirección:</span> {{ $mailData['direccion'] }}
        </div>
        <div class="info">
            <span class="label">Fecha de Pago:</span> {{ $mailData['fecha'] }}
        </div>

        <div class="total-container">
            <span class="total-label">Total Pagado:</span> {{ $mailData['total'] }}
        </div>
    </div>

    <div class="footer">
        Gracias por su compra. Para cualquier consulta, contáctenos al teléfono: (123) 456-7890
    </div>
</body>

</html>
