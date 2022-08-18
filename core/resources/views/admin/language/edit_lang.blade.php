@extends('admin.layout.master')
@section('body')
    <div class="row" id="app">
        <div class="col-md-12">

            <div class="tile">
                <div class="row">
                    <div class="col-md-8">
                        <h3 class="tile-title"> {{ $page_title }} (<small>Click Add Translatable Add Put Your Key For Translate</small>)</h3>
                        <small style="color: red">"Add Translatable Key" please careful when you entering word or sentences, there shouldn't be any extra space or break. </small>
                        <small style="color: green">If your keywords are perfect but translator doesn't work, don't worry. escape all dynamic keywords and add single word, it'll work  . </small>
                    </div>
                    <div class="col-md-4">

                        <form class="form-inline" method="post" @submit.prevent="importKey">

                            <div class="form-group mb-2">
                                <select  class="form-control" required v-model="importData.code">
                                    <option value="">Import Keywords (Select Language)</option>
                                    @foreach($list_lang as $data)
                                        <option value="{{$data->id}}" @if($data->id == $la->id) style="display: none" @endif>{{$data->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <button type="submit" class="btn btn-primary mb-2">Import Now</button>
                        </form>

                        <small style="color: red">If you import keywords from another language, Your present "{{$la->name}}" all keywords will remove.</small>

                    </div>
                </div>



                <hr>


                <div class="tile-body" style="overflow: hidden">
                    <form method="post" action="{{route('key-update', $la->id)}}" id="langForm">
                        {{ csrf_field() }}
                        {{method_field('put')}}
                        <div class="form-body">

                            <div class="row">
                                <div class="col-md-3" v-for="(value, key) in datas" :key="key">
                                    <label class="control-label">@{{ key }}</label>
                                    <div class="input-group">
                                        <input type="text" :value="value" :name="'keys[' + key + ']'" class="form-control">
                                        <div class="input-group-append" >
                                            <span class="input-group-text" style="background: #ff4f59; color: white" @click.prevent="deleteElement(key)"><i class="fa fa-trash"></i></span>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <br>
                            <br>

                            <div class="row">
                                <div class="col-md-12 text-center">
                                    <button type="button" data-toggle="modal" data-target="#addModal" class="btn btn-primary">Add Translatable Key</button>
                                    <button class="btn btn-success" data-toggle="tooltip" title="@lang('Save')" @click.prevent="save">Save</button>
                                </div>

                                <br>
                                <br>
                                <div class="col-md-12 text-center">
                                    <button class="btn btn-primary btn-block btn-lg"><i class="fa fa-send"></i> Update</button>
                                </div>

                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>



        <div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form id="newlangForm">
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="exampleInputEmail1">English</label>
                            <input type="text" class="form-control" v-model="newKey" required>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">{{$la->name}}</label>
                            <input type="text" class="form-control" v-model="newVal" required>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <input type="submit" class="btn btn-primary" value="Add Field" @click.prevent="addfield()">
                    </div>
                    </form>
                </div>
            </div>
        </div>


    </div>
@stop
@section('script')
    <script src="{{url('/')}}/assets/vue/vue.js"></script>
    <script src="{{url('/')}}/assets/vue/axios.js"></script>
    <script>
        window.Laravel = {!! json_encode([
        'csrfToken' => csrf_token(),
    ]) !!};
    </script>

    <script>
        window.app = new Vue({
            el: '#app',
            data: {
                datas: {!! $json !!},
                current: '{{ $la->code }}',
                newVal: null,
                newKey: null,


                importData : {
                    code : ''
                }

            },
            methods: {
                save() {
                    $('#langForm').submit();
                },

                deleteElement(key) {
                    Vue.delete(this.datas, key);
                },
                addfield() {
                    Vue.set(this.datas, this.newKey, this.newVal);
                    app.newKey = '';
                    app.newVal = '';
                    // document.getElementById('newlangForm').reset();
                    $("#addModal").modal('hide');
                },
                importKey()
                {
                    var code = this.importData;
                    axios.post('{{route('import_lang')}}', code).then(function (res) {
                        app.datas = res.data;
                    })

                }
            }
        })
    </script>
@stop
