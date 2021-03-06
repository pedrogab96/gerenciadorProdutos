<div class="row">
    <div class="col-12 card p-4">
        <div class="panel panel-default">
            <div class="panel-body">
                <table class="table" id="datatable">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Cliente</th>
                            <th>Data</th>
                            <th>Total</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($orders as $index => $order)
                            <tr>
                                <td>{{ $order->id }}</td>
                                <td>{{ $order->customer_name }}</td>
                                <td>{{ $order->created_at }}</td>
                                <td>{{ $order->total_price }}</td>
                                <td>{{ $order->status }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>


@push('scripts')
    <script>
        $(document).ready(function() {
            $('#datatable').DataTable({
                "language": {
                    "url": "//cdn.datatables.net/plug-ins/1.10.19/i18n/Portuguese-Brasil.json"
                },
                "columnDefs": [
                    {
                        "render": function(data){
                            return data.toString().replace(/(\d{4})-(\d{2})-(\d{2}) (\d{2}):(\d{2}):(\d{2})/, '$3/$2/$1 $4:$5:$6');
                        },
                        "targets": [2],
                    },
                    {
                        "render": function(data){
                            return parseFloat(data).toLocaleString('pt-br',{style: 'currency', currency: 'BRL'});
                        },
                        "targets": [3]
                    }
                ],
            });
        });
    </script>
@endpush