@extends('layouts.app_bg')
<title>Cadastro de funcionários</title>
@section('title')
    <div>
        <h5 class="mt-1">Funcionários</h5>
        <div class="d-flex">
            <a class="link_dtb_novo link_dtb" href="#">
                <h6>
                    <i class="fa-solid fa-user-plus"></i>
                    Carregar funcionário
                </h6>
            </a>
        </div>
    </div>
    <div class="d-flex">
        <a href="{{ route('export') }}" class="link_excel link_dtb">
            <i class="fa-solid fa-file-excel me-1"></i>Excel
        </a>
    </div>
@endsection
@section('content')
    <div style="position: relative">
        <div id="mdl_novo" class="mdl_body">
            <div class="container-lg">
                <div class="mdl_header">Novo funcionário
                    <a class="link_cls"><i class="fa-solid fa-xmark"></i></a>
                </div>
                <form id="create" action="{{ route('employee.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="mdl_content">
                        <div class="row">
                            <div class="col-sm-4 mt-3">
                                <label class="lb_in">Nome Completo:</label>
                                <input id="full_name_n" type="text" name="full_name" class="form-control"
                                    placeholder="Nome Completo">
                            </div>
                            <div class="col-sm-4 mt-3">
                                <label class="lb_in">Sexo:</label>
                                <div style="position: relative">
                                    <i class="icon_inp fa-solid fa-chevron-down"></i>
                                    <select id="id_sex_n" name="id_sex" class="form-control">
                                        @foreach ($sex as $datasex)
                                            <option value="{{ $datasex->id }}">{{ $datasex->info }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-4 mt-3">
                                <label class="lb_in">Data Nascimento:</label>
                                <input id="birthdate_n" type="date" name="birthdate" class="form-control"
                                    placeholder="Data Nascimento" max="{{ \Carbon\Carbon::now()->format('Y-m-d') }}">
                            </div>
                            <div class="col-sm-4 mt-3">
                                <label class="lb_in">Documento:</label>
                                <div style="position: relative">
                                    <i class="icon_inp fa-solid fa-chevron-down"></i>
                                    <select id="id_type_n" name="id_type" class="form-control">
                                        @foreach ($document as $document)
                                            <option value="{{ $document->id }}">{{ $document->info }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-4 mt-3">
                                <label class="lb_in">Num. Documento:</label>
                                <input type="text" id="num_ident_n" name="num_ident" class="inp_num form-control"
                                    placeholder="Num. Documento">
                            </div>
                            <div class="col-sm-4 mt-3">
                                <label class="lb_in">Nome Mãe:</label>
                                <input id="mother_name_n" type="text" name="mother_name" class="form-control"
                                    placeholder="Nome Mãe">
                            </div>
                            <div class="col-sm-4 mt-3">
                                <label class="lb_in">Nome Pai:</label>
                                <input id="father_name_n" type="text" name="father_name" class="form-control"
                                    placeholder="Nome Pai">
                            </div>
                            <div class="col-sm-4 mt-3">
                                <label class="lb_in">Estado:</label>
                                <input type="text" id="state_n" name="state" class="form-control"
                                    placeholder="Estado (lugar)">
                            </div>
                            <div class="col-sm-4 mt-3">
                                <label class="lb_in">Cidade:</label>
                                <input type="text" id="city_n" name="city" class="form-control"
                                    placeholder="Cidade">
                            </div>
                            <div class="col-sm-4 mt-3">
                                <label class="lb_in">Bairro:</label>
                                <input type="text" id="neighborhood_n" name="neighborhood" class="form-control"
                                    placeholder="Bairro">
                            </div>
                            <div class="col-sm-4 mt-3">
                                <label class="lb_in">Rua:</label>
                                <input type="text" id="street_n" name="street" class="form-control"
                                    placeholder="Rua">
                            </div>
                            <div class="col-sm-4 mt-3">
                                <label class="lb_in">Núm. do quarto:</label>
                                <input type="text" id="num_hab_n" name="num_hab" class="inp_num form-control"
                                    placeholder="Número do quarto">
                            </div>
                            <div class="col-sm-8 mt-3">
                                <label class="lb_in">Fotografia:</label>
                                <input class="form-control" type="file" id="photo_n" name="photo">
                            </div>
                            <div class="mdl_footer">
                                <button class="btn_mdl_close link_cls me-4 form-control btn"
                                    type="button">Fechar</button>
                                <button id="mdl_store" class="form-control btn btn-primary profile-button"
                                    type="button">Cadastrar
                                </button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <div id="mdl_info" class="mdl_body ">
            <div class="container-lg">
                <div class="mdl_header">Info. funcionário
                    <a class="link_cls"><i class="fa-solid fa-xmark"></i></a>
                </div>
                <div class="mdl_content">
                    <div class="row">
                        <div class="col-12 col-sm-3 info_center">
                            <div class="col-12 mt-3">
                                <img class="mt-1" id="photo_emp" alt="Perfil">
                            </div>
                        </div>
                        <div class="col-12 col-sm-9">
                            <div class="row">
                                <div class="col-6 col-sm-4 mt-3">
                                    <div class="d-grid">
                                        <label class="lb_in">Nome Completo</label>
                                        <div class="tx_emp" id="full_name_emp"></div>
                                    </div>
                                </div>
                                <div class="col-6 col-sm-4 mt-3">
                                    <div class="d-grid">
                                        <label class="lb_in">Sexo:</label>
                                        <div class="tx_emp" id="sex_emp"></div>
                                    </div>
                                </div>
                                <div class="col-6 col-sm-4 mt-3">
                                    <div class="d-grid">
                                        <label class="lb_in">Data Nascimento:</label>
                                        <div class="tx_emp" id="birthdate_emp"></div>
                                    </div>
                                </div>
                                <div class="col-6 col-sm-4 mt-3">
                                    <div class="d-grid">
                                        <label class="lb_in">Documento:</label>
                                        <div class="tx_emp" id="document_emp"></div>
                                    </div>
                                </div>
                                <div class="col-6 col-sm-4 mt-3">
                                    <div class="d-grid">
                                        <label class="lb_in">Nome Mãe:</label>
                                        <div class="tx_emp" id="mother_name_emp"></div>
                                    </div>
                                </div>
                                <div class="col-6 col-sm-4 mt-3">
                                    <div class="d-grid">
                                        <label class="lb_in">Nome Pai:</label>
                                        <div class="tx_emp" id="father_name_emp"></div>
                                    </div>
                                </div>
                                <div class="col-6 col-sm-8 mt-3">
                                    <div class="d-grid">
                                        <label class="lb_in">Endereço:</label>
                                        <div class="tx_emp" id="address_emp"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="mdl_footer mt-n1 mb-4">
                            <button class="btn_mdl_close link_cls me-4 form-control btn" type="button">Fechar</button>
                            <button class="link_dtb_edit form-control btn btn-primary profile-button"
                                type="button">Editar
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div id="mdl_edit" class="mdl_body">
            <div class="container-lg">
                <div class="mdl_header">Editar informação
                    <a class="link_cls"><i class="fa-solid fa-xmark"></i></a>
                </div>
                <form id="store_edit" action="{{ route('employee.update') }}" method="POST"
                    enctype="multipart/form-data">@csrf
                    <div class="mdl_content">
                        <div class="row">
                            <input type="hidden" name="id_emp" id="id_emp_edit">
                            <div class="col-sm-4 mt-3">
                                <label class="lb_in">Nome Completo</label>
                                <input class="form-control" type="text" id="full_name_edit" name="full_name_edit">
                            </div>
                            <div class="col-sm-4 mt-3">
                                <label class="lb_in">Sexo:</label>
                                <div style="position: relative">
                                    <i class="icon_inp fa-solid fa-chevron-down"></i>
                                    <select name="id_sex_edit" class="form-control">
                                        <option id="id_sex_edit" value=""></option>
                                        @foreach ($sex as $datasex)
                                            <option id="sex_{{ $datasex->id }}" value="{{ $datasex->id }}">
                                                {{ $datasex->info }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-4 mt-3">
                                <label class="lb_in">Data Nascimento:</label>
                                <input class="form-control" type="date" id="birthdate_edit" name="birthdate_edit"
                                    max="{{ \Carbon\Carbon::now()->format('Y-m-d') }}">
                            </div>
                            <div class="col-sm-4 mt-3">
                                <label class="lb_in">Tipo Documento:</label>
                                <div style="position: relative">
                                    <i class="icon_inp fa-solid fa-chevron-down"></i>
                                    <select name="id_type_edit" class="form-control">
                                        <option id="id_type_edit" value=""></option>
                                        @foreach ($document_edit as $document)
                                            <option id="doc_{{ $document->id }}" value="{{ $document->id }}">
                                                {{ $document->info }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-4 mt-3">
                                <label class="lb_in">Num. Documento:</label>
                                <input class="inp_num form-control" type="text" id="num_ident_edit"
                                    name="num_ident_edit">
                            </div>
                            <div class="col-sm-4 mt-3">
                                <label class="lb_in">Nome Mãe:</label>
                                <input id="mother_name_edit" type="text" name="mother_name_edit" class="form-control"
                                    placeholder="Nome Mãe">
                            </div>
                            <div class="col-sm-4 mt-3">
                                <label class="lb_in">Nome Pai:</label>
                                <input id="father_name_edit" type="text" name="father_name_edit" class="form-control"
                                    placeholder="Nome Pai">
                            </div>
                            <div class="col-sm-4 mt-3">
                                <label class="lb_in">Estado:</label>
                                <input type="text" id="state_edit" name="state_edit" class="form-control"
                                    placeholder="Estado (lugar)">
                            </div>
                            <div class="col-sm-4 mt-3">
                                <label class="lb_in">Cidade:</label>
                                <input type="text" id="city_edit" name="city_edit" class="form-control"
                                    placeholder="Cidade">
                            </div>
                            <div class="col-sm-4 mt-3">
                                <label class="lb_in">Bairro:</label>
                                <input type="text" id="neighborhood_edit" name="neighborhood_edit"
                                    class="form-control" placeholder="Bairro">
                            </div>
                            <div class="col-sm-4 mt-3">
                                <label class="lb_in">Rua:</label>
                                <input type="text" id="street_edit" name="street_edit" class="form-control"
                                    placeholder="Rua">
                            </div>
                            <div class="col-sm-4 mt-3">
                                <label class="lb_in">Núm. do quarto:</label>
                                <input type="text" id="num_hab_edit" name="num_hab_edit" class="inp_num form-control"
                                    placeholder="Número do quarto">
                            </div>
                            <div class="col-sm-8 mt-3">
                                <label class="lb_in">Fotografia:</label>
                                <input type="hidden" id="photo_edit_old" name="photo_edit_old">
                                <input class="form-control" type="file" id="photo_edit" name="photo_edit">
                            </div>
                            <div class="mdl_footer">
                                <button class="btn_mdl_close link_cls me-4 form-control btn"
                                    type="button">Fechar</button>
                                <button id="mdl_store_edit" class="form-control btn btn-primary profile-button"
                                    type="button">Atualizar
                                </button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <div class="table-responsive">
            <table id="example" class="table table-striped" style="width:100%">
                <thead>
                    <tr>
                        <th>Nome Completo</th>
                        <th>Sexo</th>
                        <th>Data Nascimento</th>
                        <th>Doc.</th>
                        <th>Num. Documento</th>
                        <th>Ficha técnica</th>
                        <th>Opções</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($datos as $data)
                        <tr>
                            <td>{{ $data->full_name }}</td>
                            <td>{{ $data->Type_sex->info }} </td>
                            <td>{{ \Carbon\Carbon::parse($data->birthdate)->format('d/m/Y') }}</td>
                            <td>{{ $data->Type_ident->info }}</td>
                            <td>{{ $data->num_ident }}</td>
                            <td>
                                <div id="dates_emp" data-id='{{ $data->id }}'
                                    data-full_name='{{ $data->full_name }}' data-type_sex_id='{{ $data->Type_sex->id }}'
                                    data-type_sex_info='{{ $data->Type_sex->info }}'
                                    data-birthdate='{{ \Carbon\Carbon::parse($data->birthdate)->format('d/m/Y') }}'
                                    data-photo="{{ $data->photo }}" data-type_ident_id='{{ $data->Type_ident->id }}'
                                    data-type_ident_info='{{ $data->Type_ident->info }}'
                                    data-num_ident='{{ $data->num_ident }}'
                                    data-mother_name='{{ $data->ParentesEmp->mother_name }}'
                                    data-father_name='{{ $data->ParentesEmp->father_name }}'
                                    data-state='{{ $data->AddressEmp->state }}'data-city='{{ $data->AddressEmp->city }}'
                                    data-neighborhood='{{ $data->AddressEmp->neighborhood }}'
                                    data-street='{{ $data->AddressEmp->street }}'
                                    data-num_hab='{{ $data->AddressEmp->num_hab }}'></i>
                                </div>
                                <a class="link_dtb_info link_dtb" href="#">
                                    <i class="fa-regular fa-address-card me-1"></i>Ver mais
                                </a>
                            </td>
                            <td>
                                <a data-birthdate="{{ $data->birthdate }}" class="link_dtb_edit link_dtb me-3"
                                    style="color: rgb(34, 34, 172)" href="#">
                                    <i class="fa-solid fa-pen-to-square"></i>
                                </a>
                                <a class="link_dtb_delete link_dtb" style="color: rgb(197, 35, 35)"
                                    data-id='{{ $data->id }}' href="#">
                                    <i class="fa-solid fa-trash"></i>
                                </a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <form id="delete" action="{{ url('employee/delete') }}" method="post">
            {!! csrf_field() !!}
            <input type="hidden" name="id" id="id_employee">
        </form>
    </div>
@endsection
@section('scripts')
    @if (Session::has('message'))
        <script>
            Toast.fire({
                icon: 'success',
                position: 'top-right',
                html: '{{ Session::get('message') }}'
            })
        </script>
    @endif
    <script>
        $(".inp_num").on('input', function() {
            $(this).val($(this).val().replace(/[^0-9.]/g, ''));
            if (this.value.length > 15)
                this.value = this.value.slice(0, 15);
        });

        const arr_sex = @json($sex);
        const arr_doc = @json($document_edit);
        var id_sexes = [];
        var id_docum = [];
        $.each(arr_sex, function(ind, elem) {
            id_sexes.push(elem['id']);
        })
        $.each(arr_doc, function(ind, elem) {
            id_docum.push(elem['id']);
        })

        $(".link_cls").click(function() {
            $('.mdl_body').hide();
        })

        $(".link_dtb_novo").click(function() {
            $('·mdl_body').hide()
            $('#mdl_novo').show();
        })

        $(".link_dtb_info").click(function() {
            $('·mdl_body').hide()
            $("#photo_emp").attr("src", 'img/perfiles/' + $("#dates_emp").data('photo'));
            $('#full_name_emp').html($("#dates_emp").data('full_name'));
            $('#sex_emp').html($("#dates_emp").data('type_sex_info'))
            $('#birthdate_emp').html($("#dates_emp").data('birthdate'))
            $('#document_emp').html($("#dates_emp").data('type_ident_info') + " " + $("#dates_emp").data(
                'num_ident'))
            $('#address_emp').html(
                $("#dates_emp").data('state') + ", " + $("#dates_emp").data('city') + ", " +
                $("#dates_emp").data('neighborhood') + ", Rua " + $("#dates_emp").data('street') +
                " " + $("#dates_emp").data('num_hab')
            )
            $('#mother_name_emp').html($("#dates_emp").data('mother_name'))
            $('#father_name_emp').html($("#dates_emp").data('father_name'))
            $('#mdl_info').show()

        })

        $(".link_dtb_edit").click(function() {
            $('·mdl_body').hide()
            $('#id_emp_edit').val($("#dates_emp").data('id'));
            $('#photo_edit_old').val($("#dates_emp").data('photo'))
            $('#full_name_edit').val($("#dates_emp").data('full_name'));
            $('#birthdate_edit').val($(this).data('birthdate'))
            if (id_sexes.includes($("#dates_emp").data('type_sex_id'))) {
                $('#sex_' + $("#dates_emp").data('type_sex_id')).hide()
            }
            $('#id_sex_edit').val($("#dates_emp").data('type_sex_id'))
                .html($("#dates_emp").data('type_sex_info'))
            if (id_docum.includes($("#dates_emp").data('type_ident_id'))) {
                $('#doc_' + $("#dates_emp").data('type_ident_id')).hide()
            }
            $('#id_type_edit').val($("#dates_emp").data('type_ident_id'))
                .html($("#dates_emp").data('type_ident_info'))
            $('#num_ident_edit').val($("#dates_emp").data('num_ident'))
            $('#state_edit').val($("#dates_emp").data('state'))
            $('#city_edit').val($("#dates_emp").data('city'))
            $('#neighborhood_edit').val($("#dates_emp").data('neighborhood'))
            $('#street_edit').val($("#dates_emp").data('street'))
            $('#num_hab_edit').val($("#dates_emp").data('num_hab'))
            $('#mother_name_edit').val($("#dates_emp").data('mother_name'))
            $('#father_name_edit').val($("#dates_emp").data('father_name'))
            $('#mdl_edit').show()
        })

        $("#mdl_store_edit").click(function() {
            if ($("#full_name_edit").val() == "" || $("#id_sex_edit").val() == "" || $("#birthdate_edit").val() ==
                "" ||
                $("#id_type_edit").val() == "" || $("#num_ident_edit").val() == "" || $("#state_edit").val() ==
                "" ||
                $("#city_edit").val() == "" || $("#neighborhood_edit").val() == "" || $("#street_edit").val() ==
                "" ||
                $("#num_hab_edit").val() == "" || $("#mother_name_edit").val() == "" ||
                $("#father_name_edit").val() == "" || $("#photo_edit_old").val() == "") {
                Toast.fire({
                    position: 'top-right',
                    icon: 'error',
                    title: 'Os campos são obrigatórios',
                })
            } else {
                $('#store_edit').submit();
            }
        })

        $("#mdl_store").click(function() {
            if ($("#full_name_n").val() == "" || $("#id_sex_n").val() == "" || $("#birthdate_n").val() == "" ||
                $("#id_type_n").val() == "" || $("#num_ident_n").val() == "" || $("#state_n").val() == "" ||
                $("#city_n").val() == "" || $("#neighborhood_n").val() == "" || $("#street_n").val() == "" ||
                $("#num_hab_n").val() == "" || $("#mother_name_n").val() == "" ||
                $("#father_name_n").val() == "" || $("#photo_n").val() == "") {
                Toast.fire({
                    position: 'top-right',
                    icon: 'error',
                    title: 'Os campos são obrigatórios',
                })
            } else {
                $('#create').submit();
            }
        })

        $(".link_dtb_delete").click(function() {
            $('·mdl_body').hide()
            $("#id_employee").val($(this).data('id'));
            Swal.fire({
                title: 'Você confirma esta ação?',
                text: "As informações serão excluídas permanentemente",
                type: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Sim, excluir',
                cancelButtonText: 'No, cancelar',
            }).then((result) => {
                if (result.isConfirmed) {
                    $('#delete').submit();
                } else if (result.isDenied) {
                    Swal.fire('As alterações não foram salvas', '', 'info')
                }
            })
        })
    </script>
@endsection
