<!doctype html>
<html>
<head>
  <meta charset="utf-8">
  <title>Order #{{ $order->id }}</title>
  <style>body{font-family:system-ui,-apple-system,Segoe UI,Roboto,Helvetica,Arial,sans-serif;}</style>
</head>
<body>
  <h2>New Order #{{ $order->id }}</h2>
  <p>Placed at: {{ $order->created_at }}</p>
  @if($order->customer_name)
    <p><strong>Nama:</strong> {{ $order->customer_name }}</p>
  @endif
  @if($order->customer_phone)
    <p><strong>No. HP:</strong> {{ $order->customer_phone }}</p>
  @endif
  <p><strong>Metode Layanan:</strong> {{ \App\Models\Order::serviceLabel($order->service_type) }}</p>
  <h3>Items</h3>
  <ul>
    @foreach($order->items as $it)
      <li>{{ $it->quantity }} × {{ $it->name }} — Rp {{ number_format($it->price,0,',','.') }}</li>
    @endforeach
  </ul>
  <p><strong>Total: Rp {{ number_format($order->total,0,',','.') }}</strong></p>
</body>
</html>
