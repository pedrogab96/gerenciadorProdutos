<div class="row">
    <div class="col-12 col-lg-8 card p-4">
        <div class="panel panel-default">
            <div class="panel-body">
                <table class="table" id="datatable">
                    <thead>
                        <tr>
                            <th>Nome</th>
                            <th>Email</th>
                            <th>Telefone</th>
                            <th>Endereço</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($customers as $customer)
                            <tr>
                                <td>{{ $customer->name }}</td>
                                <td>{{ $customer->email }}</td>
                                <td>{{ $customer->telephone }}</td>
                                <td>{{ $customer->address }}</td>
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
                "columnDefs": [{
                    "render": function(phone){
                        return phone.toString().replace(/(\d{2})(\d{5})(\d{4})/, '($1) $2-$3');    
                    },
                    "targets": [2]
                }],
            });
        });
    </script>
@endpush