@extends('layouts.master')
@section('content')
<!-- row -->
<div class="row">
    <div class="col-xl-12 mb-30">
      <div class="card card-statistics h-100">
        <div class="card-body">
            @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <button type="button" class="button x-small" data-toggle="modal" data-target="#suppliers">
            إضافة مورد
        </button>
        <br><br>
          <div class="table-responsive">
          <table id="datatable" class="table table-striped table-bordered p-0">
            <thead>
                <tr>
                    <th>#</th>
                    <th>الإسم</th>
                    <th>الجوال</th>
                    <th>الحالة</th>
                    <th>الإدارة</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($suppliers as $index=>$supplier)
                    <tr>
                        <td>{{$index+1}}</td>
                        <td>{{$supplier->fullname}}</td>
                        <td>{{$supplier->mobile}}</td>
                        <td>{{$supplier->status}}</td>
                        <td>

                            <button type="button" class="btn btn-info btn-sm" data-toggle="modal"
                            data-target="#edit{{ $supplier->id }}"
                            title="تعديل بيانات المورد {{$supplier->fullname}}"><i class="fa fa-edit"></i></button>
                            <button type="button" class="btn btn-danger btn-sm" data-toggle="modal"
                            data-target="#delete{{ $supplier->id }}"
                            title="حذف بيانات المورد {{$supplier->fullname}}"><i
                                class="fa fa-trash"></i></button>

                        </td>
                    </tr>
                    <!-- edit_modal_Grade -->
                    <div class="modal fade" id="edit{{ $supplier->id }}" tabindex="-1" role="dialog"
                        aria-labelledby="suppliersLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 style="font-family: 'Cairo', sans-serif;" class="modal-title"
                                        id="suppliersLabel">
                                        تعديل بيانات الموظف {{$supplier->fullname}}
                                    </h5>
                                    <button type="button" class="close" data-dismiss="modal"
                                        aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <!-- add_form -->
                                    <form action="{{ route('suppliers.update', 'test') }}" method="post">
                                        {{ method_field('patch') }}
                                        @csrf


                                        <br><br>

                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary"
                                                data-dismiss="modal">إلغاء</button>
                                            <button type="submit"
                                                class="btn btn-success">إرسال</button>
                                        </div>
                                    </form>

                                </div>
                            </div>
                        </div>
                    </div>


                    <!-- delete_modal_Grade -->
                    <div class="modal fade" id="delete{{ $supplier->id }}" tabindex="-1" role="dialog"
                        aria-labelledby="suppliersLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 style="font-family: 'Cairo', sans-serif;" class="modal-title"
                                        id="suppliersLabel">
                                        حذف بيانات الموظف {{$supplier->fullname}}
                                    </h5>

                                    <button type="button" class="close" data-dismiss="modal"
                                        aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <form action="{{ route('suppliers.destroy', 'test') }}" method="post">
                                        {{ method_field('Delete') }}
                                        @csrf
                                        ها تريد بالتأكيد حذف بيانات الموظف {{$supplier->fullname}} ؟؟
                                        <br><br>
                                        <input id="id" type="hidden" name="id" class="form-control"
                                            value="{{ $supplier->id }}">
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary"
                                                data-dismiss="modal">إلغاء</button>
                                            <button type="submit"
                                                class="btn btn-danger">موافق</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </tbody>
         </table>
        </div>
        </div>
      </div>
    </div>

    <div class="modal fade" id="suppliers" tabindex="-1" role="dialog" aria-labelledby="suppliersLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 style="font-family: 'Cairo', sans-serif;" class="modal-title" id="suppliersLabel">
                    إضافة موظف
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <!-- add_form -->
                <form action="{{ route('suppliers.store') }}" method="POST">
                    @csrf
                    <div class="row">
                        <div class="col">
                            <label for="Name" class="mr-sm-2">{{ trans('Grades_trans.stage_name_ar') }}
                                :</label>
                            <input id="Name" type="text" name="Name" class="form-control">
                        </div>
                        <div class="col">
                            <label for="Name_en" class="mr-sm-2">{{ trans('Grades_trans.stage_name_en') }}
                                :</label>
                            <input type="text" class="form-control" name="Name_en">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlTextarea1">{{ trans('Grades_trans.Notes') }}
                            :</label>
                        <textarea class="form-control" name="Notes" id="exampleFormControlTextarea1"
                            rows="3"></textarea>
                    </div>
                    <br><br>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary"
                    data-dismiss="modal">إلغاء</button>
                <button type="submit" class="btn btn-success">إرسال</button>
            </div>
            </form>

        </div>
    </div>
</div>
</div>

<!-- row closed -->
@endsection
@section('js')
    @toastr_js
    @toastr_render
@endsection
