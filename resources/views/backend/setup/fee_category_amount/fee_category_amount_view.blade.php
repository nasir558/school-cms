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
                                <h3 class="box-title">Fee Amount List</h3>
                                <a href="{{ route('feeAmount.add') }}" class="btn btn-rounded btn-success float-right">Add
                                    Fee Amount</a>
                            </div>
                            <!-- /.box-header -->
                            <div class="box-body">
                                <div class="table-responsive">
                                    <table id="example1" class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                                <th width="5%">SL</th>
                                                <th>Fee Category</th>
                                                <th width="15%">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($allData as $key => $amount)
                                                <tr>
                                                    <td>{{ $key + 1 }}</td>
                                                    <td>{{ $amount['fee_category']['name'] }}</td>
                                                    <td>
                                                        <a href="{{ route('feeAmount.edit', $amount->fee_category_id) }}"
                                                            class="btn btn-rounded btn-info btn-md mb-5">Edit</a>
                                                        <a href="{{ route('feeAmount.details', $amount->fee_category_id) }}"
                                                            class="btn btn-rounded btn-primary btn-md mb-5">Details</a>
                                                    </td>
                                                </tr>
                                            @endforeach

                                        </tbody>
                                        <tfoot>
                                            <tr>
                                                <th>SL</th>
                                                <th>Fee Category</th>
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
