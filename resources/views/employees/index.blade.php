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

        <button type="button" class="button x-small" data-toggle="modal" data-target="#employees">
            إضافة موظف
        </button>
        <br><br>

          <div class="table-responsive">
            <table id="datatable" class="table  table-hover table-sm table-bordered p-0"
            data-page-length="50"
            style="text-align: center">
            <thead>
                <tr>
                    <th>#</th>
                    <th>الإسم</th>
                    <th>الجوال</th>
                    <th>البريد الالكتروني</th>
                    <th>إسم النستخدم</th>
                    <th>الحالة</th>
                    <th>الإدارة</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($employees as $index=>$employee)
                    <tr>
                        <td>{{$index+1}}</td>
                        <td>{{$employee->fullname}}</td>
                        <td>{{$employee->mobile}}</td>
                        <td>{{$employee->email}}</td>
                        <td>{{$employee->username}}</td>
                        <td>{{$employee->status}}</td>
                        <td>

                            <button type="button" class="btn btn-info btn-sm" data-toggle="modal"
                            data-target="#edit{{ $employee->id }}"
                            title="تعديل بيانات الموظف {{$employee->fullname}}"><i class="fa fa-edit"></i></button>
                            <button type="button" class="btn btn-danger btn-sm" data-toggle="modal"
                            data-target="#delete{{ $employee->id }}"
                            title="حذف بيانات الموظف {{$employee->fullname}}"><i
                                class="fa fa-trash"></i></button>

                        </td>
                    </tr>
                    <!-- edit_modal_Grade -->
                    <div class="modal fade" id="edit{{ $employee->id }}" tabindex="-1" role="dialog"
                        aria-labelledby="employeesLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 style="font-family: 'Cairo', sans-serif;" class="modal-title"
                                        id="employeesLabel">
                                        تعديل بيانات الموظف {{$employee->fullname}}
                                    </h5>
                                    <button type="button" class="close" data-dismiss="modal"
                                        aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <!-- add_form -->
                                    <form action="{{ route('employees.update', 'test') }}" method="post">
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
                    <div class="modal fade" id="delete{{ $employee->id }}" tabindex="-1" role="dialog"
                        aria-labelledby="employeesLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 style="font-family: 'Cairo', sans-serif;" class="modal-title"
                                        id="employeesLabel">
                                        حذف بيانات الموظف {{$employee->fullname}}
                                    </h5>

                                    <button type="button" class="close" data-dismiss="modal"
                                        aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <form action="{{ route('employees.destroy', 'test') }}" method="post">
                                        {{ method_field('Delete') }}
                                        @csrf
                                        ها تريد بالتأكيد حذف بيانات الموظف {{$employee->fullname}} ؟؟
                                        <br><br>
                                        <input id="id" type="hidden" name="id" class="form-control"
                                            value="{{ $employee->id }}">
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

    <!-- add_modal_Grade -->
    <div class="modal fade" id="employees" tabindex="-1" role="dialog" aria-labelledby="employeesLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 style="font-family: 'Cairo', sans-serif;" class="modal-title" id="employeesLabel">
                    إضافة موظف
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <!-- add_form -->
                <form action="{{ route('employees.store') }}" method="POST">
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
