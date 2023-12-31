@extends('admin.admin_master')

@section('admin')
    <div class="content-wrapper">
        <div class="container-full">
            <!-- Main content -->
            <section class="content">
                <div class="row">

                    <div class="col-12">

                        <div class="box box-widget widget-user">
                            <!-- Add the bg color to the header using any of the bg-* classes -->
                            <div class="widget-user-header bg-black"
                                style="background: url({{ asset('backend/images/leaf-176722_1920.jpg') }}) center center;">
                                <div class="d-flex gap-2 items-center flex-wrap justify-between" style="justify-content: space-between; align-items: center">
                                    <div>
                                        <h3 class="widget-user-username">User Name: {{ $user->name }}</h3>
                                        <h6 class="widget-user-desc">User Type: {{ $user->usertype }}</h6>
                                    </div>
                                    <div>

                                        <a href="{{ route('profile.edit') }}"
                                            class="btn btn-rounded btn-success float-right">Edit Profile</a>
                                    </div>
                                </div>
                            </div>
                            <div class="widget-user-image">
                                <img class="rounded-circle bg-white" src="{{ (!empty($user->image)) ? url('uploads/user_images/'.$user->image) : url('uploads/avatar-15.png') }}"
                                    alt="{{ $user->name }}">
                            </div>
                            <div class="box-footer">
                                <div class="row">
                                    <div class="col-sm-4">
                                        <div class="description-block">
                                            <h5 class="description-header">Mobile</h5>
                                            <span class="description-text">{{ $user->mobile }}</span>
                                        </div>
                                        <!-- /.description-block -->
                                    </div>
                                    <!-- /.col -->
                                    <div class="col-sm-4 br-1 bl-1">
                                        <div class="description-block">
                                            <h5 class="description-header">Email</h5>
                                            <span class="description-text text-lowercase">{{ $user->email }}</span>
                                        </div>
                                        <!-- /.description-block -->
                                    </div>
                                    <!-- /.col -->
                                    <div class="col-sm-4">
                                        <div class="description-block">
                                            <h5 class="description-header">Address</h5>
                                            <span class="description-text text-capitalize">{{ $user->address }}</span>
                                        </div>
                                        <!-- /.description-block -->
                                    </div>
                                    <!-- /.col -->
                                </div>
                                <!-- /.row -->
                            </div>
                        </div>
                    </div>
                    <!-- /.col -->
                </div>
                <!-- /.row -->
            </section>
            <!-- /.content -->

        </div>
    </div>
@endsection
