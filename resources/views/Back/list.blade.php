@extends('layouts.default')

@section('content')
    <div id="user_list" class="aw-content-wrap">
        <div class="mod">
            <div class="mod-head">
                <h3>
                    <ul class="nav nav-tabs">
                        <li>
                            <a href="{{ route('index') }}">视频待审核列表</a>
                        </li>
                        <li>
                            <a data-toggle="tab" href="#listss">视频已审核列表</a>
                        </li>
                        <li>
                            <a href="{{ route('vodTui') }}">推送过的数据</a>
                        </li>
                    </ul>
                </h3>
            </div>
            <div class="box-body tab-content">
                <div id="listss" class="tab-pane active">
                    <form class="well form-search" method="get" id="form_id" action="{{route('vodList')}}">
                        视频名称:
                        <input type="text" id="" name="name" style="width: 120px;height: 30px;border-radius:5px ;"
                               class="border-left-right" value=""
                               placeholder="请输入视频名称">
                        主演:
                        <input type="text" id="" name="actor" style="width: 120px;height: 30px;border-radius:5px ;"
                               class="border-left-right" value=""
                               placeholder="请输入主要演员">
                        &nbsp;
                        类别：
                        <input type="text" id="" name="type_name" style="width: 120px;height: 30px;border-radius:5px ;"
                               class="border-left-right" value=""
                               placeholder="请输入视频类型">

                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;查看时间：&nbsp;
                        <input type="datetime-local" id="" name="" style="width: 120px;height: 30px;border-radius:5px ;"
                               class="border-left-right" autocomplete="off">&nbsp;&nbsp;&nbsp;-&nbsp;&nbsp;&nbsp;&nbsp;
                        <input type="datetime-local" id="" name="" style="width: 120px;height: 30px;border-radius:5px ;"
                               class="border-left-right" autocomplete="off"> &nbsp;

                        <input type="hidden" id="tro_id" name="action_name">
                        <input type="button" class="btn btn-primary" id="search_id" value="搜索">
                        <a class="btn btn-danger" href="{{route('vodList')}}">清空</a>
                    </form>
                    <form id="vodPrope" action="{{ route('vodPrope') }}" method="post">
                        {{csrf_field()}}
                        <table class="table table-bordered">
                            <tbody>
                            <tr>
                                <th><input type="checkbox" id="sssall"></th>
                                <th>ID</th>
                                <th>名称</th>
                                <th>副标题</th>
                                <th width="80">英文名称</th>
                                <th>首字母</th>
                                <th width="80">分类名称</th>
                                <th>封面</th>
                                <th>语言</th>
                                <th>地区</th>
                                <th>评分</th>
                                <th>年份</th>
                                <th width="80">更新时间</th>
                                <th>连载</th>
                                <th>备注</th>
                                <th>演员</th>
                                <th>导演</th>
                                <th>标识</th>
                                <th width="80">播放url</th>
                                <th>简介</th>
                                <th>下载组</th>
                                <th width="80">下载地址</th>
                                <th width="80">推送标志</th>
                                <th>上下架</th>
                                <th width="80">审核状态</th>
                                <th width="150">操作</th>
                                <th width="80">审核操作</th>
                            </tr>
                            @foreach($list as $vo)
                                <tr>
                                    <td><input type="Checkbox" name="id[]" value="{{$vo->id}}" id="che"></td>
                                    <td>{{$vo->id}}</td>
                                    <td>{{$vo->name}}</td>
                                    <td>{{$vo->subname}}</td>
                                    <td>{{$vo->enname}}</td>
                                    <td>{{$vo->letter}}</td>
                                    <td>{{$vo->type_name}}</td>
                                    <td>
                                        <img class="mou" src="{{$vo->pic}}" alt="" id="img" ALIGN="MIDDLE" BORDER="0"
                                             onMouseMove="move()" onMouseOut="out()"
                                             style="width: 50px;height: 50px;cursor:pointer;">
                                    </td>
                                    <td>{{$vo->lang}}</td>
                                    <td>{{$vo->area}}</td>
                                    <td>{{$vo->score}}</td>
                                    <td>{{$vo->year}}</td>
                                    <td>{{$vo->last}}</td>
                                    <td>{{$vo->state}}</td>
                                    <td>{{$vo->note}}</td>
                                    <td>{{$vo->actor}}</td>
                                    <td>{{$vo->director}}</td>
                                    <td>{{$vo->playfrom}}</td>
                                    <td>{{$vo->dd}}</td>
                                    <td>{{$vo->des}}</td>
                                    <td>{{$vo->downfrom}}</td>
                                    <td>{{$vo->downurl}}</td>
                                    <td>{{$vo->tuisong}}</td>
                                    <td>{{$show[$vo->status]}}</td>
                                    <td>{{$status[$vo->vod_status]}}</td>

                                    <td>
                                        <a href="{{ route('vodEdit',$vo->id )}}" class="btn btn-warning"
                                           title="编辑"><span
                                                    class="fa fa-edit"></span> 编辑</a>
                                        @if($vo->status == 0 || $vo->status == -5)
                                            <a href="{{ route('vodAbove',$vo->id )}}" class="btn btn-success"
                                               title="上架"><span class="fa fa-edit"></span> 上架</a>
                                        @elseif($vo->status == 5)
                                            <a href="{{ route('vodBelow',$vo->id )}}" class="btn btn-danger" title="下架"
                                               onclick="return confirm('是否下架？');"><span class="fa fa-edit"></span>
                                                下架</a>
                                        @endif
                                    </td>

                                    <td>
                                        <a class="btn btn-danger" href="{{ route('vodDel',$vo->id) }}" title="删除"
                                           onclick="return confirm('是否删除？');"><span class="fa fa-trash-o"></span> 删除</a>
                                    </td>

                                </tr>
                            @endforeach
                            </tbody>

                        </table>
                        <select name="son_id" style="width: 200px;height: 30px;border-radius:5px ;"
                                class="border-left-right" id="seleId">
                            <option value="" class="">请选择要推送的子站</option>
                            @foreach($son as $ss)
                                <option value="{{$ss->id}}">{{$ss->name}}</option>
                            @endforeach
                        </select>

                        <input type="submit" id="tui" class="btn btn-success" value="推送"  onclick="return confirm('是否推送？');">
                    </form>
                    <button class="btn btn-success" id="alls">全选</button>
                    <button class="btn btn-warning" id="falseall">反选</button>
                    {{ $list->links() }}
                </div><!-- /.box-body -->

            </div>
            <div>
            </div>
        </div>
    </div>
    <script>
        document.getElementById('search_id').onclick = function () {
            document.getElementById('tro_id').value = 'search';
            document.getElementById('form_id').setAttribute('action', "{{route('vodList')}}");
            document.getElementById('form_id').submit();
        };
    </script>

@stop