@extends('layouts.master')
@section('nav')
    <li class="active" ><a href="{{url('admin/index')}}"><i class="icon-home"></i><span>主页</span> </a> </li>
    <li><a href="{{url('admin/user/list')}}"><i class=" icon-user"></i><span>用户列表</span> </a> </li>
    <li><a href="{{url('admin/book/list')}}"><i class=" icon-columns"></i><span>书籍列表</span> </a></li>
    <li><a href="{{url('admin/category/list')}}"><i class="icon-list"></i><span>分类列表</span> </a> </li>
    <li><a href="{{url('admin/order/list')}}"><i class=" icon-file"></i><span>订单列表</span> </a> </li>
    <li class="dropdown"><a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown"> <i class="icon-user"></i><span>权限管理</span> <b class="caret"></b></a>
        <ul class="dropdown-menu">
            <li><a href="{{asset('admin/perm')}}">权限管理</a></li>
            <li><a href="{{asset('admin/roles')}}">角色管理</a></li>
            <li><a href="{{asset('admin/admin')}}">管理员管理</a></li>
        </ul>
    </li>
    <li class="dropdown"><a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown"> <i class="icon-long-arrow-down"></i><span>其他</span> <b class="caret"></b></a>
        <ul class="dropdown-menu">
            <li><a href="/admin/publish">机构管理</a></li>
            <li><a href="faq.html">FAQ</a></li>
            <li><a href="pricing.html">Pricing Plans</a></li>
            <li><a href="login.html">Login</a></li>
            <li><a href="signup.html">Signup</a></li>
            <li><a href="error.html">404</a></li>
        </ul>
    </li>
    @endsection
    @section('content')
    <div class="main-inner">
        <div class="container">
            <div class="row">
                <div class="span6">
                    <div class="widget widget-nopad">
                        <div class="widget-header"> <i class="icon-list-alt"></i>
                            <h3> Today's Stats</h3>
                        </div>
                        <!-- /widget-header -->
                        <div class="widget-content">
                            <div class="widget big-stats-container">
                                <div class="widget-content">
                                    <h6 class="bigstats">A fully responsive premium quality admin template built on Twitter Bootstrap by <a href="http://www.egrappler.com" target="_blank">EGrappler.com</a>.  These are some dummy lines to fill the area.</h6>
                                    <div id="big_stats" class="cf">
                                        <div class="stat"> <i class="icon-anchor"></i> <span class="value">851</span> </div>
                                        <!-- .stat -->

                                        <div class="stat"> <i class="icon-thumbs-up-alt"></i> <span class="value">423</span> </div>
                                        <!-- .stat -->

                                        <div class="stat"> <i class="icon-twitter-sign"></i> <span class="value">922</span> </div>
                                        <!-- .stat -->

                                        <div class="stat"> <i class="icon-bullhorn"></i> <span class="value">25%</span> </div>
                                        <!-- .stat -->
                                    </div>
                                </div>
                                <!-- /widget-content -->

                            </div>
                        </div>
                    </div>
                    <!-- /widget -->

                    <!-- /widget -->
                    <div class="widget">
                        <div class="widget-header"> <i class="icon-file"></i>
                            <h3> Content</h3>
                        </div>
                        <!-- /widget-header -->
                        <div class="widget-content">
                            <ul class="messages_layout">
                                <li class="from_user left"> <a href="#" class="avatar"><img src="/admin/img/message_avatar1.png"/></a>
                                    <div class="message_wrap"> <span class="arrow"></span>
                                        <div class="info"> <a class="name">John Smith</a> <span class="time">1 hour ago</span>
                                            <div class="options_arrow">
                                                <div class="dropdown pull-right"> <a class="dropdown-toggle " id="dLabel" role="button" data-toggle="dropdown" data-target="#" href="#"> <i class=" icon-caret-down"></i> </a>
                                                    <ul class="dropdown-menu " role="menu" aria-labelledby="dLabel">
                                                        <li><a href="#"><i class=" icon-share-alt icon-large"></i> Reply</a></li>
                                                        <li><a href="#"><i class=" icon-trash icon-large"></i> Delete</a></li>
                                                        <li><a href="#"><i class=" icon-share icon-large"></i> Share</a></li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="text"> As an interesting side note, as a head without a body, I envy the dead. There's one way and only one way to determine if an animal is intelligent. Dissect its brain! Man, I'm sore all over. I feel like I just went ten rounds with mighty Thor. </div>
                                    </div>
                                </li>
                                <li class="by_myself right"> <a href="#" class="avatar"><img src="/admin/img/message_avatar2.png"/></a>
                                    <div class="message_wrap"> <span class="arrow"></span>
                                        <div class="info"> <a class="name">Bender (myself) </a> <span class="time">4 hours ago</span>
                                            <div class="options_arrow">
                                                <div class="dropdown pull-right"> <a class="dropdown-toggle " id="dLabel" role="button" data-toggle="dropdown" data-target="#" href="#"> <i class=" icon-caret-down"></i> </a>
                                                    <ul class="dropdown-menu " role="menu" aria-labelledby="dLabel">
                                                        <li><a href="#"><i class=" icon-share-alt icon-large"></i> Reply</a></li>
                                                        <li><a href="#"><i class=" icon-trash icon-large"></i> Delete</a></li>
                                                        <li><a href="#"><i class=" icon-share icon-large"></i> Share</a></li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="text"> All I want is to be a monkey of moderate intelligence who wears a suit… that's why I'm transferring to business school! I had more, but you go ahead. Man, I'm sore all over. I feel like I just went ten rounds with mighty Thor. File not found. </div>
                                    </div>
                                </li>
                                <li class="from_user left"> <a href="#" class="avatar"><img src="/admin/img/message_avatar1.png"/></a>
                                    <div class="message_wrap"> <span class="arrow"></span>
                                        <div class="info"> <a class="name">Celeste Holm </a> <span class="time">1 Day ago</span>
                                            <div class="options_arrow">
                                                <div class="dropdown pull-right"> <a class="dropdown-toggle " id="dLabel" role="button" data-toggle="dropdown" data-target="#" href="#"> <i class=" icon-caret-down"></i> </a>
                                                    <ul class="dropdown-menu " role="menu" aria-labelledby="dLabel">
                                                        <li><a href="#"><i class=" icon-share-alt icon-large"></i> Reply</a></li>
                                                        <li><a href="#"><i class=" icon-trash icon-large"></i> Delete</a></li>
                                                        <li><a href="#"><i class=" icon-share icon-large"></i> Share</a></li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="text"> And I'd do it again! And perhaps a third time! But that would be it. Are you crazy? I can't swallow that. And I'm his friend Jesus. No, I'm Santa Claus! And from now on you're all named Bender Jr. </div>
                                    </div>
                                </li>
                                <li class="from_user left"> <a href="#" class="avatar"><img src="/admin/img/message_avatar2.png"/></a>
                                    <div class="message_wrap"> <span class="arrow"></span>
                                        <div class="info"> <a class="name">Mark Jobs </a> <span class="time">2 Days ago</span>
                                            <div class="options_arrow">
                                                <div class="dropdown pull-right"> <a class="dropdown-toggle " id="dLabel" role="button" data-toggle="dropdown" data-target="#" href="#"> <i class=" icon-caret-down"></i> </a>
                                                    <ul class="dropdown-menu " role="menu" aria-labelledby="dLabel">
                                                        <li><a href="#"><i class=" icon-share-alt icon-large"></i> Reply</a></li>
                                                        <li><a href="#"><i class=" icon-trash icon-large"></i> Delete</a></li>
                                                        <li><a href="#"><i class=" icon-share icon-large"></i> Share</a></li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="text"> That's the ONLY thing about being a slave. Now, now. Perfectly symmetrical violence never solved anything. Uh, is the puppy mechanical in any way? As an interesting side note, as a head without a body, I envy the dead. </div>
                                    </div>
                                </li>
                                <li class="by_myself right"> <a href="#" class="avatar"><img src="/admin/img/message_avatar2.png"/></a>
                                    <div class="message_wrap"> <span class="arrow"></span>
                                        <div class="info"> <a class="name">Bender (myself) </a> <span class="time">3 Days ago</span>
                                            <div class="options_arrow">
                                                <div class="dropdown pull-right"> <a class="dropdown-toggle " id="dLabel" role="button" data-toggle="dropdown" data-target="#" href="#"> <i class=" icon-caret-down"></i> </a>
                                                    <ul class="dropdown-menu " role="menu" aria-labelledby="dLabel">
                                                        <li><a href="#"><i class=" icon-share-alt icon-large"></i> Reply</a></li>
                                                        <li><a href="#"><i class=" icon-trash icon-large"></i> Delete</a></li>
                                                        <li><a href="#"><i class=" icon-share icon-large"></i> Share</a></li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="text"> All I want is to be a monkey of moderate intelligence who wears a suit… that's why I'm transferring to business school! I had more, but you go ahead. Man, I'm sore all over. I feel like I just went ten rounds with mighty Thor. File not found. </div>
                                    </div>
                                </li>
                            </ul>
                        </div>
                        <!-- /widget-content -->
                    </div>
                    <!-- /widget -->
                </div>
                <!-- /span6 -->
                <div class="span6">
                    <div class="widget">
                        <div class="widget-header"> <i class="icon-bookmark"></i>
                            <h3>畅销作者</h3>
                        </div>
                        <!-- /widget-header -->
                        <div class="widget-content">
                            <div class="shortcuts">
                                <a href="javascript:;" class="shortcut"><i class="shortcut-icon icon-user"></i><span
                                            class="shortcut-label">信息</span> </a>
                                <a href="javascript:;" class="shortcut"><i
                                            class="shortcut-icon icon-bookmark"></i><span class="shortcut-label">所写书籍</span> </a>
                                <a href="javascript:;" class="shortcut"> <i class="shortcut-icon icon-comment"></i><span class="shortcut-label">评论</span> </a>

                                <a href="javascript:;" class="shortcut"> <i class="shortcut-icon icon-tag"></i><span class="shortcut-label">标签</span> </a>
                            </div>
                            <!-- /shortcuts -->
                        </div>
                        <!-- /widget-content -->
                    </div>
                    <!-- /widget -->
                    <div class="widget">
                        <div class="widget-header"> <i class="icon-signal"></i>
                            <h3>甜甜圈示意图</h3>
                        </div>
                        <!-- /widget-header -->
                        <div class="widget-content">
                            <canvas id="donut-chart" class="chart-holder" width="538" height="250">
                            </canvas>
                            <!-- /area-chart -->
                        </div>
                        <!-- /widget-content -->
                    </div>
                    <!-- /widget -->
                    <div class="widget widget-table action-table">
                        <div class="widget-header"> <i class="icon-th-list"></i>
                            <h3>A Table Example</h3>
                        </div>
                        <!-- /widget-header -->
                        <div class="widget-content">
                            <table class="table table-striped table-bordered">
                                <thead>
                                <tr>
                                    <th> Free Resource </th>
                                    <th> Download</th>
                                    <th class="td-actions"> </th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <td> Fresh Web Development Resources </td>
                                    <td> http://www.egrappler.com/ </td>
                                    <td class="td-actions"><a href="javascript:;" class="btn btn-small btn-success"><i class="btn-icon-only icon-ok"> </i></a><a href="javascript:;" class="btn btn-danger btn-small"><i class="btn-icon-only icon-remove"> </i></a></td>
                                </tr>
                                <tr>
                                    <td> Fresh Web Development Resources </td>
                                    <td> http://www.egrappler.com/ </td>
                                    <td class="td-actions"><a href="javascript:;" class="btn btn-small btn-success"><i class="btn-icon-only icon-ok"> </i></a><a href="javascript:;" class="btn btn-danger btn-small"><i class="btn-icon-only icon-remove"> </i></a></td>
                                </tr>
                                <tr>
                                    <td> Fresh Web Development Resources </td>
                                    <td> http://www.egrappler.com/ </td>
                                    <td class="td-actions"><a href="javascript:;" class="btn btn-small btn-success"><i class="btn-icon-only icon-ok"> </i></a><a href="javascript:;" class="btn btn-danger btn-small"><i class="btn-icon-only icon-remove"> </i></a></td>
                                </tr>
                                <tr>
                                    <td> Fresh Web Development Resources </td>
                                    <td> http://www.egrappler.com/ </td>
                                    <td class="td-actions"><a href="javascript:;" class="btn btn-small btn-success"><i class="btn-icon-only icon-ok"> </i></a><a href="javascript:;" class="btn btn-danger btn-small"><i class="btn-icon-only icon-remove"> </i></a></td>
                                </tr>
                                <tr>
                                    <td> Fresh Web Development Resources </td>
                                    <td> http://www.egrappler.com/ </td>
                                    <td class="td-actions"><a href="javascript:;" class="btn btn-small btn-success"><i class="btn-icon-only icon-ok"> </i></a><a href="javascript:;" class="btn btn-danger btn-small"><i class="btn-icon-only icon-remove"> </i></a></td>
                                </tr>

                                </tbody>
                            </table>
                        </div>
                        <!-- /widget-content -->
                    </div>
                    <!-- /widget -->
                </div>
                <!-- /span6 -->
            </div>
            <!-- /row -->
        </div>
        <!-- /container -->
    </div>
    <!-- /main-inner -->
</div>
<!-- /main -->

    @endsection

<!-- /extra -->
