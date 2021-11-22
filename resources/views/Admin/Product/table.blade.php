<div class="row">
    <div class="col-12 col-md-8 card p-4">
        <div class="panel panel-default">
            <div class="panel-body">
                <table class="table table-hover" id="datatable">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Nome</th>
                            <th>Preço</th>
                            <th>Ações</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($products as $product)
                            <tr>
                                <td>{{ $product->id }}</td>
                                <td>{{ $product->name }}</td>
                                <td class=".money-format">{{ $product->price }}</td>
                                <td>
                                    <div class="d-flex">
                                        <a href="{{ route('admin.products.edit', $product->id) }}" class="btn btn-primary"><i class='far fa-edit'></i></a>
                                        <form action="{{ route('admin.products.destroy', $product->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button class='btn btn-danger mx-1' type="submit"> <i class="fas fa-trash-alt"></i></button>
                                        </form>
                                    </div>
                                </td>
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
                    "render": function(data){
                        return parseFloat(data).toLocaleString('pt-br',{style: 'currency', currency: 'BRL'});
                    },
                    "targets": [2]
                }],
            });
        });
    </script>
@endpush