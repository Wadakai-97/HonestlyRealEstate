@extends('layouts.admin')
@section('title', 'スタッフ：編集画面')
@section('body')
<h2>{{ $staff->staff_name }}：編集画面</h2>

@if (Session::has('message'))
    <div class="alert alert-success">
        <p>{{ session('message') }}</p>
    </div>
@endif

<form method="post" action="{{ route('admin.staff.save', ['id' => $staff->id]) }}" enctype="multipart/form-data">
    @method('patch')
    @csrf
    <table>
        <tbody>
            <tr>
                <th colspan=2 class="table_top">登録内容</th>
            </tr>
            <tr>
                <th><label class="required">スタッフ名</label></th>
                <td>
                    <div class="form-group @if(!empty($errors->first('staff_name'))) has-error @endif">
                        <input type="text" name="staff_name" value="{{ old('staff_name', $staff->staff_name) }}">
                        <span class="help-block">{{$errors->first('staff_name')}}</span>
                    </div>
                </td>
            </tr>
            <tr>
                <th><label class="required">顔写真</label></th>
                <td>
                    <div class="form-group @if(!empty($errors->first('head_shot'))) has-error @endif">
                        <img src="{{ asset('/storage/head_shot/' . $staff->head_shot) }}" onerror="this.onerror=null;this.src='{{ asset('/storage/head_shot/no_image.jpg') }}'" >
                        <input type="file" name="head_shot">
                        <span class="help-block">{{$errors->first('head_shot')}}</span>
                    </div>
                </td>
            </tr>
            <tr>
                <th><label class="required">役職</label></th>
                <td>
                    <div class="form-group @if(!empty($errors->first('position'))) has-error @endif">
                        <select name="position">
                            <option disabled selected>未選択</option>
                            <option value="主任" @if(old('position', $staff->position) === '主任') selected @endif>主任</option>
                            <option value="係長" @if(old('position', $staff->position) === '係長') selected @endif>係長</option>
                            <option value="課長代理" @if(old('position', $staff->position) === '課長代理') selected @endif>課長代理</option>
                            <option value="課長" @if(old('position', $staff->position) === '課長') selected @endif>課長</option>
                            <option value="部長代理" @if(old('position', $staff->position) === '部長代理') selected @endif>部長代理</option>
                            <option value="部長" @if(old('position', $staff->position) === '部長') selected @endif>部長</option>
                            <option value="事業部長" @if(old('position', $staff->position) === '事業部長') selected @endif>事業部長</option>
                            <option value="執行役員" @if(old('position', $staff->position) === '執行役員') selected @endif>執行役員</option>
                            <option value="専務" @if(old('position', $staff->position) === '専務') selected @endif>専務</option>
                        </select>
                        <span class="help-block">{{$errors->first('position')}}</span>
                    </div>
                </td>
            </tr>
            <tr>
                <th><label class="required">契約数</label></th>
                <td>
                    <div class="form-group @if(!empty($errors->first('number_of_contracts'))) has-error @endif">
                        <input type="number" name="number_of_contracts" value="{{ old('number_of_contracts', $staff->number_of_contracts) }}" step="1">件
                        <span class="help-block">{{$errors->first('number_of_contracts')}}</span>
                    </div>
                </td>
            </tr>
            <tr>
                <th><label class="required">出生地</label></th>
                <td>
                    <div class="form-group @if(!empty($errors->first('birthplace'))) has-error @endif">
                        <input type="text" name="birthplace" value="{{ old('birthplace', $staff->birthplace) }}">
                        <span class="help-block">{{$errors->first('birthplace')}}</span>
                    </div>
                </td>
            </tr>
            <tr>
                <th><label class="required">趣味</label></th>
                <td>
                    <div class="form-group @if(!empty($errors->first('hobby'))) has-error @endif">
                        <input type="text" name="hobby" value="{{ old('hobby', $staff->hobby) }}">
                        <span class="help-block">{{$errors->first('hobby')}}</span>
                    </div>
                </td>
            </tr>
            <tr>
                <th><label class="required">コメント</label></th>
                <td>
                    <div class="form-group @if(!empty($errors->first('hobby'))) has-error @endif">
                        <textarea maxlength="800" placeholder="最大800文字まで" name="comment">{{ old('comment', $staff->comment) }}</textarea>
                        <span class="help-block">{{$errors->first('hobby')}}</span>
                        </div>
                </td>
            </tr>
        </tbody>
    </table>

    <input type="submit" value="登録する" class="sign_up_btn">
</form>
@endsection
