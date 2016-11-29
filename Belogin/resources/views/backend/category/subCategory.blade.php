@extends('layouts.backentMaster')
@section('content')


    @if(Auth::check())
        @if(Auth::user()->user==1)

            <div class="row">
                <div class="col-sm-12">
                    <section class="panel">
                        <header class="panel-heading">
                            Sub Category Form
                            <span class="tools pull-right">
            <a href="javascript:;" class="fa fa-chevron-down"></a>
            <a href="javascript:;" class="fa fa-times"></a>
        </span>
                        </header>
                        <div class="panel-body">
                            <div class=" form">
                                {!! Form::open(['url' => 'subCategoryManage','class'=>'cmxform form-horizontal','id'=>'signupForm' ]) !!}
                                <div class="form-group ">
                                    <label for="firstname" class="control-label col-lg-3">Main Manu</label>
                                    <div class="col-lg-6">
                                        <select name="mainManuName" class="form-control input-sm m-bot15" id="mainManu">
                                            <option value="0">Some Select</option>
                                            @foreach($mainCategory as $k=>$v)
                                                <option value="{{$k}}">{{$v}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group ">
                                    <label for="firstname" class="control-label col-lg-3">Main Category</label>
                                    <div class="col-lg-6">
                                        <select name="mainCategory" class="form-control input-sm m-bot15" id="mainCat">
                                            <option value="">Some Select</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group ">
                                    <label for="lastname" class="control-label col-lg-3">Sub Category</label>
                                    <div class="col-lg-6">
                                        <input type="text" name="SubCategory"  class=" form-control" id="SubCategory"/>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="col-lg-offset-3 col-lg-6">
                                        <button class="btn btn-primary" type="submit">Save</button>
                                        <button class="btn btn-default" type="reset">Cancel</button>
                                    </div>
                                </div>
                                {!! Form::close()!!}
                            </div>
                        </div>
                    </section>
                </div>

                <div class="col-sm-12">
                    <section class="panel">
                        <div class="row">
                            <div class="col-sm-12">
                                <section class="panel">
                                    <header class="panel-heading">
                                        Sub Category Table
                                        <span class="tools pull-right">
                            <a href="javascript:;" class="fa fa-chevron-down"></a>
                            <a href="javascript:;" class="fa fa-times"></a>
                         </span>
                                    </header>
                                    <div class="panel-body">
                                        <div class="adv-table editable-table ">
                                            <div class="space15"></div>
                                            <table class="table table-striped table-hover table-bordered" id="editable-sample">
                                                <thead>
                                                <tr style="color:black;">
                                                    <th>Main category</th>
                                                    <th>Sub category</th>
                                                    <th>Update</th>
                                                    <th>Delete</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                @foreach($subCategoryShow as $value)
                                                    <tr class="">
                                                        {!!Form::open(['url'=>['subCategoryUpdate',$value->id],'class'=>'form-horizontal'])!!}
                                                        <td class="center">
                                                            <select name="mainCategoryId" class="form-control input-sm m-bot15" id="selectText">
                                                                <option selected value="{{ $value->id}}">{{$value->category_name}}</option>
                                                                @foreach($mainCategoryShow as $value2)
                                                                    <option value="{{ $value2->id}}">{{ $value2->category_name }}</option>
                                                                @endforeach
                                                            </select>
                                                        </td>
                                                        <td><input type="text" name="SubCategory" class=" form-control"   value="{{ $value->sub_category_name }}"></td>
                                                        <td><input type="submit" value="Update" class="btn btn-success" style="margin-top: 5px"></td>
                                                        {!! Form::close()!!}
                                                        <td><button  class="sub_category_delete btn btn-danger" data-item-id="{{$value->id}}">Delete</button></td>
                                                    </tr>
                                                @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </section>
                            </div>
                        </div>
                    </section>
                </div>
            </div>
            <!--- Swite message show  delete form sub category by obydul date:28-7-16-->
            <script>
                $('button.sub_category_delete').click(function() {
                    var itemId = $(this).attr("data-item-id");
                    subCategoryDelete(itemId);
                });
                function subCategoryDelete(itemId) {
                    swal({
                        title: "Are you sure?",
                        text: "Are you sure that you want to delete this Item ?",
                        type: "warning",
                        showCancelButton: true,
                        closeOnConfirm: false,
                        confirmButtonText: "Yes, delete it!",
                        confirmButtonColor: "#ec6c62"
                    }, function() {
                        $.ajax({
                            method: "GET",
                            url: "{{URL::to('/')}}/subCategoryDelete/" + itemId,
                            type: "DELETE"
                        })
                                .done(function(data) {
                                    swal("Deleted!", "Your item was successfully deleted!", "success");
                                    location.reload();
                                })
                                .error(function(data) {
                                    swal("Oops", "We couldn't connect to the server!", "error");
                                    location.reload();
                                });
                    });
                }
            </script>
            <!-- category show -->
                        <script>
                jQuery(document).ready(function($){
                    n=1;
                    $('#mainManu').change(function(){
                        $.get("{{ url('api/dropdown/subcategory')}}",

                                { option: $(this).val() },
                                function(data) {
                                    var model = $('#mainCat');
                                    model.empty();
                                    model.append("<option value=''>" + 'Select Category' + "</option>");
                                    $.each(data, function(index,element) {
                                        model.append("<option value='"+ index +"'>" + element + "</option>");
                                    });
                                });
                    });
                });
            </script>

        @else
            <?php
            Session::flash('error', 'please your not permitted...');
            ?>
        @endif
    @else
        <?php
        Session::flash('error', 'please try to login again...');
        ?>
    @endif

@endsection