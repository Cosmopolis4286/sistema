<table>
    <thead>
        <tr>
            <td>#</td>
            <th>Nome Completo</th>
            <th>Sexo</th>
            <th>Data Nascimento</th>
            <th>Tipo Documento</th>
            <th>Num. Documento</th>
            <th>Estado</th>
            <th>Cidade</th>
            <th>Bairro</th>
            <th>Rua</th>
            <th>Num.Quarto</th>
            <th>Nome da mãe</th>
            <th>Nome do pai</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($datos as $data)
            <tr>
                <td>{{ $data->id }}</td>
                <td>{{ $data->full_name }}</td>
                <td>{{ $data->Type_sex->info }} </td>
                <td>{{ \Carbon\Carbon::parse($data->birthdate)->format('d/m/Y') }}</td>
                <td>{{ $data->Type_ident->info }}</td>
                <td>{{ $data->num_ident }}</td>
                <td>{{ $data->AddressEmp->state }}</td>
                <td>{{ $data->AddressEmp->city }}</td>
                <td>{{ $data->AddressEmp->neighborhood }}</td>
                <td>{{ $data->AddressEmp->street }}</td>
                <td>{{ $data->AddressEmp->num_hab }}</td>
                <td>{{ $data->ParentesEmp->mother_name }}</td>
                <td>{{ $data->ParentesEmp->father_name }}</td>
            </tr>
        @endforeach
    </tbody>
</table>
