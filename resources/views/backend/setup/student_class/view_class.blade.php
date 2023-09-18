@extends('admin.admin_master')

@section('admin')
    <div class="content-wrapper">
        <div class="container-full">
            <!-- Main content -->
            <section class="content">
                <div class="row">

                    <div class="col-12">

                        <div class="box">
                            <div class="box-header with-border">
                                <h3 class="box-title">Student Class List</h3>
                                <a href="{{ route('student.class.add') }}" class="btn btn-rounded btn-success float-right">Add Class</a>
                            </div>
                            <!-- /.box-header -->
                            <div class="box-body">
                                <div class="table-responsive">
                                    <table id="example1" class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                                <th width="5%">SL</th>
                                                <th>Class</th>
                                                <th width="15%">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($allData as $key => $class)
                                                <tr>
                                                    <td>{{ $key + 1 }}</td>
                                                    <td>{{ $class->name }}</td>
                                                    <td>
                                                        <a href="{{ route('student.class.edit', $class->id) }}"
                                                            class="btn btn-rounded btn-info btn-md mb-5">Edit</a>
                                                        <a href="{{ route('student.class.delete', $class->id) }}"
                                                            class="btn btn-rounded btn-danger btn-md mb-5"
                                                            id="delete">Delete</a>
                                                    </td>
                                                </tr>
                                            @endforeach

                                        </tbody>
                                        <tfoot>
                                            <tr>
                                                <th>SL</th>
                                                <th>Class</th>
                                                <th width="15%">Action</th>
                                            </tr>
                                        </tfoot>
                                    </table>
                                </div>
                            </div>
                            <!-- /.box-body -->
                        </div>
                        <!-- /.box -->
                    </div>
                    <!-- /.col -->
                </div>
                <!-- /.row -->
            </section>
            <!-- /.content -->

        </div>
    </div>
@endsection
