@extends('admin.admin_master')

@section('admin')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <div class="content-wrapper">
        <div class="container-full">
            <!-- Main content -->
            <section class="content">

                <!-- Basic Forms -->
                <div class="box">
                    <div class="box-header with-border">
                        <h4 class="box-title">Edit Fee Amount</h4>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <div class="row">
                            <div class="col">
                                <form method="POST" action="{{ route('feeAmount.update', $editData['0']->fee_category_id) }}">
                                    @csrf
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="add_item">
                                                <div class="row">
                                                    <div class="col-md-12">

                                                        <div class="form-group">
                                                            <h5>Fee Category <span class="text-danger">*</span></h5>
                                                            <div class="controls">
                                                                <select name="fee_category_id" id="" required
                                                                    class="form-control">
                                                                    <option value="" selected disabled>Select Fee
                                                                        Category
                                                                    </option>
                                                                    @foreach ($fee_categories as $category)
                                                                        <option value="{{ $category->id }}"
                                                                            {{ $editData['0']->fee_category_id == $category->id ? 'selected' : '' }}>
                                                                            {{ $category->name }}</option>
                                                                    @endforeach
                                                                </select>
                                                                @error('fee_category_id ')
                                                                    <span class="text-danger">{{ $message }}</span>
                                                                @enderror
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                @foreach ($editData as $edit)
                                                    <div class="delete_whole_extra_item_add"
                                                        id="delete_whole_extra_item_add">
                                                        <div class="row">
                                                            <div class="col-md-5">
                                                                <div class="form-group">
                                                                    <h5>Student Class <span class="text-danger">*</span>
                                                                    </h5>
                                                                    <div class="controls">
                                                                        <select name="class_id[]" id="" required
                                                                            class="form-control">
                                                                            <option value="" selected disabled>Select
                                                                                Student
                                                                                Class
                                                                            </option>
                                                                            @foreach ($classes as $class)
                                                                                <option value="{{ $class->id }}"
                                                                                    {{ $edit->class_id == $class->id ? 'selected' : '' }}>
                                                                                    {{ $class->name }}</option>
                                                                            @endforeach
                                                                        </select>
                                                                        @error('class_id')
                                                                            <span class="text-danger">{{ $message }}</span>
                                                                        @enderror
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-5">
                                                                <div class="form-group">
                                                                    <h5>Fee Amount<span class="text-danger">*</span></h5>
                                                                    <div class="controls">
                                                                        <input type="text" name="amount[]"
                                                                            class="form-control" required
                                                                            value="{{ $edit->amount }}">
                                                                        @error('amount')
                                                                            <span
                                                                                class="text-danger">{{ $message }}</span>
                                                                        @enderror
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-2" style="padding-top: 25px">
                                                                <span class="btn btn-success addEventMore"><i
                                                                        class="fa fa-plus-circle"></i></span>
                                                                <span
                                                                    class="btn btn-danger cursor-pointer removeEventMore"><i
                                                                        class="fa fa-minus-circle"></i></span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                @endforeach

                                            </div>

                                            <div class="form-group">
                                                <div class="text-xs-right">
                                                    <input type="submit" value="Save Changes" class="btn btn-rounded btn-success">
                                                </div>
                                            </div>
                                        </div>

                                </form>

                            </div>
                            <!-- /.col -->
                        </div>
                        <!-- /.row -->
                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->

            </section>
            <!-- /.content -->
            <!-- /.content -->

        </div>
    </div>
    <div style="visibility: hidden;">
        <div class="whole_extra_item_add" id="whole_extra_item_add">
            <div class="delete_whole_extra_item_add" id="delete_whole_extra_item_add">
                <hr class="b-1" />
                <div class="form-row">
                    <div class="col-md-5">
                        <div class="form-group">
                            <h5>Student Class <span class="text-danger">*</span></h5>
                            <div class="controls">
                                <select name="class_id[]" id="" required class="form-control">
                                    <option value="" selected disabled>Select Student
                                        Class
                                    </option>
                                    @foreach ($classes as $class)
                                        <option value="{{ $class->id }}">
                                            {{ $class->name }}</option>
                                    @endforeach
                                </select>
                                @error('class_id')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="col-md-5">
                        <div class="form-group">
                            <h5>Fee Amount<span class="text-danger">*</span></h5>
                            <div class="controls">
                                <input type="text" name="amount[]" class="form-control" required>
                                @error('amount')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="col-md-2" style="padding-top: 25px">
                        <span class="btn btn-success cursor-pointer addEventMore"><i class="fa fa-plus-circle"></i></span>
                        <span class="btn btn-danger cursor-pointer removeEventMore"><i
                                class="fa fa-minus-circle"></i></span>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script type="text/javascript">
        $(document).ready(function() {
            var counter = 0;
            $(document).on("click", ".addEventMore", function() {
                var whole_extra_item_add = $('#whole_extra_item_add').html();
                $(this).closest(".add_item").append(whole_extra_item_add);
                counter++;
            });
            $(document).on("click", ".removeEventMore", function(event) {
                $(this).closest(".delete_whole_extra_item_add").remove();
                counter -= 1;
            });
        });
    </script>
@endsection
