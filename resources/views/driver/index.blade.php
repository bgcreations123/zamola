@extends('layouts.office.master')

@section('title', 'Home')

@section('content')



	<div class="col main py-4">
            
            <div class="row mb-3">
                <div class="col-xl-3 col-sm-6 py-2">
                    <div class="card bg-success text-white h-100">
                        <div class="card-body bg-success">
                            <div class="rotate">
                                <span class="fa fa-user fa-4x"></span>
                            </div>
                            <h6 class="text-uppercase">Users</h6>
                            <h1 class="display-4">134</h1>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-sm-6 py-2">
                    <div class="card text-white bg-danger h-100">
                        <div class="card-body bg-danger">
                            <div class="rotate">
                                <span class="fa fa-list fa-4x"></span>
                            </div>
                            <h6 class="text-uppercase">Posts</h6>
                            <h1 class="display-4">87</h1>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-sm-6 py-2">
                    <div class="card text-white bg-info h-100">
                        <div class="card-body bg-info">
                            <div class="rotate">
                                <span class="fa fa-twitter fa-4x"></span>
                            </div>
                            <h6 class="text-uppercase">Tweets</h6>
                            <h1 class="display-4">125</h1>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-sm-6 py-2">
                    <div class="card text-white bg-warning h-100">
                        <div class="card-body">
                            <div class="rotate">
                                <span class="fa fa-share fa-4x"></span>
                            </div>
                            <h6 class="text-uppercase">Shares</h6>
                            <h1 class="display-4">36</h1>
                        </div>
                    </div>
                </div>
            </div>
            <!--/row-->

            <div class="row my-4">
                <div class="col-lg-3 col-md-4">
                    <div class="card">
                        <img class="card-img-top img-fluid" src="//placehold.it/740x180/bbb/fff?text=..." alt="Card image cap">
                        <div class="card-body">
                            <h4 class="card-title">Layouts</h4>
                            <p class="card-text">Flexbox provides simpler, more flexible layout options like vertical centering.</p>
                            <a href="#" class="btn btn-primary">Button</a>
                        </div>
                    </div>
                    <div class="card card-inverse bg-inverse mt-3">
                        <div class="card-body">
                            <h3 class="card-title">Flexbox</h3>
                            <p class="card-text">Flexbox is now the default, and Bootstrap 4 supports SASS out of the box.</p>
                            <a href="#" class="btn btn-outline-secondary">Outline</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-9 col-md-8">
                    <div class="table-responsive">
                        <table class="table table-striped">
                            <thead class="thead-inverse">
                                <tr>
                                    <th>#</th>
                                    <th>Label</th>
                                    <th>Header</th>
                                    <th>Column</th>
                                    <th>Data</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>1,001</td>
                                    <td>responsive</td>
                                    <td>bootstrap</td>
                                    <td>cards</td>
                                    <td>grid</td>
                                </tr>
                                <tr>
                                    <td>1,002</td>
                                    <td>rwd</td>
                                    <td>web designers</td>
                                    <td>theme</td>
                                    <td>responsive</td>
                                </tr>
                                <tr>
                                    <td>1,003</td>
                                    <td>free</td>
                                    <td>open-source</td>
                                    <td>download</td>
                                    <td>template</td>
                                </tr>
                                <tr>
                                    <td>1,003</td>
                                    <td>frontend</td>
                                    <td>developer</td>
                                    <td>coding</td>
                                    <td>card panel</td>
                                </tr>
                                <tr>
                                    <td>1,004</td>
                                    <td>migration</td>
                                    <td>bootstrap 4</td>
                                    <td>mobile-first</td>
                                    <td>design</td>
                                </tr>
                                <tr>
                                    <td>1,005</td>
                                    <td>navbar</td>
                                    <td>sticky</td>
                                    <td>jumbtron</td>
                                    <td>header</td>
                                </tr>
                                <tr>
                                    <td>1,006</td>
                                    <td>collapse</td>
                                    <td>affix</td>
                                    <td>submenu</td>
                                    <td>flexbox</td>
                                </tr>
                                <tr>
                                    <td>1,007</td>
                                    <td>layout</td>
                                    <td>examples</td>
                                    <td>themes</td>
                                    <td>grid</td>
                                </tr>
                                <tr>
                                    <td>1,008</td>
                                    <td>migration</td>
                                    <td>bootstrap 4</td>
                                    <td>flexbox</td>
                                    <td>design</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <!--/row-->

        </div>

@endsection